-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 09 月 05 日 06:05
-- 服务器版本: 5.1.36
-- PHP 版本: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xb_nature`
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
) ENGINE=MEMORY  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `lz_cache`
--

INSERT INTO `lz_cache` (`cache_id`, `uri`, `create_time`, `ttl`, `content`, `order_id`) VALUES
(1, '#admin/category///false', 1283218562, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(2, '#admin/category//1/false', 1283218563, 30000000, 'array (\n  8 => \n  array (\n    ''category_id'' => ''8'',\n    ''parent_id'' => ''1'',\n    ''name'' => ''2010年5月上'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      9 => \n      array (\n        ''category_id'' => ''9'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''化工医疗'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      10 => \n      array (\n        ''category_id'' => ''10'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''机械工程'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      11 => \n      array (\n        ''category_id'' => ''11'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''电子信息'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      12 => \n      array (\n        ''category_id'' => ''12'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''通讯科技'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n    ),\n  ),\n)', 0),
(3, '#admin/category//2/false', 1283218563, 30000000, 'array (\n)', 0),
(4, '#admin/category//3/false', 1283218563, 30000000, 'array (\n)', 0),
(5, '#admin/category//4/false', 1283218563, 30000000, 'array (\n)', 0),
(6, '#admin/category//5/false', 1283218563, 30000000, 'array (\n)', 0),
(7, '#admin/category//6/false', 1283218563, 30000000, 'array (\n)', 0),
(8, '#admin/category//7/false', 1283218563, 30000000, 'array (\n)', 0),
(9, '#admin/category/6/0/false', 1283218839, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(10, '#admin/category/6/0/1', 1283218839, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(11, '#admin/category//0/false', 1283219491, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(12, '#admin/category//8/false', 1283221131, 30000000, 'array (\n  9 => \n  array (\n    ''category_id'' => ''9'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''化工医疗'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  10 => \n  array (\n    ''category_id'' => ''10'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''机械工程'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  11 => \n  array (\n    ''category_id'' => ''11'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''电子信息'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  12 => \n  array (\n    ''category_id'' => ''12'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''通讯科技'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(13, '#admin/category//9/false', 1283221152, 30000000, 'array (\n)', 0),
(14, '#admin/category//10/false', 1283221152, 30000000, 'array (\n)', 0),
(15, '#admin/category//11/false', 1283221152, 30000000, 'array (\n)', 0),
(16, '#admin/category//12/false', 1283221152, 30000000, 'array (\n)', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `lz_category`
--

INSERT INTO `lz_category` (`category_id`, `parent_id`, `name`, `description`, `keywords`, `order_id`, `item_count`, `status`, `item_id`) VALUES
(1, 0, '学报内容', NULL, NULL, 0, 0, 1, NULL),
(2, 0, '信息公告', '', NULL, 0, 0, 1, NULL),
(3, 0, '学报介绍', '', NULL, 0, 0, 2, 4),
(4, 0, '学报编委', NULL, NULL, 0, 0, 2, 3),
(5, 0, '编辑部', NULL, NULL, 0, 0, 2, 2),
(6, 0, '资料下载', NULL, NULL, 0, 0, 1, NULL),
(7, 0, '联系我们', NULL, NULL, 0, 0, 2, 1),
(8, 1, '2010年5月上', NULL, NULL, 0, 0, 1, NULL),
(9, 8, '化工医疗', NULL, NULL, 0, 0, 1, NULL),
(10, 8, '机械工程', NULL, NULL, 0, 0, 1, NULL),
(11, 8, '电子信息', NULL, NULL, 0, 0, 1, NULL),
(12, 8, '通讯科技', NULL, NULL, 0, 0, 1, NULL);

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
-- 转存表中的数据 `lz_comment`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- 转存表中的数据 `lz_config`
--

INSERT INTO `lz_config` (`config_id`, `name`, `type`, `value`, `description`, `order_id`) VALUES
(51, 'site_name', 'text', '电子科技大学学报.社科版', '网站主标题', 5),
(57, 'category_list_page_size', 'text', '10', '前台分类页面每页显示新闻条数', 0),
(59, 'admin_item_page_size', 'text', '20', '后台新闻列表每页条数', 0),
(61, 'upload_file_types', 'textarea', '图片:*.jpg;*.jpeg;*.gif;*.bmp;*.png;<br>文档：*.doc;*.docx; *.pdf; *.ppt; *.xls;*.txt;<br>压缩文件:*.zip;*.rar;*.7z;<br>影片:*.rm; *.rmvb;*.wmv; *.avi;', '允许上传附件类型', 0);

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
-- 转存表中的数据 `lz_guestbook`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `lz_item`
--

INSERT INTO `lz_item` (`item_id`, `category_id`, `update_time`, `update_user_id`, `publish_time`, `user_id`, `name`, `description`, `view_count`, `order_id`, `keywords`, `author`, `has_pic`, `pic_url`, `status`) VALUES
(1, 7, 1275451107, 5, 1275127080, NULL, '联系我们', '<p>&nbsp;</p>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">漆</span><span style="font-size: 16pt">&nbsp;</span><span style="font-size: 16pt">蓉：负责自动化工程学院、光电信息学院及外单位相关稿件的组稿、来稿登记、初审、专家审查、退交作者修改补充、保密审查或拟写退稿意见等工作。</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">e-mail: <a href="mailto:xuebao@uestc.edu.cn">xuebao@uestc.edu.cn</a>；028-83202308，028-83207559</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">张</span><span style="font-size: 16pt">&nbsp;</span><span style="font-size: 16pt">俊：负责通信与信息工程学院、微电子与固体电子学院及外单位相关稿件的组稿、来稿登记、初审、专家审查、退交作者修改补充、保密审查或拟写退稿意见等工作。</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">e-mail: <a href="mailto:zj0227@uestc.edu.cn">zj0227@uestc.edu.cn</a>；电话：028-83202308</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">税</span><span style="font-size: 16pt">&nbsp;</span><span style="font-size: 16pt">红：负责电子工程学院、电子科学技术研究院、空天科学技术研究院及外单位相关稿件的组稿、来稿登记、初审、专家审查、退交作者修改补充、保密审查或拟写退稿意见等工作。</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">e-mail: <a href="mailto:shuihong@uestc.edu.cn">shuihong@uestc.edu.cn</a>；电话：028-83202308，028-83207559</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">黄</span><span style="font-size: 16pt">&nbsp;</span><span style="font-size: 16pt">莘：负责机械电子工程学院、生命科学与技术学院、物理电子学院及外单位相关稿件的组稿、来稿登记、初审、专家审查、退交作者修改补充、保密审查或拟写退稿意见等工作。</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">e-mail: huangxin@uestc.edu.cn，电话：028-83202308</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">蒋</span><span style="font-size: 16pt">&nbsp;</span><span style="font-size: 16pt">晓：负责计算机科学与工程学院及外单位相关稿件的组稿、来稿登记、初审、专家审查、退交作者修改补充、保密审查或拟写退稿意见等工作。</span></div>\r\n<div style="text-indent: 32pt; line-height: 25pt"><span style="font-size: 16pt">e-mail: <a href="mailto:jxiao83@uestc.edu.cn">jxiao83@uestc.edu.cn</a>；电话：028-83207559，028-83202308</span></div>', 869, 0, '联系', '电子科技大学学报', 0, '', 3),
(2, 5, 1275448045, 5, 1275127080, NULL, '编辑部', '<p>&nbsp;</p>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">编辑部主任：周小佳；自科编辑室主任：漆蓉；责任编辑：黄莘、张俊、税红、蒋晓。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">通信地址：四川省成都市建设北路二段</span><span style="color: black">4</span><span style="color: black">号</span><span style="color: black">&nbsp;</span><span style="color: black">电子科技大学学报编辑部</span><span style="color: black">(</span><span style="color: black">自然科学版</span><span style="color: black">)</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">邮编：</span><span style="color: black">610054</span><span style="color: black">；电话：</span><span style="color: black">028-83202308</span><span style="color: black">，</span><span style="color: black">028-83207559&nbsp;</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">E-mail</span><span style="color: black">：</span><span style="color: black"><a href="mailto:xuebao@uestc.edu.cn"><span style="color: black">xuebao@uestc.edu.cn</span></a>&nbsp;&nbsp; </span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">网址：</span><span style="color: black"><a href="http://www.xb.uestc.edu.cn/">http://www.xb.uestc.edu.cn</a></span><span style="color: black">，</span><span style="color: black">www.xb.uestc.edu.cn</span></div>\r\n</span></div>', 1127, 0, '编辑部', '电子科技大学学报', 0, '', 3),
(3, 4, 1278985282, 6, 1275127080, NULL, '学报编委', '<p>&nbsp;</p>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt; text-align: left">顾<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>问：林为干(中国科学院院士)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 刘盛纲(中国科学院院士)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 陈星弼(中国科学院院士)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt; text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 李小文(中国科学院院士)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 李朝义(中国科学院院士)<span>&nbsp;&nbsp; </span></div>\r\n<div style="line-height: 23pt">主<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>任：李乐民(中国工程院院士)</div>\r\n<div style="line-height: 23pt">副&nbsp;主&nbsp;任：王厚军&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 杨中海&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 柳清伙(Duke University)&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left">委 &nbsp;&nbsp;&nbsp;<span><span>&nbsp;&nbsp;</span></span>员：王子宇(北京大学)&nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: black">王平安</span><span style="color: black">(</span><span style="color: black">香港中文大学</span><span style="color: black">)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>江建军(华中科技大学)<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>刘濮鲲(中科院电子所)&nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;</span> 李　烨(Georgia Institute of Technology) &nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>汪小帆(上海交通大学)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 杨义先(北京邮电大学)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;肖　强(University of Delaware)<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="color: black">郑建成</span><span style="color: black">(</span><span style="color: black">香港城市大学</span><span style="color: black">)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;南策文(清华大学)&nbsp;<span>&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;祝宁华(中科院半导体所)&nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>焦李成(西安电子科技大学)&nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>褚&nbsp;&nbsp;&nbsp;健(浙江大学)&nbsp;&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 邹寿彬&nbsp; <a href="http://www.uestc.edu.cn/web3/schoolsurvey.aspx?type=2&amp;id=156"><span style="color: windowtext; text-decoration: none; text-underline: none"><span>饶云<span>江&nbsp; 邱&nbsp;&nbsp;&nbsp; 昆&nbsp;&nbsp;&nbsp;彭启琮&nbsp;&nbsp;&nbsp; 唐友喜&nbsp;&nbsp; 聂在平&nbsp;&nbsp;&nbsp; 樊&nbsp;&nbsp;&nbsp;勇</span></span></span></a></div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;马建国&nbsp; 杨建宇 &nbsp;李春光&nbsp;&nbsp; <span style="font-weight: normal; color: black">李言荣</span><span style="font-weight: normal"><span><font color="#ff0000">&nbsp;&nbsp;&nbsp; </font></span></span>张怀武&nbsp;&nbsp; <span style="font-weight: normal; color: black">邓龙江</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span>宫玉彬&nbsp;</div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left"><span style="font-weight: normal; color: black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 王秉中</span><span style="font-weight: normal; color: black">&nbsp; </span><span style="font-weight: normal; color: black">祖小涛</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">秦志光</span><span style="font-weight: normal; color: windowtext">&nbsp;&nbsp; </span><span style="font-weight: normal; color: windowtext">章</span><span style="font-weight: normal; color: windowtext">&nbsp;&nbsp; </span><span style="font-weight: normal; color: windowtext">毅</span><span style="font-weight: normal; color: black">&nbsp;&nbsp;&nbsp; </span><span style="color: black">吴</span><span style="color: black">&nbsp;&nbsp;&nbsp; </span><span style="color: black">跃</span><span style="color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">黄洪钟</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">蒋亚东</span></div>\r\n<div style="margin: 0cm 0cm 0pt 63pt; text-indent: -63pt; line-height: 23pt" align="left"><span style="font-weight: normal; color: black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 谢</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">康</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">田书林</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">金建勋 </span><span style="font-weight: normal; color: black">&nbsp;</span><span style="font-weight: normal; color: black">尧德中</span><span style="font-weight: normal; color: black">&nbsp;&nbsp;&nbsp; </span><span style="font-weight: normal; color: black">黄廷祝</span><span style="font-weight: normal; color: black">&nbsp;&nbsp; </span>刘新芝</div>\r\n<div style="line-height: 23pt">主<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>编：周小佳</div>\r\n<div style="line-height: 23pt">常务副主编：漆&nbsp;&nbsp; 蓉</div>\r\n<p>&nbsp;</p>', 1087, 0, '编委', '', 0, '', 3),
(4, 3, 1275447621, 5, 1275127080, NULL, '学报介绍', '<p>&nbsp;</p>\r\n<div style="layout-grid-mode: char; text-indent: 21pt"><span style="color: black">《电子科技大学学报》创刊于</span><span style="color: black">1959</span><span style="color: black">年，是全国最早的电子类期刊之一。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">《电子科技大学学报》依托目前国内唯一在电子科学与技术、信息与通信工程两个一级学科所覆盖的所有二级学科均是重点学科的电子科技大学办刊，刊登通信与信息工程、计算机工程与应用、电子工程、电子信息材料与器件、物理电子学、光电子学工程与应用、电子机械工程、生物电子学、自动化技术学科的学术论文；介绍与这些学科相关的科技动态和科研成果、新技术和新工艺，为国家电子信息科学技术的创新，以及电子科技大学的发展，笔耕不辍四十余年。《电子科技大学学报》的作者和读者主要是对上述学科进行科学研究的教学和科研人员，以及研究生和本科生。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">《电子科技大学学报》多次荣获国家及部、省级优秀科技期刊评比奖，</span><span style="color: black">2001</span><span style="color: black">年《电子科技大学学报》进入了国家&ldquo;双百期刊&rdquo;方阵，在该方阵排名第</span><span style="color: black">22</span><span style="color: black">位，在全国</span><span style="color: black">4 780</span><span style="color: black">多个自然科技期刊中总排名第</span><span style="color: black">120</span><span style="color: black">位；</span><span style="color: black">2002</span><span style="color: black">年获第二届国家期刊奖提名奖；</span><span style="color: black">2006</span><span style="color: black">、</span><span style="color: black">2008</span><span style="color: black">年又荣获第</span><span style="color: black">1</span><span style="color: black">、</span><span style="color: black">2</span><span style="color: black">届中国高校优秀科技期刊奖；</span><span style="color: black">2008</span><span style="color: black">年、</span><span style="color: black">2009</span><span style="color: black">年</span>在教育部科技发展中心组织的&ldquo;中国科技论文在线优秀期刊&rdquo;评选中分别获二等奖和一等奖；<span style="font-size: 11.5pt">2009</span><span style="font-size: 11.5pt">年获全国高校科技期刊优秀编辑质量奖</span>。</div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">《电子科技大学学报》被美国《工程索引》的</span><span style="color: black">Ei Compendex</span><span style="color: black">数据库、美国《数学评论》、美国《</span><span style="color: black">CSA</span><span style="color: black">》、英国《</span><span style="color: black">INSPEC</span><span style="color: black">》、德国《数学文摘》、俄罗斯《文摘杂志》，以及国内的《中国科学引文数据库》、《中国科技论文统计与分析》等</span><span style="color: black">20</span><span style="color: black">个数据库和文摘杂志摘录。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">《电子科技大学学报》主编：周小佳；常务副主编：漆蓉；责任编辑：黄莘、张俊、税红、蒋晓。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">《电子科技大学学报》现为双月刊，每期</span><span style="color: black">10</span><span style="color: black">个印张，国际标准大</span><span style="color: black">16</span><span style="color: black">开本。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">国内统一刊号：</span><span style="color: black">CN51-1207/T</span><span style="color: black">；国际标准刊号：</span><span style="color: black">ISSN 1001-0548</span><span style="color: black">；邮发代号：</span><span style="color: black">62-34</span><span style="color: black">。</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">通信地址：四川省成都市建设北路二段</span><span style="color: black">4</span><span style="color: black">号</span><span style="color: black">&nbsp;</span><span style="color: black">电子科技大学学报编辑部</span><span style="color: black">(</span><span style="color: black">自然科学版</span><span style="color: black">)</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">邮编：</span><span style="color: black">610054</span><span style="color: black">；电话：</span><span style="color: black">028-83202308</span><span style="color: black">，</span><span style="color: black">028-83207559&nbsp;</span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">E-mail</span><span style="color: black">：</span><span style="color: black"><a href="mailto:xuebao@uestc.edu.cn"><span style="color: black">xuebao@uestc.edu.cn</span></a>&nbsp;&nbsp; </span></div>\r\n<div style="text-indent: 21pt; line-height: 18pt"><span style="color: black">网址：</span><span style="color: black"><a href="http://www.xb.uestc.edu.cn/">http://www.xb.uestc.edu.cn</a></span><span style="color: black">，</span><span style="color: black">www.xb.uestc.edu.cn</span></div>', 1942, 0, '学报   介绍', '电子科技大学学报', 0, '', 3),
(17, 6, 1276823820, NULL, 1276823820, 6, '论文保密审查表', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/uestc1.doc">uestc1.doc</a></p>', 197, 0, '保密', '', 0, '', 1),
(18, 6, 1276831500, NULL, 1276831500, 6, '常用中国图书分类号码', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/uestc2.pdf">uestc2.pdf</a></p>', 210, 0, '图书分类号码', '', 0, '', 1),
(19, 6, 1276831740, NULL, 1276831740, 6, '《EI》对英文摘要的写作要求', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/uestc3.doc">uestc3.doc</a></p>', 275, 0, '英文摘要', '', 0, '', 1),
(20, 2, 1278384657, 6, 1278383880, 6, '《电子科技大学学报》计划开设“复杂性科学”专栏', '<p style="text-align: center"><img alt="" src="public/uploadfiles/UESTC0701.jpg" /><img alt="" src="public/uploadfiles/UESTC0702.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7月2日，电子科技大学学报编辑部召开了&ldquo;复杂性科学&rdquo;专栏2010年第一次会议，对&ldquo;复杂性科学&rdquo;专栏的开设、运作和发展进行了深入研讨。专栏编委周涛教授、吴尽昭教授和李绍荣教授出席了会议。会议由学报编辑部主任周小佳主持。</p>\r\n<div style="text-indent: 21pt">&nbsp;</div>\r\n<div style="text-indent: 21pt">会议指出，&ldquo;复杂性科学&rdquo;专栏的开设在国内尚属首创，顺应了我国学术期刊从综合性栏目到特色栏目再到专题栏目的发展趋势，通过栏目创新带动学报期刊实现整体优化。会议强调，要充分发挥学报的独特优势，紧跟学术动态，促进学术交流，力争成为国内引领&ldquo;复杂性科学&rdquo;研究的前沿阵地。</div>\r\n<div style="text-indent: 21pt">&nbsp;</div>\r\n<div style="text-indent: 21pt">会议认为，要在充分保证专栏稿件学术质量的基础之上，重点突出栏目特色，在专栏开办的具体过程中做好三个方面的工作，一是评审快捷，二是优秀论文优先录取，三是刊载专家评述；要加强专栏编委、学报编辑部及作者之前的沟通联系，并计划于2010年年底召开专栏第二次会议，研究探讨专栏在2011年的工作计划。</div>\r\n<div style="text-indent: 21pt">&nbsp;</div>\r\n<div style="text-indent: 21pt">据悉，《电子科技大学学报》将于2010年9月开设&ldquo;复杂性科学&rdquo;专栏。该专栏关注复杂性科学理论与实践研究的最新成果，刊载具有创新性的、高水平的研究论文、专题综述及学术动态，促进学术交流，为开展复杂性科学研究提供交流平台。专栏由电子科技大学的周涛教授、吴尽昭教授及李绍荣教授主持。届时，欢迎校内外专家学者踊跃投稿。</div>\r\n<p>&nbsp;</p>', 281, 0, '', '学报编辑部', 1, 'public/uploadfiles/UESTC0701.jpg', 1),
(21, 2, 1279450146, 6, 1278983940, 6, '“复杂性科学”专栏投稿须知', '<p>&nbsp;<b>专栏简介</b></p>\r\n<div style="text-indent: 21.75pt">《电子科技大学学报》于2010年9月开设&ldquo;复杂性科学&rdquo;专栏，该专栏关注复杂性科学理论与实践研究的最新成果，刊载具有创新性的、高水平的研究论文、专题综述及学术动态，促进学术交流，为开展复杂性科学研究提供交流平台。</div>\r\n<div>&nbsp;</div>\r\n<div><b>栏目特色</b></div>\r\n<div>(1) 选题集中，受众精确；</div>\r\n<div>(2) 评审快捷，优秀文章将优先录用；</div>\r\n<div>(3) 有述有评，每篇录用<span>文章将配以专家评述一同刊出；</span></div>\r\n<div>(4) 已建立国内近千名复杂性科学研究人员的通讯录，发表的论文将推荐给相关专家<span>；</span></div>\r\n<div>(5) 作者将有机会受邀<span>参加专栏组织的研讨班和学术会议；</span></div>\r\n<div>(6) 优秀文章将结集出版。</div>\r\n<div>&nbsp;</div>\r\n<div><b>来稿要求</b></div>\r\n<div style="text-indent: 21pt">热忱欢迎各位专家学者不吝赐稿，内容涉及<span>生物、社会、经济和信息等系统中复杂性问题的讨论，包括但不限于以下方面：</span></div>\r\n<ul>\r\n    <li><span style="font: 7pt ''Times New Roman''">&nbsp;</span><span style="color: #000080">复杂系统：复杂系统的统计规律；复杂系统的自组织、自适应和演化行为；复杂系统的非线性动力学行为；涌现复杂性；复杂系统的自相似、分形和混沌特性；复杂性的度量等等； </span></li>\r\n    <li><span style="color: #000080">复杂网络：复杂网络实证分析；网络演化模型；复杂网络的动力学，包括同步、交通、传播、博弈、铁磁动力学等等；复杂网络在生物、社会、经济、信息等系统中的具体应用等等； </span></li>\r\n    <li><span style="color: #000080">网络计算的复杂性分析：网络式软件的建模；网络式软件需求分析；网络式软件设计、验证与评估、应用及实证示范；网络协同开发中的复杂性问题等等； </span></li>\r\n    <li><span style="color: #000080">人类动力学：人类行为时间与空间统计特性的实证分析；人类行为时空特性的数学模型；人类行为特征的具体应用等等。 </span></li>\r\n</ul>\r\n<div><b>联系方式</b></div>\r\n<div>专栏编委：周涛教授<span>&nbsp;&nbsp; </span>吴尽昭教授<span>&nbsp;&nbsp; </span>李绍荣教授</div>\r\n<div>通信地址：四川省成都市建设北路二段4号&nbsp;电子科技大学学报编辑部(自然科学版)</div>\r\n<div>邮编：610054</div>\r\n<div>编辑部联系方式：028-83202308&nbsp;028-83207559<span>&nbsp;&nbsp; E-mail</span>：xuebao@uestc.edu.cn</div>\r\n<div>周涛教授联系方式：028-83206281&nbsp;&nbsp;&nbsp;&nbsp; E-mail: <span><a href="mailto:zhutouster@gmail.com">zhutouster@gmail.com</a> </span></div>\r\n<div>吴尽昭教授联系方式：028-83207820&nbsp;&nbsp; E-mail: <a href="mailto:himrwujz@yahoo.com.cn">himrwujz@yahoo.com.cn</a></div>\r\n<div>李绍荣教授联系方式：028-83207820&nbsp;&nbsp; E-mail: <a href="mailto:lsrxt@126.com">lsrxt@126.com</a></div>\r\n<div>投稿网址：<a href="http://www.xb.uestc.edu.cn">http://www.xb.uestc.edu.cn</a> (<span style="font-size: 10.5pt; font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">请在采编系统的作者留言中注明</span>《复杂性科学专栏》投稿，详情参见&ldquo;投稿须知&rdquo;)</div>\r\n<p>&nbsp;</p>', 259, 0, '', '', 0, '', 1),
(11, 6, 1275443220, NULL, 1275443220, 5, '投稿须知', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/UESTC20100602.doc">UESTC20100602.doc</a></p>', 752, 0, '', '', 0, '', 1),
(12, 6, 1275443340, NULL, 1275443340, 5, '模板', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/%E6%A8%A1%E6%9D%BF.doc">模板.doc</a></p>', 563, 0, '', '', 0, '', 1),
(14, 6, 1275444060, NULL, 1275444060, 5, '中文摘要写作要求', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/%E7%94%B5%E5%AD%90%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E5%AD%A6%E6%8A%A5%E4%B8%AD%E6%96%87%E6%91%98%E8%A6%81%E5%86%99%E4%BD%9C%E8%A6%81%E6%B1%82.doc">电子科技大学学报中文摘要写作要求.doc</a></p>', 261, 0, '', '', 0, '', 1),
(15, 6, 1275444240, NULL, 1275444240, 5, '英文摘要写作要求', '<p><br />\r\n请点击下载（右键另存为）或浏览:<a href="public/uploadfiles/%E7%94%B5%E5%AD%90%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E5%AD%A6%E6%8A%A5%E8%8B%B1%E6%96%87%E6%91%98%E8%A6%81%E5%86%99%E4%BD%9C%E8%A6%81%E6%B1%82.doc">电子科技大学学报英文摘要写作要求.doc</a></p>', 248, 0, '', '', 0, '', 1);

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
-- 转存表中的数据 `lz_paper`
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
-- 转存表中的数据 `lz_paper_file`
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
-- 转存表中的数据 `lz_rights`
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
-- 转存表中的数据 `lz_search`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `lz_user`
--

INSERT INTO `lz_user` (`user_id`, `rights_id`, `name`, `password`, `email`, `status`) VALUES
(3, 1, 'liujinsong', '37a2966d8db921253adf278b344bf4b3a65ce9f4', 'liujisong668@gmail.com', 'admin'),
(4, 1, 'xuebaoadmin', '81a67bc5bacbc2033b00746e93a037947cd2db93', 'xb@uestc.edu.cn', 'admin'),
(6, 1, '123456', 'a80eaeb8452523120aed95497bcc6e0b694931d1', 'xuebao@uestc.edu.cn', 'admin');
