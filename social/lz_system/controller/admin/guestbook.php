<?php
LZ_MODULE != 'admin' && die('Access Denied');

$m = $_GET['m'];
include_once('model/guestbook.php');
$obj = new LZ_Guestbook;

if ($m == 'new')
{
	$data = filter_array($_POST,'name!,email,content!');
	if ($data)
	{
		$data['date'] = time();
		echo ($obj->add($data))?'success':'error';
	}
	else 
		echo FILL_ALL;
	die;	
}

$view_data['items'] = lz_page($obj,array(),20);
$view_data['page_description'] = lang('GUESTBOOK');
$view_data['title'] = lang('GUESTBOOK');

?>