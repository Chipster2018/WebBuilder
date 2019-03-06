<?php
/*****************************************/
/* 
Web Builder
sample.php
Nathan Black
Version 0.0.0

This is a sample page that shows how to load webbuilder. Any content after
global $page will show up in the content part of the template. No other
function calls necessary.

Feel free to take my name off this file and put your own! 
*/

// 6-8-18

$_SERVER['SCRIPT_FILENAME'] = __FILE__;
include_once("boot.php");

global $page;

/*------------------------Content Below Here-------------------------*/
?>
<h1>Bugs</h1>
<p>This is a list of known bugs. Feel free to tell me of any I have missed.</p>
<h3>Config.ini security bug</h3>
<p>As I have tried to mention multiple places, <b>there is a known security bug</b> related to
config.ini! We are working to come up with a solution and should have a fix in the next update.</p>
<p>In the mean time, please be advised that config.ini contains some potentially damaging 
information, and is accessible from the outside world! As a precaution, we have put this 
file in a place that would be hard to find by attackers, but this is not a permanent solution.
Attackers can still find this file if they know what they are doing.</p>
<p>If you wish to close this hole until we do, you can make sure that ini files are not served on
your server. This should close any security holes related to config.ini</p>


<?php
/*------------------------End Content---------------------------------*/

preNextBar("changelog.php","todo.php");

?>