<?php
$fd = fopen("./database.csv", "c+");

$str = file_get_contents("./database.csv");
$account = unserialize($str);
if ($account) {
  foreach ($account as $sub)
  {
    foreach ($sub as $k => $v) {
        if ($v['name'] === $_POST['login'] && $v['pw'] === hash('whirlpool', $_POST['oldpasswd']))
          $account['user'][$v['maki']]['pw'] = hash('whirlpool', $_POST['newpasswd']);
}
file_put_contents("./database.csv", serialize($account));
fclose($fd);

}
 ?>
