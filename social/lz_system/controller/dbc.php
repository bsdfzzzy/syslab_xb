<?php
	$i=1;
	if($_GET['type']=="author")
	{
		$data = $db->get_all("select item_id,author from lz_item");
		$len = count($data);
		$map = "insert into lz_author(aid,author) ";
		foreach($data as $value)
		{
			$author_arr = explode("，",$value['author']);
			foreach ($author_arr as $value2) {
				$db->query($map ."values('".$value['item_id']."','".$value2."')");
			}
			echo $i++."/".$len."</br>";
		}
	}
	else if($_GET['type']=="keyword")
	{	
		$data = $db->get_all("select item_id,keywords from lz_item");
		$len = count($data);
		$map = "insert into lz_keyword(aid,keyword) ";
		foreach($data as $value)
		{
			$keyword_arr = explode(";",$value['keywords']);
			foreach ($keyword_arr as $value2) {
				$db->query($map ."values('".$value['item_id']."','".$value2."')");
			}
			echo $i++."/".$len."</br>";
		}
	}
	else if($_GET['type']=="pdf")
	{	
		$data = $db->get_all("select item_id,description from lz_item");
		$len = count($data);
		$fname = "";
		$map = "update lz_item ";
		foreach($data as $value)
		{
			preg_match('/"public\S*.pdf"/', $value['description'],$fname);
			$fname = substr($fname[0], 1,-1);
			//echo $map."set file_name=".$fname." where item_id=".$value['item_id']."</br>";
			if(!empty($fname))
				$db->query($map."set file_name='".$fname."' where item_id=".$value['item_id']);
			echo $i++."/".$len."</br>";
		}
	}