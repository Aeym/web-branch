<?php
session_start();
if ($_SESSION['level'] == 0) {
  header("Location: ./index.php");
}
if (isset($_POST['id']) && $_POST['submit'] == 'OK') {
  $fd = fopen("./database.csv", "c+");

  $str = file_get_contents("./database.csv");
  $data = unserialize($str);
  $tmp = intval($_POST['id']);
  unset($data['user'][$tmp]);
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);
  header("Location: ./listusers.php");
}
?>
