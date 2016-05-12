<?$title="Журнал";?>
<?$eval = "
	var elements = document.getElementsByClassName('doublescrollbar');
	for (var i = 0; i < elements.length; i++) {
		DoubleScroll(elements[i]);
	}";
?>
<link rel="stylesheet" type="text/css" href="http://tvelv/assets/css/style.css?f=viewmarks" async="async">
<style>

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

<?php
$students = db_get("students", ["Login", "Name", "SecondName"], ["Class"=>$class]);
$all_marks = db_get("marks", ["Date", "Time", "LastEdit", "Subject",  "Student", "Teacher", "Mark", "Info"], ["AND" => ["Class" => $class, "Subject" => $subject]]);
$dates = [];
foreach($all_marks as $a){
	if(!in_array($a["Date"], $dates)){
		$dates[] = $a["Date"];
	}
}
function mj_getdate($d){
	$d = explode("-", $d);
	return $d[2]."/".$d[1];
}
?>
<a onclick="window.location.hash = (window.location.hash+'?').substring(0, (window.location.hash+'?').indexOf('?'))" class="btn" style="width:auto;padding:8px;background:#004184"><img src="/assets/images/icons/keyboard-backspace.svg" class="icon">Назад</a>
<div class="doublescrollbar">
<table border=1>
	<tr>
		<td>№</td>
		<td>Учень</td>
		<?
		foreach ($dates as $d){
			echo "<td>".mj_getdate($d)."</td>";
		}
		?>
	</tr>

	<?
	$num=0;
	foreach ($students as $s){
		echo "<tr>";
		
		echo "<td>".++$num."</td>";
		echo "<td>".$s["SecondName"]." ".$s["Name"]."</td>";
		foreach($dates as $d){
			echo "<td>";
			$m = db_get(
					"marks", 
					["Date", "Time", "LastEdit", "Subject",  "Student", "Teacher", "Mark", "Info"], 
					["AND" => 
						["Date[=]"=>$d, "Student[=]"=>$s["Login"]]
					]
				);
			if(count($m)==1){
				echo $m[0]["Mark"];
			}else{
				$ms = '';
				foreach($m as $mm){
					$ms .= $mm["Mark"].", ";
				}
				$ms = rtrim($ms, ", ");
				echo $ms;
			}
			echo "</td>";
		}
		echo "</tr>";
	}
?>
</table>
</div>