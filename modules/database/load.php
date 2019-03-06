<?php
/*****************************************/
/* 
Web Builder Database
Nathan Black
Version 0.0.0

This module allows for and sets up database access.
*/
// create boot string
define("WB_Database_BOOT","Booted");

// load needed
include("classes/database.php");
include("classes/table.php");

if(isset($config["database"]["host"])) {
	$host = $config["database"]["host"];
} else {
	$host = "localhost";
}

if(isset($config["database"]["dbname"])) {
	$dbname = $config["database"]["dbname"];
} else {
	$dbname = "quizmaster_db";
}

if(isset($config["database"]["username"])) {
	$username = $config["database"]["username"];
} else {
	$username = "QMaster";
}

if(isset($config["database"]["pwd"])) {
	$pwd = $config["database"]["pwd"];
} else {
	$pwd = "QL|izM3";
}

$db = new Database($host,$dbname,$username,$pwd);
//$db = new Database("localhost","quizmaster_db","QMaster","QL|izM3");

?>
