Users Module,

Version: 1.0

Description: A module to handle users authentication

Note: This module does not handle permissions or other data, ONLY the actual autentication and identification. It is up to other
modules to extend this funtionality.

Classes:

User:
A object that represents user data. It contains getters and setters for the following information:

	ID
	Username
	Password
	First Name
	Last Name
	Address

User Manager:
An object responsible for managing all users at the db level.
UserManager contains the following methods:
	GetUser($Identifier/* as a number or username*/, $mode /*boolean that represents ID or name*/) {returns a user object with data from the  }
	AddUser($user /*as obj*/) {returns boolean for successful execution;}
	UpdateUser($user /*as obj*/) {returns boolean for successful execution;}

	GetCurrentUser() {returns current user as obj}
	SetCurrentUser($ID) {Sets the current user for the environment}

	
	AuthUser($username, $pwd) {/* Compares username and password with the one on file. Returns true if it matches, false if it doesn't*/}



