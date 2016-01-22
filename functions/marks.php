<?
function addMark($date, $class, $student, $teacher, $mark, $info){
	$database = db_connect();

	return $database->insert("marks", [
			"Date" => $date,
			"Time" => date("H:i"),
			"Class" => $class,
			"Student" => $student,
			"Teacher" => $teacher,
			"Mark" => $mark,
			"Info" => $info
		]);
}

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

function getMarksByParams($param = array()){
	$database = db_connect();
	return db_get("marks", ["Date","Time", "LastEdit", "Class", "Student", "Teacher", "Mark", "Info"], $param);
}

function getAllMarks(){
	$database = db_connect();
	return db_get("marks", ["Date","Time", "LastEdit", "Class", "Student", "Teacher", "Mark", "Info"], []);
}