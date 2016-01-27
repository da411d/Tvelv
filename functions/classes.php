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