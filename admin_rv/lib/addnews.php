<?
if($_POST['add'] == "yes"){	
$db = new mysql();
$qR=$db->query("SELECT `mail` FROM `".TABLE_MAIL."`");

$get_old_id = $db->fetch($db->query("SELECT news_id FROM ".TABLE_NEWS."  ORDER BY news_id DESC LIMIT 1"));
$new_id = $get_old_id[0] + 1;
$created  = $_POST[year]."-".$_POST[month]."-".$_POST[day];
$crtime = date('H:i:s');
if($_POST['imgs']=="yes"){	
$new_name = $new_id.time().date('dmy');	
$target = "../files/news/";

$target = $target . basename("$new_name.jpg") ;
$imgname = $_FILES['image']['tmp_name'];

copy($imgname, $target);
$thumb = "$new_name.jpg";
}else {
$thumb = "";
}

 $db->query("INSERT INTO ".TABLE_NEWS." VALUES (
		'".$_POST['page_id']."', 
		'".$new_id."',
		'".protect($_POST['title'])."', 
		'".protect($_POST['sh_desc'])."',
		'".mysql_real_escape_string($_POST['content'])."' , 
		'".$thumb."' ,
		'".$lang."' , 
		'".$created."' ,
		'".$crtime."' ,
		'')"); 

if(!empty($qR)){		
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: '.TITLE.' <'.MAIN_MAIL.'>' . "\r\n";

	while($tR=mysql_fetch_object($qR)){
		mail($tR->mail, $_POST[title], $_POST[content], $headers);
	}
}
		
echo "<script>document.location='index.php?options=news'</script>";
}
?>