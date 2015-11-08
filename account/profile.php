<? 
include "../libs/main.php";
$_POST['login'] = get_logined();
switch ($_GET['act']) {
	case 'leave': leave();leave();if(!get_logined()){header('Location: login.php');};leave();header('Location: login.php');break;
	case 'chpwd': header('Location: chpwd.php');exit;break;

}
$login = get_logined();
if(!get_logined()){header('Location: login.php');}
include "../theme.php";
echo 'Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!';

?>
<div class="header">
	<div class="displayer" onclick="if(document.getElementById('aside_dis')){document.getElementById('aside_dis').click()}">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAANAQMAAACegKxaAAAABlBMVEX///////9VfPVsAAAAAXRSTlMAQObYZgAAABFJREFUCJlj+P//AAMyIIIPAB5vCvnDbqq9AAAAAElFTkSuQmCC" alt="≡">
	</div>
	<span class="h1">ПРОФІЛЬ</span>
	<nav><a href="chpwd.php">Змінити пароль</a><a href="?act=leave">Вийти</a><a href="../marks/get.php"value="mark">Оцінки</a>
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
<?='Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!';?>
<form method="post"id="form">
<input type="hidden" name="act" id="act">
</form>
</div>