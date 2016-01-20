<?
function db_connect(){
	$db = new medoo([
		'database_type' => 'sqlite',
		'database_file' => dirname(__FILE__).'../DB/'
		//'charset' => 'utf8_unicode_ci',
		//'prefix' => 'Tvelv_6rWvDg2SPi24mdJ3_'
	]);
	return $db;
}
function db_get($table, $columns=null, $where=null){
	$database = db_connect();
	return($database->select($table, $columns, $where));
}