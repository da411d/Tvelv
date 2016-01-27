<?
$arr = array(
	array(
		"Login"=>"vladk", 
		"Name"=>"Влад",
		"SecondName"=>"Кравченко",
		"Class"=>31,
		"Permission"=>"student"
	),
	array(
		"Login"=>"sport_buhlo",
		"Name"=>"Ігор",
		"SecondName"=>"Кеденко",
		"Class"=>31,
		"Permission"=>"student"
	),
	array(
		"Login"=>"proCopy",
		"Name"=>"Ілля",
		"SecondName"=>"Прокопчук",
		"Class"=>31,
		"Permission"=>"student"
	)
);

print_r (json_decode(file_get_contents("import.json"), 1));