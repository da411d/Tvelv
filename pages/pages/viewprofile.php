<?
$login = $_GET['_'];
if(!login::getLoginedUsername()){
	$eval = "window.location.hash='login';";
}elseif($login==login::getLoginedUsername()){
	$eval = "window.location.hash='profile';";
}else{
	$title = 'Профіль';
	echo '<h1>'.user::getInfoAboutUser($login)['Name'].' '.user::getInfoAboutUser($login)['SecondName'];
	if(user::getUserPermission($login)=='teacher'){
		echo '<sup style="background:#ff7777;padding:4px;font-size:50%;color:#ffffff;">Вчитель</sup>';
	}elseif(user::getUserPermission($login)=='student'){
		echo '<sup style="background:#7777ff;padding:4px;font-size:50%;color:#ffffff;">Учень</sup>';
	}elseif(user::getUserPermission($login)=='parent'){
		echo '<sup style="background:#77ff77;padding:4px;font-size:50%;color:#ffffff;">Батько/мама</sup>';
	}else{
		echo '<sup style="background:#ff7777;padding:4px;font-size:50%;color:#ffffff;">'.user::getUserPermission().'</sup>';
	}
	echo '</h1>';
	echo '<div class="right_block">';
	if(user::isTeacher($login)){
		$MyMarks = marks::getMarksByParams(['Teacher[=]' => $login]);
	}else{
		$MyMarks = marks::getMarksByParams(['Student[=]' => $login]);
	}
	if(count($MyMarks)>0){
			if(user::isTeacher($login)){
				echo '<h1>Інформація про вчителя:</h1>';	
			}else{
				echo '<h1>Інформація про учня:</h1>';
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
		
		echo '<b>Середня оцінка: </b> <span class="m'.round($summ/$interations, 0).'">'.round($summ/$interations, 1).'</span><br>';
		echo '<b>Найвища оцінка: </b> <span class="m'.$max.'">'.$max.'</span><br>';
		echo '<b>Найнижча оцінка: </b> <span class="m'.$min.'">'.$min.'</span><br>';
		
	}
	echo '</div>';
}
if(user::isTeacher() AND !user::isTeacher($login)){
	include "viewprofile_addMark.php";
}
include "profile_getMarkslist.php";
echo $MarksBlock;