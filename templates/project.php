<?if($SucInc=="yes") 
{	
	require_once($FOLDER->includes."head.php");
?>
	<div class="jcontent">
		<?project_build($id)?>
	</div>
<?	
	require_once($FOLDER->includes."slider.php");
	require_once($FOLDER->includes."footer.php");
}?>