<?php
/*****************************************/
/* 
Web Builder Template Manager
Default Template
Template Load
Nathan Black
Version 0.0.0

This is the default template. You can use this as a model to make other templates.

Load the actual template
*/
// 8-9-18

global $page;
global $config;

?>
<html>

<head>
    <title><?php echo $page->getTitle();?></title>
    <?php 
	// get the scripts
	echo $page->getScriptString() . "\n";
	// get the styles
	echo $page->getStyleString();
	?> 
    
</head>

<body <?php echo $page->getBodyTag();?>>
<div id="all">
	<!-- Header -->
	<div class="header">
		<img class="header-image" alt="Header Image" src="<?php echo $config["site"]["href"]; ?>images/logo.png">
	    <ul class="top-menu">
    		<?php
			// use the list menu items
			foreach($page->getMenu(0) as $m) {
				echo $m->getOptionHTML();
			}
			?>
	    </ul>
	</div>    
	<div id="content">
	<?php echo $page->getContent(); ?>
	</div>
</div>

</body>

</html>