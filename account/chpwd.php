<? 
include "libs/main.php";

$form =  "<br><input type=\"text\" id=\"login\" value=\"".get_logined()."\" readonly><br>
				<input type=\"password\" id=\"pass\"><br>
				<input id=\"new\"><br>
				<button onclick=\"eLoad('a=chpwd&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value+'&d='+document.getElementById('new').value);\">Поїхали!</button>";


if($_GET['b']==get_logined() AND $_GET['c'] AND $_GET['d']){
	if(user_change_password($_GET['b'], $_GET['c'], $_GET['d'])){
		$header = 'Пароль змінено!';
		$main = "Новий пароль: ".$_GET['d'];
	}else{
		$header = 'Змінити пароль';
		$main = "Неправильний старий пароль!".$form;
	}
}else{
	$header = 'Змінити пароль';
	$main = $form;
}