<div class="header">
	<div class="displayer" onclick="if(document.getElementById('aside_dis')){document.getElementById('aside_dis').click()}">
		<img src="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/images/%E2%89%A1.png" alt="≡">
	</div>
	<span class="h1">Tvelv</span>
	<nav id="nav">
		<a href="/profile" class="profiletop"><img src="/assets/images/icons/account.svg" class="icon">Профіль</a><a href="/marks" class="markstop"><img src="/assets/images/icons/book-open.svg" class="icon">Оцінки</a><a href="/stats" class="statstop"><img src="/assets/images/icons/chart-line.svg" class="icon">Статистика</a><a href="/settings" class="settingstop"><img src="/assets/images/icons/settings.svg" class="icon">Налаштування</a><a href="/logout?Hi_What_are_you_looking_for=<?=sha1(getPasswordSalt($code['a']));?>&rnd<?=rand(10000000,99999999);?>" class="logouttop"><img src="/assets/images/icons/logout.svg" class="icon">Вихід</a>
	</nav>
</div>
<div class="aside">
	<nav>
		<a class="link" href="/profile"><img src="/assets/images/icons/account.svg" class="icon">Профіль</a>
		<a class="link" href="/marks"><img src="/assets/images/icons/book-open.svg" class="icon">Оцінки</a>
		<a class="link" href="/stats"><img src="/assets/images/icons/chart-line.svg" class="icon">Статистика</a>
		<a class="link" href="/settings"><img src="/assets/images/icons/settings.svg" class="icon">Налаштування</a>
		<a class="link" href="/logout?Hi_What_are_you_looking_for=<?=sha1(getPasswordSalt($code['a']));?>&rnd<?=rand(10000000,99999999);?>"><img src="/assets/images/icons/logout.svg" class="icon">Вихід</a>
	</nav>
</div>