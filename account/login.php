<? include "libs/main.php";
if($_GET['a']=="login" AND $_GET['b'] AND $_GET['c']){
	if(user_login($_GET['b'], $_GET['c'])){
		login_me($_GET['b']);
		$header = 'Зачекайте...';
		$main =  "<img src=\"https://vk.com/images/blank.gif\" onload=\"window.location = '#profile';window.location.reload();\" hidden>";
	}else{
		$header = 'Ти не ввійшов!';
		$main = "Неправильний пароль!<br><label>Логін: <input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"></label><br>
				<label>Пароль: <input type=\"password\" id=\"pass\"></label><br>
				<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
	";}
}else{
	$header = 'Ти не ввійшов!';
	$main = "Неправильний пароль!<br><label>Логін: <input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"></label><br>
			<label>Пароль: <input type=\"password\" id=\"pass\"></label><br>
			<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
";}