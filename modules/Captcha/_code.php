<?php
include dirname(__FILE__).'/../../_config.php';
function callback($content){
	$content = str_replace(" - ","-", $content);
	$content = str_replace("	","", $content);
	$content = str_replace("	","", $content);
	$content = str_replace("\n","", $content);
	$content = str_replace("\r","", $content);
	$content = str_replace("  "," ", $content);
	return $content;
}
ob_start("callback");
?>
<?php
header('Content-Type: text/html; charset=utf-8');
?><?php
	$arr = array('Тут може бути Ваша реклама!', 'Вводь текст)', 'Ех, пробуй)', 'Тру-ля-ля', 'Що тут написано?', 'Hello World!', 'ЛАДА СЕДАН', 'БАКЛАЖАН', 'ЛАДА СЕДАН БАКЛАЖАН', 'Ой, всьо!', 'Капча 228', 'Свято наближається', '2016', 'Свято наближаєця', 'Coca-Cola', '');
	$alt = $arr[ rand(0, count($arr)-1 )];

?><body ondragstart="return false" onselectstart="return false" onblur="inputtest()" onkeydown="if(event.keyCode == 13){inputtest()};" oncontextmenu="window.open('http://blastorq.pp.ua/production/ww/captcha/<?=$name;?>Captcha');return false">
<style>
body{margin:0px;padding:0px;text-align:center;overflow:hidden;}
body*{margin:0px!important;padding:0px!important;}
input{width:calc(100%);height:20px;background: rgba(255, 255 ,255 ,0.5);font-size:18px;font-family: Arial, Helvetica, sans-serif; border: 0px solid rgba(0,0,0,0);padding-top: 0px;padding-bottom: 0px;}
img{cursor:pointer;width:100%;max-height:300px;box-shadow: 0 0 50px 7px rgba(255, 255, 255, 1) inset;background: red;font-family: Arial;letter-spacing: 1px;color: #fafafa;}
</style>
<script>
function inputtest(){
	if(document.getElementById('input').value.length>1){
		document.getElementById('image').src = '//<?=SERVER_NAME.'/'.SITEDIR;?>modules/<?=$name;?>Captcha/image?k=<?=$_GET['k'];?>&request='+document.getElementById('input').value+'&rand='+Math.floor((Math.random() * 100) + 1);
		document.getElementById('input').value=''; 
	}else{
		return false;
	}
}
function validInput(e,k){
e.value=e.value.toLowerCase();
if(k=='KL'){e.value=e.value.replace("й","q"),e.value=e.value.replace("ц","w"),e.value=e.value.replace("у","e"),e.value=e.value.replace("к","r"),e.value=e.value.replace("е","t"),e.value=e.value.replace("н","y"),e.value=e.value.replace("г","u"),e.value=e.value.replace("ш","i"),e.value=e.value.replace("щ","o"),e.value=e.value.replace("з","p"),e.value=e.value.replace("ф","a"),e.value=e.value.replace("і","s"),e.value=e.value.replace("ы","s"),e.value=e.value.replace("в","d"),e.value=e.value.replace("а","f"),e.value=e.value.replace("п","g"),e.value=e.value.replace("р","h"),e.value=e.value.replace("о","j"),e.value=e.value.replace("л","k"),e.value=e.value.replace("д","l"),e.value=e.value.replace("є","'"),e.value=e.value.replace("я","z"),e.value=e.value.replace("ч","x"),e.value=e.value.replace("с","c"),e.value=e.value.replace("м","v"),e.value=e.value.replace("и","b"),e.value=e.value.replace("т","n"),e.value=e.value.replace("ь","m"),e.value=e.value.replace("б",",");}
if(k=='LK'){e.value=e.value.replace("q","й"),e.value=e.value.replace("w","ц"),e.value=e.value.replace("e","у"),e.value=e.value.replace("r","к"),e.value=e.value.replace("t","е"),e.value=e.value.replace("y","н"),e.value=e.value.replace("u","г"),e.value=e.value.replace("i","ш"),e.value=e.value.replace("o","щ"),e.value=e.value.replace("p","з"),e.value=e.value.replace("[","х"),e.value=e.value.replace("]","ї"),e.value=e.value.replace("a","ф"),e.value=e.value.replace("s","і"),e.value=e.value.replace("d","в"),e.value=e.value.replace("f","а"),e.value=e.value.replace("g","п"),e.value=e.value.replace("h","р"),e.value=e.value.replace("j","о"),e.value=e.value.replace("k","л"),e.value=e.value.replace("l","д"),e.value=e.value.replace(";","ж"),e.value=e.value.replace("'","є"),e.value=e.value.replace("z","я"),e.value=e.value.replace("x","ч"),e.value=e.value.replace("c","с"),e.value=e.value.replace("v","м"),e.value=e.value.replace("b","и"),e.value=e.value.replace("n","т"),e.value=e.value.replace("m","ь"),e.value=e.value.replace(",","б"),e.value=e.value.replace(".","ю");}
}
</script>
<img id="image" width="100%" alt="Error. Try again later..." src="//<?=SERVER_NAME.'/'.SITEDIR;?>modules/<?=$name;?>Captcha/image" onclick="this.src='//<?=SERVER_NAME.'/'.SITEDIR;?>modules/<?=$name;?>Captcha/image?k=<?=$_GET['k'];?>&rand='+Math.floor((Math.random() * 100) + 1)">

<input id="input" type="text" onblur="inputtest()" onkeydown="if(event.keyCode == 13){inputtest()};" onkeyup="validInput(this,'<?if(isset($convertion) AND $convertion=='LK'){echo 'LK';}else{echo 'KL';}?>')" placeholder="<?=$alt;?>" required spellcheck="false">