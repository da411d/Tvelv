<?
class Classes{
	//Повертає всі класи
	function getAll(){
		$database = db_connect();
		return db_get("classes", ["ClassName", "ClassCaption", "TeacherLogin"]);
	}

	//Повертає назву класа по ID
	function getName($param){
		$database = db_connect();
		return db_get("classes", ["ClassCaption"], ["ClassName[=]" => $param])[0]["ClassCaption"];
	}

	//Повертає клас учня
	function getByUser($login){
		if(getUserPermission($login) == 'student'){
			$class = db_get("students", ["Class"], ["Login[=]" => $login])[0]["Class"];
		}else{
			return false;
		}
		return db_get("classes", ["ClassName", "ClassCaption", "TeacherLogin"], ["ClassName" => $class]);
	}
}