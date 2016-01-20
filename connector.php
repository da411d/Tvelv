<?
include "system/libs/main.php";
$in = $_GET['a'];
$in = trim(rtrim($in, '/'), '/');

if(strpos($in, '-')){
	$params =  explode("-", $in);
}else{
	$params =  [$in];
}

if(get_logined()){
	switch ($params[0]) {
		case 'profile':if(isset($params[1])){include "system/account/profile.php";}else{include "system/account/my_profile.php";}
			break;

		case 'login':
			include "system/account/login.php";
			break;

		case 'logout':
			include "system/account/logout.php";
			break;

		case 'settings':
			include "system/account/settings.php";
			break;

		case 'chpwd':
			include "account/chpwd.php";
			break;

		case 'marks':
			include "system/marks/get.php";
			break;

		case 'stats':
			include "system/plugins/stats/get.php";
			break;
	}
}else{
	include "system/account/login.php";
}

$request = array(
	'header'    => $header,		//Header
	'main'        => $main,		//innerHTML
	'eval'         => $eval			//eVal
);

$return = json_encode($request);
$return = 'XQvI24mDj3XQvI24mDj3vI24vI24====='.$return.'=====XQvI24mDj3vXQvI24mDj3vI24I24';
$return = base64_encode($return);
$return = rtrim($return, '=');
$return = str_replace('=', 'vI24mDj3', $return);

function getRandStr(){return rtrim(base64_encode(mt_rand()) ,'=');}$secret = getRandStr();

$return = $secret.$return.'dG2Sp6rW'.$secret;
echo $return;