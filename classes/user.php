<?		
class User{
	public $login;
	public $isTeacher;
	public $isStudent;
	public $isParent;
	public $info;
	public $permission;
	public $classmates;

	function __construct($login=false) {
		$this->login = $login?$login:false;

		$this->isTeacher = db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='teacher'?true:false;
		$this->isStudent = db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='student'?true:false;
		$this->isParent = db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='parent'?true:false;
		$this->permission = db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission'];

		switch ($this->permission){
			case 'student':
				$this->info = db_get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0];
				break;
			case 'teacher':
				$this->info = db_get("teachers", ["Login", "Name", "SecondName", "Class", "SubjectPermission"], ["Login[=]" => $login])[0];
				break;
			case 'parent':
				$this->info = db_get("parents", ["Login", "Name", "SecondName", "Children"], ["Login[=]" => $login])[0];
				break;
		}


		$this->classmates = $this->isStudent?db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $this->info["Class"]]):false;
		usort($this->classmates, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});

	}


	//Отримати список всіх учнів/вчителів/батьків
	function getByList($in='student'){
		$database = db_connect();
		switch ($in) {
			case student:
				$dbineed='students';
				break;
			case teacher:
				$dbineed='teachers';
				break;
			case parent:
				$dbineed='parents';
				break;
		}
		return db_get($dbineed, ["Login", "Name", "SecondName", "Class"]);
	}

	//Повертає список учнів певного класу
	function getStudentsByClass($class){
		return db_get("students", ["Login", "Name", "SecondName", "Class"], ["Class[=]" => $class]);
	}
}