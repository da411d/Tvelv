<?php
include "_functions.php";
include "_config.php";
$count = 0;
for ($i=1;$i<=360;$i++){
	if(360%$i==0){
		echo $i." \r\n";
		$count++; 
	}
}
echo "\r\n Дільників: ".$count;