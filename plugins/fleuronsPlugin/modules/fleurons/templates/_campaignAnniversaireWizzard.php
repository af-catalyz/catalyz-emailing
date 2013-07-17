<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body alink="#669933" vlink="#669933" link="#669933">
	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top" style="line-height:0; font-size: 0;">
			<td width="600">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/header.jpg" width="600" height="67" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#9a7b4f" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td rowspan="2" width="176" align="center">
				<?php if (!empty($parameters["left_content"])) { $renderer = new CatalyzEmailRenderer("Times", "#000000", "font-size: 12px;line-height: 20px;"); echo $renderer->renderWysiwyg($parameters["left_content"], "#000000"); } ?>
			</td>
			<td height="48" style="line-height:0; font-size: 0;" width="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown.gif" width="7" height="1" alt="" border="0" /></td>
			<td height="48" style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown.gif" width="18" height="1" alt="" border="0" /></td>
			<td align="center" valign="middle" height="48" style="line-height:0; font-size: 0;" width="385">
				<font face="Times" style="font-size: 24px;line-height: 24px;" size="2" color="#FFFFFF"><?php if(isset($parameters["title"])){ ?><?php echo $parameters["title"]; ?><?php } ?></font>
			</td>
			<td height="48" style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown.gif" width="14" height="48" alt="" border="0" /></td>
		</tr>
		<tr bgcolor="#c2bf4e" valign="top">
			<td bgcolor="#9a7b4f" valign="top" align="right" style="line-height:0; font-size: 0;" width="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/left.gif" width="7" height="184" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_green.gif" width="18" height="1" alt="" border="0" /></td>
			<td width="385">
				<?php if(!empty($parameters["date"])): ?>
				<table width="385" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="360" align="right">
							<font face="Times" style="font-size: 12px;line-height: 16px;" size="2" color="#FFFFFF"><?php echo $parameters["date"]; ?></font>
						</td>
						<td style="line-height:0; font-size: 0;" width="25"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_green.gif" width="25" height="40" alt="" border="0" /></td>
					</tr>
				</table>
					<?php else: ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_green.gif" width="1" height="1" alt="" border="0" />
				<?php endif ?>
				<table width="385" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="385">
							<?php if (!empty($parameters["right_content"])) { $renderer = new CatalyzEmailRenderer("Times", "#000000", "font-size: 12px;line-height: 20px;"); echo $renderer->renderWysiwyg($parameters["right_content"], "#000000"); } ?>
						</td>
					</tr>
				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_green.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td align="left" colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/cut_separator.gif" width="600" height="40" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="28"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="28" height="1" alt="" border="0" /></td>
			<td width="402">
				<font face="Times" style="font-size: 28px;line-height: 30px;" size="2" color="#e00a8c"><?php if(!empty($parameters["promo_title"])){ ?><?php echo $parameters["promo_title"]; ?><?php } ?></font>
			</td>
			<td width="130">
				<?php if (!empty($parameters["amount"])): ?>

				<table width="130" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;">
						<td bgcolor="#000000" colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_bl.gif" width="2" height="2" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="line-height:0; font-size: 0;" bgcolor="#000000" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_bl.gif" width="2" height="2" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="2" height="2" alt="" border="0" /></td>
						<td width="122" align="center">
							<font face="Times" style="font-size: 36px;line-height: 38px;" size="2" color="#e00a8c"><?php echo $parameters["amount"]; ?></font>
						</td>
						<td style="line-height:0; font-size: 0;" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="2" height="2" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" bgcolor="#000000" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_bl.gif" width="2" height="2" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;">
						<td bgcolor="#000000" colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_bl.gif" width="2" height="2" alt="" border="0" /></td>
					</tr>
				</table>
				<?php else: ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" />
				<?php endif ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="40"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="40" height="1" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="22"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="22" height="1" alt="" border="0" /></td>
			<td colspan="2" align="center">
				<?php if (!empty($parameters["promo_content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#000000", "font-size: 14px;line-height: 20px;font-weight: bold;"); echo $renderer->renderWysiwyg($parameters["promo_content"], "#000000"); } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="29"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="29" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="22"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="22" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="108">
			<?php if(!empty($parameters["promo_code"]) && is_file(sfConfig::get('sf_web_dir').$parameters["promo_code"])){
				$path_infos =   getimagesize(sfConfig::get('sf_web_dir').thumbnail_path($parameters["promo_code"], 108, false));
				printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters["promo_code"], 108, false), $path_infos[3]);
			}else{
				echo '&nbsp;';
			}

				 ?>

			</td>
			<td width="441" align="right">
				<font face="Arial" style="font-size: 8px;line-height: 10px;font-weight: bold;" size="2" color="#000000">
				<?php if(!empty($parameters["promo_legals"])){ ?><?php echo $parameters["promo_legals"]; ?><?php } ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="29"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_wh.gif" width="29" height="1" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/pre_footer_sep.gif" width="600" height="32" alt="" border="0" /></td>
		</tr>
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/pre_footer_l.jpg" width="130" height="32" alt="" border="0" /></td>
			<td width="340"><a href="javascript://" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/link.jpg" width="340" height="32" alt="" border="0" /></a></td>
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/pre_footer_r1.jpg" width="130" height="32" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/pre_footer_2.jpg" width="600" height="21" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="192"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/filet_l.gif" width="192" height="24" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="26">

			<?php

						if (!empty($parameters["facebook_link"])) {
							printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank"><img src="%s/fleuronsPlugin/images/campaignAnniversaireWizzard/fb.gif" width="26" height="24" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters["facebook_link"]), CatalyzEmailing::getApplicationUrl());
						}else{
							echo '&nbsp;';
						}

						?>
			</td>
			<td width="212" align="center" valign="middle">
				<font face="Arial" style="font-size: 10px;line-height: 16px;font-weight: bold;" size="2" color="#FFFFFF">

				<?php

						if (!empty($parameters["website_link"])) {
							printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["website_link"]), !empty($parameters["website_caption"])?$parameters["website_caption"]:'LIEN');
						}else{
							echo '&nbsp;';
						}

				 ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="170"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/filet_r.gif" width="170" height="24" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
			<td width="480" align="center">
				<font face="Arial" style="font-size: 12px;line-height: 20px;" size="2" color="#FFFFFF">
				 <?php
				if (!empty($parameters["adresse"])) {
					echo nl2br(htmlentities(utf8_decode($parameters["adresse"])));
				}

 				  $secondLine = array();
					if (!empty($parameters["phone"])) {
						$secondLine[]= sprintf('Tel : %s', htmlentities($parameters["phone"], ENT_COMPAT, 'utf-8'));
					}
					if (!empty($parameters["contact_link"])) {
						$secondLine[]= sprintf('mail : <a style="text-decoration: none;color:#FFFFFF;" href="mailto:%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["contact_link"]), !empty($parameters["contact_caption"])?$parameters["contact_caption"]:'LIEN');
					}

					if (!empty($secondLine)) {
						printf('<br/>%s', implode(' - ', $secondLine));
					}

				 ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
			<td width="480" align="center">
				<?php if (!empty($parameters["footer_content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#9f8a8f", "font-size: 10px;line-height: 14px;"); echo $renderer->renderWysiwyg($parameters["footer_content"], "#9f8a8f"); } ?>

				<font face="Arial" style="font-size: 10px;line-height: 14px;" size="2" color="#9f8a8f">
<br/>
Si vous ne souhaitez plus recevoir nos lettres d'informations,<br/>
vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#9f8a8f;">cliquant ici</a>.
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignAnniversaireWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
	</table>
</body>
</html>