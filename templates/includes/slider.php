<?for($i=0;$i<4;$i++):?>
	<div class="slider_move"></div>
<?endfor;$r=mysql_query("SELECT * FROM ".TABLE_SLIDER." WHERE text='{$id}' ORDER by title,ordering");?>
<?while($r1=mysql_fetch_object($r)):?>
	<a href="/files/image/<?=$r1->img?>" class="hid" accesskey="<?=$r1->title?>"  rel="photo"><img src="/files/image/<?=$r1->img?>"/></a>
<?endwhile?>
