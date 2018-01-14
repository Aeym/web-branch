<?php 

	function csvtoarray()
	{
		$fd = fopen("./database.csv", "c+");
		$i = 0;
		$j = 0;
		$k = 0;
		$l = 0;
		$arr = array();
		while ($line = fgetcsv($fd))                             // and here we manage to read the csv
		{				
   			echo "i = ".$i."\n";
			echo "arrays from fgetcsv :\n";
			print_r($line);
			$size_line = count($line);
			echo $size_line."\n\n";
   			$key = $line[0];
   			echo $key."\n";
   			if ($key == "users")
   			{
   				while($i < ($size_line - 1))
   				{
    				$key2 = $line[++$i];
	    			$key3 = $line[++$i];
					$tmp = $line[++$i];
   		 			$a[$key][$key2][$key3] = $tmp;
   	 				$key3 = $line[++$i];
    				$tmp = $line[++$i];
    				$a[$key][$key2][$key3] = $tmp;
    				$key3 = $line[++$i];
    				$tmp = $line[++$i];
    				$a[$key][$key2][$key3] = $tmp;
    			}
   			}
   			else if ($key == "categories")
   			{
   				while($j < ($size_line - 1))
   				{
   					$key2 = $line[++$j];
   					$key3 = $line[++$j];
   					$tmp = $line[++$j];
   		 			$a[$key][$key2][$key3] = $tmp;
   		 			$key2 = $line[++$j];
   	 				$key3 = $line[++$j];
    				$tmp = $line[++$j];
    				$a[$key][$key2][$key3] = $tmp;
   					
   				}
   			}
   			else if ($key == "products")
   			{
   				echo "k = ".$k."\n";
   				while($k < ($size_line - 1))
   				{
   					$key2 = $line[++$k];
   					$key3 = $line[++$k];
   					$tmp = $line[++$k];
   		 			$a[$key][$key2][$key3] = $tmp;
   	 				$key3 = $line[++$k];
    				$tmp = $line[++$k];
    				$a[$key][$key2][$key3] = $tmp;
    				$key3 = $line[++$k];
    				$tmp = $line[++$k];
    				$a[$key][$key2][$key3] = $tmp;
    				$key3 = $line[++$k];
    				$tmp = $line[++$k];
    				$a[$key][$key2][$key3] = $tmp;
	   				echo "k = ".$k."\n"; 					
   				}
   			}
   			else
   			{
   				//ERROR
   			}
		}
		return $a;
	}
	$tmp = csvtoarray();
	 print_r($tmp);
 ?>