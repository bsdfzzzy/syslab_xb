<?php
//addon why
$view_template_name = "";//addon why
$display_enable = true;
function display($view="")
{
	if($view===false)
	{
		global $display_enable;
		$display_enable = false;
	}
	else
	{
		global $view_template_name;
		$view_template_name = $view;
	}
}

//for admin ,author keyword Preprocess  POST
function AdminItemWordsPreprocess()
{
	$_POST['_keywords'] = str_replace("；", ";", $_POST['_keywords']);
	$_POST['_keywords'] = explode(";",$_POST['_keywords']);
	//var_dump($_POST['_keywords']);

	$_POST['_institution'] = str_replace("；", ";", $_POST['_institution']);
	$_POST['_institutionen'] = str_replace("；", ";", $_POST['_institutionen']);
	$_POST["_author"] = str_replace("；", ";", $_POST["_author"]);
	$_POST["_authoren"] = str_replace("；", ";", $_POST["_authoren"]);
	$institution = explode(";",$_POST['_institution']);
	$institutionen = explode(";",$_POST['_institutionen']);
	$author = explode(";",$_POST["_author"]);
	$authoren = explode(";",$_POST["_authoren"]);
	$_POST['_institution'] = array();
	$_POST['_institutionen'] = array();
	$_POST["_author"] = array();
	$_POST["_authoren"] = array();

	foreach ($author as $value) {
		$author = preg_replace("/[1-9]*$/","",$value);
		$ins_index = array();
		preg_match("/[1-9]*$/", $value,$ins_index);
		$ins_index = intval($ins_index[0]);
		$_POST["_author"][] = $author;
		$_POST['_institution'][] = $institution[$ins_index-1];
	}
	//var_dump($_POST["_author"]);
	//var_dump($_POST['_institution']);
	foreach ($authoren as $value) {
		$author = preg_replace("/[1-9]*$/","",$value);
		$ins_index = array();
		preg_match("/[1-9]*$/", $value,$ins_index);
		$ins_index = intval($ins_index[0]);
		$_POST["_authoren"][] = $author;
		$_POST['_institutionen'][] = $institutionen[$ins_index-1];
	}
	//var_dump($_POST["_authoren"]);
	//var_dump($_POST['_institutionen']);
}

function force_download($filename = '', $data = '')
	{
		if ($filename == '' OR $data == '')
		{
			return FALSE;
		}

		// Try to determine if the filename includes a file extension.
		// We need it in order to set the MIME type
		if (FALSE === strpos($filename, '.'))
		{
			return FALSE;
		}

		// Grab the file extension
		$x = explode('.', $filename);
		$extension = end($x);

		// Load the mime types
		include('mimes.php');
		// Set a default mime if we can't find it
		if ( ! isset($mimes[$extension]))
		{
			$mime = 'application/octet-stream';
		}
		else
		{
			$mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
		}

		// Generate the server headers
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
			header("Content-Length: ".strlen($data));
		}
		else
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
			header("Content-Length: ".strlen($data));
		}

		exit($data);
	}

function getIP()
{
	$realip;
	if (isset($_SERVER))
	{
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
			$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else if (isset($_SERVER["HTTP_CLIENT_IP"]))
		{
			$realip = $_SERVER["HTTP_CLIENT_IP"];
		} 
		else
		{
			$realip = $_SERVER["REMOTE_ADDR"];
		}
	}
	else 
	{
		if (getenv("HTTP_X_FORWARDED_FOR"))
		{
			$realip = getenv("HTTP_X_FORWARDED_FOR");
		}
		else if (getenv("HTTP_CLIENT_IP"))
		{
			$realip = getenv("HTTP_CLIENT_IP");
		}
		else
		{
		 $realip = getenv("REMOTE_ADDR");
		}
	}
	return $realip;
}
/*
check if the action is allowed
*/
function check_allowed($controller,$action,$text = false)
{
	if (LZ_MODULE != 'admin') return true;
	if (!$action) 
		$action = $controller;
	else
		$action = $controller.'_'.$action;
	if (!$_SESSION['login_user']['rights'][$action])
	{
		if ($text)
		{
			echo LANG_NOT_ALLOWED;
			die;
		}
		else
			lz_exit(LANG_NOT_ALLOWED);
	}
	else return true;
}

