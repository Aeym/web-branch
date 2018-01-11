<?php
	session_start();
	if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK")
	{
		$hp = hash("whirlpool", $_POST["passwd"]);
		if (file_exists("~/private") ==  FALSE)
		{
			mkdir("~/private", 0777, true);
		}
		if (file_exists("~/private/passwd") == FALSE)
		{
			$array = array(array('login' => $_POST["login"], 'passwd' => $hp));
			$seri = serialize($array);
			file_put_contents("~/private/passwd", $seri);
			echo "OK\n";
		}
		else
		{
			$bool = FALSE;
			$arr = unserialize(file_get_contents("~/private/passwd"));
			foreach ($arr as $elem)
			{
				if ($elem["login"] == $_POST["login"])
					$bool = TRUE;
			}
			if ($bool == FALSE)
			{
				$ar = array("login"=>$_POST["login"], "passwd"=>$_POST["passwd"]);
				file_put_contents("~/private/passwd", serialize($ar), FILE_APPEND);
				echo "OK\n";
			}
			else
				echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
?>