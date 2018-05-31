<?php
/*
>> Configs

	The configs directory support version control mechanism.

	Development configuration settings related data.

	It's possible to return values from included files.

	Returns FALSE to terminate the load file.

	The configs/cs directory is the system configuration for the CodeSwitcher framework.

	The configs/cs directory does not support test develop mode in the csl_mvc::cue_config or csl_mvc::version function.

>> Set Directory Version

	File Structure :

	configs
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

	Step 5 : Create a release directory `1.0.1/main.inc.php` master file and return the configuration settings related data.
	Write at the top of the file :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	-----------------------------------------------------
	eg :
	-----------------------------------------------------
	<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<?php
	return 'Example';
	?>
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

	==============================================================
	Load configuration data form the CodeSwitcher configs directory.
	Usage : csl_mvc::cue_config($model);
	Param : string $model (model name)
	Return : data
	Return Note : Returns FALSE on error.
	--------------------------------------------------------------
	Example :
	csl_mvc::cue_config('example');
	Output >> Example
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
	csl_mvc::version('configs/example');
	Output >> Version Number
	Example :
	csl_mvc::version('configs/example',TRUE);
	Output >> Directory Relative Path
	==============================================================

*/
?>