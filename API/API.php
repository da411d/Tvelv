<?php 
$dh = opendir(dirname(__FILE__));
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$arr = array();
foreach ($files as $f) { 
	if($f AND !is_dir($f) AND !strpos(' '.$f, '!') AND $f!="API.php" AND file_exists(dirname(__FILE__).'/'.$f)){
		include_once(dirname(__FILE__).'/'.$f);
	} 
}