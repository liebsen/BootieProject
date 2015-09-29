<?php 

require('../bootstrap/bootstrap.php');

use \Bootie\App as App;

require('../config/common.php');
require('../config/routes.php');

dd("11");

$app = new \App\App;

try 
{
	$app->dispatch(PATH);
	$db = null; 
} 
catch (Exception $e) 
{
	\App\Error::exception($e);
}

if($debug){
	include __DIR__.'/../bootstrap/debug.php';
}