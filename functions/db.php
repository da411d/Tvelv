<?
function db_connect(){
	$db = new medoo([
		'database_type' => 'sqlite',
		'database_file' => DIRNAME.'db/Tvelv_'.DB_SECRET.'.db'
	]);
	return $db;
}
function db_get($table, $columns=null, $where=null){
	$database = db_connect();
	return($database->select($table, $columns, $where));
}