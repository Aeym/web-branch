#!/usr/bin/php
<?PHP

if ($argc >= 2)
{
	$varray = preg_split('/[ \\t]+/', $argv[1]);
	if ($argv[1][0] == " " || $argv[1][0] == "\t")
		array_shift($varray);
	if ($argv[1][strlen($argv[1]) - 1] == " " || $argv[1][strlen($argv[1]) - 1] == "\t")
		array_pop($varray);
	$str = implode(' ', $varray);
	echo $str."\n";
}