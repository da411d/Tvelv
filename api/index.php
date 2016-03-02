<?php 
ini_set('date.timezone', 'Europe/Kiev');

define('SERVER_NAME' ,$_SERVER['SERVER_NAME']);
define('DIRNAME', dirname(__FILE__).'/');
define('SITEDIR', '');
define('TEMPLATE', 'Tvelv_template');


define('DB_SECRET', '6rWvDg2SPi24mdJ3');

define('ADMIN_ID', '["da411d","dersm"]');


$dh = opendir(dirname(__FILE__));
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
$arr = array();
foreach ($files as $f) { 
	if($f AND !is_dir($f) AND !strpos(' '.$f, '!')){
		include_once(dirname(__FILE__).'/'.$f);
	} 
}

$api = new Api();
echo $api->login;