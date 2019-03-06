<?php
/*****************************************/
/* 
Web Builder Session
Session Manager Class
Nathan Black
Version 0.0.0

This class is responsible for running the session.
*/

// 8-16-18

class SessionManager {
	private $prefix; // the 
	
	// the constructor
	function __construct($prefix) {
	
		$this->prefix = $prefix;
		
		// first, start the session, if it hasn't been already
		if($this->is_session_started() === FALSE) session_start();	
		
	}
	
	// Sample function from online to tell if a session has already
	// started
	function is_session_started() {
    	if ( php_sapi_name() !== 'cli' ) {
        	if ( version_compare(phpversion(), '5.4.0', '>=') ) {
        	    return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        	} else {
        	    return session_id() === '' ? FALSE : TRUE;
    	    }
    	}
    	return FALSE;
	}

	
	// functions to set and get session vars
	function getVar($key) {
		/*
		echo "Key: " . $key . "<BR>\n";	
		echo '$_SESSION["QM"][$key]: ' . $_SESSION["QM"][$key] . "<BR>\n";//*/
		return $_SESSION[$this->prefix][$key];	
	}
	
	function setVar($key,$value) {
		$_SESSION[$this->prefix][$key] = $value;	
		/*
		echo "Key: " . $key . "<BR>\n";	
		echo "Value: " . $value . "<BR>\n";	
		echo '$_SESSION["QM"][$key]: ' . $_SESSION["QM"][$key] . "<BR>\n";//*/
	}
	
	// unsets the session var
	function unsetVar($key) {
		unset($_SESSION[$this->prefix][$key]);	
	}
	
	// checks to see if the session var is set
	function issetVar($key) {
		return isset($_SESSION[$this->prefix][$key]);	
	}
	
	// function to empty session vars
	function emptyVars() {
		$_SESSION[$this->prefix] = array();
		unset($_SESSION[$this->prefix]);
		
	}

	// cookie functions
	
	// function to get a cookie
	function getCookie($key) {
		// unserialize the cookie
		return $_COOKIE[$this->prefix . "_" . $key];
	}
	function setCookie($key,$value,$time) {
		// convert $time to seconds
		$today = new DateTimeImmutable;
		$todayAndInterval = $today->add($time);
		
		$seconds = $todayAndInterval->getTimestamp() - $today->getTimestamp();
			
		// set the cookie
		setcookie($this->prefix . "_" . $key,$value,time()+$seconds); 
	}
	// unsets the key with the 
	function unsetCookie($key) {
		// get the cookie
		unset($_COOKIE[$this->prefix . "_" . $key]);
		
	}
	// is the key set
	function issetCookie($key) {
		// set the key
		return isset($_COOKIE[$this->prefix . "_" . $key]);
	}
	
	// functions for the action
	function setAction($a) {
		$_REQUEST[$this->prefix . "_action"] = $a;	
	}

	function getAction($default) {
	
		/*if(issetQMAction()) {
		//	echo "Session";
			return getQMVar("action");	
			// if our action is set
		} else*/ if(isset($_REQUEST[$this->prefix . "_action"])) {
			//echo "Request";
			return $_REQUEST[$this->prefix . "_action"];
		} else {
			//echo "Default";
			return $default;	
		}
	}

	function issetAction() {
		return isset($_REQUEST[$this->prefix . "_action"]);
	}

	function unsetAction() {
		unset($_REQUEST[$this->prefix . "_action"]);	
}

	
};


