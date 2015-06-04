<?php
/*
*#########################################
* PHPCMS File Manager
* Copyright (c) 2004-2006 phpcms.cn
* Author: Longbill ( http://www.longbill.cn )
* longbill.cn@gmail.com
*#########################################
*/

include_once("info.php");
$welcome="欢迎使用 PHPCMS文件管理器 v4.04";			//登陆成功后的提示信息
$preload = 1;			//客户端是否启用预下载（启用后，客户端速度加快，但服务器负担加重）
$jumpfiles="";			//需要服务端跳转的文件（暂时还不支持）
$max_time_limit=60; 			//页面执行最长时间(秒)
$charset="GB2312";			//默认编码
$imgmax=70;			//图片最大宽或高
$cookieexp = 60;			//客户端剪贴板过期时间
$v=404;				//内部版本号
$version = "4.04";			//版本
$sitewidth = 760;			//网站整体宽度(仅仅对某些风格模板有效)
$editfiles="|php|php3|asp|txt|jsp|inc|ini|pas|cpp|bas|in|out|htm|html|cs|config|js|htc|css|c|sql|bat|vbs|cgi|dhtml|shtml|xml|xsl|aspx|tpl|ihtml|htaccess|dwt|lbi|lang|";
				//可用编辑器编辑的文件类型
$searchfiles = $editfiles;		//可搜索内容的文件类型

$language = "simple_chinese.lang.php"; 	//语言文件
$host_charset = "GB2312";		//服务器文件名编码


//小图标文件，可以自己添加，然后将对应的图片上传至 images/ 下
$icons = array(
"jpg|gif|png|bmp|jpeg" => "icon_image.gif",
$editfiles => "icon_txt.gif",
"zip|rar" => "icon_zip.gif",
"exe|dll" => "icon_exe.gif",
"mp3" => "icon_mp3.gif"
);
//大图标文件
$big_icons = array(
$editfiles => "big_txt.gif",
"zip|rar" => "big_rar.gif",
"exe|dll" => "big_exe.gif",
"mp3" => "icon_mp3.gif"
);

?>