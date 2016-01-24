<?php
header('Content-Type: text/plain; charset=utf-8');
?><?php
error_reporting(0);
$apos = '"';
$ip = $_GET['ip'];
$d = getdate();

if(file_get_contents(dirname(__FILE__).'/sessions/session_'.$ip.'_'.$_GET['r'])){
	if(time()-300 < file_get_contents(dirname(__FILE__).'/sessions/session_'.$ip.'_'.$_GET['r']))
	{
	echo 'true';
	}else{
	echo 'experied';
	}
} else{
echo 'not_exist';
}
?>