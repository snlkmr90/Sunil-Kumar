/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	
	// Set the most common block elements.
	config.removePlugins = 'image';
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.filebrowserUploadMethod = 'form'; // Added for file browser
	config.entities_latin = false; 
  	config.entities_greek = false; 
  	config.entities = false; 
  	config.basicEntities = false; 
};


