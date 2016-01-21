<? 
include dirname(__FILE__)."/../libs/main.php";

$login = getLoginedUsername();

if(!getLoginedUsername()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#login';window.location.reload();";
}else{
	$header = 'Профіль';
	$main =  '';
}
	
$main .= '<div class="right_block">';
if(getUserClassmates($login) AND !isTeacher()){
	$myClassmates = getUserClassmates($login);
	
	$classmatesHTML = '<h1>Мої однокласники</h1>';
	foreach($myClassmates as $c){
		$classmatesHTML .= '<a href="#profile-'.$c['Login'].'" class="li">'.$c['Name'].' '.$c['SecondName'].'</a>';
	}
	$main .= $classmatesHTML;
}




if(isTeacher()){
	$MyMarks = getMarksByParams(['Teacher[=]' => $login]);
}else{
	$MyMarks = getMarksByParams(['Student[=]' => $login]);
}
if(count($MyMarks)>0){
	$infoHTML = '<h1>Інформація про учня:</h1>';
	
	$max = 0;
	$min = 999;
	$summ = 0;
	$interations = 0;
	foreach($MyMarks as $m){
		$summ += $m['Mark'];
		$interations++;
	
		if($m['Mark']>$max){
			$max = $m['Mark'];
		}
		if($m['Mark']<$min){
			$min= $m['Mark'];
		}
	}
	
	$infoHTML .= '<b>Середня оцінка: </b> <span class="m'.round($summ/$interations, 0).'">'.round($summ/$interations, 1).'</span><br>';
	$infoHTML .= '<b>Найвижча оцінка: </b> <span class="m'.$max.'">'.$max.'</span><br>';
	$infoHTML .= '<b>Найнижча оцінка: </b> <span class="m'.$min.'">'.$min.'</span><br>';
	
	$main .= $infoHTML;
}
$main .= '</div>';

$main .= '<h1>Привіт, '.getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'].'!</h1>';

$login = getLoginedUsername();
include "getMarkslist.php";
$main .= $MarksBlock;