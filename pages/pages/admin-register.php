<? 
if(!in_array(login::getLoginedUsername(), json_decode(ADMIN_ID))){
	$eval = "window.location.hash='403;";
	$denied = true;
}
?>
<?
	$title="Реєстрація";
	$_['scripts'] = ['/assets/js/script.js?f=reg'];
?>
<?
if(isset($_GET['_'])){
	$status = $_GET['_'];
	echo '<span style="color:#ffffff;background:'.($status?"#7ADC37":"#CB2237").';">'.($status?"Complete":"Failed").'</span>';
}else if(!$denied AND isset($_POST['act']) AND $_POST['act']=='reg'){
	$status = login::registerUser($_POST);
	$eval = "window.location.hash='admin/register?_=".$status."';";
}
?>

<form method="post">
	<input type="hidden" name="act" value="reg">
	<p><input type="radio" name="permission" value="teacher" onchange="onChange(this)" id="t"><label for="t">Teahcer</label></p>
	<p><input type="radio" name="permission" value="student" onchange="onChange(this)" id="s"><label for="s">Student</label></p>
	<div id="formContainer">
	</div>
	<input type="submit">
</form>