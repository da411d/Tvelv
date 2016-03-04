<?
function _crypt($str, $key){
	$encoded = bin2hex($str);
	$encoded = str_split($encoded, 2);
	$returnment = '';
	foreach($encoded as $a){
		$returnment .= bin2hex(pack('H*', $a)^pack('H*', substr(md5($key),0,2)));
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
	$returnment = '';
	foreach(str_split($str, 2) as $a){
		$returnment .= (
			pack('H*', 
				pack('H*', 
					bin2hex($a)
				)
			)
			^
			pack('H*', 
				pack('H*', 
					bin2hex(substr(md5($key),0,2))
				)
			)
		);
	}
	return $returnment;
}