<?
	$alt='Enter text';
	$haystack = dirname(__FILE__);
	$needle  = '_';
	$posbegin = strripos($haystack, $needle);
	$posend = strlen($haystack);
	$name = substr($haystack, $posbegin+1, $posend-$posbegin);
	$name = str_replace('Captcha', '', $name);
	include dirname(__FILE__).'/../_code.php';
?>
<?php ob_end_flush();?>