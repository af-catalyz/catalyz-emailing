<?php
$parameters = unEscape($parameters);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body alink="#669933" vlink="#669933" link="#669933">
	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#666666">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>
	<table width="568" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="568">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/header.png" width="568" height="110" alt="" border="0" />
			</td>
		</tr>
	</table>
<table width="568" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#ebebeb"><img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/border_o.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#cccccc"><img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="12"><img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="12" height="1" alt="" border="0" /></td>
			<td>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="1" height="15" alt="" border="0" />
				<font face="Arial" style="line-height: 33px; font-size: 30px;" size="4" color="#006699">
					<?php if(!empty($parameters['title'])){echo $parameters['title'];} ?>
				</font>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="1" height="15" alt="" border="0" />
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/left_sep.png" width="362" height="14" alt="" border="0" />
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bullet_1.gif" width="7" height="12" alt="" border="0" />
				<font face="Arial" style="font-weight:bold; line-height: 20px; font-size: 16px;" size="2" color="#669933">
					<?php if(!empty($parameters['date'])){echo $parameters['date'];} ?>
				</font><br />
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="1" height="12" alt="" border="0" />
				<?php if(!empty($parameters['picture'])){printf('<img src="%s%s" width="362" height="292" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), $parameters['picture']);} ?>

				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="1" height="26" alt="" border="0" />
				<?php
					if(!empty($parameters['content'])){
						$renderer = new CatalyzEmailRenderer('Arial','#333333','line-height: 16px; font-size: 12px;');
						$renderer->renderWysiwyg(html_entity_decode(utf8_decode($parameters['content'])), '#006699');
					}
				?>
			</td>
			<td style="line-height:0; font-size: 0;" width="11">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="11" height="1" alt="" border="0" />
			</td>
			<td width="168">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="1" height="13" alt="" border="0" />
				<table width="168" cellpadding="0" cellspacing="0" border="0">
					<tr valign="top">
						<td width="168">
							<table width="168" cellpadding="0" cellspacing="0" border="0">
								<tr valign="top" style="line-height:0; font-size: 0;">
									<td width="168" style="line-height:0; font-size: 0;">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/right_top.png" width="168" height="10" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td width="168" bgcolor="#006699" align="center">
										<font face="Arial" style="font-weight:bold; line-height: 17px; font-size: 13px;" size="2" color="#cccccc">
											Programme
										</font>
									</td>
								</tr>
								<tr valign="top" style="line-height:0; font-size: 0;">
									<td style="line-height:0; font-size: 0;" bgcolor="#006699" width="168" align="center">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_blue.gif" width="168" height="5" alt="" border="0" />
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<tr valign="top">
						<td>
							<table bgcolor="#ededed" width="168" cellpadding="0"  cellspacing="0" border="0">
								<?php if(isset($parameters['programme']) && is_array($parameters['programme'])){
									foreach($parameters['programme'] as $programme){


								 ?>

								<tr style="line-height:0; font-size: 0;" valign="top">
									<td style="line-height:0; font-size: 0;" width="168" colspan="4">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="1" height="10" alt="" border="0" />
									</td>
								</tr>

								<tr valign="top">
									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>

									<td width="156">
										<table bgcolor="#ededed" width="156" cellpadding="0" cellspacing="0" border="0">
											<tr valign="top">
												<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="14">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bullet_2.gif" width="9" height="11" alt="" border="0" />
												</td>
												<td width="142">
													<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#003366">
														<?php if(isset($programme['time'])){ echo $programme['time'];} ?> <img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bullet_3.gif" width="4" height="6" alt="" border="0" /> <?php if(isset($programme['title'])){ echo $programme['title'];} ?>
													</font>
													<?php if(isset($programme['sub_title'])): ?>
														<br />
														<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#003366">
															<?php echo $programme['sub_title']; ?>
														</font>
													<?php endif; ?>
												</td>
											</tr>
										</table>
									</td>

									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>
								</tr>
								<?php }} ?>



	<?php if(isset($parameters['articles']) && is_array($parameters['articles'])){
foreach($parameters['articles'] as $article){


?>
								<tr style="line-height:0; font-size: 0;" valign="top">
									<td style="line-height:0; font-size: 0;" width="168" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/right_sep.gif" width="168" height="20" alt="" border="0" />
									</td>
								</tr>

<?php if(isset($article['illustration'])): ?>
								<tr valign="top">
									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>

									<td width="156">
										<table bgcolor="#ededed" width="156" cellpadding="0" cellspacing="0" border="0">
											<tr valign="top">

												<td>
													<img style="border: 1px solid #FFFFFF" src="<?php echo CatalyzEmailing::getApplicationUrl(); ?><?php echo $article['illustration']; ?>" width="150" height="73" alt="" border="0" />
												</td>
											</tr>
										</table>
									</td>

									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>
								</tr>
								<?php endif; ?>


								<tr style="line-height:0; font-size: 0;" valign="top">
									<td style="line-height:0; font-size: 0;" width="168" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="1" height="10" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>

									<td width="156">
										<table bgcolor="#ededed" width="156" cellpadding="0" cellspacing="0" border="0">
											<tr valign="top">
												<td align="justify" width="156" colspan="2">
										<font face="Arial" style="text-transform:uppercase; font-weight:bold; line-height: 16px; font-size: 11px;" size="2" color="#003366">
											<?php if(isset($article['title'])){echo $article['title'];} ?>
										</font><br />
										<font face="Arial" style="line-height: 16px; font-size: 11px;" size="2" color="#003366">
											<?php if(isset($article['content'])){echo $article['content'];} ?>
										</font>
									</td>
											</tr>
										</table>
									</td>

									<td bgcolor="#ededed" style="line-height:0; font-size: 0;" width="6">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_grey.gif" width="6" height="1" alt="" border="0" />
									</td>
								</tr>
								<?php }} ?>

							</table>
						</td>
					</tr>
						<tr style="line-height:0; font-size: 0;" valign="top">
							<td style="line-height:0; font-size: 0;" width="168">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/right_bottom.jpg" width="168" height="12" alt="" border="0" />
							</td>
						</tr>

				</table>


			</td>
			<td style="line-height:0; font-size: 0;" width="11" bgcolor="#FFFFFF">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="11" height="1" alt="" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#cccccc">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/border.gif" width="1" height="1" alt="" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#ebebeb">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/border_o.gif" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="568" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/footer_1.png" width="568" height="47" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/footer_left.png" width="229" height="42" alt="" border="0" />
			</td>
			<td bgcolor="#ebebeb" width="325" align="right" valign="middle">
				<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					<?php if(isset($parameters['adress'])){echo $parameters['adress']; } ?> – <?php if(isset($parameters['zip'])){echo $parameters['zip']; } ?>
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					<?php if(isset($parameters['city'])){echo $parameters['city']; } ?><br/>
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					Tél. :
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					<?php if(isset($parameters['phone'])){echo $parameters['phone']; } ?>
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					 – Fax :
					 </font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					<?php if(isset($parameters['fax'])){echo $parameters['fax']; } ?>
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					 – E-mail :
					 </font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					 <a style="color:#0082a4;" href="mailto:<?php if(isset($parameters['email'])){echo $parameters['email']; } ?>" target="_blank"><?php if(isset($parameters['email'])){echo $parameters['email']; } ?></a>
					 <br/>
					 </font>
					 <font face="Arial" style="line-height: 12px; font-size: 9px;" size="2" color="#669900">
					 <a style="color:#669900;" href="<?php if(isset($parameters['website_adress'])){echo $parameters['website_adress']; } ?>" target="_blank"><?php if(isset($parameters['website_adress'])){echo $parameters['website_adress']; } ?></a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" bgcolor="#ebebeb" width="14">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/bg_footer.gif" width="14" height="1" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/footer_bottom.png" width="568" height="7" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="507" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <a style="color:#999999;" href="mailto:contact@sudprojet.com" target="_blank">contact@sudprojet.com</a><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#999999;">ce lien de désinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl(); ?>/sudprojetPlugin/images/invitation/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>

</body>
</html>