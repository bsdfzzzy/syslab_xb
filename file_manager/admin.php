<?php
/*
*#########################################
* PHPCMS File Manager
* Copyright (c) 2004-2006 phpcms.cn
* Author: Longbill ( http://www.longbill.cn )
* longbill.cn@gmail.com
*#########################################
*/

header("content-type:text/html; charset=gb2312");

include_once("common.php");
$user = check_login();
if (!$user) exit("<script>window.location='login.php';</script>");
if (!$user["admin"]) exit("Ã»ÓÐÈ¨ÏÞ");
$action = $_GET["action"];
?>

<html>
<head>
 <title>¿ØÖÆÃæ°å--<?php echo $title;?></title>
 <meta http-equiv='Pragma' content='no-cache' />
 <meta http-equiv=Content-Type content="text/html; charset=gb2312" />
 <link rel="stylesheet" href="images/ctrl.css" type="text/css" />
</head>
<body>
<div class=tool style="margin-top:10px;">
<a href='?action=config'>»ù±¾ÉèÖÃ</a> 
<a href='?action=adduser'>Ìí¼ÓÓÃ»§</a> 
<a href='?action=user'>¹ÜÀíÓÃ»§</a>
<a href='?action=addgroup'>Ìí¼Ó×é</a>  
<a href='?action=group'>¹ÜÀí×é</a> 
<a href='?action=update'>Éý¼¶ÐÅÏ¢</a> 
</div>

<?
showjsfunctions();

if ($action == "adduser" && $user["adduser"])
{
?>
<div>
<form name=myform method=post action=ctrl.php onsubmit="return checkpass()">
<input type=hidden name='action' value='adduser' />
ÓÃ»§Ãû:<input type=text size=20 maxlength=30 name=new_user /><br/>
ÃÜ&nbsp;&nbsp;Âë:<input type=password size=20 maxlength=50 name=new_pass /><br/>
ÖØ&nbsp;&nbsp;¸´:<input type=password size=20 maxlength=50 name=new_confirm_pass onblur="checkpass(this);" /><br/>
¸ùÄ¿Â¼:<input type=text size=20 name=new_root /> <a href="javascript:showhelp('roothelp')">°ïÖú</a>
<div id='roothelp' style="width:200px;float:right;display:none">
¹ØÓÚ"¸ùÄ¿Â¼"µÄ°ïÖúÐÅÏ¢:<br/>
   Ïà¶ÔÓÚ³ÌÐòµÄÄ¿Â¼Ãû£¬±ÈÈç±¾³ÌÐòÔÚ wwwroot/down/longbill/ ÏÂ£¬
¶øÄãÏëÉèÖÃ¸ùÄ¿Â¼Îª wwwroot/down/user/ ÄÇÃ´Ó¦¸ÃÊäÈë ../user/ ¡£<br/>×¢: <br/>1: ../´ú±íÉÏ¼¶Ä¿Â¼<br/>2:Èç¹û´ËÄ¿Â¼²»´æÔÚ³ÌÐò»á×Ô¶¯´´½¨
</div>
<br/>
ÓÃ»§×é:<select name=new_group>
<?
$arr = file("class/group.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "<option value='{$arr2[0]}'>{$arr2[0]}</option>\n";
}
?>
</select>
<br/>
<input type=submit value="Ìá½»">&nbsp;<input type=reset value="ÖØÉè">
</form>
</div>
<?
}

