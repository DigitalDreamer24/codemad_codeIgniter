/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    let path = location.origin+"/codemad";

  config.filebrowserBrowseUrl = path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';

};
