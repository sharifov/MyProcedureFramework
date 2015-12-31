<?
if($SucInc=="yes"){
include ("lib/addpage.php");

?>

<div class='title'>Add New Page</div>	
<form action="index.php?options=addpage&actions=<?=$actions?>" method="POST">
<table cellpadding="2" cellspacing="2" border="1" class="txt1">
<tr><td><b>For Sub Page</td><td>
<?include ("templates/position.php");?>

</td></tr>
<tr><td><b>New page</td><td>
	
<table cellpadding="2" cellspacing="0" border="0" class="txt1">
<?
print for_lang("<tr><td>pagename({value})</td><td><input type='text' name='pagename_{value}' class='input'></td></tr>");
?>
</table>

</td></tr>
<tr>
<td><b>Type</b></td>
<td>
<select name="type" class='input'>
<option value="content" selected>html</option>
<option value="action" >action</option>
<option value="news">news</option>
<option value="project">project</option>
<option value="link">link</option>
<option value="photo">photo</option>
<option value="video">video</option>

</select>
</td>
</tr>	
<tr>
<td><b>Visibility</b></td>
<td>
<select name="visibility"  class='input'>
<option value="visible" selected>visible</option>
<option value="hidden">hidden</option>
</select>
</td>
</tr>
<?/*
<tr>
	<td><b>Brand</b></td>
	<td>
		<select name="brand_id"  class='input'>
		<option value="0" selected>No brand</option>
		<?
		$Sql1 = $db->query("Select * From brends");
		
		while ($Row1 = $db->fetchArray($Sql1)) {?>
		<option value="<?=$Row1[id]?>"><?=$Row1[name]?></option>
		<?}?>
		</select>
	</td>
</tr>
*/?>
<tr><td><input type="hidden" name="add" value="yes"></td><td><input type="submit" name="submit" value="add" class='button'></td></tr>
</table>	
</form>
<?
	
include("templates/index.php");
	
	
	
	}?>