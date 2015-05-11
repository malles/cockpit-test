<?php
/* *
 *	cockpit-test
 *  index.php
 *	Created on 7-1-2015 19:55
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

// set default timezone
date_default_timezone_set('UTC');

// make cockpit api available
require('cockpit/bootstrap.php');

$app = new Lime\App();
$app->path('layouts', __DIR__ . '/template/layouts');
$app->path('views', __DIR__ . '/views');

require('template/template.config.php');

// bind routes
$app->bind("/", function() use($app, $baseVars) {
	$nieuwsList = collection('Nieuws')->find(['active'=>true])->sort(['created'=>1])->toArray();
	$homeContent = collection('Content')->findOne(["title_slug"=>'home']);

	$limit = get_registry('newsCount', 3);
	$page  = $app->param('page', 1);
	$count = collection('Nieuws')->count(['active'=>true]);
	$pages = ceil($count/$limit);
	// get posts
	$nieuwsList = collection('Nieuws')->find(['active'=>true]);
	// apply pagination
	$nieuwsList->limit($limit)->skip(($page-1) * $limit);
	// apply sorting
	$nieuwsList->sort(["created"=>1]);

	return $app->render('views/index.php with template/template.php', array_merge($baseVars, [
		'nieuwsList' => $nieuwsList->toArray(),
		'homeContent' => $homeContent,
		'page'=>$page,
		'pages'=>$pages
	]));
});

$app->bind("/informatie/rollendatabase", function() use($app, $baseVars) {
	$collections = [];
	$rollenCollecties = cockpit('collections:group', 'Rollen');
	foreach ($rollenCollecties as $collectionName => $collection) {
		$collections[$collectionName] = $collection->find(['active'=>true])->sort(['created'=>1])->toArray();
	}
	$baseVars['view'] = 'informatie';
	$baseVars['pageHeader'] = 'Rollendatabase';

	return $app->render('views:overview.php with template/template.php', array_merge($baseVars, [
		'collections' => $collections
	]));
});
//tags
$app->bind("/tags/:tag_slug", function($params) use($app, $baseVars) {
	$tag = ucfirst(str_replace('-', ' ', $params['tag_slug']));
	$items = [];
	$rollenCollecties = cockpit('collections:group', 'Rollen');
	foreach ($rollenCollecties as $collectionName => $collection) {
		$search = $collections[$collectionName] = $collection->find(function($post) use ($tag) {
			return array_search($tag, $post['tags']) > 0;
		})->sort(['title'=>1])->toArray();
		foreach ($search as $item) {
			$item['collectionName'] = $collectionName;
			$item['route'] = $this->routeUrl(strtolower(str_replace(' ', '-', $collectionName)) . '/' . $item['title_slug']);
			$items[] = $item;
		}
	}


	$baseVars['pageHeader'] = $tag;
	$baseVars['pageTitle'] = $tag. get_registry('pageTitleSeperator', '') . get_registry('pageTitleSuffix', '');

	return $app->render('views:links.php with template/template.php',  array_merge($baseVars, [
		'items' => $items
	]));

});

//default views
foreach ($baseVars['views'] as $view=>$viewInfo) {

	$baseVars['view'] = $view;
	$baseVars['currentCollection'] = $viewInfo[1];
	$baseVars['pageHeader'] = $viewInfo[2];
	$baseVars['pageTitle'] = $viewInfo[2];

	$app->bind("/$view", function() use($app, $baseVars, $viewInfo) {
		$items = collection($viewInfo[1])->find(['active'=>true])->sort(['created'=>1])->toArray();
		$baseVars['pageTitle'] = $baseVars['pageHeader']. get_registry('pageTitleSeperator', '') . get_registry('pageTitleSuffix', '');

		return $app->render('views:'.$viewInfo[0].'.php with template/template.php', array_merge($baseVars, [
			'items' => $items
		]));
	});


	$app->bind("/$view/:title_slug", function($params) use($app, $baseVars, $viewInfo) {

		$post = collection($viewInfo[1])->findOne(["title_slug"=>$params['title_slug']]);
		$baseVars['pageTitle'] = $post['title'] . get_registry('pageTitleSeperator', '') . get_registry('pageTitleSuffix', '');

		return $app->render('views:article.php with template/template.php',  array_merge($baseVars, [
			'post' => $post
		]));
	});

}

// handle error pages
$app->on("after", function() use ($app, $baseVars) {

	switch ($app->response->status) {
		case 500:

			if ($app['debug']) {

				if ($app->req_is('ajax')) {
					$app->response->body = json_encode(['error' => json_decode($app->response->body, true)]);
				} else {
					$app->response->body = $this->render('views:error/500-debug.php', array_merge($baseVars, [
						'error' => json_decode($app->response->body, true)
					]));
				}

			} else {

				if ($app->req_is('ajax')) {
					$app->response->body = '{"error": "500", "message": "system error"}';
				} else {
					$app->response->body = $app->render('views:error/500.php with template/template.php',  $baseVars);
				}
			}

			break;

		case 404:

			if ($app->req_is('ajax')) {
				$app->response->body = '{"error": "404", "message":"File not found"}';
			} else {
				$app->response->body = $app->render('views:error/404.php with template/template.php',  $baseVars);
			}
			break;
	}
});


$app->run();

