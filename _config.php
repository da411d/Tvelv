<?php
ini_set('date.timezone', 'Europe/Kiev');

define('SERVER_NAME' ,$_SERVER['SERVER_NAME']);
define('DIRNAME', dirname(__FILE__).'/');
define('SITEDIR', '');
define('TEMPLATE', 'Tvelv_template');


define('DB_SECRET', '6rWvDg2SPi24mdJ3');

define('ADMIN_ID', '["da411d","dersm"]');


$DEVEPLORER_IP = array("93.175.205.27");
if (in_array($_SERVER['REMOTE_ADDR'], $DEVEPLORER_IP)) {
	define('IS_DEV', TRUE);
}else{
	define('IS_DEV', FALSE);
}