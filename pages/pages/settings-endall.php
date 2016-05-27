<?
$title = "Завершити всі сессії.";
if(isset($_GET['_']) AND $_GET['_']=='_'){
	?>
	Готово!
	<?php
}else{
	$token = login::leaveAllSessions(login::getLoginedUsername());
	$_['token'] = $token;
	$eval = "window.location.hash='settings/endall?_=_';";
}