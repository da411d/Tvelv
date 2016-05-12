<?php
header('content-type: text/css');

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
$feature = (isset($_GET['f']) AND $_GET['f'])?'/features/'.$_GET['f']:false;

if($feature){
	include(dirname(__FILE__)."/_settings.php");

	include(dirname(__FILE__).$feature."/style.css");

	echo "@media(max-width: _reticle_mobilecomp_barrier_){";
		include(dirname(__FILE__).$feature."/style-mob.css");
	echo "}";

	echo "@media(min-width: _reticle_mobilecomp_barrier_){";
		include(dirname(__FILE__).$feature."/style-pc.css");
	echo "}";
}else{
	include(dirname(__FILE__)."/_settings.php");

	include(dirname(__FILE__)."/pieces/common/index.php");

	echo "@media(max-width: _reticle_mobilecomp_barrier_){";
		include(dirname(__FILE__)."/pieces/m/index.php");
	echo "}";

	echo "@media(min-width: _reticle_mobilecomp_barrier_){";
		include(dirname(__FILE__)."/pieces/pc/index.php");
	echo "}";

}

ob_end_flush();

?>