<?php 
$dh = opendir(dirname(__FILE__).'/../pages/');
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$links = array();
foreach ($files as $f) { 
	if($f AND !strpos(' '.$f, '!') AND !is_dir($f)){
		$links[] = $f;
	} 
}
$url = $links[rand(0,count($links)-1)];
$url = str_replace('-', '/', $url);
$url = rtrim($url, '.php');
header('location:'.$url);

?>