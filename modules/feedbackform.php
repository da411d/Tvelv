<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html manifest="http://blastorq.pp.ua/default.appcache" lang="ua">
<?php
	header('Content-Type: text/html; charset=utf-8');
?>
<link rel="stylesheet" type="text/css" href="http://blastorq.pp.ua/site/assets/css/style.css" async="async" />
<link rel="shortcut icon" href="http://blastorq.pp.ua/site/assets/images/logo-small-blue.svg">
<link rel="shortcut icon" href="http://blastorq.pp.ua/site/assets/images/logo.ico">
<link rel="apple-touch-icon" href="http://blastorq.pp.ua/site/assets/images/logo-small-blue.svg">
<meta itemprop="image" content="http://blastorq.pp.ua/site/assets/images/logo-small-blue.svg">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="True">

<body id="body">
<input type="checkbox" id="onscroll" checked="true">
  <div class="header">
    <div class="displayer" onclick="window.open('http://blastorq.pp.ua/');window.close(this)"><img src="http://blastorq.pp.ua/site/assets/images/%E2%89%A1.png" alt="≡"></div>
   <span class="h1" data-text="Blast.ORQ" onclick="this.classList.add('glitch');return false;" oncontextmenu="window.location='http://blastorq.pp.ua/snowfall';return false;">Blast.ORQ</span>
  </div>
  <div class="aside">
    <nav><a class="link" href="/">Головна</a><a class="link" href="/about">Про мене</a><a class="link" href="/production">Роботи</a><a class="link" href="/feedback">Зворотній зв'язок</a></nav>
  </div>
  <div class="main">
	<h1>Зворотній зв'язок</h1>
		<form method="post" action="http://blastorq.pp.ua/site/modules/send.php">
			<p>
				Ваш e-mail: 
			</p>
			<p>
				<input type="text" name="from">
			</p>
			<p>
				Заголовок: 
			</p>
			<p>
				<input type="text" name="title">
			</p>
			<p>
				Текст повідомлення: 
			</p>
			<p>
				<textarea rows="5" type="text" name="text"></textarea>
			</p>
			<p>
				Ну, і капчу введи
			</p>
			<script src="http://app.blastorq.pp.ua/AllCaptcha/api.js"></script>
			 
			<div id="AllCaptcha" style="max-width:100%;">
				<script type="text/javascript">
					AllCaptcha('AllCaptcha');
				</script>
			</div>
			<p>
				<input type="hidden" name="window" value="true">
				<input type="submit" value="Надіслати!">
			</p>
		</form>
  </div>
</body>

<head>
  <title>Зворотній зв'язок | Blast.ORQ</title>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-39668904-3', 'auto');ga('send', 'pageview');
  </script>
</head>