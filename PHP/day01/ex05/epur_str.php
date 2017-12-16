#!/usr/bin/php
<?PHP

if ($argc == 2)
{
	$varray = preg_split('/ +/', $argv[1]);
	$str = implode(' ', $varray);
	echo $str."\n";
}
?>