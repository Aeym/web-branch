<?php 
session_start();
$goodstock = TRUE;
if ($_POST['submarine'] == "OK" && $_SESSION['basket'])
{
	$fd = fopen("./database.csv", "c+");
	$str = file_get_contents("./database.csv");
	$data = unserialize($str);
	foreach ($_SESSION['basket'] as $key => $value) {
		if ($value > $data['products'][$key]['stock'])
			$goodstock = FALSE;
	}
	if ($goodstock == FALSE)
		header("Location: ./false.php");
	else
	{
		foreach ($_SESSION['basket'] as $key => $value) {
			$data['products'][$key]['stock'] -= $value;
		}
		array_push($data['orders'], $_SESSION['basket']);
		file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  		fclose($fd);
		header("Location: ./true.php");
	}
}
else
	header("Location: ./false.php");
?>
