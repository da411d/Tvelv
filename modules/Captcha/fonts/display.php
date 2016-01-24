<?php 
function listdir($dir='.') { 
    if (!is_dir($dir)) { 
        return false; 
    } 
    
    $files = array(); 
    listdiraux($dir, $files); 

    return $files; 
} 

function listdiraux($dir, &$files) { 
    $handle = opendir($dir); 
    while (($file = readdir($handle)) !== false) { 
        if ($file == '.' || $file == '..') { 
            continue; 
        } 
        $filepath = $dir == '.' ? $file : $dir . '/' . $file; 
        if (is_link($filepath)) 
            continue; 
        if (is_file($filepath)) 
            $files[] = $filepath; 
        else if (is_dir($filepath)) 
            listdiraux($filepath, $files); 
    } 
    closedir($handle); 
} 

$files = listdir(dirname(__FILE__)); 
sort($files, SORT_LOCALE_STRING); 
$fonts = array();
foreach ($files as $f) { 
	if(strpos($f, '.TTF') OR strpos($f, '.ttf')){
		$fonts[] = $f;
	} 
}


$width = 1850;
$height = 1800;
$im = imagecreatetruecolor($width, $height);

foreach ($fonts as $f) {
	$y+=30;
	Imagettftext($im, 20 , 0, 10, $y, imagecolorallocate($im,rand(200,255),rand(200,255),rand(200,255)),$f,$f.'абвгдеєжзиійклмнопрст');
}
Header ('Content-type: image/jpeg');
imagejpeg($im);
imagedestroy($im);