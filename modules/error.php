<?php
if(strlen($_GET['code'])>30){
	echo file_get_contents("http://blastorq.pp.ua/error.php?code=414");
	exit;
}
$code=$_GET['code'];
if ($code=='400') {$errortext = 'ERROR 400: Bad Request ';}
else if ($code=='401') {$errortext = 'ERROR 401: Unauthorized ';}
else if ($code=='403') {$errortext = 'ERROR 403: Forbidden';}
else if ($code=='404') {$errortext = 'ERROR 404: Not Found';}
else if ($code=='500') {$errortext = 'ERROR 500: Internal Server Error';}
else if ($code=='414') {$errortext = 'ERROR 414: Request URI too long';}
else {$errortext = 'ERROR';}
?>

<script>console.log('%cBlast.ORQ is started.>', 'color: #000000; background: #009900');
console.log('%c<?php echo $errortext; ?>.>', 'color: #000000; background: #990000');</script>

<meta http-equiv="refresh" content="30; url=http://blastorq.pp.ua/"><!-- Эффект из известного фильма-->
<html>
<head> <link rel="shortcut icon" href="data:image/png;base64,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" type="image/png">
<title><?php echo $errortext;?>
</title>
<style type="text/css">
body {overflow:hidden;font-family:Courier;}
 td {font-weight:bold; font-size:16px; font-family:Courier;}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39668904-3', 'auto');
  ga('send', 'pageview');

</script>
<script language="JavaScript">
<!--
var flag = 0;
var countScroll=0;

var fs1=16;
var fl2=0;

var s5  = "1030285493921358430238903284509328560384501100039483216";
var s4  = "2308203278329508097236872736027609702936290760927361809";
var s3  = "3298670709723699709709217369071326136097907136132634823";
var s2  = "0970970970970711342115719076970900101010213697016138348";
var s1  = "0101019359070136097136097091269710927690712967192623154";

var s10 = "1030285493  1358430238  3284509328  0384501100  9483216";
var  s9 = "2308203278  9508097236  2736027609  2936290760  7361809";
var  s8 = "3298670709  3699709709  7369071326  6097907136  2634823";
var  s7 = "0970970970  0711342115  0769709001  0102136970  1383483";
var s6  = "0101019359  0136097136  7091269710  7690712967  2623154";

var s15 = "1 30285493  1358430238  3284509328  0384501100  9483216";
var s14 = "9 08203278  9508097236  2736027609  2936290760  7361809";
var s13 = "6 98670709  3699709709  7369071326  3609790713  3263482";
var s12 = "0 70970970  0711342115  9076970900  1010213697  6138348";
var s11 = "2 01019359  0136097136  7091269710  7690712967  2623154";

var s20 = "4 3285 923  1358430238  3284509328  0384501100  9483216";
var s19 = "2 0203 738  9508097236  2736027609  2936290760  7361809";
var s18 = "0 9670 059  3699709709  7369071326  6097907136  2634823";
var s17 = "5 7970 770  0711342115  9076970900  1010213697  6138348";
var s16 = "9 0019 559  0136097136  7091269710  7690712967  2623154";

var s25 = "4 3 28 903  1358430238  3284509328  0384501100  9483216";
var s24 = "2 0 20 748  9508097236  2736027609  2936290760  7361809";
var s23 = "0 9 67 039  3699709709  7369071326  6097907136  2634823";
var s22 = "5 7 97 770  0711342115  9076970900  1010213697  6138348";
var s21 = "9 0 01 589  0136097136  7091269710  7690712967  2623154";

var s30 = "4 3  8 923  13843  383284  50328  038450  11094  832165";
var s29 = "2 0  0 718  95809  362736  02609  293629  07073  618097";
var s28 = "0 9  7 079  36970  097369  07326  609790  71626  348231";
var s27 = "5 7  7 780  07134  159076  97900  101021  36761  383483";
var s26 = "9 0  1 589  01609  367091  26710  769071  29726  231547";

var s35 = "4 3    923  13843  383284  50328  038450  11094  832165";
var s34 = "2 0    718  95809  362736  02609  293629  07073  618097";
var s33 = "0 9    079  36970  097369  07326  609790  71626  348231";
var s32 = "5 7    780  07134  159076  97900  101021  36761  383483";
var s31 = "9 0    589  01609  367091  26710  769071  29726  231547";

