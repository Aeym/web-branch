<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connection</title>
    <link rel="stylesheet" type="text/css" href="./first.css">
  </head>
  <body>
    <div id="topbar">

    <img id="logo" src="http://www.ce-ugitech.fr/wp-content/uploads/2015/01/cinema-logo-web.png">

    <nav id="primary_nav_wrap">
<ul>
  <li class="current-menu-item"><a href="./index.php">Home</a></li>
  <li><a href="./categories.php">Categories</a></li>
  <li><a href="./mybasket.php">Basket</a>
  </li>
  <?php
  if(isset($_SESSION['loggued_on_user'])) {
    echo "<li><a>Connection</a>";
  } else {
    echo "<li><a>Connection</a>";
  }?>
  </li>
  <li><a href="./changepw.php">Change Password?</a>
  </li>
  <li><a href="./create_account.php">Create Account</a></li>
    <?php
    if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3) {
      echo "<li><a href=\"./user.php\"><strong>".$_SESSION['loggued_on_user']."</strong></a></li>";
    } else {
      echo "<li><a><strong>"."Not logged"."</strong></a></li>";
    }
    if(isset($_SESSION['loggued_on_user'])) {
    echo "<li><a href=\"./logout.php\">Logout</a></li>";
  }
  if($_SESSION['level'] == 3) {
    echo "<li><a href=\"./admin.php\">Pannel</a></li>";
  }
  if($_SESSION['level'] == 2) {
      echo "<li><a href=\"./superut.php\">Pannel</a></li>";
  }
     ?>
</ul>
</nav>
</div>
<div class="center-form-connec">
  <form method="get" action="login.php">
  <label for="login" class="blackfont2">Identifiant: </label>
  <input name="login" type="text" value="">
  <br />
  <label for="password" class="blackfont2">Mot de passe: </label>
  <input name="passwd" type="password" value="">
  <br />
  <input name="submit" type="submit" value="OK">
</form>
</div>
  </body>
</html>
