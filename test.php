<?php
$patstr="\(.*?\)|（.*?）";
$repstr="";
$sourcestr="(A)しょうゆ";

$str=mb_ereg_replace($patstr, $repstr, $sourcestr);

print($str."\n");
?>
