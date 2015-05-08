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

// make cockpit api available
require('cockpit/bootstrap.php');

$app = new Lime\App();
$app->path('layouts', __DIR__ . '/template/layouts');

require('template/template.config.php');

// bind routes
$app->bind("/", function() use($app, $baseVars) {
	$nieuwsList = collection('Nieuws')->find(['active'=>true])->sort(['created'=>1])->toArray();
	$homeContent = collection('Content')->findOne(["title_slug"=>'home']);

	return $app->render('views/index.php with template/template.php', array_merge($baseVars, [
		'nieuwsList' => $nieuwsList,
		'homeContent' => $homeContent
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

	return $app->render('views/overview.php with template/template.php', array_merge($baseVars, [
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

	return $app->render('views/links.php with template/template.php',  array_merge($baseVars, [
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

		return $app->render('views/'.$viewInfo[0].'.php with template/template.php', array_merge($baseVars, [
			'items' => $items
		]));
	});


	$app->bind("/$view/:title_slug", function($params) use($app, $baseVars, $viewInfo) {

		$post = collection($viewInfo[1])->findOne(["title_slug"=>$params['title_slug']]);
		$baseVars['pageTitle'] = $post['title'] . get_registry('pageTitleSeperator', '') . get_registry('pageTitleSuffix', '');

		return $app->render('views/article.php with template/template.php',  array_merge($baseVars, [
			'post' => $post
		]));
	});

}


$app->run();

