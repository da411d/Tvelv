<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$tilt = rand(-20,20);
$textsize = rand(25,30);
$width = 200;
$height = 150;
$im = imagecreatetruecolor($width, $height);

$textcolor = ImageColorAllocate($im,rand(0,50), rand(0,50), rand(0,50));
$textcolor1 = ImageColorAllocate($im,rand(200,255), rand(200,255), rand(200,255));
$color = ImageColorAllocate($im,rand(0,255), rand(0,255), rand(0,255));
$white = ImageColorAllocate($im, 255, 255,  255);

imagefilledrectangle($im,0,0,$width, $height,imagecolorallocate($im, 255, 255, 255));
//$bgimg=imagecreatefromjpeg('backgrounds/'.rand(1,8).'.jpg');
//imagecopy($im, $bgimg, 0,0, rand(0,imagesx($bgimg)-$width), rand(0,imagesy($bgimg)-$height), $width, $height);

for($i=0;$i<rand(50,60);$i++){
	$r1=rand(5,$width);
	$r2=rand(5,$height);
	$r3=rand(5,$width);
	$r4=rand(5,$height);
	$rn = rand(0,255);
	$color2 = ImageColorAllocate($im,$rn, $rn, $rn);
	imageline($im, $r1, $r2, $r3, $r4, $color2);
}

Imagettftext($im, 20 , 1, 2, 30, $color, $font, 'LabiCaptcha');

	$letters='qwertyuiopasdfghjklzxcvbnm';
	
	for($x=0;$x<rand(30, 50);$x++) {
		Imagettftext($im,rand(10,35), rand(-100,100), rand(0, $width), rand(0, $height), $color, $font, $letters[rand(0, strlen($letters)-1)]);
	}

$x = rand(5, $width/(strlen($word)*$textsize));
$y = rand($height/4+$height/8, $height/2+$height/4);

lines($im, 10);

imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);
imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);

Imagettftext($im, $textsize, $tilt, $x+1, $y+1, $textcolor1, $font, $word);
Imagettftext($im, $textsize, $tilt, $x+1, $y-1, $textcolor1, $font, $word);
Imagettftext($im, $textsize, $tilt, $x-1, $y+1, $textcolor1, $font, $word);
Imagettftext($im, $textsize, $tilt, $x-1, $y-1, $textcolor1, $font, $word);
Imagettftext($im, $textsize, $tilt, $x, $y, $textcolor, $font, $word);

lines($im);

imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);
imagefilter($im, IMG_FILTER_BRIGHTNESS, -10);

for($i=0;$i<50;$i++){
	$matrix = array(array(-1,-1,-1), array(-1,16,-1), array(-1,-1,-1));
	imageconvolution($im, $matrix, 8, 0);
	if(rand(0,1)){
		imagefilter($im, IMG_FILTER_NEGATE);
	}
}

$answer = $word;

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im, null, 9);
}
?>