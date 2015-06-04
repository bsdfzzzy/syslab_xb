<?php
!defined('LZ_MODULE') && die('Access Denied');
filter_array($_GET,'action,m,intval:item_id!',true);
if (!$item_id) die('Access Denied');
include_once(LZ_BASEPATH.'model/item.php');
$item = new LZ_Item;
include_once(LZ_BASEPATH.'model/category.php');
$category = new LZ_Category;

//load news data from a config file
//config_data('left.config');

//add view_count
$item->add_view_count($item_id);

$this_item = $item->get_one($item_id);
$this_category = $category->get_one($this_item['category_id']);
$category_id = $this_item['category_id'];
if ($this_category['parent_id']>0)
{
	$view_data['parent_category'] = $category->get_one($this_category['parent_id']);
}
$position = $category->position_category($category_id);
$url = $position[count($position)-1]['url'];
$lz_make_html_total_page = $info['total_page'];

$view_data['item'] = $this_item;
$view_data['title'] = $this_item['name'].' '.$config['site_name'];
$view_data['description'] = $this_item['metadescription'];
$view_data['keywords'] = $this_item['keywords'];
$view_data['item_id'] = $item_id;
$view_data['category_id'] = $category_id;
$view_data['position'] = $position;
$view_data['category_tree'] = $category->tree_category($category_id);
$view_data['category_tree'] = $category->tree_category($category_id);
if (count($view_data['category_tree']) <= 0)
{
	$view_data['sibling_category'] = $category->tree_category($this_category['parent_id']);
}
else
{
	$view_data['sibling_category'] = $view_data['category_tree'];
}
if ($this_category['parent_id'] == "0" ) $view_data['sibling_category'] = array($this_category);

$view_data['category'] = $this_category;	
if ($this_item['status'] == 3 && count($view_data['category_tree']) == 0)
{
	$view_data['category'] = $category->get_one($this_category['parent_id']);
	$view_data['category_tree'] = $category->tree_category($this_category['parent_id']);
}

if ($_GET['preview'])
{
	$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
}
else if ($this_item['status'] != '1' && $this_item['status'] != '3') die('Access Denied');


?>