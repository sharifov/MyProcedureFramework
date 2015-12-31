<?php
session_start();
create_image();
exit();

function create_image()
{
	$md5_hash = md5(rand(0,999999)+time());
    $security_code = substr($md5_hash, 10, 5);
    $_SESSION['sec_code'] = $security_code;
    $width = 100;
    $height = 50;
    $image = imagecreate($width, $height);
    //$textc = imagecolorallocate($image, 220, 210, 60);
	$textc = imagecolorallocate($image, 93, 93, 93);
    $grey = imagecolorallocate($image, 105, 10, 50);
	imagefill($image, 0, 0, $grey);
    imagestring($image, 5, 10, 10, $security_code, $textc);
   // imagerectangle($image, 0, 0, 10, 10, $grey);
    header("Content-Type: image/jpeg");
    imagejpeg($image);
    imagedestroy($image);
}
?>