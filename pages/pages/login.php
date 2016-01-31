<?$title= 'Ти не ввійшов!';

if(checkLogined()){
	header('Location: /profile');
}
$login = $_POST[_crypt('login', 'LoginForm'.sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).sha1(date("Ymd")))];
$pwd = $_POST[_crypt('pass', 'LoginForm'.sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).sha1(date("Ymd")))];
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

if($login AND $pwd AND (!isset($POST['login']) AND !isset($POST['password'])) OR (!$POST['login'] AND !$POST['password'])){
	if(isPasswordCorrect($login, $pwd) AND $allow){
		resetAttempts($login);
		loginMe($login);
		$title = 'Зачекайте...';
		if($_GET['_']){
			header('Location: /'.$_GET['_']);
		}else{
			header('Location: /profile');
		}
	}else{
		addAttemptsOne($login);
		$main = "Неправильний пароль!<br>".$main;
	}
}
?>
<form method="post">
	<label>
			<p>Логін:</p>
			<p><input type="text" name="<?=_crypt('login', 'LoginForm'.sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).sha1(date("Ymd")));?>"><input type="hidden" name="login"></p>
	</label>
		
	<label>	
		<p>Пароль:</p>	
		<p><input type="password" name="<?=_crypt('pass', 'LoginForm'.sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).sha1(date("Ymd")));?>"><input type="hidden" name="password"></p>
	</label>
	<?
		if(getAttempts($login)>2){
			echo '<p>Ти ввійшов(-ла) невдало '.getAttempts($login).' разів. Тепер тобі треба ввести капчу.';
			echo '<script src="http://'.SERVER_NAME.'/'.SITEDIR.'modules/'.$CaptchaName.'Captcha/api.js"></script>';
			echo '<div id="'.$CaptchaName.'Captcha"><script type="text/javascript">'.$CaptchaName.'Captcha(\''.$CaptchaName.'Captcha\')</script></div></p>';
		}
	?>
	
	<p><input type="submit"value="Ввійти!"></p>
	<input type="hidden" name="ЩобСкучноНеБуло" value="<?=_crypt(sha1(getPasswordSalt($code['a'])).sha1(getPasswordSalt($code['a'])), '228626');?>">
</form>
<script>
document.getElementById('nav').innerHTML = '<a href="/login"> <img src="/assets/images/icons/login.svg" class="icon">Вхід</a>';
</script>