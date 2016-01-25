<?
//Функція логінить нас на тиждень
function loginMe($login){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$arr = ['a' => $login, 'b' => '1', 'c' => md5(date("Ymds"))];
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');
	return true;
}

//Футкція повертає логін поточного користувача
function getLoginedUsername(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a']){
		return $code['a'];
	}else{
		return 0;
	}
}

//Функція перевіряє, чи ще залогінений користувач
function checkLogined(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a']){
		return 1;
	}else{
		return 0;
	}
}

//Функція завершує веввію і виходить
function Leave(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$arr=['b' => '0', 'c' => md5(date("Ymds"))];
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, -1, '/');
}

//Повертає кількість невдалих спроб користувача залогінитись
function getAttempts($login){
	$database = db_connect();
	return db_get("users", ["Attempt"], ["Login[=]" => $login])[0]["Attempt"];
}

//Додає кількість невдалих спроб
function addAttemptsOne($login){
	$database = db_connect();
	return $database->update("users", ["Attempt[+]" => 1], ["Login[=]" => $login]);
}

//Обнуляє лічильник невдалих спроб (коли залогінився)
function resetAttempts($login){
	$database = db_connect();
	return $database->update("users", ["Attempt" => 0], ["Login[=]" => $login]);
}