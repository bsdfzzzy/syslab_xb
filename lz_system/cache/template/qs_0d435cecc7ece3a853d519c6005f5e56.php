<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title>权限设置 -  后台</title>
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
</head>
<body>
<div class='main'>

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

<div id='content'>
	<div id='left'>
    	<div style="margin:10px;margin-top:30px;">
        	<ul>
				<li>
					<a href="admin.php?p=rights"> 角色</a>
				</li>
				<?php if (check_show('add')):?>
				<li>
					<a href="javascript:new_rights()"> 新建角色</a>
				</li>
				<?php endif;?>
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
		
			<div id="new_rights" style="display:<?php if ($_obj['thisrights']){ ?><?php } else { ?>none<?php } ?>;margin:20px;background-color:#FFFF99;width:400px;">
            	<h2> 新建角色</h2>
        		<form action="admin.php?m=new_group&p=rights" method="post">
	<table cellpadding="0" cellspacing="5" border="0" style="width:400px;">
    	<tr>
        	<td> 角色名</td>
        	<td><input type="text" class="inputtext" maxlength=200 name="name" />*</td>
       	</tr>
        <tr>
        	<td>&nbsp;</td>
        	<td align="center">
            <input type="submit" value=" 提交" />
            &nbsp;
            <input type="button" onclick="cancel_new_rights(); return false;" value=" 取消" />
            </td>
        </tr>
     </table>
     
        
   </form>

            </div>
			<?php if ($_obj['this_group']){ ?>
				
 角色:<?php echo $_obj['this_group']['name']; ?><br />
<a href="javascript:checkall()">全选</a>&nbsp;<a href="javascript:inverse()">反选</a>
<form action="admin.php?p=rights&m=config&rights_id=<?php echo $_obj['this_group']['rights_id']; ?>" method="post">
<table style="margin:10px;width:500px;" class="list_table" cellspacing="0">
<?php $this_rights=$_obj['this_rights'];?>
<?php if (!empty($_obj['rights'])){if (!is_array($_obj['rights']))$_obj['rights']=array(array('rights'=>$_obj['rights'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['rights'] as $rowcnt=>$rights) { $rights['ROWCNT']=($rowcounter); $rights['ALTROW']=$rowcounter%2; $rights['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$rights; ?>
<tr>
	<td width="150"><?php echo lang('rights_'.$_obj['name']);?></td>
	<td>
	<?php foreach($_obj['rights'] as $rgiht)
	{
		$_obj['this_name'] = $_obj['name'].'_'.$rgiht;
		?>
	<input 
		type="checkbox" 
		right="action"
		name="<?php echo $_obj['this_name']; ?>" 
		id="<?php echo $_obj['this_name']; ?>" 
		<?php if ($this_rights[$_obj['this_name']]) {?>
		checked="checked"
		<?php }?>
	><label for="<?php echo $_obj['this_name']; ?>"><?php echo trim(lang('rights_'.$rgiht));?></label>
	<?php }?>
	</td>
</tr>
<?php } $_obj=$_stack[--$_stack_cnt];} ?>
</table>
	<input type="checkbox" name="limit_category_id" onclick="change_slide(this)" id="limit_category_id"><label for="limit_category_id">只授权部分分类(否则上面对新闻的权限设置就适用于所有分类)</label>

	<br />
	<div id="categories" style="display:none;margin:0 10px;">
		<a href="javascript:;" onclick="$('[right=category]').attr('checked','checked');">全选</a> 
		<a href="javascript:;" onclick="$('[right=category]').each(function(){ this.checked=!this.checked; });">反选</a>
		<br />
		<?php if (!empty($_obj['categories'])){if (!is_array($_obj['categories']))$_obj['categories']=array(array('categories'=>$_obj['categories'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['categories'] as $rowcnt=>$categories) { $categories['ROWCNT']=($rowcounter); $categories['ALTROW']=$rowcounter%2; $categories['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$categories; ?>
		<?php
echo print_space($_obj['depth']);
?>
		<input type="checkbox" right="category" name="category_<?php echo $_obj['category_id']; ?>" id="category_<?php echo $_obj['category_id']; ?>" <?php
		if ($this_rights['category_'.$_obj['category_id']])
		{
			echo 'checked="checked" ';
			$some_checked = true;
		}
		?> />
		<label for="category_<?php echo $_obj['category_id']; ?>"><?php echo $_obj['name']; ?></label><br />
		<?php } $_obj=$_stack[--$_stack_cnt];} ?>
	</div>
	<input type="submit" value=" 提交" />
</form>

<script>
$(function()
{
	<?php if ($some_checked) { ?>
	$('#limit_category_id').trigger('click');
	<?php }?>
});
function change_slide(o)
{
	if (o.checked)
	{
		$('#categories').slideDown();
	}
	else
	{
		$('#categories').slideUp();
		$('[right=category]').attr('checked','');
	}
}
function checkall()
{
	$('[right=action]').attr('checked','checked');
}
function inverse()
{
	$('[right=action]').each(function()
	{
		this.checked = !this.checked;
	});
}
</script>
			<?php } else { ?>
			<table cellpadding="0" cellspacing="0" border="0" class="list_table" style="width:750px;">
				<tr>
	        		<th style="width:7%"> 排序</th>
	        		<th style="width:25%"> 角色</th>
	                <th style="width:45%"> 描述</th>
	                <th style="width:23%"> 操作</th>
	            </tr>
				<?php if (!empty($_obj['groups'])){if (!is_array($_obj['groups']))$_obj['groups']=array(array('groups'=>$_obj['groups'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['groups'] as $rowcnt=>$groups) { $groups['ROWCNT']=($rowcounter); $groups['ALTROW']=$rowcounter%2; $groups['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$groups; ?>
				<tr>
					<td valign="top">
						<div admin_type="text"
	                	admin_para="m=update&table=rights&column=order_id&id=<?php echo $_obj['rights_id']; ?>"  
	                    admin_trigger="click" style="text-align:center"><?php echo $_obj['order_id']; ?></div>
					</td>
					<td valign="top">
						<div  rightsname="name"  admin_type="text"
	            		admin_para="m=update&table=rights&column=name&id=<?php echo $_obj['rights_id']; ?>"  
	                	admin_trigger="click"><?php echo $_obj['name']; ?></div>
					</td>
					<td valign="top">
						<div admin_type="text"
		            	admin_para="m=update&table=rights&column=description&id=<?php echo $_obj['rights_id']; ?>"  
		                admin_trigger="click" ><?php echo $_obj['description']; ?></div>
					</td>
					<td valign="top">
						<?php if (check_show('update')):?>
						<a href="admin.php?p=rights&rights_id=<?php echo $_obj['rights_id']; ?>"> 设置权限</a>
						<?php endif;?> 
						<?php if (check_show('delete')):?>
						<a href="javascript:;" onclick="if (confirm(' 确认要删除？')) delete_rights(<?php echo $_obj['rights_id']; ?>,this)"> 删除</a> 
						<?php endif;?>
					</td>
				</tr>
				<?php } $_obj=$_stack[--$_stack_cnt];} ?>
			</table>
			<?php } ?>
			<br />
			<br />
        </div>
        
    </div>
</div>

<script>



function new_rights()
{
	$('#new_rights').fadeTo(10,0).slideDown(200).fadeTo('fast',1);
}
function cancel_new_rights()
{
	$('#new_rights').fadeTo('fast',0).slideUp(200);
}
function delete_rights(id,o)
{
	$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
	$.post('admin.php?p=ajax&m=delete&table=rights&id='+id,{ },delete_callback);
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