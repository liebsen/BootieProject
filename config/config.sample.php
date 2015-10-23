<?php 

$config = [
	/* 
	 * Available translations (Array of Locales)
	 */

	'debug' => false,
	
	'languages' => ['en'],

	'cache_enabled' => false, 

	/* 
	 * Cache settings
	 */

	'cache' => [
		'cache_ext' => '.cache', //file extension
		'cache_time' => 3600,  //Cache file expires afere these seconds (1 hour = 3600 sec)
		'cache_folder' => SP . 'storage/cache/', //folder to store Cache files
		'ignore_pages' => [
			'/login',
			'/register',
			'/logout',
			'/admin/(.*)'
		]
	],

	/* 
	 * Image manipulation (In Pixels)
	 */

	'img_sizes' => [
	    'tiny'  => [75,75],
	    'thumb' => [225,225],
	    'std'   => [600,400]
	],

	'img_save_orig' => true,

	/* 
	 * Database Access Credentials
	 */

	'database' => [
		'connections' => [
			'default' => [
				'dns' => "mysql:host=127.0.0.1;port=3306;dbname=bootie;charset=utf8",
				'username' => 'mysql',
				'password' => 'mysql',
				'params' => array()
			],
			'postgres' => [
				'dns' => "pgsql:host=localhost;port=5432;dbname=bootie;charset=utf8",
				'username' => 'postgres',
				'password' => 'postgres',
				'params' => array()
			]
		]
	]
];