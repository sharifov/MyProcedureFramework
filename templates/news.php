<?if($SucInc=="yes") 
{	
	require_once($FOLDER->includes."head.php");
	require_once($FOLDER->includes."slider.php");
?>
	<h3 class="title"><?jContent($id,'pagename')?></h3>
	<div class="content"><?=isset($news_id) && $news_id != ""?jOne($id,$news_id,'news'):jList($id,'news',6);?></div>
<?	
	require_once($FOLDER->includes."links.php");
	require_once($FOLDER->includes."map.php");
	require_once($FOLDER->includes."footer.php");
}?>

