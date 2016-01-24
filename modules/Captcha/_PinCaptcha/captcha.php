<?
if(isset($_GET['request'])){
	if(str_replace("​​" ,"" ,$_GET['request'])===$_GET['request'] AND strlen($_GET['request'])>1){
		$_GET['request'] = 'false';
	}else{
		$_GET['request'] = str_replace("​​" ,"" ,$_GET['request']);
	}
}else{
	$_GET['request'] = 'false';
}

	$haystack = dirname(__FILE__);
	$needle  = '_';
	$posbegin = strripos($haystack, $needle);
	$posend = strlen($haystack);
	$name = substr($haystack, $posbegin+1, $posend-$posbegin);
	$name = str_replace('Captcha', '', $name);
	include dirname(__FILE__).'/../_captcha.php';
?>