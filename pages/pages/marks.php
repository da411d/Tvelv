<?$title="Оцінки";?>
<style>
	table{width: 100%;border-collapse:collapse;border-color:#9E9E9E;background:#3F9DFF;font-size:83%;}
	table, table tr, table td, table th{border: 2px solid #9E9E9E;}
	table tr, table td, table th{max-width:20%;}
	@media (max-width: 480px){
		table *{display:none;}
		table::before{content:'Таблиця не доступна на таких маленьких екранах.';display:block;padding:8px;}
	}
	
	tr:nth-child(2n) {
		background-color: #74B8FF;
	}
	tr:hover{
		background-color: #047DFC;
	}
	input, textarea, select{
		padding:4px;
		border:0px solid transparent;
		background:#fafafa;
		border-radius:0px;
	}
	label{font-size:120%;width:80%;}
	input, textarea,select {
		font-size: 80%!important;
	}
</style>
<script>
	function onChange(e){
		document.getElementById('params').submit();
	}
</script>


<table>
	<form method="post" id="params">
		<tr>
			<th>Дата
				<br>
				<input type="date" name="Date"onblur="onChange(this)" value="<?if($_POST['Date'])echo $_POST['Date'];else echo"Дата";?>" required>
			</th>
			<th>Предмет
				<br>
				<?
					$arr = getAllSubjects();
					usort($arr, function($a, $b){return strnatcmp($a['SubjectCaption'], $b['SubjectCaption']);});
					echo '<select size="1" name="Subject" onchange="onChange(this)">';
					if($_POST['Subject'] AND $_POST['Subject']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['SubjectName']==$_POST['Subject']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['SubjectName'].'" '.$selected.'>'.$a['SubjectCaption'].'</option>';
					}
					echo '</select>';
				?>
			</th>
			<th>Група
				<br>
				<select size="1" name="Class" onchange="onChange(this)" value="<?=$_POST['Class'];?>">
					<?php
					$arr = getAllClasses();
					if($_POST['Class'] AND $_POST['Class']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}
					foreach($arr as $a){
						if($a['ClassName']==$_POST['Class']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['ClassName'].'"'.$selected.'>'.$a['ClassCaption'].'</option>';
					}
					?>
				</select>
			</th>
			<th>Ліцеїст
				<br>
				<?
					if($_POST['Class']){
						$arr = getUsersByClass($_POST['Class']);
					}else{
						$arr = getUserByList('student');
					}
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					echo '<select size="1" name="Student" onchange="onChange(this)">';
					if($_POST['Student'] AND $_POST['Student']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['Login']==$_POST['Student']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
					echo '</select>';
				?>
			</th>

			<th>Вчитель
				<br>
				<?
					$arr = getUserByList('teacher');
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					echo '<select size="1" name="Teacher" onchange="onChange(this)">';
					if($_POST['Teacher'] AND $_POST['Teacher']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['Login']==$_POST['Teacher']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
					echo '</select>';
				?>
			</th>

			<th>Оцінка
				<br>
				<input  type="number" name="Mark" size="2" max="13" min="1"onchange="this.style.background=['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'][parseInt(this.value)-1]" onblur="onChange(this)" style="color:#fafafa;background:<?
				if($_POST['Mark']){
					$arr = ['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'];
					echo $arr[$_POST['Mark']];}else{echo "#bfbfbf";}
				?>;" value="<?=$_POST['Mark'];?>">
			</th>

			<th>Коментар</th>
		</form>
			<?

				$arrOfParams = [];

				if($_POST['Date']){$arrOfParams['Date'] = $_POST['Date'];}
				if($_POST['Subject'] AND $_POST['Subject']!=''){$arrOfParams['Subject'] = $_POST['Subject'];}
				if($_POST['Class']){$arrOfParams['Class'] = $_POST['Class'];}
				if($_POST['Student'] AND $_POST['Student']!=''){$arrOfParams['Student'] = $_POST['Student'];}
				if($_POST['Teacher'] AND $_POST['Teacher']!=''){$arrOfParams['Teacher'] = $_POST['Teacher'];}
				if($_POST['Mark']){$arrOfParams['Mark'] = $_POST['Mark'];}
				$arr = getMarksByParams(['AND' => $arrOfParams]);
				if(!$arr){$arr=[];}
				usort($arr, function($a, $b){
					$t1 = strtotime($a['Date'].' '.$a['Time']);
					$t2 = strtotime($b['Date'].' '.$b['Time']);
					return $t2 - $t1;
				});
				foreach ($arr as $a){
					$time = explode('-', $a['Date']);
					echo "<tr><td>".$time[2].'/'.$time[1].'/'.$time[0].", ".rtrim($a['Time'], ':00').
					"<td>".getSubjectName($a['Subject']).
					"<td>Л-".$a['Class'].
					"<td><a href=\"viewprofile?_=".$a['Student']."\">".getInfoAboutUser($a['Student'])['Name'].' '.getInfoAboutUser($a['Student'])['SecondName']."</a>".
					"<td><a href=\"viewprofile?_=".$a['Teacher']."\">".getInfoAboutUser($a['Teacher'])['Name'].' '.getInfoAboutUser($a['Teacher'])['SecondName']."</a>".
					"<td width=\"5em\">".$a['Mark'].
					"<td>".$a['Info'];
				}
			?>
		</th>
	</tr>


	<tr align="center" style="<?if (!isTeacher()){echo 'display:none;';}?>">
		<td colspan="7">Додати Оцінку<?
				if($_POST['subject'] AND $_POST['class'] AND $_POST['student'] AND $_POST['teacher'] AND $_POST['mark'] AND $_POST['teacher']==getLoginedUsername()){
					echo addMark($_POST['subject'], $_POST['class'], $_POST['student'], $_POST['teacher'], $_POST['mark'], $_POST['info']);
				}?></td>
	</tr>
	<tr undefined="add mark" style="<?if (!isTeacher()){echo 'display:none;';}?>">
		<form method="post" <?if (!isTeacher()) {echo 'style="display:none;"';}?>>
			<th>
				<input type="date" name="date" value="<?=date("Y-m-d");?>" disabled required>
			</th>
			<th><?
					$arr = getSubjectPermission();
					usort($arr, function($a, $b){return strnatcmp($a['SubjectCaption'], $b['SubjectCaption']);});
					echo '<select size="1" name="subject" required>';
					foreach($arr as $a){
						if($a['SubjectName']==$_POST['Subject']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a.'" '.$selected.'>'.getSubjectName($a).'</option>';
					}
					echo '</select>';
				?>
			</th>
			<th><select size="1" name="class" value="<?=$_POST['Class'];?>" required>
					<?php
					$arr = getAllClasses();
					foreach($arr as $a){
						if($a['ClassName']==$_POST['Class']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['ClassName'].'"'.$selected.'>'.$a['ClassCaption'].'</option>';
					}
					?>
				</select>
			</th>
			<th>
				<?
					$arr = getUserByList('student');
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					echo '<select size="1" name="student"required>';
					echo '<option value="false"selected>Оберіть</option>';

					foreach($arr as $a){
						if($a['Login']==$_POST['Student']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
					echo '</select>';
				?>
			</th>
			<th>
				<?
					if(isTeacher()){
						$login = getLoginedUsername();
					}
					echo '<input type="hidden" name="teacher" value="'.$login.'"required><input value="'.$login.'"required readonly>';
				?>
			</th>
			<th>
				<input  type="number" name="mark"size="2" max="13" min="1"onchange="this.style.background=['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'][parseInt(this.value)-1]" style="color:#fafafa;"value="12">
			</th>
			<th>
				<input type="text" name="info" placeholder="Коментар">
			</th>
		<tr colspan="7" <?if (!isTeacher()) {echo 'style="display:none;"';}?>>
			<td colspan="7">
				<input type="submit" value="Додати" style="width:100%;">
			</td>
		</tr>
	</form>
</table>