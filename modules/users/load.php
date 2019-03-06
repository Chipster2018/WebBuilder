<?php
/*****************************************/
/* 
Web Builder User Manager
Nathan Black
Version 0.0.0

This module creates a user handler that can be queried for user data.
*/
// 12-27-18

global $config;
global $WB_MOD_ROOT;

// the tmanager main root
$WB_USERS_ROOT = $WB_MOD_ROOT . "users/"; 

// load the classes
include($WB_USERS_ROOT . "classes/user.php");
include($WB_USERS_ROOT . "classes/usermanager.php");

// the user table
$usertable = new Table($db,"user");

// the user session manager
$usersessionmanager = new SessionManager("User");

// the usermanager
$usermanager = new UserManager($usertable, $usersessionmanager); 

