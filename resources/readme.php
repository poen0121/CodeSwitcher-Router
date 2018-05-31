<?php
/*
>> Resources

	The storage resources directory version control mechanism is optional.

	Developers can put the resources in this directory.

	Files that need to be publicly accessible.

	eg:
	--------------------------------------------------------------
	JavaScript files.
	CSS files.
	Image files.

>> Set Directory Version

	File Structure :

	resources
	└── main directory
		├── 1.0.1
		│	└── resource file
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

	Step 4 : Create a directory such as `1.0.1` version and place your files here.


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
	csl_mvc::version('resources/example');
	Output >> Version Number
	Example :
	csl_mvc::version('resources/example',TRUE);
	Output >> Directory Relative Path
	==============================================================

*/
?>