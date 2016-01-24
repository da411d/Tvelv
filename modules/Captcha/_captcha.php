<?php
error_reporting(0);
function modulate($in){
	$in = base64_encode($in);
	$in = trim($in,"=");
	$in = rtrim($in,"=");
	$out = '';
	for ($i=0; $i < strlen($in); ++$i) {
		$out = $in[$i].$out;
	}
	return $out;
}

function demodulate($in){
	$in = trim($in,"=");
	$in = rtrim($in,"=");
	$out = '';
	for ($i = 0; $i < strlen($in); ++$i) {
		$out = $in[$i].$out;
	}
	$out = base64_decode($out);
	return $out;
}

function _crypt($unencoded,$key){
	$string=base64_encode($unencoded);

	$arr=array();
	$x=0;
	$newstr = '';
	for($x=0; $x < strlen($string); ++$x) {
		$arr[$x] = md5(md5($key.$string[$x]).$key);
		$newstr = $newstr.$arr[$x][3].$arr[$x][6].$arr[$x][1].$arr[$x][2];
	}
	$newstr=modulate($newstr);
	return $newstr;
}

function _decrypt($encoded, $key){
	$encoded = demodulate($encoded);
	$strofsym="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=";
	
	for($x=0; $x < strlen($strofsym); ++$x) {
		$tmp = md5(md5($key.$strofsym[$x]).$key);
		$encoded = str_replace($tmp[3].$tmp[6].$tmp[1].$tmp[2], $strofsym[$x], $encoded);
	}
	return base64_decode($encoded) ;
}

function toQwerty($a){
$b = $a;$b = mb_convert_case($b, MB_CASE_LOWER, "UTF-8"); $b = str_replace('й','q',$b);$b = str_replace('ц','w',$b);$b = str_replace('у','e',$b);$b = str_replace('к','r',$b);$b = str_replace('е','t',$b);$b = str_replace('н','y',$b);$b = str_replace('г','u',$b);$b = str_replace('ш','i',$b);$b = str_replace('щ','o',$b);$b = str_replace('з','p',$b);$b = str_replace('х','[',$b);$b = str_replace('ї',']',$b);$b = str_replace('ф','a',$b);$b = str_replace('і','s',$b);$b = str_replace('в','d',$b);$b = str_replace('а','f',$b);$b = str_replace('п','g',$b);$b = str_replace('р','h',$b);$b = str_replace('о','j',$b);$b = str_replace('л','k',$b);$b = str_replace('д','l',$b);$b = str_replace('ж',';',$b);$b = str_replace('э',"'",$b);$b = str_replace('я','z',$b);$b = str_replace('ч','x',$b);$b = str_replace('с','c',$b);$b = str_replace('м','v',$b);$b = str_replace('и','b',$b);$b = str_replace('т','n',$b);$b = str_replace('ь','m',$b);$b = str_replace('б',',',$b);$b = str_replace('ю','.',$b);return $b;}


$ip = $_SERVER['REMOTE_ADDR'];
$d = getdate();
include dirname(__FILE__).'/_'.$name."Captcha/code_generator.php";

if(isset($_GET['request'])){
	$request = $_GET['request'];
}else{
	$request = '';
}
$request = mb_convert_case($request, MB_CASE_LOWER, "UTF-8"); 
$request = str_replace(array('/', ' ', "\r", "\n", "'", '-'), '', $request);
$request = toQwerty($request);

$in = $request;

if(isset($_COOKIE[modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ydmd")))])){
	$out = $_COOKIE[modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ydmd")))];
}else{
	$out = md5(rand(-999,999));
}
$out = _decrypt($out, 'Cod');
$out = toQwerty($out);

similar_text($in, $out, $percent);

if (isset($in) AND isset($out) AND $in AND $out AND $percent>75){
	Header ('Content-type: image/png');
	$im = imagecreatetruecolor(1, 2);
	imagefilledrectangle($im,0,0,1,2,ImageColorAllocatealpha($im,rand(0,100), rand(120,200), rand(0,100), 0));
	Header ('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);

	$t = fopen(dirname(__FILE__).'/sessions/session_'.$ip.'_'.$_answer, 'c');
	fwrite($t, time());
	fclose($t);
}else{
	include dirname(__FILE__).'/_'.$name.'Captcha/image.php';
	$answer = mb_convert_case($answer, MB_CASE_LOWER, "UTF-8"); 
	$answer = strtolower(str_replace(array('/', ' ', '\r', '\n', "'", '-'), '', $answer));
	$answer = toQwerty($answer);

	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ydmd")));
	$code = _crypt($answer, 'Cod');
	SetCookie($cookiename, $code);
	//SetCookie($answer.'_', $answer.'_');//DEBUG

	imgInit($im);
}
?>