<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFFFFF" link="#102b44" vlink="#102b44" alink="#102b44">
	<?php $renderer = new CatalyzEmailRenderer('Tahoma, Geneva, sans-serif','#1c4575','line-height: 15px; font-size: 12px;'); ?>


	<table width="700" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td colspan="2" align="center"><font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 10px;" size="2" color="#787878">
Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#787878;" href="#VIEW_ONLINE#" target="_blank"><font color="#787878">consultez la page suivante</font></a>.
				</font></td>
		</tr>
		<tr style="line-height: 0; font-size: 0;" valign="top">
			<td width="410"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="290" align="right"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/ribbon_t.png" width="290" height="18" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="708" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0" style="background-image: url(<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/table_bg.gif); background-repeat: repeat-y;">
		<tr valign="top">
			<td align="center">
					<table width="700" bgcolor="#1b7187" align="center" cellspacing="0" cellpadding="0" border="0">
						<tr style="line-height: 0; font-size: 0;" valign="top">
							<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/header_1.png" width="700" height="43" alt="" border="0" /></td>
						</tr>
						<tr valign="top">
							<td style="line-height: 0; font-size: 0;" width="583">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/header_2.png" width="590" height="44" alt="" border="0" />
							</td>
							<td width="117" align="right" valign="bottom">
								<?php
								if (!empty($parameters['number'])) {
									printf('<font face="Tahoma, Geneva, sans-serif" style="line-height: 16px; font-size: 16px;" size="2" color="#FFFFFF">%s</font>', $parameters['number']);
								}
								if (!empty($parameters['date'])) {
									printf('<font face="Tahoma, Geneva, sans-serif" style="line-height: 13px; font-size: 13px;" size="2" color="#b1d3d4"><br/>%s</font>', $parameters['date']);
								}
								?>
							</td>
							<td style="line-height: 0; font-size: 0;" width="10">
								<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_d_blue.gif" width="10" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr bgcolor="#FFFFFF" style="line-height: 0; font-size: 0;" valign="top">
							<td width="700" colspan="3">
								<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/header_4.png" width="700" height="76" alt="" border="0" />
							</td>
						</tr>
						<tr style="line-height: 0; font-size: 0;" valign="top" bgcolor="#FFFFFF">
							<td width="700" colspan="3">
								<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="1" height="10" alt="" border="0" />
							</td>
						</tr>
					</table>

					<table width="700" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
						<tr valign="top">
							<td style="line-height: 0; font-size: 0;" width="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="2" height="1" alt="" border="0" /></td>



							<td width="434" valign="top">

							<?php if (!empty($parameters['edito'])): ?>
								<table width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="8"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="8" height="1" alt="" border="0" /></td>
										<td width="418" align="left">
											<?php $renderer->renderWysiwyg(html_entity_decode($parameters['edito'], ENT_COMPAT, 'utf-8'),'#1c4575'); ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="8"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="8" height="1" alt="" border="0" /></td>
									</tr>
								</table>
							<?php endif ?>

							<?php if (!empty($parameters['zone_actu_content']) || !empty($parameters['zone_actu_picture']) || !empty($parameters['zone_actu_title']) || !empty($parameters['zone_actu_link'])):?>
								<?php if (!empty($parameters['zone_actu_title'])):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="4" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="19" alt="" border="0" /></td>
									</tr>
									<tr valign="top" bgcolor="#c68d4b">
										<td style="line-height: 0; font-size: 0;" width="11"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_l_brown.gif" width="11" height="1" alt="" border="0" /></td>
										<td width="312" valign="middle" align="left">
											<?php if (!empty($parameters['zone_actu_title'])) {
												printf('<font face="Arial, Arial, Helvetica, sans-serif" style="line-height: 19px; font-size: 15px;" size="2" color="#FFFFFF">%s</font>', $parameters['zone_actu_title']);
											} ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="10" valign="top" align="right"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/title_round_corner_brown.gif" width="10" height="9" alt="" border="0" /></td>
										<td style="line-height: 0; font-size: 0;" width="101" bgcolor="#FFFFFF"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3" width="333" bgcolor="#c68d4b"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_l_brown.gif" width="1" height="1" alt="" border="0" /></td>
										<td width="101" colspan="4" bgcolor="#af7a47"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_d_brown.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
								</table>
								<?php endif ?>

								<?php if (!empty($parameters['zone_actu_content']) || !empty($parameters['zone_actu_picture']) || !empty($parameters['zone_actu_link']) ):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="11" alt="" border="0" /></td>
									</tr>
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td align="left" style="line-height: 0; font-size: 0;" width="205">
										<?php if (!empty($parameters['zone_actu_picture']) && is_file(sfConfig::get('sf_web_dir').$parameters['zone_actu_picture'])) {
											printf('<img style="display: block;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['zone_actu_picture'], 205, 250));
										} ?>
										</td>
										<td width="222">
											<?php if (!empty($parameters['zone_actu_content']) || !empty($parameters['zone_actu_link'])) : ?>
											<table class="rubrique_title" width="222" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
												<tr valign="top">
													<td colspan="2" width="222"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="222" height="5" alt="" border="0" /></td>
												</tr>

												<?php foreach ($parameters['zone_actu_content'] as $actu): ?>
													<?php if (!empty($actu['title'])) : ?>
														<tr valign="top">
															<td style="line-height: 0; font-size: 0;" width="30" align="right" valign="top">
																<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/bullet_1.gif" width="15" height="14" alt="" border="0" />
															</td>
															<td width="192" align="left">
																<?php printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 12px;" size="2" color="#1f4344">%s</font>', nl2br($actu['title'])); ?>
															</td>
														</tr>
														<tr style="line-height: 0; font-size: 0;" valign="top">
															<td colspan="2" width="222"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="222" height="15" alt="" border="0" /></td>
														</tr>
													<?php endif ?>
												<?php endforeach ?>

												<?php if ( !empty($parameters['zone_actu_link'])): ?>
												<tr valign="top">
													<td style="line-height: 0; font-size: 0;" width="30" align="right">
														<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="30" height="1" alt="" border="0" />
													</td>
													<td width="192" align="left">
														<?php printf('<a style="color:#a1794a;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#a1794a">CONSULTER LE DOSSIER<img src="%s/astiaPlugin/images/newsletter2012/more_actualite.gif" width="13" height="10" alt="" border="0" /></font></a>', czWidgetFormLink::displayLink($parameters['zone_actu_link']),CatalyzEmailing::getApplicationUrl()) ?>
													</td>
												</tr>
												<?php endif ?>

											</table>
											<?php endif ?>
										</td>
									</tr>
								</table>
								<?php endif ?>
							<?php endif ?>


							<?php if (!empty($parameters['zone_annexe_title']) || !empty($parameters['zone_annexe_content']) || !empty($parameters['zone_annexe_link'])):?>
								<?php if (!empty($parameters['zone_annexe_title'])):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="4" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="19" alt="" border="0" /></td>
									</tr>
									<tr valign="top" bgcolor="#4a7687">
										<td style="line-height: 0; font-size: 0;" width="11"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_annexe_light.gif" width="11" height="1" alt="" border="0" /></td>
										<td width="312" valign="middle" align="left">
											<?php
												printf('<font face="Arial, Arial, Helvetica, sans-serif" style="line-height: 19px; font-size: 15px;" size="2" color="#FFFFFF">%s</font>', $parameters['zone_annexe_title']);
											 ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="10" valign="top" align="right"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/title_round_corner_annexe.gif" width="10" height="9" alt="" border="0" /></td>
										<td style="line-height: 0; font-size: 0;" width="101" bgcolor="#FFFFFF"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3" width="333" bgcolor="#4a7687"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_annexe_light.gif" width="1" height="1" alt="" border="0" /></td>
										<td width="101" bgcolor="#377879"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_annexe_dark.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
								</table>
								<?php endif ?>
								<?php if (!empty($parameters['zone_annexe_content']) || !empty($parameters['zone_annexe_link'])):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td width="401" align="left">
											<?php if (!empty($parameters['zone_annexe_content'])) {
												printf('<p><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 12px;" size="2" color="#444444">%s</font></p>', nl2br($parameters['zone_annexe_content']));
											}

											if (!empty($parameters['zone_annexe_link'])) {
												printf('<a style="color:#5a7585;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#5a7585">CONSULTER<img src="%s/astiaPlugin/images/newsletter2012/more_annexe.gif" width="13" height="10" alt="" border="0" /></font></a>', czWidgetFormLink::displayLink($parameters['zone_annexe_link']) , CatalyzEmailing::getApplicationUrl());
											}
											?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="26"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="26" height="19" alt="" border="0" /></td>
									</tr>
								</table>
								<?php endif ?>
							<?php endif ?>

							<?php if (!empty($parameters['zone_experiences_title']) || !empty($parameters['zone_experiences_content'])):?>
							<?php if (!empty($parameters['zone_experiences_title'])):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="4" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="19" alt="" border="0" /></td>
									</tr>
									<tr valign="top" bgcolor="#004142">
										<td style="line-height: 0; font-size: 0;" width="11"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_experience_light.gif" width="11" height="1" alt="" border="0" /></td>
										<td width="312" valign="middle" align="left">
											<?php printf('<font face="Arial, Arial, Helvetica, sans-serif" style="line-height: 19px; font-size: 15px;" size="2" color="#FFFFFF">%s</font>', $parameters['zone_experiences_title']); ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="10" valign="top" align="right"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/title_round_corner_experience.gif" width="10" height="9" alt="" border="0" /></td>
										<td width="101" bgcolor="#FFFFFF"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
									<tr valign="top" style="line-height: 0; font-size: 0;">
										<td colspan="3" width="333" bgcolor="#004142"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_experience_light.gif" width="1" height="1" alt="" border="0" /></td>
										<td width="101" bgcolor="#1f4344"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_experience_dark.gif" width="101" height="1" alt="" border="0" /></td>
									</tr>
								</table>
								<?php endif ?>
								<?php if (!empty($parameters['zone_experiences_content'])):?>
								<table class="rubrique_title" width="434" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">

									<?php
									$experiences = $parameters['zone_experiences_content'];
									if (count($experiences) > 1):

									$temp = $experiences;

									while(!empty($temp)):
										$a_left = array();
										$a_right = array();
										$a_left = array_shift($temp);
										if (!empty($temp)) {
											$a_right = array_shift($temp);
										}
								?>

									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="5" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="14" alt="" border="0" /></td>
									</tr>
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td width="116" align="left">
										<?php
										if (!empty($a_left['title'])) {
											printf('<font face="Arial, Arial, Helvetica, sans-serif" style="font-weight:bold; line-height: 13px; font-size: 11px;" size="2" color="#1f4344">%s<br/></font>', nl2br($a_left['title']));
										}
										if (!empty($a_left['contenu'])) {
											printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#444444">%s</font>', nl2br($a_left['contenu']));
										}
									 ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="103" valign="top" align="left">
										<?php if (!empty($a_left['picture']) && is_file(sfConfig::get('sf_web_dir').$a_left['picture'])) {
											printf('<img style="display: block; border-bottom: 5px solid #1f4344; padding-bottom: 1px;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($a_left['picture'], 90, 90) );
										} ?>
										</td>
										<td width="118" align="left">
										<?php
											if (!empty($a_right['title'])) {
												printf('<font face="Arial, Arial, Helvetica, sans-serif" style="font-weight:bold; line-height: 13px; font-size: 11px;" size="2" color="#1f4344">%s<br/></font>', nl2br($a_right['title']));
											}
											if (!empty($a_right['contenu'])) {
												printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#444444">%s</font>', nl2br($a_right['contenu']));
											}
										 ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="90" valign="top">
											<?php if (!empty($a_right['picture']) && is_file(sfConfig::get('sf_web_dir').$a_right['picture'])) {
												printf('<img style="display: block; border-bottom: 5px solid #1f4344; padding-bottom: 1px;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($a_right['picture'], 90, 90) );
											} ?>
										</td>
									</tr>
									<tr valign="top">
										<td colspan="5" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="5" alt="" border="0" /></td>
									</tr>
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td width="206" colspan="2" align="left">
											<?php
											if (!empty($a_left['link'])) {
												printf('<a style="color:#444444;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#444444">CONSULTER LE TÉMOIGNAGE<img src="%s/astiaPlugin/images/newsletter2012/more_experience.gif" width="13" height="10" alt="" border="0" /></font></a>', czWidgetFormLink::displayLink($a_left['link']) ,CatalyzEmailing::getApplicationUrl());
											}
											 ?>
										</td>
										<td width="208" colspan="2" align="left">
											<?php
											if (!empty($a_right['link'])) {
												printf('<a style="color:#444444;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#444444">CONSULTER LE TÉMOIGNAGE<img src="%s/astiaPlugin/images/newsletter2012/more_experience.gif" width="13" height="10" alt="" border="0" /></font></a>', czWidgetFormLink::displayLink($a_right['link']) ,CatalyzEmailing::getApplicationUrl());
											}
											 ?>
										</td>
									</tr>
									<?php endwhile; ?>

									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="5" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="15" alt="" border="0" /></td>
									</tr>

								<?php else : ?>
									<?php $experience = array_shift($experiences) ?>

									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="14" alt="" border="0" /></td>
									</tr>
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td width="324" align="left">
										<?php
										if (!empty($experience['title'])) {
											printf('<font face="Arial, Arial, Helvetica, sans-serif" style="font-weight:bold; line-height: 13px; font-size: 11px;" size="2" color="#1f4344">%s<br/></font>', nl2br($experience['title']));
										}
										if (!empty($experience['contenu'])) {
											printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#444444">%s</font>', nl2br($experience['contenu']));
										}
										 ?>
										</td>
										<td style="line-height: 0; font-size: 0;" width="103" align="right">
										<?php if (!empty($experience['picture']) && is_file(sfConfig::get('sf_web_dir').$experience['picture'])) {
											printf('<img style="display: block; border-bottom: 5px solid #1f4344; padding-bottom: 1px;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($experience['picture'], 90, 90) );
										} ?>
										</td>
									</tr>
									<tr valign="top">
										<td colspan="3" width="434"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="434" height="5" alt="" border="0" /></td>
									</tr>
									<?php if (!empty($experience['link'])) : ?>
									<tr>
										<td style="line-height: 0; font-size: 0;" width="7"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="7" height="1" alt="" border="0" /></td>
										<td width="427" colspan="2" align="left">
											<?php printf('<a style="color:#444444;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#444444">CONSULTER LE TÉMOIGNAGE<img src="%s/astiaPlugin/images/newsletter2012/more_experience.gif" width="13" height="10" alt="" border="0" /></font></a>', czWidgetFormLink::displayLink($experience['link']) ,CatalyzEmailing::getApplicationUrl()); ?>
										</td>
									</tr>
									<?php endif ?>

									<?php endif ?>

								</table>
								<?php endif ?>
							<?php endif ?>

							</td>
							<td valign="top" width="12" style="line-height: 0; font-size: 0; background-image: url(<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/middle_column_bg.gif); background-repeat: repeat-y;">
								<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/middle_column_t.gif" width="12" height="30" alt="" border="0" />
							</td>




							<td valign="top" width="250">

								<?php if (!empty($parameters['breves'])):?>
								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/breves_title.png" width="250" height="32" alt="" border="0" /></td>
									</tr>
									<?php foreach ($parameters['breves'] as $breve): ?>
										<?php if (!empty($breve['title'])): ?>
											<tr valign="top">
												<td style="line-height: 0; font-size: 0;" width="15" valign="top" align="left"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/bullet_2.gif" width="15" height="11" alt="" border="0" /></td>
												<td width="235" align="left">
													<?php if (!empty($breve['link'])) {
														printf('<a style="color:#669933;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669933">%s</font></a>', czWidgetFormLink::displayLink($breve['link']) , nl2br($breve['title']) );
													}
													else{
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669933">%s</font>', nl2br($breve['title']) );
													}
													 ?>
												</td>
											</tr>
											<tr style="line-height: 0; font-size: 0;" valign="top">
												<td colspan="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="250" height="30" alt="" border="0" /></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								</table>
								<?php endif ?>

								<?php if (!empty($parameters['agendas'])):?>
								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/agenda_title.png" width="250" height="32" alt="" border="0" /></td>
									</tr>
									<?php foreach ($parameters['agendas'] as $agenda): ?>
										<?php if (!empty($agenda['title'])): ?>
											<tr valign="top">
												<td style="line-height: 0; font-size: 0;" width="15" valign="top"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/bullet_3.gif" width="15" height="11" alt="" border="0" /></td>
												<td width="235" align="left">
													<?php
													if (!empty($agenda['date'])) {
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 13px; font-size: 11px;" size="2" color="#724617">%s<br/></font>', nl2br($agenda['date']) );
													}
													if (!empty($agenda['link'])) {
														printf('<a style="color:#cc9933;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#cc9933">%s</font></a>', czWidgetFormLink::displayLink($agenda['link']) , nl2br($agenda['title']) );
													}
													else{
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#cc9933">%s</font>', nl2br($agenda['title']) );
													}
													 ?>
												</td>
											</tr>
											<tr style="line-height: 0; font-size: 0;" valign="top">
												<td colspan="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="250" height="30" alt="" border="0" /></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								</table>
								<?php endif ?>

								<?php if (!empty($parameters['zooms'])):?>
								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/zoom_title.png" width="250" height="32" alt="" border="0" /></td>
									</tr>
									<?php foreach ($parameters['zooms'] as $zoom): ?>
										<?php if (!empty($zoom['title'])): ?>
											<tr valign="top">
												<td style="line-height: 0; font-size: 0;" width="15" valign="top"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/bullet_4.gif" width="15" height="11" alt="" border="0" /></td>
												<td width="139" align="left">
													<?php
													if (!empty($zoom['link'])) {
														printf('<a style="color:#669999;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669999">%s</font></a>', czWidgetFormLink::displayLink($zoom['link']) , nl2br($zoom['title']) );
													}
													else{
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669999">%s</font>', nl2br($zoom['title']) );
													}
													 ?>
												</td>
												<td style="line-height: 0; font-size: 0;" width="96" align="center">
													<?php if (!empty($zoom['picture']) && is_file(sfConfig::get('sf_web_dir').$zoom['picture'])) {
														printf('<img style="display: block; border-bottom: 5px solid #60a6a8; padding-bottom: 1px;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($zoom['picture'], 90, 90));
													} ?>
												</td>
											</tr>
											<tr style="line-height: 0; font-size: 0;" valign="top">
												<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="250" height="30" alt="" border="0" /></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								</table>
								<?php endif ?>

								<?php if (!empty($parameters['savoirs'])):?>
								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/savoir_title.png" width="250" height="32" alt="" border="0" /></td>
									</tr>
									<?php foreach ($parameters['savoirs'] as $savoir): ?>
										<?php if (!empty($savoir['title'])): ?>
											<tr valign="top">
												<td style="line-height: 0; font-size: 0;" width="15" valign="top" align="left"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/bullet_5.gif" width="15" height="11" alt="" border="0" /></td>
												<td width="139" align="left">
													<?php
													if (!empty($savoir['link'])) {
														printf('<a style="color:#669900;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669900">%s</font></a>', czWidgetFormLink::displayLink($savoir['link']) , nl2br($savoir['title']) );
													}
													else{
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#669900">%s</font>', nl2br($savoir['title']) );
													}
													 ?>

												</td>
												<td style="line-height: 0; font-size: 0;" width="96" align="center">
													<?php if (!empty($savoir['picture']) && is_file(sfConfig::get('sf_web_dir').$savoir['picture'])) {
														printf('<img style="display: block; border-bottom: 5px solid #b2d13f; padding-bottom: 1px;" src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($savoir['picture'], 90, 90));
													} ?>
												</td>
											</tr>
											<tr style="line-height: 0; font-size: 0;" valign="top">
												<td colspan="3"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="250" height="30" alt="" border="0" /></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								</table>
								<?php endif ?>

								<?php if (!empty($parameters['chiffres'])):?>
								<table width="250" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td style="line-height: 0; font-size: 0;" colspan="4"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/chiffres_title.png" width="250" height="32" alt="" border="0" /></td>
									</tr>
									<?php foreach ($parameters['chiffres'] as $chiffre): ?>
										<?php if (!empty($chiffre['title'])): ?>
											<tr valign="top">
												<td width="82" align="right">
													<?php if (!empty($chiffre['number'])) {
														printf('<font face="Trebuchet MS, Trebuchet MS, sans-serif" style="line-height: 25px; font-size: 25px;" size="2" color="#a17926">%s</font>', $chiffre['number']);
													} ?>
												</td>
												<td style="line-height: 0; font-size: 0;" width="16"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="16" height="1" alt="" border="0" /></td>
												<td width="144" align="left">
													<?php
													if (!empty($chiffre['link'])) {
														printf('<a style="color:#cc6633;" href="%s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#cc6633">%s</font></a>', czWidgetFormLink::displayLink($chiffre['link']) , nl2br($chiffre['title']) );
													}
													else{
														printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 13px; font-size: 11px;" size="2" color="#cc6633">%s</font>', nl2br($chiffre['title']) );
													}
													 ?>
												</td>
												<td style="line-height: 0; font-size: 0;" width="8"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="8" height="1" alt="" border="0" /></td>
											</tr>
											<tr style="line-height: 0; font-size: 0;" valign="top">
												<td colspan="4"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="250" height="30" alt="" border="0" /></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>

								</table>
								<?php endif ?>

							</td>
							<td style="line-height: 0; font-size: 0;" width="2"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
						</tr>
					</table>

					<table width="700" bgcolor="#edf1f3" align="center" cellspacing="0" cellpadding="0" border="0">
						<tr style="line-height: 0; font-size: 0;" valign="top">
							<td colspan="3" width="700"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/footer_sep.gif" width="700" height="3" alt="" border="0" /></td>
						</tr>
						<tr style="line-height: 0; font-size: 0;" valign="top">
							<td colspan="3" width="700"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_footer.gif" width="700" height="10" alt="" border="0" /></td>
						</tr>
						<tr valign="top">
							<td style="line-height: 0; font-size: 0;" width="56"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_footer.gif" width="56" height="1" alt="" border="0" /></td>
							<td width="527">
								<table width="527" bgcolor="#edf1f3" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td colspan="3" width="527" align="left">
											<?php
											if (!empty($parameters['footer_title'])) {
												printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 15px; font-size: 11px;" size="2" color="#2d6375">%s</font>', $parameters['footer_title']);
											}
											?>
										</td>
									</tr>
									<tr style="line-height: 0; font-size: 0;" valign="top">
										<td colspan="3" width="527" align="left">
											<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/sep_footer.gif" width="527" height="10" alt="" border="0" />
										</td>
									</tr>
									<?php if (!empty($parameters['adress'])): ?>
									<tr valign="top">
										<td colspan="3" width="527" align="left">
											<?php printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 15px; font-size: 10px;" size="2" color="#2d6375">SIÈGE ADMINISTRATIF - </font><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#2d6375">%s</font>', $parameters['adress']) ?>
										</td>
									</tr>
									<?php endif ?>
									<tr valign="top">
										<td width="134" align="left">
											<?php
											if (!empty($parameters['phone'])) {
												printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 15px; font-size: 10px;" size="2" color="#669933">Tél. :</font><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#2d6375">%s</font>', $parameters['phone']);
											}
											 ?>
										</td>
										<td width="132" align="left">
											<?php
											if (!empty($parameters['fax'])) {
												printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 15px; font-size: 10px;" size="2" color="#669933">Fax :</font><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#2d6375">%s</font>', $parameters['fax']);
											}
											?>
										</td>
										<td width="261" align="left">
											<?php
											if (!empty($parameters['email'])) {
												printf('<font face="Verdana, Verdana, Geneva, sans-serif" style="font-weight: bold; line-height: 15px; font-size: 10px;" size="2" color="#669933">Email :</font><a style="color:#2d6375;" href="mailto:%1$s" target="_blank"><font face="Verdana, Verdana, Geneva, sans-serif" style="line-height: 15px; font-size: 10px;" size="2" color="#2d6375">%1$s</font></a>', $parameters['email']);
											}
											?>
										</td>
									</tr>
								</table>
							</td>
							<td style="line-height: 0; font-size: 0;" width="117" valign="bottom" align="left"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/contact_img.png" width="40" height="57" alt="" border="0" /></td>
						</tr>
						<tr style="line-height: 0; font-size: 0;" valign="top">
							<td colspan="3" width="700"><img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/pre_footer.png" width="700" height="11" alt="" border="0" /></td>
						</tr>
					</table>

			</td>
		</tr>
	</table>

	<table width="708" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0; font-size: 0;" valign="top">
			<td width="708">
				<img style="display: block;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/astiaPlugin/images/newsletter2012/footer.png" width="708" height="20" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td align="center"><font face="Tahoma, Geneva, sans-serif" style="line-height: 12px; font-size: 10px;" size="2" color="#787878">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>
et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <a style="color:#787878;" href="mailto:communication@astia.fr" target="_blank"><font color="#787878">communication@astia.fr</font></a><br/>
ou par courrier en indiquant votre nom et prénom. Si vous souhaitez vous désinscrire, <a style="color:#787878;" href="#UNSUBSCRIBE#" target="_blank"><font color="#787878">cliquez ici</font></a>.
				</font></td>
		</tr>
	</table>
</body>
</html>