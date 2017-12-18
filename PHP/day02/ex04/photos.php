#!/usr/bin/php
<?PHP

function get_data($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function get_img($file_url) {
	$tmp = strrev($file_url);
	preg_match("/^.[^\/]+\//", $tmp, $match);
	$back = substr($match[0], 0, strlen($match[0]) - 1);
	$saveTo = strrev($back);
	$fp = fopen($saveTo, 'w+');
	//attention a proteger le retour de fopen
	$ch = curl_init($file_url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_exec($ch);
	curl_close($ch);
	return $saveTo;
}

$str = get_data($argv[1]);
preg_match_all("/<img .[^>]+>/", $str, $match);
$i = 0;
$size = count($match[0]);
print_r($match);
preg_match("/www.+$/", $argv[1], $tmp_dir);
$dir_name = $tmp_dir[0];
mkdir($dir_name);
while($i < $size)
{
	preg_match("/src=\".[^\"]+\"/", $match[0][$i], $match2);
	preg_match("/\".+\"/", $match2[0], $match3);
	print_r($match2);
	$i++;
	$tmp = substr($match3[0], 1, strlen($match3[0]) - 2);
	$ret = get_img($tmp);
	rename($ret, "./".$dir_name."/".$ret);
}
?>