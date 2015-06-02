<?php
!defined('LZ_MODULE') && die('Access Denied');
$m = $_GET['m'];
include_once('model/paper.php');
$paper = new LZ_Paper;
include_once('model/paper_file.php');
$paper_file = new LZ_Paper_File;
chdir('../');
!is_dir(LZ_PAPER_PATH) && @mkdir(LZ_PAPER_PATH);

if ($m == 'new')
{
	$data = filter_array($_POST,'htmlspecialchars:name!,htmlspecialchars:school,intval:student_id!');
	if ($data)
	{
		$data['time'] = time();
		$paper->add($data);
		$paper_id = mysql_insert_id();
		if (!$paper_id)
		{
			echo "数据提交失败<br />";
		}
		else
		{
			echo "数据提交成功<br />";
			foreach($_FILES as $file)
			{
				$myfile = $file["tmp_name"];
				if (!$myfile) continue;
				$ftype = getext($file['name']);
				if (!$ftype || !preg_match("/\*\.$ftype;/i",$config['upload_file_types']))
				{
					$err = true;
					echo "文件类型不允许:".$ftype."<br />";
				}
				else
				{
					$file_url = LZ_PAPER_PATH.time().rand(1111,9999).'.'.$ftype;
					if (move_uploaded_file($myfile, $file_url) && file_exists($file_url))
					{
						$paper_file->add(
						array(
							'paper_id'=>$paper_id,
							'filename'=>basename($file['name']),
							'filepath'=>$file_url
						));
						echo basename($file['name'])." 上传成功<br />";
					}
					else
					{
						$err = true;
						echo basename($file['name'])." 上传失败<br />";
					}
				}
				
			}
		}
		
		if ($err)
		{
			$paper->delete($paper_id);
			echo "<span style='color:red'>提交失败</span><br /><a href='javascript:history.go(-1);'>返回</a>";
		}
		else
		{
			?>
			提交成功! <a href="index.php">返回</a>
			<?php
		}
	}
	else 
		echo "输入错误";
	die;
}
?>