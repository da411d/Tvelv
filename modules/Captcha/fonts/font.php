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

$font = $fonts[rand(0, count($fonts)-1)];
$font2 = $fonts[rand(0, count($fonts)-1)];
?>