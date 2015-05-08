<?php
/* *
 *	Bixie Printshop
 *  template.config.php
 *	Created on 8-5-2015 22:19
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */
/**
 * @var \Lime\App $app
 */

$baseVars = [
	'currentRoute' => $app->retrieve('route', ''),
	'view' => '',
	'views' => [
		'nieuws'=>['news', 'Nieuws', 'Nieuws'],
		'informatie'=>['links', 'Informatie', 'Informatie'],
		'goede-rollen'=>['category', 'Goede rollen', 'Goede rollen'],
		'slechte-rollen'=>['category', 'Slechte rollen', 'Slechte rollen'],
		'neutrale-rollen'=>['category', 'Neutrale rollen', 'Neutrale rollen'],
		'dubbelrollen'=>['category', 'Dubbelrollen', 'Dubbelrollen']
	],
	'menus' => [
		'nieuws'=>'Nieuws',
		'informatie'=>'Informatie'
	],
	'dropDowns' => [
		'informatie' => [
			'wat-is-weerwolven-van-wakkerdam' => 'Wat is Weerwolven van Wakkerdam?',
			'de-verschillen-tussen-het-kaartspel-en-online-spelen' => 'De verschillen tussen het kaartspel en online spelen',
			'h' => 'h',
			'rollendatabase' => 'Rollendatabase'
		]
	],
	'subMenus' => [
		'rollendatabase' => [
			'goede-rollen' => 'Goede rollen',
			'slechte-rollen' => 'Slechte rollen',
			'neutrale-rollen' => 'Neutrale rollen',
			'dubbelrollen' => 'Dubbelrollen'
		]
	],
	'sideMenus' => [
		'per-alliantie' => [
			'goede-rollen' => 'Goede rollen',
			'slechte-rollen' => 'Slechte rollen',
			'neutrale-rollen' => 'Neutrale rollen',
			'dubbelrollen' => 'Dubbelrollen'
		],
		'per-krachtsoort' => [
			'tags/rollen-met-een-actieve-kracht' => 'Actieve kracht',
			'tags/rollen-met-passieve-kracht' => 'Passieve kracht',
			'tags/rollen-zonder-speciale-kracht' => 'Geen speciale kracht'
		]
	],
	'pageHeader' => get_registry('pageTitle', ''),
	'pageTitle' => get_registry('pageTitle', '') . get_registry('pageTitleSeperator', '') . get_registry('pageTitleSuffix', ''),
	'min' => get_registry('minify', 0) ? '.min' : ''
];
