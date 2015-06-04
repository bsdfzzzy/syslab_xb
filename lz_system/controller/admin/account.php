<?php
LZ_MODULE != 'admin' && die('Access Denied');
define('LZ_RESPONSE','text');
$m = $_GET['m'];
include('model/user.php');
$user = new LZ_User;
if ($m == 'edit')
{
	check_allowed('account','update',1);
	set_allowed('user','update');
	$data = filter_array($_POST,'email');
	if ($_POST['password']) $data['password'] = lz_encode($_POST['password']);

	if ($data && $user->update($_SESSION['login_user']['user_id'],$data))
	{
		remove_allowed('user','update');
		$_SESSION['login_user'] = $user->get_one($_SESSION['login_user']['user_id']);
		echo lang('USER_UPDATE_SUCCESS');
		die;
	}
	else
	{
		remove_allowed('user','update');
		echo  lang('USER_UPDATE_ERR');
		die;
	}
}
else if ($m == 'get_user')
{
	$arr = $user->get_one($_SESSION['login_user']['user_id']);
	echo json_encode($arr);
	die;
}


include_once('plugin/fckeditor/fckeditor.php');
$view_data['user'] = $user->get_one($_SESSION['login_user']['user_id']);
$view_data['page_description'] = lang('MY_ACCOUNT');


function exit_js($s)
{
	echo '<script>';
	echo $s;
	echo '</script>';
	die;
}
?>