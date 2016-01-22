<?
	error_reporting(0);
	if(is_mobile()){
		echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">';
	}else{
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
	}
?>

<?php
	$h = trim($_SERVER['REQUEST_URI'], '/');
	if($h==''){$h = 'index';}
?>
<link rel="stylesheet" type="text/css" href="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/css/style.css" async="async" />
<style>.<?=$h;?>top{padding-bottom:11px!important;border-bottom:5px solid #fafafa!important;}</style>
<base href="http://<?=SERVER_NAME;?><?= rtrim($_SERVER['REQUEST_URI'], '/');?>">
<link rel="canonical" hreflang="uk" href="<?=SERVER_NAME;?><?= rtrim(rtrim($_SERVER['REQUEST_URI'], '?p=1'), '/');?>/">
<link rel="shortcut icon" href="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/images/logo-small-blue.svg">
<link rel="shortcut icon" href="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/images/logo.ico">
<link rel="apple-touch-icon" href="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/images/logo-small-blue.svg">
<meta itemprop="image" content="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/images/logo-small-blue.svg">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="True">