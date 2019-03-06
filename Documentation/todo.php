<?php
/*****************************************/
/* 
Web Builder
todo.php
Nathan Black
Version 0.0.0

My todo list
*/

// 6-8-18

$_SERVER['SCRIPT_FILENAME'] = __FILE__;
include_once("boot.php");

global $page;

/*------------------------Content Below Here-------------------------*/
?>
<h1>TODO List:</h1>
<p>They say an artist is never really done with their work. To that end, there are a dozen things
I would like to add, fix, make better, etc. I figured I'd share my list with you, that way you know what to expect in future updates. Plus, if you want to help me develop this project, you
know some things I would like to do with it. Expect this list to change frequently.</p>
<p>So, without further ado, here is a list of things I know need to get done, or I want to get 
done</p>
<h3>1. Create an install script</h3>
<p>When you install something like WordPress, it has an install script packaged with it that 
handles installation and makes it really easy. While Web Builder is deseigned for the web 
developer, not the end user, I still think a install script that handles everything needed for
installation would make this more user friendly</p>
<h3>2. Complete/Better documentation</h3>
<p>Of course, as this project changes, so will the documentation. That said, I kind of just threw
together a documentation that way I could post this project online and people could use it. It's 
not the best. I would like to make it more organized, and more complete. It just needs some more love.</p>
<h3>3. Make more options configurable in config.ini</h3>
<p>Overall, I would like to make more options configureable from config.ini. There are a ton of 
things that, in my head anyway, should be configurable from the ini file, and they're not. Also,
a complete list of what is configureable from the ini would be nice too.</p>
<h3>4. Make everything more based off a OOP</h3>
<p>I would like Web Builder completely object oriented. It would be nice if there was 1 global,
$wb for instance, from which everything spawned. This would increase organization and allow variable and function names really be only for end-user code. All modules could be defined in their own scope (sort of) and get quarentined. This would require a complete rewrite of lmod, but I'm probably going to be doing that anyway, so that isn't a huge deal. However, this will require a rewrite of all current mods when this gets implemented, so that will be a huge project overall. Plus, any modules written by anyone other will have to be rewritten as well. This is a massive update for sure.</p>

<p>Hereafter, I have decided to divide this list by module to make it easier to follow</p>
<h2>Ini Module</h2>
<h3>1. Fix security bug/design issue for config.ini</h3>
<p>I think I have already mentioned this, but config.ini creates a security hole for your website.
I designed WB to have a single file where all of your configuration is stored. While it makes 
things easier to configure, obviously this creates a single file with some really damaging 
information in it. This would be a hackers delight. I need to fix this.</p>
<p>For the moment, I have made the config.ini file hard to find. That way, the hacker has to know
where such a file is located to see it. However, this is not ideal. I'm going to figure out a 
better solution hopefully in the next update</p>
<h2>Database Module</h2>
<h3>1. Add filter/parsing callback to class Table()</h3>
<p>I'm mostly pleased with my database module, especially its simplicity and ease of use. I really
like using an object to create some common queries for the database instead of making the query 
myself. My only big problem with it, is that if the table is suppoed to conceptualize a table of
users (for instance), then it'd be nice to get a bunch of user objects returned. Thus, I would
like to add a parsing callback that will put the userdata into an array of objects for me 
everytime I run a query instead of having to do that myself.</p>
<h3>2. Add Obj to array function</h3>
<p>Just like it'd be nice to get an array of users, for instance, it'd also be nice to be able to 
pass users to the Table class and add it to the table automatically. Just a thought</p>
<h3>3. Make some experimental features less experimental</h3>
<p>When deving the table class, I thought it's be a cool idea to add some utilites to the class
that allow you to check the intergrity of the table. While They are really nice, they are still
experimental, and haven't been tested thorughly. It'd like to fix that. If you'd like to help test
them, let me know.</p>
<h2>Lmod module</h2>
<h3>1. Make it better written</h3>
<p>I wrote lmod to make mods get loaded automatically. What I have, I'm sort of happy with. I'm 
excited I got it to work. That said, I think parts of it are poorly written. I'd like it to get
a design overhaul.</p>
<h3>2. Add ini files per module</h3>
<p>I'd really like to have it so each module CAN have its own ini if it wants. That way you have 
the option to organize your configuration by module, or configure it all in one place if you like.</p>
<p>This one might get axed because this would make management harder. I would like Web Builder to
remain easy to manage, so we'll see.</p>
<h3>3. Make it more flexible</h3>
<p>Overall, I'd like it if lmod was more flexible, both in confiurabillity and functionality. I'd
like to offer more options for module-writters to add things other than just load.php. What 
exactly? I'm not sure yet. We'll see what's needed when the project grows.
</p>
<h3>4. Add sub-modules</h3>
<p>This one I definitely want to happen, even if the above ones don't. The reason being that you
could have a bunch of modules that really only expand the users module, for instance, it'd be nice
if they were stored under the users module folder, instead of filling up the modules directory.</p>
<p>Really, there are 2 ways to accomplish this. 1. Create a modules folder inside users, with its
own copy of lmod, which gets fired from load.php, etc. Or, 2., you could allow modules to have 
sub-modules ad the lmod level. This is the better option, since this would allow all modules to
support sub-modules really easily. In the future, I want to implement option 2.</p>
<h2>Modules I'd like to write</h2>
<p>Obviously, not every posible module for Web Builder has been written. The possabillities are 
endless. I would love for other people to write modules for Web Builder. Thus, I've tried to make 
it as easy as possible to write modules. That said, there are a few modules that I would like to
add.</p>
<h3>Forms Module</h3>
<p>I think it'd be nice to create a module that creates forms and processes them for you.</p>
<h3>User Forms Module</h3>
<p>Of course, after the forms module is written, I would like to add a module that adds some 
common forms used for user authentication. It would make life simpler for the web developer.</p>
<h3>CMS/Blogging Module</h3>
<p>I would definitely like to create a CMS module that handles content management like Wordpress 
does.</p>
<h2>Wanna help?</h2>
<p>See something you can do, or wanna write? Feel free to contact. My email is rev20-10@psalm126.com</p>

<?php
/*------------------------End Content---------------------------------*/
preNextBar("bugs.php","#");
?>
