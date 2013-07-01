<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body alink="#669933" vlink="#669933" link="#669933" bgcolor="#FFFFFF">

<?php use_helper('be3c') ?>
<?php $parameters = unEscape($parameters); ?>

	<table width="599" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center" bgcolor="#ffffff" colspan="3">
				<font face="Tahoma, Geneva, sans-serif" style="line-height: 13px; font-size: 10px;" size="2" color="#669933">Si les images ne s'affichent pas correctement, <a style="color:#669933;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a><br />
				</font>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0px; font-size: 0px;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/header_1.png" width="599" height="132" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td valign="top" style="line-height: 0px; font-size: 0px;" align="left" width="12"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/header_2_1.jpg" width="12" height="44" alt="" border="0" /></td>
			<td align="center" width="578">
				<?php
				if (!empty($parameters['title'])) {
					printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 28px; font-size: 28px;" size="2" color="#336600">%s<br /></font><img src="%s/be3cPlugin/images/campaign01/sep.gif" width="1" height="20" alt="" border="0" />', htmlentities($parameters['title'], ENT_COMPAT, 'utf-8'), CatalyzEmailing::getApplicationUrl());
				}
				if (!empty($parameters['introduction'])) {
					printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 17px; font-size: 14px;" size="2" color="#224635">%s<br /></font><img src="%s/be3cPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" />', nl2br(htmlentities($parameters['introduction'], ENT_COMPAT, 'utf-8')), CatalyzEmailing::getApplicationUrl());
				}
				 ?>
			</td>
			<td valign="top" style="line-height: 0px; font-size: 0px;" align="right" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/header_2_2.jpg" width="9" height="44" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="577" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="375">


			<?php if (
							!empty($parameters['main_title']) 	||
							!empty($parameters['main_picture']) ||
							!empty($parameters['main_content']) ||
							!empty($parameters['main_line_1']) 	||
							!empty($parameters['main_line_2']) 	||
							(!empty($parameters['main_line_3']) && CatalyzDate::getDateFromTab($parameters['main_line_3']))
						): ?>

				<table width="375" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="2" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['main_title'])) : ?>
					<tr>
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371" bgcolor="#336600" align="center">
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 24px; font-size: 20px;" size="2" color="#FFFFFF">%s</font>', htmlentities($parameters['main_title'], ENT_COMPAT, 'utf-8')) ?>
						</td>
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;">
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371" bgcolor="#336600" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/top_box_b.jpg" width="371" height="10" alt="" border="0" />
						</td>
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>

					<?php if (!empty($parameters['main_picture'])) : ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371" valign="top" align="center">
							<?php printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['main_picture'], 371, 371)) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>

					<?php if (!empty($parameters['main_content'])) : ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371" align="center" bgcolor="#FFFFFF">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="16" alt="" border="0" />
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371">
							<table width="371" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
									<td>
										<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 17px; font-size: 13px;" size="2" color="#336600">%s</font>', nl2br(htmlentities($parameters['main_content'], ENT_COMPAT, 'utf-8'))) ?>
									</td>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
								</tr>
							</table>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>

					<?php if (!empty($parameters['main_line_1']) || !empty($parameters['main_line_2']) || ( !empty($parameters['main_line_3']) && CatalyzDate::getDateFromTab($parameters['main_line_3']))) : ?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td width="371" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/left_sep.gif" width="371" height="27" alt="" border="0" />
						</td>
						<td width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['main_line_1'])):?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/bullet_01.gif" width="17" height="10" alt="" border="0" />
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 16px; font-size: 12px;" size="2" color="#666666">%s</font>', htmlentities($parameters['main_line_1'], ENT_COMPAT, 'utf-8')) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($parameters['main_line_2'])): ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/bullet_01.gif" width="17" height="10" alt="" border="0" />
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 16px; font-size: 12px;" size="2" color="#666666">Intervenant : %s</font>', htmlentities($parameters['main_line_2'], ENT_COMPAT, 'utf-8')) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($parameters['main_line_3']) && CatalyzDate::getDateFromTab($parameters['main_line_3'])): ?>

					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5" align="center">
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 22px; font-size: 14px;" size="2" color="#336600">INSCRIPTIONS AVANT LE %s</font>', CatalyzDate::getDateFromTab($parameters['main_line_3'])) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="2" bgcolor="#83a54f"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_green.gif" width="2" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php endif ?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3" bgcolor="#e5e5e5" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/shaddow1.png" width="375" height="18" alt="" border="0" />
						</td>
					</tr>
				</table>
				<?php endif ?>

				<?php
				$others = FALSE;
				if (!empty($parameters['other_content'])) :
					$others = $parameters['other_content'];
					foreach ($others as $other):
				 ?>

				<table width="375" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;">
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="373" align="center"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" /></td>
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($other['title'])) : ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="373" align="center">
						<table width="373" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
									<td align="center">
										<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 24px; font-size: 20px;" size="2" color="#666666">%s</font>', htmlentities($other['title'], ENT_COMPAT, 'utf-8')) ?>
									</td>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
								</tr>
							</table>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height: 0px; font-size: 0px;">
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="373" align="center"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="10" alt="" border="0" /></td>
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($other['content'])) : ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="373" align="center">
							<table width="373" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
									<td>
										<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 16px; font-size: 12px;" size="2" color="#999999">%s</font>', nl2br(htmlentities($other['content'], ENT_COMPAT, 'utf-8'))) ?>
									</td>
									<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="13" height="1" alt="" border="0" /></td>
								</tr>
							</table>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($other['line_1']) || !empty($other['line_2']) || !empty($other['line_3'])) : ?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="373" align="center"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/left_sep2.gif" width="373" height="16" alt="" border="0" /></td>
						<td width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($other['line_1'])): ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/bullet_02.gif" width="17" height="10" alt="" border="0" />
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 16px; font-size: 12px;" size="2" color="#666666">%s</font>', htmlentities($other['line_1'], ENT_COMPAT, 'utf-8')) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($other['line_2'])): ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/bullet_02.gif" width="17" height="10" alt="" border="0" />
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 16px; font-size: 12px;" size="2" color="#666666">Intervenant : %s</font>', htmlentities($other['line_2'], ENT_COMPAT, 'utf-8')) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php if (!empty($other['line_3']) && CatalyzDate::getDateFromTab($other['line_3'])): ?>
					<tr>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td bgcolor="#e5e5e5" align="center">
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 22px; font-size: 14px;" size="2" color="#666666">INSCRIPTIONS AVANT LE %s</font>', CatalyzDate::getDateFromTab($other['line_3'])) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="1" bgcolor="#d6d6d6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php endif ?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3" bgcolor="#e5e5e5" align="center">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/shaddow2.png" width="375" height="22" alt="" border="0" />
						</td>
					</tr>
				</table>
					<?php endforeach ?>
				<?php endif ?>
			</td>

			<td width="8"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="8" height="1" alt="" border="0" /></td>
			<td width="194">

				<table width="194" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="16" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['email']) || !empty($parameters['phone']) || !empty($parameters['fax'])):
						$formatter = new CatalyzEmailRenderer('Trebuchet MS, Helvetica, sans-serif', '#666666', 'line-height: 18px; font-size: 14px;');
						?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/button_t.png" width="194" height="8" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['inscription_title'])): ?>
					<tr align="center">
						<td colspan="3" bgcolor="#9a9a9a">
							<?php printf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 14px; font-size: 14px;" size="2" color="#FFFFFF">%s</font>', htmlentities($parameters['inscription_title'], ENT_COMPAT, 'utf-8')) ?>
						</td>
					</tr>
					<?php endif ?>
					<tr style="line-height: 0px; font-size: 0px;">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/button_b.png" width="194" height="36" alt="" border="0" /></td>
					</tr>

					<?php if (!empty($parameters['email']) && trim($parameters['email']) != ''): ?>
					<tr align="center">
						<td style="line-height: 0px; font-size: 0px;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<?php renderWysiwyg($parameters['email'])  ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>

					<?php endif ?>
					<?php if (!empty($parameters['phone']) && trim($parameters['phone']) != ''): ?>
					<tr style="line-height: 0px; font-size: 0px;" align="center">
						<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/right_sep.gif" width="175" height="5" alt="" border="0" />
						</td>
						<td width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>
					<tr align="center">
						<td style="line-height: 0px; font-size: 0px;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<?php $formatter->renderWysiwyg(changeStrongTag($parameters['phone'])) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>

					<?php endif ?>
					<?php if (!empty($parameters['fax']) && trim($parameters['fax']) != ''):?>
					<tr style="line-height: 0px; font-size: 0px;" align="center">
						<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/right_sep.gif" width="175" height="5" alt="" border="0" />
						</td>
						<td width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>
					<tr align="center">
						<td style="line-height: 0px; font-size: 0px;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<?php $formatter->renderWysiwyg(changeStrongTag($parameters['fax'])) ?>
						</td>
						<td style="line-height: 0px; font-size: 0px;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<?php endif ?>
					<?php if ($others): ?>
					<tr align="center" style="line-height: 0px; font-size: 0px;">
						<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="175">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/img_02.jpg" width="175" height="255" alt="" border="0" />
						</td>
						<td width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="9" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
				</table>
			</td>
		</tr>
	</table>

	<table width="577" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0px; font-size: 0px;">
			<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/be3cPlugin/images/campaign01/sep.gif" width="1" height="25" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td align="center">
				<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 12px; font-size: 10px;" size="2" color="#669933">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectification et d'opposition aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#669933;" href="mailto:be3c@be3c.com" target="_blank">be3c@be3c.com</a> ou en cliquant sur ce <a style="color:#669933;" href="#UNSUBSCRIBE#" target="_blank">lien de d&#233;sinscription</a><br />
				</font>
			</td>
		</tr>
	</table>
</body>
</html>