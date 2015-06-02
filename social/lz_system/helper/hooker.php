<?php
function lz_on_begin()
{

}

function lz_on_after_db()
{
	global $db,$_time_start,$config,$cache;
	include_once('model/model.php');
	include_once('model/cache.php');
	$cache = new LZ_Cache;
	if ($cache->exists())
	{
		echo $cache->get(false,$ttl);
		list($_usec, $_sec) = explode(' ', microtime()); 
		$_time_end = (float)$_usec + (float)$_sec;
		$lz_time_used = intval(($_time_end-$_time_start)*1000)/1000;
		echo '<!-- this is a cached page. time used: '.$lz_time_used.'s. this cache will expire in '.$ttl.' seconds -->';
		die;
	}
	
	//get config from database
	if (!is_array($config)) $config = array();
	$r = $db->query("SELECT * FROM `".LZ_MYSQL_PREFIX."config`;");
	while($arr = $db->fetch_array($r))
	{
		$arr['name'] && $config[$arr['name']] = $arr['value'];
	}
}

//刚刚进入系统，载入config 等文件之后，连接数据库之前
function lz_on_ready()
{
	//登录验证
	if (LZ_MODULE == 'admin')
	{
		if (!$_SESSION['login_user'])
		{
			header("location:index.php?p=login&module=admin");
			die;
		}
		include_once('model/rights.php');
		$rights = new LZ_Rights;
		$r = $rights->get_one($_SESSION['login_user']['rights_id']);
		unset($_SESSION['login_user']['rights']);
		unset($_SESSION['login_user']['allowed_controllers']);
		unset($_SESSION['login_user']['allowed_categories']);
		if ($r && $r['rights'])
		{
			$arr = explode(',',$r['rights']);
			$allowed_categories = array();
			foreach($arr as $val)
			{
				$_SESSION['login_user']['rights'][$val] = true;
				if (preg_match('/^category_\d/i',$val))
				{
					$val = preg_replace('/^category_/i','',$val);
 					$allowed_categories[] = $val;
				}
				$val = preg_replace('/_\w*$/i','',$val);
				$_SESSION['login_user']['allowed_controllers'][$val] = true;
			}
			$_SESSION['login_user']['allowed_categories'] = join(',',$allowed_categories);
		}
	}
	//解析url 得到 id
	if (preg_match('/\?(\d{1,})$/',$_SERVER['REQUEST_URI'],$matches))
	{
		$_GET['id'] = $matches[1];
	}
}



//解析模板以前
function lz_on_template_begin()
{
	global $all_view_data; //全局的模板数据
	$all_view_data['login_user'] = $_SESSION['login_user'];
	$all_view_data['now'] = array(
		'time' => date('H:i'),
		'year' => date('Y'),
		'month' => date('m'),
		'day' => date('d')
		);
}

function lz_on_end()
{
	global $view_html;
	//if called cache_this_page() then cache this page ^_^
	if (LZ_CACHE_VIEW == 'yes' && defined('LZ_CACHE_TTL') && intval(LZ_CACHE_TTL) > 0)
	{
		$cache = new LZ_Cache;
		$cache->add( array('content'=>$view_html,'ttl'=>LZ_CACHE_TTL) );
	}
	echo $view_html;
}

?>