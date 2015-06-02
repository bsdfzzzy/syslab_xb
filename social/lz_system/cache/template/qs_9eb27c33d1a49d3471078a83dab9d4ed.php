<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title> 修改密码 -  后台</title>
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
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
        
        
        
       	<table>

            	<tr>
                	<td> 用户名</td>
                	<td><?php echo $_obj['user']['name']; ?></td>
               	</tr>
                
                
           </table>
           
          <form action="admin.php?m=edit&p=account" method="post" onsubmit="return false;" >
              <table>
                <tr>
                	<td valign="top"> 密码</td>
                    <td><input type="password" class="inputtext" maxlength=200 name="password" id='password' /> 如果不修改密码，请不要填写此项</td>
                </tr>
          
                <tr>
                	<td valign="top"> 重复密码</td>
                    <td><input type="password" class="inputtext" maxlength=200 name="password2" id='password2' /> 如果不修改密码，请不要填写此项</td>
                </tr>
            	<tr>
                	<td> E-mail</td>
                	<td><input type="text" class="inputtext" maxlength=200 name="email" value="<?php echo $_obj['user']['email']; ?>" /></td>
               	</tr> 
                
                <tr>
                	<td colspan="2" align="center"><input type="submit" value=" 提交" onclick="check_form(); return false;" />&nbsp;&nbsp;<span  style="background-color:#ffff99;padding:3px;display:none" id='notice_span'> 保存成功!</span></td>
                </tr>
             </table>
             
                
           </form>

			<script>
			function check_form()
			{
				
				if ($_('password').value != $_('password2').value)
				{
					alert(' 密码不一致！');
					return false;
				}
				commit_form();
				return false;
			}
			
			function commit_form()
			{
				$('[type=submit]').attr('disabled','disabled');
				$.post('admin.php?p=account&m=edit',{
					email: $('[name=email]').val(),
					password: $('[name=password]').val()
				}, submit_callback);
			}
			
			function submit_callback(s)
			{
				$('#notice_span').html(s).fadeIn('fast');
				$('[type=submit]').removeAttr('disabled');
				setTimeout("$('#notice_span').fadeOut('slow');",5000);
			}
			</script>
			<br />
        </div>
    </div>
	<div style="clear:both;"></div>
</div>


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