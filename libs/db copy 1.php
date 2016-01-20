<?
function db_connect(){
	$db = new medoo([
		'database_type' => 'mysql',
		'database_name' => 'Tvelv',
		'server' => 'localhost',
		'username' => 'mysql',
		'password' => 'li3oGE',
		'charset' => 'utf8_unicode_ci',
		'prefix' => 'Tvelv_6rWvDg2SPi24mdJ3_'
	]);
	return $db;
}
function db_get($table, $columns=null, $where=null){
	$database = db_connect();
	return($database->select($table, $columns, $where));
}