<?php
session_start();
if ($_POST) {
  foreach($_POST as $x => $y)
  {
    if ($x)
    {
    	$tmpid = intval(substr($x, 8));
    	$tmpqt = $y;
    	if ($_SESSION['basket'][$tmpid])
    		$_SESSION['basket'][$tmpid] += $tmpqt;
    	else
    		$_SESSION['basket'][$tmpid] = $tmpqt;
    }
  }
}
  header("Location: ./mybasket.php");
 ?>