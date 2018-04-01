<?php
session_start();
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
  <li><a>Basket</a>
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
    echo "<li><a href=\"./admin.php\">Pannel</a></li>";
  }
  if($_SESSION['level'] == 2) {
      echo "<li><a href=\"./superut.php\">Pannel</a></li>";
  }
     ?>
</ul>
</nav>
</div>
<div class="mybasketz">
  <table class="mytable" border=1>
    <?php
    $z = 1;
    $total = 0;
    $fd = fopen("./database.csv", "c+");
    $str = file_get_contents("./database.csv");
    $data = unserialize($str);
    if ($_SESSION['basket']) {
    foreach($_SESSION['basket'] as $x => $y) {
      if ($x) {
        echo "<br>";
        echo "<tr>";
        echo "<td><img src=\"".$data['products'][$x]['url']."\" height=120px width=80px ></td>";
        echo "<td>Product number: ".$z."</td>";
        echo "<td>".$data['products'][$x]['title']."</td>";
        echo "<td>Quantity: ".$y."</td>";
        echo "<td>Price unit: ".$data['products'][$x]['price']."€</td>";
        echo "<td><form method=\"POST\" action=\"delitem.php\">";
        echo "<input type=\"submit\" value=\"X\" name=\"X".$x."\"></form></td>";
        echo "</tr>";
        $total += $data['products'][$x]['price'] * $y;
        $z++;
      }
    }
      echo "<tr>";
      echo "<td colspan=\"3\"></td>";
      echo "<td>Total: </td>";
      echo "<td>".$total."€</td>";
      echo "</tr>";
  }
     ?>
  </table>
</div>
<?php 
  if ($_SESSION['loggued_on_user'])
  {
    echo "<br>";
    echo "<div  id=\"submix\">";
    echo "<form  method=\"POST\" action=\"./stox.php\">";
    echo "<input type=\"submit\" value=\"OK\" name=\"submarine\">";
    echo "</form>";
    echo "</div>";  
  }
 ?>
  </body>
</html>
