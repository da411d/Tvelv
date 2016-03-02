<?php
function pl($in){
	$in = md5($in);
	$in = base64_encode($in);
	$in=trim($in,"=");
		for ($i = 0; $i <= strlen($in); $i++) {
		    $out = $in[$i].$out;
		}
	$out = str_replace(array(1,2,3,4,5,6,7,8,9,0),'',$out);
	return $out;
}

function md($in){
	$in = md5(md5($in.$GLOBALS['grand']).$GLOBALS['for']);
	$in = base64_encode($in);
	$in=trim($in,"=");
		for ($i = 0; $i <= strlen($in); $i++) {
		    $out = $in[$i].$out;
		}
	$out = str_replace(array(1,2,3,4,5,6,7,8,9,0),'',$out);
	$fr = pl($GLOBALS['for']);
	$out = 'A'.$fr[0].$fr[3].$fr[2].$fr[6].$fr[9].$fr[10].$out[0].$fr[11].$fr[18].$fr[19] . $out[5].$out[3].$out[4] . $fr[1].$fr[5].$out[6].$fr[7].$fr[2].$fr[15].$fr[14].$fr[12].$fr[17].$fr[20];
	return $out;
}