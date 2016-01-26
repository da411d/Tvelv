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
			<th>Група
				<br>
				<select size="1" name="Class" onchange="onChange(this)" value="<?=$_POST['class'];?>">
					<option value="false"disabled selected>Оберіть параметр</option>
					<option value="11">Л-11</option>
					<option value="12">Л-12</option>
					<option value="13">Л-13</option>
					<option value="21">Л-21</option>
					<option value="22">Л-22</option>
					<option value="23">Л-23</option>
					<option value="31">Л-31</option>
					<option value="32">Л-32</option>
					<option value="33">Л-33</option>
				</select>
			</th>
			<th>Ліцеїст
				<br>
				<?
					$arr = getUserByList('student');
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					echo '<select size="1" name="Student" onchange="onChange(this)">';
					echo '<option value="false"selected>';
					if($_POST['Student'] AND $_POST['Student']!='false'){
						echo "Очистити";
					}else{
						echo "Оберіть параметр";
					}
					echo '</option>';

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
					echo '<option value="false"selected>';
					if($_POST['Teacher'] AND $_POST['Teacher']!='false'){
						echo "Очистити";
					}else{
						echo "Оберіть параметр";
					}
					echo '</option>';

					foreach($arr as $a){
						if($a['Login']==$_POST['Teacher']){$selected='selected';}else{$selected='';}
						echo '<option value="'.$a['Login'].'"'.$selected.'>'.$a['SecondName'].' '.$a['Name'].'</option>';
					}
					echo '</select>';
				?>
			</th>

			<th>Оцінка
				<br>
				<input type="text" name="Mark" placeholder="mark" onchange="onChange(this)" value="<?=$_POST['Mark'];?>" required>
			</th>

			<th>Коментар</th>
		</form>
			<?
				$arrOfParams = [];

				if($_POST['Date']){$arrOfParams['Date[=]'] = $_POST['Date'];}
				if($_POST['Class']){$arrOfParams['Class[=]'] = $_POST['Class'];}
				if($_POST['Student'] AND $_POST['Student']!='false'){$arrOfParams['Student[=]'] = $_POST['Student'];}
				if($_POST['Teacher'] AND $_POST['Teacher']!='false'){$arrOfParams['Teacher[=]'] = $_POST['Teacher'];}
				if($_POST['Mark']){$arrOfParams['Mark[=]'] = $_POST['Mark'];}
				$arr = getMarksByParams($arrOfParams);
				if(!$arr){$arr=[];}
				usort($arr, function($a, $b){
					$t1 = strtotime($a['Date'].' '.$a['Time']);
					$t2 = strtotime($b['Date'].' '.$b['Time']);
					return $t2 - $t1;
				});
				foreach ($arr as $a){
					$time = explode('-', $a['Date']);
					echo "<tr><td>".$time[2].'/'.$time[1].'/'.$time[0].", ".rtrim($a['Time'], ':00').
					"<td>Л-".$a['Class'].
					"<td><a href=\"viewprofile?_=".$a['Student']."\">".getInfoAboutUser($a['Student'])['Name'].' '.getInfoAboutUser($a['Student'])['SecondName']."</a>".
					"<td><a href=\"viewprofile?_=".$a['Student']."\">".getInfoAboutUser($a['Teacher'])['Name'].' '.getInfoAboutUser($a['Teacher'])['SecondName']."</a>".
					"<td width=\"5em\">".$a['Mark'].
					"<td>".$a['Info'];
				}
			?>
		</th>
	</tr>


	<tr align="center" style="<?if (!isTeacher()){echo 'display:none;';}?>">
		<td colspan="6">Додати Оцінку<?
				if($_POST['date'] AND $_POST['class'] AND $_POST['student'] AND $_POST['teacher'] AND $_POST['mark'] AND $_POST['teacher']==getLoginedUsername()){
					echo addMark($_POST['date'], $_POST['class'], $_POST['student'], $_POST['teacher'], $_POST['mark'], $_POST['info']);
				}?></td>
	</tr>
	<tr undefined="add mark" style="<?if (!isTeacher()){echo 'display:none;';}?>">
		<form method="post" <?if (!isTeacher()) {echo 'style="display:none;"';}?>>
			<th>
				<input type="date" name="date" value="<?=date(" Y-m-d ");?>" required>
			</th>
			<th>
				<select size="1" name="class" required>
					<option disabled selected>Оберіть параметр</option>
					<option value="11">Л-11</option>
					<option value="12">Л-12</option>
					<option value="13">Л-13</option>
					<option value="21">Л-21</option>
					<option value="22">Л-22</option>
					<option value="23">Л-23</option>
					<option value="31">Л-31</option>
					<option value="32">Л-32</option>
					<option value="33">Л-33</option>
				</select>
			</th>
			<th>
				<?
					$arr = getUserByList('student');
					usort($arr, function($a, $b){return strnatcmp($a['SecondName'], $b['SecondName']);});
					echo '<select size="1" name="student">';
					echo '<option value="false"selected>Оберіть параметр</option>';

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
				<input type="text" name="mark" placeholder="mark" required>
			</th>
			<th>
				<input type="text" name="info" placeholder="Коментар">
			</th>
		<tr colspan="6" <?if (!isTeacher()) {echo 'style="display:none;"';}?>>
			<td colspan="6">
				<input type="submit" value="Додати" style="width:100%;">
			</td>
		</tr>
	</form>
</table>