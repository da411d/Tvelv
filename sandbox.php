<?php
include "_classes.php";
include "_functions.php";
include "_config.php";

$test1 = new Session('da411d');
print_r($test1->loginMe());