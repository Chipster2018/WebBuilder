<?php
/*****************************************/
/* 
Web Builder Template Manager
Nathan Black
Version 0.0.0

This module creates a template handler that places all echo statements into the perfect place in the template
*/
// 5-10-18
global $loaded;
// debug: Just jum out if we are loaded twice
// TODO: Fix error in Ini/Lmod. Not exactly sure where it
// is. For now, this is a work around
//echo "Hello from Tmanager!<br>\n";
//if(isset($loaded["tmanager"])) return;
//$loaded["tmanager"] = true;

global $config;
global $WB_MOD_ROOT;

// the tmanager main root
$WB_TMAN_ROOT = $WB_MOD_ROOT . "tmanager/"; 
// the interfaces
include($WB_TMAN_ROOT . "interfaces/menuOption.php");

// the classes
include($WB_TMAN_ROOT . "classes/page.php");

if(isset($config["site"]["name"])) {
	$sitename = $config["site"]["name"];
} else {
	$sitename = "WebBuilder";
}
if(isset($config["site"]["scripts"])) {
	$scripts = explode(", ", $config["site"]["scripts"]);
} else {
	$scripts = array();
}
if(isset($config["site"]["styles"])) {
	$styles = explode(", ", $config["site"]["styles"]);
	
	// add the absolute path to the script file name
	foreach ($styles as $k => $style) {
		$styles[$k] = $config["site"]["href"] . $style;
	}
	
} else {
	$styles = array();
}


$page = new Page($sitename,$scripts,$styles);

// template

// set the name of the template
$page->setTemplateName("default");

// Pre-load the template
require_once($WB_TMAN_ROOT . "templates/" . $page->getTemplateName() . "/preload.php");

// start listening
$page->startContentListen();
?>