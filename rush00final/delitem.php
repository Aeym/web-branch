<?php 
session_start();
if ($_POST)
{
	foreach ($_POST as $tmpx => $value) {
		$id = intval(substr($tmpx, 1));
	}
	unset($_SESSION['basket'][$id]);
}
header("Location: ./mybasket.php");

 ?>