<?
function _crypt($str, $key){
	$encoded = bin2hex($str);
	$encoded = str_split($encoded, 2);


	$key = md5($key);
	for($i=0;$i<(count($encoded)/16)+1;$i++){
		$key .= md5($key.$i);
	}
	$key = str_split($key, 2);
	$returnment = '';
	for ($i=0;$i<count($encoded);$i++){
		$a = $encoded[$i];
		$returnment .= bin2hex(pack('H*', $a)^pack('H*', $key[$i]));
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
	$str = str_split($str, 2);

	$key = md5($key);
	for($i=0;$i<(count($str)/16)+1;$i++){
		$key .= md5($key.$i);
	}
	$key = str_split($key, 2);

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
					bin2hex($key[$i])
				)
			)
		);
	}
	return $returnment;
}