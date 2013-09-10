<html>
<?php
include_once 'class.get.image.php';

$json = file_get_contents( 'images.json' );
$content = json_decode( $json );

foreach ($content as $item) {

	// just an image URL
	if ( !empty( $item->photo ) ) {
		// initialize the class
		$image = new GetImage;

		$image->source = $item->photo;
		echo $item->photo;
		$image->save_to = 'images/'; // with trailing slash at the end

		$get = $image->download('curl'); // using GD

		if( $get ) {
			echo 'The image has been saved.<br />';
		} else {
			echo 'Didn\'t download...<br />';
		}
	}
}

?>