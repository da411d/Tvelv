<?
class user{		
	//Отримати дані про користувача
	public static function getInfoAboutUser($login){
		$database = db::connect();
		switch (db::get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']) {
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
		return db::get($dbineed, ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0];
	}

	//Отримати список всіх учнів/вчителів/батьків
	public static function getUserByList($in='student'){
		$database = db::connect();
		switch ($in) {
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
		return db::get($dbineed, ["Login", "Name", "SecondName", "Class"]);
	}

	//Повертає учнів певного класу
	public static function getUsersByClass($param='0'){
		return db::get("students", ["Login", "Name", "SecondName", "Class"], ["Class" => $param]);
	}

	//Перевіряє чи є користувач вчителем
	public static function isTeacher($login=''){
		if(!$login){
			$login = login::getLoginedUsername();
		}
		if(db::get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='teacher'){
			return 1;
		}else{
			return 0;
		}
	}

	//Повертає права користувача
	public static function getUserPermission($login = FALSE){
		if(!$login){
			$login = login::getLoginedUsername();
		}
		if(db::get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']){
			return db::get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission'];
		}else{
			return 0;
		}
	}

	//Повертає список учнів певного класу
	public static function getStudentsByClass($class){
		return db::get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
	}

	//Повертає список однокласників
	public static function getUserClassmates($login){
		if(user::getUserPermission($login) == 'student'){
			$class = db::get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0]["Class"];
		}else{
			return false;
		}
		return db::get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
	}
}