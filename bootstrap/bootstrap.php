<?php 

session_start();

$debug = FALSE;

// System Start Time
define('START_TIME', microtime(true));

// System Start Memory
define('START_MEMORY_USAGE', memory_get_usage());

define('TIME', time());

define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');

// The current TLD address, scheme, and port
define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://'
	. getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));

// The current site path
define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));

define('REQUEST_METHOD', getenv('REQUEST_METHOD'));

// Extension of all PHP files
define('EXT', '.php');

// Directory separator (Unix-Style works on all OS)
define('DS', '/');

// Absolute path to the system folder
define('SP', realpath(__DIR__) . '/..' . DS);

require(SP . 'vendor/autoload' . EXT);

// Enable global error handling
set_error_handler(array('\Bootie\Error', 'handler'));
register_shutdown_function(array('\Bootie\Error', 'fatal'));