function set_allowed($controller,$action)
{
	if (LZ_MODULE != 'admin') return true;
	$_SESSION['login_user']['rights'][$controller.'_'.$action] = ture;
}


function remove_allowed($controller,$action)
{
	if (LZ_MODULE != 'admin') return true;
	unset($_SESSION['login_user']['rights'][$controller.'_'.$action]);
}


function check_allowed_category($category_id,$text = false)
{
	if (LZ_MODULE != 'admin') return true;
	if ($_SESSION['login_user']['limit_category_id'] && !$_SESSION['login_user']['rights']['categroy_'.$category_id])
	{
		if ($text)
		{
			echo LANG_NOT_ALLOWED;
			die;
		}
		else
			lz_exit(LANG_NOT_ALLOWED);
	}
	else return true;
}

function check_show($action)
{
	return $_SESSION['login_user']['rights'][LZ_CONTROLLER.'_'.$action];
}

/*
create a template object
*/
function template($f,$viewdir = false)
{
	global $_debug;
	$_template = new QuickSkin($f);
	$_template->set( 'reuse_code', !$_debug );
	$_template->set( 'extensions_dir', 'library/quickskin_extensions/' );
	if ($viewdir)
	{
		$_template->set( 'template_dir', $viewdir );
	}
	else
	{
		$_template->set( 'template_dir', LZ_VIEWER_DIR );
	}
	$_template->set( 'temp_dir', 'cache/template/' );
	$_template->set( 'cache_dir', 'cache/' );
	//$_template->set( 'cache_lifetime', 200 );
	return $_template;
}

/*
get some data arrays from a config file
*/
function config_data($f)
{
	global $view_data,$config;
	if (strpos($f,'.config') === false) $f .= '.config';
	//config file path
	$filepath = LZ_BASEPATH.LZ_VIEWER_DIR.$f;
	//cached file path
	$cfilepath = LZ_BASEPATH.'cache/data_config/'.$f.'.php';
	if (!file_exists($filepath))
	{
		if (file_exists($filepath.'.php'))
			$filepath .= '.php';
		else
		{
			echo '<div style="color:red">Config File ERROR:config file not found:'.$f.'</div>';
			die;
		}
	}
	//check cache file first
	if (file_exists($cfilepath) && filemtime($cfilepath) > filemtime($filepath))
	{
		include($cfilepath);
		return;
	}
	//if no cache or cache expired,then rebuild the cache file
	$lines = file($filepath);
	$vars = array();
	foreach($lines as $line)
	{
		if (preg_match('/<(\w+)\s+(\w+\s*=\s*"[^"]*"\s*)+\s*\/>/i',$line,$ms))
		{
			$varname = $ms[1];
			preg_match_all('/(\w+)="([^"]*)"/i',$line,$ms);
			$data = array();
			for($i=0;$i<count($ms[1]);$i++)
			{
				if ($ms[2][$i] !== '')
				{
					$data[$ms[1][$i]] = $ms[2][$i];
				}
			}
			$model = $data['model']?$data['model']:LZ_DEFAULT_CONFIG_MODEL;
			!$vars[$model] && $vars[$model] = array();
			//check if the model file exists
			if (!file_exists(LZ_BASEPATH.'model/'.$model.'.php'))
			{
				echo '<div style="color:red">Config File ERROR:model file not found:'.$model.'.php</div>';
				die;
			}
			unset($data['model']);
			$vars[$model][] = array('varname'=>$varname,'data'=>$data);
		}
	}
	//generate a cache file which could be included
	$s = '<'.'?php'."\n";
	$s.= '!defined("LZ_BASEPATH") && die("this is just a cache!");'."\n";
	foreach($vars as $model=>$arr)
	{
		$s.= 'include_once(LZ_BASEPATH."model/'.$model.'.php");'."\n";
		$s.= '$obj = new LZ_'.$model.";\n";
		foreach($arr as $_arr)
		{
			$s.= '$view_data["'.$_arr['varname'].'"] = $obj->get_list( array(';
			foreach($_arr['data'] as $key=>$val) $s.= "'$key'=>'".str_replace( array('<php>','</php>'),array("'.",".'"),addslashes($val))."',";
			$s.= ') );'."\n";
		}
	}
	$s.= '?'.'>';
	file_put_contents($cfilepath,$s)?include($cfilepath):eval($s);
}

