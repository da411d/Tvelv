<?$title= 'Ти не ввійшов!';

if(getLoginedUsername()){
	header('Location: /profile');
}

if($_POST['b'] AND $_POST['c']){
	if(isPasswordCorrect($_POST['b'], $_POST['c'])){
		loginMe($_POST['b']);
		$title = 'Зачекайте...';
		header('Location: /profile');
	}else{
		$main = "Неправильний пароль!<br>".$main;
		$eval = "<script>document.getElementById('pass').focus()</script>";
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

	<p><input type="submit"value="Ввійти!"></p>
</form>
<input type="hidden" id="login" name="a" value="<?=base64_encode(sha1('HELLO'.$_SERVER['REMOTE_ADDR'].getdate()).sha1($_SERVER['REMOTE_ADDR'].getdate()));?>">
<script>
document.getElementById('login').focus();
document.getElementById('navbar').innerHTML = '<a href="#login"> <img src="/assets/images/icons/login.svg" class="icon">Вхід</a>';
</script>