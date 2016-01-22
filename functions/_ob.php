<?
function callback($content){
	$content = str_replace("	","", $content);
	$content = str_replace("	","", $content);
	$content = str_replace("\n","", $content);
	$content = str_replace("\r","", $content);
	$content = str_replace("  "," ", $content);

	return $content;
}