<?php
/*****************************************/
/* 
Web Builder
Documentation/index.php
Nathan Black
Version 0.0.0

The home of the documenttation file
*/

// 6-8-18

$_SERVER['SCRIPT_FILENAME'] = __FILE__;
include_once("boot.php");

global $page;

/*------------------------Content Below Here-------------------------*/
?>
<h1>Welcome to Web Builder!</h1>
<p>This directory is filled with the documentation for Web Builder. This serves both to document this
product, but also as a sample web site. That way, you can kind of see what Web Builder is capable of.</p>

<p>
I should also mention, really quickly here, that this file calls boot.php, not ../boot.php. The
reason being is that this directory has its own boot file, but one specialized for sub-directories.
If you are making a multi-directory website, you can copy this boot file into that sub-directoy.
That way, you can still base all your files off of sample.php with no changes to the non-content part.</p>

<p>Anyway, without further ado, let's jump in.</p>

<h2>What is Web Builder?</h2>

<p>Web Builder is a web site framework made to make setting up a site simple.</p>

<p>Web Builder is the spiritual successor to another project I made called "Quiz Master". Quiz
Master was originally a project I built for school. Honestly, looking back, it was a cheap, crummy, Buzzfeed quiz manager. It wasn't fancy, but it worked. I got a 100% grade, so that was nice.</p>

<p>After I graduated, I wanted to turn it into something better. I had this dream of starting my
own web design company. My plan was to refactor the code a bit, and give me something that I
could set up quickly out of the box for people. I would write a few very common features that I
thought a lot of people would want, and set them up quickly. That way, I could focus only on content, not back-end code, and set up their site almost instantly with a few customized tweaks.</p>

<p>What resulted from this process was "Web Builder". Web Builder was designed to be a extendable,
modular code sytem that seperated code from content. Thus the creation of lmod and tmanager. All
back-end code was stuffed into a "modules" folder, with an automated mechanism for loading upon
booting. Set-up is designed to be easy and almost instant.</p>

<p>Additionally, the I reduced the template to a single file. I found I often in other instant 
website projects like WordPress, I have to dig around to figure out what the template actually
looks like start to finish. Even worse, I have no idea what the website looks like by looking
at the file tree. If I want to see any content, I have to look in some database and slug through
a ton of rows and maybe, just maybe, figure what my site looks like from the front end.</p>

<p>Personally, I find this frustrating. Don't get me wrong, that's perfectly fine if you're the
target audience of the CMS system. However, as a developer, I find it really hard to develop the
backend this way. CMS has its place, in fact I'd like to write a Web Builder CMS module some day,
but as a developer I don't like managing my site that way.</p>

<p>Consequently, I designed webbuilder to require the includion of a "boot" file, and a few
minor other tasks, and that's it. The rest of the file is content specific to that file.
All you have to do is open the file, and you can quickly see the content of that page. Want to know how the pages relate to eachother, look at what files are in the folders. No hunting for it. It's very intuative</p>

<p>Overall, I'm fairly happy with it. It's not completely done. I'm not sure it will ever be
totally done. However, it's enough to be considered a v1.0. Thus, I have put it here. I still
hope to start a web design company some day. But for now, I have posted this here in hopes it
will be useful to someone setting up their own web site.</p>


<?php
/*------------------------End Content---------------------------------*/

preNextBar("#","ch1.php");

?>