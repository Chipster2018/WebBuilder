<?php
/*****************************************/
/* 
Web Builder
functions.php
Nathan Black
Version 0.0.0

This is has a couple of functions that are useful for the whole site, but don't
really belong to a particular module.

HideIfMain() is a function designed to send a 404 error when the user tries to
access the backend code directly. This can help tighten security, and can make
users unaware that backend stuff (like boot.php) exist. It looks cleaner that 
way.

BeginsWith() is a nice function that returns a boolean of whether a string begins with another
string. This was part of the quizmaster code. I brought it over because a lot of the code 
originally used it quite a bit. After refactoring the code, I realize that no modules need it
anymore. However, it's a really nice function, so I'm keeping it.
*/

function hideIfMain($filename) {
	if ( basename($filename) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
	include("errors\\404.php");
	exit();
}
	
}

// If we are the main, exit
hideIfMain(__FILE__);

// function to check if a given string ($haystack) starts
// with another string ($needle)
function beginsWith($needle,$haystack) {
	return substr($haystack,0,strlen($needle)) == $needle;
}
