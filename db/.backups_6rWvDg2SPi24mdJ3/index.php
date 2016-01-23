<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
 <head>
  <title>Index of /db</title>
 </head>
 <body>
<h1>Index of /db</h1>
<ul><li><a href="/"> Parent Directory</a></li><?php
$d = date("d");
for ($i=1;$i<=$d;$i++){
	$id = 'Backup-2016-'.date("m").'-'.$i.'_'.md5(date("dm").$i).'.db';
	echo '<li><a href="'.$id.'"> '.$id.'</a></li>';
}
?>

</ul>
</body></html>