<?
if($SucInc=="yes"){
include ("lib/users.php");
$mouse = "onmouseover=\"style.backgroundColor='gray';\" onmouseout=\"style.backgroundColor='#C7C7C7';\" style=\"height: 15px; background: #C7C7C7\" ";

?>
<div class='title'>USERS</div>	
<div class='add'><a href="?options=users&action=addnew">Add New User</a></div>
<?
if($_GET['action']=="error") {
print "<div style='font: bold 12px Arial; color: red; width: 100%; background: gray; padding: 5px;'>! ".$_SESSION['error_admin']."</div><br>";
}	
?>	
<?if($_GET[action]=="addnew"){?>
<form action="?options=users&action=addnew" method="post">
<table cellpadding="2" cellspacing="2" border="0" class="txt1">
<tr><td><b>UserName:</td><td><input type="text" name="username" class="input"></td></tr>
<tr><td><b>Pass:</td><td><input type="text" name="pass" class="input"></td></tr>
<tr><td><input type="hidden" value="yes" name="add"></td><td><input type="submit" value="add new" class="button"></td></tr>
</table>
</form>

<?}if($_GET[actiont]=="edit"){
$Sql1 = $db->query("SELECT * FROM ".TABLE_ADMINKA." where id='$id'");
$Row1 = $db->fetch($Sql1);
?>
<form action="?options=users&action=edit" method="post">
<table cellpadding="2" cellspacing="2" border="0" class="txt1">
<tr><td><b>Pass:</td><td><input type="text" name="pass" class="input"></td></tr>
<tr><td><input type="hidden" value="<?=$id?>" name="uid"><input type="hidden" value="passw" name="ok"></td><td><input type="submit" value="change" class="button"></td></tr>
</table>
</form>	
<?}else{	

$Sql = $db->query("SELECT * FROM ".TABLE_ADMINKA."");
$Num  = $db->num($Sql);
print '<table cellpadding="2" cellspacing="2" border="0" class="txt1" style="width: 600px;">';
print '<tr style="background: #9A9A9A;"><td style="width: 60%;">Username</td><td style="width: 20%;">Edit</td><td style="width: 20%;">Delete</td></tr>';
while($Row = $db->fetch($Sql)) {
print <<<HTML
<tr $mouse ><td>$Row[username]</td><td><a href="?options=users&id=$Row[id]&actiont=edit">edit</a></td><td><a href="?options=users&id=$Row[id]&action=delete" onclick="return confirm('Bu productu silek :) ?')">delete</a></td></tr>
HTML;

}

print '</table>';
}

	}?>