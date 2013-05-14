<?php
include_once 'class.get.image.php';

// initialize the class
$image = new GetImage;

// just an image URL
$image->source = 'http://static.php.net/www.php.net/images/php_snow_2008.gif';
$image->save_to = 'images/'; // with trailing slash at the end

$get = $image->download('curl'); // using GD

if($get)
{
echo 'The image has been saved.';
}
?>