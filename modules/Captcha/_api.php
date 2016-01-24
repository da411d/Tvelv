//<?php
include dirname(__FILE__).'/../../_config.php';

header('Content-Type: text/javascript; charset=utf-8');
ini_set('date.timezone', 'Europe/Kiev');
$dat = date("j F Y, H:i");
if(isset($oname) AND $oname){echo $oname;}else{echo $name;}
?>Captca, ©Blast.ORQ
function <?if(isset($oname) AND $oname){echo $oname;}else{echo $name;}?>Captcha(t){for(k="",i=0;i++<=4;)k+=function(){return String.fromCharCode(Math.round(25*Math.random()+65))}();document.getElementById(t).innerHTML='<iframe src="//<?=SERVER_NAME.'/'.SITEDIR?>modules/<?=$name;?>Captcha/code?k='+k+'"scrolling="no"style="height:<?php if(!isset($height)){echo'230';}else{echo$height;}?>px;width:<?php if(!isset($width)){echo '200';}else{echo $width;}?>px;border:none;"frameborder=0></iframe><input type="hidden"name="<?if(isset($oname) AND $oname){echo $oname;}else{echo $name;}?>CaptchaRequest"value="<?include "code_generator.php";echo $_answer;?>'+k+'">'}