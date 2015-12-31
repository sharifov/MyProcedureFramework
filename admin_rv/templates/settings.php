<?
if($SucInc=="yes"){
include ("lib/settings.php");
$result2 = $db->query("Select * From ".TABLE_SETTINGS."");
$arr2 = $db->fetch($result2);
?>
<div class="title">Settings</span><br><br>
<form action="index.php?options=settings" method="POST">
<table cellpadding="2" cellspacing="2" border="1" class="txt1">
<tr>
<td><b>Title</td>
<td>
<input type="text" name="title" class="input" value="<?=$arr2[0]?>">
</td>	
</tr>
<tr><td><b>Default Language</td><td>
<select name="default_lang">
<?

$result = $db->query("Select * From ".TABLE_LANGUAGES."");
$cont = $db->num($result);

for($num=0; $num<$cont; $num++){
$arr = $db->fetch($result);
if($arr2[2] == $arr[1]) {
print ("<option value=\"$arr[1]\" selected>$arr[2]</option>");
}else {
print ("<option value=\"$arr[1]\">$arr[2]</option>");
}
}
?>
</select>
</td></tr>
<tr>
<td><b>Home Page ID</td>
<td>
<input type="text" name="home_page_id" class="input"  value="<?=$arr2[1]?>">
</td>	
</tr>
<tr>
<td><b>Description</td>
<td>
<textarea name="descr" rows="2" cols="28"><?=$arr2[3]?></textarea>
</td>	
</tr><tr>
<td><b>Keywords</td>
<td>
<textarea name="keyw" rows="2" cols="28"><?=$arr2[4]?></textarea>
</td>	
</tr>
<tr>
<td><b>Mail</td>
<td>
<input type="text" name="main_mail" class="input"  value="<?=$arr2[5]?>">
</td>	
</tr>
<tr>
<td><b>Slider Timer(san.)</td>
<td>
<input type="text" name="tmr" class="input"  value="<?=$arr2[6]?>">
</td>	
</tr>
<tr>
<td></td>
<td><input type="hidden" name="add" value="yes">
<input type="submit"  class="button" value="Update">
</td>	
</tr>
</table>
<?}?>