<?
$db = new mysql();
$Sql = $db->query("Select * From ".TABLE_NEWS." Where news_id='$id' AND lang_id='$lang'");
$Row = $db->fetch($Sql);
if($_POST['add'] == "yes"){
$_POST[content]=mysql_real_escape_string($_POST[content]);
if($_POST['imgs']=="yes"){	
$new_name = "new".time().date('dmy');		
$target = "../files/news/";
$fname = $_FILES['image']['name'];
$zname = explode(".",$fname);
$ns = end($zname);
$target = $target . basename("$new_name.$ns") ;
$imgname = $_FILES['image']['tmp_name'];
if(move_uploaded_file($imgname, $target)) {

} else{
    exit;
}
$thumb = "$new_name.$ns";	
$created  = $_POST[year]."-".$_POST[month]."-".$_POST[day];
$crtime = date("H:i"); 	
$created  = $_POST[year]."-".$_POST[month]."-".$_POST[day];
$db->query("UPDATE ".TABLE_NEWS." SET title='".protect($_POST['title'])."',  sh_desc='".protect($_POST['sh_desc'])."', content='".$_POST['content']."', thumb='".$thumb."', created='".$created."'  WHERE news_id='$_POST[uid]' AND lang_id='$lang'");
echo "<script>document.location='index.php?options=news'</script>";
}else {
$created  = $_POST[year]."-".$_POST[month]."-".$_POST[day];
$db->query("UPDATE ".TABLE_NEWS." SET title='".protect($_POST['title'])."',  sh_desc='".protect($_POST['sh_desc'])."', content='".$_POST['content']."', created='".$created."'  WHERE news_id='$_POST[uid]' AND lang_id='$lang'");
echo "<script>document.location='index.php?options=news'</script>";
}

}
if($_GET['action'] == "delete"){
$db->query ("DELETE From ".TABLE_NEWS." WHERE news_id='".$id."'");


echo "<script>document.location='index.php?options=news'</script>";
}

?>