<?
	if(isset($_GET["param"])){
		$widgeturl= $_GET["param"];
	}else{
		$widgeturl= '';
	}
	if(IS_DEV){
		$isdevcommentstring = '&IS_DEV=1';
	}else{
		$isdevcommentstring = '';
	}
	$widgeturl = 'http://blastorq.pp.ua/site/modules/comments.php?u='.$widgeturl.$isdevcommentstring;
?>
<div align="center" class="comments_wrapper">
	<a href="<?=$widgeturl;?>&ismobile=true" target="_blank">Коментуй&nbsp;тут&nbsp;<img src="http://blastorq.pp.ua/site/images/emoji/D83DDCAC.png" class="emoji" alt="💬"></a>
	<?
		if(!is_mobile()){
			echo '<iframe src="'.$widgeturl.'"  frameborder class="vkcomments"></iframe>';
		}
	?>
</div>