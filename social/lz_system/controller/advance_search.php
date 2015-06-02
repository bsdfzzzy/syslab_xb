<?php
	if(!empty($_GET['year'])||!empty($_GET['number'])||
	   !empty($_GET['DOI'])||!empty($_GET['category'])||
	   !empty($_GET['institution'])||!empty($_GET['author'])||
	   !empty($_GET['name'])||!empty($_GET['description'])||
	   !empty($_GET['keyword'])||!empty($_GET['classname'])||
	   !empty($_GET['number'])||!empty($_GET['number'])||
	   !empty($_GET['page_size'])||!empty($_GET['sort_mode']))
	{
		$result;
		$condition_flag = 0;

		$year=$_GET[year];
		$number=$_GET[number];
		$DOI=$_GET[DOI];
		$category=$_GET[category];
		$institution=$_GET[institution];
		$author=$_GET[author];
		$name=$_GET[name];
		$description=$_GET[description];
		$keyword=$_GET[keyword];
		$classname=$_GET[classname];
		$page_size=intval($_GET[page_size]);
		$sort_mode= $_GET[sort_mode];
		$pid = empty($_GET['pid'])?1:$_GET['pid'];
		$_POST['pid'] = $pid;
		$cur_page = intval($pid);
		$start = ($cur_page-1)*$page_size;//limit $start,$page_size
		$view_data['start'] = $start;

		/*@function:指定位置插入字符串
		 * @par：$str原字符串
		 * $i:位置
		 * $substr:需要插入的字符串
		 * 返回：新组合的字符串
		 * */
		function str_insert($str, $i, $substr)
		{  
	        for($j=0; $j<$i; $j++)
	        {  
	            $startstr .= $str[$j];  
	        }  
	        for ($j=$i; $j<strlen($str); $j++)
	        {  
	            $laststr .= $str[$j];  
	        }  
	        $str = ($startstr . $substr . $laststr);  
	        return $str;  
	    }
		
		/*@function:数组转换为字符串
		 * @par：$array 原数组
		 * $member:需要取出的数组元素
		 * 返回：新字符串
		 * */
		function array_to_str($array,$member)
		{

			foreach ($array as $v) 
			{
				if($str != null)
				{
					$str =  $str .",". $v[$member];
				}
				else
				{
					$str = $v[$member];
				}
			}
			return $str;
		}

		function my_array_unique($array)
		{
		   	$out = array();
		   	foreach ((array)$array as $key=>$value) {
		       if (!in_array($value, $out))
				{
		           $out[$key] = $value;
		       	}
		   }
		   //sort($out,SORT_STRING);
		   return $out;
		} 

		function my_array_add($to_array,$from_array,$type)
		{
			if($to_array != null)
			{
				foreach ((array)$from_array as $n)
				{
					$flag = 0;
					foreach ((array)$to_array as $m)
					{
						if($n[$type] == $m)
						{
							$flag = 1;
						}
					}
					if($flag)
					{
						$return_array[] = $n[$type];
						$flag = 0;
					}
				}
			}
			else
			{
				foreach ((array)$from_array as $n)
				{
					$return_array[] = $n[$type];
				}
			}
			
			return $return_array;
		}
		
		function found_in($to_array,$from_array)
		{//求并
			foreach ((array)$from_array as $key => $value) {
				if(in_array($value, $to_array))
				{
					$return_array[] = $value;
				}
			}
			
			return $return_array;
		}


		//如果输入DOI则直接匹配
		if($DOI != null)
		{
			$DOI_result = $db->get_all("SELECT item_id FROM lz_item WHERE DOI like ".$DOI." ");

			$result = $DOI_result;
		}
		else
		{	//输入限定条件
			if(($year != null)||($number != null)||($category != null))
			{
				//输入限定条件 —— 期数
				if(($year != null)||($number != null))
				{
					//条件符合判断
					$condition_flag = 1;
					if($year == null)
					{
						$number_return = $db->get_all("SELECT category_id FROM lz_category WHERE name like '%".$number."%'");
					}
					elseif ($number == null) 
					{
						$number_return = $db->get_all("SELECT category_id FROM lz_category WHERE name like '".$year."%'");
					}
					else
					{
						$number_return = $db->get_all("SELECT category_id FROM lz_category WHERE name like '".$year."%".$number."%'");
					}


					$number_string = array_to_str($number_return,'category_id');

					$number_result = $db->get_all("SELECT category_id FROM lz_category WHERE parent_id in(".$number_string.")");
				}

				//输入限定条件 —— 分类
				if($category != null)
				{
					if($condition_flag == 0)
					{//未输入期数限定
						$condition_flag = 2;
					}
					else
					{//输入期数限定
						$condition_flag = 3;
					}
					
					$category_result =$db->get_all("SELECT category_id FROM lz_category WHERE name like '%".$category."%' ");

				}
				//综合期数和分类的限定结果，去重，返回限定结果
				if($condition_flag == 3)
				{
					$condition_result = found_in($category_result,$number_result);

				}
				//只返回期数限定结果
				elseif($condition_flag == 1)
				{
					$condition_result = $number_result;
				}
				//只返回分类限定结果
				elseif($condition_flag == 2)
				{
					$condition_result = $category_result;
				}

				$condition_string = array_to_str($condition_result,'category_id');

				//将category中的限定结果在lz_item表中查找，得到item_id结果，返回最终的限定结果
				if($condition_string != null)
				{
					$condition_result = $db->get_all("SELECT item_id FROM lz_item WHERE category_id in (".$condition_string.") ");

					$condition = array_to_str($condition_result,'item_id');
				}
				
				//sort($condition);
			}

			//搜索作者
			if($author != null)
			{
				//在双字作者中间加上两个空格，方便与数据库中内容匹配
				if(strlen($author) == 6)
				{
					$author = str_insert($author,3,"  " );
				}
				//如果之前限定了搜索范围
				if($condition != null)
				{
					$author_result = $db->get_all("SELECT aid FROM lz_author WHERE (author like '%".$author."%') and aid in(".$condition.") ");

				}
				else
				{
					$author_result = $db->get_all("SELECT aid FROM lz_author WHERE author like '%".$author."%'");
				}

				$result = my_array_add($result,$author_result,'aid');

			}
			

			if($institution != null)
			{
				
				if($condition != null)
				{
					$institution_result = $db->get_all("SELECT aid FROM lz_author WHERE institution like '%".$institution."%'  and (aid in(".$condition.") )");
				}
				else
				{
					$institution_result = $db->get_all("SELECT aid FROM lz_author WHERE institution like '%".$institution."%' ");
				}

				$result = my_array_add($result,$institution_result,'aid');
			}

			if($name != null)
			{
				if($condition != null)
				{
					$name_result = $db->get_all("SELECT item_id FROM lz_item WHERE name like '%".$name."%'  and (item_id in(".$condition.") )");
				}
				else
				{
					$name_result = $db->get_all("SELECT item_id FROM lz_item WHERE name like '%".$name."%' ");
				}
				$result = my_array_add($result,$name_result,'item_id');
			}

			if($description != null)
			{
				
				if($condition != null)
				{
					$description_result = $db->get_all("SELECT item_id FROM lz_item WHERE description like '%".$description."%'  and (item_id in(".$condition.") )");
				}
				else
				{
					$description_result = $db->get_all("SELECT item_id FROM lz_item WHERE description like '%".$description."%' ");
				}

				$result = my_array_add($result,$description_result,'item_id');
			}

			if($keyword != null)
			{
				
				if($condition != null){
					$keyword_result = $db->get_all("SELECT aid FROM lz_keyword WHERE keyword like '%".$keyword."%' and (aid in(".$condition.") )");
				}
				else
				{
					$keyword_result = $db->get_all("SELECT aid FROM lz_keyword WHERE keyword like '%".$keyword."%' ");
				}

				$result = my_array_add($result,$keyword_result,'aid');
			}

			if($classname != null)
			{
				
				if($condition != null)
				{
					$classname_result = $db->get_all("SELECT item_id FROM lz_item WHERE classnum like '%".$classname."%' and (item_id in(".$condition.") )");
				}
				else
				{
					$classname_result = $db->get_all("SELECT item_id FROM lz_item WHERE classnum like '%".$classname."%' ");
				}
				
				$result = my_array_add($result,$classname_result,'item_id');
			}
			
			//如果没输入查找， 就把条件当结果
			if(($author == null)&&($institution == null)&&($name == null)&&($description == null)&&($keyword == null)&&($classname == null))
			{
				$result_con = $condition;
			}
		}

		//数组去重

		$result = my_array_unique($result);

		//数组转为字符串，分item_id 和 aid两种情况
		if( $result_con != null) 
		{
			$result_string = $result_con;
		}
		else
		{
			$result_string = implode(',',$result);
		}


		//排序
		if($result_string != null)
		{
			$page_result = $db->get_all("SELECT* FROM (SELECT* FROM lz_item WHERE item_id in (".$result_string.")) as total");
		}

	

		// 获取总数据量
		$amount = count($page_result,0);



		if($result_string != null)
		{
			#echo "4  ";
			if($sort_mode == "category")
			{
				$result = $db->get_all("SELECT* FROM (SELECT* FROM lz_item  WHERE item_id in (".$result_string.") and name is not null) as total ORDER BY category_id desc limit $start,$page_size");
			}
			elseif($sort_mode == "author")
			{
				$result = $db->get_all("SELECT* FROM (SELECT* FROM lz_item WHERE item_id in (".$result_string.") and name is not null) as total ORDER BY author desc limit $start,$page_size");
			}
			elseif($sort_mode == "keyword")
			{
				$result = $db->get_all("SELECT* FROM (SELECT* FROM lz_item WHERE item_id in (".$result_string.") and name is not null) as total ORDER BY item_id desc limit $start,$page_size");
			}
		}

		$view_data['result'] = $result;	


		include("library/Pagination.php");
		$pid = empty($_GET['pid'])?1:$_GET['pid'];
		unset($_GET['pid']);
		$pagi = new Pagination($pid,$amount,$page_size,10,"index.php",$_GET);
		$view_data['pagi'] = $pagi;
		display("search_result.html");
}
else
{	/*
	$test = $db->get_all("SELECT * FROM lz_item WHERE category_id>20 ");
	$array_test =array();
	foreach ($test as $key => $value) {
		if($value['file_name']==null){
			if($test_str=stristr($value['description'],'public/uploadfiles')){
				
				$array_test = explode ('.',$test_str)[0] . '.pdf';
				$array_test = explode ('/',$array_test)[2] ;
				
				$array_test = 'public/uploadfiles/'.$array_test;
				var_dump($array_test);
				$item_id =$value['item_id'];
				//$db->get_all("UPDATE lz_item SET file_name='$array_test'  WHERE item_id='$item_id' ");
				$stringstring =" UPDATE lz_item SET file_name = '$array_test'  WHERE item_id=$item_id";
				$db->query($stringstring);
				var_dump($stringstring);
			}
		}
		
	}*/


	$year_array = $db->get_all("SELECT name FROM lz_category WHERE parent_id =1 ");
    $out = array();
    foreach ($year_array as $key=>$value) {
        $value = ereg_replace('[^0-9]', '', $value[name]);
        if($value){
            $out[$key] = $value;
        }
    }
    $year_out = array_unique($out);
    sort($year_out,SORT_NUMERIC);
	$view_data['year_out'] =$year_out;

	$name_array = $db->get_all("SELECT name FROM lz_category WHERE parent_id != '1' and parent_id != '0'" );
	
   	$tmp_arr = array();   
    foreach($name_array as $k => $v) {   
        if(in_array($v['name'], $tmp_arr)) {   
            unset($name_array[$k]);   
        } else { 
            $tmp_arr[] = $v['name'];   
        }   
    }   
    sort($tmp_arr);   
   	$name_out = $tmp_arr;
	foreach ($name_out as $key=>$value) 
    {
    	
        $value = preg_replace(array("/(.*?)•(.*?)$/is"), "", $value);
        $value = preg_replace(array("/(.*?)：(.*?)$/is"), "", $value);
        $value = preg_replace(array("/(.*?)”(.*?)$/is"), "", $value);
        $value = preg_replace(array("/(.*?)（(.*?)$/is"), "", $value);
        if(!empty($value))
    	   $category_out[$key]= $value;

    }
    $view_data['category_out'] =$category_out;
	display("advance_search.html");
}


?>
