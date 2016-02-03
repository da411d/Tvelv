<?
//Реєструє користувача
	function registerUser($login, $password, $permission, $name, $secondname, $class){
		$database = db_connect();
		$password = toQwerty($password);
		$salt = _crypt(md5(mt_rand()), md5(mt_rand()));

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
		if(!getInfoAboutUser($login)){//ТУТ ПРОФІКСИТИ
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