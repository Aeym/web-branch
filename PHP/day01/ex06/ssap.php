#!/usr/bin/php
<?php

$varstr = $argv[1];
for ($i = 2; $i < $argc; $i++)
{
	if ($i < $argc)
		$varstr = $varstr." ";
	$varstr = $varstr.$argv[$i];
}

if ($argc >= 2)
{
	$varray = preg_split('/ +/', $varstr);
	sort($varray);
	$str = implode("\n", $varray);
	echo $str."\n";
}
?>