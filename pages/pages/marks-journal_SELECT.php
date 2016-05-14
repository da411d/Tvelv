<?$title="Оберіть клас і предмет";?>
	<div class="card cw1">
		<p>
			<select size="1" id="class">
			<?php
				$arr = classes::getAllClasses();
				foreach($arr as $a){
					echo '<option value="'.$a['ClassName'].'"'.$selected.'>'.$a['ClassCaption'].'</option>';
				}
			?>
			</select>
			<select size="1" id="subject">
			<?
				$arr = marks::getAllSubjects();
				echo '';
				foreach($arr as $a){
					$selected = $subject&&$a['SubjectName']==$subject?"selected":"";
					echo '<option value="'.$a['SubjectName'].'" '.$selected.'>'.$a['SubjectCaption'].'</option>';
				}
				echo '</select>';
			?>
		<p>
	<input type="submit" onclick="window.location.hash = (window.location.hash+'?').substring(0, (window.location.hash+'?').indexOf('?'))+'?_='+document.getElementById('class').value+'$'+document.getElementById('subject').value">
	</div>