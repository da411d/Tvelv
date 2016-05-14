<?php
include "_functions.php";
include "_config.php";
set_time_limit(0);

class API{
    public static $classes = "classes";
}

class classes{
	public static function get() {
		echo "HERE!!!";
	}
}

$a = API::$classes;
$a::get();