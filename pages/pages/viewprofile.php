<?
$login = $_GET['_'];

if(!getLoginedUsername()){
	header('Location: /login');
}elseif($login==getLoginedUsername()){
	header('Location: /profile');
}else{

	$title = 'Профіль';

	echo '<h1>'.getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'];
	if(getUserPermission($login)=='teacher'){
		echo '<sup style="background:#ff7777;padding:4px;font-size:50%;">Вчитель</sup>';
	}elseif(getUserPermission($login)=='student'){
		echo '<sup style="background:#7777ff;padding:4px;font-size:50%;">Учень</sup>';
	}elseif(getUserPermission($login)=='parent'){
		echo '<sup style="background:#77ff77;padding:4px;font-size:50%;">Батько/мама</sup>';
	}else{
		echo '<sup style="background:#ff7777;padding:4px;font-size:50%;">'.getUserPermission().'</sup>';
	}
	echo '</h1>';

	echo '<div class="right_block">';
	if(isTeacher()){
		$MyMarks = getMarksByParams(['Teacher[=]' => $login]);
	}else{
		$MyMarks = getMarksByParams(['Student[=]' => $login]);
	}
	if(count($MyMarks)>0){
			if(isTeacher()){
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

include "getMarkslist.php";
echo $MarksBlock;