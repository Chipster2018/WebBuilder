<?php
/*****************************************/
/* 
Web Builder Load Module
Nathan Black
Version 0.0.0

This module loads modules 
*/

// 6-14-18

// the main root
$WB_LMOD_ROOT = $WB_MOD_ROOT . "lmod/";

// the folder for the modules
if(isset($config["lmod"]["modfolder"])) {
	// if it is configured,
	// use the ini configuration
	$WB_LMOD_MODULE_FOLDER = $config["lmod"]["modfolder"];
} else {
	// use the lmod root/modules
	$WB_LMOD_MODULE_FOLDER = $WB_ROOT . "modules/";
}

// the startup file for the modules
if(isset($config["lmod"]["modloadfile"])) {
	// if it is configured,
	// use the ini configuration
	$WB_LMOD_LOAD_FILE = $config["lmod"]["modloadfile"];
} else {
	// use the lmod root/modules
	$WB_LMOD_LOAD_FILE = "load.php";
}

// the startup file for the modules
if(isset($config["lmod"]["modloadini"])) {
	// if it is configured,
	// use the ini configuration
	$WB_LMOD_DEPENCENCIES_INI = $config["lmod"]["modloadini"];
} else {
	// use the lmod root/modules
	$WB_LMOD_DEPENCENCIES_INI = "deps.ini";
}


// include some needed functions
include ($WB_LMOD_ROOT . "functions/modloadingfunctions.php");

// load the mods
$modspath = $WB_LMOD_MODULE_FOLDER;
include ($WB_LMOD_ROOT . "functions/loadMods.php");

//loadMods($WB_LMOD_MODULE_FOLDER);

