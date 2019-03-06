<?php
/*****************************************/
/* 
Web Builder
boot.php (sub-dir variant)
Nathan Black
Version 0.0.0

This is a boot file that allows us to load webbuilder, even if we're in a sub-directory. That way,
all files only need to call boot.php, not ../boot.php, ../../boot.php, etc. This way, not file has
to be aware of its position from boot. It just boots.
*/


// if we haven't booted yet
if(!defined("WB_BOOT")) {
	// check to see if we have a boot path already
	if(!isset($boot_path)) {
		// if not, set one
		$boot_path = "../";
	} else {
		// if we do, let's try up a level this time, and see if it helps
		$boot_path .= "../";		
	}
	
	// try the boot file of the directory above us
	require_once($boot_path . "boot.php");
}