/*
register this page to be cached
*/
function cache_this_page($t = 120)
{
	define('LZ_CACHE_VIEW','yes');
	define('LZ_CACHE_TTL',$t);
}


/*
output a msg box for $t seconds then redirect to $url
*/
function lz_exit($content,$url='javascript:history.go(-1);',$t = 2)
{
	$temp = template('exit.html');
	$temp->assign( array
	(
		'content' => $content,
		'url' => $url,
		'time' => $t,
	));
	$temp->output();
	die;
}

/*
add the second array to the first array
*/
function array_add(&$arr1,$arr2,$assoc = true)
{
	foreach($arr2 as $key=>$val)
	{
		if ($assoc)
			$arr1[$key] = $val;
		else
			$arr1[] = $val;
	}
}

/*
encode a string (usually a password)
*/
function lz_encode($s)
{
	$s = md5($s).$s.'something very very very very very very very very long';
	return sha1($s);
}


/*filter an array
 	input example: md5:key1,key2,base64_encode:key3!,intval:key4
	! represents must, if it equals null then return false
	function_name:key, handle key to function_name
	key2=key1, rename key1 to key2
	
	e.g. id=intval:item_id!
*/
function filter_array($arr,$keys,$write_global = false)
{
	$re = array();
	$key_arr = explode(',',$keys);
	foreach($key_arr as $key)
	{
		$key = trim($key);
		if (!$key) continue;
		$_must = false;
		$_func = false;
		$_key = false;
		if (strpos($key,'=') !== false)
		{
			$_arr = explode('=',$key);
			$_key = $_arr[0];
			$key = $_arr[1];
		}
		if (strpos($key,'!') !== false)
		{
			$_must = true;
			$key = str_replace('!','',$key);
		}
		if (strpos($key,':') !== false)
		{
			$_arr = explode(':',$key);
			$_func = $_arr[0];
			$key = $_arr[1];
		}
		!$_key && $_key = $key;
		if ($_func && function_exists($_func))
			if (@eval('$arr[$key] = '.$_func.'($arr[$key]);') === false) return false;
		if ($_must && !$arr[$key]) 
			return false;
		else
			$re[$_key] = $arr[$key];
	}
	if ($write_global)
	{
		foreach($re as $key => $val)
		{
			$GLOBALS[$key] = $val;
		}
	}
	return $re;
}

/*
load and parse language file
*/
function language($path)
{
	if (strpos($path,'.') === false) $path.= '.lang';
	$_f = LZ_LANGUAGE_DIR.LZ_LANGUAGE.'/'.$path;
	if (file_exists($_f))
	{
		$lines = file($_f);
		foreach($lines as $line)
		{
			$line = str_replace(array("\r","\n"),'',$line);
			if (preg_match('/^([a-zA-Z]{1}[a-zA-Z0-9_]*)\s*=(.*)$/',$line,$ms))
				define('LANG_'.strtoupper($ms[1]),$ms[2]);
		}
	}
}

/*
get language item
*/
function lang($key)
{
	$name = 'LANG_'.strtoupper($key);
	if (defined($name))
		return constant($name);
	else
	{
		//here do some thing log
		return $key;
	}
}


/*
get a substring of UTF-8 words
*/
function cn_substr($str, $start, $len)
{
	$tmpstr = "";
	$strlen = strlen($str);
	$cnt = 0;
	$istr = '';
	for($i = 0; $i < $strlen; $i++) 
	{
        if(ord(substr($str, $i, 1)) > 127) 
		{
            $istr = substr($str, $i, 3);
            $i+=2;
        }
		else
		{
            $istr = substr($str, $i, 1);
		}
		if ( $cnt >= $start && $cnt < $start+$len)
		{
			$tmpstr .= $istr;
		}
		$cnt++;
    }
    return $tmpstr;
}

