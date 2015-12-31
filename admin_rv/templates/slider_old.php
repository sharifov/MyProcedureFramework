<?php
if($SucInc=="yes")
{
	$sl = new slider();
	$im = new image();
	
	if($_GET['action'] == "add")
	{
		$image_name = $im->addImage($_FILES["image_s"]["tmp_name"], $_FILES["image_s"]["name"], $prefix = 'slider_', $path = '../files/media/');
		
		if(!is_numeric($image_name))
		{
			$sl_add = $sl->addSlider($title = '', $text = '', $img_small = $image_name, $lang = $lang, $link_id = $_POST['link'], $id_slider = $_POST['slider_id']);
			
			if($sl_add)
			{
				alert_msg("Your image is add");
			}
			else
			{
				alert_msg("MySQL Error.");
			}
		}
	}
	elseif ($_GET['action'] == 'up' OR $_GET['action'] == 'down')
	{
		$sl_order = $sl->orderSlider($id_order = $_GET['id'], $order = $_GET['ordering'], $param = $_GET['action'], $id_slider = 1);
	}
	elseif($_GET['action'] == "delete")
	{
		$sl_delete = $sl->deleteSlider($id_delete = $_GET['id'], $path = '../files/media/');
	}
	elseif($_GET['action'] == "update2")	
	{	
		$img = $im->addImage($_FILES["image_s2"]["tmp_name"], $_FILES["image_s2"]["name"], $prefix = 'slider_', $path = '../files/media/');
		$sl_update = $sl->updateSlider($id= $id, $title = $_POST['title'], $text = $_POST['text'], $img = $img, $link_id = $_POST['link']);
	}


	function echo_link_product_name($link_id)
	{
		global $lang, $db;
		
		$Row = $db->fetchArray($db->query("SELECT product_name FROM ".TABLE_PRODUCTS." WHERE id='".$link_id."' AND lang_id = '".$lang."' "));
		return $Row['product_name'];
	}

?>

<div class='title'>Add new Image for Slider </div>	


<form enctype="multipart/form-data" action="index.php?options=slider&action=add" method="POST">
	<table cellpadding="2" cellspacing="2" border="1" class="txt1" style="width:100%; background: white;">
		<tr>
			<td><b>Link</td>
			<td>
				<input type='text' name='link'>
			</td>
		</tr>
		<tr>
			<td><b>Image</td>
			<td>
				<input type="file" name="image_s" class="input"> <b>(580x342)<br>
			</td>
		</tr>
	<?/*
	</td></tr>
	<tr><td><b>Link to:</td><td>
		<?include ("templates/position.php");?>
	</td></tr>
	*/?>
	<?/*
	<tr><td><b>Description</td><td>
		<input type='text' name='description' >
	</td></tr>
	*/?>
	
	<tr>
		<td><b>Slider sittuation</td>
		<td>
			<select name='slider_id'>
				<option value='1'>Slider</option>
			</select>
		</td>
	</tr>
	
	<?/*
	<tr><td><b>Title name</td><td>
		<input type='text' name='title_name' >
	</td></tr>
	*/?>
	<?/*
	<tr><td><b>Big Image</td><td>
	<input type="file" name="image_b" class="input"> <b>(540x342)<br>
	</td></tr>*/?>

		<tr>
			<td colspan='2'><input type="submit" name="submit" value="add"></td>
		</tr>
	</table>	
</form>
<br><br>

<?
	$Sql = $db->query("Select * from ".TABLE_SLIDER_IMAGES." WHERE lang_id = '".$lang."' AND id_slider = '1' ORDER BY ordering");
	$i = 1;
	$path = "../files/media/";
	$mouse = "onmouseover=\"style.backgroundColor='gray';\" onmouseout=\"style.backgroundColor='#fbfafa';\" style=\"height: 15px; background: #fbfafa\" ";
		
	?>
		<table cellpadding="2" cellspacing="2" border="1" class="delete" style="width:100%">
			<tr>
				<td><b>№</td>
				<td><b>Image:</td>
				<td><b>Link id:</td>
				<td><b>Ordering:</td>
				<td><b>Edit:</td>
				<td><b>Delete:</td>
			</tr>
			<?/*<tr><td colspan='6' align='center'><h2>Slider left</td></tr>*/?>
			<?
				while($Row = $db->fetchArray($Sql))
				{
					// if($Row['id_slider'] == 2 AND $i_slider < 1){echo"<tr><td colspan='6' align='center'><h2>Slider right</td></tr>"; $i_slider++;}
					if($Row['id'] == $_GET['id'] AND $_GET['action'] != "down" AND $_GET['action'] != "up")
					{
						?>
							<form action='index.php?options=slider&action=update2&id=<?=$Row['id']?>' METHOD='POST' enctype="multipart/form-data">
								<tr <?=$mouse?>>
								
									<td align="center" valign="middle" width="20px"><?=$i?></td>
									<td align="center" valign="middle" width="130px">
										<img src="<?=$path.$Row['img_small']?>" width='100px' border="2" style="border-color: #ff6a00">
										<br>
										<input type='file' name='image_s2'><br>
									</td>
									<td align="center" valign="middle" width="130px">
										<?
											$lang2 = $Row['lang_id'];
										?>
										<input type='text' name='link' value='<?=$Row['link_id']?>'>
									</td>
									<td align="center" valign="middle" width="20px">
										<a href="?options=slider&action=up&id=<?=$Row['id']?>&ordering=<?=$Row['ordering']?>">
											<img src='img/up.gif' border='0'>
										</a>
										| 
										<a href="?options=slider&action=down&id=<?=$Row['id']?>&ordering=<?=$Row['ordering']?>">
											<img src='img/down.gif' border='0'>
										</a>
									</td>
									<td align="center" valign="middle" width="170px" class="delete_image"><input type='submit' value='Update'></td>
									<td align="center" valign="middle" width="170px" class="delete_image"><a href="?options=slider&action=delete&id=<?=$Row['id']?>" onclick="return confirm('Delete this file?')">Delete this pictures</a></td>
									
								</tr>
							</form>
						<?
					}
					else
					{
						?>
							<tr <?=$mouse?>>
							
								<td align="center" valign="middle" width="20px"><?=$i?></td>
								<td align="center" valign="middle" width="130px"><img src="<?=$path.$Row['img_small']?>" width='200px' border="2" style="border-color: #ff6a00"></td>
								<td align="center" valign="middle" width="20px"><?=$Row['link_id']?></td>
								<td align="center" valign="middle" width="20px">
									<a href="?options=slider&action=up&id=<?=$Row['id']?>&ordering=<?=$Row['ordering']?>">
										<img src='img/up.gif' border='0' width=''>
									</a> 
									| 
									<a href="?options=slider&action=down&id=<?=$Row['id']?>&ordering=<?=$Row['ordering']?>">
										<img src='img/down.gif' border='0' width=''>
									</a>
								</td>
								<td align="center" valign="middle" width="170px" class="delete_image"><a href="?options=slider&action=edit&id=<?=$Row['id']?>">Edit this pictures</a></td>
								<td align="center" valign="middle" width="170px" class="delete_image"><a href="?options=slider&action=delete&id=<?=$Row['id']?>" onclick="return confirm('Delete this file?')">Delete this pictures</a></td>
								
							</tr>
						<?
					}
					$i++;
		}
		?>
		</table>
				
				
	<?
}?>