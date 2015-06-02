<?php
if (!$view_data['categories'])
{
	include_once('model/category.php');
	$category = new LZ_Category;
	$view_data['categories'] = $category->tree_category(0);
}
?>