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
$welcome="��ӭʹ�� PHPCMS�ļ������� v4.04";			//��½�ɹ������ʾ��Ϣ
$preload = 1;			//�ͻ����Ƿ�����Ԥ���أ����ú󣬿ͻ����ٶȼӿ죬���������������أ�
$jumpfiles="";			//��Ҫ�������ת���ļ�����ʱ����֧�֣�
$max_time_limit=60; 			//ҳ��ִ���ʱ��(��)
$charset="GB2312";			//Ĭ�ϱ���
$imgmax=70;			//ͼƬ������
$cookieexp = 60;			//�ͻ��˼��������ʱ��
$v=404;				//�ڲ��汾��
$version = "4.04";			//�汾
$sitewidth = 760;			//��վ������(������ĳЩ���ģ����Ч)
$editfiles="|php|php3|asp|txt|jsp|inc|ini|pas|cpp|bas|in|out|htm|html|cs|config|js|htc|css|c|sql|bat|vbs|cgi|dhtml|shtml|xml|xsl|aspx|tpl|ihtml|htaccess|dwt|lbi|lang|";
				//���ñ༭���༭���ļ�����
$searchfiles = $editfiles;		//���������ݵ��ļ�����

$language = "simple_chinese.lang.php"; 	//�����ļ�
$host_charset = "GB2312";		//�������ļ�������


//Сͼ���ļ��������Լ���ӣ�Ȼ�󽫶�Ӧ��ͼƬ�ϴ��� images/ ��
$icons = array(
"jpg|gif|png|bmp|jpeg" => "icon_image.gif",
$editfiles => "icon_txt.gif",
"zip|rar" => "icon_zip.gif",
"exe|dll" => "icon_exe.gif",
"mp3" => "icon_mp3.gif"
);
//��ͼ���ļ�
$big_icons = array(
$editfiles => "big_txt.gif",
"zip|rar" => "big_rar.gif",
"exe|dll" => "big_exe.gif",
"mp3" => "icon_mp3.gif"
);

?>