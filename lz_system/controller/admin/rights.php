<?php
LZ_MODULE != 'admin' && die('Access Denied');
include_once('model/rights.php');
$rights = new LZ_Rights;
$m = $_GET['m'];
include_once('model/category.php');
$category = new LZ_Category;

$rights_id = $_GET['rights_id'];
if ($m == 'new_group')
{
	$data = filter_array($_POST,'name!');
	if ($data && $rights->add($data))
	{
		lz_exit(lang('rights_add_success'),'admin.php?p=rights');
	}
	else
		lz_exit(lang('rights_add_failed'),'admin.php?p=rights');
}
elseif ($m == 'config' && $rights_id)
{
	$r = array();
	foreach($_POST as $key=>$val)
	{
		if (strtolower($val) == 'on') $r[] = $key;
	}
	$data['rights'] = join(',',$r);
	if ($rights->update($rights_id,$data)) lz_exit(lang('rights_updated'),'admin.php?p=rights');
}
if ($rights_id)
{
	$_SESSION['login_user']['rights']['limit_category_id'] = false;
	$view_data['rights'] = $lz_rights;
	$arr = $rights->get_one($rights_id);
	$view_data['this_group'] = $arr;
	$category->flat_tree($category->tree_category(0),$view_data['categories']);
	$r = explode(',',$arr['rights']);
	foreach($r as $val) $view_data['this_rights'][$val] = true;
}

$view_data['groups'] = $rights->get_list();
$view_data['page_description'] = lang('rights');
?>