else if ($action == "muser" && $user["adduser"])
{
	$g = $_GET["name"];
	if (!$g) $g = $_POST["name"];
	$name = $g;
	$g = getuser($g);
	if (!$g) exit("<div>ÓÃ»§Ãû´íÎó</div>");
?>
<div>
<form name=myform method=post action=ctrl.php onsubmit="return checkpass()">
<input type=hidden name='action' value='muser' />
ÓÃ»§Ãû:<input type=text size=20 maxlength=30 name=new_user value="<?php echo $name;?>" readonly />(²»ÄÜÐÞ¸Ä)<br/>
Ô­ÃÜÂë:<input type=password size=20 name=origpass maxlength=50 /><br/>
ÐÂÃÜÂë:<input type=password size=20 maxlength=50 name=new_pass />(²»ÐèÒªÐÞ¸ÄÃÜÂëÇëÁô¿Õ)
<br/>
ÖØ&nbsp;&nbsp;¸´:<input type=password size=20 maxlength=50 name=new_confirm_pass onblur="checkpass(this);" /><br/>
¸ùÄ¿Â¼:<input type=text size=20 name=new_root value="<?php echo $g["root"];?>" /> <a href="javascript:showhelp('roothelp')">°ïÖú</a>
<div id='roothelp' style="width:200px;float:right;display:none">
¹ØÓÚ"¸ùÄ¿Â¼"µÄ°ïÖúÐÅÏ¢:<br/>
   Ïà¶ÔÓÚ³ÌÐòµÄÄ¿Â¼Ãû£¬±ÈÈç±¾³ÌÐòÔÚ wwwroot/down/longbill/ ÏÂ£¬
¶øÄãÏëÉèÖÃ¸ùÄ¿Â¼Îª wwwroot/down/user/ ÄÇÃ´Ó¦¸ÃÊäÈë ../user/ ¡£<br/>×¢: <br/>1: ../´ú±íÉÏ¼¶Ä¿Â¼<br/>2:Èç¹û´ËÄ¿Â¼²»´æÔÚ³ÌÐò»á×Ô¶¯´´½¨
</div>
<br/>
ÓÃ»§×é:<select name=new_group>
<?
$arr = file("class/group.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "<option value='{$arr2[0]}' ";
	if ($arr2[0] == $g["group"]) echo "selected";
	echo ">{$arr2[0]}</option>\n";
}
?>
</select>
<br/>
<input type=submit value="¸üÐÂ">&nbsp;<input type=reset value="ÖØÉè">
</form>
</div>
<?
}
else if ($action == "user" || $action == "deluser")
{
?>
<div>
<form action=ctrl.php method=post name=myform>
<input type=hidden name=action value=deluser>
ÓÃ»§:<select name=username>
<?
$arr = file("class/users.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "<option value='{$arr2[0]}'>{$arr2[0]}</option>\n";
}
?>
</select>
&nbsp;&nbsp;
<input type=button value='É¾³ý' onclick="deluser()"> <input type=button value='±à¼­' onclick="muser()">
</form>
<script>
function deluser()
{
	var name = document.myform.username.value;
	if (confirm("ÄãÕæµÄÒªÉ¾³ýÓÃ»§ "+name+" Âð?")) document.myform.submit();
}
function muser()
{
	var name = document.myform.username.value;
	window.location = "?action=muser&name="+name;
}
</script>
</div>
<?
}
else if ($action == "config" || !$action)
{
?>
<div>
<form action=ctrl.php method=post>
<input type=hidden name=action value=config>
±êÌâ:<input type=text size=50 name=title value="<?php echo $title;?>"/><br/>
Ä£°å:<select name=tempname>
<?
$handle = @opendir("temp/");
while($v = readdir($handle))
{
	if (is_file("temp/".$v) || $v=="." || $v =="..") continue;
	echo "<option value='{$v}'";
	if (trim($v) == $tempname) echo " selected";
	echo ">{$v}</option>\n";
}
?>
</select><br/>
<input name='force_encode' type='hidden' value='GB2312' />

<input type=checkbox name='allowurlencode' <?php if ($allowurlencode) echo "checked";?> />¶ÔÖÐÎÄÎÄ¼þÃûÊ¹ÓÃURL±àÂë
<br/>
<br/>

<input type=submit value=¸üÐÂ>&nbsp;<input type=reset value=ÖØÉè>
</form>
</div>
<?
}
else if ($action == "group" || $action == "delgroup")
{
?>
<div>
<form action=ctrl.php method=post name=myform>
<input type=hidden name=action value=delgroup>
×é:<select name=groupname>
<?
$arr = file("class/group.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "<option value='{$arr2[0]}'>{$arr2[0]}</option>\n";
}
?>
</select>
&nbsp;&nbsp;
<input type=button value='É¾³ý' onclick="delgroup()"> <input type=button value='±à¼­' onclick="mgroup()">
</form>
<script>
function delgroup()
{
	var name = document.myform.groupname.value;
	if (confirm("ÄãÕæµÄÒªÉ¾³ý×é "+name+" Âð?")) document.myform.submit();
}
function mgroup()
{
	var name = document.myform.groupname.value;
	window.location = "?action=mgroup&name="+name;
}
</script>
</div>
<?
}
else if ($action == "addgroup" && $user["addgroup"])
{
?>
<div>
<form action=ctrl.php name=myform method=post onsubmit="return checkgroupform();">
<input type=hidden name=action value=addgroup>
×éÃû:<input name=groupname type=text size=20 /><br/>
Ä¬ÈÏä¯ÀÀ·½Ê½:<input type=checkbox name=visit />ä¯ÀÀ <input type=checkbox name=big />´óÍ¼±ê<br/>
ÏÞÖÆÎÄ¼þÀàÐÍ:<input type=text name=limittype size=30 value="php|asp|jsp|aspx|php3|cgi|cer|cdx|asa|" />
 <input type=radio name=only value="true" />Ö»ÔÊÐí
 <input type=radio name=only value="0" checked />²»ÔÊÐí
 <a href="javascript:showhelp('limithelp')">°ïÖú</a>
<div id=limithelp style="width:200px;float:right;display:none">
¹ØÓÚ"ÏÞÖÆÎÄ¼þÀàÐÍ"µÄ°ïÖú:<br/>
<ul>
<li>"Ö»ÔÊÐí"£ºÓÃ»§Ö»ÄÜ²Ù×÷Ç°ÃæÌîµÄÎÄ¼þÀàÐÍ£¬ÆäËûËùÓÐµÄÎÄ¼þÀàÐÍ¶¼²»ÄÜ²Ù×÷¡£
<li>"²»ÔÊÐí"£ºÓÃ»§²»ÄÜ²Ù×÷Ç°ÃæÌîµÄÎÄ¼þÀàÐÍ£¬ÆäËûµÄÎÄ¼þÀàÐÍ¶¼¿ÉÒÔ²Ù×÷¡£
<li>Èç¹ûÑ¡ÖÐ"Ö»ÔÊÐí"£¬Çë×¢ÒâÐÞ¸ÄÇ°ÃæµÄÎÄ¼þÀàÐÍ¡£
</ul>
</div>
<br/>
ÐÂ½¨ÎÄ¼þ:<input type=checkbox name=newfile /><br/>
ÐÂ½¨Ä¿Â¼:<input type=checkbox name=newdir /><br/>
ÏÂÔØÔ´ÎÄ¼þ:<input type=checkbox name=downfile /><br/>
ÉÏ´«ÎÄ¼þ:<input type=checkbox name=upfile /><br/>
´ÓURLÏÂÔØ:<input type=checkbox name=savefromurl /><br/>
É¾³ýÎÄ¼þ:<input type=checkbox name=delete /><br/>
ZIP´ò°ü:<input type=checkbox name=zippack /><br/>
ZIP½âÑ¹:<input type=checkbox name=unpack /><br/>
ËÑË÷:<input type=checkbox name=search /><br/>
È«Ñ¡/·´Ñ¡:<input type=checkbox name=select checked /><br/>
¸´ÖÆÎÄ¼þ:<input type=checkbox name=copy /><br/>
ÒÆ¶¯ÎÄ¼þ:<input type=checkbox name=move /><br/>
²é¿´Ô´ÎÄ¼þ:<input type=checkbox name=viewsorce /><br/>
ÖØÃüÃû:<input type=checkbox name=rename /><br/>
±£´æÎÄ¼þ:<input type=checkbox name=savefile /><br/>
²é¿´Í³¼Æ:<input type=checkbox name=property /><br/>
¿ØÖÆÃæ°å:<input type=checkbox name=admin onclick="$('admindiv').style.display = this.checked?'':'none';" /><br/>
<div style="display:none;width:300px;" id=admindiv>
<ul>
<li>Ìí¼ÓÓÃ»§:<input type=checkbox name=adduser />
<li>É¾³ýÓÃ»§:<input type=checkbox name=deluser />
<li>Ìí¼Ó×é:<input type=checkbox name=addgroup  />
<li>É¾³ý×é:<input type=checkbox name=delgroup  />
</ul>
</div>
<input type=submit value=ÐÂ½¨>&nbsp;<input type=reset value=ÖØÉè>
</form>
</div>
<?
}
else if ($action == "mgroup" && $user["addgroup"])
{
	$g = $_GET["name"];
	if (!$g) $g = $_POST["name"];
	$name = $g;
	$g = getgroup($g);
	if (!$g) exit("<div>×éÃû´íÎó</div>");
?>
<div>
<form action=ctrl.php name=myform method=post onsubmit="return checkgroupform();">
<input type=hidden name=action value=mgroup>
×éÃû:<input name=groupname type=text size=20 value="<?php echo $name;?>" readonly />(²»ÄÜÐÞ¸Ä)<br/>
Ä¬ÈÏä¯ÀÀ·½Ê½:<input type=checkbox name=visit <?php echocheck($g["visit"]);?> />ä¯ÀÀ <input type=checkbox name=big <?php echocheck($g["big"]);?> />´óÍ¼±ê<br/>
ÏÞÖÆÎÄ¼þÀàÐÍ:<input type=text name=limittype size=30 value="<?php echo $g["limittype"];?>" />
 <input type=radio name=only value="true" <?php echocheck($g["only"]);?> />Ö»ÔÊÐí
 <input type=radio name=only value="0" <?php echocheck(!$g["only"]);?> />²»ÔÊÐí
 <a href="javascript:showhelp('limithelp')">°ïÖú</a>
<div id=limithelp style="width:200px;float:right;display:none">
¹ØÓÚ"ÏÞÖÆÎÄ¼þÀàÐÍ"µÄ°ïÖú:<br/>
<ul>
<li>"Ö»ÔÊÐí"£ºÓÃ»§Ö»ÄÜ²Ù×÷Ç°ÃæÌîµÄÎÄ¼þÀàÐÍ£¬ÆäËûËùÓÐµÄÎÄ¼þÀàÐÍ¶¼²»ÄÜ²Ù×÷¡£
<li>"²»ÔÊÐí"£ºÓÃ»§²»ÄÜ²Ù×÷Ç°ÃæÌîµÄÎÄ¼þÀàÐÍ£¬ÆäËûµÄÎÄ¼þÀàÐÍ¶¼¿ÉÒÔ²Ù×÷¡£
<li>Èç¹ûÑ¡ÖÐ"Ö»ÔÊÐí"£¬Çë×¢ÒâÐÞ¸ÄÇ°ÃæµÄÎÄ¼þÀàÐÍ¡£
</ul>
</div>


<br/>
ÐÂ½¨ÎÄ¼þ:<input type=checkbox name=newfile <?php echocheck($g["newfile"]);?> /><br/>
ÐÂ½¨Ä¿Â¼:<input type=checkbox name=newdir <?php echocheck($g["newdir"]);?> /><br/>
ÏÂÔØÔ´ÎÄ¼þ:<input type=checkbox name=downfile <?php echocheck($g["downfile"]);?> /><br/>
ÉÏ´«ÎÄ¼þ:<input type=checkbox name=upfile <?php echocheck($g["upfile"]);?> /><br/>
´ÓURLÏÂÔØ:<input type=checkbox name=savefromurl <?php echocheck($g["savefromurl"]);?> /><br/>
É¾³ýÎÄ¼þ:<input type=checkbox name=delete <?php echocheck($g["delete"]);?> /><br/>
ZIP´ò°ü:<input type=checkbox name=zippack <?php echocheck($g["zippack"]);?> /><br/>
ZIP½âÑ¹:<input type=checkbox name=unpack <?php echocheck($g["unpack"]);?> /><br/>
ËÑË÷:<input type=checkbox name=search <?php echocheck($g["search"]);?> /><br/>
È«Ñ¡/·´Ñ¡:<input type=checkbox name=select <?php echocheck($g["select"]);?> /><br/>
¸´ÖÆÎÄ¼þ:<input type=checkbox name=copy <?php echocheck($g["copy"]);?> /><br/>
ÒÆ¶¯ÎÄ¼þ:<input type=checkbox name=move <?php echocheck($g["move"]);?> /><br/>
²é¿´Ô´ÎÄ¼þ:<input type=checkbox name=viewsorce <?php echocheck($g["viewsorce"]);?> /><br/>
ÖØÃüÃû:<input type=checkbox name=rename <?php echocheck($g["rename"]);?> /><br/>
±£´æÎÄ¼þ:<input type=checkbox name=savefile <?php echocheck($g["savefile"]);?> /><br/>
²é¿´Í³¼Æ:<input type=checkbox name=property <?php echocheck($g["property"]);?> /><br/>
¿ØÖÆÃæ°å:<input type=checkbox name=admin <?php echocheck($g["admin"]);?> onclick="$('admindiv').style.display = this.checked?'':'none';" /><br/>
<div style="display:<?echo ($g["admin"])?"":"none";?>;width:300px;" id=admindiv>
<ul>
<li>Ìí¼ÓÓÃ»§:<input type=checkbox name=adduser <?php echocheck($g["adduser"]);?> />
<li>É¾³ýÓÃ»§:<input type=checkbox name=deluser <?php echocheck($g["deluser"]);?> />
<li>Ìí¼Ó×é:<input type=checkbox name=addgroup <?php echocheck($g["addgroup"]);?> />
<li>É¾³ý×é:<input type=checkbox name=delgroup <?php echocheck($g["delgroup"]);?> />
</ul>
</div>
<input type=submit value=¸üÐÂ>&nbsp;<input type=reset value=ÖØÉè>
</form>
</div>
<?
}

