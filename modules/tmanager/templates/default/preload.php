<?php
/*****************************************/
/* 
Web Builder Template Manager
Default Template
Pre-load
Nathan Black
Version 0.0.0

This is the default template. You can use this as a model to make other templates.

This file is called during the init phase. Do setup here.
*/
// 8-9-18

global $config;
global $WB_TMAN_ROOT;

$TMAN_TEMPLATE_ROOT = $WB_TMAN_ROOT . "/templates/default/"; // obviously your path here

// the needed classes for the menu
require_once($TMAN_TEMPLATE_ROOT . "default-menu.php");

// the menu

/*
NOTE: Each template is responsible for creating it's own menus
To be more flexible, make sure to use the menu defined in $config,
as that is where most admins will expect to look for this configuration
*/

// TODO: make this configurable
// Make a tman option, and all templates look at the tmanager option and paarse
// it for themselves
/*
	// All templates will look at $config["tmanager"]["menu"]
	// and perform something similar to the following:
	foreach($options as $option} {
		$page->addMenuItem(0,new MyMenuOption($option,$href));	
	}


*/
// ^^ WARNING: ABOVE NOT PROPERLY IMPLEMENTED YET
// Hard coded instead
$page->addMenuItem(0,new DefaultMenuOption("Home","index.php"));

?>