<?php 
echo urlencode(' ');
die;
$filename = $_GET['filename'];
$filepath = $_GET['filepath'];
if ($_GET['base64encoded'])
{
	$filepath = base64_decode($filepath);
	$filename = base64_decode($filename);
}
$filesize = filesize($filepath);
if (preg_match(’/MSIE/’,$_SERVER['HTTP_USER_AGENT'])) $filename = rawurlencode($filename);
header('Pragma: public');
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0');
header('Content-Transfer-Encoding: binary');
header('Content-Encoding: none');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Content-length: '.$filesize);
?>