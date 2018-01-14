<?php 
	function create_product($id, $name, $categories, $img_path, $price, $amount_left, $details)
	{
		$array = array($id=>array(
						"name"=>$name,
						"categories"=>$categories,
						"img_path"=>$img_path,
						"price"=>$price,
						"amount_left"=>$amount_left,
						"details"=>$details
			));
		return $array;
		//try with str
	}
	// $cat = array("fruits", "nature");
	// $tmp = create_product("banane", $cat, "../d03/img/42.pgn", "10", "5", "une tres bonne banane");
	// print_r($tmp);
 ?>