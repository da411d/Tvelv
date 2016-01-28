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
	if(isTeacher($login)){
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
if(isTeacher() AND !isTeacher($login)){
?>
	<div class="mark_block addmark">
		<?php
			if($_POST['subject'] AND ($_POST['mark'] OR $_POST['info'])){
				$status = addMark($_POST['subject'], $login, $_POST['mark'], $_POST['info']);
				echo '<span background="'.($status?"#7ADC37":"#CB2237").'">'.($status?"Complete":"Failed").'</span>';
			}
		?>
		<form method="post" style="margin:0px;padding:0px;">
			<span class="mark m9" id="mrk"><input  type="number" name="mark"size="2" max="13" min="1"onchange="document.getElementById('mrk').style.background=['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'][parseInt(this.value)-1]" value="12"></span>

			<p style="font-weight: 400;">
			<?
				$arr = getSubjectPermission();
				usort($arr, function($a, $b){return strnatcmp($a['SubjectCaption'], $b['SubjectCaption']);});
				echo '<select size="1" name="subject">';
				foreach($arr as $a){
					if($a['SubjectName']==$_POST['Subject']){$selected='selected';}else{$selected='';}
					echo '<option value="'.$a.'" '.$selected.'>'.getSubjectName($a).'</option>';
				}
				echo '</select>';
			?>
			</p>
			<a href="/viewprofile?_=<?=getLoginedUsername();?>" class="teacher"><?=getInfoAboutUser(getLoginedUsername())['Name'].' '.getInfoAboutUser(getLoginedUsername())['SecondName'];?></a>

			<span class="arrow"><img src="/assets/images/arrow.svg"></span>

			<a href="/viewprofile?_=petrova" class="<?=$login;?>"><?=getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'];?></a>

			<textarea class="coment" name="info"rows="2" style="width: calc(100% - 22px);resize:vertical" placeholder="Коментар"></textarea>

			<p><time><script>var currentdate=new Date,datetime=currentdate.getDate()+"/"+(currentdate.getMonth()+1)+"/"+currentdate.getFullYear()+", "+currentdate.getHours()+":"+currentdate.getMinutes();document.write(datetime);</script></time></p>
			
			<input type="submit">
		</form>
	</div>

<?
}
include "getMarkslist.php";
echo $MarksBlock;