<?
include "libs/main.php";

$login = get_logined();

if(!get_logined()){$header = 'Ти не ввійшов!';}else{$header = 'Профіль';}
$main =  'Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!';