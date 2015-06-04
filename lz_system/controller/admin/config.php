<?php
LZ_MODULE != 'admin' && die('Access Denied');
$m = $_GET['m'];
include_once('model/config.php');
$config = new LZ_Config;
$config_id = intval($_GET['config_id']);

if ($m == "new_config")
{
	$data = filter_array($_POST,'name!,description!,type!');
	if ($data)
	{
		if ($config->add( $data ) )
		{
			lz_exit(lang('CONFIG_NEW_SUCCESS'),'admin.php?p=config',1);
		}
		else
		{
			$action = 'new_category';
			$err_msg = lang('CONFIG_NEW_ERROR');
		}
	}
	else
	{
		$action = 'new_config';
		$err_msg = lang('CONFIG_FILL_ALL');
		$view_data['thisconfig'] = $_POST;
	}
}

$view_data['err_msg'] = $err_msg;
$view_data['config_list'] = $config->get_list();
$view_data['page_description'] = lang('TITLE');
?>