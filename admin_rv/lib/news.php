<?
if($_POST['add'] == "yes"){
print "HELLO";	
$db = new mysql();
$result2 = $db->query("Select * From ".TABLE_LANGUAGES."");
$get_old_id = $db->fetch($db->query("SELECT id FROM ".TABLE_PAGES." ORDER BY id DESC LIMIT 1"));
$new_id = $get_old_id[0] + 1;
$get_old_order = $db->fetch($db->query("SELECT ordering FROM ".TABLE_PAGES." ORDER BY ordering DESC LIMIT 1"));
$new_order = $get_old_order[0] + 1;



$result = $db->query("INSERT INTO ".TABLE_PAGES." VALUES (
		'".$_POST['page_id']."', 
		'".$new_id."', 
		'".$_POST['title']."', 
		'".$_POST['sh_desc']."',
		'".$content."' , 
		'".$thumb."' ,
		'".$lang."' , 
		'".$created."' ,
		'".$crtime."' ,
		''");

echo "<script>document.location='index.php'</script>";
}
?>