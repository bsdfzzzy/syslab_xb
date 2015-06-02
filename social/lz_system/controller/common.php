<?php
$_page_bottom = $db->get_one("SELECT * FROM ".LZ_MYSQL_PREFIX."item WHERE category_id='60' LIMIT 1");
$view_data['page_bottom'] = $_page_bottom['description'];
