<?
if($SucInc=="yes"){
include ("lib/editnews.php");
?>
<div class='title'>Edit News </div>	
<form enctype="multipart/form-data"  action="index.php?options=editnews" method="POST">
<table cellpadding="2" cellspacing="2" border="0" class="txt1" style="width: 100%;">
<tr><td><b>News Name</td><td><input type='text' name='title' value="<?=$Row[title]?>" class="input"></td></tr>
<tr>
<td><b>Desc</b></td>
<td>
<textarea name="sh_desc" class="textarea"><?=$Row[sh_desc]?></textarea>
</td>
</tr>
<tr><td><b>Image</td><td>
<input type="checkbox" name="imgs" value="yes">
<input type="file" name="image" class="input"> (134x93)
</td></tr>
<tr><td><b>Content</td><td style="width: 100%;"><textarea name="content" class="jeditor"><?=$Row[content]?></textarea></td></tr>
<tr>
<td><b>Date</b></td>
<td>
<?php
$tarix = explode("-", $Row['created']);

print "Year: ";
print "<select name=\"year\" class=\"CPin\">\n";

for ($i=2006;$i<2015;$i++) {
	if (date('Y') == $i) print "<option value=\"$i\" selected>$i</option>\n";
	else print "<option value=\"$i\">$i</option>\n";
}

print "</select>\n";
print "Month: ";
print "<select name=\"month\" class=\"CPin\">\n";

for ($i=1;$i<13;$i++) {
	if ( strlen($i) == 1) $j = '0'.$i;
	else $j=$i;

	if ($tarix[1] == $j) print "<option value=\"$j\" selected>$j</option>\n";
	else print "<option value=\"$j\">$j</option>\n";
}

print "</select>\n";
print "Day: ";
print "<select name=\"day\" class=\"CPin\">\n";

for ($i=1;$i<=31;$i++) {
	if ( strlen($i) == 1) $j = '0'.$i;
	else $j=$i;

	if ($tarix[2] == $j) print "<option value=\"$j\" selected>$j</option>\n";
	else print "<option value=\"$j\">$j</option>\n";
}

print "</select>\n";


?></td>
</tr>

<tr><td><input type="hidden" name="add" value="yes" ><input type="hidden" name="uid" value="<?=$id?>"></td><td align="center"><input type="submit" class="button" name="submit" value="add"></td></tr>
</table>	
</form>
<?
}?>