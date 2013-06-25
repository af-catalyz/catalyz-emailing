<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<?php use_helper('sem'); ?>

 <body link="#333333" alink="#333333" vlink="#333333">
	<table width="602" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Arial" style="line-height: 12px; font-size: 9px;text-align:center; " size="2" color="#c9c9c9">Si vous avez des difficult&eacute;s pour visualiser ce message et ses images, <a style="color:#c9c9c9;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td align="center">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="5" alt="" style="display: block;"  border="0" />
			</td>
		</tr>
	</table>

	<table width="602" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td bgcolor="#e4e4e4" width="237"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_e3.gif" width="1" height="20" alt="" style="display: block;"  border="0" /></td>
			<td colspan="2" bgcolor="#87888a" width="363"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_87.gif" width="1" height="20" alt="" style="display: block;"  border="0" /></td>
			<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td align="center" bgcolor="#e4e4e4" style="line-height: 0px; font-size: 0px;" width="237">
			<?php
if (!empty($parameters['logo_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['logo_picture'])) {
	if (!empty($parameters['logo_target'])) {
		printf('<a href="%s" target="_blank"><img src="%s%s" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters['logo_target']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['logo_picture'], 237, 400));
	}else{
		printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['logo_picture'], 237, 400));
	}
}
?>
			</td>
			<td bgcolor="#87888a" style="line-height: 0px; font-size: 0px;" width="26"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_87.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td valign="middle" bgcolor="#87888a" style="line-height: 0px; font-size: 0px;" width="337">
				<?php
if (!empty($parameters['titre'])) {
	printf('<font face="Arial" style="line-height: 24px; font-size: 20px;" size="2" color="#ffffff">%s</font>', nl2br(htmlentities($parameters['titre'], ENT_COMPAT, 'utf-8')) );
}
?>
			</td>
			<td style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td bgcolor="#e4e4e4" width="237"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_e3.gif" width="1" height="20" alt="" style="display: block;"  border="0" /></td>
			<td colspan="2" bgcolor="#87888a" style="line-height: 0px; font-size: 0px;" width="363"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_87.gif" width="1" height="20" alt="" style="display: block;"  border="0" /></td>
			<td width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="2" width="238"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/header_l_2.png" width="238" height="64" alt="" style="display: block;"  border="0" /></td>
			<td colspan="3" width="364"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/header_r_2.png" width="364" height="58" alt="" style="display: block;"  border="0" /></td>
		</tr>
	</table>

	<table width="602" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height: 0px; font-size: 0px;" width="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="225">
				<?php
if (!empty($parameters['left_content'])) {
	renderCampaign03($parameters['left_content'],'left');
}
?>


			</td>
			<td style="line-height: 0px; font-size: 0px;" width="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td bgcolor="#999999" style="line-height: 0px; font-size: 0px;" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_99.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td style="line-height: 0px; font-size: 0px;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="334">

			<?php
if (!empty($parameters['right_content'])) {
	renderCampaign03($parameters['right_content'],'right');
}
?>

			</td>
			<td style="line-height: 0px; font-size: 0px;" width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
	</table>

	<table width="602" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td bgcolor="#f5b014" valign="bottom" style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/footer_l.png" width="50" height="35" alt="" style="display: block;"  border="0" /></td>
			<td style="line-height: 0px; font-size: 0px;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="35" alt="" style="display: block;"  border="0" /></td>
			<td width="208">
				<?php
if (!empty($parameters['website'])) {
	printf('<img src="%1$s/SemAutomationplugin/images/campaign03/bullet.gif" width="11" height="11" alt="" border="0" />&nbsp;<font face="Arial" style="font-weight: bold; font-size: 11px;line-height: 20px;" size="2" color="#006666">
	<a style="color:#006666;" href="%2$s" target="_blank">VISITEZ NOTRE SITE WEB</a>
				</font>&nbsp;<img src="%1$s/SemAutomationplugin/images/campaign03/france.gif" width="16" height="15" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($parameters['website']) );
}
?>


			</td>
			<td width="234">

			<?php
if (!empty($parameters['contact_name'])) {
	printf('<img src="%s/SemAutomationplugin/images/campaign03/bullet.gif" width="11" height="11" alt="" border="0" />&nbsp;<font face="Arial" style="font-weight: bold; font-size: 11px;line-height: 20px;" size="2" color="#006666">', CatalyzEmailing::getApplicationUrl());

	if (!empty($parameters['contact_target'])) {
		printf('<a style="color:#006666;" href="mailto:%s" target="_blank">CONTACT : %s</a>', htmlentities($parameters['contact_target'], ENT_COMPAT, 'utf-8'), htmlentities($parameters['contact_name'], ENT_COMPAT, 'utf-8'));
	}else{
		echo htmlentities($parameters['contact_name'], ENT_COMPAT, 'utf-8');
	}

	printf('</font>&nbsp;<img src="%s/SemAutomationplugin/images/campaign03/france.gif" width="16" height="15" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
}
?>
			</td>
			<td bgcolor="#f5b014" valign="bottom" style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/footer_r.jpg" width="50" height="35" alt="" style="display: block;"  border="0" /></td>
		</tr>
	</table>

	<table width="602" bgcolor="#f5b014" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top" style="line-height: 0px; font-size: 0px;" >
			<td align="right" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/footer_l2.png" width="11" height="5" alt="" style="display: block;"  border="0" /></td>
			<td width="502"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/footer_c.jpg" width="502" height="49" alt="" style="display: block;"  border="0" /></td>
			<td width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_f5.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr>
			<td style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_f5.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="502" align="center">
				<font face="Arial" style="text-align:center; font-size: 10px;line-height: 14px;" size="2" color="#ffffff">Pour ne plus recevoir la lettre d'information de Sem Automation / Untha France, <a style="color:#ffffff;"href="#UNSUBSCRIBE#" target="_blank">d&#233;sinscrivez-vous</a></font>
			</td>
			<td style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_f5.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr>
			<td colspan="3" style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_f5.gif" width="1" height="5" alt="" style="display: block;"  border="0" /></td>
		</tr>
		<tr valign="top" bgcolor="#FFFFFF">
			<td style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
			<td width="502" align="center">
				<font face="Arial" style="text-align:center; font-size: 9px;line-height: 14px;" size="2" color="#c9c9c9">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#c9c9c9;"
href="mailto:emailing@sem-automation.fr" target="_blank">emailing@sem-automation.fr</a></font>
			</td>
			<td style="line-height: 0px; font-size: 0px;" width="50"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/SemAutomationplugin/images/campaign03/sep_white.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
		</tr>

	</table>


</body>
</html>
