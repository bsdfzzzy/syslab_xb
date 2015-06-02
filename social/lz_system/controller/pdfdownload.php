<?php
	//重定向下载链接	
	$filepath = "../";
	$filepath .= $_GET["file"];
	$item_id = $_GET["item_id"];
	$map = "update lz_item set download_count=download_count+1 where item_id=".$item_id;
	if(!empty($_GET["file"])&&file_exists($filepath))
	{
		display(false);
		$db->query($map);
		$name = explode("/", $filepath);
		$name = count($name)==1?$name[0]:$name[count($name)-1];
		force_download($name,file_get_contents($filepath));
		//header("location:public/uploadfiles/".$file);
	}
	else
		exit("无此文件");
