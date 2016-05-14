<?$title="Оцінки";?>
<?
$cnt = user::isTeacher()?3:2;
?>
<?if(user::isTeacher()){?>
<div class="card cw<?=$cnt;?>" onmousedown="CClick(this, event)">
	<div class="img-placeholder">
		<img src="/assets/images/red-pen.png">
	</div>
	<a class="link" href="/#marks/mark">Поставити оцінку</a>
	Тут можна поставити оцінку учню.
</div>
<?}?>
<div class="card cw<?=$cnt;?>" onmousedown="CClick(this, event)">
	<div class="img-placeholder">
		<img src="/assets/images/12.png">
	</div>
	<a class="link" href="/#marks/listing">Лістинг</a>
	Тут можна переглянути всі оцінки, відфільтрувати по даті, предмету, учню, вчителю або оцінці.
</div>
<div class="card cw<?=$cnt;?>" onmousedown="CClick(this, event)">
	<div class="img-placeholder">
		<img src="/assets/images/journal.jpg">
	</div>
	<a class="link" href="/#marks/journal">Журнал</a>
	Тут оцінки як в журналі
</div>