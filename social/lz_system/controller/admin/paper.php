<?php
LZ_MODULE != 'admin' && die('Access Denied');
filter_array($_GET,'m,action,intval:paper_id,status',true);

$status = isset($_GET['status'])?$_GET['status']:'0,1,2';

include_once('model/paper.php');
$paper = new LZ_paper;

if ($m == 'status')
{
	$status = intval($_GET['status']);
	$this_paper = $paper->get_one($paper_id);
	if ($paper->update($paper_id,array('status'=>$status)))
		lz_exit('Success','admin.php?p=paper');
	else
		lz_exit('error',"javascript:history.go(-1);");
}

if ($action == "view")
{
	include_once('model/paper_file.php');
	$paper_file = new LZ_Paper_File;
	$temp = template('paper_view.html');
	$temp->assign( array(
		'paper' => $paper->get_one($paper_id),
		'files'=>$paper_file->get_list(array('paper_id'=>$paper_id))
	));
	$view_data['page_description'] = "查看";
	$view_data['page_content'] = $temp->result();
}
else
{
	//分页处理
	$cond = array('status'=>$status);
	$papers = lz_page($paper,$cond,(intval($config['admin_paper_page_size']))?intval($config['admin_paper_page_size']):20);
	
	$view_data['papers'] = $papers;
	$view_data['page_description'] = lang('paper_LIST');
}
$view_data['err_msg'] = $err_msg;
$view_data['success_msg'] = $success_msg;

//nav
$statuses = array();
foreach($paper_status as $key=>$val) $statuses[] = array('index'=>$key,'value'=>$val);
$view_data['statuses'] = $statuses;
$view_data['current_status_all'] = isset($_GET['status'])?false:true;
$view_data['status'] = $view_data['current_status_all']?'-1':$status;
$has_pic && $view_data['current_status_all'] = false;
function show_status($s)
{
	global $paper_status;
	return $paper_status[$s]?$paper_status[$s]:lang('UNKNOWN');
}

?>