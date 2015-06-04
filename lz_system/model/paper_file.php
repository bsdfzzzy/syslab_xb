<?php
class LZ_Paper_File extends LZ_Model
{
	function LZ_Paper_File()
	{
		$this->table = LZ_MYSQL_PREFIX.'paper_file';
		$this->id = 'file_id';
		$this->order_id = 'paper_id';
	}
}
?>