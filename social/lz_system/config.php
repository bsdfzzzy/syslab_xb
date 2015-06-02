<?php
///////////////////////////////////
//     LoveZhi PHPMVC System
// Longbill(longbill.cn@gmail.com)
//       www.longbill.cn
//         @2008-2009
// under Creative Commons License
///////////////////////////////////
/*
./config.php:
  system configuration
*/
//mysql table name prefix
define('LZ_MYSQL_PREFIX','lz_');

//site charset
define('LZ_CHARSET','UTF-8');

//view page cache
!defined('LZ_CACHE_VIEW') && define('LZ_CACHE_VIEW',true);

//allowed upload file types, separated by comma
define('LZ_UPLOAD_FILE_TYPES',',jpg,jpeg,gif,bmp,png,doc,rar,pdf,zip,ppt,docx,xls,');

//default model name of data config entry
define('LZ_DEFAULT_CONFIG_MODEL','item');

//site language
define('LZ_LANGUAGE','cn');

define('LZ_UPLOAD_PATH','public/uploadfiles/');
define('LZ_PAPER_PATH','attachments/');

//open debug mode ( no template caches )
$_debug = true;

//mysql information
$mysql = array(
	'username' => "root",//'xb',//
	'password' => "159357",//'syslabxb',//
	'server' => "localhost",
	'database' => "newxb_social",
);

//global config ( could be overwritten by lz_config entries in database ) 
$config = array(
	'template' => 'blue'
);



//autoload files before controller
$_preload = array(

	'library' => array(
		'mysql.php',	
		'class.quickskin.php',	//the template engine
	),
	

	'helper' => array(
		'mysql.php',	
		'common.php', 
		'html.php'
	),
	

	'language' => array(
		'common',	
	),
	

	'model' => array(
		'model.php',
		'cache.php'
	),

	'controller' => array(
		'common.php'
	),
);

$lz_rights = array
(
	array(
		'name'=>'category',
		'rights'=> array('add','update','delete')
	),
	array( 
		'name'=>'item',
		'rights'=> array('add','update','delete')
	),
	array(
		'name'=>'account',
		'rights'=> array('update')
	),
	array(
		'name'=>'config',
		'rights'=> array('add','update','delete')
	),
	array(
		'name'=>'guestbook',
		'rights'=> array('update','delete')
	),
	array(
		'name'=>'upload',
		'rights'=>array('add')
	),
	array(
		'name'=>'user',
		'rights'=>array('add','update','delete')
	),
	array(
		'name'=>'rights',
		'rights'=>array('add','update','delete')
	),
	array(
		'name'=>'paper',
		'rights'=>array('view','update','delete')
	)
);


/* 
other config
*/
$news_status = array(
	0=>"<span style='color:orange'>审核中</span>",
	1=>"已发布",
	2=>"<span style='color:#999'>已回收</span>",
	//3=>'单网页',
);

$paper_status = array(
	0=>"<span style='color:orange'>新提交</tispan>",
	1=>"已受理",
	2=>"处理完毕",
	3=>"<span style='color:#999'>废弃</span>"
);


$category_status = array(
	1 => "文章分类",
	2 => "<span style='color:orange'>页面</span>",
);

define("__SELF__",$_SERVER['PHP_SELF']);

?>