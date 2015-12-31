<?
$db = new mysql();


if($_POST['add'] == "yes"){

$db->query("UPDATE ".TABLE_SETTINGS." SET 
`title`='{$_POST[title]}', 
`home_page_id`='{$_POST[home_page_id]}', 
`default_lang`='{$_POST[default_lang]}',   
`description`='{$_POST[descr]}',
`keywords`='{$_POST[keyw]}',
`main_mail`='{$_POST[main_mail]}',
`tmr`='{$_POST[tmr]}'
");
echo "<script>document.location='index.php'</script>";

}




?>