<? 
if(!in_array(login::getLoginedUsername(), json_decode(ADMIN_ID))){
	$eval = "window.location.hash='403;";
}
?>
<?$title="Реєстрація";?>
<?
//AND $_POST['password'] AND $_POST['permission']
if($_POST['act']== "reg" AND $_POST['login'] ){
	echo login::registerUser($_POST['login'], $_POST['password'], $_POST['permission'],  $_POST['name'], $_POST['second'], $_POST['class']);
	/*$arr=[];
	for($i=1;$i<=$_POST['num'];++$i){
		$tmp=[
			'question' => $_POST['secret_question_'.$i],
			'answer' => $_POST['secret_answer_'.$i]
		];
		$arr[]=$tmp;
	}
	echo user_add_secret($_POST['login'], json_encode($arr));*/
}
?>
<form method="post">
<input type="hidden" name="act" value="reg">

<p>
	<label>
		<p>Логін:</p>
		<p><input type="text" name="login" placeholder="LOGIN"required></p>
	</label>
</p>

<p>
	<label>
		<p>Пароль:</p>
		<p><input type="text" name="password" placeholder="PASSWORD"required></p>
	</label>
</p>

<p>
	<p>Тип акаутту</p>
	<label><input type="radio" name="permission" value="student"required>Учень</label>
	<label><input type="radio" name="permission" value="teacher"required>Вчитель</label>
	<label><input type="radio" name="permission" value="parent"required>Батько</label>
</p>

<p>
	<label>
		<p>Ім'я</p>
		<p><input type="text" name="name" placeholder="Name"required></p>
	</label>
</p>
<p>
	<label>
		<p>Прізвище</p>
		<p><input type="text" name="second" placeholder="Second name"required></p>
	</label>
</p>
<p>
	<label>
		<p>Клас</p>
		<p><input type="text" name="class" placeholder="Class"required></p>
	</label>
</p>
<input type="submit">
</form>