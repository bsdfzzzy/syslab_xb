-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 04 月 11 日 06:49
-- 服务器版本: 5.1.32
-- PHP 版本: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `epp`
--

-- --------------------------------------------------------

--
-- 表的结构 `lz_cache`
--

CREATE TABLE IF NOT EXISTS `lz_cache` (
  `cache_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `ttl` int(10) unsigned DEFAULT NULL,
  `content` varchar(20010) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `cache_id` (`cache_id`),
  KEY `uri` (`uri`)
) ENGINE=MEMORY  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `lz_cache`
--

INSERT INTO `lz_cache` (`cache_id`, `uri`, `create_time`, `ttl`, `content`, `order_id`) VALUES
(1, '#admin/category//3/false', 1270967429, 30000000, 'array (\n)', 0),
(2, '#admin/category/3/3/false', 1270967628, 30000000, 'array (\n)', 0),
(3, '#admin/category/3/0/false', 1270967736, 30000000, 'array (\n)', 0),
(4, '#admin/category/3/0/1', 1270967738, 30000000, 'array (\n)', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lz_category`
--

CREATE TABLE IF NOT EXISTS `lz_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `item_count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `item_id` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_category`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_comment`
--

CREATE TABLE IF NOT EXISTS `lz_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_config`
--

CREATE TABLE IF NOT EXISTS `lz_config` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `config_id` (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- 导出表中的数据 `lz_config`
--

INSERT INTO `lz_config` (`config_id`, `name`, `type`, `value`, `description`, `order_id`) VALUES
(51, 'site_name', 'text', '电子科技大学 研究生会', '网站主标题', 5),
(53, 'max_image_width', 'text', '750', '新闻图片最大宽度(超过会自动缩小)', 0),
(57, 'category_list_page_size', 'text', '10', '前台分类页面每页显示新闻条数', 0),
(58, 'children_category_items_num', 'text', '5', '分类页面子分类新闻数', 0),
(59, 'admin_item_page_size', 'text', '20', '后台新闻列表每页条数', 0),
(61, 'upload_file_types', 'textarea', '图片:*.jpg;*.jpeg;*.gif;*.bmp;*.png;<br>文档：*.doc;*.docx; *.pdf; *.ppt; *.xls;*.txt;<br>压缩文件:*.zip;*.rar;*.7z;<br>影片:*.rm; *.rmvb;*.wmv; *.avi;', '允许上传附件类型', 0),
(62, 'index_photo_change_time', 'text', '10', '首页大图滚动时间间隔（秒）', 4);

-- --------------------------------------------------------

--
-- 表的结构 `lz_guestbook`
--

CREATE TABLE IF NOT EXISTS `lz_guestbook` (
  `guestbook_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reply_date` int(11) unsigned NOT NULL DEFAULT '0',
  `reply_content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reply_user_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `guestbook_id` (`guestbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_guestbook`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_item`
--

CREATE TABLE IF NOT EXISTS `lz_item` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  `publish_time` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `view_count` int(10) unsigned NOT NULL DEFAULT '1',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_pic` tinyint(4) DEFAULT NULL,
  `pic_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `entry_id` (`item_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_paper`
--

CREATE TABLE IF NOT EXISTS `lz_paper` (
  `paper_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `school` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(10) unsigned DEFAULT NULL,
  `files` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_paper`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_paper_file`
--

CREATE TABLE IF NOT EXISTS `lz_paper_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paper_id` int(10) unsigned NOT NULL,
  `filename` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_paper_file`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_rights`
--

CREATE TABLE IF NOT EXISTS `lz_rights` (
  `rights_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `rights` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `rights_id` (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `lz_rights`
--

INSERT INTO `lz_rights` (`rights_id`, `name`, `description`, `order_id`, `rights`) VALUES
(1, '超级管理员', '拥有一切权限', 9, 'category_add,category_update,category_delete,item_add,item_update,item_delete,account_update,config_add,config_update,config_delete,guestbook_update,guestbook_delete,upload_add,user_add,user_update,user_delete,rights_add,rights_update,rights_delete,paper_view,paper_update,paper_delete'),
(6, '新闻录入', NULL, 0, 'item_add,item_update,limit_category_id,category_3');

-- --------------------------------------------------------

--
-- 表的结构 `lz_search`
--

CREATE TABLE IF NOT EXISTS `lz_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `id` (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `lz_search`
--


-- --------------------------------------------------------

--
-- 表的结构 `lz_user`
--

CREATE TABLE IF NOT EXISTS `lz_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rights_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `lz_user`
--

INSERT INTO `lz_user` (`user_id`, `rights_id`, `name`, `password`, `email`, `status`) VALUES
(3, 1, 'liujinsong', '37a2966d8db921253adf278b344bf4b3a65ce9f4', 'liujisong668@gmail.com', 'admin');
