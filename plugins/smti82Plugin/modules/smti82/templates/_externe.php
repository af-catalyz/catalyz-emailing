<?php $parameters = unEscape($parameters);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
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
						<td width="265" colspan="2" align="right">
							<font face="Arial" style="font-weight:bold; font-size: 24px; line-height: 20px;" size="2" color="#a2c037"><?php if(isset($parameters["title"])){ echo $parameters["title"]; } ?>	</font>
						</td>
					</tr>
					<tr>
						<td width="265" align="right" bgcolor="#FFFFFF">
							<font face="Arial" style="font-weight:bold; font-size: 10px;line-height: 9px;" size="2" color="#999999"><?php if(isset($parameters["edition"])){ echo $parameters["edition"]; } ?>
						  </font>
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


		<?php if (isset($parameters["article"]) && is_array($parameters["article"])): foreach($parameters["article"] as $article): ?>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080" rowspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="15" rowspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>

            <td width="100" rowspan="3">
				<?php if(!empty($article["picture"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="1" height="25" alt="" border="0" />
				<?php echo thumbnail_tag($article["picture"], 100, 120, array('style' => 'border-top: 5px solid #9c9b9b', 'border' => 0, 'alt' => '')); ?>
			<?php } ?></td>


            <td style="line-height:0; font-size: 0;" width="25" rowspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="25" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="495">
				<?php if(!empty($article["title"])){ ?>
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_1.gif" alt="" border="0" width="19" height="12">
					<font style="line-height: 24px; font-size: 22px;" color="#a2c037" size="2" face="Times New Roman">
						<?php echo $article["title"];?>
					</font>
				<?php } ?>

			</td>
			<td style="line-height:0; font-size: 0;" width="15" rowspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_w.gif" width="15" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080" rowspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr valign="top">
						<td height="1" width="495">
							<img height="1" width="495" border="0" alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/sep_long_grey.gif">
						</td>
					</tr>
		<tr>
		<td width="495">
				<table width="495" cellspacing="0" cellpadding="0" border="0">
                    <?php if (isset($article["items"]) && is_array($article["items"])): foreach($article["items"] as $item): ?>
   					<tr valign="top">
						<td width="495">
							<?php if(!empty($item["title"])){ ?><font face="Arial" style="font-weight:bold; line-height: 18px; font-size: 14px;" size="2" color="#669900">
								<?php echo $item["title"];?><br />
							</font><?php } ?>
							<?php if(!empty($item["source"])){ ?>
								<font face="Arial" style="line-height: 13px; font-size: 10px;" size="2" color="#999999">
								(source : <?php echo $item["source"]; ?>)
								</font>
							<?php } ?>
						  <?php if (!empty($item["resume"])) { $renderer = new CatalyzEmailRenderer("Arial", "#7d952d", "line-height: 14px; font-size: 11px; color:#333333"); echo $renderer->renderWysiwyg($item["resume"], "#7d952d"); } ?>

								<?php if(!empty($item["link_title"])){ ?>
                             <img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/externe/bullet_2.gif" width="8" height="7" alt="" border="0" />
								<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#333333"><a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo $item["link"]; ?>" target="_blank"><?php echo $item["link_title"]; ?></a></font><br /><br /><?php } ?>

						</td>
					</tr>
                	<?php endforeach; endif; ?>


                </table>


			</td>
		</tr>
        <?php endforeach; endif; ?>



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
				<?php if (!empty($parameters["footer"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#ffffff", "line-height:9px; font-size:11px; color:#ffffff"); echo $renderer->renderWysiwyg($parameters["footer"], "#ffffff"); } ?>
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