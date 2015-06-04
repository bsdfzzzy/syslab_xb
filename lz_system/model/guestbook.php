<?php
class LZ_Guestbook extends LZ_Model
{
	function LZ_Guestbook()
	{
		$this->table = LZ_MYSQL_PREFIX.'guestbook';
		$this->id = 'guestbook_id';
		$this->order_id = 'guestbook_id';
	}
}
?>