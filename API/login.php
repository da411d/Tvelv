<?
class login{
	//Функція логінить нас на тиждень
	public static function loginMe($login){
		$key = _crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS');
		$arr = ['a' => $login, 'c' => substr(sha1(login::getPasswordSalt($login)),0,8)];
		$code = _crypt(json_encode($arr), $key);
		return $code;
	}

	//Футкція повертає логін поточного користувача
	public static function getLoginedUsername(){
		$key = _crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS');
		$code = _decrypt(TOKEN, $key);
		$code = json_decode($code, 1);
		if($code['a'] AND $code['c']==substr(sha1(login::getPasswordSalt($code['a'])),0,8)){
			return $code['a'];
		}else{
			return false;
		}
	}

	//Функція перевіряє, чи ще залогінений користувач
	public static function checkLogined(){
		$key = _crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS');
		$code = _decrypt(TOKEN, $key);
		$code = json_decode($code, 1);
		if($code['a'] AND $code['c']==substr(sha1(login::getPasswordSalt($code['a'])),0,8)){
			return true;
		}else{
			return false;
		}
	}

	//Функція завершує сесію і виходить
	public static function logOut(){
		$key = _crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS');
		$arr = ['a' => false, 'c' => md5(mt_rand())];
		$code = _crypt(json_encode($arr), $key);
		return $code;
	}

	//Завершує всі сессії крім текучої
	public static function leaveAllSessions($login){
		login::reloadUserPassword($login);
		return login::loginMe($login);
	}

	//Повертає сіль пароля
	public static function getPasswordSalt($login){
		$database = db::connect();
		return db::get("users", ["Salt"], ["Login[=]" => $login])[0]["Salt"];
	}

	//Перевіряє правильність паролю
	public static function isPasswordCorrect($login, $password){
		sleep(1);
		$database = db::connect();

		$in = $password;
		//$in = toQwerty($in);

		$test = db::get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
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
	public static function registerUser($login, $password, $permission, $name, $secondname, $class){
		$database = db::connect();
		$password = toQwerty($password);
		$salt = str_replace(array("/", "=", "+"), "", base64_encode(hex2bin(   sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand())   )));

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
	public static function editUserPassword($login, $password, $new){
		$database = db::connect();

		$test = db::get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
		$new = toQwerty($new);

		if(toQwerty($password) == toQwerty(_decrypt($test[0][Password], $test[0][Salt]))){
			$salt = str_replace(array("/", "=", "+"), "", base64_encode(hex2bin(   sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand())   )));
			return $database->update("users", [
				"Password" => _crypt($new, $salt),
				"Salt" => $salt
			], [
				"Login[=]" => $login
			]);
		}
	}

	//Функція залишає пароль попереднім, але перешифровує і міняє сіль
	public static function reloadUserPassword($login){
		$database = db::connect();

		$test = db::get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);
		$password =  toQwerty(_decrypt($test[0]["Password"], $test[0]["Salt"]));
		$salt = str_replace(array("/", "=", "+"), "", base64_encode(hex2bin(   sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand())   )));

		return $database->update("users", [
			"Password" => _crypt($password, $salt),
			"Salt" => $salt
		], [
			"Login[=]" => $login
		]);
	}

	//Повертає кількість невдалих спроб користувача залогінитись
	public static function getAttempts($login){
		$database = db::connect();
		return db::get("users", ["Attempt"], ["Login[=]" => $login])[0]["Attempt"];
	}

	//Додає кількість невдалих спроб
	public static function addAttemptsOne($login){
		$database = db::connect();
		return $database->update("users", ["Attempt[+]" => 1], ["Login[=]" => $login]);
	}

	//Обнуляє лічильник невдалих спроб (коли залогінився)
	public static function resetAttempts($login){
		$database = db::connect();
		return $database->update("users", ["Attempt" => 0], ["Login[=]" => $login]);
	}

	//Редагує секретні питання(Цю функцію я відключив але потім планую включити)
	/*
	public static function addUserSecret($login, $secret){
		$database = db::connect();

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
	public static function getUserSecret($login){
		$database = db::connect();
		return db::get('2steplogin', ["Secret", "Salt", "temp"], ["Login[=]" => $login])[0];
	}

	//Додає секретні питання
	public static function editUserSecret($login, $secret){
		$database = db::connect();

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
}