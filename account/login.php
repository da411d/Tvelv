<? include "libs/main.php";

if($_GET['a']=="login" AND $_GET['b'] AND $_GET['c']){
	if(user_login($_GET['b'], $_GET['c'])){
		login_me($_GET['b']);
		$header = 'Зачекайте...';
		$main =  "";
		$eval = "window.location = '#profile';window.location.reload();";
	}else{
		include dirname(__FILE__).'/login_form.php';
		$main = "Неправильний пароль!<br>".$main;
		$eval = $eval."document.getElementById('pass').focus()";
	}
}else{
	include dirname(__FILE__).'/login_form.php';
}