<? include "../libs/main.php";?>

<h1>Register</h1>
<?
//AND $_POST['password'] AND $_POST['permission']
if($_POST['act']== "reg" AND $_POST['login'] ){
	echo user_register($_POST['login'], $_POST['password'], $_POST['permission'],  $_POST['name'], $_POST['second'], $_POST['class']);
	$arr=[];
	for($i=1;$i<=$_POST['num'];++$i){
		$tmp=[
			'question' => $_POST['secret_question_'.$i],
			'answer' => $_POST['secret_answer_'.$i]
		];
		$arr[]=$tmp;
	}
	echo user_add_secret($_POST['login'], json_encode($arr));
}
?>
<form method="post">
<input type="hidden" name="act" value="reg">
<input type="text" name="login" placeholder="LOGIN"required><br>
<input type="text" name="password" placeholder="PASSWORD"required><br>
<label><input type="radio" name="permission" value="student"required>student</label>
<label><input type="radio" name="permission" value="teacher"required>teacher</label>
<label><input type="radio" name="permission" value="parent"required>parent</label><br>
<br>
<input type="text" name="name" placeholder="Name"required><br>
<input type="text" name="second" placeholder="Second name"required><br>
<input type="text" name="class" placeholder="Class"required><br>
<br><br>

<input type="submit">
</form>
