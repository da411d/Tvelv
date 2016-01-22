<? 
if($_GET['b']==getLoginedUsername() AND $_GET['c'] AND $_GET['d']){
	if(editUserPassword($_GET['b'], $_GET['c'], $_GET['d'])){
		$title = 'Пароль змінено!';
		echo "Новий пароль: ".$_GET['d'];
	}else{
		$title = 'Змінити пароль';
		echo "Неправильний старий пароль!".$form;
	}
}else{
	$title = 'Змінити пароль';
	echo $form;
}
?>
<br>
<label>
	<p>Логін:</p>
	<p><input type="text" id="login" value="<?=getLoginedUsername()?>" readonly></p>
</label>

<label>
	<p>Пароль: </p>
	<p><input type="password" id="pass"></p>
</label>

<label>
	<p>Новий пароль: </p>
	<p><input id="new"></p>
</label>

<p><input type="submit" onclick="eLoad('a=chpwd&b='+document.getElementById('login').value+'&c='+document.getElementById('pass').value+'&d='+document.getElementById('new').value); value="Поїхали!"></p>