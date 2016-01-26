<?
//Додає оцінку
function addMark($date, $class, $student, $teacher, $mark, $info){
	$database = db_connect();

	if($date AND $class AND $student AND $teacher AND ($mark OR $info)){
		return $database->insert("marks", [
				"Date" => $date,
				"Time" => date("H:i"),
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

//Повертає назву предмета по ID
function getSubjectName($param){
	$database = db_connect();
	return db_get("subjects", ["SubjectName","SubjectCaption", "SubjectDescription"], ["SubjectName[=]" => $param])[0]["SubjectCaption"];
}