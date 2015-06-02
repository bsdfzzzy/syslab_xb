<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title> 首页 -  后台</title>
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
			电子科技大学学报社科版管理后台
        </div>
        
        <div class="real_content">
        	欢迎登陆
        </div>
        
    </div>
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