<?		
//Перевіряє правильність паролю
function isPasswordCorrect($login, $password){
	sleep(2);
	$database = db_connect();

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);

	if($test[0][Password] == _crypt($password, $test[0][Salt])){
		return true;
	}else{
		return false;
	}
}

//Реєструє користувача
function registerUser($login, $password, $permission, $name, $secondname, $class){
	$database = db_connect();

	$salt=md5(mt_rand());

	$dbineed='students';
	switch ($permission) {
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
	if(!getInfoAboutUser($login)){
		$udb = $database->insert("users", [
				"Login" => $login,
				"Password" => _crypt($password, $salt),
				"Salt" => $salt,
				"Permission" => $permission
			]);
		
		$ddb = $database->insert($dbineed, [
				"Login" => $login,
				"Name" => $name,
				"SecondName" => $secondname,
				"Class" => $class
			]);
		}
	if($udb AND $ddb){return true;}else{return false;}
}

//Змінити пароль
function editUserPassword($login, $password, $new){
	$database = db_connect();

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);

	if($test[0][Password] == _crypt($password, $test[0][Salt])){
		$salt=md5(mt_rand());
		return $database->update("users", [
			"Password" => _crypt($new, $salt),
			"Salt" => $salt
		], [
			"Login[=]" => $login
		]);
	}
}


//Отримати доні про користувача
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
	if(getUserPermission() == 'student'){
		$class = db_get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0]["Class"];
	}else{
		return false;
	}
	return db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]);
}


//Редагує секретні питання(Цю функцію я відключив але потім планую включити)
function addUserSecret($login, $secret){
	$database = db_connect();

	$salt=md5(mt_rand());

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

	$salt=md5(mt_rand());

	return $database->update("2steplogin", [
		"Secret" => _crypt($secret, $salt),
		"Salt" => $salt,
		"temp" => $secret
	], [
		"Login[=]" => $login
	]);
}