<?php
function getttl($param){
	$param = str_replace('/', '-', $param);
	$path = dirname(__FILE__).'/../pages/'.$param;
	$content = file_get_contents($path, NULL, NULL, 0, 150);
	$content = str_replace('%%TITLE%%', '', $content);
	$position_of_end_of_title = strripos($content, '%%_TITLE%%');
	$content = substr($content, 0, $position_of_end_of_title);
	return $content;
}


function getPathChain(){
	$url = rtrim($_SERVER['REQUEST_URI'], '/');
	$url = trim($url, '/');
	$url = trim($url, 'site/');

	$haystack = $url;
	$needle   = '/';
	$arr=array();
	$pos = strripos($haystack, $needle);

	$arr = array();
	while ($pos) {
		$haystack2 = substr($haystack, $pos);
		$haystack=str_replace($haystack2, '', $haystack);
		$pos = strripos($haystack, $needle);
		if(gettitle($haystack)){
			$arr[] = array(
				'url' => $haystack,
				'title' =>getttl($haystack)
			);
		}
	}
	
	return $arr;
}

function getPathChainHTML(){
	foreach($arr as $a){	
		if(isset($a) AND $a!= ''){
			$echoer = '<a href="http://'.SERVER_NAME.'/'.$a['url'].'">'.$a['title'].'</a>>'.$echoer;
		}
	}
	$echoer = '<a href="http://'.SERVER_NAME.'/">Blast.ORQ</a>>'.$echoer;
	return '<span class="applicationCategory" itemprop="applicationCategory">'.$echoer.'</span>';
}