<?
class Subjects{
	//Повертає всі предмети
	function getAll(){
		$database = db_connect();
		return db_get("subjects", ["SubjectName", "SubjectCaption", "SubjectDescription"], []);
	}
	//Повертає права ставити оцінку
	function getTeacherPermission(){
		$login = getLoginedUsername();
		if(isTeacher($login)){
			$database = db_connect();
			if(isTeacher()){
				return json_decode(db_get("teachers", ["SubjectPermission"], ["Login" => $login])[0]["SubjectPermission"], 1);
			}
		}
		return false;
	}
	//Повертає назву предмета по ID
	function getName($param){
		$database = db_connect();
		return db_get("subjects", ["SubjectName","SubjectCaption", "SubjectDescription"], ["SubjectName[=]" => $param])[0]["SubjectCaption"];
	}
}