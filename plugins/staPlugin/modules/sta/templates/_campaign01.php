<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFFFFF" alink="#0099cc" vlink="#0099cc" link="#0099cc">
	<?php
	$parameters = unEscape($parameters);
	$renderer = new CatalyzEmailRenderer('Arial','#333333','line-height: 14px; font-size: 12px;');
	?>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#666666">Si vous avez des difficult&#233;s pour visualiser ce message et ses images. <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" rowspan="4" width="400">

			<?php
	if (!empty($parameters['edito_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['edito_picture'])) {
		if (!empty($parameters['website_link'])) {
			printf('<a target="_blank" href="%s"><img src="%s" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters['website_link']), thumbnail_path($parameters['edito_picture'], 400, 108, true));
		}else{
			printf('<img src="%s" alt="" border="0" />', thumbnail_path($parameters['edito_picture'], 400, 108, true));
		}
	}
	?>
			</td>
			<td width="200">
				<table width="200" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="12" style="line-height:0; font-size: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="12" height="70" alt="" style="display:block;" border="0" />
						</td>
						<td width="188">
							<font face="Arial" style="line-height: 18px; font-size: 14px; font-weight:bold;" size="2" color="#333333">Assur&#233; n&#176; #CUSTOM1#<br/>#LASTNAME# #FIRSTNAME#</font>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td valign="bottom"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/header_sep2.gif" width="200" height="8" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr>
			<td valign="middle">
				<table width="200" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="23" style="line-height:0; font-size: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/bullet_1.gif" width="23" height="22" alt="" style="display:block;" border="0" />
						</td>
						<td width="177">
							<font face="Arial" style="line-height: 11px; font-size: 9px;" size="2" color="#0099cc">
								<a style="color:#0099cc;" href="<?php echo CatalyzEmailing::getApplicationUrl().'/sta/user/edit?key=#SPY_KEY#' ?>" target="_blank">Modification et enregistrement<br/>de vos coordonn&#233;es</a>
							</font>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td valign="bottom"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/header_sep.gif" width="200" height="2" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="2">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="1" height="17" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>


	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="13" style="line-height:0; font-size: 0;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/left.jpg" width="13" height="507" alt="" style="display:block;" border="0" /></td>
			<td width="574">

			<?php if (empty($parameters['right_title']) && empty($parameters['right_content'])): ?>
							<?php if (!empty($parameters['main_content'])) {
								echo '<table width="574" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">';
								$total = count($parameters['main_content']);
								foreach ($parameters['main_content'] as $element){
									$total--;
									if (!empty($element['content'])) {
										echo '<tr valign="top"><td>';
										$renderer->renderWysiwyg(utf8_decode($element['content']), '#0099cc');
										echo '</td></tr>';
										if ($total > 0) {
											printf('<tr style="line-height:0; font-size: 0;" valign="top"><td><img src="%s/staPlugin/images/campaign01/content_sep_xl.gif" width="574" height="20" alt="" style="display:block;" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl());
										}
									}
								}
								echo '</table>';
							}else{
								echo '&nbsp;';
							}
	?>

			 <?php else: ?>
<table width="574" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
	<tr valign="top">
		<td width="375">

			<?php if (!empty($parameters['main_content'])) {
				echo '<table width="375" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">';
				$total = count($parameters['main_content']);
				foreach ($parameters['main_content'] as $element){
					$total--;
					if (!empty($element['content'])) {
						echo '<tr valign="top"><td>';

						$renderer->renderWysiwyg(utf8_decode($element['content']), '#0099cc');
						echo '</td></tr>';
						if ($total > 0) {
							printf('<tr style="line-height:0; font-size: 0;" valign="top"><td><img src="%s/staPlugin/images/campaign01/content_sep.gif" width="375" height="20" alt="" style="display:block;" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl());
						}
					}
				}
				echo '</table>';
			}else{
				echo '&nbsp;';
			}
	?>


		</td>
		<td style="line-height:0; font-size: 0;" width="13">
			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="13" height="10" alt="" style="display:block;" border="0" />
		</td>
		<td width="186">

			<?php if (!empty($parameters['right_title'])) :?>
				<table width="186" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td style="line-height:0; font-size: 0;" width="13" bgcolor="#1899c2">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep_blue.gif" width="13" height="1" alt="" style="display:block;" border="0" />
						</td>
						<td width="135" bgcolor="#1899c2" valign="middle">
						<?php printf('<font face="TimesNewRoman" style="line-height: 14px; font-size: 14px;" size="2" color="#ffffff">%s</font>', htmlentities($parameters['right_title'], ENT_COMPAT, 'utf-8')); ?>
						</td>
						<td style="line-height:0; font-size: 0;" width="38" align="left">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/title_r.gif" width="11" height="26" alt="" style="display:block;" border="0" />
						</td>
					</tr>
					<tr style="line-height:0; font-size: 0;">
						<td width="186" colspan="3" valign="top">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/title_b.gif" width="148" height="4" alt="" style="display:block;" border="0" />
						</td>
					</tr>
					<tr style="line-height:0; font-size: 0;">
						<td width="186" colspan="3" valign="top">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="1" height="15" alt="" style="display:block;" border="0" />
						</td>
					</tr>
				</table>
			<?php endif ?>


			<?php if (!empty($parameters['right_content'])): ?>
			<table width="186" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">
				<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/center.jpg" width="13" height="386" alt="" style="display:block;" border="0" /></td>
					<td width="173">
						<table width="173" bgcolor="#ffffff" cellspacing="0" cellpadding="0" border="0">

							<?php
							$total = count($parameters['right_content']);

				foreach ($parameters['right_content'] as $element){
					$total--;
					printf('<tr valign="top"><td valign="top" style="line-height:0; font-size: 0;" width="10"><img src="%s/staPlugin/images/campaign01/bullet_2.gif" width="10" height="10" alt="" style="display:block;" border="0" /></td><td width="163">', CatalyzEmailing::getApplicationUrl());
					if (!empty($element['title']) || !empty($element['link'])) {
						echo '<font face="Arial" style="line-height: 13px; font-size: 11px;" size="2" color="#cc6633">';
						if (!empty($element['title'])) {
							echo htmlentities($element['title'], ENT_COMPAT, 'utf-8');
						}
						if (!empty($element['link'])) {
							printf('%s<img src="%s/staPlugin/images/campaign01/bullet_3.gif" width="9" height="9" alt="" border="0" />&nbsp;<a style="color:#0099cc;" href="%s" target="_blank">Lire l\'article</a>', !empty($element['title'])?'<br/>':'', CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($element['link']));
						}
						if (!empty($element['illustration']) && is_file(sfConfig::get('sf_web_dir').$element['illustration'])) {
							if (!empty($element['link'])) {
								printf('%s<br/><a href="%s" target="_blank"><img border="0" alt="" src="%s"/></a>', !empty($element['title'])||!empty($element['link'])?'<br/>':'', czWidgetFormLink::displayLink($element['link']),thumbnail_path($element['illustration'], 154, 136, true));
							}else{
								printf('%s<br/><img border="0" alt="" src="%s"/>', !empty($element['title'])||!empty($element['link'])?'<br/>':'', thumbnail_path($element['illustration'], 154, 136, true));
							}
						}
						echo '</font>';
					}
					echo '</td></tr>';
					if ($total > 0) {
						printf('<tr style="line-height:0; font-size: 0;"><td colspan="2"><img src="%s/staPlugin/images/campaign01/sep.gif" width="1" height="15" alt="" style="display:block;" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl());
					}
				} ?>
						</table>
					</td>
				</tr>
			</table>
			<?php endif ?>
		</td>
	</tr>
</table>
	<?php endif ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/right.jpg" width="13" height="507" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters['footer'])) : ?>
		<tr style="line-height:0; font-size: 0;" bgcolor="#e16a02">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep_orange.gif" width="1" height="8" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr bgcolor="#e16a02">
			<td style="line-height:0; font-size: 0;" width="62"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep_orange.gif" width="62" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="476" align="center">
				<?php printf('<font face="Arial" style="font-size: 9px;line-height: 12px;" size="2" color="#ffffff">%s</font>', nl2br(htmlentities($parameters['footer'], ENT_COMPAT, 'utf-8')) ); ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="62"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep_orange.gif" width="62" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" bgcolor="#e16a02">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep_orange.gif" width="1" height="8" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<?php endif ?>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="62"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="62" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="476" align="center">
				<font face="Arial" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#999999;" href="mailto:email@assurance-sta.com" target="_blank">email@assurance-sta.com</a><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#999999;">ce lien de d&#233;sinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="62"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/staPlugin/images/campaign01/sep.gif" width="62" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>

</body>
</html>