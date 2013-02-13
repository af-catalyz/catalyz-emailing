<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#787878" link="#787878" alink="#787878">
	<?php
	$parameters = unEscape($parameters);
	$renderer = new CatalyzEmailRenderer('Trebuchet MS, Arial, sans-serif','#363636','line-height:14px; font-size:10px;');
	?>
	<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="600" align="center"><font face="Arial, sans-serif" style="line-height:13px; font-weight:bold; font-size:9px;text-align:center; color:#666666">Si les images ne s'affichent pas correctement, <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a></font></td>
			</tr>
		</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/planning_top.jpg" width="600" height="6" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="7" bgcolor="#666666">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/planning_left.jpg" width="7" height="15" alt="" border="0" />
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
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/planning_right.jpg" width="7" height="15" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/planning_bottom.jpg" width="600" height="6" alt="" border="0" />
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
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
			<tr valign="top">
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
				<td width="580">
					<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; font-style:italic; line-height: 17px; font-size: 13px; font-weight:bold; color:#ffffff;">%s</font>', htmlentities($parameters['subtitle'], ENT_COMPAT, 'UTF-8')); ?>
				</td>
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
			</tr>
			<tr valign="top" style="line-height:0; font-size: 0;">
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
		</table>
		<?php endif ?>


		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="350" bgcolor="#124577">
					<?php if ( !empty($parameters['left_content']) ) : ?>
					<table width="350" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
						<?php foreach ($parameters['left_content'] as $left_content): ?>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" height="29" bgcolor="#FFFFFF" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>

					<?php if (!empty($left_content['title'])) : ?>
					<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="22" bgcolor="#FFFFFF" height="29">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bullet_1.jpg" width="15" height="15" alt="" border="0" />
							</td>
							<td width="317" bgcolor="#FFFFFF" height="29">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($left_content['title'], ENT_COMPAT, 'UTF-8')) ?>
							</td>
							<td style="line-height:0; font-size: 0;" width="12" bgcolor="#FFFFFF" height="29">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" height="17" bgcolor="#FFFFFF" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
					<?php endif ?>
					<?php if (!empty($left_content['introduction'])) : ?>
					<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="21" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
							<td width="292" bgcolor="#FFFFFF">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:15px; font-size:12px; color:#666666">%s</font>', nl2br(htmlentities($left_content['introduction'], ENT_COMPAT, 'UTF-8'))  ) ?>
							</td>
							<td style="line-height:0; font-size: 0;" width="37" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" height="17" bgcolor="#FFFFFF" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
					<?php endif ?>
					<?php if (!empty($left_content['link'])) : ?>
						<tr valign="top">
								<td width="250" height="20" bgcolor="#FFFFFF" colspan="3">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="margin-left:20px; text-align:left; line-height:16px; font-size:12px; color:#cd2861"><a style="text-decoration:none; color:#cd2861" href="%s" target="_blank">%s</a></font>',
	czWidgetFormLink::displayLink($left_content['link']) ,!empty($left_content['link_caption'])?$left_content['link_caption']:'[en savoir plus]') ?>
							</td>
						</tr>
					<?php endif ?>

						<?php endforeach ?>

					</table>
					<?php endif ?>

					<?php if (
	!empty($parameters['news_title']) ||
	!empty($parameters['news_content']) ||
	!empty($parameters['news_target'])
	) : ?>
					<table width="350" bgcolor="#124577" cellspacing="0" cellpadding="0" border="0">
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="21" height="14" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/top_box_blue.jpg" width="21" height="14" alt="" border="0" />
								</td>
								<td style="line-height:0; font-size: 0;" width="314" height="14" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/top_box_blue2.jpg" width="314" height="14" alt="" border="0" />
								</td>
								<td style="line-height:0; font-size: 0;" width="15" height="14" bgcolor="#124577" colspan="2">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/top_box_blue4.jpg" width="15" height="14" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="21" height="37">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/top_box_blue3.jpg" width="21" height="37" alt="" border="0" />
								</td>
								<td width="314" colspan="2">
									<?php if (!empty($parameters['news_title'])) {
										printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#FFFFFF">%s</font>', htmlentities($parameters['news_title'], ENT_COMPAT, 'UTF-8'));
									}else{
										printf('<img src="%s/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
									} ?>
								</td>
								<td style="line-height:0; font-size: 0;" width="15" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
							</tr>
							<?php if (!empty($parameters['news_content'])) : ?>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="21" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
								<td width="314" bgcolor="#124577" colspan="2">
									<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#FFFFFF">%s</font>', nl2br(htmlentities($parameters['news_content'], ENT_COMPAT, 'UTF-8'))  ) ?>
								</td>
								<td style="line-height:0; font-size: 0;" width="15" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="350" height="10" bgcolor="#124577" colspan="4">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
							</tr>
							<?php endif ?>
							<?php if (!empty($parameters['news_target'])) : ?>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="21" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
								<td width="314" bgcolor="#124577" colspan="2">
									<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; color:#FFFFFF"><a style="text-decoration:none; color:#FFFFFF" href="%s" target="_blank">%s</a></font>' , czWidgetFormLink::displayLink($parameters['news_target']) ,!empty($parameters['news_target_caption'])?$parameters['news_target_caption']:'[en savoir plus]') ?>
								</td>
								<td style="line-height:0; font-size: 0;" width="15" bgcolor="#124577">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_blue.jpg" width="1" height="1" alt="" border="0" />
								</td>
							</tr>
							<?php endif ?>


					</table>

					<?php endif ?>





				</td>
				<td width="250" bgcolor="#dfe3eb">

					<table width="250" cellspacing="0" cellpadding="0" border="0">
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="250" bgcolor="#c4cbda" colspan="3">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="29" alt="" border="0" />
							</td>
						</tr>
						<?php if (!empty($parameters['top_picture']) &&  is_file(sfConfig::get('sf_web_dir').$parameters['top_picture'])) : ?>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="250" bgcolor="#c4cbda" colspan="3">
								<?php printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['right_picture'], 250, 999)); ?>
							</td>
						</tr>
						<?php endif ?>
							</table>

							<?php if (
	!empty($parameters['right_title']) ||
	!empty($parameters['right_content']) ||
	!empty($parameters['right_target'])

	) : ?>
							<table width="250" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" height="20" bgcolor="#c4cbda" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<?php if (!empty($parameters['right_title'])) : ?>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="20" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="214" bgcolor="#c4cbda">
										<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:18px; font-size:14px; font-weight:bold; color:#354776">%s</font>', nl2br(htmlentities($parameters['right_title'], ENT_COMPAT, 'UTF-8'))) ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="17" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" bgcolor="#c4cbda" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="20" alt="" border="0" />
									</td>
								</tr>
								<?php endif ?>
								<?php if (!empty($parameters['right_content'])) : ?>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="20" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="213" bgcolor="#c4cbda">
										<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#666666">%s</font>', nl2br(htmlentities($parameters['right_content'], ENT_COMPAT, 'UTF-8')) ) ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="17" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" bgcolor="#c4cbda" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="10" alt="" border="0" />
									</td>
								</tr>
								<?php endif ?>
								<?php if (!empty($parameters['right_target'])) : ?>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="20" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="213" bgcolor="#c4cbda">
										<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#354776"><a style="color:#354776; text-decoration:none;" href="%s" target="_blank">%s</a></font>',
	czWidgetFormLink::displayLink($parameters['right_target']) ,
	!empty($parameters['right_target_caption'])?$parameters['right_target_caption']:'[en savoir plus]') ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="17" bgcolor="#c4cbda">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" bgcolor="#c4cbda" colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_blue.jpg" width="1" height="20" alt="" border="0" />
									</td>
								</tr>
								<?php endif ?>
							</table>
							<?php endif ?>
							<?php if (!empty($parameters['testimony'])) : ?>
							<table width="250" bgcolor="#dfe3eb" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" height="17" colspan="4">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="16" bgcolor="#dfe3eb">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="218" bgcolor="#dfe3eb" colspan="2">
										<?php echo $renderer->renderWysiwyg(utf8_decode($parameters['testimony']), '#363636') ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="16" bgcolor="#dfe3eb">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" height="5" bgcolor="#dfe3eb" colspan="4">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
							</table>
							<?php endif ?>

						</td>
						</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="600" height="35" colspan="2">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/sep_vert_end_emailing.jpg" width="600" height="35" alt="" border="0" />
						</td>
					</tr>
				</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="21" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
				<td width="316" bgcolor="#fcf2f5">
					<?php if (!empty($parameters['others'])) {

						$total = count($parameters['others']);
						foreach ($parameters['others'] as $other){

							if (!empty($other['title'])) {
								printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#cd2861">%s<br/><br/></font>', htmlentities($other['title'], ENT_COMPAT, 'UTF-8'));
							}

							if (!empty($other['introduction'])) {
								printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#666666">%s<br/><br/></font>', nl2br(htmlentities($other['introduction'], ENT_COMPAT, 'UTF-8')) );
							}

							if (!empty($other['link'])) {
								printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#cd2861"><a style="text-decoration:none; color:#cd2861" href="%s" target="_blank">%s</a><br/></font>'
									, czWidgetFormLink::displayLink($other['link']) ,
									!empty($other['link_caption'])?$other['link_caption']:'[en savoir plus]'
									);
							}

							if ($total>1) {
								echo '<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#666666"><br/><br/></font>';
							}
							$total--;
						}

					}else{
						printf('<img src="%s/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
					}

	?>

				</td>
				<td style="line-height:0; font-size: 0;" width="31" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
				<td width="219" bgcolor="#fcf2f5">


				<?php
	if (
		!empty($parameters['bottom_title']) ||
		!empty($parameters['bottom_content']) ||
		!empty($parameters['phone']) ||
		!empty($parameters['email'])
	) :

		if (!empty($parameters['bottom_title']) || !empty($parameters['bottom_content'])) {
			if (!empty($parameters['bottom_title'])) {
				printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:20px; font-size:16px; font-weight:bold; color:#274578">%s<br /></font>', htmlentities($parameters['bottom_title'], ENT_COMPAT, 'UTF-8'));
			}
			if (!empty($parameters['bottom_content'])) {
				printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578">%s</font>', nl2br(htmlentities($parameters['bottom_content'], ENT_COMPAT, 'UTF-8')));
			}

			if (!empty($parameters['phone']) || !empty($parameters['email'])) {
				printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578"><br /><br /></font>');
			}
		}


		if (!empty($parameters['phone']) || !empty($parameters['email'])) :
			?>

					 <table cellpadding="0" cellspacing="0" width="219" border="0">
						<?php
			if (!empty($parameters['phone'])) {
				printf('<tr valign="middle">
				<td style="line-height:0; font-size: 0;"  width="30"><img src="%s/cciFormationPlugin/images/campaign01/bullet_phone.jpg" width="22" height="21" alt="" border="0" /></td>
				<td><font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:20px; font-size:16px; font-weight:bold; color:#274578">%s</font></td>
							</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['phone'], ENT_COMPAT, 'UTF-8'));

				if (!empty($parameters['email'])) {
					printf('<tr style="line-height:0; font-size: 0;" >
								<td colspan="2"><img src="%s/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="10" alt="" border="0" /></td>
							</tr>', CatalyzEmailing::getApplicationUrl() );
				}
			}

			if (!empty($parameters['email'])) {
				printf('<tr valign="middle">
				<td style="line-height:0; font-size: 0;"  width="30"><img src="%1$s/cciFormationPlugin/images/campaign01/bullet_mail.jpg" width="22" height="21" alt="" border="0" /></td>
				<td><font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578"><a style="color:#274578; text-decoration:none" target="_blank" href="mailto:%2$s">%2$s</a></font></td>
							</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['email'], ENT_COMPAT, 'UTF-8'));
			}

			?>
					</table>
					<?php endif ?>
					 <?php else: ?>
					 	<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
					 <?php endif ?>

				</td>
				<td style="line-height:0; font-size: 0;" width="16" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" height="173" colspan="5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/footer.jpg" width="600" height="173" alt="" border="0" />
				</td>
			</tr>
		</table>
			<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="22" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
			<td width="561" height="70" align="center">
				<font face="Arial, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#666666">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectificationet d'opposition<br/> aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#666666;" href="mailto:xxx@xxx.fr" target="_blank">xxx@xxx.fr</a>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#666666;">ce lien de d&#233;sinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>
</body>
</html>