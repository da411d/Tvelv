<?
class Api{
	public $token;
	public $login;

	private $sessid;
	private $salt;
	function __construct($token = false){

		$this->sessid = substr(_crypt(md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(date("Ym")), 'SECRET_PASS'), 0, 64);
		
		$this->token = $token?$token:$_COOKIE[$this->sessid];
			$code = $this->token;
			$code = _decrypt($cookie, $cookiename);//    |
			$code = json_decode($code, 1);//                  \/Тут проблема!
			if($code['a'] AND $code['c']==substr(sha1(getPasswordSalt($code['a'])),0,8)){
				$this->login = $code['a'];
			}else{
				$this->login = 'false';
			}
		
	}
}