<script src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" />
<base href="http://<?=$_SERVER['SERVER_NAME'];?>/#">
<body onload="onLoad()" onhashchange="onHashChange()">

<div class="header">
	<span class="h1" id="header">Tvelv</span>
	<nav id="navbar">
		<a href="#profile"><img src="/images/icons/account.svg" class="icon">Профіль</a>
		<a href="#marks"><img src="/images/icons/book-open.svg" class="icon">Оцінки</a>
		<a href="#stats"><img src="/images/icons/chart-line.svg" class="icon">Статистика</a>
		<a href="#settings"><img src="/images/icons/settings.svg" class="icon">Налаштування</a>
		<a href="#logout"><img src="/images/icons/logout.svg" class="icon">Вихід</a>

	</nav>

</div>
<div class="main" id="main">
</div>