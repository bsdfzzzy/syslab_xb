<?php
class LZ_Item extends LZ_Model
{
	function LZ_Item()
	{
		$this->table = LZ_MYSQL_PREFIX.'item';
		$this->order_id = 'order_id';
		$this->id = 'item_id';
	}
	
	function add($data=array())
	{
		check_allowed_category($data['category_id'],LZ_RESPONSE == 'text');
		return parent::add($data);
	}
	
	function delete($id)
	{
		$this_item = $this->get_one($id);
		check_allowed_category($this_item['category_id'],LZ_RESPONSE == 'text');
		return parent::delete($id);
	}
	function updateFileNameAgain($id,$filename)
	{

	}
	function update($id,$data = array())
	{
		$this_item = $this->get_one($id);
		check_allowed_category($this_item['category_id'],LZ_RESPONSE == 'text');
		if ($data['category_id']) check_allowed_category($data['category_id'],LZ_RESPONSE == 'text');
		return parent::update($id,$data);
	}

	function add_view_count($id)
	{
		global $db;
		return $db->query("UPDATE $this->table SET view_count=view_count+1 WHERE $this->id='$id' LIMIT 1");
	}
	
	function get_list($data=array())
	{
		if ($data['category_id'] == 0) unset($data['category_id']);
		if (isset($data['status']))
		{
			!$data['where'] && $data['where'] = ' 1=1 ';
			$data['where'] .= " AND status IN ($data[status]) ";
			unset($data['status']);
		}
		else
			$data['status'] = '1';
		if ($data['with_children_category'])
		{
			include_once(LZ_BASEPATH.'/model/category.php');
			if ($data['category_id'])
			{
				$category = new LZ_Category;
				$tree = $category->tree_category($data['category_id']);
				$arr = array();
				$category->flat_tree($tree,$arr);
				$ids = array();
				foreach($arr as $_arr) $ids[] = $_arr['category_id'];
				$ids[] = $data['category_id'];
				if ($data['where']) $data['where'].= ' AND ';
				$data['where'] .= ' category_id IN ('.join(',',$ids).')';
			}
			unset($data['with_children_category']);
			unset($data['category_id']);
		}
		
		if (LZ_MODULE == 'admin' && $_SESSION['login_user']['rights']['limit_category_id'] && $_SESSION['login_user']['allowed_categories'])
		{
			$data['where'] && $data['where'] .= ' AND ';
			$data['where'] .= 'category_id IN ('.$_SESSION['login_user']['allowed_categories'].')';
		}
		!$data['order'] && $data['order'] = "order_id DESC,publish_time DESC";
		return parent::get_list($data);
	}

	function get_revelant_articles($id)
	{
		global $db;
		$alist = array();
		$this_item = $this->get_one($id);
		$category_id = $this_item['category_id'];
		$category_table = LZ_MYSQL_PREFIX.'category';
		$parent_id = $db->query("SELECT parent_id FROM ".$category_table." WHERE category_id = ".$category_id);
		if ($parent_id != 1)
		{
			// this item belongs to a certain group, like '物理电子学'

			// get $group_items array, it records the all elements belong to this group
			$group_name= $this_item['category_name']; // for test, no fuzzy match
			if (is_null($this_item['keywords'])){
				// use ICTCLAS to get keywords from title
			}
			else
			{
				$keywords = split("; ", $this_item['keywords']);
				for ($i = count($keywords)-1; $i >= 0; $i--)
				{
					$match_array[$i] = $db->query("SELECT item_id FROM ".$this->table." WHERE   keywords LIKE '%".$keywords[$i]."%' ");
					while ($row = mysql_fetch_array($match_array[$i], MYSQL_ASSOC)) {
						if (isset($alist[$row["item_id"]])){
							$alist[$row["item_id"]]++;
						}
						else{
							$alist[$row["item_id"]] = 1;
						}
					}
				}
				asort($alist);
				//var_dump($alist);
				if (count($alist) > 10){
					$i = 0;
					foreach ($alist as $key => $value) {
						$tmp[$key] = $value;
						if ($i <= 8){
							$i++;
						}
						else{
							break;
						}
					}
					$alist = $tmp;
				}
			}
		}
		else
		{
			// this item doesn't belongs to a certain group, only a certain journay date

		}
		foreach ($alist as $key => &$value) {
			$value = $db->get_one("SELECT name,author FROM ".$this->table." WHERE item_id = ".$key);
		}
		return $alist;
	}

	function get_same_author_articles($id)
	{
		global $db;
		$alist = array();
		$author_table = LZ_MYSQL_PREFIX.'author';
		$this_item = $this->get_one($id);
		$author_array = split("，", $this_item['author']);
		foreach ($author_array as $key => $value) {
			$alist[$value] = array();
			$aritcle_arr = $db->query("SELECT aid FROM ".$author_table." WHERE author ='".$value."'");
			while ($row = mysql_fetch_array($aritcle_arr, MYSQL_ASSOC)) {
				$article_name = $db->query("SELECT name FROM ".$this->table." WHERE item_id='".$row['aid']."'");
				$alist[$value][$row['aid']] = mysql_fetch_row($article_name);
			}
		}
		// filter the results
		foreach ($alist as $key => $value) {
			if (count($alist[$key]) == 1){
				// free $alist[$key]
				unset($alist[$key]);
			}
			else{
				// free $alist[$key][$id]
				unset($alist[$key][$id]);
			}
		}
		return $alist;
	}
}
?>