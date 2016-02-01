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
		include dirname(__FILE__)."/_tags.php"; 
		include dirname(__FILE__)."/_ga.php";
		echo "<title>".$title." | Tvelv</title>";
	?>
</head>
<body id="body" 
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
<input type="checkbox" id="aside_dis">
<input type="checkbox" id="load" checked="true">
<input type="checkbox" id="onscroll" checked="true">
	<?php 
		include dirname(__FILE__)."/_header.php";
	?>
	<div class="main">
	<?php
		echo '<h1>'.$title.'</h1>';
		echo $innerHTML;
	?>
		<noscript><meta http-equiv="refresh" content="0; url=http://<?=SERVER_NAME;?>/badbrowser"></noscript>
		<script>setTimeout(function(){if(document.getElementById('load')){document.getElementById('load').checked=''}},250);</script>
	</div>
	<div class="footer">
		<?php 
			include dirname(__FILE__)."/_footer.php";
		 ?>
	</div>
	<?php 
		include dirname(__FILE__)."/_share.php";
	 ?>
</body>