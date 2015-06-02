<?php
if ($_SESSION['login_user']['status'] != 'admin') die('access denied');
$make = $_GET['make'];
$ids = $_GET['ids'];
$time = intval($_GET['time']);
$pertime = intval($_GET['pertime']);
$content = $_POST['content'];
$_GET = array();
$_POST = array();
$_REQUEST = array();
list($_usec, $_sec) = explode(' ', microtime()); 
$_make_html_time_start = (float)$_usec + (float)$_sec;
if ($make == 'index')
{
	$lz_make_html_path = LZ_TOPPATH.'index.html';
	include(LZ_BASEPATH.'index.php');
	echo $lz_make_html_status?'success '.$lz_time_used:'error';
}
else if ($make == 'category')
{
	include_once(LZ_BASEPATH.'model/category.php');
	$category = new LZ_Category;
	$category_id = intval($_GET['category_id']);
	$tree = $category->tree_category($category_id);
	$categories = array();
	$category->flat_tree($tree,$categories);
	$_html_out = '';
	foreach($categories as $c)
	{
		$_GET = array();
		$_POST = array();
		$_REQUEST = array();
		$_GET['p'] = 'category';
		$_GET['category_id'] = $c['category_id'];
		$lz_make_html_total_page = 0;
		$lz_make_html_path = str_replace('//','/',LZ_TOPPATH.$c['url'].'index.html');
		include(LZ_BASEPATH.'index.php');
		$_html_out.= 'make '.$c['name'].' ';
		if ($lz_make_html_total_page>1)
		{
			for($_lz_i_=2;$_lz_i_<=$lz_make_html_total_page;$_lz_i_++)
			{
				$_GET['page'] = $_lz_i_;
				$lz_make_html_path = str_replace('//','/',LZ_TOPPATH.$c['url'].$_lz_i_.'.html');
				include(LZ_BASEPATH.'index.php');
				$_html_out.= '['.$_lz_i_.']';
			}
		}
		
		$_html_out.= $lz_make_html_status?'success '.$lz_time_used:'error';
		$_html_out.= "<br />\n";
	}
	echo $_html_out;
}
else if ($make == 'item')
{
	include_once('model/item.php');
	$item = new LZ_Item;
	$from = $pertime*$time;
	if (!$ids)
	{
		$items = $db->get_all('SELECT * from lz_item where 1=1 LIMIT '.$from.','.$pertime);
	}
	else
	{
		$items = $db->get_all('SELECT * FROM lz_item WHERE item_id IN ($ids)');
	}
	$_html_out = '';
	$lz_make_n=0;
	foreach($items as $_item)
	{
		$_GET = array();
		$_POST = array();
		$_REQUEST = array();
		$_GET['p'] = 'item';
		$_GET['item_id'] = $_item['item_id'];
		$lz_make_n++;
		//$_html_out .= '<br />make '.$_item['name'].' ';
		$lz_make_html_path = LZ_TOPPATH.$_item['url_name'].'.html';
		include(LZ_BASEPATH.'index.php');
		//$_html_out.= ($lz_make_html_status)?' '.$lz_time_used:' error';
		$_GET['p'] = 'download';
		include(LZ_BASEPATH.'index.php');
		//$_html_out.= ($lz_make_html_status)?' (download '.$lz_time_used.')':' (download error)';
		$_GET['p'] = 'screenshot';
		include(LZ_BASEPATH.'index.php');
		//$_html_out.= ($lz_make_html_status)?' (screenshot '.$lz_time_used.')':' (screenshot error)';
	}
	echo $lz_make_n;
	list($_usec, $_sec) = explode(' ', microtime()); 
	$_make_html_time_end = (float)$_usec + (float)$_sec;
	$make_html_time_used = intval(($_make_html_time_end-$_make_html_time_start)*1000)/1000;
	echo ','.$make_html_time_used;
	die;
}
else if ($make == 'more_pop_soft')
{
	$s = '<div class="div_center2">';
	$s.=' <h2><span class="black_11">More Popular Software </span> </h2>';
	$_n=0;
	$max = $config['more_pop_soft_num'];
	while($_n < $max)
	{
		$one = $db->get_one("SELECT * FROM lz_item WHERE item_id >= floor( rand( ) * (SELECT max( item_id ) FROM lz_item ) )  LIMIT 1");
		if(is_array($one) && count($one)>0)
		{
			$_n++;
			$s.= '<div class="div_dir1_txt"><a href="'.$one['url'].'">'.$one['name'].'</a></div>';
			if ($_n % 5 == 0) $s.= '<div class="clear"></div>';
		}
	}
	$s.= '<br/></div>';
	echo file_put_contents(LZ_BASEPATH.'view/'.$config['template'].'/block/more_pop_soft.html',$s)?'success':'error';
}
else if ($make == 'soft_download')
{
	$s = '<div class="div_center2">';
	$s.=' <h2><span class="black_11">Software Download</span> </h2>';
	$_n=0;
	$max = $config['soft_download_num'];
	while($_n < $max)
	{
		$one = $db->get_one("SELECT * FROM lz_item WHERE item_id >= floor( rand( ) * (SELECT max( item_id ) FROM lz_item ) )  LIMIT 1");
		if(is_array($one) && count($one)>0)
		{
			$_n++;
			$s.= '<div class="div_dir1_txt"><a href="'.$one['url'].'">'.$one['name'].'</a></div>';
			if ($_n % 5 == 0) $s.= '<div class="clear"></div>';
		}
	}
	$s.= '<br/></div>';
	echo file_put_contents(LZ_BASEPATH.'view/'.$config['template'].'/block/software_download.html',$s)?'success':'error';
}
else if ($make == 'pop_search')
{
	if ($content)
	{
		echo file_put_contents(LZ_BASEPATH.'view/'.$config['template'].'/block/popular_search.html',$content)?'success':'error';
	}
	else echo 'empty!';
	die;
}
list($_usec, $_sec) = explode(' ', microtime()); 
$_make_html_time_end = (float)$_usec + (float)$_sec;
$make_html_time_used = intval(($_make_html_time_end-$_make_html_time_start)*1000)/1000;
echo '<br />time used:'.$make_html_time_used.'s';
die;
?>