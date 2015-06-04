<?php
LZ_MODULE != 'admin' && die('Access Denied');

include_once('model/category.php');
$category = new LZ_Category;
include_once('model/item.php');
$item = new LZ_Item;

$result = $item->update($_POST['id'],array("recommend"=>$_POST['recommend']));
if($result)
{
	lz_exit(lang('提交成功'),'admin.php?p=item',1);
}
else
{
	lz_exit(lang('提交失败'),'admin.php?p=item',1);
}