<?php
LZ_MODULE != 'admin' && die('Access Denied');
$action = $_GET['action'];
$m = $_GET['m'];
$_authorized = false;
if ($_SESSION['login_user']['status'] == 'admin') $_authorized = true;
$category_id = intval($_GET['category_id']);


$item_id = intval($_GET['item_id']);
$_SESSION['category_id'] = $category_id;

include_once('model/category.php');
$category = new LZ_Category;
include_once('model/item.php');
$item = new LZ_Item;

if ($m == 'new_category')
{
	$data = filter_array($_POST,'name!,publish_time');
	$data['parent_id'] = $category_id;
	if (!$data['parent_id']) $data['parent_id'] = 0;
	if ($data)
	{
		if ($category->add( $data ) )
		{
			lz_exit(lang('CATEGORY_NEW_SUCCESS'),'admin.php?p=category&category_id='.$data['parent_id'],1);
		}
		else
		{
			$action = 'new_category';
			$err_msg = lang('CATEGOTY_NEW_ERROR');
		}
	}
	else
	{
		$action = 'new_category';
		$err_msg = lang('CATEGOTY_FILL_ALL');
		$view_data['category'] = $_POST;
	}
}


//显示分类和项目列表

$categories = $category->get_list( array('parent_id'=>$category_id) );
$_tree = $category->tree_category(0);
$view_data['all_category'] = print_category_tree_link('admin.php?p=category&category_id=',$_tree,$category_id);
$view_data['categories'] = $categories;
$view_data['page_description'] = lang('CATEGORIES_LIST');
$view_data['err_msg'] = $err_msg;
$view_data['success_msg'] = $success_msg;
$view_data['category_id'] = $category_id;
$view_data['position'] = $category->position_category($category_id);
$view_data['this_category'] = $category->get_one($category_id);

$statuses = array();
foreach($category_status as $key=>$val) $statuses[] = array('index'=>$key,'value'=>$val);
$view_data['statuses'] = $statuses;


function show_status($s)
{
	global $category_status;
	return $category_status[$s]?$category_status[$s]:"未知";
}
?>