<? 
include dirname(__FILE__)."/../libs/main.php";

$login = $params[1];

if(!get_logined()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#login';window.location.reload();";
}elseif($login==get_logined()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#profile';window.location.reload();";
}else{
	$header = 'Профіль';
	$main =  '<h1>'.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'];
	if(getUserPermission($login)=='teacher'){
		$main .= '<sup style="background:#ff7777;padding:4px;font-size:50%;">Вчитель</sup>';
	}elseif(getUserPermission($login)=='student'){
		$main .= '<sup style="background:#7777ff;padding:4px;font-size:50%;">Учень</sup>';
	}elseif(getUserPermission($login)=='parent'){
		$main .= '<sup style="background:#77ff77;padding:4px;font-size:50%;">Батько/мама</sup>';
	}else{
		$main .= '<sup style="background:#ff7777;padding:4px;font-size:50%;">'.getUserPermission().'</sup>';
	}
	$main .= '</h1>';
}