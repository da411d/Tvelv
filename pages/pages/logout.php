<? 
if($_GET['Hi_What_are_you_looking_for']== _crypt(sha1(getPasswordSalt($code['a'])), 'Logout')){
	logOut();
	usleep(500000);
	logOut();
	usleep(500000);
	logOut();
	usleep(500000);
	logOut();
	header('Location: /login');
}else{}