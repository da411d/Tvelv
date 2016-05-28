<?
class login{
	//Функція логінить нас на тиждень
	public static function loginMe($login){
		$login = htmlspecialchars((string)$login);

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
		$login = htmlspecialchars((string)$login);

		login::reloadUserPassword($login);
		return login::loginMe($login);
	}

	//Повертає сіль пароля
	public static function getPasswordSalt($login){
		$login = htmlspecialchars((string)$login);

		$database = db::connect();
		return db::get("users", ["Salt"], ["Login[=]" => $login])[0]["Salt"];
	}

	//Перевіряє правильність паролю
	public static function isPasswordCorrect($login, $password){
		$login = htmlspecialchars((string)$login);
		$password = htmlspecialchars((string)$password);

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
	public static function registerUser($data){
		foreach($data as $d){
			$d = htmlspecialchars((string)$d);
		}
		$tables = [
			'primary' => ["login","password","permission"],
			'teacher' => ["login","name","secondname","class","subjectPermission"],
			'student' => ["login","name","secondname","class"]
		];
		foreach($tables['primary'] as $n){
			if(!(   isset($_POST[$n]) AND strlen($_POST[$n])>0   )){
				return false;
			}
		}
		foreach($tables[$permission] as $n){
			if(!(   isset($_POST[$n]) AND strlen($_POST[$n])>0   )){
				return false;
			}
		}
		$insertData = [];
		foreach($data as $d){
			if(in_array($d, $tables[$permission]) AND !in_array($d, $tables['primary'])){
				$insertData[$d] = $data[$d];
			}
		}
		
		$database = db::connect();
		$data['password'] = toQwerty($data['password']);
		$salt = str_replace(array("/", "=", "+"), "", base64_encode(hex2bin(   sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand()).sha1(rand())   )));

		if(!user::getInfoAboutUser($login)){
			$udb = $database->insert("users", [
					"Login" => $data['login'],
					"Password" => _crypt($data['password'], $salt),
					"Salt" => $salt,
					"Permission" => $data['permission']
				]);
			$ddb = $database->insert($permission.'s', $insertData);
		}
		if($udb AND $ddb){return true;}else{return false;}
	}

	//Змінити пароль
	public static function editUserPassword($login, $password, $new){
		$login 			= htmlspecialchars((string)$login);
		$password 		= htmlspecialchars((string)$password);
		$new 			= htmlspecialchars((string)$new);

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
		$login = htmlspecialchars((string)$login);

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
		$login = htmlspecialchars((string)$login);
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
		$login = htmlspecialchars((string)$login);
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