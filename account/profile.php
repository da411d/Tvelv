<? 
include "libs/main.php";

$login = get_logined();

if(!get_logined()){
	$header = 'Ти не ввійшов!';
	$main = "<br><input type=\"text\" id=\"login\"><br>
			<input type=\"password\" id=\"pass\"><br>
			<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
";
}else{
	$header = 'Профіль';
	$main =  'Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!';
}