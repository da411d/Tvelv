<? 
$login = getLoginedUsername();

if(!checkLogined()){
	$title= 'Зачекайте...';
	$eval = "window.location.hash = 'login';";
}else{
	$title = 'Профіль';
}
echo '<h1>Привіт, '.getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'].'!</h1>';
?>

<div class="right_block">
<?
if(getUserClassmates($login) AND !isTeacher()){
	$myClassmates = getUserClassmates($login);
	
	
	usort($myClassmates , function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
	echo '<h1>Мої однокласники</h1>';
	foreach($myClassmates as $c){
		echo '<a href="/#viewprofile?_='.$c['Login'].'" class="li">'.$c['SecondName'].' '.$c['Name'].'</a>';
	}
	echo $classmatesHTML;
}




if(isTeacher()){
	$MyMarks = getMarksByParams(['Teacher[=]' => $login]);
	
}else{
	$MyMarks = getMarksByParams(['Student[=]' => $login]);
}

if(count($MyMarks)>0){
	if(isTeacher()){
		$infoHTML = '<h1>Інформація про вчителя:</h1>';	
	}else{
		$infoHTML = '<h1>Інформація про учня:</h1>';
	}
	
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
	$infoHTML .= '<b>Найвища оцінка: </b> <span class="m'.$max.'">'.$max.'</span><br>';
	$infoHTML .= '<b>Найнижча оцінка: </b> <span class="m'.$min.'">'.$min.'</span><br>';
	
	echo $infoHTML;
}
echo '</div>';

$login = getLoginedUsername();
include "profile-getMarkslist.php";
echo $MarksBlock;