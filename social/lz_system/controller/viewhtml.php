<?php
	$item_id = $_GET["item_id"];
	$map = "update lz_item set view_count=view_count+1 where item_id=".$item_id;
	$db->query($map);
	$map = "select file_name from lz_item where item_id=$item_id limit 1";
	$file_name = $db->get_all($map);
	$name = explode("/", $file_name[0]['file_name']);
	$file_path =explode(".", $name[2]);
	$view_data['swf_name']  = "public/swf/".$file_path[0].".swf";
	display("viewhtml.html");
?>