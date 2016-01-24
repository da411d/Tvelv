<?
function zadom_napered($in){
$out = '';
for ($i = 0; $i < strlen($in); ++$i) {
    $out = $in[$i].$out;
}
return $out;
}
$ip = $_SERVER['REMOTE_ADDR'];
$d = getdate();

$_answer = md5($ip.$d["mday"].$name.'Captcha');
$_answer = base64_encode($_answer);
$_answer = zadom_napered($_answer);
$_answer = trim($_answer,"=");
$_answer = substr($_answer, 0, 15);
if(isset($_GET["k"]) AND $_GET["k"]){
    $_answer .= $_GET["k"];
}
?>