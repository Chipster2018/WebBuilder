<?php
/*****************************************/
/* 
Web Builder User Manager
User Class
Nathan Black
Version 0.0.0

This creates an interface with the $db to query user information
*/
// 12-27-18

class UserManager {
	private $usertable;
	private $usersessionmanager;
	
	function __construct(&$usertable, &$usersessionmanager) {
		$this->usertable =& $usertable;
		$this->usersessionmanager =& $usersessionmanager;
		
		// if we don't have current user set
		if(!$this->usersessionmanager->issetVar("CurrentUser")) {
			// set to the defaul user
			$this->SetCurrentUser(1);	
		}
	}
	
	function GetUser($id, $mode="ID") {
		// first, get the data
		$data = $this->usertable->select(array("*"), "User$mode=:$mode", array("$mode" => $id));
		
		// DEBUG
		//var_dump($data);
		if(count($data)) { // if we have data)	
			// create a new user obj and set the data
			$user = new User($data[0]["UserID"]);
		
			$user->SetUsername($data[0]["UserUsername"]);
			$user->SetPassword($data[0]["UserPassword"]);
			$user->SetEmail($data[0]["UserEmail"]);
			$user->SetFirstName($data[0]["UserFirstName"]);
			$user->SetLastName($data[0]["UserLastName"]);		
		} else {
			// create an empty user
			$user = new User(0);	
		}
		return $user;
	}
	
	function GetCurrentUser() {
		// DEBUG: Echo the current user
		//echo $this->usersessionmanager->getVar("CurrentUser");

		return $this->GetUser($this->usersessionmanager->getVar("CurrentUser"));	
		
	}
	
	function SetCurrentUser($id) {
		$this->usersessionmanager->setVar("CurrentUser",$id);	
	}
	
};

