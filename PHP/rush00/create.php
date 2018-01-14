<?php 
	function create_product($id, $name, $categories, $img_path, $price, $amount_left, $details, $csv_array)
	{
		foreach ($csv_array["products"] as $key => $value) {
			if ($key == $id)
			{
				//ERROR
				exit();
			}
		}
		$array = array($id=>array(
						"name"=>$name,
						"categories"=>$categories,
						"img_path"=>$img_path,
						"price"=>$price,
						"amount_left"=>$amount_left,
						"details"=>$details
			));
		$csv_array["products"] = array_merge($csv_array["products"], $array);
	}
	// $cat = array("fruits", "nature");
	// $tmp = create_product("produit1", "banane", $cat, "../d03/img/42.pgn", "10", "5", "une tres bonne banane");
	// $tmp2 = create_product("produit2", "bandane", $cat, "../d03/img/42.pgn", "10d", "sd5", "unesdd tres bonne banane");
	// $tmp3 = array_merge($tmp, $tmp2);
	// print_r($tmp3);


	function create_category($id, $name, $csv_array)
	{
		foreach ($csv_array["categories"] as $key => $value) {
			if ($key == $id)
			{
				//ERROR
				exit();
			}
		}
		$array = array($id=>array("name"=>$name));
		$csv_array["categories"] = array_merge($csv_array["categories"], $array);
	}

	function create_user($id, $name, $password, $basket, $csv_array)
	{
		foreach ($csv_array["users"] as $key => $value) {
			if ($key == $id)
			{
				//ERROR
				exit();
			}
		}
		$tmp = hash("whirlpool", $password);
		$array = array($id=>array("name"=>$name, "password"=>$tmp, "basket"=>$basket));
		$csv_array["users"] = array_merge($csv_array["users"], $array);
	}
 ?>