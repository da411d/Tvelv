<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$tilt = rand(-7,3);
$textsize = rand(40,50);
$width = 350;
$height = 100;

$im = imagecreatetruecolor($width, $height);

if(rand(0,1)==0){$whiter = rand(0,100);$bgr = rand(150,240);}else{$whiter = rand(200,240);$bgr = rand(0,100);}
if(rand(0,1)==0){$whiteg = rand(0,100);$bgg = rand(150,240);}else{$whiteg = rand(200,240);$bgg = rand(0,100);}
if(rand(0,1)==0){$whiteb = rand(0,100);$bgb = rand(150,240);}else{$whiteb = rand(200,240);$bgb = rand(0,100);}

$white = ImageColorAllocatealpha ($im, $whiter, $whiteg,  $whiteb, 0);
$bg = imagecolorallocate($im, $bgr, $bgg,  $bgb);

imagefilledrectangle($im,0,0,$width, $height,$bg);


lines($im);
wave_region($im, 0 ,0 ,$width, $height,rand(7,10),rand(5,8));

$ran1 = rand($width/8, $width/4+$width/8);
$ran2 = rand($textsize+5, $height-$textsize);
Imagettftext($im,$textsize, $tilt, $ran1, $ran2, $white, $font, $word);

ellipse($im);

wave_region($im, 0 ,0 ,$width, $height,rand(5,10),rand(15, 20));
wave_region($im, 0 ,0 ,$width, $height,rand(1,2),rand(2, 3));
lines($im);

Imagettftext($im, 20 , 1, 0, 24, $white, $font2, 'RexCaptcha');

$answer = $word;
function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>