<?php
$conn=mysql_connect("localhost","wap","wap") or die("数据库链接错误了，哈哈");
$db=mysql_select_db("guoji",$conn) or die("没有这个数据表");
$sql="delete from lz_apply where id=".$_GET['id'];
$query=mysql_query($sql) or die("记录删除失败");
echo "删除成功";
echo "<script>location.href='../../../../international/admin.php?p=apply'</script>";

?>
