<?$title = "Admin menu";

if(!in_array(getLoginedUsername(), json_decode(ADMIN_ID))){
	header('Location: /403');
	exit();
}
?>