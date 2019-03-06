<?php
//echo "Boot: Main Level<br>\n";

// 5-10-18

// You will want to change this to the main directory this installation is running out of.
$WB_ROOT = $_SERVER['DOCUMENT_ROOT'] . "/WebBuilder_git/";

// Generally, you don't want to change this, but if your mods are someplace other than modules/, 
// you'll definitely want to change it
$WB_MOD_ROOT = $WB_ROOT . "modules/";


// Define boot string
define("WB_BOOT","booted");

// functions
require_once("functions.php");

// If we are the main, exit
hideIfMain(__FILE__);

// load modules

// load ini, as that is needed by lmod, so load it manually
require_once ($WB_ROOT . "modules/ini/load.php");

// load lmod
// lmod will load everything else
require_once ($WB_ROOT . "modules/lmod/load.php");
