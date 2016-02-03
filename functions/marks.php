<?
//Додає оцінку
function addMark($subject, $student, $mark='', $info=''){
	$database = db_connect();
	$teacher = isTeacher()?getLoginedUsername():false;

	if($subject AND $student AND $teacher AND ($mark OR $info) and in_array($subject, getSubjectPermission())){
		return $database->insert("marks", [
				"Date" => date("Y-m-d"),
				"Time" => date("H:i"),
				"Subject" => $subject,
				"Class" => getClassByUser($student)[0]["ClassName"],
				"Student" => $student,
				"Teacher" => $teacher,
				"Mark" => intval($mark),
				"Info" => antiXSS($info)
			]);
	}else{
		return false;
	}
}


/*
Не потрібно поки що, потім додам.
	//Змінити оцінку. Додає поле "останній раз змінено"
	function editMark($date ,$class, $student, $teacher, $mark, $info){
		$database = db_connect();
	
			return $database->update("marks", [
				"Mark" => $mark,
				"LastEdit" => date("H:i"),
				"Info" => $info
			], [
				"Date[=]" => $date,
				"Student[=]" => $student,
				"Teacher[=]" => $teacher,
			]);
	}
*/

//Повертає список оцінок відфільтрований по параметрах
function getMarksByParams($param = array()){
	$database = db_connect();
	return db_get("marks", ["Date","Time", "LastEdit", "Subject", "Class", "Student", "Teacher", "Mark", "Info"], $param);
}

//Повертає всі оцінки
function getAllMarks(){
	$database = db_connect();
	return db_get("marks", ["Date","Time", "LastEdit", "Subject", "Class", "Student", "Teacher", "Mark", "Info"], []);
}

//Повертає всі предмети
function getAllSubjects(){
	$database = db_connect();
	return db_get("subjects", ["SubjectName", "SubjectCaption", "SubjectDescription"], []);
}

//Повертає права ставити оцінку
function getSubjectPermission(){
	$login = getLoginedUsername();
	$database = db_connect();
	if(isTeacher()){
		return json_decode(db_get("teachers", ["SubjectPermission"], ["Login" => $login])[0]["SubjectPermission"], 1);
	}
}

//Повертає назву предмета по ID
function getSubjectName($param){
	$database = db_connect();
	return db_get("subjects", ["SubjectName","SubjectCaption", "SubjectDescription"], ["SubjectName[=]" => $param])[0]["SubjectCaption"];
}