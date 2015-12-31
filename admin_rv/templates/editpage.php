<?
if($SucInc=="yes"){
include ("lib/editpage.php");
$Row[link]=explode('##',$Row[link]);
?>
<div class='title'>Edit Page </div>	
<form action="index.php?options=editpage" method="post" enctype="multipart/form-data">
<table cellpadding="2" cellspacing="2" border="0" class="txt1" style="width: 100%;">
<tr><td><b>pagename</td><td><input type='text' name='pagename' value="<?=$Row[pagename]?>" class="input"></td></tr>
	<tr>
<td><b>Type</b></td>
<td>
	<select name="type" class='input'>
		<option value="content" <?if($Row['type']=="content"){print "selected";}?>>html</option>
		<option value="news" <?if($Row['type']=="news"){print "selected";}?>>news</option>
		<option value="project" <?if($Row['type']=="project"){print "selected";}?> >project</option>
		<option value="link" <?if($Row['type']=="link"){print "selected";}?> >link</option>
		<option value="photo" <?if($Row['type']=="photo"){print "selected";}?> >photo</option>
		<option value="video" <?if($Row['type']=="video"){print "selected";}?> >video</option>
	</select>
</td>
</tr>
<?
if($Row['type']=="news") {
?>
<tr><td>.</td>
<td></td></tr>
<?}else if($Row['type']=="link") {?>
	<tr>
		<td><b>Target:</b></td>
		<td>
			<select name="p">
				<option value="self">Self</option>
				<option value="blank">Blank</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><b>Link</b></td>
		<td>http://<input type="text" name="link"  value="<?=$Row[link][0]?>" class="input"></td>
	</tr>
<?}else{?>
	<tr>
		<td><b>Content</b></td><td><textarea class="jeditor" name="content"><?=$Row[content]?></textarea></td>
	</tr>
<?}?>
<tr><td><input type="hidden" name="add" value="yes" ><input type="hidden" name="uid" value="<?=$id?>"></td><td align="center"><input type="submit" class="button" name="submit" value="add"></td></tr>
</table>	
</form>
<?
}?>