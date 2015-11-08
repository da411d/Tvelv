<?		
//############USER REGISTER############
function user_login($login, $password){
	$database = db_connect();

	$test = db_get("users", ["Login","Password","Salt"], ["Login[=]" => $login]);

	if($test[0][Password] == _crypt($password, $test[0][Salt])){
		return true;
	}else{
		return false;
	}
}

function user_register($login, $password, $permission, $name, $secondname, $class){
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
	}
	if(!user_get_params($login)){
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
	if($udb and $ddb){return true;}else{return false;}
}

function user_change_password($login, $password, $new){
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

function user_get_params($login){
	$database = db_connect();
	switch (db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']) {
	    case student:
	        $dbineed='students';
	        break;
	    case teacher:
	        $dbineed='teachers';
	        break;
	}
return db_get($dbineed, ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0];
}

function user_get_by_list($in='student'){
	$database = db_connect();
	switch ($in) {
	    case student:
	        $dbineed='students';
	        break;
	    case teacher:
	        $dbineed='teachers';
	        break;
	}
return db_get($dbineed, ["Login", "Name", "SecondName", "Class"]);
}

function is_teacher($login=''){
	if($login){
		$login = get_logined();
	}
	if(db_get("users", ["Permission"], ["Login[=]" => $login])[0]['Permission']=='teacher'){
		return 1;
	}else{
		return 0;
	}
}
//############USER SECRET QUESTION############
function user_add_secret($login, $secret){
	$database = db_connect();

	$salt=md5(mt_rand());

	if(!user_get_params($login)){
		return $database->insert("2steplogin", [
				"Login" => $login,
				"Secret" => _crypt($secret, $salt),
				"Salt" => $salt,
				"temp" => $secret
			]);
	}
}

function user_get_secret($login){
	$database = db_connect();

return db_get('2steplogin', ["Secret", "Salt", "temp"], ["Login[=]" => $login])[0];
}

function user_change_secret($login, $secret){
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