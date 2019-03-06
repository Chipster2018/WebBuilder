<?php
/*****************************************/
/* 
Web Builder
Documentation Module
Nathan Black
Version 0.0.0

This module is really only used for the documentation. There's only really one useful function 
located here as of right now, and that's the preNextBar function.
*/

// 6-8-18

// load the pre and next bar given the 
function preNextBar($pre, $next) {
?>
<style>
.preBar {
	float:left;
}
.nextBar {
	float:right;
}
.clearFloat {
	float:clear;
}
</style>
<div class="preBar"><a href="<?php echo $pre; ?>">Pre</a></div>
<div class="nextBar"><a href="<?php echo $next; ?>">Next</a></div>
<div class="clearFloat"></div>
<?php
}