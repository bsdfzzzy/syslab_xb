<?php
!defined('LZ_MODULE') && die('Access Denied');
$m = $_GET['m'];
include_once('model/guestbook.php');
$obj = new LZ_Guestbook;
include_once('model/item.php');
$item = new LZ_Item;


if ($m == 'new')
{
	$data = filter_array($_POST,'htmlspecialchars:name!,htmlspecialchars:email,htmlspecialchars:content!');
	if ($data)
	{
		$data['time'] = time();
		echo ($obj->add($data))?'success':'error';
	}
	else 
		echo lang('FILL_ALL');
	die;
}

$items = lz_page($obj,array('status'=>1),(intval($config['guestbook_per_page']))?intval($config['guestbook_per_page']):10);

$view_data['items'] = $items;
$view_data['title'] = lang('TITLE').' '.$config['site_name'];
$view_data['item'] = $item->get_one( array( 'category_id'=>83,'status'=>3));
?>