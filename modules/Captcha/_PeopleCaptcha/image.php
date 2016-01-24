<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$tilt = 0;
$textsize = rand(55,65);
$width = 350;
$height = 100;

$im = imagecreatetruecolor($width, $height);

if(rand(0,1)==0){
	$white = ImageColorAllocatealpha ($im, rand(0,100), rand(0,100),  rand(0,100), 0);
	$bg = imagecolorallocate($im, rand(175,255), rand(175,255),  rand(175,255));
}else{
	$white = ImageColorAllocatealpha ($im, rand(175,255), rand(175,255),  rand(175,255), 0);
	$bg = imagecolorallocate($im, rand(0,100), rand(0,100),  rand(0,100));
}

imagefilledrectangle($im,0,0,$width, $height,$bg);

$ran1 = rand(5,10);
$ran2 = $textsize+rand(3,8);
$ran3 = ($height/3)+rand(-20,20);
$ran4 = ($height/3)*2+rand(-20,20);
Imagettftext($im,$textsize, $tilt, $ran1, $ran2, $white, $font, $word);
if(rand(0,1)){
	imagefilledrectangle($im,0, $ran3+rand(-10, -3), $width, $ran3 + rand(3, 10), $bg);
	imagefilledrectangle($im,0, $ran4+rand(-10, -3), $width, $ran4 + rand(3, 10), $white);
}else{
	imagefilledrectangle($im,0, $ran3+rand(-10, -3), $width, $ran3 + rand(3, 10), $white);
	imagefilledrectangle($im,0, $ran4+rand(-10, -3), $width, $ran4 + rand(3, 10), $bg);
}
Imagettftext($im, 20 , 1, 0, 24, $white, $font2, 'PeopleCaptcha');

$answer = $word;

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>