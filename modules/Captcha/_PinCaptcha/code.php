<?
	$haystack = dirname(__FILE__);
	$needle  = '_';
	$posbegin = strripos($haystack, $needle);
	$posend = strlen($haystack);
	$name = substr($haystack, $posbegin+1, $posend-$posbegin);
	$name = str_replace('Captcha', '', $name);
	include dirname(__FILE__).'/../_code.php';
?>
<style>
#panel {float:left;}
#panel input{width:33.3%;height:30px;background: rgba(255, 255 ,255 ,0.5);border: 1px rgba(0, 0 ,0 ,0.5) solid;cursor:pointer;border-collapse: collapse;}
</style>
<div id="panel">
</div>
<script>
function shuffle(r){for(var f,n,o=r.length;0!==o;)n=Math.floor(Math.random()*o),o-=1,f=r[o],r[o]=r[n],r[n]=f;return r}
arr=['1','2','3','4','5','6','7','8','9','0','<','OK'];
c=-3;arr=shuffle(arr);
document.getElementById('input').setAttribute("readonly", "true");
document.getElementById('panel').innerHTML='';
for(i=0;i<arr.length;i++){document.getElementById('panel').innerHTML+=''+'<input type="button" value="'+arr[i]+'">';}
document.addEventListener('click',function(e){if(e.target.type=='button' && e.target.value!='OK' && e.target.value!='<'){document.getElementById('input').value+='​​'+e.target.value;arr=shuffle(arr);document.getElementById('panel').innerHTML='';
for(i=0;i<arr.length;i++){document.getElementById('panel').innerHTML+=''+'<input type="button" value="'+arr[i]+'">';}}if(e.target.type=='button' && e.target.value=='OK'){inputtest()}if(e.target.type=='button' && e.target.value=='<'){document.getElementById('input').value = document.getElementById('input').value.slice(0,c);}},true);
</script>

<?php ob_end_flush();?>