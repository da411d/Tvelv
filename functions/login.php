<?
//Функція логінить нас на тиждень
function loginMe($login){
	$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
	$arr = ['a' => $login, 'c' => substr(sha1(getPasswordSalt($login)),0,8)];
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');
	return true;
}

//Футкція повертає логін поточного користувача
function getLoginedUsername(){
	$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a'] AND $code['c']==substr(sha1(getPasswordSalt($code['a'])),0,8)){
		return $code['a'];
	}else{
		return false;
	}
}

//Функція перевіряє, чи ще залогінений користувач
function checkLogined(){
	$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a'] AND $code['c']==substr(sha1(getPasswordSalt($code['a'])),0,8)){
		return true;
	}else{
		return false;
	}
}

//Функція завершує сесію і виходить
function logOut(){
	$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);

	$arr = ['a' => false, 'c' => md5(mt_rand())];
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');

	return true;
}

//Завершує всі сессії крім текучої
function leaveAllSessions($login){
	reloadUserPassword($login);
	loginMe($login);
}

//Повертає сіль пароля
function getPasswordSalt($login){
	$database = db_connect();
	return db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login])[0]["Salt"];
}

//Перевіряє правильність паролю
function isPasswordCorrect($login, $password){
	sleep(1);
	$database = db_connect();

	$in = $password;
	//$in = toQwerty($in);

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
	$out = _decrypt($test[0][Password], $test[0]["Salt"]);
	//$out = toQwerty($out);

	similar_text($in, $out, $percent);
	if (isset($in) AND isset($out) AND $in AND $out AND $percent>85){
		return true;
	}else{
		return false;
	}
}

//Реєструє користувача
function registerUser($login, $password, $permission, $name, $secondname, $class){
	$database = db_connect();
	$password = toQwerty($password);
	$salt = _crypt(sha1(mt_rand()), sha1(mt_rand()));

	$dbineed='students';
	switch ($permission) {
	    case student:
	        $dbineed='students';
	        break;
	    case teacher:
	        $dbineed='teachers';
	        break;
	    case parent:
	        $dbineed='parents';
	        break;
	}
	if(!getInfoAboutUser($login)){
		$udb = $database->insert("users", [
				"Login" => $login,
				"Password" => _crypt($password, $salt),
				"Salt" => $salt,
				"Permission" => $permission
			]);
		
		$ddb = $database->insert($dbineed, [
				"Login" => $login,
				"Name" => antiXSS($name),
				"SecondName" => $secondname,
				"Class" => $class
			]);
		}
	if($udb AND $ddb){return true;}else{return false;}
}

//Змінити пароль
function editUserPassword($login, $password, $new){
	$database = db_connect();

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
	$new = toQwerty($new);

	if(toQwerty($password) == toQwerty(_decrypt($test[0][Password], $test[0][Salt]))){
		$salt = _crypt(sha1(mt_rand()), sha1(mt_rand()));
		return $database->update("users", [
			"Password" => _crypt($new, $salt),
			"Salt" => $salt
		], [
			"Login[=]" => $login
		]);
	}
}

//Функція залишає пароль попереднім, але перешифровує і міняє сіль
function reloadUserPassword($login){
	$database = db_connect();

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
	$password =  toQwerty(_decrypt($test[0]["Password"], $test[0]["Salt"]));
	$salt = _crypt(md5(mt_rand()).md5(mt_rand()).md5(mt_rand()).md5(mt_rand()), sha1(mt_rand()));

	return $database->update("users", [
		"Password" => _crypt($password, $salt),
		"Salt" => $salt
	], [
		"Login[=]" => $login
	]);
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

//Редагує секретні питання(Цю функцію я відключив але потім планую включити)
/*
function addUserSecret($login, $secret){
	$database = db_connect();

	$salt = _crypt(md5(mt_rand()), md5(mt_rand()));

	if(!getInfoAboutUser($login)){
		return $database->insert("2steplogin", [
				"Login" => $login,
				"Secret" => _crypt($secret, $salt),
				"Salt" => $salt,
				"temp" => $secret
			]);
	}
}

//Повертає список секретних питань і відпрвіді
function getUserSecret($login){
	$database = db_connect();
	return db_get('2steplogin', ["Secret", "Salt", "temp"], ["Login[=]" => $login])[0];
}

//Додає секретні питання
function editUserSecret($login, $secret){
	$database = db_connect();

	$salt = _crypt(md5(mt_rand()), md5(mt_rand()));

	return $database->update("2steplogin", [
		"Secret" => _crypt($secret, $salt),
		"Salt" => $salt,
		"temp" => $secret
	], [
		"Login[=]" => $login
	]);
}
*/