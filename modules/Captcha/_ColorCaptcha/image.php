<?php
include dirname(__FILE__).'/../fonts/font.php';
include dirname(__FILE__).'/../_curvature_library.php';
include 'text-generator.php';
$answer = $adj.$noun;
$tilt = rand(-7,7);
$textsize = rand(22, 30);
$width = 200;
$height = 200;
$im = imagecreatetruecolor($width, $height);


$r1=rand(50,200);
$r2=rand(50,200);
$r3=rand(50,200);
$color[0] = ImageColorAllocate($im,$r1+rand(-25,25), $r2+rand(-25,25),  $r3+rand(-25,25));
$color[1] = ImageColorAllocate($im,$r1+rand(-25,25), $r2+rand(-25,25),  $r3+rand(-25,25));
$color[2] = ImageColorAllocate($im,$r1+rand(-25,25), $r3+rand(-25,25),  $r2+rand(-25,25));
$color[3] = ImageColorAllocate($im,$r2+rand(-25,25), $r1+rand(-25,25),  $r3+rand(-25,25));
$color[4] = ImageColorAllocate($im,$r2+rand(-25,25), $r3+rand(-25,25),  $r1+rand(-25,25));
$color[5] = ImageColorAllocate($im,$r3+rand(-25,25), $r1+rand(-25,25),  $r2+rand(-25,25));
$color[6] = ImageColorAllocate($im,$r3+rand(-25,25), $r2+rand(-25,25),  $r1+rand(-25,25));
$color[7] = ImageColorAllocate($im,$r1+rand(-25,25), $r1+rand(-25,25),  $r1+rand(-25,25));
$color[8] = ImageColorAllocate($im,$r1+rand(-25,25), $r1+rand(-25,25),  $r2+rand(-25,25));
$color[9] = ImageColorAllocate($im,$r1+rand(-25,25), $r1+rand(-25,25),  $r3+rand(-25,25));
$color[10] = ImageColorAllocate($im,$r1+rand(-25,25), $r2+rand(-25,25),  $r1+rand(-25,25));
$color[11] = ImageColorAllocate($im,$r1+rand(-25,25), $r3+rand(-25,25),  $r1+rand(-25,25));
$color[12] = ImageColorAllocate($im,$r2+rand(-25,25), $r2+rand(-25,25),  $r2+rand(-25,25));
$color[13] = ImageColorAllocate($im,$r3+rand(-25,25), $r3+rand(-25,25),  $r1+rand(-25,25));
$color[14] = ImageColorAllocate($im,$r1+rand(-25,25), $r3+rand(-25,25),  $r1+rand(-25,25));
$color[15] = ImageColorAllocate($im,$r2+rand(-25,25), $r2+rand(-25,25),  $r3+rand(-25,25));
$color[16] = ImageColorAllocate($im,$r2+rand(-25,25), $r2+rand(-25,25),  $r1+rand(-25,25));
$color[17] = ImageColorAllocate($im,$r3+rand(-25,25), $r1+rand(-25,25),  $r3+rand(-25,25));


imagefilledrectangle($im,0,0,$width,$height,$color[1]);

$LETTERS='qwertyuiopasdfghjklzxcvbnm1234567890';

$x=1;
while ($x++< rand(35, 60)) {
	$tilt228 = rand(-100,100);
	$textsize228 = rand(10,35);
	$ran1 = rand(5, $width-5);
	$ran2 = rand(5, $height-5);
	Imagettftext($im,$textsize228, $tilt228, $ran1, $ran2, $color[rand(2,17)], $font, $LETTERS[rand(0, strlen($LETTERS)-1)]);
}

Imagettftext($im, 17, 1, 45, 25, $color[0], $font, 'ColorCaptcha');
//Пишем два слова
$ran1 = rand(3, $width/2 - 20);
$ran2 = rand($height/4, $height/2-10);
Imagettftext($im,$textsize, $tilt, $ran1, $ran2, $color[2], $font, $adj);
$ran1 = rand(3, $width/2 - 20);
$ran2 = rand($height/2+10, $height/2+$height/4 - 10);
Imagettftext($im, $textsize, $tilt, $ran1, $ran2, $color[3], $font, $noun);

while ($x++< rand(2, 5)) {
	$tilt228 = rand(-100,100);
	$textsize228 = rand(10,35);
	$ran1 = rand(5, $width-5);
	$ran2 = rand(5, $height-5);
	Imagettftext($im,$textsize228, $tilt228, $ran1, $ran2, $color[rand(2,17)], $font, $LETTERS[rand(0, strlen($LETTERS)-1)]);
}
$i=0;
        while ($i++<rand(10,14))
        {
	$r1=rand(5,$width-5);
	$r2=rand(5,$height-5);
	$r3=rand(5,$width-5);
	$r4=rand(5,$height-5);
	imageline($im, $r1, $r2, $r3, $r4, $color[$i]);
	imageline($im, $r1+rand(-10,10), $r2+rand(-10,10), $r3+rand(-10,10), $r4+rand(-10,10), $color[$i]);
        }

function imgInit($im){
	Header ('Content-type: image/png');
	imagepng($im);
}
?>