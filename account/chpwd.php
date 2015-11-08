<? include "../libs/main.php";
if($_POST['act']=='cancel'){header("Location: profile.php");exit;}
if($_POST['login'] AND $_POST['password'] AND $_POST['new_password']){
	if(user_change_password($_POST['login'], $_POST['password'], $_POST['new_password'])){header("Location: profile.php");}
}

$_POST['login'] = get_logined();

include "../theme.php";
?>
<h1>CHANGE PASSWORD</h1>
<form method="post" act="chpwd.php">

<input type="hidden" name="login"value="<?=$_POST['login'];?>"required><br>
<input type="text" value="<?=$_POST['login'];?>"required readonly><br>
<input type="password" name="password" placeholder="PASSWORD"required><br>
<input type="text" name="new_password" placeholder="NEW PASSWORD"required><br>
<input type="submit">
</form>

<form method="post" act="chpwd.php">
<button name="act" value="cancel">Скасувати</button>
</form>