<?php
include "_functions.php";
include "_config.php";
ob_start("callback");
?>
<?php 
	include dirname(__FILE__).'/'."templates/_head.php";
?>

<body id="body" 
	onbeforeunload="
		document.getElementById('load').checked='true';
	" 
	onload="
		onLoad();
	"
>
<input type="checkbox" id="aside_dis">
<input type="checkbox" id="load" checked="true">
	<?php 
		include dirname(__FILE__).'/'."templates/_header.php";
	?>
	<div class="main">
	<?php
		header("Cache-Control:public, max-age=86400");
		header('Content-Type: text/html; charset=utf-8');
		
		if(isset($_GET["param"])){
			$param = $_GET["param"];
		}else{
			$param = '';
		}

		$param = trim($param, '/');
		$param = rtrim($param, '/');
		$param = str_replace(array('/', '.'), '-', $param);
		if($param==''){
			$param='index';
		}

		if(file_exists(strtolower(dirname(__FILE__).'/pages/pages/'.$param.'.php'))){
			$url = strtolower(dirname(__FILE__).'/pages/pages/'.$param.'.php');

		}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/special/'.$param.'.php'))){
			$url = strtolower(dirname(__FILE__).'/pages/special/'.$param.'.php');

		}elseif(file_exists(strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php'))){
			$url = strtolower(dirname(__FILE__).'/pages/error/'.$param.'.php');
			http_response_code($param);

		}else{
			$url = strtolower(dirname(__FILE__).'/pages/error/404.php');
			http_response_code(404);

		}
			ob_start(function($content){$GLOBALS['innerHTML'] = $content;});
				include($url);
			ob_end_flush();
		echo '<h1>'.$title.'</h1>';
		echo $innerHTML;
	?>
		<noscript><meta http-equiv="refresh" content="0; url=http://<?=SERVER_NAME;?>/badbrowser"></noscript>
		<script>setTimeout(function(){if(document.getElementById('load')){document.getElementById('load').checked=''}},250);</script>
	</div>
	<div class="footer">
		<?php 
			include dirname(__FILE__).'/'."templates/_footer.php";
		 ?>
	</div>
</body>
<head>
	<?php
		echo "<title>".$title."</title>";
		include dirname(__FILE__).'/'."templates/_head2footer.php";
		include dirname(__FILE__).'/'."templates/_tags.php"; 
		include dirname(__FILE__).'/'."templates/_ga.php";
		include dirname(__FILE__).'/'."log.php";
	?>
</head>

<?php ob_end_flush();?>