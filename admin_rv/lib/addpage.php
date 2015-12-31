<?
if($_POST['add'] == "yes"){
$db = new mysql();
$result2 = $db->query("Select * From ".TABLE_LANGUAGES."");
$get_old_id = $db->fetch($db->query("SELECT id FROM ".TABLE_PAGES." ORDER BY id DESC LIMIT 1"));
$new_id = $get_old_id[0] + 1;
$get_old_order = $db->fetch($db->query("SELECT ordering FROM ".TABLE_PAGES." ORDER BY ordering DESC LIMIT 1"));
$new_order = $get_old_order[0] + 1;

if($_POST['subid'] == "0") {
$sub = "0";
}else {
$sub = $_POST['subid'];
}

while($arr = mysql_fetch_array($result2)) {
$t=$arr[1];
$result = $db->query("INSERT INTO ".TABLE_PAGES." VALUES (
				'$new_id',
				'$sub', 
				'".$_POST['pagename_'.$t]."', 
				'$content' , 
				'".ADDDATE."' , 
				'0' , 
				'$arr[1]', 
				'$_POST[visibility]', 
				'', 
				'$_POST[type]', 
				'top',
				'$new_order',
				''
		)");
}
 echo "<script>document.location='index.php'</script>";
}
?>