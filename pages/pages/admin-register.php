<? 
if(!in_array(login::getLoginedUsername(), json_decode(ADMIN_ID))){
	$eval = "window.location.hash='403;";
}
$_['scripts'] = ['/assets/js/script.js?f=reg'];
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
	<p><input type="radio" name="acctype" value="teacher" onchange="onChange(this)" id="t"><label for="t">Teahcer</label></p>
	<p><input type="radio" name="acctype" value="student" onchange="onChange(this)" id="s"><label for="s">Student</label></p>
	<div id="formContainer">
	</div>
	<input type="submit">
</form>