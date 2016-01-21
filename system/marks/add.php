<? 
include dirname(__FILE__)."/../libs/main.php";
?>
<h1>ADD MARK</h1>
<?
if($_POST['date'] AND $_POST['class'] AND $_POST['student'] AND $_POST['teacher'] AND $_POST['mark']){
	echo addMark($_POST['date'], $_POST['class'], $_POST['student'], $_POST['teacher'], $_POST['mark'], $_POST['info']);
}
?>
<form method="post">
<input type="date" name="date" value="<?=date("Y-m-d");?>" required><br>
<input type="text" name="class" placeholder="class"required><br>

<input type="text" name="student" placeholder="student"required><br>
<input type="text" name="teacher" placeholder="teacher"required><br>
<input type="text" name="mark" placeholder="mark"required><br><br>
<input type="text" name="info" placeholder="info"><br>
<br><br>

<input type="submit">
</form>