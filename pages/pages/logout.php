<? 
if($_GET['Hi_What_are_you_looking_for']== sha1(getPasswordSalt($code['a']))){
	logOut();
	usleep(50000);
	logOut();
	header('Location: /login');
}else{}