<?
$in = $_GET['in'];
$in = explode("&", $in)[0];
$in = trim(rtrim($in, '/'), '/');

if(strpos($in, '-')){
	$params =  explode("-", $in);
}else{
	$params =  [$in];
}
switch ($params[0]) {
	case 'getStudentsByClass':
		if($params[1]){
			$arr = user::getStudentsByClass($params[1]);
			usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
			echo json_encode($arr);
		}
		break;
	case 'checkLogined':
		echo login::checkLogined()?1:0;
		break;
}