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

class User {
	private $id;
	private $username;
	private $pwd;
	private $email;
	private $fname;
	private $lname;
	
	function __construct($id) {
		$this->id = $id;
		$this->username = "";
		$this->pwd = "";
		$this->email = "";
		$this->fname = "";
		$this->lname = "";
		
		
	}
	
	function GetID() {
		return $this->id;
	}
	function SetID($id) {
		$this->id = $id;
	}
	
	function GetUsername() {
		return $this->username;
	}
	
	function SetUsername($uname) {
		$this->username = $uname;
	}
	
	function GetPassword() {
		return $this->pwd;
	}
	function SetPassword($pwd) {
		$this->pwd = $pwd;
	}
	function GetEmail() {
		return $this->email;
	}
	function SetEmail($email) {
		$this->email = $email;
	}

	function GetFirstName() {
		return $this->fname;
	}
	function SetFirstName($fname) {
		$this->fname = $fname;
	}

	function GetLastName() {
		return $this->lname;
	}
	function SetLastName($lname) {
		$this->lname = $lname;
	}
	
};
