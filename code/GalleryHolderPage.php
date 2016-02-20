<?php

class GalleryHolderPage extends Page {

	
		
}

class GalleryHolderPage_Controller extends Page_Controller {
	
	function init() {
		parent::init();
//		Debug::show();
		Requirements::javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js');
		Requirements::css('gallery/css/gallery.css');
		Requirements::javascript('gallery/javascript/imageSlider.js');
		
	}
	function Galleries() {
		$parent = DataObject::get("GalleryPage");
		return $parent;
	} 

	
/*	function Galleries() {
		$parent = DataObject::get("File", "ClassName = 'Folder'");
	return $parent; /*
		/*
		$images = DataObject::get("Image", "ParentID = '$parent->ID'", "Title DESC"); // AND ClassName = 'Image'");
		if($images) {
			return $images;
		}
		else return NULL; 
	}*/
	
	

	
	
	
}