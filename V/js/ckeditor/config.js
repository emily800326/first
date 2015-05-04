/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
 



config.toolbar = 

/*Toolbar自訂須注意分隔符號( '/' 及  ‘/’,) 的使用,某些網站代碼複製下來會不符合*/
/*被我取消的功能: print , save , 'Source' , 'NewPage' , 'About' */

[
        ['Preview','-','Templates'],
['Cut','Copy','Paste','PasteText','PasteFromWord','-', 'SpellChecker', 'Scayt'],
['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
'/',
['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
'/',
['Styles','Format','Font','FontSize'],
['TextColor','BGColor'],
['Link','Unlink','Anchor'],
['Maximize', 'ShowBlocks','-']

    ];

	config.filebrowserBrowseUrl = '/first/V/js/ckfinder/ckfinder.html'; //開圖片管理路徑
	config.filebrowserImageBrowseUrl = '/first/V/js/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/first/V/js/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/first/V/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/first/V/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/first/V/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
