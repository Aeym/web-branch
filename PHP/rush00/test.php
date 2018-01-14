<?php 
	$data = array(	"eleve"=>array(
								"eleve0"=>array('name'=>"pierre", 'age'=>"15"),
								"eleve1"=>array('name'=>"john", 'age'=>"16"),
								"eleve2"=>array('name'=>"jean", 'age'=>"17")
								),
					"profs"=>array(
								"prof0"=>array('name'=>"mauricette", 'age'=>"68"),
								"prof1"=>array('name'=>"michel", 'age'=>"69"),
								"prof2"=>array('name'=>"maurice", 'age'=>"70"),
								)
				);
	echo "original array :\n";
	print_r($data);
	$fp = fopen("./database.csv", "c+");
	$tmp = 0;
	$str = "";
	foreach ($data as $key0 => $value0) {     // here we store the big array in csv format.
		if ($tmp > 0)
		{
				$str[strlen($str) - 1] = "\n";		
		}
		$str = $str.$key0.",";
		foreach ($value0 as $key1 => $value1) {
				$str = $str.$key1.",";
				$tmp1 = 0;
			foreach ($value1 as $key2 => $value2) {
					$str = $str.$key2.",";
					$str = $str.$value2.",";
			}
		}
		$tmp++;
	}
	$str[strlen($str) - 1] = "\n";
	file_put_contents("./database.csv", $str, FILE_APPEND);  // here we store the csv -
	fclose($fp);                                             // - format stored in $str in csv file.
	$fd = fopen("./database.csv", "c+");
	while ($line = fgetcsv($fd))                             // and here we manage to read the csv
	{														 // store it in the way it'll be identical
		$l = $line;											 // with the first big array
		echo "arrays from fgetcsv :\n";
		print_r($line);
   		$i = 0;
   		$key = array_shift($line);
   		$size = count($line);
   		while($line)
   		{
   			$key2 = array_shift($line);
	    	$key3 = array_shift($line);
   			$tmp = array_shift($line);
	    	$a[$key][$key2][$key3] = $tmp;
	    	$key3 = array_shift($line);
	    	$tmp = array_shift($line);
	    	$a[$key][$key2][$key3] = $tmp;
	    	$i += 4;
	    }
	}
	echo "array after csv read and analyse :\n";
	print_r($a);
	fclose($fd);
 ?>