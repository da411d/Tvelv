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

/*foreach ($dates as $d){
	echo "-----$d-----";
	foreach($students as $s){
		print_r(
			db_get(
				"marks", 
				["Date", "Time", "LastEdit", "Subject",  "Student", "Teacher", "Mark", "Info"], 
				["AND" => 
					["Date[=]"=>$d, "Student[=]"=>$s["Login"]]
				]
			)
		);
	}
		echo "\r\n\r\n\r\n\r\n\r\n";
}
*/
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
			echo $m[0]["Mark"];
			echo "</td>";
		}
		echo "</tr>";
	}
?>