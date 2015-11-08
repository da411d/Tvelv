<?
function db_connect(){
	$db = new medoo([
		'database_type' => 'mysql',
		'database_name' => 'Tvelv',
		'server' => 'localhost',
		'username' => 'mysql',
		'password' => 'li3oGE',
		'charset' => 'utf8_unicode_ci'
	]);
	return $db;
}
function db_get($table, $columns=null, $where=null){
	$database = db_connect();
	return($database->select($table, $columns, $where));
}