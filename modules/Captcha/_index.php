<?php
include dirname(__FILE__).'/../../_config.php';
header("Cache-Control:public, max-age=86400");
header('Content-Type: text/html; charset=utf-8');
?>
<style>
body{margin:0px;padding:0px;}
.btn, div{float:left;font-size:110%;}
.btn {text-decoration: none!important;
    color: #fafafa;
    border-radius: 0px!important;
    background: #047DFC;
    height: auto;
    padding: 8px;
    margin: 8px;
    display: block;
    border: 1px #004184 solid;
}
</style>
<!--Вставте це в HEAD сторінки-->
<script src="http://<?=SERVER_NAME.'/'.SITEDIR?>modules/<?=$name;?>Captcha/api.js"></script> 
 
<!--А це там де має бути капча--> 
<div id="<?=$name;?>Captcha"> 
<script type="text/javascript"><?=$name;?>Captcha('<?=$name;?>Captcha')</script> 
</div>
<input type="button" class="btn" onclick="var xhr=new XMLHttpRequest;xhr.open('GET','tester.php?r='+document.getElementsByName('<?=$name;?>CaptchaRequest')[0].value+'&ip=<?=$_SERVER['REMOTE_ADDR'];?>',!1),xhr.send(),alert(200!=xhr.status?xhr.status+': '+xhr.statusText:xhr.responseText);" value="TEST">