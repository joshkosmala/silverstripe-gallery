<?php

/**
 * Allows the upload of multiple images to pages
 */
class GalleryImage extends Image {

	public static $has_one = array(
		'Page' => 'GalleryPage'
	);
}
