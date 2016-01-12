<script src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" />
<base href="http://<?=$_SERVER['SERVER_NAME'];?>/#">
<body onload="onLoad()" onhashchange="onHashChange()">

<div class="header">
	<span class="h1" id="header">Tvelv</span>
	<nav>
		<a href="#profile">Профіль</a>
		<a href="#marks">Оцінки</a>
		<a href="#stats">Статистика</a>
		<a href="#settings">Налаштування</a>
		<a href="#logout">Вихід</a>

	</nav>

</div>
<div class="main" id="main">