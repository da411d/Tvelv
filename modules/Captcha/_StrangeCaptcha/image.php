<?php
include 'text-generator.php';
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
$width = 375;
$height = 250;
$tilt = rand(-5,5);
$textsize = rand(20,23);


$im = imagecreatetruecolor($width, $height); 
$white = ImageColorAllocatealpha ($im,rand(0, 255), rand(0, 255),  rand(0, 255), 40);

if(rand(0,1)==1){
	$color = imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255));
	$bg = imagecolorallocate($im, rand(0,100), rand(0,100), rand(0,100));
	$white = ImageColorAllocatealpha ($im, rand(0,100), rand(0,100), rand(0,100), 40);
}else{
	$color = imagecolorallocate($im, rand(0,100), rand(0,100), rand(0,100));
	$bg = imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255));
	$white = ImageColorAllocatealpha ($im,  rand(100,255), rand(100,255), rand(100,255), 40);
}


imagefilledrectangle($im, 0, 0, $width, $height, $bg);

$k = rand(20,30);
$l = rand(20,30);
for($i=-1;$i<$width/$k;++$i){
	for($ii=-1;$ii<$height/rand(20,30);++$ii){
		$color4sh = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
		imagefilledrectangle($im,($i-1)*$k+rand(-5,5), ($ii-1)*$l+rand(-5,5), ($i+1)*$k+rand(-5,5), ($ii+1)*$l+rand(-5,5), $color4sh);
	}
}
wave_region($im, 0 ,0 ,$width, $height,rand(2,5),rand(20,25));

$k = rand(20,30);
$l = rand(20,30);
for($i=-1;$i<$width/$k+1;++$i){
	for($ii=-1;$ii<$height/rand(20,30)+1;++$ii){
		$color4sh = imagecolorallocatealpha($im, rand(0,255), rand(0,255), rand(0,255), 80);
		imagefilledrectangle($im,($i-1)*$k+rand(-5,5), ($ii-1)*$l+rand(-5,5), ($i+1)*$k+rand(-5,5), ($ii+1)*$l+rand(-5,5), $color4sh);
	}
}
wave_region($im, 0 ,0 ,$width, $height,rand(2,5),rand(20,25));

lines($im);

	$letters='1234567890ETIOPAHKXCBM';
	for($x=0;$x<rand(20, 40);$x++) {
		$r1 = rand(15,20);
		$r2 = rand(-100,100);
		$r3 = rand(0, $width);
		$r4 = rand(0, $height);
		$r5 = $letters[rand(0, strlen($letters)-1)];
		Imagettftext($im, $r1, $r2, $r3+1, $r4+1, $white, $font, $r5);
		Imagettftext($im, $r1, $r2, $r3+1, $r4-1, $white, $font, $r5);
		Imagettftext($im, $r1, $r2, $r3-1, $r4+1, $white, $font, $r5);
		Imagettftext($im, $r1, $r2, $r3-1, $r4-1, $white, $font, $r5);
		Imagettftext($im, $r1, $r2, $r3, $r4, $color, $font, $r5);
	}

$ran1 = rand(10, 20)+$textsize;
$ran2 = rand(30, 55)+$textsize;


	Imagettftext($im,$textsize, $tilt, $ran1+1, $ran2+1, $white, $font, $str );
	Imagettftext($im,$textsize, $tilt, $ran1+1, $ran2-1, $white, $font, $str );
	Imagettftext($im,$textsize, $tilt, $ran1-1, $ran2+1, $white, $font, $str );
	Imagettftext($im,$textsize, $tilt, $ran1-1, $ran2-1, $white, $font, $str );
	Imagettftext($im,$textsize, $tilt, $ran1+1, $ran2+1, $white, $font, $str );

	Imagettftext($im,$textsize, $tilt, $ran1, $ran2, $color, $font, $str );


lines($im);

ellipse($im);

wave_region($im, 0 ,0 ,$width, $height,rand(2,5),rand(20,25));
wave_region($im, 0 ,0 ,$width, $height,rand(2,5),rand(20,25));
wave_region($im, 0 ,0 ,$width, $height,rand(5,8),rand(30,35));

ellipse($im);

Imagettftext($im, 20 , 1, 144, 24, $white, $font2, 'StrangeCaptcha');
Imagettftext($im, 20 , 1, 144, 26, $white, $font2, 'StrangeCaptcha');
Imagettftext($im, 20 , 1, 146, 24, $white, $font2, 'StrangeCaptcha');
Imagettftext($im, 20 , 1, 146, 26, $white, $font2, 'StrangeCaptcha');
Imagettftext($im, 20 , 1, 145, 25, $color, $font2, 'StrangeCaptcha');
Imagettftext($im, 20 , 1, 145, 25, $color, $font2, 'StrangeCaptcha');

$k = rand(20,30);
$l = rand(20,30);
for($i=-1;$i<$width/$k+1;++$i){
	for($ii=-1;$ii<$height/rand(20,30)+1;++$ii){
		$color4sh = "";
		$color4sh = imagecolorallocatealpha($im, rand(0,255), rand(0,255), rand(0,255), 100);
		imagefilledrectangle($im,($i-1)*$k+rand(0,15), ($ii-1)*$l+rand(0,15), ($i+1)*$k+rand(0,15), ($ii+1)*$l+rand(0,15), $color4sh);
	}
}

wave_region($im, 0 ,0 ,$width, $height,rand(2,5),rand(20,25));

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>