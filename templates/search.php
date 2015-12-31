<?
if($SucInc=="yes") 
{
	Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	Header("Cache-Control: no-cache, must-revalidate");
	Header("Pragma: no-cache"); 
	Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT");

	require_once($FOLDER->includes."head.php");
?>
	</div>
	<div id="wrapper">
		<div class="left w">
			<h3><?=$lang_search_title[$lang]?></h3>
			<span><?require_once($FOLDER->includes."search.php");?></span>
		</div>
<?
	require_once($FOLDER->includes."footer.php");
}?>



