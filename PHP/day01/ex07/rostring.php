#!/usr/bin/php
<?PHP

if ($argc > 1)
{
	$varray = preg_split('/ +/', $argv[1]);
	$c = count($varray);
	for ($i = 1; $i < $c; $i++)
	{
		echo $varray[$i]." ";
	}
	echo $varray[0]."\n";
}

?>