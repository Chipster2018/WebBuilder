<?php
/*****************************************/
/* 
Web Builder Load Module
Load Mods
Nathan Black
Version 0.0.0

This file loads has some useful functions for module loading
*/

// 6-15-18
function getfqn($modname) {
	global $WB_LMOD_LOAD_FILE;
	global $modspath;

	return "$modspath$modname/$WB_LMOD_LOAD_FILE";	
}

// returns an array of the dependencies
function getdepenencies($modname) {
	global $WB_LMOD_DEPENCENCIES_INI;
	global $modspath;
	$file = "$modspath$modname/$WB_LMOD_DEPENCENCIES_INI";
	
	if(file_exists($file)) {
		return new INI($file);
	} else {
		return array();	
	}
}

function getLastSegmentOfPath($path) {
	$pos = strrpos($path, '/');
	return $pos === false ? $path : substr($path, $pos + 1);	
}

function getLastSegmentOfPaths($paths) {
	foreach($paths as &$path) {
		$path = getLastSegmentOfPath($path);
	}
	
	return $paths;
}

