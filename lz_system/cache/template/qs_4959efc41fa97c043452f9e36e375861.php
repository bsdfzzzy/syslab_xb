<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="renderer" content="webkit">
<title>TITLE -  后台</title>
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
<body style="text-align:left">
<?php if (check_show('add')){?>
<form style="border:0" action="admin.php?p=upload&m=upload" method="post" ENCTYPE="multipart/form-data" >
	<input type="file" style="width:150px;" size="10" name="upfile" /> <input type="submit" value="上传" /> <span style="color:orange" id="msg"><?php echo $_obj['msg']; ?></span>
	&nbsp;&nbsp;选择最近上传的附件:
	<select style="height:20px;width:400px;" onchange="insert_file(this)">
		<option value=''> </option>
		<?php if (!empty($_obj['recent'])){if (!is_array($_obj['recent']))$_obj['recent']=array(array('recent'=>$_obj['recent'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['recent'] as $rowcnt=>$recent) { $recent['ROWCNT']=($rowcounter); $recent['ALTROW']=$rowcounter%2; $recent['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$recent; ?>
		<option 
			value="<?php
echo myurlencode($_obj['filepath']);
?>" fname="<?php echo $_obj['name']; ?>">
			(<?php
echo format_date($_obj['mtime']);
?>) <?php echo $_obj['name']; ?>
		</option>
		<?php } $_obj=$_stack[--$_stack_cnt];} ?>
	</select>
</form>

<script>
function insert_file(o)
{
	var index = o.selectedIndex;
	if (index <= 0) return;
	var option = o.options[index];
	var url = option.value;
	var fname = $(option).attr('fname');
	var html = get_display_html(url,fname);
	var ftype = fname.split('.');
	ftype = ftype[ftype.length-1].toLowerCase();
	//if ie and want to insert flash video
	if ($.browser.msie && ftype == 'flv')
	{
		top.frames[0].frames[0].document.body.innerHTML+=html;
	}
	else
	{
		var editor = top.FCKeditorAPI.GetInstance('description');
		editor.InsertHtml(html);
	}
	o.selectedIndex = 0;
}

function get_display_html(url,fname)
{
	var ftype = fname.split('.');
	ftype = ftype[ftype.length-1].toLowerCase();
	var html = '';
	
	if (ftype == 'flv')
	{
		url=encodeURIComponent(url);
		html = '<embed src="flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file='+url+'&IsAutoPlay=0&BufferTime=3" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="opaque" type="application/x-shockwave-flash" width="350" height="300"></embed>';
	}
	else if (',jpg,jpeg,gif,png,bmp,'.indexOf(','+ftype+',') != -1)
	{
		html = '<img src="'+url+'" />';
	}
	else
	{
		html = '<br />请点击下载（右键另存为）或浏览:<a href="'+url+'" >'+fname+'</a>';
	}
	return html;
}

<?php if ($_obj['file_url']){ ?>
//如果上传成功
var html = get_display_html('<?php
echo myurlencode($_obj['file_url']);
?>','<?php echo $_obj['filename']; ?>');
var ftype = '<?php echo $_obj['filename']; ?>'.split('.');
ftype = ftype[ftype.length-1].toLowerCase();
if ($.browser.msie && ftype == 'flv')
{
	top.frames[0].frames[0].document.body.innerHTML+=html;
}
else
{
	//var editor = top.FCKeditorAPI.GetInstance('description');
	//editor.InsertHtml(html);
	var textarea = top.document.getElementsByName("description");
	textarea[0].innerHTML += html;
	var furl = top.document.getElementById("file_name");
	furl.value = "<?php
echo myurlencode($_obj['file_url']);
?>";
}
<?php } ?>
setTimeout("document.getElementById('msg').style.display='none'",3000);
</script>
<?php 
}else
{
	echo LANG_ACCESS_DENIED;
}?>
</body>
</html>