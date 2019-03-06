<?php
/*****************************************/
/* 
Web Builder Main
misc.php
Nathan Black
Version 0.0.0

This file has some miscalaneous functions useful for
all files

*/

// function to merge an ini configuration
function overwriteMergeArray ($old, $new) {
	// for every key in the ini
	foreach ($new AS $k => $v) {
		// if we are an array
		if (is_array($v)) {
			// merge the old and new ini
			$old[$k] = ini_merge_overwrite($old[$k], $new[$k]);
		} else {
			// otherwise,
			//just overwrite the old with the new
    		$old[$k] = $v;
		}
	}
	
	// return the overwritten ini
	return $old;
}




?>