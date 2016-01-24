<?

//template:
// $im = wave_region($im, 0 ,0 ,$width, $height,rand(7,10),rand(5,8));
function wave_region($img, $x, $y, $width, $height,$amplitude = 10,$period = 10){
        $mult = 1;
        $img2 = imagecreatetruecolor($width * $mult, $height * $mult);
        imagecopyresampled ($img2,$img,0,0,$x,$y,$width * $mult,$height * $mult,$width, $height);
        for ($i = 0;$i < ($width * $mult);$i += 1){
           imagecopy($img2,$img2,
               $x + $i - 2,$y + sin($i / $period) * $amplitude,    // dest
               $x + $i,$y,            // src
               1,($height * $mult));
        }
        imagecopyresampled ($img,$img2,$x,$y,0,0,$width, $height,$width * $mult,$height * $mult);
        return $img2;
}


function lines($im, $cnt=3){
$width = $GLOBALS['width'];
$height = $GLOBALS['height'];
$bg = $GLOBALS['bg'];
$white = $GLOBALS['white'];

	for($ii = 0;$ii<$cnt;$ii++){
		$r1=rand(0,50);
		$r2=rand(0,$height);
		$r3=rand($width-50,$width);
		$r4=rand(0,$height);

        	for($i=0;$i<rand(1,2);$i++){
			imageline($im, $r1, $r2, $r3, $r4, $bg);
			imageline($im, $r1+$i+rand(-2,2), $r2+$i+rand(-2,2), $r3+$i+rand(-2,2), $r4+$i+rand(-2,2), $white);
        	}
		$r1=rand(0,$width);
		$r2=rand(0,10);
		$r3=rand(0,$width);
		$r4=rand($height-10,$height);

        	for($i=0;$i<rand(1,2);$i++){
			imageline($im, $r1, $r2, $r3, $r4, $bg);
			imageline($im, $r1+$i, $r2+$i, $r3+$i, $r4+$i, $white);
        	}
	}
return $im;
}


function ellipse($im){
$width = $GLOBALS['width'];
$height = $GLOBALS['height'];
$bg = $GLOBALS['bg'];
$white = $GLOBALS['white'];

	for($i = 0;$i<rand(5,9);$i++){
		$r1=rand(0,$width);
		$r2=rand(0,$height);
		$r3=rand(5,25);
		$r4=rand(5,25);
		imagefilledellipse($im, $r1, $r2, $r3, $r4, $bg);
	}

	for($i = 0;$i<rand(5,9);$i++){
		$r1=rand(0,$width);
		$r2=rand(0,$height);
		$r3=rand(5,25);
		$r4=rand(5,25);
		imagefilledellipse($im, $r1, $r2, $r3, $r4, $white);
	}
return $im;
}

function sharpness($im){
	for($i=0;$i<50;$i++){
		$matrix = array(array(-1,-1,-1), array(-1,16,-1), array(-1,-1,-1));
		imageconvolution($im, $matrix, 8, 0);
	}
	return $im;
}