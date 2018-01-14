<?php 

// When can clic on modify buttons : user category and product
// It calls the following functions, with some inputs (depend on what we modify)


	function modify_user()
	{
		$str_file = file_get_contents("./database.csv");
	}

	function modify_category()
	
		$str_file = file_get_contents("./database.csv");
	}

	function modify_product($var) // we send $_POST to the function after input in html
	{
		//$str_products = strstr(file_get_contents("./database.csv"), "products");
		$arr = array(); // $arr = csvtoarray(./database.csv)
		$bool = FALSE;
		foreach ($array["products"] as $key => $value) {
			if ($value = $var["id"])
				$bool = TRUE;
		}
		if ($bool == TRUE)
		{
			$array["products"][$var["id"]]["name"] = $var["name"];
			$array["products"][$var["id"]]["categories"] = $var["categories"];
			$array["products"][$var["id"]]["img_path"] = $var["img_path"];
			$array["products"][$var["id"]]["price"] = $var["price"];
			$array["products"][$var["id"]]["amount_left"] = $var["amount_left"];
			$array["products"][$var["id"]]["details"] = $var["details"];
		}
		else
			//ERROR
	}

	function modify_elem($elem)
	{
		if ($elem == "user")
		{
			modify_user();
		}
		else if ($elem == "category")
		{
			modify_category();
		}
		else if ($elem == "product")
		{
			modify_product();
		}
		else
		{
			// ERROR
		}
	}
 ?>