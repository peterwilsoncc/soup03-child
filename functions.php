<?php
/*
Note:
Function file load order:
	1) child
	2) parent
*/


function soup_setupChildThemeClass() {

	Class SoupTheme Extends SoupThemeParent {

		function initChildTheme(){
			//placeholder function for additional initing by the child theme
		}

		function defineMinimisedCode() {
			$this->parent['mincss'] = false;
			$this->parent['minjs'] = false;

			$this->child['mincss'] = false;
			$this->child['minjs'] = false;		
		}

		function defineThemeOptions(){
			$this->options['thumbnails'] = true;
			$this->options['feedLinks'] = false;
			$this->options['headerWidgets'] = true;
			$this->options['footerWidgets'] = true;
			$this->options['contentBWidgets'] = true;
			$this->options['contentCWidgets'] = true;
			$this->options['showWPAdminBar'] = false;
			$this->options['handheldCssMedia'] = ''; //use to customise @media query
			
			
			$this->options['editorCSS'] = false; // if true, url is $this->child['css'] . '/all/editor-styles.css'
			
			/* ********************************
			If classes are to be added to the editor, add them to editorEnglishClasses as an array
			otherwise leave the setting as false
			EG:
			$this->options['editorEnglishClasses'] = array(
				'Leader Text' => 'leadertext',
				'Highlighted' => 'hilight'
			);
			********************************* */
			$this->options['editorEnglishClasses'] = false;

			/* ********************
			 forge the header levels in the editor to keep inline with document layout
			On pages, Header 1 is a h2 and so on
			On pasts, Header 1 is a h4 and so on
			also adds the class bxPage or bxPost as appropriate
			********************* */
			$this->options['editorFakeHeaderLevels'] = false; 
		}

		function defineChildVersions() {
			$this->child['cssVer'] = 20100706.01;
			$this->child['jsVer']  = 20100706.01;
			
			$this->child['jsDependencies'] = array (
					'soup-base', 
					'prettyPhoto',
					'hashchange',
					'form-validation',
					'jquery'
				);
		}

		function enqueueCSS() {  
			//usually overwritten by child
			if (!is_admin()) :
			
				/* 
					never enqueue seperate media styles and 
					all-media styles at the same time.
				*/
				wp_enqueue_style('soup-all');
				wp_enqueue_style('soup-all-ie6');
				wp_enqueue_style('soup-all-ie7');
				wp_enqueue_style('soup-all-ie8');
				wp_enqueue_style('soup-all-ie9');
						
				wp_enqueue_style('soup-mobile');
			
				wp_enqueue_style('soup-print');
				wp_enqueue_style('soup-print-ie6');
				wp_enqueue_style('soup-print-ie7');
				wp_enqueue_style('soup-print-ie8');
				wp_enqueue_style('soup-print-ie9');
				/* */
				
				/* 
					never enqueue seperate media styles and 
					all-media styles at the same time.
				
				wp_enqueue_style('soup-all-media');
				wp_enqueue_style('soup-all-media-ie6');
				wp_enqueue_style('soup-all-media-ie7');
				wp_enqueue_style('soup-all-media-ie8');
				wp_enqueue_style('soup-all-media-ie9');
				/* */
						
			endif; //if (!is_admin()):
		
		}

		function enqueueChildJs(){
			//this function is usually overwitten in child
			wp_enqueue_script('custom');
		}

	
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