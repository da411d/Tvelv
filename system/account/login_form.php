<?
$header = 'Ти не ввійшов!';


$main = "	<label>Логін: <input type=\"text\" id=\"login\" value=\"".$_GET['b']."\"></label>
		<br>
		<label>Пароль: <input type=\"password\" id=\"pass\"  onkeydown=\"if(event.keyCode == 13){eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);}\" ></label>
		<br>
		<button onclick=\"eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);\">Ввійти!</button>
		";


$eval = "if(window.location.hash!='#login'){window.location.hash='login';}document.getElementById('login').focus();document.getElementById('navbar').innerHTML = '<a href=\"#login\"> <img src=\"/assets/images/icons/login.svg\" class=\"icon\">Вхід</a>';";