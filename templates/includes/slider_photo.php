<a href=""></a><a href=""></a>
<div class="slider_photo">
	<?$f=0;$r=mysql_query("SELECT * FROM ".TABLE_SLIDER." ORDER by title,ordering");while($r1=mysql_fetch_object($r)):?>
		<?if($f%4==0 || $f==0):?><p><?endif?>
		<a href="/files/image/<?=$r1->img?>" rel="photo"><img src="/files/image/<?=$r1->img?>"/></a>
	<?$f++;endwhile?>
</div>