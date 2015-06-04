<?php
LZ_MODULE != 'admin' && die('Access Denied');

$m = $_GET['m'];
$value = $_POST['value'];
$id = intval($_GET['id']);
$table = $_GET['table'];
$column = $_GET['column'];

$_allowed = "category,item,user,photo_category,config,guestbook,rights,paper";
define('LZ_RESPONSE','text');
check_allowed($table,$m,1);
if ($table)
{
	if (strpos(",$_allowed,",",$table,") !== false)
	{
		include_once("model/".$table.'.php');
		eval('$obj = new LZ_'.$table.';');
	}
}

if (!$obj)
{
	ajax_exit('table needed');
}

if ($table == 'photo' && $m == 'delete')
{
	$ids = $_GET['ids'];
	if ($ids && $obj)
	{
		$arr = explode(',',$ids);
		foreach($arr as $id)
		{
			$id = intval($id);
			if ($id)
			{
				$data = $obj->get_one($id);
				$obj->delete($id);
				@unlink($data['file_path']);
				@unlink($data['small']);
				@unlink($data['big']);
			}
		}
		ajax_exit($ids);
	}
}


if ($m == 'update')
{
	if ($id && $column )
	{
		if ($obj->update($id,array($column => $value)))
		{
			$arr = $obj->get_one($id);
			ajax_exit($arr[$column]);
		}
		else
		{
			ajax_exit(lang("UPDATE_ERROR"));
		}
	}
}
else if ($m == 'delete')
{
	if ($id)
	{
		if ($obj->delete($id))
		{
			ajax_exit('success');
		}
		else
		{
			ajax_exit('error');
		}
	}
}
else if ($m == 'new')
{
	if ($_POST)
	{
		if ( $obj->add( $_POST ) )
		{
			ajax_exit($db->insert_id());
		}
	}
	ajax_exit('error');
}
else if ($m == 'update_password') 
{
	if ($id && $value)
	{
		$password = lz_encode($value);
		set_allowed('user','update');
		if ($obj->update($id,array('password' => $password)))
		{
			ajax_exit('success');
		}
		else
		{
			ajax_exit('error');
		}
		remove_allowed('user','update');
	}
}


function ajax_exit($s)
{
	echo $s;
	die;
}
?>