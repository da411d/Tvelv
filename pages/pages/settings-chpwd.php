<? 
if($_POST['login']==login::getLoginedUsername() AND $_POST['pass'] AND $_POST['new']){
	if(login::editUserPassword($_POST['login'], $_POST['pass'], $_POST['new'])){
		login::loginMe($_POST['login']);
		$title = 'Пароль змінено!';
		echo "Новий пароль: ".$_POST['new'];
	}else{
		$title = 'Змінити пароль';
		echo "Неправильний старий пароль!";
	}
}else{
	$title = 'Змінити пароль';
	echo $form;
}
?>
<form method="post">
<label>
	<p>Логін:</p>
	<p><input type="text" name="login" value="<?=getLoginedUsername()?>" readonly></p>
</label>

<label>
	<p>Пароль: </p>
	<p><input type="password" name="pass"></p>
</label>

<label>
	<p>Новий пароль: </p>
	<p><input name="new"></p>
</label>

<p><input type="submit" onclick="eLoad('a=chpwd&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value+'&d='+document.getElementById('new').value); value="Поїхали!"></p>
</form>