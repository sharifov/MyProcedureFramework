<?
	$lng=mysql::getLng();
	$jEditing=false;
	
	$_GET[title]=abs((int)isset($_GET[title])?$_GET[title]:1);
	$qPages=$db->fetchWhile("SELECT `id`,`pagename` FROM ".TABLE_PAGES." WHERE `lang_id`='{$lang}' AND visibility='visible' ORDER BY `sub_id`");
	$_GET[prnt]=abs((int)isset($_GET[prnt])?$_GET[prnt]:$qPages[0]->id);
	
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[submit_add])){
		$curId=mysql_result(mysql_query("SELECT MAX(`id`) FROM ".TABLE_SLIDER.""),0)+1;
		$imag='';
		
		if(isset($_FILES[imag]) && $_FILES[imag][size]>0){
			$ext=pathinfo($_FILES[imag][name],PATHINFO_EXTENSION);
			$tmp=$_FILES[imag][tmp_name];
			$imag=time().'.'.$ext;
			$path="{$_SERVER[DOCUMENT_ROOT]}/files/image/{$imag}";
			jResize($tmp,$path,500,240);
			//move_uploaded_file($tmp,$path);
		}
		
			$_POST[title]=abs((int)$_POST[title]);
			$_POST[prnt]=abs((int)$_POST[prnt]);
			//$_POST[title_.$lng[$z]]=mysql_real_escape_string($_POST[title_.$lng[$z]]);
			//$_POST[link_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[link_.$lng[$z]]));
			//$_POST[text_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[text_.$lng[$z]]));

			 mysql_query("INSERT INTO ".TABLE_SLIDER." (`id`,`title`,`link`,`img`,`text`,`lang`,`ordering`)VALUES(
							'{$curId}',
							'{$_POST[title]}', 
							'{$_POST[link]}',
							'{$imag}',
							'{$_POST[prnt]}',
							'{$lang}',
							'{$curId}'
			)"); 
		print "<script>alert('Thank! Successfully Added');location.href='?options=slider&title={$_GET[title]}&prnt={$_GET[prnt]}'</script>";
	}
	
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[submit_edit])){
		$_GET[edit]=abs((int)$_GET[edit]);
		$imag=mysql_result(mysql_query("SELECT `img` FROM ".TABLE_SLIDER." WHERE `id`='{$_GET[edit]}'"),0);
	
		if(isset($_FILES[imag]) && $_FILES[imag][size]>0){
			@unlink('../files/image/'.$imag);
			$ext=pathinfo($_FILES[imag][name],PATHINFO_EXTENSION);
			$tmp=$_FILES[imag][tmp_name];
			$imag=time().'.'.$ext;
			$path="{$_SERVER[DOCUMENT_ROOT]}/files/image/{$imag}";
			jResize($tmp,$path,500,240);
			//move_uploaded_file($tmp,$path);
		}
		
		
			$_POST[title]=abs((int)$_POST[title]);
			$_POST[prnt]=abs((int)$_POST[prnt]);
			//$_POST[title_.$lng[$z]]=mysql_real_escape_string($_POST[title_.$lng[$z]]);
			//$_POST[link_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[link_.$lng[$z]]));
			//$_POST[text_.$lng[$z]]=mysql_real_escape_string(strip_tags($_POST[text_.$lng[$z]]));

			mysql_query("UPDATE ".TABLE_SLIDER." SET 
							`title`='{$_POST[title]}',
							`link`='{$_POST[link]}',
							`img`='{$imag}',
							`text`='{$_POST[prnt]}'
						WHERE `id`='{$_GET[edit]}' AND `lang`='{$lang}'
					");
		print "<script>alert('Thank! Successfully Edited');location.href='?options=slider&title={$_GET[title]}&prnt={$_GET[prnt]}'</script>";
	}
	
	
	if(isset($_GET[edit])){
		$jEditing=true;
		$qEdit=mysql_query("SELECT * FROM ".TABLE_SLIDER." WHERE `id`='{$_GET[edit]}'");
		while($rows=mysql_fetch_object($qEdit)){
			$rEdit[$rows->lang]=$rows;
		}
	}
	
	if(isset($_GET[del])){
		$_GET[del]=abs((int)$_GET[del]);
		$oldImg=mysql_result(mysql_query("SELECT `img` FROM ".TABLE_SLIDER." WHERE `id`='{$_GET[del]}'"),0);
		@unlink('../files/image/'.$oldImg);
		mysql_query("DELETE FROM ".TABLE_SLIDER." WHERE `id`='{$_GET[del]}'");
		print "<script>alert('Thank! Successfully Deleted');location.href='?options=slider&title={$_GET[title]}&prnt={$_GET[prnt]}'</script>";
	}
	
	$qSlider=mysql_query("SELECT `id`,`img` FROM ".TABLE_SLIDER." WHERE `lang`='{$lang}' AND title='{$_GET[title]}' AND text='{$_GET[prnt]}' ORDER BY `ordering`");
	
?>
<form action='' align='center' method='post' class='jAddSlider' enctype='multipart/form-data'>
<?if(!$jEditing){?>
	<h2>Add New Slider</h2>
	<select name="prnt" style="margin-left:0" tabindex="<?=$_GET[prnt]?>">
		<?foreach($qPages as $_q):?>
			<option value="<?=$_q->id?>"><?=$_q->pagename?></option>
		<?endforeach?>
	</select><br/>
	<select name="title" style="margin-left:0;clear:both" tabindex="<?=$_GET[title]?>">
		<option value="1">Blok 1</option>
		<option value="2">Blok 2</option>
		<option value="3">Blok 3</option>
		<option value="4">Blok 4</option>
	</select>
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<!--<label>Title:</label>
	<input type='text' tabindex='title' name='title_az'/><img tabindex='title' src='img/az.png'/>
	<input type='text' tabindex='title' name='title_ru'/><img tabindex='title' style='right:30px' src='img/ru.png'/>
	<input type='text' tabindex='title' name='title_en'/><img tabindex='title' style='right:30px' src='img/en.png'/>
	
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<label>Text:</label>
	<textarea tabindex='text' name="text_az"></textarea><img tabindex='text' style="top:187px;" src='img/az.png'/>
	<input type='text' name='link_ru' tabindex='link' value='http://'/><img tabindex='link' style='top:114px;right:30px' src='img/ru.png'/>
	<textarea tabindex='text' name="text_en"></textarea><img tabindex='text' style='top:187px;right:30px' src='img/en.png'/>-->
	<input type='submit' class='submit' value='Add' name='submit_add'/>
<?}else{?>
	<h2>Edit Slider</h2><a class='adding' href='?options=slider'>Add Slider</a>
	<select name="prnt" style="margin-left:0" tabindex="<?=$_GET[prnt]?>">
		<?foreach($qPages as $_q):?>
			<option value="<?=$_q->id?>"><?=$_q->pagename?></option>
		<?endforeach?>
	</select>
	<select name="title" style="margin-left:0;clear:both" tabindex="<?=$_GET[title]?>">
		<option value="1">Blok 1</option>
		<option value="2">Blok 2</option>
		<option value="3">Blok 3</option>
		<option value="4">Blok 4</option>
	</select>
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<!--<label for='title'>Title:</label>
	<input type='text' name='title_az' tabindex='title' value='<?=$rEdit[az]->title?>'/><img tabindex='title' src='img/az.png'/>
	<input type='text' name='title_ru' tabindex='title' value='<?=$rEdit[ru]->title?>'/><img tabindex='link' style='right:30px' src='img/ru.png'/>
	<input type='text' name='title_en' tabindex='title' value='<?=$rEdit[en]->title?>'/><img tabindex='title' style='right:30px' src='img/en.png'/>
	<label>Choose Image:</label>
	<input size='35' type='file' name='imag'/>
	<label for='text'>Text:</label>
	<textarea tabindex='text' name="text_az"><?=$rEdit[az]->text?></textarea><img tabindex='text' style="top:187px;" src='img/az.png'/>
	<input type='text' name='link_ru' tabindex='link' value='http://'/><img tabindex='link' style='top:114px;right:30px' src='img/ru.png'/>
	<textarea tabindex='text' name="text_en"><?=$rEdit[en]->text?></textarea><img tabindex='text' style='top:187px;right:30px' src='img/en.png'/>-->
	<input type='submit' class='submit' value='Update' name='submit_edit'/>
<?}?>
</form>

<ul class='table' tabindex='slider' style="margin-top:64px;">
<?while($rSlider=mysql_fetch_object($qSlider)){?>
	<li value='<?=$rSlider->id?>'>
		<span><img src='../files/image/<?=$rSlider->img?>'/></span>
		<span><a href='?options=slider&edit=<?=$rSlider->id?>&title=<?=$_GET[title]?>&prnt=<?=$_GET[prnt]?>'><img width='34' src='img/edit.png'/></a></span>
		<span><a href='?options=slider&del=<?=$rSlider->id?>&title=<?=$_GET[title]?>&prnt=<?=$_GET[prnt]?>'><img width='34' src='img/del.png'/></a></span>
	</li>
<?}?>
</ul>
<b></b>
<select name="prnt" tabindex="<?=$_GET[prnt]?>" style="position:absolute;left:634px">
	<?foreach($qPages as $_q):?>
		<option value="<?=$_q->id?>"><?=$_q->pagename?></option>
	<?endforeach?>
</select>
<select name="title" tabindex="<?=$_GET[title]?>" style="position:absolute;left:634px;margin-top:32px">
	<option value="1">Blok 1</option>
	<option value="2">Blok 2</option>
	<option value="3">Blok 3</option>
	<option value="4">Blok 4</option>
</select>
