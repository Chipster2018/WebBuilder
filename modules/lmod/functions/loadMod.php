<?php
/*****************************************/
/* 
Web Builder Load Module
Load Mods
Nathan Black
Version 0.0.0

This file loads the modules in the global $modspath

8-16-18

TODO: Add backtrace counter for $modfqn too, just to not walk
on ourselves.

Also TODO: Comment this more thouroughly
*/
// 6-14-18

global $loaded;

//echo "Mod $mod:<BR>\n";

// set up the fully qualified domain name
$modfqn = getfqn($mod);
$moddependencies = getdepenencies($mod);

//echo count(debug_backtrace()) . "<br>\n";
//var_dump(debug_backtrace());

// set up an oldmod var that we can get to, because,
// quite frankly, I designed this poorly and mande it
// walk on itself. This is a work around of sorts--as
// it is my current solution to the problem--anyone reading
// this in the future, please advise on how I can accomplish
// this better. I will warn you, this module was tricky to
// write, as I couldn't find a way to load the mods from
// regular functions without the mods going out of scope.
// Yeah, aparaently PHP allows for functions inside functions
// which can go out of scope with the load function. Not very
// happy about that. That makes things like module loading
// much harder than it should be.

// Anyway, all of that to say, if you have a better way to do
// this, I'm open to suggestions
$oldmod[count(debug_backtrace())] = $mod;
// DEBUG
//var_dump($moddependencies);

// first, load the dependencies
foreach($moddependencies as $mod => $throwaway) {
	// DEBUG PRINTOUT
//	echo "Dependency $mod.<br>\n";
	if(!isset($loaded[$mod])) {
	// DEBUG PRINTOUT
//		echo "Trying to load depencency $mod.<br>\n";
		// load the mod
		include ($WB_LMOD_ROOT . "functions/loadMod.php");
		// DEBUG: set loaded flag here
//		$loaded[$mod] = true;

	}
}
// now, we have to un-walk ourselves
// again, future reader, please advise
$mod = $oldmod[count(debug_backtrace())];

// reset the mod fqn because, again, we walked on ourself
// when we loaded dependencies, which menas the fqn is
// now corrupt, so let's un-corrupt it

// Also, NOTE: We could just do this down here anyway, 
// instead of both places. It's not like we really need
// it up there anyway
$modfqn = getfqn($mod);

// Now, if the file exists,
if(file_exists($modfqn)) {
	// and we haven't loaded this mod yet,
	if(!isset($loaded[$mod])) {
		// open it
//		echo "Loaded mod $mod.<br>\n";
		include ($modfqn);
//		echo "modfqn: " . $modfqn . "<BR><BR>\n\n";
	}
} else {
	?> ERROR: Could not load module <?php echo $mod; ?>!<br>
	No such file <?php echo $modfqn; ?>!<br>
	Please contact your Administrator.<br>

	<?php
	
}
//echo "Set up mod load flag for mod $mod!<br>\n";
// set the flag that we've loaded the mod
$loaded[$mod] = true;