<?php
session_start();
if(!isset($_SESSION['loggued_on_user'])) {
  header("Location: ./index.php");
}

if ($_POST["delOneSelf"]){
  $fd = fopen("./database.csv", "c+");
  $str = file_get_contents("./database.csv");
  $data = unserialize($str);
  foreach ($data['user'] as $key => $value) {
    if ($value['name'] == $_SESSION['loggued_on_user'])
      $id = $key;
  }
  unset($data['user'][$id]);
  file_put_contents("./database.csv", serialize($data));  // here we store the csv -
  fclose($fd);
  $_SESSION['loggued_on_user'] = "";
  session_destroy();
  header("Location: ./index.php");
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Home</title>
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
     echo "<li><a href=\"./connection.php\">Connection</a>";
   }?>
   </li>
   <li><a href="./changepw.php">Change Password?</a>
   </li>
   <li><a href="./create_account.php">Create Account</a></li>
     <?php
     if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3) {
       echo "<li><a><strong>".$_SESSION['loggued_on_user']."</strong></a></li>";
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
 <div class="userdiv">
   <p>Login: <?php echo $_SESSION['loggued_on_user'] ?></p>
   <p>Nom: <?php
    $data = unserialize(file_get_contents('./database.csv'));
   foreach($data['user'] as $x){
     if ($x['name'] == $_SESSION['loggued_on_user'])
      echo $x['nom'];
   }
   ?></p>
   <p>Prenom: <?php
    $data = unserialize(file_get_contents('./database.csv'));
   foreach($data['user'] as $x){
     if ($x['name'] == $_SESSION['loggued_on_user'])
      echo $x['prenom'];
   }
   ?></p>
   <p>Email: <?php
    $data = unserialize(file_get_contents('./database.csv'));
   foreach($data['user'] as $x){
     if ($x['name'] == $_SESSION['loggued_on_user'])
      echo $x['email'];
   }
   ?></p>
   <p>Status: <?php
    $data = unserialize(file_get_contents('./database.csv'));
   foreach($data['user'] as $x){
     if ($x['name'] == $_SESSION['loggued_on_user']) {
       if ($x['level'] == 1)
        echo "Utilisateur";
       else if ($x['level'] == 2)
        echo "Utilisateur superieur";
       else if ($x['level'] == 3)
        echo "Super Admin Root";
     }
   }
   ?></p>
   <form action="user.php" method="post">
    <input type="submit" name="delOneSelf" value="Delete your account">
   </form>
 </div>
   </body>
 </html>
