<?if($SucInc=="yes") 
{
	require_once($FOLDER->includes."head.php");
?>
	<div class="jcontent">
		<h3 class="title"><?jContent($id,'pagename')?></h3>
		<span><?=probel(mb_substr(strip_tags(content($id,'content')),0,154,'UTF-8')).'...'?></span>
		<a href="#cnt"><?=$lang_news[$lang]?>...</a>
		<div id="cnt"><?jContent($id,'content')?></div>
	</div>
<?	
	require_once($FOLDER->includes."slider.php");
	require_once($FOLDER->includes."footer.php");
}?>