<?php
include "_functions.php";
include "_classes.php";
include "_config.php";
ob_start("callback");
?>

<?php
header("Cache-Control:public, max-age=86400");
header('Content-Type: text/html; charset=utf-8');

if(isset($_GET["param"])){
	$param = $_GET["param"];
}else{
	$param = '';
}

$param = trim($param, '/');
$param = rtrim($param, '/');
$param = str_replace(array('/', '.'), '-', $param);
if($param==''){
	$param='index';
}

if(file_exists(strtolower(dirname(__FILE__).'/pages/pages/'.$param.'.php'))){
	$url = strtolower(dirname(__FILE__).'/pages/pages/'.$param.'.php');

}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/special/'.$param.'.php'))){
	$url = strtolower(dirname(__FILE__).'/pages/special/'.$param.'.php');

}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/301/'.$param.'.php'))){
	$url = strtolower(dirname(__FILE__).'/pages/301/'.$param.'.php');
	include($url);
	http_response_code(301);
	header('Location: http://blastorq.pp.ua/'.$newurl);

}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php'))){
	$url = strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php');
	http_response_code($param);

}else{
	$url = strtolower(dirname(__FILE__).'/pages/error/404.php');
	http_response_code(404);

}

ob_start(function($content){$GLOBALS['innerHTML'] = $content;});
	include($url);
ob_end_flush();

include dirname(__FILE__)."/templates/".TEMPLATE."/_index.php";
?>

<?php ob_end_flush();?>