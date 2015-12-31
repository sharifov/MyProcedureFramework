<?php
include_once("config.php");
require_once ('functions.php');
require_once ('lang.php');
require_once ($FOLDER->class."/class.mysql.php");
require_once ($FOLDER->class."/class.session.php");
$db=new mysql();

$lang=language_set::session_set();

if(isset($_POST[sorting])){
	$sort=explode(',',rtrim($_POST[sorting],','));
	$maxSort=count($sort);
	for($y=0;$y<$maxSort;$y++){
		$exp=explode(':',$sort[$y]);
		mysql_query("UPDATE ".constant("TABLE_".strtoupper($_POST[table]))." SET `ordering`='{$exp[1]}' WHERE `id`='{$exp[0]}'");
	}
}

?>