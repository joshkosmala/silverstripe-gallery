<?php

// NOTE: In order to get the Gallery to cascade with a reasonable sized picture - Set Image::strip_thumbnail_width and height to (147)
class GalleryPage extends Page {

	static $db = array();

	static $has_one = array(
		'Folder' => 'Folder',
		'CoverImage' => 'Image'
	);

	static $has_many = array(
		'Images' => 'Image'
	);

	function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->checkFolder();
	}




	/**
	 * If this page doesn't have a folder, create one for us
	 */
	function checkFolder() {

		// construct the folder
		$folder = Folder::find_or_make('Galleries/');
		$folder->write();
		$subfolder = Folder::find_or_make('Galleries/' . $this->URLSegment);
		$subfolder->Title = $this->URLSegment;
		$subfolder->write();
	}


	function getCMSFields() {
		$fields = parent::getCMSFields();
		$folder = new TreeDropdownField('FolderID', 'Show The Files From', 'Folder');
		$fields->addFieldToTab('Root.Images', $folder);
		if($this->FolderID) {
			$table = new Gridfield(
				$this,
				'Images',
				'Image',
				array(
					'Title' => 'Title',
					'Caption' => 'Caption'
				),
				'getGalleryFields',
				'ParentID = ' . $this->FolderID
			);
			$table->setPermissions(array('edit'));


			$fields->addFieldToTab('Root.Images', $table);

	}
	$fields->addFieldToTab('Root.Main', new UploadField('CoverImage','Cover Image for Album'), 'Content');


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


//		Debug::show(self::Images());
	}



	function GalleryImages() {
		$parent = DataObject::get_one("File", "ClassName = 'Folder' AND Name = '{$this->URLSegment}'");
		$images = DataObject::get("Image", "ParentID = '$parent->ID'", "Title DESC"); // AND ClassName = 'Image'");
		if($images) {
			return $images;
		}
		else return NULL;
	}


}
