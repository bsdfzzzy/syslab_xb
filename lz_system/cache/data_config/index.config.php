<?php
!defined("LZ_BASEPATH") && die("this is just a cache!");
include_once(LZ_BASEPATH."model/item.php");
$obj = new LZ_item;
$view_data["news"] = $obj->get_list( array('total'=>'9','category_id'=>'2',) );
?>