<? 
include dirname(__FILE__)."/../libs/main.php";

$login = get_logined();

if(!get_logined()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#login';window.location.reload();";
}else{
	$header = 'Профіль';
	$main =  '';
}

if(getUserClassmates()){
	$myClassmates = getUserClassmates();
	
	$classmatesHTML = '<div class="right_block"><h1>Мої однокласники</h1>';
	foreach($myClassmates as $c){
		$classmatesHTML .= '<a href="#profile-'.$c['Login'].'" class="li">'.$c['Name'].' '.$c['SecondName'].'</a>';
	}
	$classmatesHTML .= '</div>';
	$main .= $classmatesHTML;
}

$main .= '<h1>Привіт, '.user_get_params($login)['Name'].' '.user_get_params($login)['SecondName'].'!</h1>';