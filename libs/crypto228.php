<?php
function modulate($in){
	$in = base64_encode($in);
	$in=trim($in,"=");
	for ($i = 0; $i <= strlen($in); $i++) {
		$out = $in[$i].$out;
	}
	return $out;
}

function demodulate($in){
	$in=trim($in,"=");
	for ($i = 0; $i <= strlen($in); $i++) {
		$out = $in[$i].$out;
	}
	$out = base64_decode($out);
	return $out;
}

function _crypt($unencoded,$key){
	$string=base64_encode($unencoded);

	$arr=array();
	$x=0;
	while ($x++< strlen($string)) {
		$arr[$x-1] = md5(md5($key.$string[$x-1]).$key);
		$newstr = $newstr.$arr[$x-1][1].$arr[$x-1][2].$arr[$x-1][3].$arr[$x-1][4].$arr[$x-1][5].$arr[$x-1][0];
	}
	$newstr=modulate($newstr);
	return $newstr;
}

function _decrypt($encoded, $key){
	$encoded = demodulate($encoded);
	$strofsym="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=";
	$x=0;
	while ($x++<= strlen($strofsym)) {
		$tmp = md5(md5($key.$strofsym[$x-1]).$key);
		$encoded = str_replace($tmp[1].$tmp[2].$tmp[3].$tmp[4].$tmp[5].$tmp[0], $strofsym[$x-1], $encoded);
	}
	return base64_decode($encoded) ;
}