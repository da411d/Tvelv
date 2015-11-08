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
	case 'profile':
		include "account/profile.php";
		break;
	case 'login':
		include "account/login.php";
		break;
	case 'logout':
		include "account/logout.php";
		break;
}




$request = [
$header,							//Header
$main			//innerHTML
];


echo json_encode($request);