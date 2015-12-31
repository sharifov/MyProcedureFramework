<?
$db = new mysql();
$Sql = $db->query("Select * From ".TABLE_PAGES." Where id='$id' AND lang_id='$lang'");
$Row = $db->fetch($Sql);
if($_POST['add'] == "yes"){
	if(isset($_POST['link'])) {
		$_POST[link]=mysql_real_escape_string(strip_tags($_POST[link])).'##'.mysql_real_escape_string(strip_tags($_POST[p]));
		$db->query("UPDATE ".TABLE_PAGES." SET pagename='".protect($_POST['pagename'])."', link='".$_POST['link']."'  WHERE id='$_POST[uid]' AND lang_id='$lang'");
		$db->query("UPDATE ".TABLE_PAGES." SET type='".$_POST['type']."'  WHERE id='$_POST[uid]'");
		echo "<script>document.location='index.php'</script>";
	}else if(isset($_POST['news'])) {
		$db->query("UPDATE ".TABLE_PAGES." SET pagename='".protect($_POST['pagename'])."' WHERE id='$_POST[uid]' AND lang_id='$lang'");
		$db->query("UPDATE ".TABLE_PAGES." SET type='".$_POST['type']."'  WHERE id='$_POST[uid]'");
		echo "<script>document.location='index.php'</script>";
	}else {
		if(get_magic_quotes_gpc()){
		}else{
			$_POST[content]=mysql_real_escape_string($_POST['content']);
		}
		$db->query("UPDATE ".TABLE_PAGES." SET pagename='".protect($_POST['pagename'])."', content='".$_POST[content]."'  WHERE id='$_POST[uid]' AND lang_id='$lang'");
		$db->query("UPDATE ".TABLE_PAGES." SET type='".$_POST['type']."'  WHERE id='$_POST[uid]'"); 
		echo "<script>document.location='index.php'</script>";
	}

}
if($_GET['action'] == "delete"){

		$db->query ("DELETE From ".TABLE_PAGES." WHERE sub_id='".$id."'");
		$db->query ("DELETE From ".TABLE_PAGES." WHERE id='".$id."'");

		$new_archive_id = ($id+120);
		$db->query ("UPDATE ".TABLE_NEWS." SET page_id='".$new_archive_id."' WHERE page_id='".$id."'");

		echo "<script>document.location='index.php'</script>";
}
if($_GET['action'] == "visibility"){
if($_GET['visibility'] == "visible") {
$visible = "hidden";
}else if($_GET['visibility'] == "hidden") {
$visible = "visible";
}
	
$db->query ("UPDATE ".TABLE_PAGES." SET visibility ='$visible' WHERE id='".$id."' AND lang_id='$lang'");
echo "<script>document.location='index.php'</script>";
}
$ordering  = $_GET['ordering'];
if ($_GET['action'] == 'up')
{
$get_id = $db->fetch($db->query("SELECT * FROM ".TABLE_PAGES." WHERE id = '".$id."'"));
if($get_id[1] == "0") {
$order = $db->fetch($db->query("SELECT id,sub_id,ordering FROM ".TABLE_PAGES." WHERE sub_id='0' AND ordering < '".$_GET['ordering']."' ORDER by ordering DESC"));
}else{
$order = $db->fetch($db->query("SELECT id,sub_id,ordering FROM ".TABLE_PAGES." WHERE sub_id='".$get_id[1]."'  AND ordering < '".$_GET['ordering']."' ORDER by ordering DESC"));
}

if($order[2] > 0){
$order1 = $db->fetch($db->query("SELECT id,ordering FROM ".TABLE_PAGES." WHERE  ordering = '".$_GET['ordering']."'"));
$order_sel = $db->fetch($db->query("SELECT id,ordering FROM ".TABLE_PAGES." WHERE  ordering = '".$order[2]."'"));

$neworder1 = $_GET['ordering'];
$neworder2 = $order[2];

$db->query("UPDATE ".TABLE_PAGES." SET ordering='".$neworder1."' WHERE id='".$order_sel[0]."'");
$db->query("UPDATE ".TABLE_PAGES." SET ordering='".$neworder2."' WHERE id='".$id."'");
}
echo "<script>document.location='index.php'</script>";
}






if ($_GET['action'] == 'down')
{
$get_id = $db->fetch($db->query("SELECT * FROM ".TABLE_PAGES." WHERE id = '".$id."'"));
if($get_id[1] == "0") {
$order = $db->fetch($db->query("SELECT id,sub_id,ordering FROM ".TABLE_PAGES." WHERE sub_id='0' AND ordering > '".$_GET['ordering']."' ORDER by ordering ASC"));
}else{
$order = $db->fetch($db->query("SELECT id,sub_id,ordering FROM ".TABLE_PAGES." WHERE sub_id='".$get_id[1]."'  AND ordering > '".$_GET['ordering']."' ORDER by ordering ASC"));
}

if($order[2] > 0){
$order1 = $db->fetch($db->query("SELECT id,ordering FROM ".TABLE_PAGES." WHERE  ordering = '".$_GET['ordering']."'"));
$order_sel = $db->fetch($db->query("SELECT id,ordering FROM ".TABLE_PAGES." WHERE  ordering = '".$order[2]."'"));

$neworder1 = $_GET['ordering'];
$neworder2 = $order[2];

$db->query("UPDATE ".TABLE_PAGES." SET ordering='".$neworder1."' WHERE id='".$order_sel[0]."'");
$db->query("UPDATE ".TABLE_PAGES." SET ordering='".$neworder2."' WHERE id='".$id."'");
}
echo "<script>document.location='index.php'</script>";
}

?>