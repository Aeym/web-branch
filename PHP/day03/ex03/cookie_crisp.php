<?php
if (isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] == "del")
		setcookie($_GET["name"], NULL, 1);
	else if ($_GET["action"] == "set") {
		setcookie($_GET["name"], $_GET["value"], time() + 24 * 3600);
	}
	else if ($_GET["action"] == "get") {
			echo $_COOKIE[$_GET["name"]];
			if (isset($_COOKIE[$_GET["name"]]))
				echo "\n";
	}
}
?>