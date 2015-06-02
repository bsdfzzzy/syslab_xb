<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="js/jquery/jquery.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title>留言本 -  后台</title>
<base href="<?php echo $_obj['url_base']; ?>" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $_obj['css']; ?>/admin.css" type="text/css" media="all" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $_obj['css']; ?>/style.css" type="text/css" media="all" />
<script language="JavaScript" src="public/js/jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="public/js/common.js" type="text/javascript"></script>
<script type="text/javascript" src="public/js/jquery.leanModal.min.js"></script>

<script>
can_not_update = false;
can_not_delete = false;
can_not_add = false;
</script>
<style type="text/css">
#live{
	width:500px;
	height:500px;
	background:#fff;
	margin:0 auto;
	border-radius:6px;
	display:none;
}
#lean_overlay {
    position: fixed;
    z-index:1000;
    top: 0px;
    left: 0px;
    height:100%;
    width:100%;
    background: #000;
    display: none;
}
#mask{
	width:500px;
	height:400px;
    display: none;
}
#live a{
	margin-left:480px;
	color:#000;
    font-size: 20px;
}
    .aname{
        position: relative;
        left: 0px;
    }
    </style>
<style>
.gb_item { margin:10px;  border-bottom:1px solid #ddd;}
.gb_content_wrap { margin:5px; background-color:rgb(231, 242, 253); padding:5px; border:1px solid transparent;}
.gb_content { }
.gb_reply {  border:1px solid #33aaff;  background-color:lightblue;}
</style>
</head>
<body>
<div class='maindiv'>

<div class="headerdiv">
	<div class='logo'>
</div>

	<div class='navi'>
		<ul>
			<li><a href='./admin.php'> 后台首页</a></li>
            
            <?php if ($_SESSION['login_user']['allowed_controllers']['item']) {?>
            <li><a href='admin.php?p=item'> 内容管理</a></li> 
			
            <?php }
        	if ($_SESSION['login_user']['allowed_controllers']['category']) {?>
            <li><a href='admin.php?p=category'> 分类/页面</a></li>
			
            
            <?php }
 			if ($_SESSION['login_user']['allowed_controllers']['user']) {?>
            <li><a href='admin.php?p=user'> 用户</a></li>
			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['rights']) {?>
            <li><a href='admin.php?p=rights'>权限</a></li>
			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['config']) {?>
            <li><a href='admin.php?p=config'> 系统设置</a></li>
			
             <?php }
			if ($_SESSION['login_user']['allowed_controllers']['guestbook']) {?>
            <li><a href='admin.php?p=guestbook'>留言本</a></li>
			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['account']) {?>
            <li><a href='admin.php?p=account'> 帐号</a></li>
			
            <?php }?>
            <li><a href='./' target="_blank"> 网站首页</a></li>
            <li><a href='index.php?p=login&m=logout&module=admin'> 注销登陆</a></li>
            
		</ul>
	</div>
	<script>
	<?php if (!check_show('update')):?>
	can_not_update = true;
	<?php endif;?>
	</script>
           
</div>

<div id='content' style="margin:0px;padding:0px;">
	<div id='left'>
    	<div style="margin:10px;margin-top:30px;">
        	<ul>
 
            </ul>
    		
        </div>
    </div>
    <div id='maindiv'>
    	<div class="description">
			<?php echo $_obj['page_description']; ?>
        </div>

        <?php if ($_obj['err_msg']){ ?>
        <div class="err_msg pad">
        	<?php echo $_obj['err_msg']; ?>
        </div>
        <?php } ?>
        
        <?php if ($_obj['success_msg']){ ?>
        <div class="success_msg pad">
        	<?php echo $_obj['success_msg']; ?>
        </div>
        <?php } ?>
        
        <div class="real_content">
        	
        	
            <div class="pager">
	<?php echo $_obj['pager']; ?>
</div>
<?php if (!empty($_obj['items'])){if (!is_array($_obj['items']))$_obj['items']=array(array('items'=>$_obj['items'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['items'] as $rowcnt=>$items) { $items['ROWCNT']=($rowcounter); $items['ALTROW']=$rowcounter%2; $items['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$items; ?>
<div class="gb_item">
	<div class="gb_name"><?php
echo format_date($_obj['time']);
?>&nbsp;&nbsp;<b><?php echo $_obj['name']; ?></b>&nbsp;&nbsp;<?php echo $_obj['email']; ?>&nbsp;&nbsp;
	<?php if (check_show('delete')):?>
	<a href="javascript:;" onclick="delete_guestbook(<?php echo $_obj['guestbook_id']; ?>,this)"> 删除</a>	&nbsp;&nbsp;
	<?php endif;?>	
	<?php if (check_show('update')):?>
	<?php if ($_obj['status'] == "0"){ ?><a id="agree_<?php echo $_obj['guestbook_id']; ?>" href="javascript:;" onclick="agree_guestbook(<?php echo $_obj['guestbook_id']; ?>,this)" style="color:red">审核通过</a>	&nbsp;&nbsp;	<?php } ?>
	<?php endif;?>
	
	</div>
	<div class="gb_content_wrap">
		<div><div class="gb_content" admin_type="textarea"
	            	admin_para="m=update&table=guestbook&column=content&id=<?php echo $_obj['guestbook_id']; ?>" 
	                admin_button="no" 
	                admin_trigger="click"><?php echo $_obj['content']; ?>
		</div></div>
		<div>
		<div class="gb_reply" admin_type="textarea"
	    	admin_para="m=update&table=guestbook&column=reply_content&id=<?php echo $_obj['guestbook_id']; ?>" 
	       	admin_button="no" 
	        admin_trigger="click" ><?php echo $_obj['reply_content']; ?>
		</div>
		</div>
	</div>
</div>
<?php } $_obj=$_stack[--$_stack_cnt];} ?>
<div class="pager">
	<?php echo $_obj['pager']; ?>
</div> 
        </div>
        
    </div>
</div>

<script>
function delete_guestbook(id,o)
{
	if (confirm('真的要删除这条留言吗？'))
	{
		$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
		$.post('admin.php?p=ajax&m=delete&table=guestbook&id='+id,{ },delete_callback);
	}
}
function delete_callback(s)
{
	if (s == 'error')
	{
		alert('DELETE_ERROR');
		return false;
	}
	$('[to_be_delete=yes]').parent().parent().fadeOut();
}

function agree_guestbook(id,o)
{
	$(o).attr('to_be_hidden','yes').html('loading...').unbind('click');
	$.post('admin.php?p=ajax&m=update&table=guestbook&column=status&id='+id,{ value:'1' },function()
	{
		$('[to_be_hidden=yes]').fadeOut();
	});
}

</script>
<div class="footer">
Copyright @ <a href="http://longbill.cn" target="_blank">Longbill</a> (<?php echo $_obj['time_used']; ?>s) (<?php echo $_obj['total_query']; ?>)
</div>
<script>
if (!can_not_update) load_admin();
</script>
<script type="text/javascript">
    UE.getEditor('dor');
</script>

</div>
</body>
</html>