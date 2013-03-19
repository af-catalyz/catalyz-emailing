<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body style="margin:0; padding:0;" alink="#7c9439" vlink="#7c9439" link="#7c9439">
	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="1" height="5" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="25">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

		<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/header_top.png" width="652" height="41" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="255">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/header_left.png" width="255" height="63" alt="" border="0" />
			</td>
			<td width="272">
				<font face="Arial" style="font-weight:bold; font-size: 24px; line-height: 20px;" size="2" color="#a2c037">
					<?php if(!empty($parameters["header_title"])){echo $parameters["header_title"];} ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="125">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/header_right.png" width="125" height="63" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/header_bottom.png" width="652" height="61" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>


           <?php if(!empty($parameters["picture"])){ ?>
            <td style="line-height:0; font-size: 0;" width="225">
            <img src="<?php echo $parameters["picture"]; ?>" width="225" height="546"/>
            </td>



            <td  style="line-height:0; font-size: 0;" width="1" bgcolor="#a2c037">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<?php } ?>
			<td  width="424">

				<table width="<?php if(empty($parameters["picture"])){ echo '649'; }else{echo '424'; } ?>" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="424" colspan="3">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="1" height="20" alt="" style="display:block;" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="14">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="1" height="1" alt="" style="display:block;" border="0" />
						</td>
						<td width="<?php if(empty($parameters["picture"])){ echo '626'; }else{echo '401'; } ?>">

							<table width="<?php if(!empty($parameters["picture"])){ echo '626'; }else{echo '401'; } ?>" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">

								<tr valign="top">
									<td width="<?php if(!empty($parameters["picture"])){ echo '620'; }else{echo '395'; } ?>">
                                    <?php if(!empty($parameters["sup_title"])){ ?>
									<font face="Arial" style="font-weight:bold; font-size: 14px;line-height:16px;" size="2" color="#a2c037"><?php echo $parameters["sup_title"]; ?><br /></font>
                                    <?php } ?>
                                    <?php if(!empty($parameters["title"])){ ?>
									<font face="Times New Roman" style="font-size: 36px;line-height:40px;" size="2" color="#7d952d"><?php echo $parameters["title"]; ?></font>
                                    <?php } ?>
                                    <?php if(!empty($parameters["when"])){ ?>
                                    <font face="Arial" style="font-size: 12px;line-height:16px;" size="2" color="#666666"><br /><br />
                                    <?php echo $parameters["when"] ?><br />
                                    <br />
                                    </font>
                                    <?php } ?>
									<table width="<?php if(empty($parameters["picture"])){ echo '620'; }else{echo '395'; } ?>" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
                                    <?php if (!empty($parameters["programme"]) && is_array($parameters["programme"])): foreach($parameters["programme"] as $programme): ?>
                                      <tr valign="top">
                                        <td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/bullet_1.gif" width="18" height="20" alt="" style="display:block;" border="0" /></td>
                                        <td style="line-height:0; font-size: 0;" width="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="7" height="1" alt="" style="display:block;" border="0" /></td>
                                        <td width="370"><font face="Arial" style="font-weight:bold; font-size: 14px;line-height:16px;" size="2" color="#669900"> <?php echo $programme["title"]; ?> </font></td>
                                      </tr>
                                      <tr valign="top">
                                        <td style="line-height:0; font-size: 0;" width="395" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="1" height="8" alt="" style="display:block;" border="0" /></td>
                                      </tr>
                                    <?php endforeach; endif; ?>
                                    </table>

                                    <?php if (!empty($parameters["content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#7d952d", "line-height:16px; font-size: 12px; color:#333333"); echo $renderer->renderWysiwyg($parameters["content"], "#7d952d"); } ?>

								</td>
								</tr>
							</table>
						</td>
						<td style="line-height:0; font-size: 0;" width="14">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="14" height="1" alt="" style="display:block;" border="0" />
						</td>
					</tr>
						<?php if(!empty($parameters["title2"]) || (trim(strip_tags($parameters["content2"])) != '')){ ?><tr valign="top">
						<td width="424" colspan="3" style="line-height:0; font-size: 0;">
							<img height="22" width="424" border="0" style="display:block;" alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/ombre.gif">
						</td>
					</tr>
					<tr valign="top">
						<td width="424" colspan="3" style="line-height:0; font-size: 0;">
							<img height="20" width="1" border="0" style="display:block;" alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif">
						</td>
					</tr>

					<tr valign="top">
						<td width="14" style="line-height:0; font-size: 0;">
							<img height="1" width="1" border="0" style="display:block;" alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif">
						</td>
						<td width="401">

							<table width="401" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">

								<tbody><tr valign="top">
									<td width="395">
									<?php if(!empty($parameters["title2"])){ ?>
									<font face="Arial" size="2" color="#669900" style="font-weight:bold; font-size: 14px;line-height:18px;"><?php echo $parameters["title2"]; ?><br></font>
                                    <?php } ?>
										<?php if (!empty($parameters["content2"])) { $renderer = new CatalyzEmailRenderer("Arial", "#7d952d", "line-height:16px; font-size: 12px; color:#333333"); echo $renderer->renderWysiwyg($parameters["content2"], "#7d952d"); } ?>

									</td>
								</tr>
							</tbody></table>
						</td>
						<td width="14" style="line-height:0; font-size: 0;">
							<img height="1" width="14" border="0" style="display:block;" alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif">
						</td>
					</tr>
				<?php } ?>
				<?php if (!empty($parameters["actions"])) { ?>
				<tr valign="middle">
						<td width="424" align="center" colspan="3" style="line-height:0; font-size: 0;">

										<?php
					$renderer = new CatalyzEmailRenderer("Arial", "#7d952d", "line-height:16px; font-size: 12px; color:#333333");
					echo $renderer->renderWysiwyg($parameters["actions"], "#7d952d"); ?>



						</td>
					</tr><?php } ?>


					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="424" colspan="3">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="424" height="27" alt="" style="display:block;" border="0" />
						</td>
					</tr>
						</table>

                    </td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/footer_top.gif" width="652" height="35" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="120" bgcolor="#A3C200">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="410" bgcolor="#A3C200" align="center">
				<?php if (!empty($parameters["footer"])) { $renderer = new CatalyzEmailRenderer("Tahoma, sans-serif", "#ffffff", " font-size:10px ;line-height:13px; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["footer"]), "#ffffff"); } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="120" bgcolor="#A3C200">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/footer_bottom.gif" width="652" height="35" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="470" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <?php if(!empty($parameters["unsubscribe_email"])){ ?><a style="text-decoration:none; color:#999999;" href="mailto:<?php echo $parameters["unsubscribe_email"]; ?>" target="_blank"><?php echo $parameters["unsubscribe_email"]; ?></a><?php } ?><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style=" color:#999999;">ce lien de désinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/invitation/sep_w.gif" width="1" height="10" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>