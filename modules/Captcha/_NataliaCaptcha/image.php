<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$tilt = rand(-30,10);
$textsize = 30;
$width = 200;
$height = 200;

$im = imagecreatetruecolor($width, $height);
imagefilledrectangle($im,0,0,$width, $height,imagecolorallocate($im, 255, 255, 255));
$bgimg =  imagecreatefromjpeg('backgrounds/'.rand(1,18).'.jpg');
imagecopy($im, $bgimg, 0,0, rand(0,imagesx($bgimg)-$width), rand(0,imagesy($bgimg) - $height), $width, $height);


$color = array();
$color[1] = ImageColorAllocatealpha ($im,87+rand(-10,10), 56+rand(-10,10),  61+rand(-10,10), 40);
$color[2] = ImageColorAllocatealpha ($im,50+rand(-10,10), 25+rand(-10,10),  20+rand(-10,10), 40);
$color[3] = ImageColorAllocatealpha ($im,205+rand(-10,10), 160+rand(-10,10),  130+rand(-10,10), 40);
$color[4] = ImageColorAllocatealpha ($im,105+rand(-10,10), 30+rand(-10,10),  25+rand(-10,10), 40);

$white = ImageColorAllocatealpha ($im, 225+rand(-10,10), 225+rand(-10,10),  225+rand(-10,10), 20);

	$letters='qwertyuiopasdfghjklzxcvbnm';
	for($x=0;$x<rand(20, 40);$x++) {
		Imagettftext($im,rand(10,35), rand(-100,100), rand(0, $width), rand(0, $height), $color[rand(1,4)], $font, $letters[rand(0, strlen($letters)-1)]);
	}

$ran1 = rand($width/16, $width/8+$width/16);
$ran2 = rand($height/3, $height/2+$height/4);

Imagettftext($im,$textsize, $tilt, $ran1, $ran2, ImageColorAllocatealpha($im, 235+rand(-10,10), 235+rand(-10,10),  235+rand(-10,10), 20), $font, $word);
Imagettftext($im,$textsize, $tilt, $ran1, $ran2, $color[rand(1,4)], $font, $word);

wave_region($im, 0 ,0 ,$width, $height,rand(5,10),rand(20,25));
wave_region($im, 0 ,0 ,$width, $height,rand(1,2),rand(1,2));

Imagettftext($im, 16 , 1, 1, 31, $white, $font, 'NataliaCaptcha');
Imagettftext($im, 16 , 1, 1, 31, $white, $font, 'NataliaCaptcha');
Imagettftext($im, 16 , 1, 3, 29, $white, $font, 'NataliaCaptcha');
Imagettftext($im, 16 , 1, 3, 29, $white, $font, 'NataliaCaptcha');
Imagettftext($im, 16 , 1, 2, 30, $color[rand(1,4)], $font, 'NataliaCaptcha');

$answer = $word;

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>