<?
//Повертає всі класи
function getAllClasses(){
	$database = db_connect();
	return db_get("classes", ["ClassName", "ClassCaption", "TeacherLogin"]);
}

//Повертає назву класа по ID
function getClassName($param){
	$database = db_connect();
	return db_get("classes", ["ClassCaption"], ["ClassName[=]" => $param])[0]["ClassCaption"];
}

//Повертає клас учня
function getClassByUser($login){
	if(getUserPermission($login) == 'student'){
		$class = db_get("students", ["Class"], ["Login[=]" => $login])[0]["Class"];
	}else{
		return false;
	}
	return db_get("classes", ["ClassName", "ClassCaption", "TeacherLogin"], ["ClassName" => $class]);
}