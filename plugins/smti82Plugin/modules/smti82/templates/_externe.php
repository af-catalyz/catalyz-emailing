<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body style="margin:0; padding:0;" alink="#7c9439" vlink="#7c9439" link="#7c9439">
	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="5" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="25">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

		<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/header_top.png" width="652" height="35" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="71">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/header_left.png" width="259" height="71" alt="" border="0" />
			</td>
			<td width="265">
				<table width="265" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="265" colspan="2">
							<font face="Arial" style="font-weight:bold; font-size: 24px; line-height: 20px;" size="2" color="#a2c037"><?php if(isset($parameters["title"])){ echo $parameters["title"]; } ?>	</font>
						</td>
					</tr>
					<tr>
						<td width="205" align="right">
							<font face="Arial" style="font-weight:bold; font-size: 10px;line-height: 9px;" size="2" color="#999999"><?php if(isset($parameters["edition"])){ echo $parameters["edition"]; } ?>
						  </font>
						</td>
						<td width="60" bgcolor="#FFFFFF">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="60" height="1" alt="" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="71">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/header_right.png" width="128" height="71" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/header_bottom.png" width="652" height="59" alt="" border="0" />
			</td>
		</tr>
	</table>

<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">

        <?php if (isset($parameters["edito"]) && is_array($parameters["edito"])): foreach($parameters["edito"] as $edito): ?>
        <tr valign="top">
        	<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>

            <td style="line-height:0; font-size: 0;" width="100">
    			<?php if(isset($edito["picture"])){ ?><img src="<?php echo $edito["picture"]; ?>" width="100" height="92" /><?php } ?>
			</td>

			<td style="line-height:0; font-size: 0;" width="25">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="25" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="495">
				<table width="495" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_1.gif" width="19" height="12" alt="" border="0" />
						<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037"><?php if(isset($edito["title"])){ echo $edito["title"]; } ?>
							</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_long_grey.gif" width="495" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>


                    <tr valign="top">
						<td width="495">
							<?php if (!empty($edito["content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans serif", "#7d952d", "line-height:14px; font-size:11px; color:#333333"); echo $renderer->renderWysiwyg(utf8_decode($edito["content"]), "#7d952d"); } ?>
                         </td>
					</tr>

				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
        <?php endforeach; endif; ?>

		<!-- cze:subform name="article" label="Ajouter un article"  -->
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>

            <td width="100">
				<?php if(isset($parameters["picture"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="25" alt="" border="0" />
				<img src="<?php echo $parameters["picture"]; ?>" style="border-top: 5px solid #9c9b9b" width="100" height="120" alt="" border="0" />
			<?php } ?></td>


            <td style="line-height:0; font-size: 0;" width="25">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="25" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="495">
				<table width="495" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037"><?php echo $parameters["main_title"]; ?>
							</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_long_grey.gif" width="495" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							 <?php if (!empty($parameters["content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans serif", "#7d952d", "line-height:14px; font-size:11px; color:#333333"); echo $renderer->renderWysiwyg(utf8_decode($parameters["content"]), "#7d952d"); } ?></td>

					</tr>
				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
        <!-- /cze:subform -->


        <tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="100">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="25" alt="" style="display:block;" border="0" />
				<?php if(isset($parameters["read_picture"])){ ?><img src="<?php echo $parameters["read_picture"]; ?>" width="100" height="78" alt="" style="display:block;" border="0" /><?php } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="25">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="25" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="495">
				<table width="495" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="495">
							<?php if(isset($parameters["read_title"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037">
								Lu pour vous
							</font><?php } ?>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_long_grey.gif" width="495" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>

                    <?php if (isset($parameters["book"]) && is_array($parameters["book"])): foreach($parameters["book"] as $book): ?>
   					<tr valign="top">
						<td width="495">
							<font face="Arial" style="font-weight:bold; line-height: 18px; font-size: 14px;" size="2" color="#669900">
								<?php if(isset($book["subtitle"])){ ?>« Lombalgies : Bouger pour guérir plus vite »<?php } ?><br />
							</font>
							<?php if(isset($book["source"])){ ?>
								<font face="Arial" style="line-height: 13px; font-size: 10px;" size="2" color="#999999">
								(source : <?php echo $book["source"]; ?>)
								</font>
							<?php } ?>
						  <?php if (!empty($book["resume"])) { $renderer = new CatalyzEmailRenderer("Arial", "#7d952d", "line-height: 14px; font-size: 11px; color:#999999"); echo $renderer->renderWysiwyg(utf8_decode($book["resume"]), "#7d952d"); } ?>

								<?php if(isset($book["link_title"])){ ?>
                             <img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_2.gif" width="8" height="7" alt="" border="0" />
								<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#333333"><a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo $book["link"]; ?>" target="_blank"><?php echo $book["link_title"]; ?></a></font><br /><br /><?php } ?>

						</td>
					</tr>
                	<?php endforeach; endif; ?>


                </table>
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
				<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="100">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="25" alt="" style="display:block;" border="0" />
				<?php if(isset($parameters["read_picture"])){ ?><img src="<?php echo $parameters["read_picture"]; ?>" width="100" height="56" alt="" style="display:block;" border="0" /><?php } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="25">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="25" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="495">
				<table width="495" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037">
								<?php if(isset($parameters["infos_title"])){ ?>Infos Pratiques<?php } ?>
							</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_long_grey.gif" width="495" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="495">
							<table width="495" cellspacing="0" cellpadding="0" border="0">
											<?php if (isset($parameters["informations"]) && is_array($parameters["informations"])): foreach($parameters["informations"] as $informations): ?>
   											<tr valign="top">
												<td style="line-height:0; font-size: 0;" width="18">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_3.gif" width="18" height="20" alt="" style="display:block;" border="0" />
												</td>
												<td style="line-height:0; font-size: 0;" width="7">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="7" height="1" alt="" style="display:block;" border="0" />
												</td>
												<td width="345">
													<font face="Arial" style="font-weight:bold; font-size: 14px;line-height:16px;" size="2" color="#669900">
														<?php if(isset($informations["name"])){ ?>Risques psychosociaux, travail, organisations <?php } ?>
													</font>
													<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#333333">
														<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_2.gif" width="8" height="7" alt="" border="0" />
														<?php if(isset($informations["url"])){ ?><a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo czWidgetFormLink::displayLink($informations["url"]); ?>" target="_blank">En savoir plus</a><?php } ?><br />
													</font>
												</td>
											</tr>

											<tr valign="top">
												<td style="line-height:0; font-size: 0;" width="495" colspan="3">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="8" alt="" style="display:block;" border="0" />
												</td>
											</tr>
                                            <?php endforeach; endif; ?>


										</table>
						</td>
					</tr>
				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="15">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/footer_top.gif" width="652" height="34" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="32" bgcolor="#a2c037">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/footer_left.gif" width="32" height="53" alt="" border="0" />
			</td>
			<td width="453" bgcolor="#A3C200" height="53">
				<?php if (!empty($parameters["footer"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#ffffff", "line-height:9px; font-size:11px; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["footer"]), "#ffffff"); } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="167" bgcolor="#A3C200">
				<?php if(!empty($parameters["fb_page"])){ ?><a target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters["fb_page"]); ?>"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/footer_right.gif" width="167" height="53" alt="" border="0" /></a><?php } ?>
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/footer_bottom.gif" width="652" height="34" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="470" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <?php if(isset($parameters["unsubscribe_email"])){ ?><a style="text-decoration:none; color:#999999;" href="mailto:<?php echo $parameters["unsubscribe_email"]; ?>" target="_blank"><?php echo $parameters["unsubscribe_email"]; ?></a><?php } ?><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style=" color:#999999;">ce lien de désinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="10" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>