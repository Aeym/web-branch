#!/usr/bin/php
<?php
if ($argc != 2)
  exit();
$fd = fopen($argv[1], "r");
$homepage = file_get_contents($argv[1]);
$ret = preg_replace_callback("/<a .+\/a>/", function($words) {
  $words[0] = preg_replace_callback("/>.[^<]+</", function($words2) {
    return (strtoupper($words2[0]));}, $words[0]);
  $words[0] = preg_replace_callback("/title=\".+\"/", function($words3) {
    $words3[0] = preg_replace_callback("/\".+\"/", function($words4) {
      return (strtoupper($words4[0]));}, $words3[0]);
    return ($words3[0]);}, $words[0]);
  return ($words[0]);}, $homepage);
  echo $ret;
  ?>