<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title> 内容管理 -  后台</title>
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
        	<h2>分类</h2>
			<div id="category_tree" style="display:none">
				<ul>
					<li><a href="admin.php?p=item" <?php if ($_obj['category_id'] == "0"){ ?>class="tree_on" <?php } ?> > 根分类</a></li>
					<li><?php echo $_obj['all_category']; ?></li>
				</ul>
			</div>
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
        <?php if ($_obj['page_content']){ ?>
        	<?php echo $_obj['page_content']; ?>
		<br />
        <?php } else { ?>
		<div class="position">
			当前位置:<a href="admin.php?p=category"> 根分类</a> > 
			<?php if (!empty($_obj['position'])){if (!is_array($_obj['position']))$_obj['position']=array(array('position'=>$_obj['position'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['position'] as $rowcnt=>$position) { $position['ROWCNT']=($rowcounter); $position['ALTROW']=$rowcounter%2; $position['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$position; ?>
			 <a href="admin.php?p=category&category_id=<?php echo $_obj['category_id']; ?>"><?php echo $_obj['name']; ?></a> > 
			<?php } $_obj=$_stack[--$_stack_cnt];} ?>
		</div>
			<div class="nav_wrapper">
				&nbsp;功能:
				<?php if(check_show('add')):?>
				<a class="nav" href="admin.php?p=item&action=new_item&category_id=<?php echo $_obj['category_id']; ?>"> 添加新闻</a>
				<?php endif;?>
				<?php if(check_show('add')):?>
				<a class="nav" href="admin.php?p=item&action=new_picture">发表图片新闻</a>
				<?php endif;?>
				<!-- a class="nav" href="javascript:open_search()">SEARCH_ITEM</a -->
			</div>
			
			<div class="nav_wrapper">
				&nbsp;显示:
				<a href="admin.php?p=item&category_id=<?php echo $_obj['category_id']; ?>"  class="nav <?php if ($_obj['current_status_all']){ ?>nav_on<?php } ?>">所有新闻</a>
				<?php if (!empty($_obj['statuses'])){if (!is_array($_obj['statuses']))$_obj['statuses']=array(array('statuses'=>$_obj['statuses'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['statuses'] as $rowcnt=>$statuses) { $statuses['ROWCNT']=($rowcounter); $statuses['ALTROW']=$rowcounter%2; $statuses['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$statuses; ?>
				<a href="admin.php?p=item&status=<?php echo $_obj['index']; ?>&category_id=<?php echo $_stack[$_stack_cnt-1]['category_id']; ?>" class="nav <?php if ($_obj['index'] == $_stack[$_stack_cnt-1]['status']){ ?>nav_on<?php } ?>"><?php
echo strip_tags($_obj['value']);
?></a>
				<?php } $_obj=$_stack[--$_stack_cnt];} ?>
				<a href="admin.php?p=item&category_id=<?php echo $_obj['category_id']; ?>&has_pic=1" class="nav <?php if ($_obj['has_pic']){ ?>nav_on<?php } ?>">有图片新闻</a>
			</div>
            <div >
            <table cellpadding="0" cellspacing="0" border="0" id="item_table" class="list_table" >
            	<thead>
                   	<tr>
                		<th width="50"> 优先级</th>
                		<th width=""> 新闻标题</th>
                        <th width="100">所属分类</th>
                       <th width="130"> 发布时间</th>
			<th width="50">状态</th>
                        <th width="100"> 操作</th>
                        <th>精选</th>
                        <?php
                            $category_id=$data['category_id'];
                            $status=$_GET['status'];
                            if($category_id==2&&$status==1) echo "<th>置顶</th>";
                        ?>
                    </tr>
                </thead>
                <tbody>
                
          		  	<?php if (!empty($_obj['items'])){if (!is_array($_obj['items']))$_obj['items']=array(array('items'=>$_obj['items'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['items'] as $rowcnt=>$items) { $items['ROWCNT']=($rowcounter); $items['ALTROW']=$rowcounter%2; $items['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$items; ?>
            		<tr>
               		 	<td><div admin_type="text"
                        	admin_para="m=update&table=item&column=order_id&id=<?php echo $_obj['item_id']; ?>" 
                            admin_trigger="click" style="text-align:center"><?php echo $_obj['order_id']; ?></div>
                        </td>
               		 	<td><div admin_type="text"
                        	admin_para="m=update&table=item&column=name&id=<?php echo $_obj['item_id']; ?>" 
                            admin_trigger="click"><?php echo $_obj['name']; ?></div>
                        </td>
                        <td><div admin_type="text"
                        	admin_para="m=update&table=item&column=category_id&id=<?php echo $_obj['item_id']; ?>" 
                            admin_select_value="<?php echo $_obj['category_id']; ?>"
                            admin_select_source_id="category_select"
                            admin_trigger="click"><?php echo $_obj['category_name']; ?></div>
                        </td>
               		    <td><?php
echo format_date($_obj['publish_time']);
?></td>
						<td><div admin_type="text"
		              	admin_para="m=update&table=item&column=status&id=<?php echo $_obj['item_id']; ?>" 
		                    admin_select_value="<?php echo $_obj['status']; ?>"
		                    admin_select_source_id="status_select"
		                    admin_trigger="click"
							><?php
echo show_status($_obj['status']);
?></div></td>
                        <td>
                        	<a href="admin.php?p=item&action=edit_item&item_id=<?php echo $_obj['item_id']; ?>"> 编辑</a>&nbsp;
                            <a href="javascript:;" onclick="if (confirm(' 确定要删除吗？')) delete_item(<?php echo $_obj['item_id']; ?>,this);"> 删除</a>&nbsp;
                            	<?php if ($_obj['status'] == "0"){ ?>
								<?php if (check_show('update')):?>
									<a href="index.php?p=item&item_id=<?php echo $_obj['item_id']; ?>&preview=true" >审核</a>
								<?php endif;?>
								<?php } else { ?>
									<a href="index.php?p=item&item_id=<?php echo $_obj['item_id']; ?>&preview=true" target="_blank">预览</a>			
								<?php } ?>
                        </td>
                        <td>
                            <form action="admin.php?p=recommend" method="post">
                                <input type="hidden" name="id" value="<?php echo $_obj['item_id']; ?>"/>
                                <?php
                                    $c = "";
                                    if($_obj['recommend']==1)
                                        $c = "checked='checked'";
                                    else
                                        $c = "";
                                ?>
                                <input type="checkbox" <?=$c?> name="recommend" value="1"/>
                                <input type="submit"/>
                            </form>
                        </td>
                        <td>
                            <form action="admin.php?p=recommend" method="post">
                                <input type="hidden" name="id" value="<?php echo $_obj['item_id']; ?>"/>
                                <?php
                                    $c = "";
                                    if($_obj['recommend']==1)
                                        $c = "checked='checked'";
                                    else
                                        $c = "";
                                ?>
                                <input type="checkbox" <?=$c?> name="recommend" value="1"/>
                                <input type="submit"/>
                            </form>
                        </td>
                        <!--
                        <?php
                            $category_id=$data['category_id'];
                            $status=$_GET['status'];
                            if($category_id==2&&$status==1){
                                echo "<td>123</td>"; //替换为复选框
                            }
                        ?>
                        -->
               		</tr>
                    <?php } $_obj=$_stack[--$_stack_cnt];} ?>
                    
                </tbody>
                
            </table>
</div>
            <?php echo $_obj['pager']; ?>
            
<div style="display:none">
<select id="category_select">
	<?php echo $_obj['category_tree']; ?>
</select>
</div>


<div style="display:none">
<select id="status_select">
	<?php if (!empty($_obj['statuses'])){if (!is_array($_obj['statuses']))$_obj['statuses']=array(array('statuses'=>$_obj['statuses'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['statuses'] as $rowcnt=>$statuses) { $statuses['ROWCNT']=($rowcounter); $statuses['ALTROW']=$rowcounter%2; $statuses['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$statuses; ?>
	<option value="<?php echo $_obj['index']; ?>"><?php echo $_obj['value']; ?></option>
	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
</select>
</div>
        <?php } ?>
	<br />
        </div>
        <br />
    </div>
	<div style="clear:both;"></div>
</div>

<script>
$(function()
{
	var root = $('#category_tree').children('ul');
	root.parent().show();
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


function delete_item(id,o)
{
	$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
	$.post('admin.php?p=ajax&m=delete&table=item&id='+id,{ },delete_callback);
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
function change_category(o)
{
	if ($(o).val())
	{
		window.location = "admin.php?p=item&category_id="+ $(o).val();
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