var s40 = "4 3    9 3  13843  383284  50328  0 8450  11094  832165";
var s39 = "2 0    7 8  95809  362736  02609  2 3629  07073  618097";
var s38 = "0 9    0 9  36970  097369  07326  6 9790  71626  348231";
var s37 = "5 7    7 0  07134  159076  97900  1 1021  36761  383483";
var s36 = "9 0    5 9  01609  367091  26710  7 9071  29726  231547";

var s45 = "4 3    9 3  138 3  383284  50328  0 8450  11094  832165";
var s44 = "2 0    7 8  958 9  362736  02609  2 3629  07073  618097";
var s43 = "0 9    0 9  369 0  097369  07326  6 9790  71626  348231";
var s42 = "5 7    7 0  071 4  159076  97900  1 1021  36761  383483";
var s41 = "9 0    5 9  016 9  367091  26710  7 9071  29726  231547";

function ReturnSomeStrings()
{
if(flag > 5) flag=0;
flag++;

if(flag==1 && countScroll < 30) return s1;
if(flag==2 && countScroll < 30) return s2;
if(flag==3 && countScroll < 30) return s3;
if(flag==4 && countScroll < 30) return s4;
if(flag==5 && countScroll < 30) return s5; 
 else if( countScroll < 30) return s1;

if(flag==1 && countScroll > 30 && countScroll < 60) { return s6; }
if(flag==2 && countScroll > 30 && countScroll < 60) { return s7; }
if(flag==3 && countScroll > 30 && countScroll < 60) { return s8; }
if(flag==4 && countScroll > 30 && countScroll < 60) { return s9; }
if(flag==5 && countScroll > 30 && countScroll < 60) { return s10;}
 else if( countScroll > 30  && countScroll < 60) {  return s6; }

if(flag==1 && countScroll > 60 && countScroll < 90) { document.all.searchDigits.innerText = " 0" ;  return s11; }
if(flag==2 && countScroll > 60 && countScroll < 90) return s12;
if(flag==3 && countScroll > 60 && countScroll < 90) return s13;
if(flag==4 && countScroll > 60 && countScroll < 90) return s14;
if(flag==5 && countScroll > 60 && countScroll < 90) return s15; 
 else if( countScroll > 60  && countScroll < 90) return s11;

if(flag==1 && countScroll > 90 && countScroll < 120) { document.all.searchDigits.innerText = " 0    5" ;  return s16; }
if(flag==2 && countScroll > 90 && countScroll < 120) return s17;
if(flag==3 && countScroll > 90 && countScroll < 120) return s18;
if(flag==4 && countScroll > 90 && countScroll < 120) return s19;
if(flag==5 && countScroll > 90 && countScroll < 120) return s20; 
 else if( countScroll > 90  && countScroll < 120) return s16;

if(flag==1 && countScroll > 120 && countScroll < 140) { document.all.searchDigits.innerText = " 0 2  5" ; return s21; }
if(flag==2 && countScroll > 120 && countScroll < 140) return s22;
if(flag==3 && countScroll > 120 && countScroll < 140) return s23;
if(flag==4 && countScroll > 120 && countScroll < 140) return s24;
if(flag==5 && countScroll > 120 && countScroll < 140) return s25; 
 else if( countScroll > 120  && countScroll < 140) return s21;

if(flag==1 && countScroll > 140 && countScroll < 150) { document.all.searchDigits.innerText = " 0 25 5" ; return s26; }
if(flag==2 && countScroll > 140 && countScroll < 150) return s27;
if(flag==3 && countScroll > 140 && countScroll < 150) return s28;
if(flag==4 && countScroll > 140 && countScroll < 150) return s29;
if(flag==5 && countScroll > 140 && countScroll < 150) return s30; 
 else if( countScroll > 140  && countScroll < 150) return s26;

if(flag==1 && countScroll > 150 && countScroll < 170) { document.all.searchDigits.innerText = " 0 2555" ; return s31; }
if(flag==2 && countScroll > 150 && countScroll < 170) return s32;
if(flag==3 && countScroll > 150 && countScroll < 170) return s33;
if(flag==4 && countScroll > 150 && countScroll < 170) return s34;
if(flag==5 && countScroll > 150 && countScroll < 170) return s35; 
 else if( countScroll > 150  && countScroll < 170) return s31;

if(flag==1 && countScroll > 170 && countScroll < 200) { document.all.searchDigits.innerText = " 0 2555 6                          6" ; return s36; }
if(flag==2 && countScroll > 170 && countScroll < 200) return s37;
if(flag==3 && countScroll > 170 && countScroll < 200) return s38;
if(flag==4 && countScroll > 170 && countScroll < 200) return s39;
if(flag==5 && countScroll > 170 && countScroll < 200) return s40; 
 else if( countScroll > 170  && countScroll < 200) return s36;


if(flag==1 && countScroll > 200 && countScroll < 260) { document.all.searchDigits.innerText = " 0 2555 6      0                   8" ; return s41; }
if(flag==2 && countScroll > 200 && countScroll < 260) return s42;
if(flag==3 && countScroll > 200 && countScroll < 260) return s43;
if(flag==4 && countScroll > 200 && countScroll < 260) return s44;
if(flag==5 && countScroll > 200 && countScroll < 260) return s45; 
 else if( countScroll > 200  && countScroll < 260) return s41;

else return " ";
}

