<?
$title = "Завершити всі сессії.";
$token = leaveAllSessions(getLoginedUsername());
$eval = "localStorage.setItem('token', '".$token."');";
?>
Готово!