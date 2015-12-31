<?
if($SucInc=="yes"){

$lng=mysql::getLng();
	
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[submit_add])){
		$curId=mysql_result(mysql_query("SELECT MAX(`id`) FROM ".TABLE_GALLERY.""),0)+1;
		$imag='';
		
		if(isset($_FILES[imag]) && $_FILES[imag][size]>0){
			$ext=pathinfo($_FILES[imag][name],PATHINFO_EXTENSION);
			$tmp=$_FILES[imag][tmp_name];
			$imag=time().'.'.$ext;
			move_uploaded_file($tmp,'../files/media/big_'.$imag);	//big image
			jResize('../files/media/big_'.$imag,'../files/media/small_'.$imag,323,146); 	//small image
			
			mysql_query("INSERT INTO ".TABLE_GALLERY." (`imag`,`ordering`,`parent`,`title`)VALUES('{$imag}',{$curId},'".clear($_POST[parent],1)."','".clear($_POST[title])."')"); 
		}
		print "<script>alert('Thank! Successfully Added');location.href='?options=gallery'</script>";
	}
	
	if(isset($_GET[del])){
		$oldImg=mysql_result(mysql_query("SELECT `imag` FROM ".TABLE_GALLERY." WHERE `id`='{$_GET[del]}'"),0);
		@unlink('../files/media/big_'.$oldImg);
		@unlink('../files/media/small_'.$oldImg);
		mysql_query("DELETE FROM ".TABLE_GALLERY." WHERE `id`='{$_GET[del]}'");
		print "<script>alert('Thank! Successfully Deleted');location.href='?options=gallery'</script>";
	}
	
	$_q=$db->fetchWhile("SELECT `id`,`pagename` FROM `".TABLE_PAGES."` WHERE `type`='project' AND sub_id='40' AND `lang_id`='{$lang}' ORDER BY `ordering`");
	
	$_GET[parent]=abs((int)isset($_GET[parent])?$_GET[parent]:$_q[0]->id);
	$qSlider=mysql_query("SELECT `id`,`imag` FROM `".TABLE_GALLERY."` WHERE `parent`={$_GET[parent]} ORDER BY `ordering`");
	
	
?>
<form action='' align='center' method='post' class='jAddSlider' enctype='multipart/form-data'>
	<h2>Add Image to Gallery <s>(600x386)</s></h2>
	<select name="parent" style="margin-left:0">
		<?foreach($_q as $_q2){?>
			<option value="<?=$_q2->id?>"><?=$_q2->pagename?></option>
		<?}?>
	</select>
	<label>Title:</label>
	<input size='35' type='text' name='title'/>
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<input type='submit' class='submit' value='Add' name='submit_add'/>
</form>
<select name="parent" tabindex="<?=$_GET[parent]?>" style="float:left;margin-left:35px">
	<?foreach($_q as $_q2){?>
		<option value="<?=$_q2->id?>"><?=$_q2->pagename?></option>
	<?}?>
</select>
<ul class='table l' tabindex='gallery'>
<?while($rSlider=mysql_fetch_object($qSlider)){?>
	<li value='<?=$rSlider->id?>'>
		<span><img width="149" src='../files/media/small_<?=$rSlider->imag?>'/></span>
		<span><a href='?options=gallery&del=<?=$rSlider->id?>'><img width='34' src='img/del.png'/></a></span>
	</li>
<?}?>
</ul>


<?}?>