<?php
include "_functions.php";
include "_config.php";
set_time_limit(0);
$group = 20131;
$students = db_get("students", ["Login"], ["Class" => $group]);

foreach($students as $student){
	//print_r(db_get("marks", ["Date", "Time", "LastEdit", "Subject",  "Student", "Teacher", "Mark", "Info"], ["Student" => $student["Login"]]));
}
$all_marks = db_get("marks", ["Date", "Time", "LastEdit", "Subject",  "Student", "Teacher", "Mark", "Info"], ["Class"=>$group]);
$dates = [];
foreach($all_marks as $a){
	if(!in_array($a["Date"], $dates)){
		$dates[] = $a["Date"];
	}
}
?>

<table border=1>
	<tr>
		<td>User</td>
		<?
		foreach ($dates as $d){
			echo "<td>$d</td>";
		}
		?>
	</tr>

	<?
	foreach ($students as $s){
		echo "<tr>";
		echo "<td>".$s["Login"]."</td>";
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