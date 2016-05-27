<?php 
$dh = opendir(dirname(__FILE__).'/classes');
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$arr = array();
foreach ($files as $f) { 
	if($f AND !is_dir($f) AND !strpos(' '.$f, '!')){
		include(dirname(__FILE__).'/classes/'.$f);
	} 
}