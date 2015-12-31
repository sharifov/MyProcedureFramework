<?
	$ak = strlen($search);
		if ($ak > 2) 
		{
			$search1 = strtoupper($search);
			$search2 = strtolower($search);
			$search3 = ucfirst($search2);
			
			?>
				
				<table cellpadding="0" class="jSearch" cellspacing="0" border="0" width='100%'>
					<?
						$Sql =  $db->query("SELECT * FROM ".TABLE_PAGES." WHERE (pagename LIKE '%${search1}%' OR content LIKE '%${search1}%' OR pagename LIKE '%${search2}%' OR content LIKE '%${search2}%' OR pagename LIKE '%${search3}%' OR content LIKE '%${search3}%' )  AND lang_id ='$lang'"); 
						
						$Sql2 =  $db->query("SELECT * FROM ".TABLE_NEWS." WHERE 
						(
						 title LIKE '%${search1}%' OR sh_desc LIKE '%${search1}%' OR content LIKE '%${search1}%' OR
						 title LIKE '%${search2}%' OR sh_desc LIKE '%${search2}%' OR content LIKE '%${search2}%' OR
						 title LIKE '%${search3}%' OR sh_desc LIKE '%${search3}%' OR content LIKE '%${search3}%'
						)  AND lang_id ='$lang'"); 
						
						$n = $db->num($Sql) + $db->num($Sql2);	
							?>
								<tr>
									<td class="" align='left' valign='top'>
										<?
											 echo "<font>", $lang_search_found[$lang], $n, "<br><br>\n";
										?>
									</td>
								</tr>
							<?	
						while($Row = $db->fetchArray($Sql))
						{
							?>
								<tr>
									<td class="" align='left' valign='top'>
										<table cellpadding="0" cellspacing="0" border="0" style='margin-top: 5px;margin-bottom: 10px'>
											<tr>
												<td align='left' valign='top'>
													<a href="index.php?options=content&id=<?=$Row['id']?>">
														<?=$Row['pagename']?> - read more >>
													</a>
												</td>
											</tr>
											
										</table>
							
									</td>
								</tr>
								<tr>
									<td>
										<hr style='color: grey; width: 100%'>
									</td>
								</tr>
								
							<?
						}
						
						while($Row2 = $db->fetchArray($Sql2))
						{
							?>
								<tr>
									<td class="" align='left' valign='top'>
										<table cellpadding="0" cellspacing="0" border="0" style='margin-top: 5px;margin-bottom: 10px'>
											<tr>
												<td align='left' valign='top'>
													<a href="index.php?options=news&id=<?=$Row2['page_id']?>&news_id=<?=$Row2['news_id']?>">
														<?=$Row2['title']?> - read more >><?//=probel_alx2(150, $Row2['content'], $stl)?>
													</a>
												</td>
											</tr>
											
										</table>
							
									</td>
								</tr>
								<tr>
									<td>
										<hr style='color: grey; width: 100%'>
									</td>
								</tr>
								
							<?
						}
						
					?>
				</table>
			<?
		}
?>