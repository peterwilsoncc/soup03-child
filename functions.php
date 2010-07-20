<?php
/*
Note:
Function file load order:
	1) child
	2) parent
*/


function soup_setupChildThemeClass() {

	Class SoupTheme Extends SoupThemeParent {
		/* ************** CHILD FUNCTIONS *************** */

		/* 
		functions usually overwritten / plugged
			* initTheme
			* registerAdditionalCSSandJS
			* enqueueCSS
			* enqueueJS
			* registerSidebars
			* registerMenus
		*/
	
	}

} // function soup_setupChildThemeClass() 


/* 
	need to reverse the order the function.php files usually run in
	parent's function.php needs to run before child's
*/
//add_action('after_setup_theme', 'soup_setupParentThemeClass', 1); //reference: runs in parents's function.php
add_action('after_setup_theme', 'soup_setupChildThemeClass', 2); 
//add_action('after_setup_theme', 'soup_initialiseSoupObject', 3); //reference: runs in parents's function.php


?>