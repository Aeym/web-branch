<?php
session_start();
if ($_SESSION['level'] !== 3)
  header("Location: ./index.php");
 ?>
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
       echo "<li><a href=\"./user.php\"><strong>".$_SESSION['loggued_on_user']."</strong></a></li>";
     } else {
       echo "<li><a><strong>"."Not logged"."</strong></a></li>";
     }
     if(isset($_SESSION['loggued_on_user'])) {
     echo "<li><a href=\"./logout.php\">Logout</a></li>";
   }
   if($_SESSION['level'] == 3) {
     echo "<li><a>Pannel</a></li>";
   }
   if($_SESSION['level'] == 2) {
       echo "<li><a href=\"./superut.php\">Pannel</a></li>";
   }
      ?>
 </ul>
 </nav>
 </div>
 <div class="center-form-admin">
 <div>
   <p>Gestion Utilisateurs</p>
   <a href="./listusers.php">List users</a>
   <a href="./addusers.php">Add users</a>
   <a href="./modifusers.php">Modif users</a>
   <a href="./delusers.php">Del users</a>
 </div>
 <div>
   <p>Gestion Films</p>
   <a href="./listmovies.php">List Films</a>
   <a href="./addmovies.php">Add Films</a>
   <a href="./modifmovies.php">Modif Films</a>
   <a href="./delmovies.php">Del Films</a>
 </div>
 <div>
   <p>Gestion Commandes</p>
   <a href="./liststock.php">List Stock</a>
   <a href="./listorder.php">List Commandes</a>
 </div>
</div>
   </body>
 </html>
