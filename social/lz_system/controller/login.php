<?php
!defined('LZ_MODULE') && die('Access Denied');
$module = $_GET['module'];
$m = $_GET['m'];

$back_url = ($module == 'admin')?'admin.php':'index.php';


if ($module == 'ajax')
{
	if ($m == 'login')
	{
		include_once('model/user.php');
		$user = new LZ_User;
		$data = filter_array($_POST,'name!,lz_encode:password!');
		if ($data)
		{
			$u = $user->check_password($data['name'],$data['password']);
			if ($u['user_id'])
			{
				$_SESSION['login_user'] = $u;
				$re = array(
					'msg' => lang('LOGIN_SUCCESS'),
					'eval' => 'close_login_window()',
					'success' => true,
				);
				echo json_encode($re);
				die;
			}
			else
			{
				$re = array(
					'msg' => lang('LOGIN_ERROR'),
					'success' => false,
					'eval' => "$('[id^=login_input]').val('');",
				);
				echo json_encode($re);
				die;
			}
		}
	}
	else if ($m == 'logout')
	{
		$_SESSION['login_user'] = null;
		$re = array(
			'msg' => lang('LOGOUT_SUCCESS'),
			'success' => true,
			'eval' => "",
		);
		echo json_encode($re);
		die;
	}
	
	$_temp = template('login_ajax.html');
	$view_html = $_temp->result();
	
}
else if ($module == 'admin')
{
	if ($m == 'login')
	{
		include_once('model/user.php');
		$user = new LZ_User;
		//$user->test($_GET['name']);
		$data = filter_array($_POST,'name!,lz_encode:password!');
		if ($data)
		{
			$u = $user->check_password($data['name'],$data['password']);
			if ($u['user_id'])
			{
				$_SESSION['login_user'] = $u;
				lz_exit(lang('LOGIN_SUCCESS'),$back_url,1);

			}
			else
			{
				$err_msg = lang('LOGIG_ERROR');
			}
		}
	}
	else if ($m == 'logout')
	{
		$_SESSION['login_user'] = null;
		lz_exit(lang('LOGOUT_SUCCESS'),$back_url,1);
	}
	
	
	$_temp = template('login.html');
	$_temp->assign('err_msg',$err_msg);
	$view_html = $_temp->result();
	
}

?>