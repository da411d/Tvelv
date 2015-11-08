<? include "../libs/main.php";
include "../theme.php";?><div class="header">
	<div class="displayer" onclick="if(document.getElementById('aside_dis')){document.getElementById('aside_dis').click()}">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAANAQMAAACegKxaAAAABlBMVEX///////9VfPVsAAAAAXRSTlMAQObYZgAAABFJREFUCJlj+P//AAMyIIIPAB5vCvnDbqq9AAAAAElFTkSuQmCC" alt="≡">
	</div>
	<span class="h1">ADD MARK</span>
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
<table>
<tr>
<th>Дата<br><input type="date" name="Date" value="Дата" onchange="onChange(this)"required>

<th>Група<br><select size="1" name="class"onchange="onChange(this)"> <option disabled selected>Оберіть параметр</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> </select>

<th>Ліцеїст<br><?
$arr = user_get_by_list('student');
echo '<input list="students" name="Student"onchange="onChange(this)"><datalist id="students">';
foreach($arr as $a){
echo '<option value="'.$a['Login'].'">'.$a['Name'].' '.$a['SecondName'].'</option>';
}
echo '</datalist>';
?>

<th>Вчитель<br><?
$arr = user_get_by_list('teacher');
echo '<input list="teachers" name="Teacher"onchange="onChange(this)"><datalist id="teachers">';
foreach($arr as $a){
echo '<option value="'.$a['Login'].'">'.$a['Name'].' '.$a['SecondName'].'</option>';
}
echo '</datalist>';
?>

<th>Оцінка<br><input type="text" name="Mark" placeholder="mark"onchange="onChange(this)"required>

<th>Коментар

<?
if(!$_POST['k'] AND !$_POST['v']){$_POST['k']='Date';$_POST['v']=date("Y-m-d");}
$arr = mark_get_by_params(array($_POST['k'].'[=]' => $_POST['v']));
if(!$arr){$arr=[];}
foreach ($arr as $a){
	echo "<tr><td>".$a['Date'].", ".$a['Time']."<td>".$a['Class']."<td>".user_get_params($a['Student'])['Name'].' '.user_get_params($a['Student'])['SecondName']."<td>".user_get_params($a['Teacher'])['Name'].' '.user_get_params($a['Teacher'])['SecondName']."<td>".$a['Mark']."<td>".$a['Info'];
}
?>
<?
if($_POST['date'] AND $_POST['class'] AND $_POST['student'] AND $_POST['teacher'] AND $_POST['mark'] AND $_POST['teacher']==get_logined()){
	echo mark_add($_POST['date'], $_POST['class'], $_POST['student'], $_POST['teacher'], $_POST['mark'], $_POST['info']);
}
?>
<tr <?if (!is_teacher()) {echo 'style="display:none;"';}?>>
<form method="post" <?if (!is_teacher()) {echo 'style="display:none;"';}?>>
<th><input type="date" name="date" value="<?=date("Y-m-d");?>" required>

<th><select size="1" name="class"required> <option disabled selected>Оберіть параметр</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> </select>

<th><?
$arr = user_get_by_list('student');
echo '<input list="students" name="student"required><datalist id="students">';
foreach($arr as $a){
		echo '<option value="'.$a['Login'].'">'.$a['Name'].' '.$a['SecondName'].'</option>';
}
echo '</datalist>';
?>

<th><?
if(is_teacher()){
	$login = get_logined();
}
echo '<input type="hidden" name="teacher" value="'.$login.'"required><input value="'.$login.'"required readonly>';
?>

<th><input type="text" name="mark" placeholder="mark"required>

<th>
<input type="text" name="info" placeholder="info">
<tr colspan="6" <?if (!is_teacher()) {echo 'style="display:none;"';}?>>
<td colspan="6"><input type="submit"value="Додати" style="width:100%;">
</tr></form>

</div>