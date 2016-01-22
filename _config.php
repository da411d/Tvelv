<?php
define('SERVER_NAME' ,$_SERVER['SERVER_NAME']);
define('DIRNAME', dirname(__FILE__).'/');
define('SITEDIR', '');

$DEVEPLORER_IP = array("93.175.205.27");
if (in_array($_SERVER['REMOTE_ADDR'], $DEVEPLORER_IP)) {
	define('IS_DEV', TRUE);
}else{
	define('IS_DEV', FALSE);
}