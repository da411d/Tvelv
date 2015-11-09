<?
include "libs/main.php";
$in = $_GET['a'];
$in = trim(rtrim($in, '/'), '/');


if(strpos($in, '/')){
	$params =  explode("/", $in);
}else{
	$params =  [$in];
}
if(!get_logined() AND $params[0]!='login'){
	include "account/profile.php";
	$request = [
		$header,			//Header
		$main			//innerHTML
	];
	echo json_encode($request);
	exit;
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

	case 'settings':
		include "account/settings.php";
		break;

	case 'chpwd':
		include "account/chpwd.php";
		break;

	case 'marks':
		include "marks/get.php";
		break;

	case 'stats':
		include "plugins/stats/get.php";
		break;

}

$request = [
	$header,			//Header
	$main			//innerHTML
];


echo json_encode($request);