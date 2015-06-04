<?php
LZ_MODULE != 'admin' && die('Access Denied');
$action = $_GET['action'];
$m = $_GET['m'];
$_authorized = false;
$exam_id = intval($_GET['exam_id']);
if (!$exam_id) $exam_id = intval($_POST['exam_id']);
$question_id = intval($_GET['question_id']);

include_once('model/exam.php');
$exam = new LZ_Exam;
include_once('model/question.php');
$question = new LZ_Question;

if (!$exam_id && $question_id)
{
	$this_question = $question->get_one($question_id);
	$exam_id = $this_question['exam_id'];
}

if (!$exam_id) lz_exit("参数错误！","javascript:history.go(-1);",3);


$this_exam = $exam->get_one($exam_id);

//添加文章
if ($m == 'new_question')
{
	$data = filter_array($_POST,'name!,answer!,intval:exam_id!');
	if ($data)
	{
		//构建答案数组
		$data['mark'] = 0;
		$ans = 'array(';
		$data['answer'] = str_replace("\r","\n",$data['answer']);
		preg_match_all('/([A-Za-z]\.[^\n]*?)(\,([0-9]{1,2}))?\n/',$data['answer']."\n",$_ms);
		for($_i=0;$_i<count($_ms[0]);$_i++)
		{
			$ans.= " array('name'=>'".addslashes($_ms[1][$_i])."','mark'=>'".$_ms[3][$_i]."'),";
			$data['mark'] += floatval($_ms[3][$_i]);
		}
		$ans.= ');';
		$data['answer'] = $ans;
		if ( $question->add( $data ) )
		{
			lz_exit("添加题目成功",'admin.php?p=question&exam_id='.$data['exam_id'],0.1);
		}
		else
		{
			$action = 'new_question';
			$err_msg = "添加题目失败";
		}
	}
	else
	{
		$action = 'new_question';
		$err_msg = "请填写所有带*的项目";
	}
}
else if ($m == 'edit_question')
{
	$data = filter_array($_POST,'name!,answer!,intval:exam_id!');
	if ($data)
	{
		//构建答案数组
		$data['mark'] = 0;
		$ans = 'array(';
		$data['answer'] = str_replace("\r","\n",$data['answer']);
		preg_match_all('/([A-Za-z]\.[^\n]*?)(\,([0-9]{1,2}))?\n/',$data['answer']."\n",$_ms);
		for($_i=0;$_i<count($_ms[0]);$_i++)
		{
			$ans.= " array('name'=>'".addslashes($_ms[1][$_i])."','mark'=>'".$_ms[3][$_i]."'),";
			$data['mark'] += floatval($_ms[3][$_i]);
		}
		$ans.= ');';
		$data['answer'] = $ans;
		if ( $question->update( $question_id, $data) )
		{
			lz_exit("编辑题目成功",'admin.php?p=question&exam_id='.$data['exam_id'],0.1);
		}
		else
		{
			$action = 'edit_question';
			$err_msg = "编辑问题失败";
		}
	}
	else
	{
		$action = 'edit_question';
		$err_msg = "请填写所有带*的项目";
	}
}
else if ($m == 'import_check')
{
	$content = $_POST['content'];
	$_SESSION['import_content'] = $content;
	$content = str_replace("\r","\n",$content);
	$content = str_replace("\n\n","\n",$content);
	preg_match_all('/[0-9]{1,3}\.[^\n]*\n*([A-G]\.[^\n]*\n*)*/i',$content,$ms);
	$arr = $ms[0];
	$qs = array();
	$index = 0;
	$total_mark = 0;
	foreach($arr as $q)
	{
		$_arr = array();
		$_mark = 0;
		preg_match('/[0-9]{1,3}\.([^\n]*)\n*(([A-G]\.[^\n]*\n*)*)/i',$q,$ms);
		$_arr['name'] = $ms[1];
		if ($ms[2])
		{
			$__arr = array();
			preg_match_all('/([A-Za-z]\.[^\n]*?)(\,([0-9]{1,2}))?\n/',$ms[2]."\n",$_ms);
			for($_i=0;$_i<count($_ms[0]);$_i++)
			{
				$__arr[] = array('name'=>$_ms[1][$_i], 'mark'=> $_ms[3][$_i],'index'=>$_i);
				$_mark+= floatval($_ms[3][$_i]);
				$total_mark+=floatval($_ms[3][$_i]);
			}
			$_arr['answer'] = $__arr;
			$_arr['mark'] = $_mark;
			$_arr['index'] = $index;
		}
		$qs[] = $_arr;
		$index++;
	}
	$view_data['qs'] = $qs;
	$action = "import";
}
else if ($m == 'import')
{
	$data = filter_array($_POST,'qs!,intval:exam_id!');
	if ($data)
	{
		$total = 0;
		foreach($data['qs'] as $q)
		{
			$ans = 'array(';
			foreach($q['answer'] as $a)
			{
				$ans.= " array('name'=>'".addslashes($a[name])."','mark'=>'$a[mark]'),";
			}
			$ans.= ');';
			$data = array(
				'name'=>$q['name'],
				'mark'=>$q['mark'],
				'answer'=>$ans,
				'exam_id'=>$data['exam_id'],
			);
			if ($question->add($data))
			{
				$total++;
			}
		}
		$_SESSION['import_content'] = null;
		lz_exit("成功添加了 $total 道题目！","admin.php?p=question&exam_id=".$data['exam_id'],2);
	}
	else
	{
		lz_exit("参数错误","javascript:history.go(-1)",1);
	}
}

//添加项目
if ($action == 'new_question')
{
	$temp = template('question_new.html');
	$temp->assign( array(
		'question' => $_POST,
		'answer' =>$_POST['answer'],
		'exam_id' => $exam_id,
		'login_user' => $_SESSION['login_user'],
	));
	$view_data['page_description'] = "往 \"".$this_exam['name']."\" 添加题目";
	$view_data['page_content'] = $temp->result();
}
//批量添加
else if ($action == 'import')
{
	$temp = template('question_import.html');
	$temp->assign( array(
		'content' => $_SESSION['import_content'],
		'exam_id' => $exam_id,
		'login_user' => $_SESSION['login_user'],
		'total_mark'=>$total_mark,
		'qs'=>$qs,
	));
	$view_data['page_description'] = "往 \"".$this_exam['name']."\" 添加题目";
	$view_data['page_content'] = $temp->result();
}
//编辑项目
else if ($action == 'edit_question')
{
	$temp = template('question_new.html');
	$_question = (count($_POST)>0)?$_POST:$question->get_one($question_id);
	eval('$answer='.$_question['answer']);
	$temp->assign( array(
		'question' => $_question,
		'answer'=>$answer,
		'question_id' => $question_id,
		'exam_id' => $exam_id,
		'login_user' => $_SESSION['login_user'],
	));
	$view_data['page_description'] = "编辑题目";
	$view_data['page_content'] = $temp->result();
}
//显示分类和项目列表
else
{
	$questions = $question->get_list(array('exam_id'=>$exam_id));
	$view_data['questions'] = $questions;
	$view_data['page_description'] = '"'.$this_exam['name'].'" 的题目列表';
}

$view_data['real_content'] = "exam_new.html";
$view_data['err_msg'] = $err_msg;
$view_data['success_msg'] = $success_msg;
$view_data['exam_id'] = $exam_id;
?>