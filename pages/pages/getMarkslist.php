<? 
if(isTeacher($login)){
	$arr = getMarksByParams(['Teacher[=]' => $login]);
}else{
	$arr = getMarksByParams(['Student[=]' => $login]);
}

$svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="0.5em" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
<polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153" fill="#fafafa"/></svg>';

$MarksBlock = '';
foreach($arr as $a){
	$MarksBlock .= '<div class="mark_block"><a href="/viewprofile?_='.$a['Teacher'].'" class="teacher">';
	$MarksBlock .= getInfoAboutUser($a['Teacher'])['Name'].' '.getInfoAboutUser($a['Teacher'])['SecondName'];
	$MarksBlock .= '</a><span class="arrow">'.$svg.'</span><a href="/viewprofile?_='.$a['Student'].'" class="student">';
	$MarksBlock .= getInfoAboutUser($a['Student'])['Name'].' '.getInfoAboutUser($a['Student'])['SecondName'];
	$MarksBlock .= '</a><span class="mark m'.$a['Mark'].'">'.$a['Mark'].'</span>';
	if($a['Info']){
		$MarksBlock .= '<div class="coment">'.$a['Info'].'</div>';
	}
	$MarksBlock .= '</div>';
}

?>