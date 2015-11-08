<?
include "libs/main.php";
$in = $_GET['a'];
$in = trim(rtrim($in, '/'), '/');


if(strpos($in, '/')){
	$params =  explode("/", $in);
}else{
	$params =  [$in];
}

switch ($params[0]) {
case 'account':
    include "account.php";
    break;
}




$request = [
$header,							//Header
$main			//innerHTML
];


echo json_encode($request);