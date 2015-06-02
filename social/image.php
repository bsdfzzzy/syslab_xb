<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$path = $_GET["path"];
$method = $_GET['method'];
$max = $_GET["max"];
$etag = md5($path.$max);
if (@$_SERVER['HTTP_IF_NONE_MATCH'] == $etag)
{
	header('Etag:'.$etag,true,304);
	exit;
}
else
{
	header('Etag:'.$etag);
	header('Last-Modified:Tue,01 Aug 1999 10:26:24 GMT');
}

if (!file_exists($path)) 
{
	header("location:$path");
	die;
}

if (!$imgarr=@getimagesize($path)) err(); 
$width_orig=$imgarr[0];
$height_orig=$imgarr[1];
$mime_orig=$imgarr["mime"];
$mime=str_replace("image/","",$mime_orig);
$mime=($mime=="bmp")?"wbmp":$mime;
if (!function_exists("imagecreatefrom$mime")) err();

if ($method == 'box')
{
	if ($width_orig >= $height_orig && $width_orig>$max)
	{
		$width =$max;
		$height = ($max / $width_orig) * $height_orig;
	}
	else if ($width_orig<$height_orig && $height_orig>$max)
	{
		$height=$max;
		$width=($max/$height_orig)*$width_orig;
	}
	else err();
}
else
{
	if ($width_orig <= $height_orig && $width_orig>$max)
	{
		$width =$max;
		$height = ($max / $width_orig) * $height_orig;
	}
	else if ($width_orig>$height_orig && $height_orig>$max)
	{
		$height=$max;
		$width=($max/$height_orig)*$width_orig;
	}
	else err();
}

$image_p = @imagecreatetruecolor($width, $height) or err();
if (@eval('$image = imagecreatefrom'.$mime.'($path);')===false) err();
@imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig) or err();

header('Pragma: public');
header('Content-type: '.$mime_orig);
header("Content-Length: ".filesize($path));
header("Last-Modified: ".date("D, d M Y H:i:s",filectime($path))." GMT");
header('Cache-Control: public');
header('Content-Disposition: attachment; filename="'.basename($path).'"');

if (@eval('image'.$mime.'($image_p, null,90);')===false) err();

function err()
{
	global $path;
	header("Content-Length: ".@filesize($path));
	readfile($path);
	die;
}
die;
?>