<? 
include "../libs/main.php";
$_POST['login'] = get_logined();

if($_POST['act']=='cancel'){header("Location: profile.php");exit;}

if($_POST['login'] AND $_POST['secret_answer_1'] AND $_POST['secret_question_1']){
	$arr=[];
	for($i=1;$i<=$_POST['num'];++$i){
		$tmp=[
			'question' => $_POST['secret_question_'.$i],
			'answer' => $_POST['secret_answer_'.$i]
		];
		$arr[]=$tmp;
	}
	header("Location: profile.php");
}

include "../theme.php";
?>
<form method="post">
<div id="secret">
</div>
<?php
if($_POST['login']){
$secret = user_get_secret($_POST['login']);
$mysecret = _decrypt($secret[Secret], $secret[Salt]);
$arr = json_decode($mysecret, true);
$i=0;
foreach ($arr as $a){
if($a){
	$i++;
	echo '<input type="text" name="secret_question_'.$i.'" placeholder="Secret question" value="'.$a['question'].'"><br>
<textarea rows=5 cols=25 name="secret_answer_'.$i.'">'.$a['answer'].'</textarea><br><br><br>';
}
}
}
?>
<input type="hidden" name="num" id="num" value="<?=$i;?>">

<a id="plus"onclick="num = document.getElementById('num').value = parseInt(document.getElementById('num').value)+1;script=document.createElement('div');script.innerHTML='<input type=\'text\' name=\'secret_question_'+num+'\' placeholder=\'Secret question\'><br><textarea rows=5 cols=25 name=\'secret_answer_'+num+'\'></textarea><br><br><br>';document.getElementById('secret').appendChild(script);return false;"style="cursor:pointer;">+add</a>
<input type="submit">
</form>
<form method="post" act="chsecret.php">
<button name="act" value="cancel">Скасувати</button>
</form>