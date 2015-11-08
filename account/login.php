<? include "libs/main.php";
if($_GET['a']=="login" AND $_GET['b'] AND $_GET['c']){
	if(user_login($_GET['b'], $_GET['c'])){
		login_me($_GET['b']);
		$header = 'Зачекайте...';
		$main =  "<img src=\"http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_21.gif\" onload=\"onHashChange()\">";
	}else{
		$header = 'Ти не ввійшов!';
		$main = "Неправильний пароль!<br><input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"><br>
				<input type=\"password\" id=\"pass\"><br>
				<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
	";}
}else{
	$header = 'Ти не ввійшов!';
	$main = "Неправильний пароль!<br><input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"><br>
			<input type=\"password\" id=\"pass\"><br>
			<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
";}