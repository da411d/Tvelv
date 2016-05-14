<?
$title = "Завершити всі сессії.";
$token = login::leaveAllSessions(login::getLoginedUsername());
$eval = "localStorage.setItem('token', '".$token."');";
?>
Готово!