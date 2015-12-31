<?
if($SucInc=="yes"){
include ("lib/news.php");
?>

<div class='title'>News </div>
<div class='add'><a href="?options=addnews">Add News</a></div>	
<br>
<form action="index.php?options=news" method="POST">
<select name="page_id" class="txt1" onchange="this.form.submit();">
<?
$Sql1 = $db->query("Select * From ".TABLE_PAGES." Where lang_id='$lang' AND type='news'  ORDER BY ordering");


while ($Row1 = $db->fetchArray($Sql1)) {
if(!isset($_POST['page_id'])) {
$_POST['page_id'] = $Row1[id];
}	
	
if($_POST['page_id'] == $Row1[id]) {
print "<option value=\"$Row1[id]\" selected>$Row1[pagename]</option>\n";
}else {
print "<option value=\"$Row1[id]\">$Row1[pagename]</option>\n";
}

}

?>	
</select>	
		
<?php

print "Year: ";
print "<select name=\"year\" class=\"CPin\" onchange=\"this.form.submit();\"><option value=\"\" selected>Select Year</option>";

for ($i=2006;$i<2015;$i++) {

	if ($_POST['year'] == $i) print "<option value=\"$i\" selected>$i</option>\n";
	else print "<option value=\"$i\">$i</option>\n";	

}
print "</select>\n";
print "Month: ";
print "<select name=\"month\" class=\"CPin\" onchange=\"this.form.submit();\"><option value=\"\" selected>Select Month</option>";

for ($i=1;$i<13;$i++) {
	if ($_POST['month'] == $i) {print "<option value=\"$i\" selected>$i</option>\n";}
	else {print "<option value=\"$i\">$i</option>\n";}
}
print "</select>";
?>	
</form>
<?
$_dt=null;
if(isset($_POST[year]) && !empty($_POST[year])){
	$_dt.="AND YEAR(created)='{$_POST[year]}' ";
}
if(isset($_POST[month]) && !empty($_POST[month])){
	$_dt.="AND MONTH(created)='{$_POST[month]}'";
}

$sql = $db->query("SELECT * FROM ".TABLE_NEWS." Where page_id='$_POST[page_id]' AND lang_id='$lang' {$_dt} ORDER BY created DESC");
$mouse = "onmouseover=\"style.backgroundColor='gray';\" onmouseout=\"style.backgroundColor='#fbfafa';\" style=\"height: 15px; background: #fbfafa\" ";

print '<table cellpadding="1" cellspacing="1" border="0" style="width: 100%; border: 1px solid black;" class="txt1">';
while($Row = $db->fetch($sql)) {
print "<tr $mouse><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Row['title']."</td><td width='70' align='center'>".$Row['created']."</td><td width='70' align='center'><a href=\"?options=editnews&action=edit&id=".$Row['news_id']."\">edit</a></td><td width='70' align='center'><a href=\"?options=editnews&action=delete&id=".$Row['news_id']."\" onclick=\"return confirm('delete ?')\">delete</a></td></tr>";

}

print "</table>";


	}?>