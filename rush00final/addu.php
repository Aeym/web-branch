<?php
session_start();
if ($_SESSION['level'] == 0) {
  header("Location: ./index.php");
}
if (isset($_POST['login']) && isset($_POST['pw']) && isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['level']) && $_POST['submit'] == 'OK') {
  $fd = fopen("./database.csv", "c+");

  $str = file_get_contents("./database.csv");
  $data = unserialize($str);
  $i = count($data['user']);
  array_push($data['user'], array('name'=>$_POST['login'], 'pw'=>hash('whirlpool', $_POST['pw']), 'email'=>$_POST['email'], 'nom'=>$_POST['name'], 'prenom'=>$_POST['prenom'], 'maki'=>$i+1,
   'level'=>$_POST['level']));
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);
  header("Location: ./listusers.php");
}
?>
