<?php
class LZ_Config extends LZ_Model
{
	function LZ_Config()
	{
		$this->table = LZ_MYSQL_PREFIX.'config';
		$this->id = 'config_id';
		$this->order_id = 'order_id';
	}
	
	function get($name)
	{
		return parent::get_one( array('name'=>$name));
	}
	
	function get_list($data = array())
	{
		!$data['order'] && $data['order'] = "order_id DESC,$this->id ASC";
		return parent::get_list($data);
	}
}
?>