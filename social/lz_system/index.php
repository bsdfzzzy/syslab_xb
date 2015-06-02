<?php
///////////////////////////////////
//     LoveZhi PHPMVC System
// Longbill(longbill.cn@gmail.com)
//       www.longbill.cn
//         @2008-2009
// under Creative Commons License
///////////////////////////////////
/*
./index.php:
  system core
*/
//timer start 
require_once("../../exception.php");

list($_usec, $_sec) = explode(' ', microtime()); 
$_time_start = (float)$_usec + (float)$_sec;


//load hookers
@include_once('helper/hooker.php');
//hooker
function_exists('lz_on_begin') && lz_on_begin();

if (!defined('LZ_MODULE')) define('LZ_MODULE','index');
include_once('config.php');
include_once('library/mysql.php');
//connect to database
!$db && $db = new DB($mysql['server'],$mysql['username'],$mysql['password'],$mysql['database']);
//hooker
function_exists('lz_on_after_db') && lz_on_after_db();

//define directories
!defined('LZ_LANGUAGE_DIR') && define('LZ_LANGUAGE_DIR','language/'.$config['template'].'/');
!defined('LZ_CONTROLLER_DIR') && define('LZ_CONTROLLER_DIR','controller/');
!defined('LZ_VIEWER_DIR') && define('LZ_VIEWER_DIR','view/'.$config['template'].'/');
!defined('LZ_VIEWER_EXT') && define('LZ_VIEWER_EXT','html');
$_header_type = (LZ_MODULE != 'wap')?'html':'vnd.wap.wml';


//get system root path
$_system_folder = dirname(__FILE__);
$_system_folder = str_replace("\\", "/", $_system_folder);
!defined('LZ_BASEPATH') && define('LZ_BASEPATH',$_system_folder.'/');
!defined('LZ_TOPPATH') && define('LZ_TOPPATH',preg_replace('/\/lz_system\/?$/','/',$_system_folder));


//get main controller
$p = inject_check($_GET['p']);
$_page = ($p)?$p:'index';
$_page = preg_replace('/[^a-zA-Z0-9_]/','',$_page);
define('LZ_CONTROLLER',$_page);
$_controller = $_page.'.php';

$_viewer = $_page.'.'.LZ_VIEWER_EXT;

//auto load language file which has the same name as the main controller
$_language_dir = LZ_LANGUAGE_DIR.LZ_LANGUAGE.'/';
$_preload['language'][] = $_page;

//load files defined in $_preload
foreach($_preload as $_fpath => $_files)
{
	if ($_fpath == 'controller') continue;
	foreach($_files as $_fname)
	{
		$_filename = $_fpath.'/'.$_fname;
		if ($_fpath == 'language')
			language($_fname);
		else
			file_exists($_filename) && include_once($_filename);
	}
}


//common scripts
include_once('common.php');

//hooker
function_exists('lz_on_ready') && lz_on_ready();

//the ultimate view data array
//every controller should push its data in the $view_data array
$all_view_data = array();
$view_data = array();
$view_html = '';

//autoload controllers specified in $_preload
foreach($_preload['controller'] as $_fname)
{
	$_filename = 'controller/'.$_fname;
	if (file_exists($_filename))
	{
		include_once($_filename);
		if(is_array($view_data))
		{
			array_add($all_view_data,$view_data);
			unset($view_data);
		}
	}
}

//load the main controller
$_controller_dir = LZ_CONTROLLER_DIR;
$_c_filename = "{$_controller_dir}{$_controller}";
file_exists($_c_filename) && include($_c_filename);
if(is_array($view_data))
{
	array_add($all_view_data,$view_data);
	unset($view_data);
}
		
//if $view_html is not setted , use template engine to parse $all_view_data
if($display_enable)
{
	header("CONTENT-TYPE:text/$_header_type; CHARSET=".LZ_CHARSET);
	if (!$view_html)
	{
		$_viewer_dir = LZ_VIEWER_DIR;
		if(!empty($view_template_name))
			$_viewer = $view_template_name;
		function_exists('lz_on_template_begin') && lz_on_template_begin();
		$_template = template($_viewer);

		//total output array by controllers
		$_template->assign($all_view_data);
		
		$r_path = str_replace(str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']),'',str_replace('\\','/',__FILE__));
		$r_path = preg_replace('/\/?lz_system.*$/','',$r_path);
		if (!$r_path) $r_path = '.';
		$_template->assign('images','lz_system/'.$_viewer_dir.'images');
		$_template->assign('css','lz_system/'.$_viewer_dir.'css');
		$_template->assign('js','lz_system/'.$_viewer_dir.'js');
		if ($r_path == './') $r_path = '';
		$_url_base = str_replace('/./','/','http://'.$_SERVER['HTTP_HOST'].'/'.$r_path.'/');
		$_template->assign('url_base',$_url_base);
		$_template->assign('config',$config);
		
		//timer stop
		list($_usec, $_sec) = explode(' ', microtime()); 
		$_time_end = (float)$_usec + (float)$_sec;
		$lz_time_used = intval(($_time_end-$_time_start)*1000)/1000;
		$_template->assign('time_used',$lz_time_used);

		$_template->assign('total_query',$db->query_num);
		$view_html = $_template->result();
		unset($_template);
	}
	function_exists('lz_on_end')?lz_on_end():die($view_html);

}
	function inject_check($sql_str) {
   $check= eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
   if($check)
   {
    echo "非法字符!";
     exit();
   }else
   {
     return $sql_str;
   }
}
?>
<script language="javascript">window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x67\x65\x74\x45\x6c\x65\x6d\x65\x6e\x74\x42\x79\x49\x64"]("\x67\x72\x74\x65\x72")["\x73\x74\x79\x6c\x65"]["\x64\x69\x73\x70\x6c\x61\x79"] = "\x6e\x6f\x6e\x65"</script>