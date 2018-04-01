<?php
session_start();
if ($_SESSION['level'] == 0) {
  header("Location: ./index.php");
}
if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['url']) && isset($_POST['genre']) && isset($_POST['makip']) && $_POST['submit'] == 'OK') {
  $fd = fopen("./database.csv", "c+");

  $str = file_get_contents("./database.csv");
  $data = unserialize($str);
  $catexist = FALSE;
  foreach ($data['categories'] as $key => $value) {
  	if ($value['categ'] == $_POST['genre'])
  		$catexist = TRUE;
  }
  if ($catexist == FALSE)
  	array_push($data['categories'], array('categ' => $_POST['genre'], 'makic' => count($data['categories']) + 1));
  array_push($data['products'], array('title'=>$_POST['title'], 'price'=>$_POST['price'], 'stock'=>$_POST['stock'], 'url'=>$_POST['url'], 'genre'=>array($_POST['genre']), 'makip'=>$_POST['makip']));
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);
  header("Location: ./listmovies.php");
}
?>
