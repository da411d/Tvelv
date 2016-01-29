<?php
header('content-type: text/js');
include "../../_functions.php";

function calback($content){
	return minify_js($content);
}
//ob_start("calback");


include(dirname(__FILE__)."/script.js");
echo";";
include(dirname(__FILE__)."/useful.js");

?>

<?php// ob_end_flush();
?>