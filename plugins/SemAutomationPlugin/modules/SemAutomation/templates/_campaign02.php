<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<?php

use_helper('sem');

$renderer = new CatalyzEmailRenderer('Arial','#333333','line-height: 22px; font-size: 12px;');

 ?>
<body link="#3B3B3B" alink="#3B3B3B" vlink="#3B3B3B">
	<table width="601" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 9px;text-align:center; " size="2" color="#c9c9c9">Si vous avez des difficult&eacute;s pour visualiser ce message et ses images, <a style="color:#c9c9c9;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td align="center">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="5" alt="" style="display: block;"  border="0" />
			</td>
		</tr>
	</table>

	<table width="601" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="218" style="border: 1px solid #cccccc;">
				<table width="218" cellspacing="0" cellpadding="0" border="0" >
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3" width="218"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						<td bgcolor="#a21636" width="216" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_a2.gif" width="1" height="7" alt="" style="display: block;"  border="0" />
						</td>
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<?php if (!empty($parameters['titre'])) :?>
					<tr valign="top">
						<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						<td bgcolor="#a21636" width="216" align="center">
							<?php printf('<font face="Arial" style="line-height: 36px; font-size: 30px;" size="2" color="#FFFFFF">%s</font>', htmlentities($parameters['titre'], ENT_COMPAT, 'utf-8') ) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<?php endif ?>
					<tr valign="top">
						<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						<td bgcolor="#a21636" width="216" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_a2.gif" width="1" height="7" alt="" style="display: block;"  border="0" />
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<?php if (!empty($parameters['logo_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['logo_picture'])) :?>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3" width="218"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3" width="218" align="center">
							<?php
							if (!empty($parameters['logo_target'])) {
								printf('<a href="%s" target="_blank"><img src="%s%s" alt="" style="display: block;"  border="0" /></a>', czWidgetFormLink::displayLink($parameters['logo_target']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['logo_picture'], 216, 100));
							}else{
								printf('<img src="%s%s" alt="" style="display: block;"  border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['logo_picture'], 216, 100));
							}
							 ?>
						</td>
					</tr>
					<?php endif ?>
				</table>
			</td>
			<td style="line-height: 0px; font-size: 0px;" bgcolor="#ffffff" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="2" height="1" alt="" style="display: block;"  border="0" /></td>
			<td style="line-height: 0px; font-size: 0px;" bgcolor="#ffffff" width="379" align="center">
				<?php if (!empty($parameters['bandeau_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['bandeau_picture'])){
					if (!empty($parameters['bandeau_target'])) {
						printf('<a href="%s" target="_blank"><img src="%s%s" alt="" style="display: block;"  border="0" /></a>', czWidgetFormLink::displayLink($parameters['bandeau_target']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['bandeau_picture'], 379, 154));
					}else{
						printf('<img src="%s%s" alt="" style="display: block;"  border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['bandeau_picture'], 379, 154));
					}
				}?>
			</td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="18" alt="" style="display: block;"  border="0" /></td>
		</tr>
	</table>

	<table width="601" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="220">
				<table width="218" style="border: 1px solid #cccccc;" cellspacing="0" cellpadding="0" border="0" >
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<?php if (!empty($parameters['left_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['left_picture'])): ?>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						<td width="216">
							<?php

								if (!empty($parameters['left_target'])) {
									printf('<a href="%s" target="_blank"><img src="%s%s" alt="" style="display: block;"  border="0" /></a>', czWidgetFormLink::displayLink($parameters['left_target']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['left_picture'], 216, 329));
								}else{
									printf('<img src="%s%s" alt="" style="display: block;"  border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['left_picture'], 216, 329));
								}

							 ?>

						</td>
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="24" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<?php endif ?>
					<tr valign="top">
						<td colspan="3">
							<table width="218" cellspacing="0" cellpadding="0" border="0" >
								<tr valign="top">
									<td style="line-height: 0px; font-size: 0px;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
									<td width="200">
										<?php
										if (!empty($parameters['left_content'])) {
											renderLeft($parameters['left_content']);
										}
										?>
									</td>
									<td style="line-height: 0px; font-size: 0px;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
								</tr>
							</table>
						</td>
					</tr>

					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						<td width="216">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/bulles.jpg" width="216" height="125" alt="" style="display: block;"  border="0" />
						</td>
						<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
					</tr>
				</table>
			</td>
			<td style="line-height: 0px; font-size: 0px;" bgcolor="#ffffff" width="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="2" height="1" alt="" style="display: block;"  border="0" /></td>
			<td bgcolor="#ffffff" width="379">
					<?php
					if (!empty($parameters['right_content'])) {
						renderRight($parameters['right_content']);
					}

					if (!empty($parameters['right_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['right_picture'])){
						if (!empty($parameters['right_target'])) {
							printf('<a href="%s" target="_blank"><img src="%s%s" alt="" style="display: block;"  border="0" /></a>', czWidgetFormLink::displayLink($parameters['right_target']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['right_picture'], 378, 123));
						}else{
							printf('<img src="%s%s" alt="" style="display: block;"  border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['right_picture'], 378, 123));
						}
					}
					?>

					<?php if (!empty($parameters['contact_text'])) :?>
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_content.gif" width="378" height="11" alt="" style="display: block;"  border="0" />
					<?php printf('<font face="Tahoma, Geneva, sans-serif" style="line-height: 14px; font-size: 12px; text-align: center; display: block;" size="2" color="#990033">%s</font>', htmlentities($parameters['contact_text'], ENT_COMPAT, 'utf-8') ) ?>
					<?php endif ?>

			</td>
		</tr>
	</table>



	<table width="601" bgcolor="#2d2d2d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td bgcolor="#FFFFFF" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="15" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_2d.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3" bgcolor="#6a6a6a"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_6a.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3" bgcolor="#000000"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_black.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_2d.gif" width="1" height="3" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height: 0px; font-size: 0px;" width="80"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_2d.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="441" align="center">
				<font face="Tahoma, Geneva, sans-serif" style="text-align:center; font-size: 9px;line-height: 14px;" size="2" color="#c9c9c9">
				Pour ne plus recevoir la lettre d'information d'Omax Corporation, <a style="color:#c9c9c9;" href="#UNSUBSCRIBE#" target="_blank">d&#233;sinscrivez-vous</a>
				</font>
			</td>
			<td style="line-height: 0px; font-size: 0px;" width="80"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_2d.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_2d.gif" width="1" height="5" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr valign="top" bgcolor="#FFFFFF">
			<td style="line-height: 0px; font-size: 0px;" width="80"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="441" align="center">
				<font face="Tahoma, Geneva, sans-serif" style="text-align:center; font-size: 9px;line-height: 14px;" size="2" color="#c9c9c9">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#c9c9c9;"
href="mailto:emailing@sem-automation.fr" target="_blank">emailing@sem-automation.fr</a></font>
			</td>
			<td style="line-height: 0px; font-size: 0px;" width="80"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
	</table>


</body>
</html>
