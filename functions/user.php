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

//Повертає список однокласників
function getUserClassmates($login){
	if(getUserPermission($login) == 'student'){
		$class = db_get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0]["Class"];
	}else{
		return false;
	}
	return db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
}


//Редагує секретні питання(Цю функцію я відключив але потім планую включити)
function addUserSecret($login, $secret){
	$database = db_connect();

	$salt = _crypt(md5(mt_rand()), md5(mt_rand()));

	if(!getInfoAboutUser($login)){
		return $database->insert("2steplogin", [
				"Login" => $login,
				"Secret" => _crypt($secret, $salt),
				"Salt" => $salt,
				"temp" => $secret
			]);
	}
}

//Повертає список секретних питань і відпрвіді
function getUserSecret($login){
	$database = db_connect();
	return db_get('2steplogin', ["Secret", "Salt", "temp"], ["Login[=]" => $login])[0];
}

//Додає секретні питання
function editUserSecret($login, $secret){
	$database = db_connect();

	$salt = _crypt(md5(mt_rand()), md5(mt_rand()));

	return $database->update("2steplogin", [
		"Secret" => _crypt($secret, $salt),
		"Salt" => $salt,
		"temp" => $secret
	], [
		"Login[=]" => $login
	]);
}