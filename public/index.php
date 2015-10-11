<?php 

require('../bootstrap/bootstrap.php');
require('../config/common.php');
require('../config/routes.php');

$db = null;
$app = new \Bootie\App;

try 
{
	$app->run(PATH);
} 
catch (Exception $e) 
{
	\Bootie\Error::exception($e);
}

if($debug){
	include __DIR__.'/../bootstrap/debug.php';
}

