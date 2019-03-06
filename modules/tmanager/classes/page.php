<?php
/*****************************************/
/* 
Web Builder Template Manager
Page Class
Nathan Black
Version 0.0.0

This class manages all data that pertains to the page
*/
// 5-10-18
		
		
class Page {
	private $title;
	private $scripts = array(); // an array of scripts, to be retrieved at a later time
	private $styles = array(); // an array of styles, to be retrieved at a later time
	private $bodyTag = array(); // an array of attributes and values, to be retrieves at a later time
	private $menus; // an array of menu data
	private $content; // the actual page content
	private $listening = false; // bool to tell if the page is in fact listening
	private $templateName;
	// the deconstructor
	function __construct($t, $scripts = array(), $styles = array()) {
		global $WB_TMAN_ROOT;
		//var_dump($GLOBALS);

		$this->title = $t;
		$this->scripts = $scripts;
		$this->styles = $styles;

		// set the template to default
		$this->setTemplateName("default");
	
	}
	function __destruct() {

		$this->getTemplate();
	}

	// getters and setters	
	
	// template file
	function setTemplateName($t) {
		$this->templateName = $t;
	}
	function getTemplateName() {
		return $this->templateName;
	}
	function getTemplateFile() {
		global $WB_TMAN_ROOT;
		// compatible templates must have this structure
		return $WB_TMAN_ROOT . "templates/" . $this->templateName . "/load.php";
	}

	// the title
	function setTitle($t) {
		$this->title = $t;	
	}
	// add a hierarchy to 
	function addTitle($t) {
		$this->title .= " - $t";	
	}
	function getTitle() {
		return $this->title;	
	}
	
	// the scripts
	function addScript($s) {
		$this->scripts[] = $s;	
	}
	function getScripts() { 
		return $this->scripts;	
	}
	function getScriptString($indent = "\t") {
		$result = "";
		
		foreach($this->scripts as $script) {
			$result .= "$indent<script src=\"$script\"></script>\n";
		}
		return $result;	
	}
	
	// the styles
	function addStyles($s) {
		$this->styles[] = $s;
	}
	function getStyles() { 
		return $this->styles;	
	}
	function getStyleString($indent = "\t") {
		$result = "";
		
		// add the styles
		foreach($this->styles as $style) {
			$result .= "$indent<link rel=\"stylesheet\" href=\"$style\">\n";
		}
		
		return $result;	
	}

	// the bodtag
	function addBodyTag($attrib,$value) {
		$this->bodyTag[$attrib] = $value;
	}
	function getBodyTag() { 
		$result = "";
		
		foreach($this->bodyTag as $k => $v) {
			$result .= " $k=\"$v\"";
		}
		
		return $result;	
	}

	// the menus
	function addMenuItem($offset, $m) {
		if($m instanceof MenuOption) {
			$this->menus[$offset][] = $m;
		} else {
			throw new Exception("ERROR! Non Menu-item passed to Page::addMenuItem()! Please contact your administrator!");
		}
		
	}
	function getMenu($offset) { 
		return $this->menus[$offset];	
	}
	
	// function to tell the page to start listening 
	// for content
	function startContentListen() {
		// if we're not already listening
		if(!$this->listening) {
			// start listening
			ob_start();
			
			// and set flag
			$this->listening = true;
		}
		
	}
	
	
	// function to tell the page to stop listening 
	// for content
	function  stopContentListen() {
		// if we are listening for content
		if($this->listening) {

//			echo ob_get_contents();

			// save content
			$this->content = ob_get_contents();

			echo $this->content;			
			
			// stop listening
			ob_end_clean();
			
			// set flag
			$this->listening = false;
			
		} else {
			// do nothing
			
			// we could throw an error here in the future,
			// if we want to
			
				
		}
	}
	
	function getTemplate() {
//		global $WB_TMAN_ROOT;
		// stop content listening
		$this->stopContentListen();

		// include the template
		require_once($this->getTemplateFile());
}

	function getContent() {
		// if we are listening for content
		if($this->listening) {
			// stop listening
			$this->stopContentListen(); // NOTE: stopContentListen() automatically saves
				// the data caught in $this->content
				// thus, all we have to do is call stopContentListen() without worrying
				// about saving content
		}
		
		// return whatever is being stored in the content
		return $this->content;

	}
	
	
};


?>