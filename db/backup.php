<?php
//********************************************************//
//****Цей файл треба поставити на cron з інтервалом  ~1 день
//********************************************************//

include "../_functions.php";
include "../_config.php";

$file = 'Tvelv_'.DB_SECRET.'.db';
$newfile = '.backups_'.DB_SECRET.'/Backup-'.date("Y-m-d_H-i").'_'.md5_file($file).'.db';

$d = date("l, d.m.Y, H:i");
$t = fopen('.backups_'.DB_SECRET.'/Backup.log', 'ab');
if (copy($file, $newfile)){
	fwrite($t, "\r\n".$d.": Complete");
}else{
	fwrite($t, "\r\n".$d.": Failed");
}
fclose($t);
?>