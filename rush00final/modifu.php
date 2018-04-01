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
  if ($_POST['login']) {
    $data['user'][$tmp]['name'] = $_POST['login'];
  }
  if ($_POST['pw']) {
    $data['user'][$tmp]['pw'] = hash('whirlpool', $_POST['pw']);
  }
  if ($_POST['name']) {
    $data['user'][$tmp]['nom'] = $_POST['name'];
  }
  if ($_POST['email']) {
    $data['user'][$tmp]['email'] = $_POST['email'];
  }
  if ($_POST['prenom']) {
    $data['user'][$tmp]['prenom'] = $_POST['prenom'];
  }
  if ($_POST['level']) {
    $data['user'][$tmp]['level'] = $_POST['level'];
  }
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);
  header("Location: ./listusers.php");
}
?>
