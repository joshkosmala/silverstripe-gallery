<?php

// NOTE: In order to get the Gallery to cascade with a reasonable sized picture - Set Image::strip_thumbnail_width and height to (147)
class GalleryPage extends Page {

	static $db = array();

	static $has_one = array(
		'Folder' => 'Folder',
		'CoverImage' => 'Image'
	);

	static $has_many = array(
		'Images' => 'GalleryImage'
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Images', $images = new UploadField('Images'));
		$images->setFolderName('Galleries/' . $this->Title);
		$fields->addFieldToTab('Root.Main', new UploadField('CoverImage', 'Cover Image for Album'), 'Content');

		return $fields;
	}

}

class GalleryPage_Controller extends Page_Controller {

	function init() {
		parent::init();

		// jQuery
		// Should be called in Page.php
		Requirements::javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js');

		// Shadowbox
		Requirements::css('gallery/shadowbox/shadowbox.css');
		Requirements::javascript('gallery/shadowbox/shadowbox.js');
		Requirements::javascript('gallery/javascript/shadowboxCommand.js');
		Requirements::css('gallery/css/gallery.css');
	}

}
