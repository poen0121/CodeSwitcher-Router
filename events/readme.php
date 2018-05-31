<?php
/*
>> Controller

	Events script directory relies on the version control mechanism.

	Responsible for forwarding the request to process the request.

>> Set Directory Version

	File Structure :

	events
	└── main directory
		├── 1.0.1
		│	└── main.inc.php
	  	├── ini
		│	└── 1.0.1
		│		└── version.php
		└── index.php

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

	Step 6 : Create link file `index.php` in the main directory to display the page.
	Note : This is not necessary unless you have to create a link to display the page.
	-----------------------------------------------------
	<?php
	chdir(dirname(__FILE__));
	include('../../core/main.inc.php');
	csl_mvc::start();
	?>
	-----------------------------------------------------

	Step 7 : URL call format.

	domain / events / events script directory link file path
	eg :
	-----------------------------------------------------
	example.com/events/example/index.php
	-----------------------------------------------------

>> Revision Rule

	[Main version number] . [Minor version number] . [Revision number]

	#Main version number:
	A major software updates for incremental , usually it refers to the time a major update function and interface has been a significant change.
	 
	#Minor version number:
	Software release new features , but does not significantly affect the entire software time increments.
	 
	#Revision number:
	Usually in the software have bug , bug fixes released incremented version.

	Example :
	Version : 0.0.0
	Version : 1.0.0
	Version : 1.0.1
	Version : 1.1.0
	Version : 2.0.0
	Version : 2.0.1
	Version : 2.1.0

>> Framework Usage Function

	Note: csl_mvc::start function only be called within the events script directory index.php file.

	==============================================================
	Returns the version number when the script file was loaded form the CodeSwitcher events directory.
	Usage : csl_mvc::start();
	Return : string
	Return Note : Returns FALSE on error.
	--------------------------------------------------------------
	Example :
	csl_mvc::start();
	Output >> 1.0.1
	==============================================================

	==============================================================
	Returns the version number when the event file was loaded form the CodeSwitcher events directory.
	Usage : csl_mvc::import_event($model);
	Param : string $model (model name)
	Return : string
	Return Note : Returns FALSE on error.
	--------------------------------------------------------------
	Example :
	csl_mvc::import_event('home');
	Output >> 1.0.1
	==============================================================

	==============================================================
	Get the available version info from the file directory path name of the CodeSwitcher root directory.
	Usage : csl_mvc::version($pathName,$mode);
	Param : string $pathName (path name in framework)
	Param : string $mode (returns directory relative path or version number) : Default false
	Note : $mode `true` is returns directory relative path.
	Note : $mode `false` is returns version number.
	Return : string
	Return Note : Returns FALSE on error.
	--------------------------------------------------------------
	Example :
	csl_mvc::version('events/example');
	Output >> Version Number
	Example :
	csl_mvc::version('events/example',TRUE);
	Output >> Directory Relative Path
	==============================================================

	==============================================================
	Captures the name of the script event that is currently running.
	Usage : csl_mvc::script_event();
	Return : string
	Return Note : Returns FALSE on failure.
	--------------------------------------------------------------
	Example : __FILE__ >> /var/www/events/example/index.php
	csl_mvc::script_event();
	Output >> example
	==============================================================

	==============================================================
	Returns whether the event index page file exists from the events script directory path name of the CodeSwitcher root directory.
	Usage : csl_mvc::is_portal($eventName);
	Param : string $eventName (events script directory path name)
	Return : boolean
	Return Note : FALSE when it fails or does not exist.
	--------------------------------------------------------------
	Example :
	csl_mvc::is_portal('example');
	Output >> TRUE
	Example :
	csl_mvc::is_portal('home');
	Output >> TRUE
	==============================================================

	==============================================================
	Returns whether the event controller file exists from the events script directory path name of the CodeSwitcher root directory.
	Usage : csl_mvc::is_event($eventName);
	Param : string $eventName (events script directory path name)
	Return : boolean
	Return Note : FALSE when it fails or does not exist.
	--------------------------------------------------------------
	Example :
	csl_mvc::is_event('example');
	Output >> TRUE
	Example :
	csl_mvc::is_event('home');
	Output >> TRUE
	==============================================================

*/
?>