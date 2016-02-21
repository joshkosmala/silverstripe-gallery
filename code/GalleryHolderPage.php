<?php

class GalleryHolderPage extends Page {

	public static $allowed_children = array(
		'GalleryPage'
	);

	function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->checkFolder();
	}

	/** Ensure the assets/Galleries folder is present */
	function checkFolder() {
		Folder::find_or_make('Galleries/');
	}

}

class GalleryHolderPage_Controller extends Page_Controller {

	function init() {
		parent::init();
		Requirements::javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js');
		Requirements::css('gallery/css/gallery.css');
		Requirements::javascript('gallery/javascript/imageSlider.js');

	}

	function Galleries() {
		$parent = DataObject::get("GalleryPage");
		return $parent;
	}

}
