<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title> 管理用户 -  后台</title>
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

<div id='contentdiv'>
	<div id='left'>
    	<div style="margin:10px;margin-top:30px;">
			<?php if(check_show('add')):?>
        	<ul>
                <li><a href="javascript:new_user();"> 新建用户</a></li>
            </ul>
    		<?php endif;?>
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
        	<div id="new_user" style="display:<?php if ($_obj['user']){ ?><?php } else { ?>none<?php } ?>;margin:20px;background-color:#FFFF99;width:400px;">
            	<h2> 新建用户</h2>
        		        <form action="admin.php?m=new_user&p=user" method="post"  onsubmit="return check_form();" >
        	<table>

            	<tr>
                	<td> 用户名</td>
                	<td><input type="text" class="inputtext" maxlength=200 name="name" id='name' value="<?php echo $_obj['user']['name']; ?>" />*</td>
               	</tr>
                
                <tr>
                	<td valign="top"> 密码</td>
                    <td><input type="password" class="inputtext" maxlength=200 name="password" id='password' /><?php if ($_obj['is_edit_user']){ ?> 如果不修改请不要填写此项<?php } else { ?>*<?php } ?></td>
                </tr>
          
                <tr>
                	<td valign="top"> 确认</td>
                    <td><input type="password" class="inputtext" maxlength=200 name="password2" id='password2' /><?php if ($_obj['is_edit_user']){ ?> 如果不修改请不要填写此项<?php } else { ?>*<?php } ?></td>
                </tr>
            	<tr>
                	<td> E-mail</td>
                	<td><input type="text" class="inputtext" maxlength=200 name="email" value="<?php echo $_obj['user']['email']; ?>" /></td>
               	</tr>  
            	<tr>
                	<td> 状态</td>
                	<td><input type="text" class="inputtext" maxlength=200 name="status" value="<?php echo $_obj['user']['status']; ?>" /></td>
               	</tr>                  
                <tr>
                	<td colspan="2" align="center">
                    	<input type="submit" value=" 提交" />&nbsp;
                    	<input type="button" value=" 取消" onclick="cancel_new_user(); return false;" />
                    </td>
                </tr>
             </table>
             
                
           </form>

<script>
function check_form()
{
	<?php if (!$_obj['is_edit_user']){ ?>
	if (!$_('password').value || !$_('name').value)
	{
		alert(' 请填写带*的项!');
		return false;
	}
	<?php } ?>
	if ($_('password').value != $_('password2').value)
	{
		alert(' 密码不一致！');
		return false;
	}
}
</script>
            </div>
            
