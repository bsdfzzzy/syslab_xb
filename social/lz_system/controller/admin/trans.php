<?php
mssql_connect($mssql['server'],$mssql['username'],$mssql['password']);
mssql_select_db($mssql['database']);
$r = mssql_query("select * from PublicNews Where NewsTypeID='169' ORDER BY ID ASC");
while($arr = mssql_fetch_array($r))
{
	print_r($arr);
}
?>