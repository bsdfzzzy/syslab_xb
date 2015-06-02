<?php
//cache_this_page(200);
config_data('index.config');
$view_data['title'] = "首页".' - '.$config['site_name'];
//$view_data['bigphoto'] = json_encode($view_data['bigphoto']);


include_once(LZ_BASEPATH.'model/item.php');
$item = new LZ_Item;
include_once(LZ_BASEPATH.'model/category.php');
$category = new LZ_Category;

$category_id = $_GET['cid'];
$this_category = $category->get_one($category_id);
//获取上期 当前期 下一期
$view_data['prev_cur_next'] = $category->get_prev_next($category_id);

if ($this_category['parent_id']>0)
{
	$view_data['parent_category'] = $category->get_one($this_category['parent_id']);
}
$position = $category->position_category($category_id);
$view_data['category_id'] = $category_id;
$view_data['category'] = $this_category;
$view_data['position'] = $position;
$view_data['description'] = $this_category['description'];
$view_data['title'] = $this_category['name'].' '.$config['site_name'];
$view_data['category_tree'] = $category->tree_category($category_id);
if (count($view_data['category_tree']) <= 0)
{
	$view_data['sibling_category'] = $category->tree_category($this_category['parent_id']);
	if ($this_category['parent_id'] == "0" ) $view_data['sibling_category'] = array($this_category);
}
else
{
	$view_data['sibling_category'] = $view_data['category_tree'];
}


if ($this_category['status'] == 2) //如果是单网页
{
	$view_data['page_type'] = 'page';
	$view_data['item'] = $item->get_one($this_category['item_id']);
}
else
{
	$view_data['page_type'] = 'category';
	$view_data['keywords'] = $this_category['keywords'];
	$items = lz_page($item,array('category_id'=>$category_id,'with_children_category'=>1),(intval($config['category_list_page_size']))?intval($config['category_list_page_size']):9);
	$view_data['items'] = $items;
	if(!empty($view_data['category_tree']))
	foreach($view_data['category_tree'] as $_key=>$_cat)
	{
		$view_data['category_tree'][$_key]['items'] = $item->get_list
		( 
			array(
				'category_id'=>$_cat['category_id'],
				'with_children_category'=>1,
				'total'=>$config['children_category_items_num']?$config['children_category_items_num']:7,
			)
		);
	}
}

$_categories_array = $category->get_list( array() );
$categories_array = array();
foreach($_categories_array as $_cat)
{
	$categories_array[$_cat['category_id']] = $_cat;
}
function category_name($id)
{
	global $categories_array;
	return $categories_array[$id]['name'];
}


//display("../admin/index.html");//why addon
//print_r($view_data);die;
?>