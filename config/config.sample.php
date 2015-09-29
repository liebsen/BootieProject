<?php
// Available translations (Array of Locales)
$config['languages'] = array('en');

$config['database'] = array(
	'dns' => "mysql:host=127.0.0.1;port=3306;dbname=caldero",
	'username' => 'root',
	'password' => ($local ? 'localpass' : 'serverpass'),
	//'dns' => "pgsql:host=localhost;port=5432;dbname=micromvc",
	//'username' => 'postgres',
	//'password' => 'postgres',
	'params' => array()
);