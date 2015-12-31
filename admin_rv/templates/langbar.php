<?

$result = $db->query("Select * From ".TABLE_LANGUAGES."");
$cont = $db->num($result);

for($num=0; $num<$cont; $num++){
$arr = $db->fetch($result);
if($lang == $arr[1]) {
$iflang = "style=\"color: #af4800;\"";
}else {
$iflang  = "";
}
print ("<div class=\"menu2\"><div style=\"margin-top: -2px; float: left\"><a href=\"index.php?language=$arr[1]\" ".$iflang."><b>&#8594; $arr[2]</b></a></div>
</div>");

}


?>
