<?php
include_once 'class.get.image.php';

if ( isset( $_POST ) ) {

	if ( isset( $_POST['action'] ) && ( $_POST['action'] == 'get_image' ) ) {
		$return = get_image( $_POST['photo'] );
	}

	die( json_encode( $return ) );
}

function get_image( $item ) {

	// just an image URL
	if ( !empty( $item ) ) {

		// initialize the class
		$image = new GetImage;

		$image->source = $item;

		$image->save_to = 'images/'; // with trailing slash at the end

		$get = $image->download('curl'); // using GD

		if( $get ) {
			return array( 'success' => 'The image has been saved.' );
		} else {
			return array( 'failed' => 'Didn\'t download...' );
		}
	}
	else {
		return array( 'failed' => 'Didn\'t have an image...' );
	}
}