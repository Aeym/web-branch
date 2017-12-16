#!/usr/bin/php
<?PHP

$str1 = "Le chiffre ";
$str2 = "Entrez un nombre: ";

while (1)
{
	echo $str2;
	$line = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
		exit();
	if (is_numeric($line))
	{
		if (($line % 2) == 0)
		{
			echo $str1.$line." est Pair\n";
		}
		else
		{
			echo $str1.$line." est Impair\n";
		}
	}
	else
	{
		echo "'$line' n'est pas un chiffre\n";
	}
}
?>
