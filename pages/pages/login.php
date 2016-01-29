<?$title= 'Ти не ввійшов!';

if(checkLogined()){
	header('Location: /profile');
}
$login = $_POST['b'];
$pwd = $_POST['c'];
if(getAttempts($login)<=7){
	$CaptchaName = 'Rex';
}else{
	$CaptchaName = 'Strange';
}
$captcha_url = "http://".SERVER_NAME.'/'.SITEDIR."modules/".$CaptchaName."Captcha/tester.php?ip=".$_SERVER['REMOTE_ADDR']."&r=".$_POST[$CaptchaName."CaptchaRequest"];
function checkCaptcha($captcha_url){
	if(file_get_contents($captcha_url)=="true"){return true;}return false;
}

if(getAttempts($login)<=2){
	$allow = true;
}else{
	if(checkCaptcha($captcha_url)){
		$allow = true;
	}else{
		$allow = false;
	}
}

if($login AND $pwd){
	if(isPasswordCorrect($login, $pwd) AND $allow){
		resetAttempts($login);
		loginMe($login);
		$title = 'Зачекайте...';
		header('Location: /profile');
	}else{
		addAttemptsOne($login);
		$main = "Неправильний пароль!<br>".$main;
		$eval = "document.getElementById('pass').focus()";
	}
}
?>
<form method="post">
	<label>
			<p>Логін:</p>
			<p><input type="text" id="login" name="b" value=""></p>
	</label>
		
	<label>	
		<p>Пароль:</p>	
		<p><input type="password" id="pass" name="c" onkeydown="if(event.keyCode == 13){eLoad('a=login&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value);}" ></p>
	</label>

	<?
		if(getAttempts($login)>2){
			echo '<p>Ти ввійшов(-ла) невдало '.getAttempts($login).' разів. Тепер тобі треба ввести капчу.';
			echo '<script src="http://'.SERVER_NAME.'/'.SITEDIR.'modules/'.$CaptchaName.'Captcha/api.js"></script>';
			echo '<div id="'.$CaptchaName.'Captcha"><script type="text/javascript">'.$CaptchaName.'Captcha(\''.$CaptchaName.'Captcha\')</script></div></p>';
		}
	?>
	
	<p><input type="submit"value="Ввійти!"></p>
</form>
<input type="hidden" id="login" name="a" value="<?=base64_encode(sha1('HELLO'.$_SERVER['REMOTE_ADDR'].getdate()).sha1($_SERVER['REMOTE_ADDR'].getdate()));?>">
<script>
document.getElementById('login').focus();
document.getElementById('nav').innerHTML = '<a href="#login"> <img src="/assets/images/icons/login.svg" class="icon">Вхід</a>';
<?=$eval;?>
</script>