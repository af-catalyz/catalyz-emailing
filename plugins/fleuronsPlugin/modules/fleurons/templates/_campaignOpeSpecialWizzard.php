<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFFFFF" alink="#392b2e" vlink="#392b2e" link="#392b2e">
	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="296" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td width="88"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/header01.jpg" width="88" height="82" alt="" border="0" /></td>
			<td width="128">
				<a href="javascript://" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/logo.jpg" width="128" height="82" alt="" border="0" /></a></td>
			<td width="80"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/header02.jpg" width="80" height="82" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/header03.jpg" width="296" height="31" alt="" border="0" /></td>
		</tr>
	</table>

	<?php if (!empty($parameters["title"])): ?>
	<table width="543" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/title_t.jpg" width="543" height="42" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td align="center">
				<font face="Times" style="line-height: 36px; font-size: 31px;" size="2" color="#392b2e">
				<?php echo $parameters["title"]; ?>
				</font>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/title_b.jpg" width="543" height="34" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters["top_content"])): ?>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="20"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="562" align="center">
				<font face="Times" style="line-height: 18px; font-size: 14px;" size="2" color="#392b2e">
				<?php echo nl2br(htmlentities(utf8_decode($parameters["top_content"]))); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
		<?php if(!empty($parameters["picture"]) && is_file(sfConfig::get('sf_web_dir').$parameters["picture"])): ?>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3" align="center">
			<?php printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters["picture"], 600, false), 	getThumbnailSize($parameters["picture"], 600, false)); ?>
			</td>
		</tr>
		<?php endif ?>



		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="20"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="562" align="center">
				<font face="Times" style="line-height: 30px; font-size: 24px;font-style: italic;" size="2" color="#392b2e">
				<?php echo nl2br(htmlentities(utf8_decode($parameters["middle_content"]))); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<?php if (!empty($parameters["button_link"])): ?>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3" align="center">
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["button_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/button.gif" width="370" height="53" alt="" border="0" /></a>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
		<?php if (!empty($parameters["bottom_content"])):?>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="20"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="562" align="center">
				<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#8d8d8d">
				<?php echo nl2br(htmlentities(utf8_decode($parameters["bottom_content"]))); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_wh.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
	</table>

<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/pre_footer_l.jpg" width="130" height="32" alt="" border="0" /></td>
			<td width="340"><!--a href="javascript://" target="_blank"--><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/link.jpg" width="340" height="32" alt="" border="0" /><!--/a--></td>
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/pre_footer_r1.jpg" width="130" height="32" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/pre_footer_2.jpg" width="600" height="21" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="192"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/filet_l.gif" width="192" height="24" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="26">

			<?php

				if (!empty($parameters["facebook_link"])) {
					printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank"><img src="%s/fleuronsPlugin/images/campaignOpeSpecialWizzard/fb.gif" width="26" height="24" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters["facebook_link"]), CatalyzEmailing::getApplicationUrl());
				}else{
					echo '&nbsp;';
				}

				?>
			</td>
			<td width="212" align="center" valign="middle">
				<font face="Arial" style="font-size: 10px;line-height: 16px;font-weight: bold;" size="2" color="#FFFFFF">

				<?php

				if (!empty($parameters["website_link"])) {
					printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["website_link"]), !empty($parameters["website_caption"])?htmlentities($parameters["website_caption"], ENT_COMPAT, 'utf-8'):'LIEN');
				}else{
					echo '&nbsp;';
				}

				?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="170"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/filet_r.gif" width="170" height="24" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
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
	$secondLine[]= sprintf('mail : <a style="text-decoration: none;color:#FFFFFF;" href="mailto:%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["contact_link"]), !empty($parameters["contact_caption"])?htmlentities($parameters["contact_caption"], ENT_COMPAT, 'utf-8'):'LIEN');
}

if (!empty($secondLine)) {
	printf('<br/>%s', implode(' - ', $secondLine));
}

?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
			<td width="480" align="center">
				<?php if (!empty($parameters["footer_content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#9f8a8f", "font-size: 10px;line-height: 14px;"); echo $renderer->renderWysiwyg($parameters["footer_content"], "#9f8a8f"); } ?>

				<font face="Arial" style="font-size: 10px;line-height: 14px;" size="2" color="#9f8a8f">
<br/>
Si vous ne souhaitez plus recevoir nos lettres d'informations,<br/>
vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#9f8a8f;">cliquant ici</a>.
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignOpeSpecialWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
	</table>
</body>
</html>