else if ($action == "update")
{
	echo "<div>";
	echo "<script language=javascript src='http://www.longbill.cn/update/update.php?v={$v}'></script>";
	echo "</div>";
}
else
{
	echo "<div>Ã»ÓÐÈ¨ÏÞ!</div>";
}

function echocheck($v)
{
	if ($v) echo "checked";
}

function getgroup($groupname)
{

	$group = array();
	$dd = array();
	$groups=@file("class/group.php");
	for($i=1;$groups[$i];$i++)
	{
		$v = trim ($groups[$i]);
		if (!$v || !strpos($v,"|")) continue;
		$arr = explode("|",$v);
		if ($arr[0] == $groupname )
		{
			$rights = $v;
			break;
		}
	}
	if (!$rights) return false;
	$right = explode("|",$rights);
	for($j=1;$j<count($right);$j++)
	{
		$v = $right[$j];
		if (!$v) continue;
		if (strrpos($v,"&"))
		{
			if (substr($v,0,1) == "&") $v = substr($v,1,strlen($v));
			if (substr($v,-1) != "&") $v.="&";
			$dd["limittype"] = str_replace("&","|",$v);
		}
		else $dd["{$v}"] = 1;
	}
	return $dd;
}

function getuser($username)
{
	$dd = array();
	$users=@file("class/users.php");
	for($i=1;$users[$i];$i++)
	{
		$v = trim ($users[$i]);
		if (!$v || !strpos($v,"|")) continue;
		$arr = explode("|",$v);
		if ($arr[0] == $username)
		{
			$rights = $v;
			break;
		}
	}
	if (!$rights) return false;
	$arr = explode("|",$rights);
	$dd["root"] = $arr[2];
	$dd["group"] = $arr[3];
	return $dd;
}


