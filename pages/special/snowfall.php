<?$title="Снігопадик";?>
Рахунок: <span id="cnt">0</span>
<?php
if(is_mobile()){header('Location: /badbrowser');}
?>
<style>
@-webkit-keyframes spin {
		from {
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(360deg);
				-moz-transform: rotate(360deg);
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
		}
}

@-webkit-keyframes spinback {
		from {
				-webkit-transform: rotate(360deg);
				-moztransform: rotate(360deg);
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
		}
		to {
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				transform: rotate(0deg);
		}
}
@-webkit-keyframes falldown {
		from {
				top: -10%;
		}
		to {
				top: 120%;
		}
}
@-webkit-keyframes fallbottle {
		0% {
				top: -10%;
		}
		85% {
				top: -10%;
		}
		100% {
				top: 120%;
		}
}


*{
	-moz-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
body{overflow:hidden!important;}
.main{
	height:100%!important;
	height:100vh!important;
	overflow:hidden!important;
}
.snowflake img {
    width: 45px;
}
.comments_wrapper{
	display:none;
}

.spinning {
		-webkit-animation-name: spin;
		animation-name: spin;
		-webkit-animation-duration: <?=(rand(30,60)/10);?>s;
		animation-duration: <?=(rand(30,60)/10);?>s;
		-webkit-animation-iteration-count: infinite;
		animation-iteration-count: infinite;
		-webkit-animation-timing-function: linear;
		animation-timing-function: linear;
}

.spinningback {
		-webkit-animation-name: spinback;
		animation-name: spinback;
		-webkit-animation-duration: <?=(rand(30,60)/10);?>s;
		animation-duration: <?=(rand(30,60)/10);?>s;
		-webkit-animation-iteration-count: infinite;
		animation-iteration-count: infinite;
		-webkit-animation-timing-function: linear;
		animation-timing-function: linear;
}


.snowflake {
		position: fixed;
		top: -25px;
}

.colabottle {
	position: fixed;
	width: 25px;
	top: -25px;
	-webkit-animation-name: fallbottle;
	-moz-animation-name: fallbottle;
	-o-animation-name: fallbottle;
	-ms-animation-name: fallbottle;
	animation-name: fallbottle;

	-webkit-animation-duration: <?=(rand(30, 60));?>s;
	-moz-animation-duration: <?=(rand(30, 60));?>s;
	-o-animation-duration: <?=(rand(30, 60));?>s;
	-ms-animation-duration: <?=(rand(30, 60));?>s;
	animation-duration: <?=(rand(30, 60));?>s;

  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  -o-animation-iteration-count: infinite;
  -ms-animation-iteration-count: infinite;
  animation-iteration-count: infinite;


  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  -ms-animation-timing-function: linear;
  animation-timing-function: linear;

  left: <?=rand(10,90)?>%;
 }

<?php
for($i=1;$i<10;$i++){
echo "
#s{$i}a {
  -webkit-animation-name: falldown;
  -moz-animation-name: falldown;
  -o-animation-name: falldown;
  -ms-animation-name: falldown;
  animation-name: falldown;

  -webkit-animation-duration: ".(rand(60, 100)/10)."s;
  -moz-animation-duration: ".(rand(60, 100)/10)."s;
  -o-animation-duration: ".(rand(60, 100)/10)."s;
  -ms-animation-duration: ".(rand(60, 100)/10)."s;
  animation-duration: ".(rand(60, 100)/10)."s;
  
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  -o-animation-iteration-count: infinite;
  -ms-animation-iteration-count: infinite;
  animation-iteration-count: infinite;


  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  -ms-animation-timing-function: linear;
  animation-timing-function: linear;

  left: {$i}0%;
 }
#s{$i}a img{margin-top:".(rand(0,25))."px}
#s{$i}b img{margin-bottom:".(rand(0,25))."px}
#s{$i}b {
  -webkit-animation-name: falldown;
  -moz-animation-name: falldown;
  -o-animation-name: falldown;
  -ms-animation-name: falldown;
  animation-name: falldown;

  -webkit-animation-duration: ".(rand(30, 60)/10)."s;
  -moz-animation-duration: ".(rand(30, 60)/10)."s;
  -o-animation-duration: ".(rand(30, 60)/10)."s;
  -ms-animation-duration: ".(rand(30, 60)/10)."s;
  animation-duration: ".(rand(30, 60)/10)."s;

  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  -o-animation-iteration-count: infinite;
  -ms-animation-iteration-count: infinite;
  animation-iteration-count: infinite;


  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  -ms-animation-timing-function: linear;
  animation-timing-function: linear;

  left: {$i}5%;
 }
";
}?>
</style>
<?php
for($i=1;$i<10;$i++){
	if(rand(0,1)){$s='back';}else{$s='';}
	echo '<a class="snowflake" ondragstart="return false;"id="s'.$i.'a"><img src="http://blastorq.pp.ua/site/assets/images/snow'.rand(1,9).'.svg" class="spinning'.$s.'"></a>';
	if(rand(0,1)){$s='back';}else{$s='';}
	echo '<a class="snowflake" ondragstart="return false;"id="s'.$i.'b"><img src="http://blastorq.pp.ua/site/assets/images/snow'.rand(1,9).'.svg" class="spinning'.$s.'"></a>';
}?>
<a class="colabottle" ondragstart="return false;" style="display: block;"><img src="http://blastorq.pp.ua/site/assets/images/cola-bottle.png" class="spinningback"></a>
<script>

		document.addEventListener('mousedown', function(e) {
			if(e.target.tagName=='A' && e.target.className=='snowflake'){
				e.target.style.display='none';
				setTimeout("document.getElementById('"+e.target.id+"').style.display='block'", 3000);
				document.getElementById('cnt').innerHTML=parseInt(document.getElementById('cnt').innerHTML)+1;
			}else if(e.target.tagName=='IMG' && (e.target.className=='spinning' || e.target.className=='spinningback')){
				e.target.parentElement.style.display='none';
				setTimeout("document.getElementById('"+e.target.parentElement.id+"').style.display='block'", 3000);
				document.getElementById('cnt').innerHTML=parseInt(document.getElementById('cnt').innerHTML)+1;
			};
			return false;
		});
</script>
<link rel="stylesheet" type="text/css" href="http://blastorq.pp.ua/site/assets/css/style.css?a=Y29sYXRoZW1l&c=<?=urlencode($_SERVER['REQUEST_URI']);?>" async />

<?$description="❄❄❄Лови сніжинки!!!❄❄❄";?>