<?php
class LZ_Rights extends LZ_Model
{
	function LZ_Rights()
	{
		$this->table = LZ_MYSQL_PREFIX.'rights';
		$this->id = 'rights_id';
		$this->order_id = 'order_id';
	}
}
?>