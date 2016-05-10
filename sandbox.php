<?php
include "_functions.php";
include "_config.php";
set_time_limit(0);

$arr = db_get("Users", ["Login", "Password", "Salt"]);


echo _decrypt("m53-0HKjwi3qK6f5YB8JWb_u8yYCRKiBHcoAK0I=", "UjZtirBNEio6loJGEdBB_g4f3gmc6oK_TIEQaXjYbA2bZFsIDVvn32q2UXBStyT0");