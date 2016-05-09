<?$title="Лістинг";?>
<style>
	body{font-size:16px;}
	.main{width:90%;padding:0px;}
	table{width: 100%;border-collapse:collapse;background:#3F9DFF;font-size:83%;}
	table, table tr, table td, table th{border: 2px solid;}
	table tr, table td, table th{max-width:20%;}
	@media (max-width: 480px){
		table *{display:none;}
		table::before{content:'Таблиця не доступна на таких маленьких екранах.';display:block;padding:8px;}
	}
	
	tr:nth-child(2n) {
		background-color: #74B8FF;
		border-color: #047DFC;
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
	function clearMe(e){
		document.getElementsByName(e.id)[0].value = "";
		onChange(document.getElementsByName(e.id)[0]);
	}
</script>


<table>
	<tr>
		<td colspan="7">
			<a href="?#" class="btn" style="width:auto;padding:8px;background:#004184"><img src="/assets/images/icons/filter-remove.svg" class="icon">Очистити всі фільтри</a>
		</td>
	</tr>
	<form method="get" id="params">
		<tr>
			<th>Дата
				<a onclick="clearMe(this)" id="date"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<input type="date" name="date"onblur="onChange(this)" value="<?if($_GET['date'])echo $_GET['date'];else echo"Дата";?>" required>
			</th>
			<th>Предмет
				<a onclick="clearMe(this)" id="subject"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<select size="1" name="subject" onchange="onChange(this)">
				<?
					$arr = getAllSubjects();
					usort($arr, function($a, $b){return strnatcmp($a['SubjectCaption'], $b['SubjectCaption']);});
					if($_GET['subject'] AND $_GET['subject']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['SubjectName']==$_GET['subject']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['SubjectName'].'" '.$selected.'>'.$a['SubjectCaption'].'</option>';
					}
				?>
				</select>
			</th>
			<th>Група
				<a onclick="clearMe(this)" id="class"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<select size="1" name="class" onchange="onChange(this)" value="<?=$_GET['class'];?>">
					<?php
					$arr = getAllClasses();
					if($_GET['class'] AND $_GET['class']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}
					foreach($arr as $a){
						if($a['ClassName']==$_GET['class']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['ClassName'].'"'.$selected.'>'.$a['ClassCaption'].'</option>';
					}
					?>
				</select>
			</th>
			<th>Ліцеїст
				<a onclick="clearMe(this)" id="student"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<select size="1" name="student" onchange="onChange(this)">
				<?
					if($_GET['class']){
						$arr = getUsersByClass($_GET['class']);
					}else{
						$arr = getUserByList('student');
					}
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					if($_GET['student'] AND $_GET['student']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['Login']==$_GET['student']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
					echo '</select>';
				?>
			</th>

			<th>Вчитель
				<a onclick="clearMe(this)" id="teacher"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<select size="1" name="teacher" onchange="onChange(this)">
				<?
					$arr = getUserByList('teacher');
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					if($_GET['teacher'] AND $_GET['teacher']!=''){
						echo '<option selected value="">Очистити</option>';
					}else{
						echo '<option value="false"selected disabled>Оберіть</option>';
					}

					foreach($arr as $a){
						if($a['Login']==$_GET['teacher']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
				?>
			</select>
			</th>

			<th>Оцінка
				<a onclick="clearMe(this)" id="mark"><img src="/assets/images/icons/close-circle.svg" class="icon" alt="Очистити фільтр"></a>
				<br>
				<input  type="number" name="mark" size="2" max="13" min="1"onchange="this.style.background=['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'][parseInt(this.value)-1]" onblur="onChange(this)" style="color:#fafafa;background:<?
				if($_GET['mark']){
					$arr = ['#CB2237', '#DC3338', '#EA4438', '#F25437', '#E46538', '#D37738', '#C58837', '#B59936', '#A7AC38', '#97BA38', '#88CC37', '#7ADC37', '#7ADC37'];
					echo $arr[$_GET['mark']];}else{echo "#7ADC37";}
				?>;" value="<?=$_GET['mark'];?>">
			</th>

			<th>Коментар</th>
		</form>
			<?

				$arrOfParams = [];

				if($_GET['date'] AND $_GET['date']!='')		{$arrOfParams['Date'] = $_GET['date'];}
				if($_GET['subject'] AND $_GET['subject']!='')	{$arrOfParams['Subject'] = $_GET['subject'];}
				if($_GET['class'] AND $_GET['class']!='')		{$arrOfParams['Class'] = $_GET['class'];}
				if($_GET['student'] AND $_GET['student']!='')	{$arrOfParams['Student'] = $_GET['student'];}
				if($_GET['teacher'] AND $_GET['teacher']!='')	{$arrOfParams['Teacher'] = $_GET['teacher'];}
				if($_GET['mark'] AND $_GET['mark']!='')		{$arrOfParams['Mark'] = $_GET['mark'];}
				if(count($arrOfParams)==0){
					$arr = getMarksByParams([]);
				}elseif(count($arrOfParams)==1){
					$arr = getMarksByParams($arrOfParams);
				}else{
					$arr = getMarksByParams(['AND' => $arrOfParams]);
				}
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
					"<td>".getClassName($a['Class']).
					"<td><a href=\"/#viewprofile?_=".$a['Student']."\">".getInfoAboutUser($a['Student'])['Name'].' '.getInfoAboutUser($a['Student'])['SecondName']."</a>".
					"<td><a href=\"/#viewprofile?_=".$a['Teacher']."\">".getInfoAboutUser($a['Teacher'])['Name'].' '.getInfoAboutUser($a['Teacher'])['SecondName']."</a>".
					"<td>".$a['Mark'].
					"<td style=\"max-width:12em\">".str_replace("\r\n", "<br>", $a['Info']);
				}
			?>
		</th>
	</tr>
</table>