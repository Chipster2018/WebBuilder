<?php
/*****************************************/
/* 
Web Builder Template Manager
Default Template Menu
Nathan Black
Version 0.0.0

This class manages all data that pertains to the page menu for default template
*/
// 5-11-18

class DefaultMenuOption implements MenuOption {
	private $name;
	private $HREF;

	function __construct($n, $h) {
		$this->name = $n;
		$this->HREF = $h;
	}

	// the bare minimum attributes
	function setName($n) {
		$this->name = $n;	
	}
	function getName() {
		return $this->name;	
	}
	
	function setHREF($h) {
		$this->HREF = $h;	
	}
	
	function getHREF() {
		return $this->HREF;	
	}
	
	// a string containing the html that makes up
	// the menu
	function getOptionHTML() {
		return "\t\t<li><a href=\"" . $this->HREF . 
					"\">" . $this->name . "</a></li>\n";
	}

};

?>