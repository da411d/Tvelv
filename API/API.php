<?php 
$dh = opendir(dirname(__FILE__));
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$arr = array();
foreach ($files as $f) { 
	if($f AND !is_dir($f) AND !strpos(' '.$f, '!') AND $f!="API.php"){
		include(dirname(__FILE__).'/'.$f);
	} 
}