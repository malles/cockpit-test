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

$baseVars = [
	'pageTitle' => 'Bixie Cockpit',
	'min' => get_registry('minify', 0) ? '.min' : ''
];

// bind routes
$app->bind("/", function() use($app, $baseVars) {
	$nieuwsList = collection('Nieuws')->find(['active'=>true])->sort(['created'=>1])->toArray();
	$homeContent = collection('Content')->findOne(["title_slug"=>'home']);

	return $app->render('views/index.php with template/template.php', array_merge($baseVars, [
		'nieuwsList' => $nieuwsList,
		'homeContent' => $homeContent
	]));
});


$app->bind("/nieuws/:title_slug", function($params) use($app, $baseVars) {

	$post = collection('Nieuws')->findOne(["title_slug"=>$params['title_slug']]);
	$pageTitle = $post['title'];

	return $app->render('views/article.php with template/template.php',  array_merge($baseVars, [
		'pageTitle' => $pageTitle,
		'post' => $post
	]));
});


$app->run();

