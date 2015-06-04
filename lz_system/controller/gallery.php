<?php
$folder = $_GET['folder'];
if (!preg_match('/^[a-z0-9_]+$/i',$folder)) die('invalid folder');
$folder_path = LZ_TOPPATH.'public/index_images/'.$folder.'/';
if (!is_dir($folder_path)) die('folder not found!');
$r = opendir($folder_path);
$images = array();
while(($v = readdir($r)) !== false)
{
	if (is_file($folder_path.$v) && preg_match('/\.(jpg|jpeg|png|gif)$/i',$v))
	{
		$images[] = array('url'=>'public/index_images/'.urlencode($folder).'/'.$v,'filename'=>basename($v));
	}
}
closedir($r);
$view_data['imgs'] = $images;
?>