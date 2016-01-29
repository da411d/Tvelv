<?$title="Поставити оцінку";?>

<?
if(isTeacher()){
?>
	<div class="mark_block addmark">
		<?php
			if($_POST['subject'] AND $_POST['student'] AND ($_POST['mark'] OR $_POST['info'])){
				$status = addMark($_POST['subject'], $_POST['student'], $_POST['mark'], $_POST['info']);
				echo '<span style="background:'.($status?"#7ADC37":"#CB2237").';">'.($status?"Complete":"Failed").'</span>';
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

			<select size="1" name="class" onchange="loadStudents(this)">
				<?php
					$arr = getAllClasses();
					foreach($arr as $a){
						echo '<option value="'.$a['ClassName'].'"'.$selected.'>'.$a['ClassCaption'].'</option>';
					}
				?>
				</select>
			<select size="1" name="student" class="student">
			</select>



			<textarea class="coment" name="info"rows="2" style="width: calc(100% - 22px);resize:vertical" placeholder="Коментар"></textarea>

			<p><time><script>var currentdate=new Date,datetime=currentdate.getDate()+"/"+(currentdate.getMonth()+1)+"/"+currentdate.getFullYear()+", "+currentdate.getHours()+":"+currentdate.getMinutes();document.write(datetime);</script></time></p>
			
			<input type="submit">
		</form>
	</div>

<?
}else{
header("Location: /403");
exit;
}
?>
<script>
function loadStudents(e){
	students = JSON.parse(connect("getStudentsByClass-"+e.value));
	studentsHTML = '';
	for(a in students){
		studentsHTML += '<option value="'+students[a]['Login']+'">'+students[a]['Name']+' '+students[a]['SecondName']+'</option>'
	}
	document.getElementsByName('student')[0].innerHTML = studentsHTML;
}
</script>