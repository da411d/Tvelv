<?
	error_reporting(0);
	if(is_mobile()){
		echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">';
	}else{
		echo '<!DOCTYPE html>';
	}
?>
<head>
	<?php
		include dirname(__FILE__)."/_head.php";
		echo "<title>Зачекайте...</title>";
	?>
</head>
<body id="body" onload="Load()" onhashchange="Load()">
<div class="bg_wrapper"></div>
	<?php 
		include dirname(__FILE__)."/_header.php";
	?>
	<div class="main" id="main" style="opacity:0">
	</div>
</body>