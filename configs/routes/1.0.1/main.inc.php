<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
/*
 ==============================================================
 Set the URI protocol of the route event controller.
 This item determines which server global should be used to retrieve the URI string.  
 The default setting of 'QUERY_STRING' works for most servers.

 'QUERY_STRING'  : Use the definition ROUTER_URI_QUERY_STRING configuration.
 'PATH_INFO'     : Use the server PATH_INFO information configuration.

 WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
 Example :
 define('ROUTER_URI_PROTOCOL', 'QUERY_STRING');
 ==============================================================
 */
define('ROUTER_URI_PROTOCOL', 'QUERY_STRING');
/*
 ==============================================================
 Set the URI to receive the query string of the route event controller.
 Example :
 define('ROUTER_URI_QUERY_STRING', 'r');
 ==============================================================
 */
define('ROUTER_URI_QUERY_STRING', 'r');
/*
 ==============================================================
 Set whether the URL starting from index.php/ is treated as an 400 bad request error when using the URI PATH_INFO protocol.
 Example :
 define('ROUTER_URI_PATH_INFO_NORM', false);
 ==============================================================
 */
define('ROUTER_URI_PATH_INFO_NORM', false);
/*
 ==============================================================
 Defines the name of the function to which the route points.
 $ROUTES_CONF[ Route Name ] = Command Array;
 Route Name : The value passed through the URL.
 Command Array : Execute the command.
 Command Format : array ('-e' => event path name, '-c' => class name, '-f' => function name, '-a' => function argument array);
 Example:
 $ROUTES_CONF['example'] = array ('-e' => 'example', '-c' => 'example_c', '-f' => 'index', '-a' => array ('test', 'go'));
 Analyze :
 Route Name => example
 Command -e event path name => example
 Command -c class name => example_c
 Command -f function name => index
 Command -a function argument 1 => test
 Command -a function argument 2 => go
 ==============================================================
 */
$ROUTES_CONF = array ();
$ROUTES_CONF[''] = array ('-e' => 'home');
$ROUTES_CONF['example'] = array ('-e' => 'example', '-c' => 'example_c', '-f' => 'index', '-a' => array ('test', 'go'));

//==============================================================
return $ROUTES_CONF;
?>
