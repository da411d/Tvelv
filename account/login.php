<? include "../libs/main.php";
if($_POST['act']=="log" AND $_POST['login'] AND $_POST['password']){
	if(user_login($_POST['login'], $_POST['password'])){
		login_me($_POST['login']);
	}
	header('Location: profile.php');
}
if(get_logined()!=0){header('Location: profile.php');}

include "../theme.php";
?><div class="header">
	<div class="displayer" onclick="if(document.getElementById('aside_dis')){document.getElementById('aside_dis').click()}">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAANAQMAAACegKxaAAAABlBMVEX///////9VfPVsAAAAAXRSTlMAQObYZgAAABFJREFUCJlj+P//AAMyIIIPAB5vCvnDbqq9AAAAAElFTkSuQmCC" alt="≡">
	</div>
	<span class="h1">LOGIN</span>
	<nav>
<a onclick="window.location='../account'">Назад</a>
	</nav>
</div>
<form method="post" id="params">
<input type="hidden" name="k" id="k">
<input type="hidden" name="v" id="v">
</form>
<script>
function onChange(e){

document.getElementById('k').value = e.name;
document.getElementById('v').value = e.value;
document.getElementById('params').submit();

}
</script>
<div class="main">
<form method="post">
<input type="hidden" name="act" value="log">
<input type="hidden" name="login"value="<?=$_POST['login'];?>"required><br>
<input type="text" name="login" placeholder="LOGIN" value="<?=$_POST['login'];?>"required><br>
<input type="password" name="password" placeholder="PASSWORD" value="<?=$_POST['password'];?>"required><br>
<button type="submit" onclick="document.getElementById('loading').style.display='block'">
Вхід<img src="http://ihg.scene7.com/is/content/ihg/sitefurniture/cp_loading.gif" style="display:none;" id="loading">
</button>
</form>

<button onclick="window.location='register.php'">Реєстрація</button>