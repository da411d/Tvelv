<?
function mark_add($date, $class, $student, $teacher, $mark, $info){
	$database = db_connect();

	return $database->insert("days", [
			"Date" => $date,
			"Time" => date("H:i"),
			"Class" => $class,
			"Student" => $student,
			"Teacher" => $teacher,
			"Mark" => $mark,
			"Info" => $info
		]);
}

function mark_change($date ,$class, $student, $teacher, $mark, $info){
	$database = db_connect();

		return $database->update("days", [
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

function mark_get_by_params($param = array()){
	$database = db_connect();

return db_get("days", ["Date","Time", "LastEdit", "Class", "Student", "Teacher", "Mark", "Info"], $param);
}