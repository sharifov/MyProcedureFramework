<?
if($SucInc=="yes"){
$mouse = "onmouseover=\"style.backgroundColor='gray';\" onmouseout=\"style.backgroundColor='#C7C7C7';\" style=\"height: 15px; background: #C7C7C7\" ";
?>
<div class='title'>Logs</div>	
<form action="index.php?options=logs" method="POST">
	
		
<?php

print "Year: ";
print "<select name=\"year\" class=\"txt1\">\n";

for ($i=2008;$i<2015;$i++) {
	if($_POST['year']){
	if ($_POST['year'] == $i) print "<option value=\"$i\" selected>$i</option>\n";
	else print "<option value=\"$i\">$i</option>\n";	
	}else {
	if (date('Y') == $i) print "<option value=\"$i\" selected>$i</option>\n";
	else print "<option value=\"$i\">$i</option>\n";
	}
}

print "</select>\n";
print "Month: ";
print "<select name=\"month\" class=\"txt1\" onchange=\"this.form.submit();\">\n";

for ($i=1;$i<13;$i++) {
	if ( strlen($i) == 1) $j = '0'.$i;
	else $j=$i;

if($_POST['month']){if ($_POST['month'] == $i) {print "<option value=\"$j\" selected>$j</option>\n";}
else {print "<option value=\"$j\">$j</option>\n";}}
else {if (date('m') == $j) {print "<option value=\"$j\" selected>$j</option>\n";}
else {print "<option value=\"$j\">$j</option>\n";}}


}
print "</select>\n";

print "Day: ";
print "<select name=\"day\" class=\"txt1\" onchange=\"this.form.submit();\">\n";

for ($i=1;$i<31;$i++) {
	if ( strlen($i) == 1) $j = '0'.$i;
	else $j=$i;

if($_POST['day']){if ($_POST['day'] == $i) {print "<option value=\"$j\" selected>$j</option>\n";}
else {print "<option value=\"$j\">$j</option>\n";}}
else {if (date('d') == $j) {print "<option value=\"$j\" selected>$j</option>\n";}
else {print "<option value=\"$j\">$j</option>\n";}}


}
print "</select>\n";

?>	
</form>
<?
if ($_POST['year'] == '') {
$year = date('Y');
}else {
$year = $_POST['year'];
}

if ($_POST['month'] == ''){
$month = date('m');
} else {
$month = $_POST['month'];
}
if ($_POST['day'] == ''){
$day = date('d');
} else {
$day = $_POST['day'];
}



$Sql = $db->query("SELECT * FROM ".TABLE_LOGS." Where  date like '$year-$month-$day' ORDER BY date");
$Num  = $db->num($Sql);
print "<span style='font: 14px Arial;'>Counter Today: <b>".$Num."</b><br><br>";
print '<table cellpadding="2" cellspacing="2" border="0" class="txt1" style="width: 600px;">';
print '<tr style="background: #9A9A9A;"><td style="width: 60%;">Ip address</td><td style="width: 20%;">Date</td><td style="width: 20%;">Time</td></tr>';
while($Row = $db->fetch($Sql)) {
print <<<HTML
<tr $mouse ><td>$Row[ip]</td><td>$Row[date] </td><td> $Row[time]</td></tr>
HTML;

}

print '</table>';


	}?>