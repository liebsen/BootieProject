<?php 

require('../bootstrap/bootstrap.php');
require('../config/common.php');
require('../config/routes.php');

/*
 * If cache option is enabled AND this url is grabbed
 * then execution stops on the next line
 */

if( config()->cache ) \Bootie\Cache::init(config()->cache);

$db = null;
$app = new \Bootie\App;

try 
{
	$app->run(PATH);
} 
catch (Exception $e) 
{
	\Bootie\Error::exception($e);
	exit();
}

if( config()->cache ) \Bootie\Cache::store();
if( config()->debug ) include __DIR__.'/../bootstrap/debug.php';