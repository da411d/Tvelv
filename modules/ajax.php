<?php
include "../_functions.php";
include "../_config.php";

$in = $_GET['a'];
$in = trim(rtrim($in, '/'), '/');

if(strpos($in, '-')){
	$params =  explode("-", $in);
}else{
	$params =  [$in];
}

switch ($params[0]) {
	case 'getStudentsByClass':
		if($params[1]){
			$arr = getStudentsByClass($params[1]);
			usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
			echo json_encode($arr);
		}
		break;
}