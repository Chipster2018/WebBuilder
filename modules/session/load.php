<?php
/*****************************************/
/* 
Web Builder Session
Nathan Black
Version 0.0.0

This module handles the current session. Responsible for both
starting the session, storing and retriving variables during
the session, and closing/restarting the session if necessary.
*/
// 8-16-18

//echo "Hello from session!<br>\n";
// the main root
$WB_SESSION_ROOT = $WB_MOD_ROOT . "session/";

include ($WB_SESSION_ROOT . "classes/sessionmanager.php");

?>