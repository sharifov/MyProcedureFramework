<?php

class mysql{
	
	 function mysql(){
		global $config;
		mysql_connect($config[db_host], $config[db_user], $config[db_pass]) or die("Could not connect to database");
		mysql_select_db($config[db_name]) or die("Could not select database .{$config[db_name]}");
		mysql_query ("SET NAMES utf8");
		
	}

	 function query($sql) {
		$result = mysql_query($sql);
		return $result;
	}

	 function fetch($result) {
		return mysql_fetch_array($result);
	}

	 function fetchArray($result) {
		return mysql_fetch_assoc($result);
	}

	 function fetchWhile($q){
		$q=$this->query($q);
		while($r=mysql_fetch_object($q)){
			$t[]=$r;
		}
		return $t;
	}

	 function num($result) {
		$count = mysql_num_rows($result);
		return $count;
	}

	 function getLng(){
		$lng='';
		$qLng=mysql_query("SELECT `shot_lang` FROM ".TABLE_LANGUAGES." ORDER BY `lang_id` DESC");
		while($rLng=mysql_fetch_assoc($qLng)){
			$lng[]=$rLng[shot_lang];
		}
		return array_reverse($lng);
	}
}

?>