/*
get a simple formated date string
*/
function format_date($t)
{
	if (strpos($t,'-') !== false) return $t;
	return date('Y-m-d H:i',$t);
}

function show_day($t)
{
	if (strpos($t,'-') !== false) return $t;
	return date('m-d',$t);
}

/*
get a short type date string 
e.g.	today 21:23 (when it's the same day)
		yesterday 21:23 (when it's yesterday)
*/
function format_date_short($t)
{
	if (date('Y',$t) != date('Y'))
	{
		$re = date('Y'.LANG_YEAR.'m'.LANG_MONTH.'d'.LANG_DAY,$t);
	}
	else if (date('m',$t) != date('m'))
	{
		$re = date('m'.LANG_MONTH.'d'.LANG_DAY,$t);
	}
	else if (date('d',$t) != date('d'))
	{
		switch( date('d',$t) - date('d') )
		{
			case 2:
				$re = LANG_TDAT;
				break;
			case 1:
				$re = LANG_TOMORROW;
				break;
			case -1:
				$re = LANG_YESTERDAY;
				break;
			default:
				$re = date('d'.LANG_DAY,$t);
		}
	}
	else
	{
		$re = LANG_TODAY;
	}
	$re .= date('H:i',$t);
	return $re;
}

/*
get a approximately past time
e.g. 3seconds  5hours  7days 
*/
function format_past_time($t)
{
	$d = time()-$t;
	if ($d < 60)
	{
		return $d.LANG_SECONDS;
	}
	$d = intval($d/60);
	if ($d < 60)
	{
		return $d.LANG_MINUTES;
	}
	$d = intval($d/60);
	if ($d < 24)
	{
		return $d.LANG_HOURS;
	}
	$d = intval($d/24);
	if ($d < 30)
	{
		return $d.LANG_DAYS;
	}
	$d = intval($d/30);
	if ($d < 12)
	{
		return $d.LANG_MONTHS;
	}
	return intval($d/12).LANG_YEARS;
}

/*
check if certain action is allowed or not
*/
function if_allowed($action)
{
	if ($_SESSION['login_user']['name'] == 'Administrator' || $_SESSION['login_user']['rights'] == 'all')
	{
		return true;
	}
	else
	{
		return (strpos(','.$_SESSION['login_user']['rights'].',',','.$action.',') !== false);
	}
}

/*
get client ip address
*/
function ip()
{
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
	{
		$ip = getenv('HTTP_CLIENT_IP');
	}
	elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
	{
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
	{
		$ip = getenv('REMOTE_ADDR');
	}
	elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : 'unknown';
}

/*
if the client browser is IE
*/
function is_ie()
{
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if((strpos($useragent, 'opera') !== false) || (strpos($useragent, 'konqueror') !== false)) return false;
	if(strpos($useragent, 'msie ') !== false) return true;
	return false;
}

/*
get user name with user_id
*/
function get_user_name($id)
{
	global $lz_users;
	if (!is_array($lz_users))
	{
		include_once('model/user.php');
		$user = new LZ_User;
		$lz_users = $user->get_array();
	}
	return $lz_users[$id];
}

/*
separate description and whole content
*/
function lz_separate($s,$url)
{
	global $config;
	if (strpos($s,$config['lz_separator']) === false) return $s;
	$arr = explode($config['lz_separator'],$s);
	return $arr[0].'...<a href="'.$url.'" class="readmore">'.$config['lz_readmore'].'</a>';
}

function getext($filename)
{
	$filename = trim(strtolower(basename($filename)));
	$arr = explode('.',$filename);
	$type = $arr[count($arr)-1];
	return $type;
}

function myurlencode($url)
{
	return str_replace( array('+','%2F'),array('%20','/'),urlencode($url));
}

?>