<?php


$m = $_GET['m'];

if ($m == 'new_comment')
{
	$data = filter_array($_POST,'name!,email,intval:item_id,content');
	if ($data)
	{
		include_once('model/comment.php');
		$comment = new LZ_Comment;
		if ($comment->add($data))
			echo 'success';
		else
			echo lang('COMMENT_ADD_ERROR');
	}
	else
	{
		echo lang('COMMENT_INPUT_ERROR');
	}
}
else if ($m == 'new_guestbook')
{
	$data = filter_array($_POST,'name!,email,content');
	if ($data)
	{
		include_once('model/guestbook.php');
		$guestbook = new LZ_Guestbook;
		if ($guestbook->add($data))
			echo 'success';
		else
			echo lang('GUESTBOOK_ADD_ERROR');
	}
	else
	{
		echo lang('GUESTBOOK_INPUT_ERROR');
	}
}
die;
?>