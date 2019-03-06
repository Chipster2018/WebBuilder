<?php
/*****************************************/
/* 
Web Builder Template Manager
Menu Interface
Nathan Black
Version 0.0.0

Since each template will handle menus differently,
it is probably best to create an interface instead,
and allow it to be used by the page class
*/
// 5-11-18

// the Menu Option interface
interface MenuOption {
	
	// the bare minimum attributes
	function setName($n);
	function getName();
	function setHREF($h);
	function getHREF();
	
	// a string containing the html that makes up
	// the menu
	function getOptionHTML();
};

// the sub-menu interface
interface SubMenuOption extends MenuOption,
								 ArrayAccess,
								 Traversable {
	// That is it. By merging all of these interfaces,
	// we get everything we need to be a submenu

};
