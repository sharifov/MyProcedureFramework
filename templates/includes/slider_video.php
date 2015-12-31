<a href=""></a><a href=""></a>
<div class="slider_photo">
	<?$f=0;$r=explode('watch?v=',strip_tags(content($id,'content')));array_shift($r);foreach($r as $r1){$r1=substr($r1,0,11)?>
		<?if($f%4==0 || $f==0):?><p><?endif?>
		<span>
			<img src="http://img.youtube.com/vi/<?=$r1?>/0.jpg"/>
			<a href="#vm<?=$f?>"></a>
			<ins class="hid" id="vm<?=$f?>" accesskey="<?=$r1?>"></ins>
		</span>
	<?$f++;}?>
</div>