<?php
	$data = array();
	if(empty($_GET['type'])||$_GET['type']=='time')
		$data = $db->get_all("select i.* from lz_item as i,lz_category as c where i.category_id=c.category_id AND c.parent_id<>0 AND i.status!=0 AND i.recommend=1 order by publish_time desc LIMIT 20");
		//$data = $db->get_all("select i.* from lz_item as i,lz_category as c,lz_category as d where i.category_id = c.category_id AND ((c.parent_id =d.category_id AND d.category_id=1) OR (c.category_id=1)) AND i.status!=0 order by publish_time desc LIMIT 20");
	else if($_GET['type']=='view')
		$data = $db->get_all("select i.* from lz_item as i,lz_category as c where i.category_id=c.category_id AND c.parent_id<>0 AND i.status!=0 order by view_count desc LIMIT 20");
		//$data = $db->get_all("select i.* from lz_item as i,lz_category as c  where i.category_id = c.category_id AND c.parent_id =1 AND i.status!=0 order by view_count desc LIMIT 20");
	else if($_GET['type']=='download')
		$data = $db->get_all("select i.* from lz_item as i,lz_category as c where i.category_id=c.category_id AND c.parent_id<>0 AND i.status!=0 order by download_count desc LIMIT 20");
		//$data = $db->get_all("select i.* from lz_item as i,lz_category as c  where i.category_id = c.category_id AND c.parent_id =1 AND i.status!=0 order by download_count desc LIMIT 20");


	$view_data['ranklist'] = $data;
	$view_data['ranklist_type'] = $_GET['type'];
	display("ranklist.html");

?>