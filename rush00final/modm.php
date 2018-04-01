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
  if ($_POST['title']) {
    $data['products'][$tmp]['title'] = $_POST['title'];
  }
  if ($_POST['price']) {
    $data['products'][$tmp]['price'] = $_POST['price'];
  }
  if ($_POST['stock']) {
    $data['products'][$tmp]['stock'] = $_POST['stock'];
  }
  if ($_POST['url']) {
    $data['products'][$tmp]['url'] = $_POST['url'];
  }
  if ($_POST['genrea']) {
    array_push($data['products'][$tmp]['genre'], $_POST['genrea']);
  }
  if ($_POST['genred']) {
  unset($data['products'][$tmp]['genre'][$_POST['genred']]);
  $data['products'][$tmp]['genre'] = array_values($data['products'][$tmp]['genre']);
  }
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);

  header("Location: ./user.php");
}
?>
