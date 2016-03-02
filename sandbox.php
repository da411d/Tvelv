<?php
include "_functions.php";
include "_config.php";
set_time_limit(0);


	$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	print_r(substr($code['c'],0,8));