<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#787878" link="#787878" alink="#787878">
	<?php
	$parameters = unEscape($parameters);
	$renderer = new CatalyzEmailRenderer('Arial','#666666','line-height:15px; font-size:12px;');
	?>
	<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="600" align="center"><font face="Arial, sans-serif" style="line-height:13px; font-weight:bold; font-size:9px;text-align:center; color:#666666">Si les images ne s'affichent pas correctement, <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a></font></td>
			</tr>
		</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/planning_top.jpg" width="600" height="6" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="7" bgcolor="#666666">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/planning_left.jpg" width="7" height="15" alt="" border="0" />
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
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/planning_right.jpg" width="7" height="15" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="3">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/planning_bottom.jpg" width="600" height="6" alt="" border="0" />
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
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
			<tr valign="top">
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
				<td width="580">
					<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; font-style:italic; line-height: 17px; font-size: 13px; font-weight:bold; color:#ffffff;">%s</font>', htmlentities($parameters['subtitle'], ENT_COMPAT, 'UTF-8')); ?>
				</td>
				<td width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_subtitle.gif" width="10" height="1" alt="" border="0" /></td>
			</tr>
			<tr valign="top" style="line-height:0; font-size: 0;">
				<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_subtitle.gif" width="10" height="5" alt="" border="0" /></td>
			</tr>
		</table>
		<?php endif ?>

		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td width="250" bgcolor="#dfe3eb">
					<?php
	if (!empty($parameters['left_title']) ||  !empty($parameters['left_content']) ) :
	?>
					<table width="250" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="250" bgcolor="#dfe3eb" colspan="4">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="1" height="37" alt="" border="0" />
									</td>
								</tr>
								<?php if (!empty($parameters['left_title'])) : ?>
								<tr valign="top">
									<td width="250" height="20" bgcolor="#dfe3eb" colspan="4">

								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td style="line-height:0; font-size: 0;" width="15" bgcolor="#dfe3eb">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
										</td>
										<td style="line-height:0; font-size: 0;" width="30" bgcolor="#dfe3eb">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bullet_2.jpg" width="16" height="29" alt="" border="0" />
										</td>
										<td width="190" bgcolor="#dfe3eb">
											<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:24px; font-size:18px; font-weight:bold; color:#295784">%s</font>', htmlentities($parameters['left_title'], ENT_COMPAT, 'UTF-8')); ?>
										</td>
										<td style="line-height:0; font-size: 0;" width="15" bgcolor="#dfe3eb">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<?php endif ?>
						<?php if (!empty($parameters['left_content'])): ?>
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="15" bgcolor="#dfe3eb">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="15" height="1" alt="" border="0" />
									</td>
									<td width="220" bgcolor="#dfe3eb" colspan="2">
										<?php echo $renderer->renderWysiwyg(utf8_decode($parameters['left_content']), '#363636') ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="15" bgcolor="#dfe3eb">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="15" height="1" alt="" border="0" />
									</td>
								</tr>
							<?php else : ?>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_very_light_blue.jpg" width="1" height="1" alt="" border="0" />
						<?php endif ?>
							</table>
							<?php endif ?>
						</td>
				<td width="350" bgcolor="#FFFFFF">
					<table width="350" cellspacing="0" cellpadding="0" border="0">
						<!-- d&#233;but du bloc colonne gauche -->
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" bgcolor="#FFFFFF" colspan="4">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="37" alt="" border="0" />
							</td>
						</tr>

						<?php if (!empty($parameters['right_title'])) : ?>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="21" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
							<td style="line-height:0; font-size: 0;" width="21" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bullet_1.gif" width="15" height="20" alt="" border="0" />
							</td>
							<td width="296" bgcolor="#FFFFFF">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($parameters['right_title'], ENT_COMPAT, 'UTF-8') ) ?>
							</td>
							<td style="line-height:0; font-size: 0;" width="12" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" height="17" bgcolor="#FFFFFF" colspan="4">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<?php endif ?>

						<?php if (!empty($parameters['right_content'])) : ?>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="21" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
							<td style="line-height:0; font-size: 0;" width="21" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
							<td width="271" bgcolor="#FFFFFF">
								<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:15px; font-size:12px; color:#666666">%s</font>', nl2br(htmlentities($parameters['right_content'], ENT_COMPAT, 'UTF-8'))) ?>
							</td>
							<td style="line-height:0; font-size: 0;" width="37" bgcolor="#FFFFFF">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="350" height="17" bgcolor="#FFFFFF" colspan="4">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
						</tr>
						<?php endif ?>
						<?php if (!empty($parameters['right_target'])) : ?>
						<tr valign="top">
							<td style="line-height:0; font-size: 0;" width="42" bgcolor="#FFFFFF" colspan="2">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
							</td>
								<td style="line-height:0; font-size: 0;" width="308" height="25" bgcolor="#FFFFFF" colspan="2">
									<?php printf('<a style="text-decoration:none;" href="%s" target="_blank"><img src="%s/cciFormationPlugin/images/invitation/inscription_btn.jpg" width="99" height="25" alt="" border="0" /></a>',
	czWidgetFormLink::displayLink($parameters['right_target']), CatalyzEmailing::getApplicationUrl()) ?>
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;" width="350" height="29" bgcolor="#FFFFFF" colspan="4">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
								</td>
							</tr>
							<?php endif ?>
					</table>
				</td>
						</tr>


					<?php if (
	!empty($parameters['others_title']) ||
	!empty($parameters['others'])
	) :

	$left = $right = array();
	if (!empty($parameters['others'])) {
		foreach ($parameters['others'] as $key => $details){
			if ($key%2 == 0) {
				$left[]=$details;
			}else{
				$right[]=$details;
			}
		}
	}

	?>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="600" colspan="2">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_invitation.jpg" width="600" height="35" alt="" border="0" />
						</td>
					</tr>
					</table>
					<?php if (!empty($parameters['others_title'])) :?>

							<table align="center" width="600" cellspacing="0" bgcolor="#FFFFFF" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="15">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="570" bgcolor="#FFFFFF">
										<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:22px; font-size:18px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($parameters['others_title'], ENT_COMPAT, 'UTF-8')) ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="15">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
								<tr valign="top">
									<td colspan="3">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="20" alt="" border="0" />
									</td>
								</tr>
							</table>
							<?php endif ?>
					<table align="center" width="600" cellspacing="0" bgcolor="#FFFFFF" cellpadding="0" border="0">
					<tr valign="top">
						<td width="250" bgcolor="#FFFFFF">
							<table width="250" cellspacing="0" bgcolor="#FFFFFF" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="15">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="235" bgcolor="#FFFFFF">
									<?php if (!empty($left)) : ?>
										<table width="235" cellspacing="0" cellpadding="0" border="0">




											<?php foreach ($left as $left_element): ?>



										<?php if (!empty($left_element['title'])) :?>
										<tr valign="top">
											<td bgcolor="#FFFFFF">
												<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:20px; font-size:14px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($left_element['title'], ENT_COMPAT, 'UTF-8')) ?>
											</td>
										</tr>
										<tr valign="top">
											<td height="17" bgcolor="#FFFFFF">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
											</td>
										</tr>
										<?php endif ?>

										<?php if (!empty($left_element['introduction'])) :?>
										<tr valign="top">
											<td bgcolor="#FFFFFF">
												<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:15px; font-size:12px; color:#666666">%s</font>', nl2br(htmlentities($left_element['introduction'], ENT_COMPAT, 'UTF-8'))) ?>
											</td>
										</tr>
										<tr valign="top">
											<td style="line-height:0; font-size: 0;" bgcolor="#FFFFFF">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="17" alt="" border="0" />
											</td>
										</tr>
										<?php endif ?>

										<?php if (!empty($left_element['link'])) :?>
											<tr valign="top">
												<td bgcolor="#FFFFFF">
													<?php
	printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#cd2861">
												<a style="text-decoration:none; color:#cd2861" href="%s" target="_blank">%s</a></font>',
	czWidgetFormLink::displayLink($left_element['link']), !empty($left_element['link_caption'])?htmlentities($left_element['link_caption'], ENT_COMPAT, 'UTF-8'):'[en savoir plus]') ?>
												</td>
											</tr>
											<tr valign="top">
												<td style="line-height:0; font-size: 0;" bgcolor="#FFFFFF">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="20" alt="" border="0" />
												</td>
											</tr>
											<?php endif ?>
										<?php endforeach  ?>

										</table>
										<?php else: ?>
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
										<?php endif ?>
									</td>
								</tr>
							</table>
						</td>
						<td width="350" bgcolor="#FFFFFF">
							<table width="350" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td style="line-height:0; font-size: 0;" width="45" bgcolor="#FFFFFF">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
									</td>
									<td width="286" bgcolor="#FFFFFF">
										<?php if (!empty($right)) : ?>
										<table width="286" cellspacing="0" cellpadding="0" border="0">

											<?php foreach ($right as $right_element): ?>

											<?php if (!empty($right_element['title'])) :?>
												<tr valign="top">
												<td bgcolor="#FFFFFF">
													<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:20px; font-size:14px; font-weight:bold; color:#cd2861">%s</font>', htmlentities($left_element['title'], ENT_COMPAT, 'UTF-8')) ?>
												</td>
											</tr>
											<tr valign="top">
												<td style="line-height:0; font-size: 0;" height="17" bgcolor="#FFFFFF">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
												</td>
											</tr>
											<?php endif ?>
											<?php if (!empty($right_element['introduction'])) :?>
											<tr valign="top">
												<td bgcolor="#FFFFFF">
													<?php printf('<font face="Trebuchet MS, Arial, sans-serif" style="line-height:15px; font-size:12px; color:#666666">%s</font>', nl2br(htmlentities($right_element['introduction'], ENT_COMPAT, 'UTF-8'))) ?>
												</td>
												<td style="line-height:0; font-size: 0;" bgcolor="#FFFFFF">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
												</td>
											</tr>
											<tr valign="top">
												<td style="line-height:0; font-size: 0;" height="17" bgcolor="#FFFFFF">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
												</td>
											</tr>
											<?php endif ?>
											<?php if (!empty($right_element['link'])) :?>
											<tr valign="top">
													<td bgcolor="#FFFFFF">
														<?php
	printf('<font face="Trebuchet MS, Arial, sans-serif" style="text-align:left; line-height:16px; font-size:12px; color:#cd2861">
	<a style="text-decoration:none; color:#cd2861" href="%s" target="_blank">%s</a></font>',
	czWidgetFormLink::displayLink($right_element['link']), !empty($right_element['link_caption'])?htmlentities($right_element['link_caption'], ENT_COMPAT, 'UTF-8'):'[en savoir plus]') ?>
													</td>
												</tr>
											<tr valign="top">
												<td style="line-height:0; font-size: 0;" height="20" bgcolor="#FFFFFF">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
												</td>
											</tr>
											<?php endif ?>
											<?php endforeach ?>

										</table>
										<?php else: ?>
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
										<?php endif ?>
									</td>
									<td style="line-height:0; font-size: 0;" width="45" bgcolor="#FFFFFF">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php endif ?>

				</table>

		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" colspan="4">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/sep_invitation2.jpg" width="600" height="35" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="15" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
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
		printf('<img src="%s/cciFormationPlugin/images/invitation/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
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
			<td style="line-height:0; font-size: 0;"  width="30"><img src="%s/cciFormationPlugin/images/invitation/bullet_phone.jpg" width="22" height="21" alt="" border="0" /></td>
			<td><font face="Trebuchet MS, Arial, sans-serif" style="text-transform:uppercase; line-height:20px; font-size:16px; font-weight:bold; color:#274578">%s</font></td>
						</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['phone'], ENT_COMPAT, 'UTF-8'));

			if (!empty($parameters['email'])) {
				printf('<tr style="line-height:0; font-size: 0;" >
							<td colspan="2"><img src="%s/cciFormationPlugin/images/invitation/bg_light_pink.jpg" width="1" height="10" alt="" border="0" /></td>
						</tr>', CatalyzEmailing::getApplicationUrl() );
			}
		}

		if (!empty($parameters['email'])) {
			printf('<tr valign="middle">
			<td style="line-height:0; font-size: 0;"  width="30"><img src="%1$s/cciFormationPlugin/images/invitation/bullet_mail.jpg" width="22" height="21" alt="" border="0" /></td>
			<td><font face="Trebuchet MS, Arial, sans-serif" style="line-height:16px; font-size:12px; font-weight:bold; color:#274578"><a style="color:#274578; text-decoration:none" target="_blank" href="mailto:%2$s">%2$s</a></font></td>
						</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($parameters['email'], ENT_COMPAT, 'UTF-8'));
		}

		?>
					</table>

					 <?php else: ?>
					 	<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
					 <?php endif ?>

				</td>
				<td style="line-height:0; font-size: 0;" width="17" bgcolor="#fcf2f5">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_light_pink.jpg" width="1" height="1" alt="" border="0" />
				</td>
			</tr>
			<tr valign="top">
				<td style="line-height:0; font-size: 0;" width="600" height="173" colspan="4">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/footer.jpg" width="600" height="173" alt="" border="0" />
				</td>
			</tr>
		</table>
			<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="22" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
			<td width="561" height="70" align="center">
				<font face="Arial, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#666666">Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d'un droit d'acc&#232;s, de rectificationet d'opposition<br/> aux informations vous concernant qui peut s'exercer par e-mail &#224; <a style="color:#666666;"
				href="mailto:xxx@xxx.fr" target="_blank">xxx@xxx.fr</a> ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#666666;">ce lien de d&#233;sinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17" height="70">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/cciFormationPlugin/images/invitation/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>
</body>
</html>