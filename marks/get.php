<?
include "libs/main.php";
$arr = mark_get_all();
if(!$arr){$arr=[];}
$marks = ['table' => $arr];
$header = 'Оцінки';
$main = "<style>body{overflow:hidden;}</style><iframe src=\"http://localhost/Tvelv/marks/print.php\" style=\"width:100%;height:100%;border:0px solid transparent\">";