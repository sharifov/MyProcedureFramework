<?

if($_POST['add'] == "yes"){

$db = new mysql();
$pass = md5($_POST['pass']);
$usr = trim($_POST['username']);
$nums = $db->num($db->query("SELECT * FROM ".TABLE_ADMINKA." Where username like '$usr'"));

if($nums>0) {
$_SESSION['error_admin'] = "This user uje var :)";
echo "<script>document.location='index.php?options=users&action=error'</script>";
exit;
}

$get_old_id = $db->fetch($db->query("SELECT id FROM ".TABLE_ADMINKA." ORDER BY id DESC LIMIT 1"));
$new_id = $get_old_id[0] + 1;




$result = $db->query("INSERT INTO ".TABLE_ADMINKA." VALUES (
		'$new_id', 
		'".trim($_POST['username'])."', 
		'".$pass."')");

echo "<script>document.location='index.php?options=users'</script>";
}

if($_GET['action'] == "delete"){
$db->query ("DELETE From ".TABLE_ADMINKA." WHERE id='".$id."'");
echo "<script>document.location='index.php?options=users'</script>";
}

if($_GET[action]=="edit"){
$pass = md5($_POST['pass']);
$db->query("UPDATE ".TABLE_ADMINKA." SET pass='".$pass."' WHERE id='".$_POST[uid]."'");
echo "<script>document.location='index.php?options=users'</script>";
}
?>