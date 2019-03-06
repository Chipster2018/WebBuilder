<?php
/*****************************************/
/* 
Web Builder Ini
Nathan Black
Version 0.0.0

This module creates a useable ini config file
*/

// 5-10-18

// the main root
$WB_INI_ROOT = $WB_MOD_ROOT . "ini/";

// set the main ini file if it is not already set
if(!isset($WB_INI_MAIN_INI)) {
	$WB_INI_MAIN_INI = $WB_INI_ROOT .  "config.ini";
}
// the classes
require($WB_INI_ROOT . "classes/ini.php");

// the functions
require($WB_INI_ROOT . "misc.php");
require($WB_INI_ROOT . "config.php");



?>