<table cellpadding="0" cellspacing="1" border="0" class="align_center list_table" id="user_table">
            	<thead>
                   	<tr>
                		<th width="30%"> 用户名</th>
                        <th width="10%"> 密码</th>
                   		<th width="30%"> E-mail</th>
                        <th width="10%"> 角色</th>
                        <th width="20%"> 操作</th>
                    </tr>
                </thead>
                <tbody>
                
          		  	<?php if (!empty($_obj['users'])){if (!is_array($_obj['users']))$_obj['users']=array(array('users'=>$_obj['users'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['users'] as $rowcnt=>$users) { $users['ROWCNT']=($rowcounter); $users['ALTROW']=$rowcounter%2; $users['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$users; ?>
            		<tr>
               		 	<td><?php echo $_obj['name']; ?></td>
                        <td><div onclick="change_password(event,'<?php echo $_obj['name']; ?>',<?php echo $_obj['user_id']; ?>)" class="change_password" style="cursor:pointer;text-align:center"> 修改</div></td>
               		    <td><div admin_type="text"
                        	admin_para="m=update&table=user&column=email&id=<?php echo $_obj['user_id']; ?>" 
                            admin_button="no" 
                            admin_trigger="click"><?php echo $_obj['email']; ?></div>
                        </td>
                        
                        <td>
							<div admin_type="text"
			              	admin_para="m=update&table=user&column=rights_id&id=<?php echo $_obj['user_id']; ?>" 
			                    admin_select_value="<?php echo $_obj['rights_id']; ?>"
			                    admin_select_source_id="rights_select"
			                    admin_trigger="click"
								><?php echo $_obj['rights_group_name']; ?></div>
						</td>
                        <td>
							<?php if(check_show('delete')):?>
                        	<a href="javascript:;" onclick="if (confirm(' 你确认要删除此用户?')) delete_user(<?php echo $_obj['user_id']; ?>,this);"> 删除</a>
							<?php endif;?>
                        </td>
               		</tr>
                    <?php } $_obj=$_stack[--$_stack_cnt];} ?>
                    
                </tbody>
                
</table>
<div style="display:none">
<select id="rights_select">
	<option value="0">未知</option>
	<?php if (!empty($_obj['rights'])){if (!is_array($_obj['rights']))$_obj['rights']=array(array('rights'=>$_obj['rights'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['rights'] as $rowcnt=>$rights) { $rights['ROWCNT']=($rowcounter); $rights['ALTROW']=$rowcounter%2; $rights['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$rights; ?>
	<option value="<?php echo $_obj['rights_id']; ?>"><?php echo $_obj['name']; ?></option>
	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
</select>
</div>
			<br />
        </div>
        
    </div>
</div>

<div id="change_password" style="display:none;position:absolute;background-color:#FFFF99;width:200px;">
        	 <table>
             	<tr>
                	<td valign="top"> 用户名</td>
                    <td><input type="text" class="inputtext" style="width:100px;" id='change_password_user' disabled="disabled" /></td>
                </tr>
                <tr>
                	<td valign="top"> 密码</td>
                    <td><input type="password" class="inputtext" password="1"  style="width:100px;" /></td>
                </tr>
          
                <tr>
                	<td valign="top"> 确认</td>
                    <td><input type="password" class="inputtext" password="2"  style="width:100px;" /></td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    	<input type="button" value=" 提交" onclick="do_change_password(); return false;" />
                        <input type="button" value=" 取消" onclick="$('#change_password').slideUp(200); return false;" />
                    </td>
                </tr>
             </table>
</div>


<script>
<?php if(check_show('update')):?>
$('.change_password').bind('mouseover',function()
{
	$(this).addClass('text_mouseover'); 
}); 

$('.change_password').bind('mouseout',function(){ $(this).removeClass('text_mouseover'); });
<?php endif;?>
function change_password(event,name,id)
{
	$('#change_password_user').val(name);
	$('[password]').val('').attr('user_id',id);
	$('#change_password')
		.css( { left:event.clientX+$(document).scrollLeft(),top:event.clientY+$(document).scrollTop() } )
		.slideDown(200);
}

function do_change_password()
{
	if ($('[password=1]').val() != $('[password=2]').val())
	{
		alert(' 密码不一致！');
		return;
	}
	else
	{
		var p = $('[password=1]');
		$.post("admin.php?p=ajax&m=update_password&table=user&id="+p.attr('user_id'),{ value:p.val()},change_password_callback);
	}
}

function change_password_callback(s)
{
	if (s == 'success')
	{
		alert(' 更新成功');
	}
	else
	{
		alert(s);
	}
	$('#change_password').slideUp(200);
}

function delete_user(id,o)
{
	$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
	$.post('admin.php?p=ajax&m=delete&table=user&id='+id,{ },delete_callback);
}

function delete_callback(s)
{
	if (s != 'success')
	{
		alert(s);
		return false;
	}
	$('[to_be_delete=yes]').parent().parent().fadeOut();
}

function new_user()
{
	$('#new_user').fadeTo(10,0).slideDown(200).fadeTo('fast',1);
}

function cancel_new_user()
{
	$('#new_user').fadeTo('fast',0).slideUp(200);
}
<?php if (!$_SESSION['login_user']['rights']['user_update']) {?>
can_not_update = true;
<?php }?>
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