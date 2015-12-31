<?
	$qBranch=mysql_query("SELECT `name_{$lang}`,`text_{$lang}` FROM `".TABLE_BRANCHES."`");
	$_qA=$db->fetchWhile("SELECT `departament`,`name_{$lang}`,`name`,`country`,`phone`,`mail`,`img` FROM `".TABLE_AGENTS."` a INNER JOIN `".TABLE_DEPARTAMENT."` d ON  a.`lang`='{$lang}' AND a.`departament`=d.`id` GROUP BY `departament` ORDER BY a.`ordering`");
	if($_SERVER[REQUEST_METHOD]=='POST' && isset($_POST[feedsubmit])){
		require_once("kmail.php");
		$_POST[us_name]=mysql_real_escape_string(strip_tags($_POST[us_name]));
		$_POST[us_fam]=mysql_real_escape_string(strip_tags($_POST[us_fam]));
		$_POST[us_contact]=mysql_real_escape_string(strip_tags($_POST[us_contact]));
		$_POST[us_mail]=mysql_real_escape_string(strip_tags($_POST[us_mail]));
		$_POST[us_msg]=mysql_real_escape_string(strip_tags($_POST[us_msg]));
		
		$jMessage="<html>
					<body>
						<table cellspacing='1' style='background:#045997;color:#fff' cellpadding='6' border='1' align='center'>
							<tr><td>User Name:</td><td>{$_POST[us_name]}</td></tr>
							<tr><td>User Surname:</td><td>{$_POST[us_fam]}</td></tr>
							<tr><td>User Contact:</td><td>{$_POST[us_contact]}</td></tr>
							<tr><td>User Mail:</td><td>{$_POST[us_mail]}</td></tr>
							<tr><td>User Message:</td><td>{$_POST[us_msg]}</td></tr>
						</table>
					</body>
				</html>";
		$sendit = new AttachmentEmail(MAIN_MAIL,MAIN_MAIL,$jMessage);
		$sendit->mail();
		
	}
?>	
				<div class="content_middle_content">
					<div class="content_middle_content_img">
						<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ru/?ie=UTF8&amp;ll=40.39951,49.840336&amp;spn=0.043467,0.099134&amp;t=m&amp;z=14&amp;output=embed"></iframe>
					</div>
				</div>    
                <div class="content_middle_content_line"></div>
				<div class="contact">
					<div class="contact_top">
						<div class="contact_top_left"><?jContent($id,'pagename')?></div>
						<div class="contact_top_right" ><?jContent($id,'content')?></div>
					</div>
                   <div class="place1">
                      <?while($rBranch=mysql_fetch_object($qBranch)){?>
                        <div class="main_office">
                             <div class="main_office_top"><?=$rBranch->{name_.$lang}?>:</div> 
							 <?=$rBranch->{text_.$lang}?>
                        </div>
						<?}?>
                  </div>
               </div>
              
               <div class="contact_worker">
                   <div class="contact_workers">
						<?foreach($_qA as $_qA2){?>
							<div class="contact_worker_biog">
								<a href="#all-contact" tabindex="<?=$_qA2->departament?>"><?=$_qA2->{name_.$lang}?></a>
								<div class="contact_worker_img"><img src="files/media/<?=$_qA2->img?>"/></div> 
								<div class="contact_worker_name"><?=$_qA2->name?></div>
								<div class="contact_worker_status"><?=$_qA2->country?></div>
								<div class="contact_worker_tel"><?=$_LANG_CONTACT[5][$lang]?>:<?=$_qA2->phone?></div>
								<div class="contact_worker_mail"><?=$_qA2->mail?></div>
							</div>
						<?}?>
					</div>		
               </div>
               
               
                <div class="content_mail_send">
                     <div class="mail_send_img_block">
                       <div class="mail_send_img"><img src="img/send_mail.jpg"/></div>
                       <div class="mail_send_text"><?=$_LANG_CONTACT[6][$lang]?></div>
                     </div>
					 
                     <div class="form">
                        <div class="form_top"><?=$lang_feedback_title[$lang]?></div>
                         <form action="" method="post">
                             <div class="input"><div class="form_name"><?=$_LANG_CONTACT[0][$lang]?></div><input type="text" name="us_name"/></div>
                             <div class="input"><div class="form_name"><?=$_LANG_CONTACT[1][$lang]?></div><input type="text" name="us_fam"/></div>
                             <div class="input"><div class="form_name"><?=$_LANG_CONTACT[2][$lang]?></div><input type="text" name="us_contact"/></div>  
                             <div class="input"><div class="form_name"><?=$_LANG_CONTACT[3][$lang]?></div><input type="text" name="us_mail"/></div>
                             <div class="input"><div class="form_name"><?=$_LANG_CONTACT[4][$lang]?></div><textarea name="us_msg"></textarea></div>
                            <button><?=$lang_reg_poslat[$lang]?></button>
                         </form>
                     </div>
                 </div>
				 
				 <div id="all-contact"></div>