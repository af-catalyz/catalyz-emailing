<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<?php $parameters = $parameters->getRawValue() ?>
<body alink="#FFFFFF" vlink="#FFFFFF" link="#FFFFFF">
	<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			<td colspan="3" align="center">
					<font face="Arial, Helvetica, sans-serif;" style="line-height: 15px; font-size: 9px;" size="2" color="#605E5F">
						Si vous avez des difficult&eacute;s pour visualiser ce message et ses images. <a style="color: #605e5f;" href="#VIEW_ONLINE#" target="_blank">consultez la page suivante</a>
					</font>
			</td>
		</tr>
		<tr>
			<td width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="100" alt="" border="0" /></td>
			<td align="right">
					<font face="Arial, Helvetica, sans-serif;" style="font-weight: bold; line-height: 60px; font-size: 56px;" size="2" color="#9F1920">
						INVITATION
					</font>
					<font face="Arial, Helvetica, sans-serif;" style="font-weight: bold; line-height: 15px; font-size: 16px;" size="2" color="#8A8D90">
						<br />
						<br />
						<?php
							if (isset($parameters['baseline'])) {
								echo $parameters['baseline'];
							}
						 ?>
					</font>

			</td>
			<td width="61"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="100" alt="" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/graphic.jpg" height="260" width="600" alt="" /></td>
		</tr>
	</table>

	<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#BD1723">
		<tr>
			<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/red.gif" height="10" width="1" alt=""/></td>
		</tr>
		<tr valign="top">
			<td width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/red.gif" width="87" height="1" alt="" border="0" /></td>
			<td width="426">
				<?php

				$renderer = new CatalyzEmailRenderer('Arial, Helvetica, sans-serif;', '#ffffff', 'line-height: 18px; font-size: 13px;');

				if (!empty($parameters['top_content'])) {
					$renderer->renderWysiwyg($parameters['top_content']);
				}
				?>
			</td>
			<td width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/red.gif" width="87" height="1" alt="" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/red.gif" height="10" width="1" alt="" /></td>
		</tr>
	</table>

	<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#868A8D">
		<tr>
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/grey.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr align="center">
			<td width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/grey.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="426">
					<?php
					if (!empty($parameters['bottom_content'])) {
							$renderer->renderWysiwyg($parameters['bottom_content']);
					}
					?>
			</td>
			<td width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/grey.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/grey.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr align="center">
			<td width="40"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="520">
					<font face="Arial, Helvetica, sans-serif;" style="line-height: 13px; font-size: 10px;" size="2" color="#868A8D">
						Conform&eacute;ment &agrave; la loi Informatique et Libert&eacute;s du 06/01/1978, vous disposez d'un droit d'acc&egrave;s,<br />
						de rectification et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &agrave;<br />
						<a style="color: #868a8d;" href="mailto:contact@kreactiv.fr">contact@kreactiv.fr</a> ou par courrier en indiquant votre nom et pr&eacute;nom.<br />
						Si vous souhaitez vous d&eacute;sinscrire, <a style="color: #868a8d;" href="#UNSUBSCRIBE#">cliquez ici</a>.
					</font>
			</td>
			<td width="40"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20120109/sep.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
	</table>

</body>
</html>