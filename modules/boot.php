<?php
//echo "Boot: Main Level<br>\n";

// 5-10-18

$WB_ROOT = $_SERVER['DOCUMENT_ROOT'] . "/webbuilder/";
$WB_MOD_ROOT = $WB_ROOT . "modules/";


// Define boot string
define("WB_BOOT","booted");

// functions
require_once("functions.php");

// load modules

// load ini, as that is needed by lmod, so load it manually
require_once ($WB_ROOT . "modules/ini/load.php");

// load lmod
// lmod will load everything else
require_once ($WB_ROOT . "modules/lmod/load.php");
