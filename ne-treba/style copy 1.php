<?php
header('content-type: text/css');
include "../_functions.php";

function calback($content){
	$content = preprocessor($content);
	$content = str_replace("	","", $content);
	$content = str_replace("	","", $content);
	$content = str_replace(": ",":", $content);
	$content = str_replace(" {","{", $content);
	$content = str_replace(", ",",", $content);
	$content = str_replace(" ,",",", $content);
	$content = str_replace("; ",";", $content);
	$content = str_replace("\n","", $content);
	$content = str_replace("\r","", $content);
	$content = str_replace("  ","", $content);
	$content = str_replace(";}","}", $content);
	$content = str_replace(" {","{", $content);

	return $content;
}
ob_start("calback");

function preprocessor($text){
	$parts = explode("~~~~~~~~~~~~~~~~", $text);
	$parts[0] = str_replace("\n",'',$parts[0]);
	$parts[0] = str_replace("\r",'',$parts[0]);
	$param = explode(";", $parts[0]);
	$style = $parts[1];
	$params = array();
	foreach($param as $p){
		if(isset($p)){
			$params[] = explode(" = ", $p);
		}
	}
	foreach($params as $p){
		if(isset($p) AND isset($p[0]) AND isset($p[1])){
			$style = str_replace($p[0], $p[1], $style);
		}
	}
	return $style;
}

if(!isset($_GET['a'])){
	include(dirname(__FILE__)."/_settings.php");
}else{
	include(dirname(__FILE__)."/_".base64_decode($_GET['a']).".php");
}

include(dirname(__FILE__)."/style.css");

echo "@media (max-width: _reticle_mobilecomp_barrier_){";
	include(dirname(__FILE__)."/style-mob.css");
echo "}";

echo "@media (min-width: _reticle_mobilecomp_barrier_){";
	include(dirname(__FILE__)."/style-pc.css");
echo "}";

include(dirname(__FILE__)."/style-easters.php");

ob_end_flush();

?>