<?php
$view_data['page_description'] = lang('make_html');
$r = $db->get_one('select count(*) from lz_item ');
$view_data['total_item_num'] = $r['count(*)'];
$view_data['pop_search_content'] = htmlspecialchars(file_get_contents(LZ_BASEPATH.'view/'.$config['template'].'/block/popular_search.html'));
/*
include_once('model/item.php');
$item = new LZ_Item;
$arr = $item->get_list();
foreach($arr as $a)
{
	$a['item_id'] = null;
	$item->add($a);
}*/
?>