<?
	$lng=mysql::getLng();
	$jEditing=false;
	
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[submit_add])){
		$curId=mysql_result(mysql_query("SELECT MAX(`id`) FROM ".TABLE_SIM.""),0)+1;
		$imag='';
		
		if(isset($_FILES[imag]) && $_FILES[imag][size]>0){
			$ext=pathinfo($_FILES[imag][name],PATHINFO_EXTENSION);
			$tmp=$_FILES[imag][tmp_name];
			$imag=time().'.'.$ext;
			$path="{$_SERVER[DOCUMENT_ROOT]}/files/image/{$imag}";
			jResize($tmp,$path,224,105);
			//move_uploaded_file($tmp,$path);
		}
		
		$_POST[link]=mysql_real_escape_string(strip_tags($_POST[link]));
		
		for($z=0;$z<count($lng);$z++)
		{
		
			$_POST[title_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[title_.$lng[$z]]));
		
			 mysql_query("INSERT INTO ".TABLE_SIM." (`id`,`title`,`img`,`lang`,`link`,`ordering`)VALUES(
							'{$curId}',
							'{$_POST[title_.$lng[$z]]}', 
							'{$imag}',
							'{$lng[$z]}',
							'{$_POST[link]}',
							'{$curId}'
			)"); 
		}
				
		print "<script>alert('Thank! Successfully Added');location.href='?options=sim'</script>";
	}
	
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[submit_edit])){
	
		$imag=mysql_result(mysql_query("SELECT `img` FROM ".TABLE_SIM." WHERE `id`='{$_POST[curid]}'"),0);
	
		if(isset($_FILES[imag]) && $_FILES[imag][size]>0){
			@unlink('../files/image/'.$imag);
			$ext=pathinfo($_FILES[imag][name],PATHINFO_EXTENSION);
			$tmp=$_FILES[imag][tmp_name];
			$imag=time().'.'.$ext;
			$path="{$_SERVER[DOCUMENT_ROOT]}/files/image/{$imag}";
			jResize($tmp,$path,224,105);
			//move_uploaded_file($tmp,$path);
		}
		
		$_POST[link]=mysql_real_escape_string(strip_tags($_POST[link]));
		
		for($z=0;$z<count($lng);$z++){
		
			$_POST[title_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[title_.$lng[$z]]));

			mysql_query("UPDATE ".TABLE_SIM." SET 
							`title`='{$_POST[title_.$lng[$z]]}',
							`img`='{$imag}',
							`link`='{$_POST[link]}'
						WHERE `id`='{$_GET[edit]}' AND `lang`='{$lng[$z]}'
					");
		}
		print "<script>alert('Thank! Successfully Edited');location.href='?options=sim'</script>";
	}
	
	
	if(isset($_GET[edit])){
		$jEditing=true;
		$qEdit=mysql_query("SELECT * FROM ".TABLE_SIM." WHERE `id`='{$_GET[edit]}'");
		while($rows=mysql_fetch_object($qEdit)){
			$rEdit[$rows->lang]=$rows;
		}
	}
	
	if(isset($_GET[del])){
		$oldImg=mysql_result(mysql_query("SELECT `img` FROM ".TABLE_SIM." WHERE `id`='{$_GET[del]}'"),0);
		@unlink('../files/image/'.$oldImg);
		mysql_query("DELETE FROM ".TABLE_SIM." WHERE `id`='{$_GET[del]}'");
		print "<script>alert('Thank! Successfully Deleted');location.href='?options=sim'</script>";
	}
	
	$qSlider=mysql_query("SELECT `id`,`img` FROM ".TABLE_SIM." WHERE `lang`='{$lang}' ORDER BY `ordering`");
	
?>
<form action='' align='center' method='post' class='jAddSlider' enctype='multipart/form-data'>
<?if(!$jEditing){?>
	<h2>Add New Slider</h2>
	
 	<label>Title:</label>
	<input type='text' tabindex='title' name='title_az'/><img tabindex='title' src='img/az.png'/>
	<input type='text' tabindex='title' name='title_ru'/><img tabindex='title' style='right:30px' src='img/ru.png'/>
	<input type='text' tabindex='title' name='title_en'/><img tabindex='title' style='right:0' src='img/en.png'/>
	
	<label>Link:</label>
	<input size='35' type='text' name='link'/>
	
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<input type='submit' class='submit' value='Add' name='submit_add'/>
<?}else{?>
	<h2>Edit Slider</h2><a class='adding' href='?options=sim'>Add Slider</a>
	
	<label for='title'>Title:</label>
	<input type='text' name='title_az' tabindex='title' value='<?=$rEdit[az]->title?>'/><img tabindex='title' src='img/az.png'/>
	<input type='text' name='title_ru' tabindex='title' value='<?=$rEdit[ru]->title?>'/><img tabindex='title' style='right:30px' src='img/ru.png'/>
	<input type='text' name='title_en' tabindex='title' value='<?=$rEdit[en]->title?>'/><img tabindex='title' style='right:0' src='img/en.png'/>
	
	<label>Link:</label>
	<input size='35' type='text' name='link' value="<?=$rEdit[az]->link?>"/>
	
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<input type='hidden' value='<?=$_GET[edit]?>' name='curid'/>
	<input type='submit' class='submit' value='Update' name='submit_edit'/>
<?}?>
</form>

<ul class='table' tabindex='sim'>
<?while($rSlider=mysql_fetch_object($qSlider)){?>
	<li value='<?=$rSlider->id?>'>
		<span><img src='../files/image/<?=$rSlider->img?>'/></span>
		<span><a href='?options=sim&edit=<?=$rSlider->id?>'><img width='34' src='img/edit.png'/></a></span>
		<span><a href='?options=sim&del=<?=$rSlider->id?>'><img width='34' src='img/del.png'/></a></span>
	</li>
<?}?>
</ul>
<b></b>
