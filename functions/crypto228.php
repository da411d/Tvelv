<?php

function _crypt($str, $key){
	$encoded = bin2hex($str);
	$encoded = str_split($encoded, 2);

	$binkey = md5($key);
	for($i=0;$i<(count($encoded)/16)+1;$i++){
		$binkey .= md5($key.$binkey);
	}
	$binkey = str_split($binkey, 2);

	$returnment = '';
	for ($i=0;$i<count($encoded);$i++){
		$a = $encoded[$i];
		$returnment .= bin2hex(
			pack('H*', $a)
			^
			pack('H*', $binkey[$i])
		);
	}
	$returnment = hex2bin($returnment);
	$returnment = base64_encode($returnment);
	$returnment = str_replace('+', '-', $returnment);
	$returnment = str_replace('/', '_', $returnment);
	return $returnment;
}

function _decrypt($str, $key){
	$str = str_replace('-', '+', $str);
	$str = str_replace('_', '/', $str);
	$str = base64_decode($str);
	$str = bin2hex($str);
	$str = str_split($str, 2);

	$binkey = md5($key);
	for($i=0;$i<(count($str)/16)+1;$i++){
		$binkey .= md5($key.$binkey);
	}
	$binkey = str_split($binkey, 2);

	$returnment = '';
	for ($i=0;$i<count($str);$i++){
		$a = $str[$i];
		$returnment .= (
			pack('H*', 
				pack('H*', 
					bin2hex($a)
				)
			)
			^
			pack('H*', 
				pack('H*', 
					bin2hex($binkey[$i])
				)
			)
		);
	}
	return $returnment;
}