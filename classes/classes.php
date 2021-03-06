<?
class classes{
	//Повертає всі класи
	public static function getAllClasses(){
		$database = db::connect();
		return db::get("classes", ["ClassName", "ClassCaption", "TeacherLogin"]);
	}

	//Повертає назву класа по ID
	public static function getClassName($param = false){
		$param = htmlspecialchars((string)$param);

		$database = db::connect();
		return db::get("classes", ["ClassCaption"], ["ClassName[=]" => $param])[0]["ClassCaption"];
	}

	//Повертає клас учня
	public static function getClassByUser($login){
		$login = htmlspecialchars((string)$login);

		if(user::getUserPermission($login) == 'student'){
			$class = db::get("students", ["Class"], ["Login[=]" => $login])[0]["Class"];
		}else{
			return false;
		}
		return db::get("classes", ["ClassName", "ClassCaption", "TeacherLogin"], ["ClassName" => $class]);
	}
}