<?php
$fd = fopen("./database.csv", "c+");

$str = file_get_contents("./database.csv");
$account = unserialize($str);
print_r($account);
 ?>
