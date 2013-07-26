<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#787878" link="#787878" alink="#787878">
	<?php
		$parameters = unEscape($parameters);
		$renderer = new CatalyzEmailRenderer('Trebuchet MS, sans-serif','#333333','line-height: 26px; font-size: 16px;');
	?>
	<table width="689" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0; font-size: 0;" valign="bottom">
			<td colspan="3" width="689">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/header_0.jpg" width="689" height="27" alt="" style="display: block;" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height: 0; font-size: 0;" width="79">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/header_1_l.jpg" width="79" height="19" alt="" style="display: block;" border="0" />
			</td>
			<td width="299" valign="middle" bgcolor="#d4d0cf">
				<font face="Trebuchet MS, sans-serif" style="line-height: 11px; font-size: 9px;" size="2" color="#333333">Si les images ne s'affichent pas correctement, <a style="color:#333333;" href="#VIEW_ONLINE#" target="_blank"><font color="#333333">cliquez ici</font></a>.
				</font>
			</td>
			<td style="line-height: 0; font-size: 0;" width="311">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/header_1_r.jpg" width="311" height="19" alt="" style="display: block;" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0; font-size: 0;" valign="top">
			<td colspan="3" width="689">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/header_2.jpg" width="689" height="71" alt="" style="display: block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="689" bgcolor="#f2f2f2" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="79"  style="line-height: 0; font-size: 0; background-image: url(<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/left_bg.png); background-repeat: repeat-y;">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/left.jpg" width="79" height="315" alt="" style="display: block;" border="0" />
			</td>
			<td width="536" align="center">

				<?php
				if (!empty($parameters['edito'])) {
					$renderer->renderWysiwyg( utf8_decode($parameters['edito']),'#333333');
				}

				if (!empty($parameters['website_link'])) {
					printf('<p style="margin-top: 0;">
					<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 22px; font-weight: bold;margin-top: 0;" size="2" color="#333333">
					<a style="color:#333333;" href="%s" target="_blank"><font color="#333333">www.newtech.fr</font></a>
					</font>
				</p>', czWidgetFormLink::displayLink($parameters['website_link']));
				}
				?>

				<table width="536" bgcolor="#dfdfdf" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height: 0; font-size: 0;">
						<td colspan="3" bgcolor="#f2f2f2">
							<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="1" height="10" alt="" style="display: block;" border="0" />
						</td>
					</tr>
					<?php if (!empty($parameters['offers_link'])) : ?>
					<tr valign="middle">
						<td width="332" align="right">
							<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 14px;font-weight: bold;" size="2" color="#333333">Pour d&#233;couvrir nos nouvelles offres sans tarder,
							</font>
						</td>
						<td width="17" style="line-height: 0; font-size: 0;"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_h.gif" width="1" height="35" alt="" style="display: block;" border="0" /></td>
						<?php printf('<td width="187" align="left"><a href="%s" target="_blank"><img src="%s/newtechPlugin/images/campaign01/button_1.jpg" width="104" height="35" alt="" border="0" /></a></td>', czWidgetFormLink::displayLink($parameters['offers_link']),CatalyzEmailing::getApplicationUrl()) ?>
					</tr>
					<tr style="line-height: 0; font-size: 0;">
						<td colspan="3" bgcolor="#f2f2f2">
							<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="1" height="8" alt="" style="display: block;" border="0" />
						</td>
					</tr>
					<?php endif ?>

					<?php if (!empty($parameters['contact_link'])) : ?>
					<tr valign="middle">
						<td width="332" align="right">
							<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 14px;font-weight: bold;" size="2" color="#333333">Pour &#234;tre contact&#233;,
							</font>
						</td>
						<td width="17" style="line-height: 0; font-size: 0;"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_h.gif" width="1" height="35" alt="" style="display: block;" border="0" /></td>
						<?php printf('<td width="187" align="left"><a href="%s" target="_blank"><img src="%s/newtechPlugin/images/campaign01/button_%s.jpg" width="104" height="35" alt="" border="0" /></a></td>', czWidgetFormLink::displayLink($parameters['contact_link']),CatalyzEmailing::getApplicationUrl(), empty($parameters['offers_link'])?'1':'2') ?>
					</tr>
					<tr style="line-height: 0; font-size: 0;">
						<td colspan="3" bgcolor="#f2f2f2">
							<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="1" height="8" alt="" style="display: block;" border="0" />
						</td>
					</tr>
					<?php endif ?>

					<?php if (!empty($parameters['phone'])) : ?>
					<tr valign="middle">
						<td width="332" align="right">
							<?php
							$v = 'V';
							if (!empty($parameters['offers_link']) || !empty($parameters['contact_link'])) {
								$v = 'v';
								echo '<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 14px;" size="2" color="#333333">Sinon,</font>';
							}
							printf('<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 14px;font-weight: bold;" size="2" color="#333333">%sous pouvez nous  joindre</font>', $v);
							?>
							<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 14px;" size="2" color="#333333"> au</font>
						</td>
						<td width="17" style="line-height: 0; font-size: 0;"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_h.gif" width="1" height="35" alt="" style="display: block;" border="0" /></td>
						<td width="187" align="left">
							<?php printf('<font face="Trebuchet MS, sans-serif" style="line-height: 26px; font-size: 24px;font-weight: bold;" size="2" color="#333333">%s</font>', htmlentities($parameters['phone'], ENT_COMPAT, 'utf-8')); ?>
						</td>
					</tr>
					<tr style="line-height: 0; font-size: 0;">
						<td colspan="3" bgcolor="#f2f2f2">
							<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="1" height="10" alt="" style="display: block;" border="0" />
						</td>
					</tr>
					<?php endif ?>
				</table>

				<table width="536" bgcolor="#f2f2f2" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td style="line-height: 0; font-size: 0;" width="82"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="82" height="1" alt="" style="display: block;" border="0" /></td>
						<td width="378" align="center">
							<?php
							$renderer->setStyle('line-height: 26px; font-size: 14px;');

							if (!empty($parameters['footer'])) {
								$renderer->renderWysiwyg( utf8_decode($parameters['footer']),'#333333');
							} ?>
						</td>
						<td style="line-height: 0; font-size: 0;" width="76"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="76" height="1" alt="" style="display: block;" border="0" /></td>
					</tr>
					<tr>
						<td colspan="3" style="line-height: 0; font-size: 0;" width="82"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="1" height="10" alt="" style="display: block;" border="0" /></td>
					</tr>
					<tr>
						<td style="line-height: 0; font-size: 0;" width="82"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="82" height="1" alt="" style="display: block;" border="0" /></td>
						<td width="378" align="right">
							<?php if (!empty($parameters['thanks'])) {
								$renderer->renderWysiwyg(utf8_decode($parameters['thanks']),'#333333');
							} ?>
						</td>
						<td style="line-height: 0; font-size: 0;" width="76"><img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/table_sep.gif" width="76" height="1" alt="" style="display: block;" border="0" /></td>
					</tr>
				</table>

			</td>
			<td width="74" style="line-height: 0; font-size: 0; background-image: url(<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/right_bg.png); background-repeat: repeat-y;">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/right.jpg" width="74" height="315" alt="" style="display: block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="689" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td width="178" style="line-height: 0; font-size: 0;" valign="top">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/footer_0_l.jpg" width="178" height="191" alt="" style="display: block;" border="0" />
			</td>
			<td width="323" valign="top" style="line-height: 0; font-size: 0;">
				<?php if (!empty($parameters['footer_link'])) {
					printf('<a href="%s" target="_blank"><img src="%s/newtechPlugin/images/campaign01/footer_0_c.jpg" width="323" height="191" alt="" style="display: block;" border="0" /></a>', czWidgetFormLink::displayLink($parameters['footer_link']), CatalyzEmailing::getApplicationUrl());
				}else{
					printf('<img src="%s/newtechPlugin/images/campaign01/footer_0_c.jpg" width="323" height="191" alt="" style="display: block;" border="0" />', CatalyzEmailing::getApplicationUrl());
				}
				?>
			</td>
			<td width="188" style="line-height: 0; font-size: 0;" valign="top">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/footer_0_r.jpg" width="188" height="191" alt="" style="display: block;" border="0" />
			</td>
		</tr>
	</table>
	<table width="689" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height: 0; font-size: 0;" width="79" align="left" valign="top">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/footer_l.jpg" width="27" height="109" alt="" style="display: block;" border="0" />
			</td>
			<td width="536" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 10px;" size="2" color="#666666">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s,<br />
de rectification et d'opposition aux informations vous concernant qui peut s'exercer par<br />
e-mail &#224; <a style="color:#666666;" href="mailto:contact@newtech.fr" target="_blank"><font color="#666666">contact@newtech.fr</font></a> ou en cliquant sur <a style="color:#666666;" href="#UNSUBSCRIBE#" target="_blank"><font color="#666666">ce lien de d&#233;sinscription</font></a>.
				</font></td>
			<td style="line-height: 0; font-size: 0;" width="74" align="right" valign="top">
				<img  src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/newtechPlugin/images/campaign01/footer_r.jpg" width="23" height="109" alt="" style="display: block;" border="0" />
			</td>
		</tr>
	</table>
</body>
</html>