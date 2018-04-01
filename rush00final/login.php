<?php
require_once('auth.php');
session_start();
if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd']) == 3){
  $_SESSION['loggued_on_user'] = $_GET['login'];
  $_SESSION['level'] = 3;
  header("Location: ./admin.php");
} else if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd']) == 2){
  $_SESSION['loggued_on_user'] = $_GET['login'];
  $_SESSION['level'] = 2;
  header("Location: ./index.php");
} else if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd']) == 1){
  $_SESSION['loggued_on_user'] = $_GET['login'];
  $_SESSION['level'] = 1;
  header("Location: ./index.php");
} else {
  $_SESSION['loggued_on_user'] = "";
  header("Location: ./connection.php");
}
?>
