<?php
  session_start();
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'OK')
{
  $register = 0;
  $fd = fopen("./database.csv", "c+");
  $line = fgetcsv($fd);
  $number = intval($line[count($line) - 1]);
  fclose($fd);
  $fd = fopen("./database.csv", "c+");
  while ($line = fgetcsv($fd))                               // and here we manage to read the csv
  {
       $entity = array_shift($line);
       while($line)
       {
           $id = array_shift($line);
        $field0 = array_shift($line);
           $value0 = array_shift($line);
        $a[$entity][$id][$field0] = $value0;
        $field1 = array_shift($line);
        $value1 = array_shift($line);
        $a[$entity][$id][$field1] = $value1;

        $field2 = array_shift($line);
        $value2 = array_shift($line);
        $a[$entity][$id][$field2] = $value2;

        $field3 = array_shift($line);
        $value3 = array_shift($line);
        $a[$entity][$id][$field3] = $value3;

        $field4 = array_shift($line);
        $value4 = array_shift($line);
        $a[$entity][$id][$field4] = $value4;

        $field5 = array_shift($line);
        $value5 = array_shift($line);
        $a[$entity][$id][$field5] = $value5;

      }

  }

  if (hash('whirlpool', $_POST['passwd']) == ($a['user']["1"]['pw']))
  {
    $register = 1;
  }
if ($register == 0)
{
  echo "ERROR\n";
}

else
{
  echo "connected";
}
}
?>
