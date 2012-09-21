<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#cc3300" link="#cc3300" alink="#cc3300">
	<?php
	$parameters = unEscape($parameters);
	$renderer = new CatalyzEmailRenderer('Arial, Helvetica, sans-serif','#6c6c6c','line-height: 16px; font-size: 13px;font-style: italic;');
	use_helper('atp5s');
	?>

	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center" bgcolor="#ffffff" colspan="3">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 13px; font-size: 10px;" size="2" color="#858585">Si les images ne s'affichent pas correctement, <a style="color:#858585;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a><br />
				</font>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="10" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td width="26" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/left.png" width="26" height="277" alt="" border="0" /></td>
			<td width="1" style="line-height: 0px; font-size: 0px;" bgcolor="#cccccc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_grey.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="573">
				<table width="573" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="268" style="line-height: 0px; font-size: 0px;">
						<a href="http://www.atp5s.com/" target="_blank">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/logo.png" width="268" height="106" alt="" border="0" /></td>
						</a>
						<td width="305">
						<?php
	if (!empty($parameters['picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['picture'])) {
		printf('<img src="%s" alt="" border="0" />', thumbnail_with_mask($parameters['picture'],true));
	}
	?>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="40" alt="" border="0" /></td>
					</tr>
				</table>

				<?php if (!empty($parameters['edito_title']) || !empty($parameters['edito'])) : ?>
				<table width="573" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="110" align="center" style="line-height: 0px; font-size: 0px;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/bullet_01.png" width="51" height="78" alt="" border="0" />
						</td>
						<td width="418">

							<?php

	if (!empty($parameters['edito_title'])) {
		printf('<font face="Arial, Helvetica, sans-serif" style="line-height: 23px; font-size: 19px;font-weight: bold;" size="2" color="#cc3300">%s</font>', nl2br(htmlentities($parameters['edito_title'], ENT_COMPAT, 'utf-8')));
	}

	if (!empty($parameters['edito'])) {
		$renderer->renderWysiwyg(utf8_decode($parameters['edito']),'#6c6c6c');
	}
	?>
						</td>
						<td width="45" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="40" alt="" border="0" /></td>

					</tr>
					<tr valign="top" style="line-height: 0px; font-size: 0px;">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="20" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>

				<?php if (!empty($parameters['custom']) || !empty($parameters['left_column']) || !empty($parameters['right_column'])) : ?>
				<table width="573" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					<?php if (!empty($parameters['left_column']) || !empty($parameters['right_column'])) : ?>
					<tr valign="top">
						<td width="27" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="271">
							<?php
	if (!empty($parameters['left_column']) ) {
		$renderer->setColor('#000000');
		$renderer->setStyle('line-height: 16px; font-size: 13px;');
		$renderer->renderWysiwyg(utf8_decode($parameters['left_column']),'#000000');
	}
	?>
						</td>
						<td width="22" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="219">
							<?php
	if (!empty($parameters['right_column']) ) :
	?>
							<table width="219" bgcolor="#cc3300" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top" style="line-height: 0px; font-size: 0px;">
									<td width="21" align="left"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/orange_t_l.gif" width="5" height="5" alt="" border="0" /></td>
									<td width="177"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_orange.gif" width="1" height="1" alt="" border="0" /></td>
									<td width="21" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/orange_t_r.gif" width="5" height="5" alt="" border="0" /></td>
								</tr>

								<tr valign="top">
									<td width="21" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_orange.gif" width="1" height="1" alt="" border="0" /></td>
									<td width="177" align="center">

										<?php
										$renderer->setColor('#ffffff');
	$renderer->setStyle('line-height: 18px; font-size: 14px;');
	$renderer->renderWysiwyg(utf8_decode($parameters['right_column']),'#ffffff');
	?>
									</td>
									<td width="21" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_orange.gif" width="1" height="1" alt="" border="0" /></td>
								</tr>

								<tr valign="top" style="line-height: 0px; font-size: 0px;">
									<td width="21" align="left"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/orange_b_l.gif" width="5" height="5" alt="" border="0" /></td>
									<td width="177"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_orange.gif" width="1" height="1" alt="" border="0" /></td>
									<td width="21" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/orange_b_r.gif" width="5" height="5" alt="" border="0" /></td>
								</tr>
							</table>
							<?php endif ?>
						</td>
						<td width="34" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<tr valign="top" style="line-height: 0px; font-size: 0px;">
						<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="10" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['custom'])) : ?>
					<tr valign="top">
						<td width="27" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
						<td colspan="3">

							<?php
						$renderer->setColor('#000000');
	$renderer->setStyle('line-height: 16px; font-size: 13px;');
	$renderer->renderWysiwyg(utf8_decode($parameters['custom']),'#000000');
	?>
						</td>
						<td width="34" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr valign="top" style="line-height: 0px; font-size: 0px;">
						<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="10" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
				</table>
				<?php endif ?>
			</td>


		</tr>
	</table>

	<?php if (!empty($parameters['blue_content'])) : ?>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td colspan="4" bgcolor="#297cc2" width="54" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_blue.gif" width="1" height="11" alt="" border="0" /></td>
			<td width="23" bgcolor="#297cc2" valign="top" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/blue_r.gif" width="23" height="11" alt="" border="0" /></td>
			<td width="32" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td colspan="3" bgcolor="#297cc2" width="54" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_blue.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="491" bgcolor="#297cc2" align="center">
				<?php
				$renderer->setColor('#ffffff');
	$renderer->setStyle('line-height: 18px; font-size: 14px;font-weight: bold;');
	$renderer->renderWysiwyg(utf8_decode($parameters['blue_content']),'#ffffff');
	?>
			</td>
			<td width="23" bgcolor="#297cc2" valign="top" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_blue.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="32" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td colspan="5" bgcolor="#297cc2" width="54" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_blue.gif" width="1" height="11" alt="" border="0" /></td>
			<td width="32" style="line-height: 0px; font-size: 0px;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top" style="line-height: 0px; font-size: 0px;">
			<td width="26"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="30" alt="" border="0" /></td>
			<td width="1" bgcolor="#cccccc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/border_grey.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="27"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="491" align="right" valign="top"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/shaddow_l.png" width="221" height="7" alt="" border="0" /></td>
			<td width="23" valign="top"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/shaddow_r.png" width="23" height="7" alt="" border="0" /></td>
			<td width="32"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>


	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top" style="line-height: 0px; font-size: 0px;">
			<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/atp5sPlugin/images/campaign01/spacer.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td align="center">
				<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 12px; font-size: 10px;" size="2" color="#858585">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification<br />et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#858585;"
href="mailto:info@atp5s.com" target="_blank">info@atp5s.com</a><br />ou en cliquant sur ce <a style="color:#858585;" href="#UNSUBSCRIBE#" target="_blank">lien de d&#233;sinscription</a><br />
				</font>
			</td>
		</tr>
	</table>
</body>
</html>