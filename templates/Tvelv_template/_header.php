<div id="loader"></div>
<div class="header" id="header">
	<span class="h1" id="title">Tvelv</span>
	<nav id="nav">
		<a href="/#profile" class="profiletop"><img src="/assets/images/icons/account.svg" class="icon">Профіль</a>
		<a href="/#marks" class="markstop"><img src="/assets/images/icons/book-open.svg" class="icon">Оцінки</a>
		<a href="/#settings" class="settingstop"><img src="/assets/images/icons/settings.svg" class="icon">Налаштування</a>
		<a href="/#logout?Hi_What_are_you_looking_for=<?=sha1(login::getPasswordSalt($code['a']));?>&rnd<?=rand(10000000,99999999);?>" class="logouttop"><img src="/assets/images/icons/logout.svg" class="icon">Вихід</a>
	</nav>
</div>