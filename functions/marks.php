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
	return db_get("marks", ["Date","Time", "LastEdit", "Class", "Student", "Teacher", "Mark", "Info"], $param);
}

//Повертає всі оцінки
function getAllMarks(){
	$database = db_connect();
	return db_get("marks", ["Date","Time", "LastEdit", "Class", "Student", "Teacher", "Mark", "Info"], []);
}