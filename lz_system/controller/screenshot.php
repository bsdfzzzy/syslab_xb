<?php
include(LZ_BASEPATH.'controller/item.php');
$view_data['title'] = $this_item['name'].' screenshots';
$view_data['description'] = 'Screenshots of '.$this_item['name'].',the picture information of '.$this_item['name'];
$view_data['page_top'] = $this_item['name'].' Screenshots';
$view_data['keywords'] = $this_item['name'];
$lz_make_html_path = LZ_TOPPATH.$view_data['screenshot_url'];
?>