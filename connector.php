<?php
include "_functions.php";
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
	//http_response_code($param);

}else{
	$url = strtolower(dirname(__FILE__).'/pages/error/404.php');
	//http_response_code(404);
}


if(!checkLogined() AND $param!='login'){
	$title= 'Зачекайте...';
	$main = "Помилка!";
	$eval = "window.location.hash = 'login';";
}else{
	ob_start();
		include($url);
		$main = ob_get_contents();
	ob_end_clean();
}


$eval = isset($eval)&&strlen($eval)>1?$eval:"";
$response = isset($response)&&strlen($response)>1?$response:"";
$request = array(
	'header'     => $title,						//Header
	'main'        => $main,						//innerHTML
	'eval'         => $eval,						//eval
	'response' => $response					//response
);

$return = json_encode($request);
$return = 'XQvI24mDj3XQvI24mDj3vI24vI24====='.$return.'=====XQvI24mDj3vXQvI24mDj3vI24I24';
$return = base64_encode($return);
$return = rtrim($return, '=');
$return = str_replace('=', 'vI24mDj3', $return);

function getRandStr(){return rtrim(base64_encode(mt_rand()) ,'=');}$secret = getRandStr();

$return = $secret.$return.'dG2Sp6rW'.$secret;
echo $return;