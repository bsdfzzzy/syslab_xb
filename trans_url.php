<?php
$url = $_GET['url'];
$url = base64_decode($url);
$path = dirname($url).'/';
$name = basename($url);
$name = str_replace(array(' ','+'),'%20',$name);
header("LOCATION:".$path.$name);
?>