function FillScreen()
{

clearTimeout('ShowHide()',300);
clearTimeout('BuildPhrase()',50);

var FS = "";

for(i=0;i<20;i++)
	{
	FS += ReturnSomeStrings();
	FS += "\n";
	}

document.all.tt.innerText = FS;
document.all.tt.style.fontSize=fs1;
document.all.nu.style.fontSize=fs1;
document.all.searchDigits.style.fontSize=fs1;
fl2++;
if(fl2>200)
{
fs1+=2;	
}
countScroll++;

if(countScroll >= 260)  
	{ 
	clearTimeout('FillScreen()',50);
	
	Flash();
return;

	}

setTimeout('FillScreen()',50);
}

function Flash()
{
document.all.failure.style.cssText="display:show";
}

var stat=0;
var intCounter=0;
var intColCounter=11;

var Phrase;
Phrase = "Call trans opt: received. <? ini_set('date.timezone', 'Europe/Kiev'); echo date("m-d-y g:i:s");?> REC:Log>";
var tempPhrase= "";
var counterPass=0;
var HowPhrase=0;

var pLength= Phrase.length;

var img1 = new Image();
img1.src = "data:image/gif;base64,";

var img2 = new Image();
img2.src = "data:image/gif;base64,";

function ShowHide()
{

if(intCounter==intColCounter)
{
setTimeout('BuildPhrase()',50);
return;
}

intCounter++;

if(stat==0)
	{
	document.all.dot.src=img1.src;
	stat=1;
	}
else
	{
	document.all.dot.src=img2.src;
	stat=0;
	}

setTimeout('ShowHide()',300);
}

function BuildPhrase()
{

if(HowPhrase > 1)
{
document.all.Matrix.style.cssText="display:none";
document.all.dot.style.cssText="display:none";

document.all.nextStep.style.cssText="display:show";
FillScreen();
return;
}

if(intCounter < intColCounter) {setTimeout('ShowHide()',300);return;}

setTimeout('BuildPhrase()',50);


var Source = "";
var SourceLength;

Source=Phrase;
SourceLength = pLength;

	tempPhrase =" " + Source.substring(0,counterPass);
	document.all.Matrix.innerText = tempPhrase;
	counterPass+=1;
if(counterPass == SourceLength+1)
{
intColCounter=5;
intCounter=-1;
counterPass=0;
Phrase="Trace program: running ";
HowPhrase++;
}
}

</script>
</head>

<body bgcolor=#000000 text=green topmargin=20 leftmargin=20 rightmargin=20 onLoad="ShowHide();">
<basefont face="Courier New, Times New Roman, Arial, Helvetica, Ms Sans Serif">
<div id="failure" style="position:absolute;z-index:100; top:50;left:50;display:none;"><font style="font-family:Courier;font-size:75px;font-weight:bold;color:yellow;"><?php echo $errortext;?></font></div>
<span id="Matrix" style="font-weight:bold; font-size:12pt"></span><img src="data:image/gif;base64," height=15 name="dot" id="dot">
<div id="nextStep"style="display:none">
<table border=0 width=10000 cellspacing=0 cellpadding=0 align=center>
<tr>
<td >
<div style="color:#000000" id="nu">0</div>
</td>
<td align=left width=10000 id="searchDigits" style="font-weight:bold; font-size:12px;">
&nbsp;
</td>
</tr>
</table>
<table border=0 width=10000 align=center cellspacing=0 cellpadding=0>
<tr>
<td>
<span id="tt" style="font-weight:bold; font-size:12px;"> </span>
</td>
</tr>
</table>
</div>
</body>
</html>