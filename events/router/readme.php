<?php
/*
>> Information

	Title		: router controller
	Notes		:

	Revision History:
	Revision		When			Create		When		Edit		Description
	---------------------------------------------------------------------------
	1.0.1			07-10-2017		Poen		08-20-2018	Poen		Create the program.
	---------------------------------------------------------------------------

>> About

	Hide script file path information, through the router control script.

	The developer uses the execution commands used by the router profile definition.

>> Enabled

	Directory : configs/cs

	Set the CodeSwitcher framework introduction page using the controller script directory name.

	$CS_CONF['INTRO'] = 'router';

>> Main Directory

	1.configs/routes : System configuration for the routes.

	2.events/router : Router controller script.

	3.templates/error/400 : System error templates.

>> Configuration

	Directory : configs/routes

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
 
	==============================================================
	Set the URI to receive the query string of the route event controller.
	Example :
	define('ROUTER_URI_QUERY_STRING', 'r');
	==============================================================

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

>> URL

	URI protocol : QUERY_STRING
	
	Format : www.example.com/index.php?ROUTER_URI_QUERY_STRING=[routes index]

	Example : www.example.com/index.php?r=example
	
	URI protocol : PATH_INFO
	
	Format : www.example.com/index.php/[routes index]
	
	Example : www.example.com/index.php/example
	-----------------------------------------------------
	Remove the index.php file by default, the index.php file will be wrapped into your URLs:
	
	www.example.com/index.php/example
	
	If your Apache server has mod_rewrite enabled, you can easily remove the string and use simple rules to modify .htaccess.
	
	.htaccess file :
	-----------------------------------------------------
	# Apache rewrite URL configuration
	
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php/$1 [L]
	-----------------------------------------------------
	
	Assuming you are using an Nginx server, please refer to the settings below:
	
	nginx.conf file :
	-----------------------------------------------------
	# Nginx rewrite URL configuration
	
	location / {
	  if (!-e $request_filename){
	    rewrite ^(.*)$ /index.php/$1 break;
	  }
	}
	-----------------------------------------------------
	
	Note : These specific rules may not apply to all Server configuration work.
	
>> CLI
	
	Format : $ php /var/www/index.php [routes index] argv...
	
	Example : $ php /var/www/index.php example

>> Note

	Routes config : $ROUTES_CONF[]

	Command -e event path name is must exist.

	Command -c class name can be customized to use.

	Command -f function name can be customized to use.

	Command -a function argument array can be customized to use.

>> Event Script Development

	File Structure :

	events
	└── main directory
		├── 1.0.1
		│	└── main.inc.php
	  	└── ini
			└── 1.0.1
				└── version.php

	Step 1 : Create a main directory.

	Step 2 : Create `ini` version directory such as `ini/1.0.1`.

	Step 3 : Create limit version file as `ini/1.0.1/version.php`.
	Write at the top of the file :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	-----------------------------------------------------
	eg :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<?php
	return '1.0.1';
	?>
	-----------------------------------------------------

	Step 4 : Create a directory such as `1.0.1` version.

	Step 5 : Create a release directory `1.0.1/main.inc.php` master file and coding logic mechanisms.
	Write at the top of the file :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	-----------------------------------------------------

	Step 6 : Coding mechanisms.

	#Normal Mode :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<?php
		coding ...
	?>
	-----------------------------------------------------

	#Function Mode :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<?php
		function funs ( $argument ){
			coding ...
		}
	?>
	-----------------------------------------------------
	1.Build function related code.
		function funs (){
			coding ...
		}
		Command -f function name can be customized to use.
	2.Build function argument related code.
		function funs ( $argument ){
			coding ...
		}
		Command -a function argument array can be customized to use.
	-----------------------------------------------------

	#Class Object Mode :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<?php
		Class Object {
			public function funs ( $argument ){
				coding ...
			}
		}
	?>
	-----------------------------------------------------
	1.Build class object related code.
		Class Object {
			coding ...
		}
		Command -c class name can be customized to use.
	2.Build class object public function related code.
		Class Object {
			public function funs (){
				coding ...
			}
		}
		Command -f function name can be customized to use.
	3.Build class object public function argument related code.
		Class Object {
			public function funs ( $argument ){
				coding ...
			}
		}
		Command -a function argument array can be customized to use.
	-----------------------------------------------------

 */
?>
