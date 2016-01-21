<? 
include dirname(__FILE__)."/../libs/main.php";

$login = $params[1];

if(!getLoginedUsername()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#login';window.location.reload();";
}elseif($login==getLoginedUsername()){
	$header = 'Зачекайте...';
	$main =  "";
	$eval = "window.location.hash = '#profile';window.location.reload();";
}else{
	$header = 'Профіль';

	$main =  '<h1>'.getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'];
	if(getUserPermission($login)=='teacher'){
		$main .= '<sup style="background:#ff7777;padding:4px;font-size:50%;">Вчитель</sup>';
	}elseif(getUserPermission($login)=='student'){
		$main .= '<sup style="background:#7777ff;padding:4px;font-size:50%;">Учень</sup>';
	}elseif(getUserPermission($login)=='parent'){
		$main .= '<sup style="background:#77ff77;padding:4px;font-size:50%;">Батько/мама</sup>';
	}else{
		$main .= '<sup style="background:#ff7777;padding:4px;font-size:50%;">'.getUserPermission().'</sup>';
	}
	$main .= '</h1>';

	$main .= '<div class="right_block">';

	$MyMarks = getMarksByParams(['Student[=]' => $login]);
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
		
	}
	$infoHTML .= '</div>';
	$main .= $infoHTML;
}

include "getMarkslist.php";
$main .= $MarksBlock;