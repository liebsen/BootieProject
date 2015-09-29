<?php 

require('../bootstrap/bootstrap.php');
require('../config/common.php');
require('../config/routes.php');

$app = new \bootie\App;

try 
{
	$app->dispatch(PATH);
	$db = null; 
} 
catch (Exception $e) 
{
	\bootie\Error::exception($e);
}

if($debug){
	include __DIR__.'/../bootstrap/debug.php';
}

