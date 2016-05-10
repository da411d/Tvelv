<? 
if($_GET['Hi_What_are_you_looking_for']== sha1(getPasswordSalt($code['a']))){
	logOut();
	logOut();
	$eval = "window.location.hash='login';localStorage.setItem('token', '".str_replace(array("/", "=", "+"), "", base64_encode(hex2bin(   sha1(rand())   )))."')";
}else{}