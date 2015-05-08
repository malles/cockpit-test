<?php

return [

	// cockpit session name
	'session.name' => 'mysession',

	// salt for password hashing etc.
	'sec-key'      => 'c3b40c4c-db44-s5h7-a814-b4931a15e5e1',

	// default system language
	'i18n'         => 'nl',
	/*

	// use mongodb as main data storage
	"database"    => [
		"server"  => "mongodb://localhost:27017",
		"options" => ["db" => "cockpitdb"]
	],
	*/

	// mailer smtp settings
	"mailer"            => [
		"from"      => "info@mydomain.tld",
		"transport" => "smtp",
		"host"      => "",
		"user"      => "",
		"password"  => "xxxxxx",
		"port"      => 25,
		"auth"      => true,
		"encryption"=> ""    # '', 'ssl' or 'tls'
	]
];