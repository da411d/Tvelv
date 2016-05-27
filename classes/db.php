<?
class db{
	public static function connect(){
		$db = new medoo([
			'database_type' => 'sqlite',
			'database_file' => DIRNAME.'db/Tvelv_'.DB_SECRET.'.db'
		]);
		return $db;
	}
	public static function get($table, $columns=null, $where=null){
		$database = db::connect();
		return($database->select($table, $columns, $where));
	}
}