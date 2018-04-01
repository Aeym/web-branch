<?php
    $data = array(    "user"=>array(
                                "1"=>array('name'=>"admin", 'pw'=>hash('whirlpool', "123"), 'email'=>'seliasbe@student.42.fr', 'nom'=> "Elisabeth-Flora", 'prenom'=>"Sofian", 'level'=> 3, 'maki'=> 1),
                                "2"=>array('name'=>"superpaul", 'pw'=>hash('whirlpool', "paul123"), 'email'=>'superpaul@gmail.com', 'nom'=> "Pogba", 'prenom'=>"Paul", 'level'=> 2, 'maki'=> 2),
                                "3"=>array('name'=>"superjacques", 'pw'=>hash('whirlpool', "jacques123"), 'email'=>'frerejacques@gmail.com', 'nom'=> "Frere", 'prenom'=>"Jacques", 'level'=> 1, 'maki'=> 3)
                                ),
                    "products"=>array(
                                "1"=>array('title'=>"Message From the King", 'price'=>"69", 'stock'=>"5", 'url'=>"https://images-na.ssl-images-amazon.com/images/M/MV5BMzdkODAxMjItODFmNC00NWMwLTg5MzYtYTQ3NTU2YTlkNzdkXkEyXkFqcGdeQXVyNzMzODUxODE@._V1_SY1000_CR0,0,749,1000_AL_.jpg", 'genre'=>array("action"), 'makip'=> 1),
                                "2"=>array('title'=>"Stars Wars 8", 'price'=>"15", 'stock'=>"5", 'url'=>"https://images-na.ssl-images-amazon.com/images/M/MV5BMjQ1MzcxNjg4N15BMl5BanBnXkFtZTgwNzgwMjY4MzI@._V1_SY1000_CR0,0,675,1000_AL_.jpg", 'genre'=>array("horror"), 'makip'=> 2),
                                "3"=>array('title'=>"The Chaser", 'price'=>"69", 'stock'=>"5", 'url'=>"https://images-na.ssl-images-amazon.com/images/M/MV5BY2ViOTU5MDQtZTRiZi00YjViLWFiY2ItOTRhNWYyN2ZiMzUyXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY1000_SX704_AL_.jpg", 'genre'=>array("comedy", "action"), 'makip'=> 3),
                              ),
                    "categories"=>array(
                      "1"=> array('categ'=>"action", 'makic'=>1),
                      "2"=> array('categ'=>"horror", 'makic'=>2),
                      "3"=> array('categ'=>"comedy", 'makic'=>3),
                             ),
                    "orders"=>array(),
              );
    $fp = fopen("./database.csv", "c+");
    file_put_contents("./database.csv", serialize($data));  // here we store the csv -
    fclose($fp);
                              // - format stored in $str in csv file.
 ?>
