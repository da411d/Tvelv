<? 
if($_GET['Hi_What_are_you_looking_for']== _crypt(sha1(getPasswordSalt($code['a'])), 'Logout')){
	logOut();
	usleep(50000);
	logOut();
	header('Location: /login');
}else{}