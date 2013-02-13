<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#787878" link="#787878" alink="#787878">
	<?php $parameters = unEscape($parameters); ?>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="600" align="center"><font face="Arial, sans-serif" style="line-height:13px; font-weight:bold; font-size:9px;text-align:center; color:#666666">Si les images ne s'affichent pas correctement, <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a></font></td>
			</tr>
		</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/planning_top.jpg" width="600" height="6" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="7" bgcolor="#666666">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/planning_left.jpg" width="7" height="15" alt="" border="0" />
				</td>
				<td width="579" bgcolor="#666666" align="right">
					<?php
						$top = array();
	if (!empty($parameters['number'])) {
		$top[]= htmlentities($parameters['number'], ENT_COMPAT, 'UTF-8');
	}

	if (!empty($parameters['date'])) {
		$top[]= htmlentities($parameters['date'], ENT_COMPAT, 'UTF-8');
	}

	echo '<font face="Trebuchet MS, Arial, sans-serif" style="text-align:right; line-height: 15px; font-size: 11px; font-weight:bold;color:#ffffff;">';
	if (!empty($top)) {
		echo implode('  |  ', $top);
	}else{
		echo '&nbsp;';
	}
	echo '</font>';
	?>
				</td>
				<td style="line-height:0; font-size: 0;" width="7" bgcolor="#666666">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/planning_right.jpg" width="7" height="15" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/planning_bottom.jpg" width="600" height="6" alt="" border="0" />
				</td>
			</tr>
		</table>

		<?php if (!empty($parameters['top_picture']) &&  is_file(sfConfig::get('sf_web_dir').$parameters['top_picture'])) : ?>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" height="173">
					<?php printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['top_picture'], 600, 999)); ?>
				</td>
			</tr>
		</table>
		<?php endif ?>

		<?php if (!empty($parameters['subtitle'])) : ?>
		 <table width="600" bgcolor="#88a2bb" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top" style="line-height:0; font-size: 0;">
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
			<tr valign="top">
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
				<td width="580">
					<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; font-style:italic; line-height: 17px; font-size: 13px; font-weight:bold; color:#ffffff;">%s</font>', htmlentities($parameters['subtitle'], ENT_COMPAT, 'UTF-8')); ?>
				</td>
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
			</tr>
			<tr valign="top" style="line-height:0; font-size: 0;">
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
		</table>
		<?php endif ?>



		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="350" bgcolor="#FFFFFF">

					<table width="350" cellspacing="0" cellpadding="0" border="0"  bgcolor="#FFFFFF">

						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="29" alt="" border="0" />
							</td>
						</tr>
						<?php if (!empty($parameters['left_title'])) : ?>
						<tr valign="top">
							<td width="22">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bullet_1.gif" width="15" height="20" alt="" border="0" />
							</td>
							<td width="317">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($parameters['left_title'], ENT_COMPAT, 'UTF-8')) ?>
							</td>
							<td style="line-height:0; font-size: 0;" width="12">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td width="350" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="17" alt="" border="0" />
							</td>
						</tr>
						<?php endif ?>

						<?php

	if (!empty($parameters['left_content'])) {
		$styles = array();
		$styles['yellow'] = array('color' => 'color:#efc031;', 'bullet' => 'bullet_orange');
		$styles['pink'] = array('color' => 'color:#d26095;', 'bullet' => 'bullet_pink');
		$styles['purple'] = array('color' => 'color:#9c276e;', 'bullet' => 'bullet_purple');
		$styles['green'] = array('color' => 'color:#9fc54d;', 'bullet' => 'bullet_green');
		$styles['orange'] = array('color' => 'color:#db812e;', 'bullet' => 'bullet_dark_orange');
		$styles['brown'] = array('color' => 'color:#6c3a1f;', 'bullet' => 'bullet_brown');
		$styles['blue'] = array('color' => 'color:#1e71b8;', 'bullet' => 'bullet_blue');

		foreach ($parameters['left_content'] as $left_content){

			if (!empty($left_content['style']) && !empty($styles[$left_content['style']])) {
				$url = false;
				if (!empty($left_content['link'])) {
					$url = czWidgetFormLink::displayLink($left_content['link']);
				}

				printf('<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="21">
								<img src="%1$s/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
							<td width="292"><table width="292" cellspacing="0" cellpadding="0" border="0"  bgcolor="#FFFFFF">', CatalyzEmailing::getApplicationUrl());

				if (!empty($left_content['title'])) {
					printf('<tr valign="top">
							<td width="6"><img src="%1$s/cciFormationPlugin/images/calendrier/%2$s.gif" width="6" height="10" alt="" border="0" /></td>
							<td width="286"><font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; font-weight:bold; %3$s">%4$s</font></td>
						</tr>',CatalyzEmailing::getApplicationUrl(),
					$styles[$left_content['style']]['bullet'],
					$styles[$left_content['style']]['color'],
					$url?sprintf('<a style="text-decoration:none; %s" href="%s" target="_blank">%s</a>', $styles[$left_content['style']]['color'], $url,htmlentities($left_content['title'], ENT_COMPAT, 'UTF-8')):htmlentities($left_content['title'], ENT_COMPAT, 'UTF-8')
					);
				}

				if (!empty($left_content['introduction'])) {
					printf('<tr valign="top">
							<td width="6"><img src="%1$s/cciFormationPlugin/images/calendrier/bg_white.jpg" width="6" height="1" alt="" border="0" /></td>
							<td width="286"><font face="Trebuchet MS, Arial, sans-serif" style="line-height:15px; font-size:11px; font-style:italic; color:#666666">%2$s</font></td>
						</tr>',CatalyzEmailing::getApplicationUrl(), nl2br(htmlentities($left_content['introduction'], ENT_COMPAT, 'UTF-8'))
					);
				}

				printf('<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" colspan="2">
								<img src="%1$s/cciFormationPlugin/images/calendrier/bg_white.jpg" width="17" height="15" alt="" border="0" />
							</td>
						</tr>', CatalyzEmailing::getApplicationUrl());

				printf('</table></td>
							<td style="line-height:0; font-size: 0;" width="37">
								<img src="%1$s/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>', CatalyzEmailing::getApplicationUrl());
			}
		}
	}
	?>

							<?php if (!empty($parameters['left_bottom'])) : ?>
							<tr valign="top">
								<td width="250" height="20" colspan="3">
									<font face="Trebuchet MS, Arial, sans-serif" style="margin-left:20px; text-align:left; line-height:16px; font-size:12px; color:#cd2861">
										<?php printf('<a style="text-decoration:none; color:#cd2861" href="%s" target="_blank">[en savoir plus]</a>',czWidgetFormLink::displayLink($parameters['left_bottom'])) ?>
									</font>
								</td>
							</tr>
							<?php endif ?>


					</table>
				</td>
				<td width="250" bgcolor="#dfe3eb">
					<?php if (
						!empty($parameters['download_title']) ||
						!empty($parameters['download_text']) ||
						!empty($parameters['download_link']) ||
						!empty($parameters['download_picture'])
					):  ?>
					<table width="250" cellspacing="0" cellpadding="0" bgcolor="c4cbda" border="0">

						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="250" height="29" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>

						<?php

		if (!empty($parameters['download_title'])) {
			printf('<tr valign="top">
			<td width="233" align="center" colspan="2">
				<font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:22px; font-size:18px; font-weight:bold; color:#354776">%s</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17">
				<img src="%s/cciFormationPlugin/images/calendrier/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
			</td>
						</tr>', nl2br(htmlentities($parameters['download_title'], ENT_COMPAT, 'UTF-8')),CatalyzEmailing::getApplicationUrl());
		}


			echo '<tr valign="top"><td style="line-height:0; font-size: 0;" width="133">';
						if (!empty($parameters['download_picture']) &&  is_file(sfConfig::get('sf_web_dir').$parameters['download_picture'])) {
							printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['download_picture'], 120, 133));
						}else{
							printf('<img src="%s/cciFormationPlugin/images/calendrier/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
						}
			echo '</td><td width="100" align="right">';

	if (!empty($parameters['download_text'])) {
		printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#354776">%s%s</font>', nl2br(htmlentities($parameters['download_text'], ENT_COMPAT, 'UTF-8')), !empty($parameters['download_link'])?'<br/><br/>':'');
	}
	if (!empty($parameters['download_link'])) {
		printf('<a style="text-decoration:none;" href="%s" target="_blank"><img src="%s/cciFormationPlugin/images/calendrier/telecharger_btn.jpg" width="100" height="25" alt="" border="0" /></a>',czWidgetFormLink::displayLink($parameters['download_link']), CatalyzEmailing::getApplicationUrl());
	}

	printf('</td>
			<td style="line-height:0; font-size: 0;" width="17">
				<img src="%s/cciFormationPlugin/images/calendrier/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>', CatalyzEmailing::getApplicationUrl());


	?>

							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="250" colspan="3">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_blue.jpg" width="1" height="29" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top" style="line-height:0; font-size: 0;">
								<td width="250" bgcolor="#96a0b9" colspan="3">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_light_blue.jpg" width="1" height="2" alt="" border="0" />
								</td>
							</tr>

							</table>
							<?php endif ?>

							<?php if (!empty($parameters['right_title']) || !empty($parameters['right_content'])) : ?>
							<table width="250" bgcolor="#dfe3eb" align="center" cellspacing="0" cellpadding="0" border="0">
								<?php if (!empty($parameters['right_title'])) : ?>
								<tr bgcolor="#354776" valign="top">
									<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_blue_dark.gif" width="1" height="10" alt="" border="0" /></td>
								</tr>
								<tr bgcolor="#354776" valign="top">
									<td style="line-height:0; font-size: 0;" width="20">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_blue_dark.gif" width="20" height="1" alt="" border="0" />
									</td>
									<td width="214">
										<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#FFFFFF">%s</font>', nl2br(htmlentities($parameters['right_title'], ENT_COMPAT, 'UTF-8'))) ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="17">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_blue_dark.gif" width="17" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr bgcolor="#354776" valign="top">
									<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_blue_dark.gif" width="1" height="10" alt="" border="0" /></td>
								</tr>
								<?php endif ?>
								<?php if (!empty($parameters['right_content'])): ?>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="1" height="20" alt="" border="0" />
									</td>
								</tr>

								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="20">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="20" height="1" alt="" border="0" />
									</td>
									<td width="214">
										<table width="214" cellpadding="0" cellspacing="0" border="0">
											<?php
								$total = count($parameters['right_content']);
									foreach ($parameters['right_content'] as $right_content){


										if (!empty($right_content['title'])) {
											printf('<tr valign="top">
									<td width="214">
										<font face="Trebuchet MS, Arial, sans-serif" style="line-height:18px; font-size:14px; font-weight:bold; color:#354776">%s</font>
									</td>
								</tr>
								<tr>
										<td style="line-height:0; font-size: 0;" width="17">
											<img src="%s/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="17" height="20" alt="" border="0" />
										</td>
									</tr>', nl2br(htmlentities($right_content['title'], ENT_COMPAT, 'UTF-8')), CatalyzEmailing::getApplicationUrl());
										}
										if (!empty($right_content['introduction'])) {
											printf('<tr valign="top">
									<td width="214">
										<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; color:#666666">%s</font>
									</td>
								</tr>
								<tr>
										<td style="line-height:0; font-size: 0;" width="17">
											<img src="%s/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="17" height="10" alt="" border="0" />
										</td>
									</tr>', nl2br(htmlentities($right_content['introduction'], ENT_COMPAT, 'UTF-8')), CatalyzEmailing::getApplicationUrl());
										}
										if (!empty($right_content['link'])) {
											printf('<tr valign="top">
									<td width="214">
										<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; color:#354776"><a style="color:#354776; text-decoration:none;" href="%s" target="_blank">%s</a></font>
									</td>
								</tr>
								<tr>
										<td style="line-height:0; font-size: 0;" width="17">
											<img src="%s/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="17" height="10" alt="" border="0" />
										</td>
									</tr>',
											czWidgetFormLink::displayLink($right_content['link']),
											!empty($right_content['link_caption'])?htmlentities($right_content['link_caption'], ENT_COMPAT, 'UTF-8'):'[en savoir plus]',
											CatalyzEmailing::getApplicationUrl());
										}

										if ($total>1) {
											printf('<tr>
										<td style="line-height:0; font-size: 0;" width="17">
											<img src="%s/cciFormationPlugin/images/calendrier/sep_box_1.gif" width="214" height="21" alt="" border="0" />
										</td>
									</tr>',  CatalyzEmailing::getApplicationUrl());
										}
										$total--;
									}
									?>
										</table>
									</td>
								</tr>

								<?php endif ?>

								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_very_light_blue.jpg" width="1" height="10" alt="" border="0" />
									</td>
								</tr>
								</table>
								<?php endif ?>


							</td>
						</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="600" height="35" colspan="2">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/sep_vert_end.jpg" width="600" height="35" alt="" border="0" />
						</td>
					</tr>
				</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="15" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
				<td width="180" bgcolor="#fcf2f5">
					<?php
	if (!empty($parameters['bottom_title']) || !empty($parameters['bottom_content'])) {
		if (!empty($parameters['bottom_title'])) {
			printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:20px; font-size:16px; font-weight:bold; color:#274578">%s<br /></font>', htmlentities($parameters['bottom_title'], ENT_COMPAT, 'UTF-8'));
		}
		if (!empty($parameters['bottom_content'])) {
			printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578"><br />%s</font>', nl2br(htmlentities($parameters['bottom_content'], ENT_COMPAT, 'UTF-8')));
		}
	}else{
		printf('<img src="%s/cciFormationPlugin/images/calendrier/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
	}
	?>
				</td>
				<td width="388" bgcolor="#fcf2f5">
					<?php
	if (!empty($parameters['phone']) || !empty($parameters['email'])) :
		?>

					 <table cellpadding="0" cellspacing="0" width="388" border="0">
						<?php
		if (!empty($parameters['phone'])) {
			printf('<tr valign="middle">
			<td style="line-height:0; font-size: 0;"  width="30"><img src="%s/cciFormationPlugin/images/calendrier/bullet_phone.jpg" width="22" height="21" alt="" border="0" /></td>
			<td><font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:20px; font-size:16px; font-weight:bold; color:#274578">%s</font></td>
						</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['phone'], ENT_COMPAT, 'UTF-8'));

			if (!empty($parameters['email'])) {
				printf('<tr style="line-height:0; font-size: 0;" >
							<td colspan="2"><img src="%s/cciFormationPlugin/images/calendrier/bg_light_pink.jpg" width="1" height="10" alt="" border="0" /></td>
						</tr>', CatalyzEmailing::getApplicationUrl() );
			}
		}

		if (!empty($parameters['email'])) {
			printf('<tr valign="middle">
			<td style="line-height:0; font-size: 0;"  width="30"><img src="%1$s/cciFormationPlugin/images/calendrier/bullet_mail.jpg" width="22" height="21" alt="" border="0" /></td>
			<td><font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578"><a style="color:#274578; text-decoration:none" target="_blank" href="mailto:%2$s">%2$s</a></font></td>
						</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['email'], ENT_COMPAT, 'UTF-8'));
		}

		?>
					</table>

					 <?php else: ?>
					 	<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
					 <?php endif ?>

				</td>
				<td style="line-height:0; font-size: 0;" width="17" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" height="173" colspan="4">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/footer.jpg" width="600" height="173" alt="" border="0" />
				</td>
			</tr>
		</table>
			<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="22" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
			<td width="561" height="70" align="center">
				<font face="Arial, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#666666">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectificationet d'opposition<br/> aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#666666;"
				href="mailto:xxx@xxx.fr" target="_blank">xxx@xxx.fr</a> ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#666666;">ce lien de d&#233;sinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/calendrier/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>
</body>
</html>