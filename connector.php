<?php
include "_functions.php";
include "_api.php";
include "_config.php";
error_reporting(0);

if(isset($_GET["a"])){
	$param = $_GET["a"];
}else{
	$param = '';
}
define('TOKEN', $_GET['y']);

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

}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php'))){
	$url = strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php');
	http_response_code($param);

}else{
	$url = strtolower(dirname(__FILE__).'/pages/error/404.php');
	http_response_code(404);
}

$_ = array();

if(!login::checkLogined() AND $param!='login'){
	$_['title'] = 'Зачекайте...';
	$_['main'] = "0";
	$_['eval'] = "window.location.hash = 'login';";
}else{
	$title = "";
	$main = "";
	$eval = "";

	ob_start();
		include($url);
		$main = ob_get_contents();
	ob_end_clean();

	if(isset($title) && strlen($title)>0)		{	$_['title'] = $title;		}
	if(isset($main) && strlen($main)>0)	{	$_['main'] = $main;	}
	if(isset($eval) && strlen($eval)>0)		{	$_['eval'] = $eval;		}
}
$return = json_encode($_);
echo $return;