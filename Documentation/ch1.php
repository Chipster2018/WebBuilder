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
<h1>Chapter 1: Setting up Web Builder</h1>
<p>So, setting up Web Builber is realatively simple. You just need to follow these steps.</p>
<h3>Step 1: Clone the repository</h3>
<p>So, the first part is to download the code, of course. Hopefully you know how to do that already. If not, it's really simple. Just click the green download on the repository. Github
will handle most everything else from there.</p>

<p>If you have git, you can use that to clone as well.</p>

<p>Make sure unpack/clone the code in the htdocs folder on your web server or equivalent. If you
want webbuilder installed in a sub-directory of the htdocs folder, you should unpack it in that dorectory</p>
<h3>Step 2: Configure boot.php</h3>
<p>The next thing you will need to do is make some minor tweaks to the boot.php</p>
<h4>$WB_ROOT</h4>
<p>The first thing you need to do is change $WB_ROOT. This is a Web Builder global var of which all modules build off of. This needs to be set to the path from htdocs to the directory of 
installation. That is to say, if Web Builder is installed in www/htdocs/my/path/to/webbuilder/, 
then $WB_ROOT="my/path/to/webbuilder/";</p>
<h4>$WB_MOD_ROOT</h4>
<p>Next is $WB_MOD_ROOT. $WB_MOD_ROOT is the directory that holds all the module code. It needs
to be set to $WB_ROOT . "path/to/my/modules/folder/"; By default, this is "modules/". If you are
keeping this setup, you can ignore this part or the step. If you are changing the module path,
you will need to change it here.</p>
<p><b>NOTE:</b> For documentation purposes, we will assume you are using the default modules folder!
</p>
<h3>Step 3: Configure config.ini</h3>
<p>The next thing you need to do is set up your config.ini. This is located in modules/ini/. This
file contains most of the needed configuration (more on this in the future). You will need to 
change the following options in the "Site" portion of the config file.</p>

<p><b>WARNING:</b> config.ini will contain some potentially damaging information to your site. 
Future updates will create some more security for this file. However, for now, I have hidden it 
deep in the directory tree as a precaution. I still reccomend that you find a better way to 
secure this file!</p>

<li>href</li>
<p>href will need to be the url of the Web Builder installation</p>
<li>name</li>
<p>Here is where you need to set the name of your website. This will be used in the page title by default.</p>
<p>And that finishes installation. There is a lot more you can do with the config.ini, even in the
site section, but that's really all you need to get installed. The rest will come later.

<?php
/*------------------------End Content---------------------------------*/

preNextBar("index.php","ch2.php");

?>