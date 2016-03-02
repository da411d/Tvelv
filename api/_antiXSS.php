<?
function antiXSS($str){
	$arr = array(
		["!", "&#33;"], 
		["\"", "&#34;"],
		["$", "&#36;"], 
		["%", "&#37;"],
		["'", "&#39;"], 
		["(", "&#40;"], 
		[")", "&#41;"]
	);
	foreach($arr as $a){
		$str = str_replace($arr[0], $arr[1], $str);
	}
	return $str;
}