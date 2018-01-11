<?php
	session_start();
	if ($_GET["login"] && $_GET["passwd"] && $_GET["submit"] == "OK")
	{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];		
	}
?>
<html>
	<body>

		<form action="index.php" method="GET">
			<label for="login">Identifiant: </label>
			<input name="login" value="<?php echo $_SESSION["login"]?>" type="text" id="login" required><br />
			<label for="passwd">Mot de passe: </label>
			<input name="passwd" value="<?php echo $_SESSION["passwd"]?>" type="password" id="passwd" required><br />
			<input type="submit" name="submit" value="OK">
		</form>

	</body>
</html>