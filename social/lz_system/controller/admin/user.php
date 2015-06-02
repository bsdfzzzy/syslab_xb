<?php
LZ_MODULE != 'admin' && die('Access Denied');
if($_SESSION['login_user']['status'] != 'admin')
{
	lz_exit(ACCESS_DENIED,'admin.php',1);
}
$user_id = intval($_GET['user_id']);
$m = $_GET['m'];
$action = $_GET['action'];
include_once('model/user.php');
$user = new LZ_User;
include_once('model/rights.php');
$rights = new LZ_Rights;

if ($m == 'new_user')
{
	$data = filter_array($_POST,'name!,lz_encode:password!,email,status');
	if ($user->exists($data['name']))
	{
		lz_exit(lang("USER_EXISTS"),'admin.php?p=user',1);
	}
	else if ( $user->add($data) )
	{
		lz_exit(lang('USER_NEW_SUCCESS'),'admin.php?p=user',1);
	}
	else
	{
		$err_msg = lang('USER_NEW_ERROR');
		$action = 'new_user';
	}
}

if ($action == 'new_user')
{
	$temp = template('user_new.html');
	$temp->assign( array(
		'user' => $_POST,
		'is_edit_user' => false,
		'user_id' => $user_id,
	));
	$view_data['page_description'] = lang('NEW_USER');
	$view_data['page_content'] = $temp->result();
}
else if ($action == 'edit_user')
{
	$temp = template('user_new.html');
	$temp->assign( array(
		'user' => $user->get_one($user_id),
		'is_edit_user' => true,
		'user_id' => $user_id,
	));
	$view_data['page_description'] = lang('EDIT_USER');
	$view_data['page_content'] = $temp->result();
}
else
{
	$view_data['page_description'] = lang('USER_INDEX');
}

$view_data['err_msg'] = $err_msg;
$view_data['user_id'] = $user_id;
$users = $user->get_list();
for($i=0;$i<count($users);$i++) 
{
	$_rights = $rights->get_one($users[$i]['rights_id']);
	$users[$i]['rights_group_name'] = $_rights?$_rights['name']:lang('DEFAULT_RIGHTS_GROUP');
}
$view_data['rights'] = $rights->get_list();
$view_data['users'] = $users;
?>