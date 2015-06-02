<?php
function make_insert_sql($table,$data)
{
	$cols = array();
	$vals = array();
	foreach($data as $key => $val)
	{
		$cols[] = "`$key`";
		$vals[] = "'".mysql_escape_string($val)."'";
	}
	return "INSERT INTO `$table` (".join(',',$cols).") VALUES(".join(',',$vals).") ";
}

function make_select_sql($table,$data = array(),$_select = '*')
{
	$cond = array();
	foreach($data as $key => $val)
		$cond[] = "`$key` = '".mysql_escape_string($val)."' ";
	$sql = "SELECT $_select FROM `$table` ";
	if (count($cond) > 0)
		$sql.= " WHERE ".join(' AND ',$cond);
	else
		$sql.= " WHERE 1=1 ";
	return $sql;
}

function make_update_sql($table,$data,$cond_arr)
{
	$values = array();
	$cond = array();
	foreach($data as $key => $val)
		$values[] = "`$key` = '".mysql_escape_string($val)."'";
	foreach($cond_arr as $key => $val)
		$cond[] = "`$key` = '".mysql_escape_string($val)."'";
	return "UPDATE `$table` SET ".join(',',$values)." WHERE ".join(' AND ',$cond);
}

?>