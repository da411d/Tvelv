<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$tilt = rand(-7,7);
$textsize = 50;
$width = 350;
$height = 100;
$im1 = imagecreatetruecolor($width, $height);//b
$im2 = imagecreatetruecolor($width, $height);//y

imagefilledrectangle($im1,0,0,$width, $height,imagecolorallocate($im1, rand(200,255), rand(200,255),  rand(0,50)));
imagefilledrectangle($im2,0,0,$width, $height,imagecolorallocate($im2, rand(0,50), rand(0,50),  rand(200,255)));


$white1 = ImageColorAllocatealpha ($im1, rand(0,50), rand(0,50),  rand(175,255), 0);
$white2 = ImageColorAllocatealpha ($im2, rand(200,255), rand(200,255),  rand(0,50), 0);


$ran1 = rand($width/16-5, $width/16+10);
$ran2 = rand($textsize+10, $height-$textsize);
Imagettftext($im1,$textsize, $tilt, $ran1, $ran2, $white1, $font, $word);
Imagettftext($im2,$textsize, $tilt, $ran1, $ran2, $white2, $font, $word);

$rand = rand(2,7);
for($i=0;$i<$rand;$i++){
	$r1=rand(5,$width);
	$r2=rand(5,$height);
	$r3=rand(5,$width);
	$r4=rand(5,$height);
	$color1 = ImageColorAllocatealpha ($im1, rand(0,25), rand(0,25),  rand(175,255), 0);
	imageline($im1, $r1, $r2, $r3, $r4, $color1);
	imageline($im1, $r1+rand(-10,10), $r2+rand(-10,10), $r3+rand(-10,10), $r4+rand(-10,10), $color1);
}
$rand = rand(2,7);
for($i=0;$i<$rand;$i++){
	$r1=rand(5,$width);
	$r2=rand(5,$height);
	$r3=rand(5,$width);
	$r4=rand(5,$height);
	$color2 = ImageColorAllocatealpha ($im2, rand(175,255), rand(175,255),  rand(0,25), 0);
	imageline($im2, $r1, $r2, $r3, $r4, $color2);
	imageline($im2, $r1+rand(-10,10), $r2+rand(-10,10), $r3+rand(-10,10), $r4+rand(-10,10), $color2);
}

$im1 = wave_region($im1, 0 ,0 ,$width, $height,rand(5,10),rand(25,30));
$im2 = wave_region($im2, 0 ,0 ,$width, $height,rand(10,15),rand(20,25));

$im = imagecreatetruecolor($width, $height);
imagefilledrectangle($im,0,0,$width,$height,imagecolorallocate($im, rand(200,255), rand(200,255),  rand(0,50)));

$i=-1;
if(rand(0,1)==1){
//Вертикальні лінії
	$max = rand(10,18);
	$k = $width/$max;
	if(rand(0,1)==1){
		for($i=0;$i<$max;$i++){
			imagecopy($im, $im1, ($i*2)*$k, rand(-5,5), ($i*2)*$k, 0, $height/2, $width);
			imagecopy($im, $im2, (($i*2)+1)*$k, rand(-5,5), (($i*2)+1)*$k, 0, $height/2+rand(-15,15), $width+rand(-15,15));
		}
	}else{
		for($i=0;$i<$max;$i++){
			imagecopy($im, $im2, ($i*2)*$k, rand(-5,5), ($i*2)*$k, 0, $height/2, $width);
			imagecopy($im, $im1, (($i*2)+1)*$k, rand(-5,5), (($i*2)+1)*$k, 0, $height/2+rand(-15,15), $width+rand(-15,15));
		}
	}
	imagefilledrectangle($im,0,$height-10,$width,$height,imagecolorallocate($im, rand(0,50), rand(0,50),  rand(200,255)));
}else{
//Горизонтальні лінії
	$max = rand(5,8);
	$k = $height/$max;
	if(rand(0,1)==1){
		for($i=0;$i<$max;$i++){
			imagecopy($im, $im1, rand(-5,5), ($i*2)*$k, 0, ($i*2)*$k, $width, $height/2);
			imagecopy($im, $im2, rand(-5,5), (($i*2)+1)*$k, 0, (($i*2)+1)*$k, $width+rand(-15,15), $height/2+rand(-15,15));
		}
	}else{
		for($i=0;$i<$max;$i++){
			imagecopy($im, $im2, rand(-5,5), ($i*2)*$k, 0, ($i*2)*$k, $width, $height/2);
			imagecopy($im, $im1, rand(-5,5), (($i*2)+1)*$k, 0, (($i*2)+1)*$k, $width+rand(-15,15), $height/2+rand(-15,15));
		}
	}
	imagefilledrectangle($im,$width-10,0,$width,$height,imagecolorallocate($im, rand(0,50), rand(0,50),  rand(200,255)));
}

$rand = rand(1,4);
for($i=0;$i<$rand;$i++){
	$s = rand($width/4-$width/8, $width/2+$width/4+$width/8);
	if(rand(0,1)==1){
		$col=imagecolorallocate($im, rand(200,255), rand(200,255),  rand(0,50));
	}else{
		$col=imagecolorallocate($im, rand(0,50), rand(0,50),  rand(200,255));
	}
	imagefilledrectangle($im, 0 ,$s, $width, $s+rand(1,5), $col);
}

Imagettftext($im, 20 , 1, 194, 24, imagecolorallocate($im,rand(200,255),rand(200,255),rand(200,255)),$font2,'UkrCaptcha');

$answer = $word;

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>