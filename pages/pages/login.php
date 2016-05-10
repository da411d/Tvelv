<?$title= 'Ти не ввійшов!';

if(checkLogined()){
	$eval = "window.location.hash='profile;";
}

$login = isset($_POST[_crypt('login', $_POST['secretcode'])])?$_POST[_crypt('login', $_POST['secretcode'])]:false;
$pwd = isset($_POST[_crypt('pass', $_POST['secretcode'])])?$_POST[_crypt('pass', $_POST['secretcode'])]:false;

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

if($login AND $pwd AND (!$POST['login'] AND !$POST['password'])){
	if(isPasswordCorrect($login, $pwd) AND $allow){
		resetAttempts($login);
		$token = loginMe($login);
		$title = 'Зачекайте...';
		if($_GET['_']){
			$eval = "window.location.hash='".$_GET['_']."'; localStorage.setItem('token', '".$token."'); console.log('token', '".$token."')";
		}else{
			$eval = "window.location.hash='profile'; localStorage.setItem('token', '".$token."'); console.log('token', '".$token."')";
		}
	}elseif($allow){
		addAttemptsOne($login);
		echo "<p>Неправильний пароль!</p>";
	}
}
?>
<form method="post">
<input type="hidden" name="secretcode" value="<?
$keyval = _crypt(sha1('KeyForEncrypyion'.rand()), 'LoginForm'.sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
echo $keyval;
?>">
	<label>
			<p>Логін:</p>
			<p><input type="text" name="<?=_crypt('login', $keyval);?>"><input type="hidden" name="login"></p>
	</label>
		
	<label>	
		<p>Пароль:</p>	
		<p><input type="password" name="<?=_crypt('pass', $keyval);?>"><input type="hidden" name="password"></p>
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