<?php
!defined('LZ_MODULE') && die('Access Denied');
$q = $_GET['q'];
if ((!$q && $q != '0') || strlen($q) != 1) die('illegal var q');
include_once(LZ_BASEPATH.'model/item.php');
$item = new LZ_Item;
$url = 'directory/'.$q.'.html';
$items = lz_dict_page($item,array('begin_with'=>$q),(intval($config['dict_page_size']))?intval($config['dict_page_size']):75,$url,$info);
$lz_make_html_total_page = $info['total_page'];
$view_data['q'] = $q;
$view_data['description'] = $this_category['description'];
$view_data['keywords'] = $this_category['keywords'];
$view_data['top'] = $this_category['top'];
$view_data['items'] = $items;
$view_data['page_top'] = 'Free Software Downloads You Can Depend on';
include('controller/sidebar.php');
?>