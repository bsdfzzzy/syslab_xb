<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title> 管理分类 -  后台</title>
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

<div id='content' style="margin:0px;padding:0px;">
	<div id='left' onselectstart="return false;">
        	<div style="margin:4px;margin-top:10px;">
	        	<h2>管理分类</h2>
				<div id="category_tree">
					<ul>
						<li><a href="admin.php?p=category" <?php if ($_obj['category_id'] == "0"){ ?>class="tree_on" <?php } ?> > 根分类</a></li>
						<li><?php echo $_obj['all_category']; ?></li>
					</ul>
				</div>
	        </div>
    </div>
    <div id='maindiv'>
    	<div class="description">
			<?php echo $_obj['page_description']; ?>
        </div>
		<div class="position">
			当前位置:<a href="admin.php?p=category"> 根分类</a> > 
			<?php if (!empty($_obj['position'])){if (!is_array($_obj['position']))$_obj['position']=array(array('position'=>$_obj['position'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['position'] as $rowcnt=>$position) { $position['ROWCNT']=($rowcounter); $position['ALTROW']=$rowcounter%2; $position['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$position; ?>
			 <a href="admin.php?p=category&category_id=<?php echo $_obj['category_id']; ?>"><?php echo $_obj['name']; ?></a> > 
			<?php } $_obj=$_stack[--$_stack_cnt];} ?>
		</div>
		
		<div class="nav_wrapper">
			&nbsp;可用操作:
			<?php if (check_show('add')):?>
				<?php if ($_obj['this_category']['status'] == "2"){ ?>
				<a class="nav" href="javascript:new_category()" id='new_category_a'>
					添加子页面
				</a>
				<a class="nav" href="admin.php?p=item&action=edit_item&category_id=<?php echo $_obj['category_id']; ?>&page_type=category" >
					 编辑"<?php echo $_obj['this_category']['name']; ?>"
				</a>
				<a class="nav" target="_blank" href="index.php?p=category&category_id=<?php echo $_obj['category_id']; ?>" >
					预览"<?php echo $_obj['this_category']['name']; ?>"
				</a>
				<?php } else { ?>
				<a class="nav" href="javascript:new_category()" id='new_category_a'>
					添加子分类
				</a>
				<?php } ?>
			<?php endif;?>
			<!-- a class="nav" href="javascript:open_search()">搜索新闻</a -->
			
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
        	
        	<div id="new_category" style="display:<?php if ($_obj['category']){ ?><?php } else { ?>none<?php } ?>;margin:20px;background-color:#FFFF99;width:400px;">
            	<h2> 新建分类</h2>
        				<form action="admin.php?m=new_category&p=category&category_id=<?php echo $_obj['category_id']; ?>" method="post">
        	<table cellpadding="0" cellspacing="5" border="0" style="width:400px;">
            	<tr>
                	<td> 分类名称</td>
                	<td><input type="text" class="inputtext" maxlength=200 name="name" value="<?php echo $_obj['category']['name']; ?>" />*</td>
               	</tr>

                <tr>
                    <td>类型(1:列表；2:单页)</td>
                    <td><input type="text" class="inputtext" maxlength=200 name="status" value="<?php echo $_obj['category']['status']; ?>" />*</td>
                </tr>

                <tr>
                    <td>刊出日期(选填):</td>
                    <td><input type="text" class="inputtext" maxlength=200 name="publish_time" value="<?php echo $_obj['category']['publish_time']; ?>" />*</td>
                </tr>
            	
                <tr>
                	<td>&nbsp;</td>
                	<td align="center">
                    <input type="submit" value=" 提交" />
                    &nbsp;
                    <input type="button" onclick="cancel_new_category(); return false;" value=" 取消" />
                    </td>
                </tr>
             </table>
             
                
           </form>

            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="align_center list_table" id="category_table" style="width:auto">
            	<thead>
                   	<tr>
                		<th style="width:50px;"> 优先级</th>
                		<th style="width:120px;"> 分类名称</th>
                   		<th style="width:200px;"> 分类描述</th>
                   		<th style="width:70px;">状态</th>
                        <th style="width:150px;"> 操作</th>
                    </tr>
                </thead>
                <tbody>
                
          		  	<?php if (!empty($_obj['categories'])){if (!is_array($_obj['categories']))$_obj['categories']=array(array('categories'=>$_obj['categories'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['categories'] as $rowcnt=>$categories) { $categories['ROWCNT']=($rowcounter); $categories['ALTROW']=$rowcounter%2; $categories['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$categories; ?>
            		<tr>
               		 	<td><div admin_type="text"
                        	admin_para="m=update&table=category&column=order_id&id=<?php echo $_obj['category_id']; ?>" 
							style="text-align:center"><?php echo $_obj['order_id']; ?></div></td>
               		 	<td><div admin_type="text"
                        	admin_para="m=update&table=category&column=name&id=<?php echo $_obj['category_id']; ?>"><?php echo $_obj['name']; ?></div></td>
               		    <td><div admin_type="textarea" 
                        	admin_para="m=update&table=category&column=description&id=<?php echo $_obj['category_id']; ?>"><?php echo $_obj['description']; ?></div>
                        </td>
						<td>
							<div admin_type="text"
			              	admin_para="m=update&table=category&column=status&id=<?php echo $_obj['category_id']; ?>" 
			                    admin_select_value="<?php echo $_obj['status']; ?>"
			                    admin_select_source_id="status_select"
			                    admin_trigger="click" status_category_id="<?php echo $_obj['category_id']; ?>"
								><?php
echo show_status($_obj['status']);
?></div>
						</td>

                        <td>
							<a href="admin.php?p=category&category_id=<?php echo $_obj['category_id']; ?>">子分类</a> 
                          	<?php if (check_show('delete')):?>
							<a href="javascript:;" onclick="if (confirm(' 确定要执行删除操作吗?')) delete_category(<?php echo $_obj['category_id']; ?>,this);"> 删除</a> 
							<?php endif;
							if (check_show('update')):?>
                          	<a href="javascript:edit_page(<?php echo $_obj['category_id']; ?>);"> 编辑</a> 
							<?php endif;?>
							<a href="index.php?p=category&category_id=<?php echo $_obj['category_id']; ?>" target="_blank">预览</a>
                        </td>
               		</tr>
                    <?php } $_obj=$_stack[--$_stack_cnt];} ?>
                    
                </tbody>
                
</table>

<script>
function edit_page(id)
{
	var o = $('[status_category_id='+id+']');
	if (o.attr('admin_select_value') == '2')
	{
		window.location.href = "admin.php?p=item&action=edit_item&category_id="+id+"&page_type=category";
	}
	else
	{
		alert("只能编辑状态为'单网页'的分类!");
	}
}
</script>

<div style="display:none">
<select id="status_select">
	<?php if (!empty($_obj['statuses'])){if (!is_array($_obj['statuses']))$_obj['statuses']=array(array('statuses'=>$_obj['statuses'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['statuses'] as $rowcnt=>$statuses) { $statuses['ROWCNT']=($rowcounter); $statuses['ALTROW']=$rowcounter%2; $statuses['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$statuses; ?>
	<option value="<?php echo $_obj['index']; ?>"><?php echo $_obj['value']; ?></option>
	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
</select>
</div>
			<br />
        </div>
    
    </div>
	<div style="clear:both;"></div>
</div>
<script>
$(function()
{
	var root = $('#category_tree').children('ul');
	root.find('li').each(function()
	{
		var li = $(this);
		if (li.children('a').length > 0)
		{
			if (li.next('li').children('ul').children('li').length > 0 )
			{
				$('<img src="lz_system/view/admin/images/plus.png" border="0" class="expand_button" />')
				.click(function()
				{
					var exp_bt = this;
					li.next('li').slideToggle(300,function()
					{
						$(exp_bt).attr('src',$(this).is(':visible')?'lz_system/view/admin/images/minus.png':'lz_system/view/admin/images/plus.png');
					});
					
				}).prependTo(li);
			}
			else
			{
				$('<span class="expand_button"></span>').prependTo(li);
			}
		}
		else if (li.children('ul').length > 0)
		{
			li.hide();
		}
	});
	root.parent().show();
	var tree_on = root.find('a.tree_on');
	tree_on.parent('li').find('.expand_button').attr('src','lz_system/view/admin/images/minus.png');
	if (tree_on.length > 0)
	{
		var li = tree_on.parents('li').show();
		li.next('li').show();
		while(li.parents('li').length > 0)
		{
			li = li.parents('li');
			li.show();
			li.prev('li').find('.expand_button').attr('src','lz_system/view/admin/images/minus.png');
		}
	}
});
function delete_category(id,o)
{
	$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
	$.post('admin.php?p=ajax&m=delete&table=category&id='+id,{ },delete_callback);
}
function delete_callback(s)
{
	if (s != 'success')
	{
		alert('DELETE_ERROR');
		return false;
	}
	$('[to_be_delete=yes]').parent().parent().fadeOut();
}
function new_category()
{
	$("#new_category_a").addClass('nav_on');
	$('#new_category').fadeTo(10,0).slideDown(200).fadeTo('fast',1);
}
function cancel_new_category()
{
	$("#new_category_a").removeClass('nav_on');
	$('#new_category').fadeTo('fast',0).slideUp(200);
}
function change_category(o)
{
	if ($(o).val())
	{
		window.location = "admin.php?p=category&category_id="+ $(o).val();
	}
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