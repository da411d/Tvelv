<?php
//********************************************************//
//****Цей файл треба поставити на cron з інтервалом  ~1 день
//********************************************************//

//Заголовок повідомлення
$thm     = 'Tvelv backup '.date("d/m/Y H:i");

//Текст повідомлення
$msg     = 'Резервна копія Бази Даних системи "Tvelv"';

//Отримувач
$mail_to = 'example@example.com';







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


$file = "";
$file = 'Tvelv_'.DB_SECRET.'.db';
if (empty($file)){
	if(mail($mail_to, $thm, $msg)){
		fwrite($t, "\r\n".$d.": E-mail send complete");
	}else{
		fwrite($t, "\r\n".$d.": E-mail send failed");
	}
}else{
	if(send_mail($mail_to, $thm, $msg, $file)){
		fwrite($t, "\r\n".$d.": E-mail send complete");
	}else{
		fwrite($t, "\r\n".$d.": E-mail send failed");
	}
}
fclose($t);

function send_mail($mail_to, $thema, $html, $path){
	if ($path) {
		$fp = fopen($path, "rb");
		if (!$fp) {
			print "Cannot open file";
			exit();
		}
		$file = fread($fp, filesize($path));
		fclose($fp);
	}
	$name     = 'Backup-'.date("Y-m-d_H-i").'.db';
	$EOL      = "\r\n";
	$boundary = "--" . md5(uniqid(time()));
	$headers  = "MIME-Version: 1.0;$EOL";
	$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";
	$headers .= "From: address@server.com";
	$multipart = "--$boundary$EOL";
	$multipart .= "Content-Type: text/html; charset=windows-1251$EOL";
	$multipart .= "Content-Transfer-Encoding: base64$EOL";
	$multipart .= $EOL;
	$multipart .= chunk_split(base64_encode($html));
	$multipart .= "$EOL--$boundary$EOL";
	$multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";
	$multipart .= "Content-Transfer-Encoding: base64$EOL";
	$multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";
	$multipart .= $EOL;
	$multipart .= chunk_split(base64_encode($file));
	$multipart .= "$EOL--$boundary--$EOL";
	if (!mail($mail_to, $thema, $multipart, $headers)) {
		return False;
	} else {
		return True;
	}
	exit;
}
?>