<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body alink="#669933" vlink="#669933" link="#669933">
	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top" style="line-height:0; font-size: 0;">
			<td width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/header_1.jpg" width="50" height="99" alt="" border="0" /></td>
			<td width="154">
				<a href="http://www.doumercpneus.net/" target="_blank">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/logo.gif" width="154" height="99" alt="" border="0" />
				</a>
			</td>
			<td width="458"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/header_2.jpg" width="458" height="99" alt="" border="0" /></td>
		</tr>
		<tr valign="top" style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/header_3.jpg" width="662" height="41" alt="" border="0" /></td>
		</tr>
	</table>

	<?php if (!empty($parameters["date"])) : ?>
	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="50" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="592" align="right">
				<font face="Arial" style="font-size: 11px; line-height: 15px;" size="2" color="#999999">
					<?php echo $parameters["date"]; ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="20"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="20" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<?php if (!empty($parameters["main_content"])) : ?>
	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="50" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="568">
				<?php if (!empty($parameters["main_content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#666666", "font-size: 11px; line-height: 15px;"); echo $renderer->renderWysiwyg($parameters["main_content"], "#666666"); } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="44"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="44" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<table width="662" bgcolor="#1c2a58" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/footer_1.jpg" width="662" height="32" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_b.gif" width="15" height="1" alt="" style="display:block;" border="0" /></td>
			<td align="center" width="242">
				<font face="Arial" style="font-size: 11px; line-height: 15px;" size="2" color="#ffffff">
					<?php echo nl2br(htmlentities(utf8_decode($parameters["adress"]))); ?>
				</font>
			</td>
			<td align="center" width="250">
				<font face="Arial" style="font-size: 12px; line-height: 16px;font-weight: bold;" size="2" color="#ffffff">
				<?php if(isset($parameters["phone"])){ ?><?php echo $parameters["phone"]; ?><?php } ?>
				<br />
				<?php if(!empty($parameters["website_link"])){
					printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["website_link"]), !empty($parameters["website_caption"])?$parameters["website_caption"]:'LIEN');
				}
				?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="140">
				<?php if(isset($parameters["facebook_link"])){ ?>
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["facebook_link"]); ?>" target="_blank">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/facebook.gif" width="140" height="38" alt="" border="0" />
				</a>
				<?php } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_b.gif" width="15" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/footer_2.jpg" width="662" height="44" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="602" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#999999;">ce lien de désinscription</a>.</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign03Wizzard/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>