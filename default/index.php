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

$min = get_registry('minify', 0) ? '.min' : '';

// bind routes
$app->bind("/", function() use($app, $min) {
	$posts = collection('Content')->find(['active'=>true])->sort(['created'=>1])->toArray();
	$pageTitle = 'scs';
	$homeContent = collection('Content')->findOne(["title_slug"=>'home']);

	return $app->render('views/index.php with template/template.php', [
		'min' => $min,
		'posts' => $posts,
		'pageTitle' => $pageTitle,
		'homeContent' => $homeContent
	]);
});


$app->bind("/article/:title_slug", function($params) use($app) {

	$post = collection('Content')->findOne(["title_slug"=>$params['title_slug']]);

	return $app->render('views/article.php with template/template.php', ['post' => $post]);
});


$app->run();

