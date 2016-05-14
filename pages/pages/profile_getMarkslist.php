<? 
if(isTeacher($login)){
	$arr = getMarksByParams(["LIMIT" => 30, 'Teacher[=]' => $login]);
}else{
	$arr = getMarksByParams(["LIMIT" => 30, 'Student[=]' => $login]);
}
if(count($arr)==30){
	$aftertext = "Показано тільки останні 30 оцінок";
}else{
	$aftertext = false;
}
$svg = '<img src="/assets/images/arrow.svg">';

$MarksBlock = '';
usort($arr, function($a, $b){
	$t1 = strtotime($a['Date'].' '.$a['Time']);
	$t2 = strtotime($b['Date'].' '.$b['Time']);
	return $t2 - $t1;
});
foreach($arr as $a){
	$MarksBlock .= '<div class="mark_block">';
	$MarksBlock .= '<span class="mark m'.$a['Mark'].'">'.$a['Mark'].'</span>';
	$MarksBlock .= '<p style="font-weight: 400;">'.getSubjectName($a['Subject']).'</p>';
	$MarksBlock .= '<a href="/#viewprofile?_='.$a['Teacher'].'" class="teacher">';
	$MarksBlock .= getInfoAboutUser($a['Teacher'])['Name'].' '.getInfoAboutUser($a['Teacher'])['SecondName'].'</a>';
	$MarksBlock .= '<span class="arrow">'.$svg.'</span><a href="/#viewprofile?_='.$a['Student'].'" class="student">';
	$MarksBlock .= getInfoAboutUser($a['Student'])['Name'].' '.getInfoAboutUser($a['Student'])['SecondName'].'</a>';
	if($a['Info']){
		$MarksBlock .= '<p class="coment">'.$a['Info'].'</p>';
	}
	$time = explode('-', $a['Date']);
	$MarksBlock .= '<p><time>'.$time[2].'/'.$time[1].'/'.$time[0].", ".rtrim($a['Time'], ':00').'</time></p>';
	$MarksBlock .= '</div>';
}
if($aftertext){
	$MarksBlock .= '<div class="mark_block">';
	$MarksBlock .= $aftertext;
	$MarksBlock .= '</div>';
}
?>