<? 
include dirname(__FILE__)."/../libs/main.php";

$login = get_logined();

print_r(getUserClassmates($login));



$login = 'da411d';
if(getUserPermission() == 'student'){
	$class = db_get("students", ["Login", "Name", "SecondName", "Class"], ["Login[=]" => $login])[0]["Class"];
}else{
	echo false;
}
print_r(db_get("students", ["Login", "Name", "SecondName"], ["Class[=]" => $class]));