<?php
include(LZ_BASEPATH.'controller/item.php');
$view_data['title'] = $this_item['name'].' free download';
$view_data['description'] = $this_item['name'].' free download,'.$this_category['name'].' software free download';
$view_data['keywords'] = $this_item['name'];
$view_data['page_top'] = $this_item['name'].' Free Download';
$lz_make_html_path = LZ_TOPPATH.$view_data['download_url'];
?>