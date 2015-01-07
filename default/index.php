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

// bind routes
$app->bind("/", function() use($app) {

	$posts = collection('Content')->find(['active'=>true])->sort(['created'=>1])->toArray();

	return $app->render('views/index.php with template/template.php', ['posts' => $posts]);
});


$app->bind("/article/:id", function($params) use($app) {

	$post = collection('Content')->findOne(["_id"=>$params['id']]);

	return $app->render('views/article.php with template/template.php', ['post' => $post]);
});


$app->run();

