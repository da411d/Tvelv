<?php
header('content-type: text/js');
include "../../_functions.php";

function calback($content){
	return minify_js($content);
}
ob_start("calback");


include(dirname(__FILE__)."/script.js");

?>

<?php ob_end_flush();?>