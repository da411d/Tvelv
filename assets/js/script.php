<?php
header('content-type: text/js');
include "../../_functions.php";

function calback($content){
	return $content;
	return minify_js($content);
}
ob_start("calback");

$feature = (isset($_GET['f']) AND $_GET['f'])?'/features/'.$_GET['f']:false;

if($feature){
	$dir = dirname(__FILE__).'/'.$feature.'/';
}else{
	$dir = dirname(__FILE__).'/scripts/';
}
$dh = opendir($dir);
$files = [];
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$arr = array();
foreach ($files as $f) { 
	if($f AND !is_dir($f) AND !strpos(' '.$f, '!')){
		include($dir.$f);
		echo ";";
	} 
}

?>

<?php
ob_end_flush();
?>