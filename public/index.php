<?php 

require('../bootstrap/bootstrap.php');
require('../config/common.php');
require('../config/routes.php');

$app = new \Bootie\App;
$db = null;

try 
{
	$app->handle(PATH);
} 
catch (Exception $e) 
{
	\Bootie\Error::exception($e);
}

if($debug){
	include __DIR__.'/../bootstrap/debug.php';
}

