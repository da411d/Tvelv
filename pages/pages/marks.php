<?$title="Оцінки";?>

<div class="card cw2" onmousedown="CClick(this, event)">
	<div class="img-placeholder">
		<img src="/assets/images/12.png">
	</div>
	<a class="link" href="/#marks/listing">Лістинг</a>
	Тут можна переглянути всі оцінки, відфільтрувати по даті, предмету, учню, вчителю або оцінці.
</div>
<?if(isTeacher()){?>
<div class="card cw2" onmousedown="CClick(this, event)">
	<div class="img-placeholder">
		<img src="/assets/images/red-pen.png">
	</div>
	<a class="link" href="/#marks/mark">Поставити оцінку</a>
	Тут можна поставити оцінку учню.
</div>
<?}?>