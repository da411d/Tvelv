<?$title="Лістинг";?>
<?php
if(isset($_GET['_']) AND strlen($_GET['_'])>0){
	$data = explode("$", $_GET['_']);
	$class = isset($data[0])?$data[0]:false;
	$subject = isset($data[1])?$data[1]:false;
}else{
	$class = false;
	$subject = false;
}

if($class AND $subject){
	include "marks-journal_PRINT.php";
}else{
	include "marks-journal_SELECT.php";
}