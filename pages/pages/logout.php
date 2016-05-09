<? 
if($_GET['Hi_What_are_you_looking_for']== sha1(getPasswordSalt($code['a']))){
	logOut();
	logOut();
	$eval = "window.location.hash='login';";
}else{}