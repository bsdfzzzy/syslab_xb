<?php
/*
LoveZhi MVC
Model Prototype
by: Longbill 
created:2009-3-10
last modified:2009-4-13
*/
class LZ_Model
{
	var $table; // table name
	var $id;  //unique id
	var $order_id; //order column
	
	//add one row, returns the new row's id if insert succeed
	function add( $data = array())
	{
		global $db;
		check_allowed(str_replace(LZ_MYSQL_PREFIX,'',$this->table),'add',LZ_RESPONSE == 'text');
		$sql = make_insert_sql($this->table,$data); 
		if ($db->query($sql))
		{
			return $db->insert_id();
		}
		else return false;
	}
	
	//delete one record by its id
	function delete($id)
	{
		global $db;
		check_allowed(str_replace(LZ_MYSQL_PREFIX,'',$this->table),'delete',LZ_RESPONSE == 'text');
		$sql = "DELETE FROM $this->table WHERE $this->id = '$id' LIMIT 1";
		return ($db->query($sql));
	}
	
	//check if one record exists, input an array,such as : array('name'=>'xxx','sex'=>'M')
	function exists($arr)
	{
		global $db;
		$sql = make_select_sql($this->table,$arr,'count(*) as total');
		$r = $db->get_one($sql);
		return intval($r['total']);
	}
	
	//update a row by its id
	function update( $id, $data = array())
	{
		global $db;
		check_allowed(str_replace(LZ_MYSQL_PREFIX,'',$this->table),'update',LZ_RESPONSE == 'text');
		$sql = make_update_sql($this->table,$data, array($this->id => $id)); 
		return ($db->query($sql));
	}
	
	//get one row
	function get_one($id)
	{
		global $db;
		//check_allowed(str_replace(LZ_MYSQL_PREFIX,'',$this->table),'read',LZ_RESPONSE == 'text');
		if (is_array($id)) // if by condition
		{
			$sql = make_select_sql($this->table,$id);
			$sql .= " LIMIT 1";
		}
		else
		{
			$sql = "SELECT * FROM $this->table WHERE $this->id = '$id' LIMIT 1";
		}
		return $db->get_one($sql);
	}
	
	//get rows of one page
	function get_list($data=array())
	{
		global $db;
		$sql = '';
		//check_allowed(str_replace(LZ_MYSQL_PREFIX,'',$this->table),'read',LZ_RESPONSE == 'text');
		//select what
		$_select = $data['select']?$data['select']:'*';
		
		//user defined conditions such as `name` LIKE '%xxx%' ....
		if ($data['where']) $sql.= " AND ".$data['where'];
		
		//order control
		if (!$data['order'] && $this->order_id)
			$sql.= " ORDER BY $this->order_id DESC";		
		else if ($data['order'])
			$sql.= " ORDER BY ".$data['order'].'';
		else 
			$sql.=" ORDER BY $this->id ";
		
		//page control
		if ($data['from'] && $data['total'])
			$sql.=" LIMIT ".$data['from'].",".$data['total'];
		else if ($data['total'])
			$sql.=" LIMIT ".$data['total'];
		$sql.= ';';
		
		//unset control columns
		unset($data['select']);
		unset($data['where']);
		unset($data['order']);
		unset($data['total']);
		unset($data['from']);
		
		$sql = make_select_sql($this->table,$data,$_select).$sql;
		return $db->get_all($sql);
	}

	function query($sql)
	{
		global $db;
		return $db->get_all($sql);
	}
}
?>