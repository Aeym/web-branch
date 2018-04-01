<?php
session_start();
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
  <li class="current-menu-item"><a>Home</a></li>
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
    echo "<li><a href=\"./admin.php\">Pannel</a></li>";
  }
  if($_SESSION['level'] == 2) {
      echo "<li><a href=\"./superut.php\">Pannel</a></li>";
  }
     ?>
</ul>
</nav>
</div>
  <?php
  $i = 1;
  $fd = fopen("./database.csv", "c+");

  $str = file_get_contents("./database.csv");
  $data = unserialize($str);
  foreach($data as $type)
  {
    foreach ($type as $id)
    {
      if ($id['title'])
      {
        if ($i == 1)
        {
          echo "<div class=\"maxidiv\">";
          echo "<div class=\"num1\"><h2 class=\"blackfont\">".$id['title']."</h2><img height=450px width=300px src=".$id['url']." alt=".$id['title'].">";
          echo "<p class=\"blackfont\">Public Price: <s>E24.99</s></p>";
          echo "<p class=\"blackfont\">Our Price: ".$id['price']." </p>";
          echo "<form action=\"add_cart.php\" method=\"POST\">";
          echo "<div class=\"col-xs-3\">";
          echo "<label for=\"quantity\" class=\"blackfont\">Quantity:</label>";
          echo "<input type=\"text\" class=\"form-control\" id=\"quantity\" name=\"quantity".$id['makip']."\" size=1 required/>";
          echo "</div><br />";
          echo "<div class=\"modal-footer\">";
          echo "<button class=\"button\" type=\"submit\">Add To Cart</button>";
          echo "</div>";
          echo "</form>";
          echo "</div>";
          $i++;
        }
        else if ($i == 2)
        {
          echo "<div class=\"num2\"><h2 class=\"blackfont\">".$id['title']."</h2><img height=450px width=300px src=".$id['url']." alt=".$id['title'].">";
          echo "<p class=\"blackfont\">Public Price: <s>E24.99</s></p>";
          echo "<p class=\"blackfont\">Our Price: ".$id['price']." </p>";
          echo "<form action=\"add_cart.php\" method=\"POST\">";
          echo "<div class=\"col-xs-3\">";
          echo "<label for=\"quantity\" class=\"blackfont\">Quantity:</label>";
          echo "<input  type=\"text\" class=\"form-control\" id=\"quantity\" name=\"quantity".$id['makip']."\" size=1 required/>";
          echo "</div><br />";
          echo "<div class=\"modal-footer\">";
          echo "<button class=\"button\" type=\"submit\">Add To Cart</button>";
          echo "</div>";
          echo "</form>";
          echo "</div>";
          $i++;
        }
        else if ($i == 3)
        {
          echo "<div class=\"num3\"><h2 class=\"blackfont\">".$id['title']."</h2><img height=450px width=300px src=".$id['url']." alt=".$id['title'].">";
          echo "<p class=\"blackfont\">Public Price: <s>E24.99</s></p>";
          echo "<p class=\"blackfont\">Our Price: ".$id['price']." </p>";
          echo "<form action=\"add_cart.php\" method=\"POST\">";
          echo "<div class=\"col-xs-3\">";
          echo "<label for=\"quantity\" class=\"blackfont\">Quantity:</label>";
          echo "<input type=\"text\" class=\"form-control\" id=\"quantity\" name=\"quantity".$id['makip']."\" size=1 required/>";
          echo "</div><br />";
          echo "<div class=\"modal-footer\">";
          echo "<button class=\"button\" type=\"submit\">Add To Cart</button>";
          echo "</div>";
          echo "</form>";
          echo "</div>";
          echo "</div>";
          echo "<br>";
          $i = 1;
        }
    }
  }
}
   ?>
</div>
  </body>
</html>
