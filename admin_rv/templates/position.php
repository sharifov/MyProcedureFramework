
<select name="subid"   class='input'>
<option value="0">Root</option>	
<?
$actions = $_GET[actions];
$Sql1 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='0' AND lang_id='$lang'  ORDER BY ordering");
$Num1 = $db->num($Sql1);
$n1 = 0;
while ($n1<$Num1) {
$Row1 = $db->fetchArray($Sql1);
print "<option value=\"$Row1[id]\">&nbsp;&nbsp;".($n1+1)."&nbsp;&nbsp;<a href=\"?id=".$Row1['id']."\">$Row1[pagename]</a></option>\n";
$id1 = $Row1['id'];
$Sql2 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='$id1' AND lang_id='$lang'  ORDER BY ordering");
$Num2 = $db->num($Sql2);
if($Num2>0) {
$n2 = 0;
while ($Row2 = $db->fetchArray($Sql2)) {

print "<option value=\"$Row2[id]\">&nbsp;&nbsp;".($n1+1).".".($n2+1)."&nbsp;&nbsp;<a href=\"?id=".$Row2['id']."\">$Row2[pagename]</a></option>\n";
$id2 = $Row2['id'];
$Sql3 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='$id2' AND lang_id='$lang' ORDER BY ordering");
$Num3 = $db->num($Sql3);
if($Num3>0) {
$n3 = 0;
while ($Row3 = $db->fetchArray($Sql3)) {
print "<option value=\"$Row3[id]\">&nbsp;&nbsp;".($n1+1).".".($n2+1).".".($n3+1)."&nbsp;&nbsp;<a href=\"?id=".$Row3['id']."\">$Row3[pagename]</a></option>\n";
$id3 = $Row3['id'];
$Sql4 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='$id3' AND lang_id='$lang' ORDER BY ordering");
$Num4 = $db->num($Sql4);
if($Num4>0) {
$n4 = 0;
while ($Row4 = $db->fetchArray($Sql4)) {
print "<option value=\"$Row4[id]\">&nbsp;&nbsp;".($n1+1).".".($n2+1).".".($n3+1).".".($n4+1)."&nbsp;&nbsp;<a href=\"?id=".$Row4['id']."\">$Row4[pagename]</a></option>\n";
$id4 = $Row4['id'];
$Sql5 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='$id4' AND lang_id='$lang' ORDER BY ordering");
$Num5 = $db->num($Sql5);
if($Num5>0) {
$n5 = 1;
while ($Row5 = $db->fetchArray($Sql5)) {
print "<option value=\"$Row5[id]\">&nbsp;&nbsp;".($n1+1).".".($n2+1).".".($n3+1).".".($n4+1).".".($n5+1)."&nbsp;&nbsp;<a href=\"?id=".$Row5['id']."\">$Row5[pagename]</a></option>\n";
$id5 = $Row5['id'];
$Sql6 = $db->query("Select * From ".TABLE_PAGES." Where sub_id='$id5' AND lang_id='$lang' ORDER BY ordering");
$Num6 = $db->num($Sql6);
if($Num6>0) {
$n6 = 0;
while ($Row6 = $db->fetchArray($Sql6)) {
print "<option value=\"$Row6[id]\">&nbsp;&nbsp;".($n1+1).".".($n2+1).".".($n3+1).".".($n4+1).".".($n5+1).".".($n6+1)."<a href=\"?id=".$Row6['id']."\">$Row6[pagename]</a></option>\n";
$n6++;
}
}
$n5++;
}
}
$n4++;
}
}
$n3++;
}
}
$n2++;
}
}
$n1++;
}?>	
</select>