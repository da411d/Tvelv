<?
class Session{
	public $login;
	public $isLogined;
	public $attempts;
	private $password;
	private $salt;
	function __construct($login = false){
		if(!$login){
			$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
			$cookie = $_COOKIE[$cookiename];
			$code = _decrypt($cookie, $cookiename);
			$code = json_decode($code, 1);
			if($code['a'] AND $code['c']==substr(sha1(db_get("users", ["Login","Password","Salt"], ["Login[=]" => $code['a']])[0]["Salt"]),0,8)){
				$this->login = $code['a'];
			}
		}else{
			$this->login = $login;
		}
		$this->isLogined = $this->login?true:false;
		$this->salt = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $this->login])[0]["Salt"];
		$this->password = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $this->login])[0]["Password"];
		$this->password = _decrypt($this->password, $this->salt);
		$this->attempts = db_get("users", ["Attempt"], ["Login[=]" => $this->login])[0]["Attempt"];
	}
	//Функція логінить нас на тиждень
	function loginMe(){
		$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
		$arr = ['a' => $this->login, 'c' => substr(sha1($this->salt),0,8)];
		$code = _crypt(json_encode($arr), $cookiename);
		SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');
		return true;
	}
	//Функція завершує сесію і виходить
	function logOut(){
		$cookiename = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
		$arr = ['a' => false, 'c' => substr(md5(mt_rand()),0,8)];
		$code = _crypt(json_encode($arr), $cookiename);
		SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');
		return true;
	}
	//Завершує всі сессії крім текучої
	function leaveAllSessions(){
		reloadUserPassword($this->login);
		loginMe($this->login);
	}
	//Перевіряє правильність паролю
	function checkPassword($password){
		sleep(1);
		$in = $password;
		$in = toQwerty($in);
		$out = _decrypt($this->password, $this->salt);
		$out = toQwerty($out);
		similar_text($in, $out, $percent);
		if (isset($in) AND isset($out) AND $in AND $out AND $percent>85){
			return true;
		}else{
			return false;
		}
	}
	//Змінити пароль
	function editPassword($password, $new){
		$database = db_connect();
		$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $this->login]);
		$new = toQwerty($new);
		if(toQwerty($password) == toQwerty(_decrypt($test[0][Password], $test[0][Salt]))){
			$salt = _crypt(md5(mt_rand()), md5(mt_rand()));
			return $database->update("users", [
				"Password" => _crypt($new, $salt),
				"Salt" => $salt
			], [
				"Login[=]" => $this->login
			]);
		}
	}
	//Функція залишає пароль попереднім, але перешифровує і міняє сіль
	function reloadPassword(){
		$database = db_connect();
		$salt = _crypt(md5(mt_rand()).md5(mt_rand()), md5(mt_rand()));
		return $database->update("users", [
			"Password" => _crypt($this->password, $salt),
			"Salt" => $salt
		], [
			"Login[=]" => $this->login
		]);
	}
	//Додає кількість невдалих спроб
	function addAttemptsOne(){
		return $database->update("users", ["Attempt[+]" => 1], ["Login[=]" => $this->login]);
	}
	//Обнуляє лічильник невдалих спроб (коли залогінився)
	function resetAttempts(){
		return $database->update("users", ["Attempt" => 0], ["Login[=]" => $this->login]);
	}
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