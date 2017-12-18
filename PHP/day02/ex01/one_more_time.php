#!/usr/bin/php
<?PHP

function check_day($str)
{
	if ((preg_match("/^[Ll]undi$|^[Mm]ardi$|^[Mm]ercredi$|^[Jj]eudi$|^[Vv]endredi$|^[Ss]amedi$|^[Dd]imanche$/", $str) == 0))
		return 0;
	else
		return $str;
}

function check_month($str)
{
	if ((preg_match("/^[Jj]anvier$|^[Ff]evrier$|^[Mm]ars$|^[Aa]vril$|^[Mm]ai$|^[Jj]uin$|^[Jj]uillet$|^[Aa]out$|^[Sseptembre]$|^[Oo]ctobre$|^[Nn]ovembre$|^[Dd]ecembre$/", $str)) == 0)
		return 0;
	else
		return $str;
}

function check_day_num($int)
{
	$tmp = intval($int);
	if ($tmp < 32 && $tmp > 0)
		return ($tmp);
	else
		return 0;
}

function check_year($int)
{
	$tmp = intval($int);
	if ($tmp < 1970)
		return 0;
	else
		return $tmp;
}

function check_time($t_arr)
{
	$tmp1 = intval($t_arr[0]);
	$tmp2 = intval($t_arr[1]);
	$tmp3 = intval($t_arr[2]);
	if ($tmp1 > 23 || $tmp1 < 0 || $tmp2 > 59 || $tmp2 < 0 || $tmp3 > 59 || $tmp3 < 0)
		return 0;
	else
		return $t_arr;
}

function month_atoi($str)
{
	if ($str[0] == 'J' || $str[0] == 'j')
	{
		if($str[1] == 'a')
			return 1;
		else if ($str[3] == 'n')
			return 6;
		else
			return 7;
	}
	else if ($str[0] == 'M' || $str[0] == 'm')
	{
		if($str[2] == 'i')
			return 5;
		else
			return 3;
	}
	else if ($str[0] == 'F' || $str[0] == 'f')
		return 2;
	else if ($str[0] == 'A' || $str[0] == 'a')
	{
		if ($str[1] == 'v')
			return 4;
		else
			return 8;
	}
	else if ($str[0] == 'S' || $str[0] == 's')
		return 9;
	else if ($str[0] == 'O' || $str[0] == 'o')
		return 10;
	else if ($str[0] == 'N' || $str[0] == 'n')
		return 11;
	else if ($str[0] == 'D' || $str[0] == 'd')
		return 12;
	else
		return 0;
}

if ($argc == 2)
{
	$arr = preg_split("/ /", $argv[1]);
	$day = check_day($arr[0]);
	$day_num = check_day_num($arr[1]);
	$month = check_month($arr[2]);
	$year = check_year($arr[3]);
	$hour = check_time(preg_split("/:/", $arr[4]));
	if ($day !== 0 && $day_num !== 0 && $month !== 0 && $year !== 0 && $time !== 0)
	{
		date_default_timezone_set('UTC');
		$time = mktime(intval($hour[0]), intval($hour[1]), intval($hour[2]), month_atoi($month), $day_num, $year, 1);
		echo $time."\n";

	}
	else
		echo "Wrong Format";
}
?>