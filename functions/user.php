<?		
//Отримати дані про користувача
function getInfoAboutUser($login){
	$database = db_connect();
	switch (db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']) {
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
return db_get($dbineed, ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0];
}

//Отримати список всіх учнів/вчителів/батьків
function getUserByList($in='student'){
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

//Повертає учнів певного класу
function getUsersByClass($param='0'){
	return db_get("students", ["Login", "Name", "SecondName", "Class"], ["Class" => $param]);
}

//Перевіряє чи є користувач вчителем
function isTeacher($login=''){
	if(!$login){
		$login = getLoginedUsername();
	}
	if(db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='teacher'){
		return 1;
	}else{
		return 0;
	}
}

//Повертає права користувача
function getUserPermission($login = FALSE){
	if(!$login){
		$login = getLoginedUsername();
	}
	if(db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']){
		return db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission'];
	}else{
		return 0;
	}
}

//Повертає список учнів певного класу
function getStudentsByClass($class){
	return db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
}

//Повертає список однокласників
function getUserClassmates($login){
	if(getUserPermission($login) == 'student'){
		$class = db_get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0]["Class"];
	}else{
		return false;
	}
	return db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
}