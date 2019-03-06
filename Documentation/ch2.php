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
<h1>Building your site.</h1>
<p>Okay, so now that you're installed, everything should be running. The next step will be to 
build your site.</p>
<p>The first thing you need to do, is create a php file. We have a sample page packaged with this
code, so what I recommend you do is copy that, paste it into the directory and rename it to 
something like "example.php"</p>
<p>Now, edit the file. You will notice a part of the sample page that has "Content here". Really, 
building your website is as simple as adding content right in that block. Sure, you can do things 
like process forms, query the database, etc. But really, you can just start writing.</p>
<p>Fow now, I recommend just saying something like "Hello World!" and clicking save. 
Congratulations! You've just made the first page of your web site. Now, in a web browser, type the
URL. If everything is working, you should see the content "Hello World!" placed smack in the 
middle of a template.</p>
<p>Before we finish this chapter, I would like to say that once you're here, you have a whole 
library of functions available to you that will make your life easier. We'll go over them all
eventually. Just keep reading. For now, here are a few to get you started.</p>
<h3>$page->setTitle($title)</h3>
<p>One thing you might want to do is set the title of the page. The default title is the name of 
your web site, but you can change it if you like. In our example, anytime after the content line,
but in a php block, add the line $page->setTitle("Test"); and hit save. Now, you will notice that
that the title of the page is "Test"</p>
<h3>$page->addTitle($title)</h3>
<p>Of course, it is a new fad in the web development world to make your title "Web Site Name - My 
Page". It supposedly helps with SEO, or something. Anyway, if you want to do something like that,
you have the option to add a title to the hierarchy using the addTitle function. In our example, 
change the name of the function to addTitle and click save. Now, you will notice, that the title is now "My Install Name - Test".</p>
<p>What's nice about addTitle() is that you can keep adding things to the hierarchy if you like 
with multiple calls. For instance, $page->setTitle("This"); $page->setTitle("is"); $page->
setTitle("a"); $page->setTitle("test."); will yield the results "My Install Name - This - is - a -
test."</p>
<p><b>NOTE:</b> one important difference between addTitle() and setTitle() is that setTitle() overwrites anything currently in the title. addTitle(), on the other hand, appends to it.</p>
<hr />
<p>And that's it. Congrtulations! You know the basics of page writing in Web Builder!</p>
<?php
/*------------------------End Content---------------------------------*/
preNextBar("ch1.php","ch3.php");

?>