function showjsfunctions()
{
?>
<script language=javascript>
function $(obj)
{
	return document.getElementById(obj);
}
function showhelp(id,v,e)
{
	if (!v)
		$(id).style.display = ($(id).style.display == "none")?"":"none";
	else
		$(id).style.display = e?"":"none";
}

function checkpass(v)
{
	if (v && document.myform.new_pass.value != v.value)
	{
		alert("ÃÜÂë²»Ò»ÖÂ!");
	}
	else if (!v)
	{
		var f=document.myform;
		if (!f.new_user.value)
		{
			alert("ÇëÊäÈëÓÃ»§Ãû!");
			return false;
		}
		if (users.indexOf(f.new_user.value)!=-1 && f.action.value != "muser")
		{
			alert("ÓÃ»§ "+f.new_user.value+" ÒÑ¾­´æÔÚ!");
			return false;
		}
		if (!f.new_pass.value && f.action.value != "muser")
		{
			alert("ÇëÊäÈëÃÜÂë!");
			return false;
		}
		if (f.new_pass.value != f.new_confirm_pass.value)
		{
			alert("ÃÜÂë²»Ò»ÖÂ!");
			return false;
		}
		if (!f.new_root.value)
		{
			alert("ÇëÊäÈë¸ùÄ¿Â¼!");
			return false;
		}
	}
}

function checkgroupform()
{
	var f=document.myform;
	if (!f.groupname.value)
	{
		alert('ÇëÊäÈë×éÃû');
		return false;
	}
	if (groups.indexOf(f.groupname.value)!=-1 && f.action.value !="mgroup")
	{
		alert('×é '+f.groupname.value+" ÒÑ¾­´æÔÚ!");
		return false;
	}
	if (document.myform.only[0].checked)
	{
		var limit =document.myform.limittype.value.toLowerCase();
		var types = "php|asp|jsp|aspx|php3|cgi";
		var type = types.split("|");
		for(var i=0;i<type.length;i++)
		{
			if (limit.indexOf(type[i]) !=-1 && !confirm("ÄãÕæµÄÏ£ÍûÓÃ»§ÄÜ¹»²Ù×÷ "+type[i]+" ÀàÐÍµÄÎÄ¼þÂð?\nÕâÊÇºÜÎ£ÏÕµÄ!")) return false;
		}
	}
}
var groups = "||<?
$arr = file("class/group.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "{$arr2[0]}|";
}
?>||";
var users = "||<?
$arr = file("class/users.php");
for($i=1;$arr[$i];$i++)
{
	$v = trim ($arr[$i]);
	if (!$v || !strpos($v,"|")) continue;
	$arr2 = explode("|",$v);
	echo "{$arr2[0]}|";
}
?>||";
</script>
<?
}


?>