<?
$dh = opendir(dirname(__FILE__).'/');
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$includements = [];
foreach ($files as $f) { 
	if($f AND !strpos(' '.$f, '!') AND strpos($f, '.css') AND !strpos($f, '.php')  AND !is_dir(dirname(__FILE__).'/'.$f) AND file_exists(dirname(__FILE__).'/'.$f) AND !in_array($f, $includements)){
		$includements[] = dirname(__FILE__).'/'.$f;
	} 
}
foreach ($includements as $i) { 
	include_once $i;
}