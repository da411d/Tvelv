<?$title = "Admin menu";

if(!in_array(getLoginedUsername(), json_decode(ADMIN_ID))){
	//header('Location: /403');
	exit();
}
?>
<p><a href="/#admin/register" class="btn">Реєстрація</a></p>
<p><a href="/#admin/import" class="btn">Імпорт користувачів</a></p>