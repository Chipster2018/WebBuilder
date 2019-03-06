<?php
/*****************************************/
/* 
Web Builder Load Module
Load Mods
Nathan Black
Version 0.0.0

This file loads the modules in the global $modspath
*/

// 6-14-18

global $WB_LMOD_LOAD_FILE;
global $WB_LMOD_ROOT;

$loaded = array("ini" => true,"lmod" =>true); // empty this, so this can be included many times
$result = true;	// whether we sucessfully loaded everything

// get all the names of the modules to load
$mods = getLastSegmentOfPaths(
			array_diff(
				glob($modspath . '*', GLOB_ONLYDIR), array(".", "..")
			)
		);
	//	echo "<pre>"; var_dump($mods); echo "</pre>";

//for every module
foreach($mods as $mod) {
	// load the mod
	include ($WB_LMOD_ROOT . "functions/loadMod.php");

}


return $result;










