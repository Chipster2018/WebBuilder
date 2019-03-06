<?php
/*****************************************/
/* 
Web Builder Main
Ini class
Nathan Black
Version 0.0.0

This file has some miscalaneous functions useful for
all files

*/

class Ini implements IteratorAggregate, ArrayAccess {
	private $ini;
	
	// constructor
	function __construct ($file) {
		// make ini = to the parsed version of the array
		$this->ini = parse_ini_file($file,true);
		
	}
	/*********************************
	Interfaces */
	
	// IteratorAggregate
	
	function getIterator() {
		// return the ini aray as an iterator
		return new ArrayIterator($this->ini);	
	}
	
	// ArrayAccess
	function offsetExists($offset) {
		return isset($this->ini[$offset]);
	}

	function offsetGet($offset) {
		return isset($this->ini[$offset]) ? 
			$this->ini[$offset] : 
			NULL;
	}

	function offsetSet($offset,$value) {
		if($offset == NULL) {
			$this->ini[] = $value;	
		} else {
			$this->ini[$offset] = $value;		
		}
	}
	
	function offsetUnset($offset ) {
		unset($this->ini[$offset]);	
	}
	
	/*********************************
	other */
	
	// function to add configuration
	function addConfigurationFile($file) {
		// use the array merge function to add
		$this->ini = mergeOverwriteArray($this->ini, parse_ini_file($file,true));
		
	}
	
	
};