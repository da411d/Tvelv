<?
include "libs/main.php";
$in = $_GET['a'];
$in = trim(rtrim($in, '/'), '/');


if(strpos($in, '/')){
	$params =  explode("/", $in);
}else{
	$params =  [$in];
}

if(get_logined()){
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
}else{
	include "account/login.php";
}

$request = array(
	$header,			//Header
	$main,			//innerHTML
	$eval			//eVal
);

$return = json_encode($request);
$return = 'XQvI24mDj3XQvI24mDj3vI24vI24====='.$return.'=====XQvI24mDj3vXQvI24mDj3vI24I24';
$return = base64_encode($return);
//$return = rtrim($return, '=');
$return = str_replace('=', 'vI24mDj3', $return);

function getRandStr(){return rtrim(base64_encode(mt_rand()) ,'=');}$secret = getRandStr();

$return = $secret.$return.'dG2Sp6rW'.$secret;
echo $return;