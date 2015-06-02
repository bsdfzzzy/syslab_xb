<?php
class LZ_Cache
{
	function LZ_Cache()
	{
		$this->table = LZ_MYSQL_PREFIX.'cache';
		$this->id = 'cache_id';
		$this->order_id = 'cache_id';
		
		$this->clear_expired();
	}
	
	function exists($uri = false)
	{
		global $db;
		if (!$uri) $uri = $this->get_uri();
		$sql = "SELECT count(*) as total FROM $this->table WHERE uri='$uri'";
		$r = $db->get_one($sql);
		return intval($r['total']);
	}
	
	function get_uri()
	{
		$uri = basename($_SERVER['SCRIPT_NAME']);
		$_SERVER['QUERY_STRING'] && $uri.= '?'.$_SERVER['QUERY_STRING'];
		return $uri;
	}
	
	function get($uri = false,&$ttl)
	{
		global $db;
		if (!$uri) $uri = $this->get_uri();
		$sql = "SELECT * FROM $this->table WHERE uri='$uri' ORDER BY order_id ASC";
		$arr = $db->get_all($sql);
		$r = '';
		foreach($arr as $_a) 
		{
			$r.= $_a['content'];
		}
		$ttl = $_a['create_time']+$_a['ttl']-time();
		return $r;
	}
	
	function add($data)
	{
		global $db;
		!$data['uri'] && $data['uri'] = $this->get_uri();
		$data['create_time'] = time();
		if (!$data['ttl']) $data['ttl'] = 120;
		$content = $data['content'];
		$order_id = 0;
		$c = substr($content,0,20000);
		while($c)
		{
			$data['content'] = $c;
			$data['order_id'] = $order_id;
			$sql = make_insert_sql($this->table,$data); 
			$r = $db->query($sql);
			if (!$r) break;
			$order_id++;
			$c = substr($content,$order_id*20000,20000);
		}
		return $r;
	}
	
	function clear_expired()
	{
		global $db;
		$db->query("DELETE FROM $this->table WHERE create_time + ttl < ".time());
	}
	
	function clear_uri($prefix)
	{
		global $db;
		$db->query("DELETE FROM $this->table WHERE uri LIKE '".mysql_escape_string($prefix)."%'");
	}
}
?>