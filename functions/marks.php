<?
//Додає оцінку
function addMark($subject, $class, $student, $teacher, $mark, $info){
	$database = db_connect();

	if($subject AND $class AND $student AND $teacher AND ($mark OR $info)){
		return $database->insert("marks", [
				"Date" => date("Y-m-d"),
				"Time" => date("H:i"),
				"Subject" => $subject,
				"Class" => $class,
				"Student" => $student,
				"Teacher" => $teacher,
				"Mark" => $mark,
				"Info" => $info
			]);
	}else{
		return false;
	}
}

//Змінити оцінку. Додає поле "останній раз змінено"
function editMark($date ,$class, $student, $teacher, $mark, $info){
	$database = db_connect();

		return $database->update("marks", [
			"Mark" => $mark,
			"LastEdit" => date("H:i"),
			"Info" => $info
		], [
			"Date[=]" => $date,
			"Class[=]" => $class,
			"Student[=]" => $student,
			"Teacher[=]" => $teacher,
		]);
}

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