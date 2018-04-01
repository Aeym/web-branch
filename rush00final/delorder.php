<?php 
session_start();

if ($_POST)
{
	$fd = fopen("./database.csv", "c+");
	$str = file_get_contents("./database.csv");
	$data = unserialize($str);
	foreach ($_POST as $tmpx => $value) {
		$id = intval(substr($tmpx, 1));
	}
	unset($data['orders'][$id]);
	file_put_contents("./database.csv", serialize($data));  // here we store the csv -
	fclose($fd);
}
header("Location: ./listorder.php");

 ?>