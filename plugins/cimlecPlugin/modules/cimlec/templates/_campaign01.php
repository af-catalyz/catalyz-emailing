<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="center" colspan="5">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 9px;text-align:center; " size="2" color="#ababab">
					Si vous avez des difficult&eacute;s pour visualiser ce message et ses images. <a style="color:#ababab;" href="#VIEW_ONLINE#" target="_blank">Cliquez ici</a>.
				</font>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="5">
				<img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="1" height="20" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td width="207"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="1" height="1" alt="" border="0" /></td>
			<td colspan="3"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/top_box_t.gif" width="377" height="7" alt="" border="0" /></td>
			<td width="16"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="16" height="1" alt="" border="0" /></td>
		</tr>
		<tr>
			<td valign="top" align="center" width="207"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/logo.gif" width="155" height="36" alt="" border="0" /></td>
			<td width="22"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/top_box_l.gif" width="22" height="39" alt="" border="0" /></td>

			<td width="333">
				<?php
				if (!empty($parameters['top_content'])) {
					printf('<font face="Tahoma, Geneva, sans-serif" style="line-height: 16px; font-size: 13px;" size="2" color="#f18513">%s</font>', nl2br($parameters['top_content']));
				}
				 ?>
			</td>
			<td width="22"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/top_box_r.gif" width="22" height="39" alt="" border="0" /></td>
			<td width="16"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="16" height="1" alt="" border="0" /></td>
		</tr>

		<tr style="line-height:0; font-size: 0;">
			<td width="207"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="1" height="1" alt="" border="0" /></td>
			<td colspan="3"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/top_box_b.gif" width="377" height="23" alt="" border="0" /></td>
			<td width="16"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="16" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="5"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters['top_picture'])) {
			printf('<tr style="line-height:0; font-size: 0;"><td><img style="display:block;" src="%s%s" width="600" height="198" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl(),thumbnail_path($parameters['top_picture'], 600, 198));
		} ?>

		<tr style="line-height:0; font-size: 0;">
			<td><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_top.jpg" width="600" height="40" alt="" border="0" /></td>
		</tr>
	</table>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">

		<tr valign="top">
			<td width="47" bgcolor="#b97b92"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_l2.jpg" width="47" height="199" alt="" border="0" /></td>
			<td width="1" bgcolor="#f2931f"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="23" bgcolor="#FFFFFF"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" /></td>
			<td width="457">
				<?php
				if (!empty($parameters['content'])) {
					printf('<font face="Tahoma, Geneva, sans-serif" style="line-height: 14px; font-size: 12px;" size="2" color="#23032e">%s</font>', nl2br(trim($parameters['content'])));
				}

				if (!empty($parameters['nom']) || !empty($parameters['statut']) || !empty($parameters['email'])) {
					echo '<font face="Tahoma, Geneva, sans-serif" style="line-height: 20px; font-size: 12px;" size="2" color="#9a074b">';

					if (!empty($parameters['nom'])) {
						printf('<br/>%s', trim(htmlentities($parameters['nom'], ENT_COMPAT, "utf-8")));
					}
					if (!empty($parameters['statut'])) {
						printf('<br/>%s', trim(htmlentities($parameters['statut'], ENT_COMPAT, "utf-8")));
					}
					if (!empty($parameters['email'])) {
						printf('<br/><a style="color:#9a074b;" href="mailto:%1$s">%1$s</a>', trim(htmlentities($parameters['email'], ENT_COMPAT, "utf-8")));
					}

					echo '</font>';
				}

				?>

			</td>
			<td width="29" bgcolor="#FFFFFF"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/sep.gif" width="29" height="1" alt="" border="0" /></td>
			<td width="1" bgcolor="#f2931f"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="42" bgcolor="#780b2b"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_r2.jpg" width="42" height="199" alt="" border="0" /></td>
		</tr>
	</table>
	<table width="600" bgcolor="#f39320" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="428"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_b2.jpg" width="428" height="19" alt="" border="0" /></td>
			<td width="120" align="right">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 18px; font-size: 12px;" size="2" color="#FFFFFF">
					<a style="color:#FFFFFF;text-decoration: none;" href="http://www.cimlec.fr" target="_blank">www.cimlec.fr</a>
				</font>
			</td>
			<td><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_b3.jpg" width="52" height="19" alt="" border="0" /></td>
		</tr>
		<tr >
			<td colspan="3"><img style="display:block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cimlecPlugin/images/campaign01/content_b4.jpg" width="600" height="40" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="center" bgcolor="#ffffff">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 10px;text-align:center; " size="2" color="#b6b6b6">
				Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification et d'opposition<br/>
				aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#b6b6b6;" href="mailto:contact@cimlec.fr" target="_blank">contact@cimlec.fr</a><br/>
				ou en cliquant sur ce <a style="color:#b6b6b6;" href="#UNSUBSCRIBE#" target="_blank">lien de d&#233;sinscription</a>
				</font>
			</td>
		</tr>
	</table>
</body>
</html>