<? 
include dirname(__FILE__)."/../libs/main.php";

$login = get_logined();

if(!get_logined()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#login';window.location.reload();";
}else{
	$header = 'Профіль';
	$main =  '<h1>Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!</h1>';
}

$main .= '';