<?
function loginMe($login){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$arr = ['a' => $login, 'b' => '1', 'c' => md5(date("Ymds"))];
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, time() + (7 * 24 * 60 * 60), '/');
	return true;
}

function getLoginedUsername(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a']){
		return $code['a'];
	}else{
		return 0;
	}
}

function checkLogined(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$cookie = $_COOKIE[$cookiename];
	$code = _decrypt($cookie, $cookiename);
	$code = json_decode($code, 1);
	if($code['a']){
		return 1;
	}else{
		return 0;
	}
}

function Leave(){
	$cookiename = modulate(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")));
	$arr=['b' => '0'];//, 'c' => md5(date("Ymds"))
	$code = _crypt(json_encode($arr), $cookiename);
	SetCookie($cookiename, $code, -1, '/');
}