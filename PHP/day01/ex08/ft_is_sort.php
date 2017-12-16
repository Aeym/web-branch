<?PHP

function ft_is_sort($var_ar)
{
	$tmp = $var_ar;
	sort($tmp);
	if ($tmp == $var_ar)
		return 1;
	else
		return 0;
}

?>