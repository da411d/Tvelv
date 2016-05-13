<?php
include dirname(__FILE__).'/../_curvature_library.php';
include dirname(__FILE__).'/fonts/font.php';
include 'text-generator.php';
$tilt = 0;
$textsize = 60;
$width = 480;
$height = 340;

function vc_ellipse($im){
$width = $GLOBALS['width'];
$height = $GLOBALS['height'];
$bg = $GLOBALS['bg'];
$white = $GLOBALS['white'];

	for($i = 0;$i<rand(5,9);$i++){
		$r1=rand(0,$width);
		$r2=rand(0,$height);
		$r=rand(5,25);
		imagefilledellipse($im, $r1, $r2, $r, $r, $bg);
	}

	for($i = 0;$i<rand(5,9);$i++){
		$r1=rand(0,$width);
		$r2=rand(0,$height);
		$r=rand(5,25);
		imagefilledellipse($im, $r1, $r2, $r, $r, $white);
	}
return $im;
}

$canvas = imagecreatetruecolor($width, $height);
imagefilledrectangle($canvas, 0, 0, $width, $height, imagecolorallocate($canvas, 110, 220, 0));
$color = ImageColorAllocatealpha ($canvas, 255, 255,  255, 0);
$white = ImageColorAllocatealpha ($canvas, 225, 225,  225, 0);

$ran1 = rand(25, $textsize);
$ran2 = rand($textsize*2, $height/2 - $textsize*2);
Imagettftext($canvas, $textsize, $tilt, $ran1, $ran2, $color, $font, $adj);

$ran1 = rand(25, $textsize);
$ran2 = rand($height/2 + $textsize*2, $height - $textsize*2);
Imagettftext($canvas, $textsize, $tilt, $ran1, $ran2, $color, $font, $name);

wave_region($canvas, 0, 0, $width, $height, rand(5,10),rand(20,40));
wave_region($canvas, 0, 0, $width, $height, 1, 1);


vc_ellipse($canvas);

$im = imagecreatetruecolor($width, $height);

if(rand(0,1)){
	$bgimg = imagecreatetruecolor($width, $height);
	imagefilledrectangle($bgimg, 0, 0, $width, $height, imagecolorallocate($bgimg, rand(195, 235), rand(195, 235), rand(195, 235)));

	$tbg = imagecreatetruecolor($width, $height);
	$tbg2 = imagecreatefrompng('backgrounds/1_'.rand(1,100).'.png');
	imagecopy($tbg, $tbg2, 0, 0, 0, 0, $width, $height);
	$tbg2 = "";
}else{
	$bgimg = imagecreatetruecolor($width, $height);
	$bgimg2 = imagecreatefrompng('backgrounds/1_'.rand(1,100).'.png');
	imagecopy($bgimg, $bgimg2, 0, 0, 0, 0, $width, $height);

	$tbg = imagecreatetruecolor($width, $height);
	imagefilledrectangle($tbg, 0, 0, $width, $height, imagecolorallocate($tbg, rand(195, 235), rand(195, 235), rand(195, 235)));
	$bgimg2 = "";
}

for($w=0;$w<$width;$w++){
	for($h=0;$h<$height;$h++){
		$rgb = imagecolorat($canvas, $w, $h);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;

		if(($r>100 && $g>100 && $b>100) || rand(0,1000)==0){
			$rgb = imagecolorat($tbg, $w, $h);
			imagesetpixel($im, round($w), round($h), $rgb);
		}else{
			$rgb = imagecolorat($bgimg, $w, $h);
			imagesetpixel($im, round($w), round($h), $rgb);
		}
	}
}

imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);

$answer = $adj.' '.$name;
function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>