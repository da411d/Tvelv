<form method="post" style="margin:0px;padding:0px;">
	<div class="mark_block addmark">
	<?php
		if($_POST['subject'] AND ($_POST['mark'] OR $_POST['info'])){
			$status = addMark($_POST['subject'], $login, $_POST['mark'], $_POST['info']);
			echo '<span style="background:'.($status?"#7ADC37":"#CB2237").';padding: 4px;border-radius: 2px;">'.($status?"Готово!":"Помилка").'</span>';
		}
	?>
		<span class="mark m9" id="mrk"><input  type="number" name="mark"size="2" max="13" min="1"onchange="document.getElementById('mrk').style.background=['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'][parseInt(this.value)-1]" value="12"></span>

		<p style="font-weight: 400;">
		<?
			$arr = getSubjectPermission();
			echo '<select size="1" name="subject">';
			foreach($arr as $a){
				if($a['SubjectName']==$_POST['Subject']){$selected='selected';}else{$selected='';}
				echo '<option value="'.$a.'" '.$selected.'>'.getSubjectName($a).'</option>';
			}
			echo '</select>';
		?>
		</p>
		<a href="/#viewprofile?_=<?=getLoginedUsername();?>" class="teacher"><?=getInfoAboutUser(getLoginedUsername())['Name'].' '.getInfoAboutUser(getLoginedUsername())['SecondName'];?></a>

		<span class="arrow"><img src="/assets/images/arrow.svg"></span>

		<a href="/#viewprofile?_=petrova" class="<?=$login;?>"><?=getInfoAboutUser($login)['Name'].' '.getInfoAboutUser($login)['SecondName'];?></a>

		<textarea class="coment" name="info"rows="2" style="width: calc(100% - 22px);resize:vertical" placeholder="Коментар"></textarea>

		<p><time><script>var currentdate=new Date,datetime=currentdate.getDate()+"/"+(currentdate.getMonth()+1)+"/"+currentdate.getFullYear()+", "+currentdate.getHours()+":"+currentdate.getMinutes();document.write(datetime);</script></time></p>
			
		<input type="submit">
	</div>
</form>