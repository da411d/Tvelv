<?$title = "Admin menu";

if(!in_array(getLoginedUsername(), json_decode(ADMIN_ID))){
	header('Location: /403');
	exit();
}
?>
<p><a href="/admin/register">Реєстрація</a></p>
<p><a href="/admin/import">Імпорт користувачів</a></p>