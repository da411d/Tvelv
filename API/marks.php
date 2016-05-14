<?
class marks{
	//Додає оцінку
	public static function addMark($subject, $student, $mark='', $info=''){
		$database = db::connect();
		$teacher = user::isTeacher()?login::getLoginedUsername():false;

		if($subject AND $student AND $teacher AND ($mark OR $info) and in_array($subject, marks::getSubjectPermission())){
			return $database->insert("marks", [
					"Date" => date("Y-m-d"),
					"Time" => date("H:i"),
					"Subject" => $subject,
					"Class" => classes::getClassByUser($student)[0]["ClassName"],
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
		public static function editMark($date ,$class, $student, $teacher, $mark, $info){
			$database = db::connect();
		
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
	public static function getMarksByParams($param = array()){
		$database = db::connect();
		return db::get("marks", ["Date","Time", "LastEdit", "Subject", "Class", "Student", "Teacher", "Mark", "Info"], $param);
	}

	//Повертає всі оцінки
	public static function getAllMarks(){
		$database = db::connect();
		return db::get("marks", ["Date","Time", "LastEdit", "Subject", "Class", "Student", "Teacher", "Mark", "Info"], []);
	}

	//Повертає всі предмети
	public static function getAllSubjects(){
		$database = db::connect();
		return db::get("subjects", ["SubjectName", "SubjectCaption", "SubjectDescription"], []);
	}

	//Повертає права ставити оцінку
	public static function getSubjectPermission(){
		$login = login::getLoginedUsername();
		$database = db::connect();
		if(user::isTeacher()){
			return json_decode(db::get("teachers", ["SubjectPermission"], ["Login" => $login])[0]["SubjectPermission"], 1);
		}
	}

	//Повертає назву предмета по ID
	public static function getSubjectName($param){
		$database = db::connect();
		return db::get("subjects", ["SubjectName","SubjectCaption", "SubjectDescription"], ["SubjectName[=]" => $param])[0]["SubjectCaption"];
	}
}