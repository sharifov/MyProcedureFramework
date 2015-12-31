<?php
/******************* class.counter.php *******************
* Author   : Zamin Ismayilov
* Info     : Class for the Counter Site
* Contacts : zamin@isetech.com
******************* class.counter.php *******************/



class counter_set {

function add_counter() {
global	$db;
if(!isset($_SESSION['counter'])) {
$get_old_id = $db->fetch($db->query("SELECT id FROM ".TABLE_LOGS." ORDER BY id DESC LIMIT 1"));
$new_id = $get_old_id[0] + 1;
$ip = $_SERVER['REMOTE_ADDR'];
$result = $db->query("INSERT INTO ".TABLE_LOGS." VALUES (
		'$new_id',
		'$ip', 
		'".ADDDATE."', 
		'".ADDTIME."' 
		)");
}
$_SESSION['counter'] = $_SERVER['REMOTE_ADDR'];


}
}



?>