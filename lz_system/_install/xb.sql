-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 05 月 29 日 16:02
-- 服务器版本: 5.1.32
-- PHP 版本: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xb`
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
) ENGINE=MEMORY  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `lz_cache`
--

INSERT INTO `lz_cache` (`cache_id`, `uri`, `create_time`, `ttl`, `content`, `order_id`) VALUES
(1, '#admin/category///false', 1275147443, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(2, '#admin/category//1/false', 1275147443, 30000000, 'array (\n  8 => \n  array (\n    ''category_id'' => ''8'',\n    ''parent_id'' => ''1'',\n    ''name'' => ''2010年5月上'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      9 => \n      array (\n        ''category_id'' => ''9'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''化工医疗'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      10 => \n      array (\n        ''category_id'' => ''10'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''机械工程'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      11 => \n      array (\n        ''category_id'' => ''11'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''电子信息'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      12 => \n      array (\n        ''category_id'' => ''12'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''通讯科技'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n    ),\n  ),\n)', 0),
(3, '#admin/category//2/false', 1275147443, 30000000, 'array (\n)', 0),
(4, '#admin/category//3/false', 1275147443, 30000000, 'array (\n)', 0),
(5, '#admin/category//4/false', 1275147443, 30000000, 'array (\n)', 0),
(6, '#admin/category//5/false', 1275147443, 30000000, 'array (\n)', 0),
(7, '#admin/category//6/false', 1275147443, 30000000, 'array (\n)', 0),
(8, '#admin/category//7/false', 1275147443, 30000000, 'array (\n)', 0),
(9, '#admin/category//0/false', 1275147451, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(10, '#admin/category/3/0/false', 1275147594, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(11, '#admin/category/3/0/1', 1275147594, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(12, '#admin/category/3//false', 1275147653, 30000000, 'array (\n  1 => \n  array (\n    ''category_id'' => ''1'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报内容'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      8 => \n      array (\n        ''category_id'' => ''8'',\n        ''parent_id'' => ''1'',\n        ''name'' => ''2010年5月上'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n          9 => \n          array (\n            ''category_id'' => ''9'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''化工医疗'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          10 => \n          array (\n            ''category_id'' => ''10'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''机械工程'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          11 => \n          array (\n            ''category_id'' => ''11'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''电子信息'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n          12 => \n          array (\n            ''category_id'' => ''12'',\n            ''parent_id'' => ''8'',\n            ''name'' => ''通讯科技'',\n            ''description'' => NULL,\n            ''keywords'' => NULL,\n            ''order_id'' => ''0'',\n            ''item_count'' => ''0'',\n            ''status'' => ''1'',\n            ''item_id'' => NULL,\n            ''depth'' => 2,\n            ''children'' => \n            array (\n            ),\n          ),\n        ),\n      ),\n    ),\n  ),\n  2 => \n  array (\n    ''category_id'' => ''2'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''信息公告'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  3 => \n  array (\n    ''category_id'' => ''3'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报介绍'',\n    ''description'' => '''',\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''4'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  4 => \n  array (\n    ''category_id'' => ''4'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''学报编委'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''3'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  5 => \n  array (\n    ''category_id'' => ''5'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''编辑部'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''2'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  6 => \n  array (\n    ''category_id'' => ''6'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''资料下载'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  7 => \n  array (\n    ''category_id'' => ''7'',\n    ''parent_id'' => ''0'',\n    ''name'' => ''联系我们'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''2'',\n    ''item_id'' => ''1'',\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(13, '#admin/category/3/1/false', 1275147653, 30000000, 'array (\n  8 => \n  array (\n    ''category_id'' => ''8'',\n    ''parent_id'' => ''1'',\n    ''name'' => ''2010年5月上'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n      9 => \n      array (\n        ''category_id'' => ''9'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''化工医疗'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      10 => \n      array (\n        ''category_id'' => ''10'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''机械工程'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      11 => \n      array (\n        ''category_id'' => ''11'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''电子信息'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n      12 => \n      array (\n        ''category_id'' => ''12'',\n        ''parent_id'' => ''8'',\n        ''name'' => ''通讯科技'',\n        ''description'' => NULL,\n        ''keywords'' => NULL,\n        ''order_id'' => ''0'',\n        ''item_count'' => ''0'',\n        ''status'' => ''1'',\n        ''item_id'' => NULL,\n        ''depth'' => 1,\n        ''children'' => \n        array (\n        ),\n      ),\n    ),\n  ),\n)', 0),
(14, '#admin/category/3/2/false', 1275147653, 30000000, 'array (\n)', 0),
(15, '#admin/category/3/3/false', 1275147653, 30000000, 'array (\n)', 0),
(16, '#admin/category/3/4/false', 1275147653, 30000000, 'array (\n)', 0),
(17, '#admin/category/3/5/false', 1275147653, 30000000, 'array (\n)', 0),
(18, '#admin/category/3/6/false', 1275147653, 30000000, 'array (\n)', 0),
(19, '#admin/category/3/7/false', 1275147653, 30000000, 'array (\n)', 0),
(20, '#admin/category/3/8/false', 1275148031, 30000000, 'array (\n  9 => \n  array (\n    ''category_id'' => ''9'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''化工医疗'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  10 => \n  array (\n    ''category_id'' => ''10'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''机械工程'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  11 => \n  array (\n    ''category_id'' => ''11'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''电子信息'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n  12 => \n  array (\n    ''category_id'' => ''12'',\n    ''parent_id'' => ''8'',\n    ''name'' => ''通讯科技'',\n    ''description'' => NULL,\n    ''keywords'' => NULL,\n    ''order_id'' => ''0'',\n    ''item_count'' => ''0'',\n    ''status'' => ''1'',\n    ''item_id'' => NULL,\n    ''depth'' => 0,\n    ''children'' => \n    array (\n    ),\n  ),\n)', 0),
(21, '#admin/category/3/9/false', 1275148031, 30000000, 'array (\n)', 0),
(22, '#admin/category/3/10/false', 1275148031, 30000000, 'array (\n)', 0),
(23, '#admin/category/3/11/false', 1275148031, 30000000, 'array (\n)', 0),
(24, '#admin/category/3/12/false', 1275148031, 30000000, 'array (\n)', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 导出表中的数据 `lz_category`
--

INSERT INTO `lz_category` (`category_id`, `parent_id`, `name`, `description`, `keywords`, `order_id`, `item_count`, `status`, `item_id`) VALUES
(1, 0, '学报内容', NULL, NULL, 0, 0, 1, NULL),
(2, 0, '信息公告', NULL, NULL, 0, 0, 1, NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- 导出表中的数据 `lz_config`
--

INSERT INTO `lz_config` (`config_id`, `name`, `type`, `value`, `description`, `order_id`) VALUES
(51, 'site_name', 'text', '电子科技大学学报', '网站主标题', 5),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 导出表中的数据 `lz_item`
--

INSERT INTO `lz_item` (`item_id`, `category_id`, `update_time`, `update_user_id`, `publish_time`, `user_id`, `name`, `description`, `view_count`, `order_id`, `keywords`, `author`, `has_pic`, `pic_url`, `status`) VALUES
(1, 7, 1275147645, 3, 1275127080, NULL, '联系我们', '<p>我在测试联系我们呢</p>', 6, 0, '联系', '', 0, '', 3),
(2, 5, NULL, NULL, 1275127114, NULL, NULL, NULL, 3, 0, NULL, NULL, NULL, NULL, 3),
(3, 4, NULL, NULL, 1275127118, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, NULL, 3),
(4, 3, NULL, NULL, 1275127128, NULL, NULL, NULL, 3, 0, NULL, NULL, NULL, NULL, 3),
(5, 2, 1275127620, NULL, 1275127620, 3, '免费师范生任教满一学期将可申请免试读研', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 教育部师范教育司副司长宋永刚表示，免费师范毕业生到中小学任教满一学期后，均可申请免试在职攻读教育硕士专业学位，经任教学校考核合格，部属师范大学根据工作考核结果、本科学习成绩和综合表现考核录取。免费师范生毕业前及在协议规定服务期内，一般不得报考脱产研究生。</p>\r\n<p><strong>　　远程教育与集中面授并用</strong></p>\r\n<p>　　在昨天教育部例行新闻发布会上，教育部师范教育司副司长宋永刚表示，免费师范生攻读教育硕士专业学位采取在职学习方式，年限一般2-3年，实行学分制。课程学习主要通过远程教育和寒暑假集中面授的方式进行。</p>\r\n<p>　　免费师范毕业生在职攻读教育硕士专业学位的招生计划，在全国研究生招生总规模之内单列，全部为国家计划。这一政策将从2012年开始实行，由培养免费师范生的<a href="http://kaoshi.edu.sina.com.cn/college/c/10027.shtml" target="_blank">北京师范大学</a>、东北师范大学、华东师范大学、华中师范大学、陕西师范大学和西南大学等六所教育部直属师范院校参与这项计划，这些学校的教育硕士研究生课程实行学分互认。</p>\r\n<p><strong>　　读研须选择所毕业大学</strong></p>\r\n<p>　　宋永刚解释说，免费师范生只要是在学校期间取得优异成绩，到工作岗位后能很快适应工作岗位要求，并经用人单位考核合格的，就可提出申请。但如果在学校以及工作期间表现不好的的，可能失去这一深造机会。</p>\r\n<p>　　宋永刚表示，目前在试点阶段，采取的是哪所学校培养的学生，申请哪所学校的在职教育硕士专业学位的方式。</p>\r\n<p><strong>　　■ 政策解读</strong></p>\r\n<p><strong>　　毕业生城镇就业须服务农村两年</strong></p>\r\n<p>　　教育部师范教育司副司长宋永刚表示，免费师范毕业生一般回生源所在省份中小学任教，&ldquo;履行国家义务&rdquo;。但这种要求并不是&ldquo;哪里来哪里去，不是来自某个乡村就要回哪个乡村任教&rdquo;，而是由省级教育行政部门统筹考虑本地区中小学教师总体需求和资源配置。</p>\r\n<p>　　据介绍，目前有90%的免费师范生来自于中西部地区，也就意味着将有相当数量的学生毕业后会回到中西部地区工作。</p>\r\n<p>　　宋永刚表示，免费师范毕业生到中小学任教岗位采取双向选择和安排就业两种方式落实。</p>\r\n<p>　　他称，免费师范毕业生一般回生源所在省份工作，但国家鼓励毕业生到边远贫困和民族地区任教。毕业前通过双向选择签订就业协议书的免费师范毕业生，其档案、户口等由培养学校直接迁转至用人单位及用人单位所在地户籍部门。</p>\r\n<p>　　毕业前未签订就业协议书的免费师范毕业生，其档案、户口等迁转至生源所在地省级教育行政部门，由省级教育行政部门会同有关部门统筹安排，到师资紧缺地区的中小学校任教。</p>\r\n<p>　　宋永刚还表示，到城镇学校工作的免费师范毕业生，由当地政府教育行政部门结合城镇教师支援农村教育工作，安排到农村学校任教服务二年。</p>\r\n<p>　　免费师范毕业生在农村学校任教服务期间仍享受派出学校原工资福利待遇。地方政府和农村学校要为免费师范毕业生到农村任教服务提供周转住房等必要的工作生活条件。</p>\r\n<p>　<strong>　■ 声音</strong></p>\r\n<p><strong>　　免试申请读研&ldquo;是一个很大的激励&rdquo;</strong></p>\r\n<p>　　正在北京师范大学化学学院就读的一名免费师范生，将这一政策理解为&ldquo;为了让我们尽量不去违约&rdquo;。</p>\r\n<p>　　她说，免费师范生毕业后，首先要在中小学任教长达十年，如果中途违约，就要退还已享受的免费教育费用并缴纳违约金。如果是在攻读在职教育硕士期间违约，就要取消学籍，并要公布违约记录，记入人事档案，&ldquo;这个处罚有点重，对我们影响挺大的&rdquo;。</p>\r\n<p>　　对于需要经过申请才能就读在职教育硕士，她说，虽然机会很大，但不可能每个人都读，总得有个挑选，&ldquo;不好好工作就没有这个机会，所以对我们而言也是一个很大的激励&rdquo;。(记者郭少峰 实习生何叶青)</p>\r\n<!-- publish_helper_end -->\r\n<p>　　更多信息请访问：<a style="font-size: 14px" class="akey" href="http://edu.sina.com.cn/gaokao/index.shtml" target="_blank">新浪高考频道</a> <a class="akey" href="http://bbs.edu.sina.com.cn/?h=http%3A//bbs.edu.sina.com.cn/g_forum/00/37/00/&amp;g=6" target="_blank">高考论坛</a> <a class="akey" href="http://q.blog.sina.com.cn/gkbk" target="_blank">高考博客圈</a> <span style="padding-left: 20px; background: url(http://i1.sinaimg.cn/edu/deco/2010/0426/icon_mobile.gif) no-repeat 0px 0px; margin-left: 10px"><a class="akey" href="http://edu.sina.com.cn/gaokao/2010-04-15/1747243125.shtml" target="_blank">订阅高考免费短信服务</a></span> <!-- <a class=akey href="http://bar.sina.com.cn/bar.php?name=%B8%DF%BF%BC" target="_blank">高考贴吧</a></p>\r\n--></p>\r\n<p>　　<font class="title12">特别说明：由于各方面情况的不断调整与变化，新浪网所提供的所有考试信息仅供参考，敬请考生以权威部门公布的正式信息为准。</font></p>\r\n<!-- google_ad_section_end --><!-- 正文内容 end -->', 14, 0, '师范 读研', '刘金松', 0, '', 1),
(6, 9, 1275127920, NULL, 1275127920, 3, '沃顿商学院教授激辩Twitter盈利模式', '<p><span style="font-family: KaiTi_GB2312">&nbsp;&nbsp;&nbsp; 导读：美国沃顿商学院旗下电子杂志《沃顿知识在线》周三撰文，列举了多名沃顿商学院教授对Twitter盈利模式的看法。</span></p>\r\n<p><strong>　　以下为文章全文：</strong></p>\r\n<p><strong>　　发布Promoted Tweet</strong></p>\r\n<p>　　星巴克承诺，只要在&ldquo;地球日&rdquo;当天带着可重复使用的平底杯来到星巴克连锁店的顾客，都可以享受免费续杯的服务。这原本只是一条普通的Twitter信息，但它却以一种不同的方式传递给Twitter用户&mdash;&mdash;出现在Twitter搜索页面的顶端。就连很多没有成为星巴克粉丝的用户也能看到该信息。在这条信息的一角有一个很小的黄色标签，上面写着&ldquo;由星巴克咖啡推广&rdquo;(Promoted by Starbucks Coffee)。</p>\r\n<p>　　这家总部位于西雅图的咖啡连锁巨头是首批参与Twitter创收项目的企业之一。这款全新的广告系统于上月发布，目前有5家企业参与测试，包括电子零售巨头百思买、饮料企业红牛、索尼影业、星巴克、美国维珍航空以及Bravo电视台。Twitter COO迪克&middot;科斯特罗(Dick Costolo)最近接受路透社采访时表示，到2010年第四季度，Twitter希望能够为&ldquo;Promoted Tweet&rdquo;广告系统吸引到数百家合作企业。</p>\r\n<p>　　&ldquo;我们的现状要求我们必须要具备数亿美元的创收能力，&rdquo;科斯特罗对路透社说，&ldquo;我们在考虑很大、很大的数字。&rdquo;</p>\r\n<p>　　Twitter可谓名人云集，《美国偶像》栏目组前评委宝拉&middot;阿布杜尔(Paula Abdul)和传奇自行车运动员兰斯&middot;阿姆斯特朗(Lance Armstrong)均在Twitter上开设了账户。虽然Twitter的估值去年就达到了10亿美元，但却至今仍未实现盈利。沃顿商学院的专家及其他业内人士都认为，要避免重蹈网景、Excite或Pets.com等昔日的&ldquo;明日之星&rdquo;的覆辙，为Promoted Tweet找到成功的商业模式只是Twitter面临的众多挑战之一。</p>\r\n<p>　　Twitter所面临的商业困境十分复杂。它如何才能帮助企业创建一种与用户互动的平台，从而将这样一款每条信息只能容纳140个字符的服务转化成为一款有效的营销和客服工具？Twitter如何才能发挥优势，将之前的努力转变成一种行之有效的创收战略？</p>\r\n<p><strong>　　吸引大量眼球</strong></p>\r\n<p>　　从吸引公众注意的角度来看，Twitter获得了很大的成功。美国市场研究公司Edison Research/Arbitron今年2月进行的一项调查显示，在12岁及以上年龄的美国人中，有87%的人知道Twitter是什么，这一数字与Facebook相当。但与之形成鲜明对比的是，这些受访者中，有41%是Facebook的活跃用户，而Twitter的这一比例却仅为7%。</p>\r\n<p>　　负责开展该项调查的Edison Research战略和营销副总裁汤姆&middot;韦伯斯特(Tom Webster)说：&ldquo;有1700万人使用Twitter，这并不是个小数。企业肯定会将其作为整体营销战略的一部分来对待，至少目前如此。但从长期来看，Twitter能否获得主流美国用户的认同，将会真正决定其商业价值。&rdquo;</p>\r\n<p>　　Twitter诞生于2006年3月。当时，总部位于旧金山的播客(<a class="akey" href="http://you.video.sina.com.cn/" target="_blank"><font color="#000099">视频分享</font></a>)公司Odeo通过一次头脑风暴会议挖掘出了这样一个创意。该公司的主要领导者认为，播客业务正在逐渐被苹果等大型企业抢夺，因此想要找到一款新的产品，作为发展方向。这一创意最初为众人所知，是因为它可以向一组好友发送简短的信息，告知对方自己当前正在做什么。Twitter将信息的长度限制在140个字符以内，并且开始在Odeo员工及其好友之间使用。直到2006年7月，Twitter才正式对公众开放。</p>\r\n<p>　　Twitter最早崭露头角是在2007年3月的SXSW音乐和互动媒体大会上，当时的会场过道上放置了许多等离子显示器，上面显示着与会者发送的有关自己当前活动的Twitter信息。大会发言人提到了Twitter，博客圈在热议Twitter，而Twitter也不负众望，一举夺得了那年的SXSW大会网络奖。自那以后，Twitter开始加速发展。2007年时，每季度的信息发送量仅为50万条，到了第二年就增长到1亿条。2010年第一季度，该公司的信息发送量超过40亿条。</p>\r\n<p>　　&ldquo;但真正的问题还在于Twitter如何将这一切转化成真金白银。目前来看，还不明确。&rdquo;沃顿商学院市场营销教授兼沃顿互动媒体项目(以下简称&ldquo;WIMI&rdquo;)联席总监埃里克&middot;布拉德罗(Eric Bradlow)说。他认为，互联网企业的成功秘诀在于，既不能疏远或失去用户，又要顺利部署盈利措施。他说：&ldquo;或许他们可以通过收费方式允许用户发布较长的信息，或者面向企业推出双重定价模式。或许他们也可以在用户发送了一定数量的Twitter信息后开始收费，也可以在Twitter页面或Twitter信息中插入广告。&rdquo;</p>\r\n<p><strong>　　把信息变成真金白银</strong></p>\r\n<p>　　Promoted Tweet只是一种可以根据用户的搜索结果显示在页面顶部的广告信息。例如，在星巴克的案例中，任何人对包含&ldquo;咖啡&rdquo;(coffee)的Twitter信息进行搜索时，都会看到来自星巴克的推广信息。要发布这种广告，企业需要向Twitter付费。除了在信息的一角添加了&ldquo;由&hellip;&hellip;推广&rdquo;(promoted by)的标签外，这类信息的功能和外观与其他Twitter信息没有任何差别，用户也可以对其进行评论。</p>\r\n<p>　　Twitter高管对该项目的表态非常谨慎，他们称，Promoted Tweet模式仍然处于实验阶段。然而，本周早些时候，该公司却宣布封杀其网站上的第三方广告。在观察人士看来，Twitter希望借助此举加强对盈利计划的控制。对于Promoted Tweet或其他项目能否让Twitter实现盈利，专家观点不一。沃顿商学院市场营销教授兼WIMI联席总监彼得&middot;菲德尔(Peter Fader)说：&ldquo;我认为Promoted Tweet是一个坏主意。虽然这类信息只是出现在搜索结果的顶端或一侧等相对不太显眼的地方，但是却会破坏Twitter的用户体验。&rdquo;</p>\r\n<p>　　菲德尔认为，Twitter应当开始寻找不同的盈利方式。他说：&ldquo;对于Twitter而言，正确的商业模式应当是被其他企业收购，并且将用户体验整合到更为广泛的媒体服务中去。我认为，作为一家独立企业运营，Twitter的优势很小。&rdquo;</p>\r\n<p>　　但沃顿商学院运营与信息管理教授卡提克&middot;霍桑纳格(Kartik Hosanagar)却认为，那些不看好Twitter的人现阶段最好保持耐心。&ldquo;Promoted Tweet是Twitter发布的第一款重大的创收项目，&rdquo; 霍桑纳格说，&ldquo;这与谷歌通过搜索广告获得成功如出一辙，因为它也可以非常好地匹配用户需求。Twitter需要借助Promoted Tweet为用户提供有用的信息。除了匹配关键词，他们还需要做很多事情。&rdquo;</p>\r\n<p>　　霍桑纳格说，Twitter还有其他一些可能的创收渠道，但他认为：&ldquo;挑战在于Twitter仍在增长，而且不希望将自己锁定在&hellip;&hellip;一种可能影响其增长的战略中&hellip;&hellip;例如，Twitter通过与谷歌和必应等大型搜索引擎签订的实时数据授权协议，已经赚取数百亿美元。Twitter可以赚更多钱，对此我没有异议。但问题在于，机会究竟有多大。&rdquo;</p>\r\n<p><strong>　　或应剥离娱乐信息</strong></p>\r\n<p>　　然而菲德尔却警告说，Twitter在许多人看来却非常轻浮。该网站曝出的内容多数都是一些流言蜚语，以及名人之间的嘴仗。正因如此，企业和普通消费者很难将其视为一款严肃的商业工具。</p>\r\n<p>　　&ldquo;人们会打开CNN来了解影星艾什顿&middot;库切(Ashton Kutcher)在Twitter上获得了多少粉丝，这为Twitter带来了很高的曝光率。但从长期来看，这未必是好事。&rdquo;菲德尔说：&ldquo;较为严肃的人或许会说，&lsquo;我不会用那个东西&rsquo;&hellip;&hellip;起这种矫揉造作的名字，还用一个鸟做标识，甚至让艾什顿和布莱尼&middot;斯皮尔斯(Britney Spears)比试谁先拥有100万个粉丝，这真是丢人。如果将娱乐内容剥离，变成一款不同的服务，Twitter或许有机会真正吸引到企业和用户。&rdquo;</p>\r\n<p>　　但是杜克大学企业家精神和商业化研究中心主任维韦克&middot;瓦德瓦(Vivek Wahdwa)认为，Twitter上那些轻松的元素不会对其商业前景产生影响，Promoted Tweet尤其如此。他说：&ldquo;我发现，有两种Twitter用户：一种是每次去洗手间都会发信息的人，还有一种则是能够发表有用信息的人。&rdquo;瓦德瓦起初对Twitter持怀疑态度，但现在却用Twitter来进行专业交流。他认为，与其他社交媒体服务配合使用，Twitter将会非常有用。他说：&ldquo;通过你所发表的信息，Twitter就可以判断你的大概兴趣，并为你发送相关信息。这一点与谷歌的网络搜索如出一辙。在我看来，Promoted Tweet之于Twitter就好比搜索广告之于谷歌。&rdquo;</p>\r\n<p>　　Twitter已经通过一系列努力向企业展示其商业用途。企业可以通过Twitter账号来进行推广，并进行客服活动。例如，位于纽约的Tasti D-Lite冰淇淋连锁店的一名员工可以使用该公司的Twitter账号来回答用户提问，并提供建议。而戴尔电脑也可以通过Twitter发布独家优惠券和特惠信息。</p>\r\n<p>　　但菲德尔也警告说，Twitter并没有在企业的社交媒体战略中获得垄断地位。他说：&ldquo;LinekdIn和Facebook也都在尝试。总有一家企业会找到合适的方法。将微博与其他功能整合到一起似乎是企业营销活动的一种不可避免的途径。现在就像是美国西部拓荒时期一样，有各种各样的交流方式同时存在。&rdquo;</p>\r\n<p><strong>　　与&ldquo;潜水者&rdquo;互动</strong></p>\r\n<p>　　戴尔和Tasti D-Lite提供了两个企业与Twitter用户进行互动的例子。但是专家质疑，企业是否能够借助这种方式接触到更多的用户？如果答案是否定的，Twitter又如何说服企业将其列为社交媒体和互联网推广过程中的必备投资对象？</p>\r\n<p>　　Edison Research/Arbitron的调查显示，多数Twitter用户都是&ldquo;潜水者&rdquo;。也就是说，这些用户虽然会关注很多人，但却并不会参与到对话中去，也不会贡献大量的原创内容。该报告称：&ldquo;与Facebook等其他社交网站和服务相比，Twitter似乎更像是一种广播媒体。&rdquo;正因如此，Twitter用户可能更容易接受产品推广信息。该报告写道：&ldquo;总体而言，关注品牌的Twitter用户比例为其他社交网站的三倍多。大量的普通Twitter用户表示，他们不仅会使用该服务来寻找有关企业、产品和服务的评价，也会提供相关的评价。&rdquo;</p>\r\n<p>　　沃顿商学院法律研究和商业道德教授安德里亚&middot;马特维新(Andrea M. Matwyshyn)认为，Twitter商业应用是否能够真正普及并获得成功，取决于这些&ldquo;潜水者&rdquo;能否成为企业真正感兴趣的用户。&ldquo;如果你被困在等候室中，那么Twitter等社交网站的用途或许仅仅是打发时间而已。&rdquo;她说，&ldquo;现在，随着黑莓和其他移动设备的普及，人与人之间的交流已经没有了时间和空间的障碍。但这并不意味着交流是用户必备的功能。我真的想要随时了解可口可乐推出的最新产品吗？现在还不确定，所以我们不得不继续观察它的发展。&rdquo;</p>\r\n<p>　　《沃顿知识在线》对多名沃顿商学院教授进行了调查，以便了解Twitter在他们这类人群心目中的地位。这一调查获得了广泛的响应。</p>\r\n<p>　　沃顿商学院法律研究与企业道德教授凯文&middot;沃巴赫(Kevin Werbach)说，他认识Twitter CEO埃文&middot;威廉姆斯(Evan Williams)，而且在该服务面向公众发布后便开始尝试这款产品。他说：&ldquo;对我而言，Twitter是博客之后的下一个发展阶段。博客大幅降低了个人信息发布的门槛，Twitter则进一步降低了这个门槛。&rdquo;沃巴赫至今已经发送了约2400条Twitter信息，他拥有3300名粉丝，关注的人也达到了700人。他补充道：&ldquo;发布Twitter信息是一种非常简单的方式，可以表达自己的思想，或者与好友及其他有相同兴趣的人分享信息&hellip;&hellip;我经常从Twitter中获得链接，并通过浏览器浏览这些内容。我关注了很多人，有的是朋友，有的是对某些我关心的问题有独到见解的人，还有一些则是公众人物或组织。&rdquo;</p>\r\n<p>　　沃顿商学院市场营销教授大卫&middot;贝尔(David R. Bell)也开设了Twitter账号，并借此来关注一些新闻机构和其他新闻来源，2009年H1N1流感爆发期间，他的使用尤其频繁。但他几个月来并没有发送过一条Twitter信息。贝尔说：&ldquo;我没有形成使用习惯。我并没有从发送Twitter信息中看到任何特别的好处。我需要重新评估成本收益率。我猜想，对于那些拥有大批粉丝的名人，以及那些真正关心流行歌星Jay-Z午饭吃了什么的人而言，Twitter最为有用。对于某些特定的品牌而言，或许也会很有用。&rdquo;</p>\r\n<p>　<strong>　自恋狂的聚集地</strong></p>\r\n<p>　　但其他一些教授则认为，Twitter并没有提供足够的益处，因此不值得花时间来关注大量个人用户和组织所发布的信息。沃顿商学院法律研究和商业道德教授尼恩赫&middot;谢(Nien-he Hsieh)说，他并没有尝试过Twitter，原因在于：&ldquo;我不认为我有那么多的交流，而且140个字符也极大地限制了内容。&rdquo;沃顿商学院市场营销教授克里斯多夫&middot;范登堡特(Christophe Van den Bulte)则更为直言不讳：&ldquo;我不是自恋狂。我对实时更新当前的状态，以及那些自恋狂的观点不感兴趣。而且，我不希望被大量未经认真思考的短信息所包围。&rdquo;</p>\r\n<p>　　其他一些教授对Twitter的使用则非常有限。沃顿商学院市场营销教授伦纳德&middot;罗迪士(Leonard Lodish)只用Twitter与那些参加ALS慈善自行车赛的人取得联系。霍桑纳格并没有创建个人的Twitter账户，但他为一门课程创建了一个账号，名叫使能技术(Enabling Technologies)。他说：&ldquo;这个账户是为了保证以前的学生和现在的学生以及其他对高科技和新媒体感兴趣的人可以关注这门课。通过这种方式来使用Twitter对我们的课程而言非常完美。这其实也是一门关于新媒体的课程。&rdquo;</p>\r\n<p>　　菲德尔和布拉德罗对于Twitter的使用十分有限。布拉德罗表示，他虽然会用Twitter来发信息，但频率很低，而且通常是在会议和谈话期间才会这么做。他说：&ldquo;作为WIMI的一名联席总监，我通过Twitter发布的信息就是我的谋生手段。这是我与外界分享知识和信息的另外一种方式。我关注了几家创业企业的人，他们是我的朋友，但仅限于此。我不会关注Lady Gaga或者贾斯汀&middot;蒂姆布莱克(Justin Timberlake)。如果我想了解他们的情况，我会去看《People》杂志。&rdquo;</p>\r\n<p>　　菲德尔则会根据自己的兴趣(棒球和科技)阅读ESPN和《纽约时报》的Twitter信息，并定期向他的粉丝发布研究成果，这些粉丝通常都是他的学生或同事。&ldquo;但是这就引出了一个问题，如果我有一个粉丝列表，为什么不干脆弄一个电子邮件列表？这样我就可以向他们发送更长的信息了。&rdquo;菲德尔问道：&ldquo;是什么让我以这种方式来使用Twitter？或许只是因为它当时看起来很新鲜。&rdquo;</p>\r\n<p>　　他相信，通过他的个人经验便能概括出企业为何要对Twitter及其盈利模式保持清醒的头脑。&ldquo;他们创造了一个市场。我不认为在Twitter发布之前，我们便有了需要微博服务的想法，但现在的确存在这种需求。例如，如果你有了Skype，你就会期待着视频电话服务，因为《摩登家族》(The Jetsons)里展示了这种服务。&rdquo;他说，&ldquo;所以，企业应当谨慎看待Twitter的盈利模式。他们必须要对各种交流方式保持清醒的头脑。只有对其进行深入研究，才能真正从中获益。&rdquo;(鼎宏)</p>\r\n<!-- publish_helper_end --><!-- {09正文所属专题显示} -->', 5, 0, '盈利 教授', '学报', 0, '', 1),
(7, 10, 1275128100, NULL, 1275128100, 3, '联通iPhone降价销量环比增100% 部分机型断货', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 新浪科技讯 5月27日消息，知情人士透露，五一期间开始实施iPhone合约计划资费下调后，联通iPhone迄今销量环比增长已近100%，已经出现供不应求局面，有些版本的iPhone全渠道缺货，据悉，目前联通正加紧备货，以缓解iPhone缺货情况。</p>\r\n<p>　　<strong>降价促销使销量大增</strong></p>\r\n<p>　　5月26日晚上，国美一位人士证实，联通iPhone销量在5月份确实增长很快，现在16G的iPhone手机已经卖得断货，正不断向联通催货。</p>\r\n<p>　　据悉，导致联通iPhone供不应求的原因是中国联通是于5月1日开始执行新的3G资费。与此同时，联通版iPhone的合约计划也将同时变更，最低档月费由126元降至96元，以预存话费方式参与的合约价格也下降千元左右。</p>\r\n<p>　　相关人士透露，之前iPhone价格偏高，是造成目前很多消费者对iPhone既爱且恨、徘徊观望的主要原因，也导致许多用户转而购买水货。</p>\r\n<p>　　但水货的问题也很多，不仅16G版以上的iPhone很难激活解锁，而且，水货中很多是旧机翻新，甚至是完全假冒的非iPhone手机，让很多用户不敢买。</p>\r\n<p>　　而降价后，iPhone合约计划资费大大降低门槛，iPhone 3GS 16G版本只需要预存话费且承诺使用286套餐即可享受0元购机，即免费赠送iPhone手机，这无疑大大刺激了用户的购买需求，先前被价格压抑的用户需求一下子释放出来，导致供不应求。</p>\r\n<p>　　<strong>16G的iPhone手机缺货最严重</strong></p>\r\n<p>　　而社会渠道商缺货问题更严重。&ldquo;在供不应求的情况下，联通首先要保证自己的供应，另外，联通希望用户通过签订合约计划买iPhone，而不是卖裸机，所以，虽然渠道商很积极，但以卖裸机为主的社会渠道商现在拿货很困难，&rdquo;上述国美人士如此说。</p>\r\n<p>　　据透露，目前在许多地方iPhone都缺货，用户签约后要过一段时间才能拿到iPhone手机，目前，8G、16G、32G内存容量的iPhone手机均严重缺货，尤其是16G的iPhone手机缺货严重。</p>\r\n<p>　　而反观联通iPhone&ldquo;24个月合约计划&rdquo;调整后，用户的进入门槛也确实有较大幅度下降，总体降价幅度达20%，。其中，用户购买8G版iPhone的合约价格由此前的5999元降至4999元， 16G版iPhone的合约价格由此前的6999元降至5880元，32G版iPhone的合约价格由此前的7999元降至6999元，同时，联通大幅增加对用户的购机补贴，预存话费并承诺使用286套餐即可享受免费拿iPhone，这自然能刺激销量。</p>\r\n<p>　　据透露，iPhone合约计划资费下调的作用非常明显，随着五一后中国联通开始执行这项新的资费政策，iPhone绝对销量和合约计划销量比之前都有了很大提升，市场出现了iPhone的热销情况。</p>\r\n<p>　　<strong>苹果公司对销量大涨预期不足</strong></p>\r\n<p>　　另据透露，客观来说，导致iPhone缺货的另一原因是，苹果公司对中国市场出现的热销场面准备不足。</p>\r\n<p>　　iPhone供应商苹果公司没想到降价后销量会如此大增，而备货需要一定环节和提前相当一段时间准备，销量翻番后造成联通iPhone的库存量急剧下滑，最后导致库存缺乏。</p>\r\n<p>　　据悉，目前，中国联通相关部门采取的措施是，一方面对有购买意向的用户进行预售登记，这样可以保证用户在新品到货的第一时间拿到手机；另一方面，联通大力向生产商通报销售情况，积极申请货源，以保证市场供应以及向渠道代理商供货。预计iPhone缺货情况过段时间将缓解，以满足用户和渠道代理商需求。</p>\r\n<p>　　业内估计，在市场需求的督促下，苹果正在进一步加速生产，以保证中国市场货源充足。(康钊)</p>\r\n<!-- publish_helper_end --><!-- {09正文所属专题显示} -->', 10, 0, 'iphone 联通', '刘金松', 0, '', 1),
(8, 11, 1275128160, NULL, 1275128160, 3, '国家测绘局6月份颁发互联网地图首批牌照', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 国家测绘局有关负责人透露，国家测绘局将于今年6月颁发首批互联网地图服务商牌照，搜狐旗下搜狗地图等有望首批拿&ldquo;牌&rdquo;。这位人士还透露，到2010年底，如果未取得牌照但仍从事互联网地图服务的服务商将被依法查处。</p>\r\n<p>　　业内人士认为，新《标准》的颁布是中国互联网地图产业发展的里程碑，对健全从业资质审批体系、规范地图信息管理起到至关重要的作用。良好的行业环境为网络地图应用的爆发式增长创造了有利的条件。</p>\r\n<p>　<strong>　行业最新标准公布</strong></p>\r\n<p>　　5月17日，国家测绘局发布了最新修订的《互联网地图服务专业标准》。据依据新《标准》，从资质审核、服务范畴、质量管理、安全保密、版权保护等诸多方面进行了规范。《标准》将互联网地图服务资质划分为甲、乙两级，并首次将手机、掌上电脑等无线互联网络调用的地图等纳入互联网地图管理范围。</p>\r\n<p>　　包括有线网络与无线网络在内的互联网地图服务是当前网络应用中的一大热门。据不完全统计，当前我国从事互联网地图服务的网站约4.2万个，国内互联网地图服务市场的争夺也趋白热化。但此前没有设置行业准入门槛，因此，服务商质量良莠不齐。</p>\r\n<p>　　业内人士认为，此举是国家测绘局加强互联网地图服务监管的重要措施，通过颁发牌照来规范行业发展，将进一步规范互联网地图服务从业单位资质管理，促进互联网地图和地理信息服务市场健康有序发展。</p>\r\n<p>　　这位负责人表示，截至今年12月底，将对未申请互联网地图服务资质但仍从事互联网地图服务活动的单位，按照无证测绘进行依法查处，并向社会公开曝光。</p>\r\n<p><strong>　　服务商参与标准制定</strong></p>\r\n<p>　　对于行业主管部门的发牌举动，多数互联网地图运营商都表示欢迎。百度地图有关负责人表示将积极申领牌照，并将在拿到牌照后发布新款手机客户端地图产品。</p>\r\n<p>　　中国证券报记者了解到，国家测绘局此次在制定标准时，邀请互联网地图服务商参与标准制定工作，并向服务商们就互联网地图的服务质量、信息安全和技术等方面征求意见，百度地图、搜狗等服务商给出了许多建议和支持。</p>\r\n<p>　　资料显示，百度地图是百度首页的重量级产品。百度刚刚宣布免费开放地图API(应用程序接口)，使得国内数百万家中文网站都能够受益于百度地图所带来的便捷服务。</p>\r\n<p>　　而搜狗地图则依靠收购整合老牌地图服务提供商图行天下(go2map)，积极发展新用户。目前包含1000多万条地图数据，覆盖近400个大中城市、热点旅游城市及3000个区县，并在130个城市提供公交换乘服务，每天接受来自4亿网民提交的7000万次查询需求。</p>', 4, 0, '互联网 测绘', '施扬', 0, '', 1),
(9, 12, 1275128220, NULL, 1275128220, 3, '富士康称将为员工加薪20% 分析师忧订单转移', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 新浪科技讯 5月28日上午消息，富士康加薪传言或成为事实。据国外媒体报道，鸿海集团周五表示，将调高旗下富士康科技集团员工基本薪资约20%。</p>\r\n<p>　　鸿海集团发言人丁祈安对路透社称，加薪方案已研究一段时间，会在近期实施。</p>\r\n<p>　　有分析师担心，加薪将令鸿海获利下降，且有客户移转订单的疑虑，这一消息也使得鸿海今日股价表现较弱。</p>\r\n<p>　　今年以来，富士康共有12起富士康员工坠楼事件见诸报道，事件共造成10人死亡，2人受伤。此外，富士康还于昨天发生一起员工割脉事件。</p>\r\n<p>&nbsp;&nbsp;&nbsp; 5月26日，鸿海集团董事长郭台铭邀请媒体参加富士康深圳厂区并为此公开道歉，并承诺采取加装防护网，培训心理咨询师等措施，但有厂区工人称，富士康措施治标不治本。</p>\r\n<p>&nbsp;&nbsp;&nbsp; 包括苹果公司在内的多家富士康客户均对一系列意外事件表达了关注，并声称将展开调查。一些民间团体则发起了针对苹果产品的抵制行动。</p>\r\n<!-- publish_helper_end -->', 10, 0, '富士康', '施扬', 0, '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `lz_user`
--

INSERT INTO `lz_user` (`user_id`, `rights_id`, `name`, `password`, `email`, `status`) VALUES
(3, 1, 'liujinsong', '37a2966d8db921253adf278b344bf4b3a65ce9f4', 'liujisong668@gmail.com', 'admin');
