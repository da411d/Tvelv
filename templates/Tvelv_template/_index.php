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
<body id="body" onload="onLoad()" onhashchange="onHashChange()"
	onbeforeunload="
		document.getElementById('onscroll').checked='true';
		document.getElementById('load').checked='true';
	"  
	onscroll="
		if(document.getElementById('onscroll')){
			if(getScrollTop()<48){
				document.getElementById('onscroll').checked='true'
			}else{
				document.getElementById('onscroll').checked=false
			}
		}
	"
>
<input type="checkbox" id="load">
<input type="checkbox" id="onscroll" checked="true">
<div class="bg_wrapper"></div>
	<?php 
		include dirname(__FILE__)."/_header.php";
	?>
	<div class="main" id="main">
		<noscript><meta http-equiv="refresh" content="0; url=http://<?=SERVER_NAME;?>/badbrowser"></noscript>
		<script>setTimeout(function(){if(document.getElementById('load')){document.getElementById('load').checked=''}},250);</script>
	</div>
	<div class="footer">
		<?php 
			include dirname(__FILE__)."/_footer.php";
		 ?>
	</div>
</body>