<?php
if ($_POST['login'] && $_POST['passwd'] && $_POST['nom'] && $_POST['prenom'] && $_POST['email'] && $_POST['submit'] == 'OK')
{
  $nickfound = 0;
	$data = unserialize(file_get_contents('./database.csv'));
  $i = count($data['user']);
  foreach($data as $type)
    {
      foreach ($type as $id)
      {
        if ($id['name'] && $id['name'] == $_POST['login'])
        {
          $nickfound = 1;
        }
      }
    }
    if ($nickfound == 1)
		  echo "ERROR\nUser Already Exist";
    else
     {
       $ret['name'] = $_POST['login'];
       $ret['pw'] = hash('whirlpool', $_POST['passwd']);
       $ret['email'] = $_POST['email'];
       $ret['nom'] = $_POST['nom'];
       $ret['prenom'] = $_POST['prenom'];
       $ret['maki'] = $i + 1;
       $ret['level'] = 1;
       array_push($data['user'], $ret);
       file_put_contents('./database.csv', serialize($data));
       header("Location: ./index.php");

     }
   }
?>
