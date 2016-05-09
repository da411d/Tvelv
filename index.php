<?php
include "_functions.php";
include "_config.php";
ob_start("callback");
error_reporting(0);
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

if(strlen($param)>0){
	if($param==''){
		$param='index';
	}
	header("Location: /#".$_SERVER['QUERY_STRING']);
}

include dirname(__FILE__)."/templates/".TEMPLATE."/_index.php";
?>

<?php ob_end_flush();?>