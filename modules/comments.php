<?
function gettitle($param){
	ob_start();
	error_reporting(0);
	$param = str_replace('/', '-', $param);
	if(file_exists(strtolower(dirname(__FILE__).'/../pages/pages/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/pages/'.$param.'.php');
	}elseif(file_exists(strtolower(dirname(__FILE__).'/../pages/special/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/special/'.$param.'.php');
	}elseif(file_exists(strtolower(dirname(__FILE__).'/../pages/error/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/error/'.$param.'.php');
	}else{
		$url = strtolower(dirname(__FILE__).'/../pages/error/404.php');
	}
	include($url);

	ob_end_clean();
	return $title;
}

function getdes($param){
	ob_start();
	error_reporting(0);
	$param = str_replace('/', '-', $param);
	if(file_exists(strtolower(dirname(__FILE__).'/../pages/pages/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/pages/'.$param.'.php');
	}elseif(file_exists(strtolower(dirname(__FILE__).'/../pages/special/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/special/'.$param.'.php');
	}elseif(file_exists(strtolower(dirname(__FILE__).'/../pages/error/'.$param.'.php'))){
		$url = strtolower(dirname(__FILE__).'/../pages/error/'.$param.'.php');
	}else{
		$url = strtolower(dirname(__FILE__).'/../pages/error/404.php');
	}
	include($url);
	ob_end_clean();

	return $description;
}

$param = $_GET['u'];
$param = urldecode($param);
$param = base64_decode($param);
$param = mb_convert_case($param, MB_CASE_LOWER, "UTF-8");
if(rtrim($param, '/')==''){
	$param = 'index';
}

header("Cache-Control:public, max-age=86400");
header('Content-Type: text/html; charset=utf-8');
?>
<title><?=gettitle($param);?>| Blast.ORQ</title>
<meta name="description"  itemprop="description" id="meta-tag-description" property="og: description" content="<?= str_replace('"', "''",getdes($param));?>" >
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" ><style>body{margin:0px;padding:0px;}#vk_comments{width:100%;margin:0px;padding:0px;}</style><script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script><script type="text/javascript">  VK.init({apiId: 4569398, onlyWidgets: true});</script><div id="vk_comments"></div>

<script type="text/javascript">VK.Widgets.Comments("vk_comments", {<? if(isset($_GET['IS_DEV'])){echo 'autoPublish: 0,';}?>limit: 10, attach: "*", pageUrl: "http://blastorq.pp.ua/<?php
if(rtrim($_GET['u'], '/')!='index'){
	echo $_GET['u'];
}?>"});</script>