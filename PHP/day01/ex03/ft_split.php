#!/usr/bin/php
<?PHP

function ft_split($my_var)
{
	$varray = preg_split('/ +/', $my_var);
	sort($varray);
	return $varray;
}
?>