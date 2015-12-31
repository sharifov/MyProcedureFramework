<?
if($SucInc=="yes"){
include ("lib/addnews.php");


?>

<div class='title'>Add News </div>
<form enctype="multipart/form-data" action="index.php?options=addnews" method="POST">
<table cellpadding="2" cellspacing="2" border="1" class="txt1" style="width: 100%;">
<tr><td><b>For Sub Page</td><td>
<select name="page_id" class="txt1">
<?

$Sql1 = $db->query("Select * From ".TABLE_PAGES." Where  lang_id='$lang' AND type='news'  ORDER BY ordering");
$Num1 = $db->num($Sql1);

while ($Row1 = $db->fetchArray($Sql1)) {

print "<option value=\"$Row1[id]\">$Row1[pagename]</option>\n";

}?>	
</select>

</td></tr>
<tr><td><b>News title</td><td>
<input type="text" name="title" class="input">	


</td></tr>
<tr>
<td><b>Desc</b></td>
<td>
<textarea name="sh_desc"></textarea>
</td>
</tr>
<tr><td><b>Image</td><td>
<input type="checkbox" name="imgs" value="yes">
<input type="file" name="image" class="input"> (134x93)
</td></tr>
<tr><td><b>Text</td><td>
<textarea class="jeditor" name="content"><?=$Row[content]?></textarea>
</td></tr>		
<tr>
<td><b>Date</b></td>
<td>
<?php

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

	if (date('m') == $j) print "<option value=\"$j\" selected>$j</option>\n";
	else print "<option value=\"$j\">$j</option>\n";
}

print "</select>\n";
print "Day: ";
print "<select name=\"day\" class=\"CPin\">\n";

for ($i=1;$i<=31;$i++) {
	if ( strlen($i) == 1) $j = '0'.$i;
	else $j=$i;

	if (date('d') == $j) print "<option value=\"$j\" selected>$j</option>\n";
	else print "<option value=\"$j\">$j</option>\n";
}

print "</select>\n";


?></td>
</tr>
<tr><td><input type="hidden" name="add" value="yes"></td><td><input type="submit" name="submit" value="add"></td></tr>
</table>	
</form>
<?
	}?>