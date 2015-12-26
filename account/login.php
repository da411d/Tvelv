<? include "libs/main.php";

if($_GET['a']=="login" AND $_GET['b'] AND $_GET['c']){
	if(user_login($_GET['b'], $_GET['c'])){
		login_me($_GET['b']);
		$header = 'Зачекайте...';
		$main =  "";
		$eval = "window.location = '#profile';window.location.reload();";
	}else{
		$header = 'Ти не ввійшов!';

		$main = "Неправильний пароль!<br><label>Логін: <input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"></label><br>
				<label>Пароль: <input type=\"password\" id=\"pass\"  onkeydown=\"if(event.keyCode == 13){eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);}\" ></label><br>
				<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
	";
		$eval = "if(window.location.hash!='#login'){window.location.hash='login';}document.getElementById('pass').focus();";
	}
}else{
	$header = 'Ти не ввійшов!';
	$main = "Неправильний пароль!<br><label>Логін: <input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"></label><br>
			<label>Пароль: <input type=\"password\" id=\"pass\"  onkeydown=\"if(event.keyCode == 13){eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);}\" ></label><br>
			<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
";
	$eval = "if(window.location.hash!='#login'){window.location.hash='login';}document.getElementById('pass').focus();";}