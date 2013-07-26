<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<?php $parameters = unEscape($parameters) ?>
<body>
	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0;">
			<td colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/header.jpg" width="600" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center">
				<font face="Arial" style="line-height: 12px; font-size: 10px;text-align:center; " size="2" color="#FFFFFF">Si vous avez des difficultés pour visualiser ce message et ses images. <a style="color:#FFFFFF;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="600" height="5" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/header_1.jpg" width="600" height="160" border="0" />
			</td>
		</tr>
		<tr valign="bottom">
			<td width="44" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/header_left.jpg" width="44" height="50" border="0" />
			</td>
			<td width="11" style="line-height: 0;"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="11" height="5" border="0" /></td>
			<td bgcolor="#998f86" width="454">
				<?php if (!empty($parameters['introduction'])) {
					printf('<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">%s</font>',nl2br($parameters['introduction']));
				} ?>
			</td>
			<td width="91" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/header_right.jpg" width="91" height="50" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="4">
				<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
					$header_style = 'header_b_red';
				}else{
					$header_style = 'header_b_green';
				}

				printf('<img alt="" src="%s/asfoPlugin/images/asfoDeveloppement/%s.jpg" width="600" height="10" border="0" />',CatalyzEmailing::getApplicationUrl(), $header_style);
				?>
			</td>
		</tr>
	</table>
	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="485" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<!-- partie 1 -->

					<tr style="line-height: 0;"><!-- begin -->
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_t.gif" width="485" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="1" bgcolor="#46418d">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td width="287" bgcolor="#625bc4">
							<table width="285" bgcolor="#625bc4" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="31">
										<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_t.gif" width="31" height="43" border="0" />
									</td>
									<td width="144">
										<?php if (!empty($parameters['training_1_caption'])) {
											printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
											%s
										</font>', htmlentities($parameters['training_1_caption'], ENT_COMPAT, 'utf-8'));
										} ?>
									</td>
									<td width="120">
										<?php if (!empty($parameters['training_1_price'])) {
											printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
											%s € HT/ pers.<br />2ème inscrit :%s €
										</font>', htmlentities($parameters['training_1_price'], ENT_COMPAT, 'utf-8'), ceil(0.8*$parameters['training_1_price']));
										} ?>
									</td>
								</tr>
							</table>
						</td>
						<td width="9" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="9" height="4" border="0" />
						</td>
						<td width="18" bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_c.gif" width="18" height="4" border="0" />
						</td>
						<td width="155" bgcolor="#874bb4">
							<table width="155" bgcolor="#874bb4" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td valign="middle" width="145">
										<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#d7a4fe">
											La prochaine session :
										</font>
									</td>
									<td width="10">
										<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_t_1.gif" width="10" height="43" border="0" />
									</td>
								</tr>
							</table>
						</td>
						<td colspan="2" width="6"  bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_t_2.gif" width="6" height="43" border="0" />
						</td>
					</tr>
					<tr style="line-height: 0;"> <!-- sep -->
						<td width="1" bgcolor="#46418d">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td colspan="4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_sep.gif" width="468" height="8" border="0" />
						</td>
						<td width="5"  bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#613682">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="1" bgcolor="#46418d">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td width="287" bgcolor="#625bc4">
							<?php if (!empty($parameters['training_1_introduction']) || !empty($parameters['training_1_link'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
								if (!empty($parameters['training_1_introduction'])) {
									echo nl2br($parameters['training_1_introduction']) ;
								}
								if (!empty($parameters['training_1_link'])) {
									printf('<br /><a style="text-decoration:none;line-height: 14px; color: #d7a4fe;" href="%s">&lt;&lt; Consulter le programme &gt;&gt;</a>', $parameters['training_1_link']);
								}
								echo '</font>';
							} ?>
						</td>
						<td width="9" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="9" height="4" border="0" />
						</td>
						<td width="18" bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_c.gif" width="18" height="4" border="0" />
						</td>
						<td width="155" bgcolor="#874bb4">
							<?php
							if (!empty($parameters['training_1_date'])){
									echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">'.trim(nl2br($parameters['training_1_date'])).'</font>';
							}
							?>
						</td>
						<td width="5"  bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#613682">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr style="line-height: 0;"> <!-- sep -->
						<td width="1" bgcolor="#46418d">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#625bc4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td colspan="4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_sep.gif" width="468" height="8" border="0" />
						</td>
						<td width="5"  bgcolor="#874bb4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#613682">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_1_b.jpg" width="485" height="12" border="0" />
						</td>
					</tr>
					<tr><!-- fin-->
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="485" height="15" border="0" />
						</td>
					</tr>

					<!-- partie 2 -->
					<tr style="line-height: 0;"><!-- begin -->
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_t.gif" width="485" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="1" bgcolor="#013a40">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td width="287" bgcolor="#005058">
							<table width="285" bgcolor="#005058" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="31">
										<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_t.gif" width="31" height="43" border="0" />
									</td>
									<td width="144">
										<?php if (!empty($parameters['training_2_caption'])) {
											printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
											%s
										</font>', htmlentities($parameters['training_2_caption'], ENT_COMPAT, 'utf-8'));
										} ?>
									</td>
									<td width="120">
										<?php if (!empty($parameters['training_2_price'])) {
											printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
											%s € HT/ pers.<br />2ème inscrit :%s €
										</font>', htmlentities($parameters['training_2_price'], ENT_COMPAT, 'utf-8'), ceil(0.8*$parameters['training_2_price']));
										} ?>
									</td>

								</tr>
							</table>
						</td>
						<td width="9" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="9" height="4" border="0" />
						</td>
						<td width="18" bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_c.gif" width="18" height="4" border="0" />
						</td>
						<td width="155" bgcolor="#046b70">
							<table width="155" bgcolor="#046b70" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td valign="middle" width="145">
										<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#40e80e">
											La prochaine session :
										</font>
									</td>
									<td width="10">
										<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_t_1.gif" width="10" height="43" border="0" />
									</td>
								</tr>
							</table>
						</td>
						<td colspan="2" width="6"  bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_t_2.gif" width="6" height="43" border="0" />
						</td>
					</tr>
					<tr style="line-height: 0;"> <!-- sep -->
						<td width="1" bgcolor="#013a40">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td colspan="4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_sep.gif" width="468" height="8" border="0" />
						</td>
						<td width="5"  bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#046067">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="1" bgcolor="#013a40">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td width="287" bgcolor="#005058">
							<?php if (!empty($parameters['training_2_introduction']) || !empty($parameters['training_2_link'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
								if (!empty($parameters['training_2_introduction'])) {
									echo nl2br($parameters['training_2_introduction']) ;
								}
								if (!empty($parameters['training_2_link'])) {
									printf('<br /><a style="text-decoration:none;line-height: 14px; color: #d7a4fe;" href="%s">&lt;&lt; Consulter le programme &gt;&gt;</a>', $parameters['training_2_link']);
								}
								echo '</font>';
							} ?>
						</td>
						<td width="9" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="9" height="4" border="0" />
						</td>
						<td width="18" bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_c.gif" width="18" height="4" border="0" />
						</td>
						<td width="155" bgcolor="#046b70">
							<?php
							if (!empty($parameters['training_2_date'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">'.$parameters['training_2_date'].'</font></li>';
							}
							?>
						</td>
						<td width="5"  bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#046067">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr style="line-height: 0;"> <!-- sep -->
						<td width="1" bgcolor="#013a40">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="10" bgcolor="#005058">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_l_c.gif" width="10" height="4" border="0" />
						</td>
						<td colspan="4">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_sep.gif" width="468" height="8" border="0" />
						</td>
						<td width="5"  bgcolor="#046b70">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="1" bgcolor="#046067">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_r_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/tab_2_b.jpg" width="485" height="12" border="0" />
						</td>
					</tr>
					<tr><!-- fin-->
						<td colspan="8">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="485" height="20" border="0" />
						</td>
					</tr>

				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<!-- button holder -->
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="485" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="middle">
						<td width="227" align="center">
							<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center;" size="2" color="#645e59">Pour toute demande d’information :
							</font>
						</td>
						<td width="31"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" /></td>
						<td width="227" align="center">
							<?php if (!empty($parameters['link_catalog'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center;" size="2" color="#645e59">Consultez le catalogue complet :
							</font>';
							} ?>
						</td>
					</tr>
					<tr valign="middle">
						<td colspan="3" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" />
						</td>
					</tr>
					<tr valign="middle">
						<td width="227" align="center">
							<?php if (!empty($parameters['link_contact'])) {
								printf('<a href="mailto:%s">
								<img alt="" src="%s/asfoPlugin/images/asfoPromotion/button_1.jpg" width="227" height="25" border="0" />
							</a>',$parameters['link_contact'],CatalyzEmailing::getApplicationUrl());
							} ?>

						</td>
						<td width="31"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="15" border="0" /></td>
						<td width="227" align="center">
							<?php if (!empty($parameters['link_catalog'])) {
								printf('<a href="%s">
								<img alt="" src="%s/asfoPlugin/images/asfoPromotion/button_2.jpg" width="227" height="25" border="0" />
							</a>',CatalyzEmailing::makeAbsoluteLink($parameters['link_catalog']),CatalyzEmailing::getApplicationUrl());
							} ?>
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<!-- end button holder -->

		<tr style="line-height: 0;">
			<td colspan="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/middle_b.gif" width="600" height="43" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters['promo_content'])) : ?>
		<tr>
			<td width="79">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="79" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 28px; font-size: 24px;text-align:center;font-weight: bold; " size="2" color="#635f59">COMMENT BÉNÉFICIER DE<br /> CETTE PROMOTION ?
				</font>
			</td>
			<td width="105">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="5" border="0" />
			</td>
		</tr>
		<tr><td colspan="3"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="10" border="0" /></td></tr> <!-- SEP -->

		<!--debut -->

		<tr valign="top">
			<td width="79">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="79" height="5" border="0" />
			</td>
			<td>
		<table width="404" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php
		$cpt = 1;
		$tab = 0;
		$count = count($parameters['promo_content']);
		foreach ($parameters['promo_content'] as $sub_element): ?>
			<?php

			if ($tab == 0) {
				printf('<tr valign="top">
						<td width="43">
							<img alt="" src="%s/asfoPlugin/images/asfoPromotion/bottom_quote.gif" width="43" height="33" border="0" />
						</td>
						<td width="159">',CatalyzEmailing::getApplicationUrl()) ;
			}
			else{
				printf('
						<td width="43">
							<img alt="" src="%s/asfoPlugin/images/asfoPromotion/bottom_quote.gif" width="43" height="33" border="0" />
						</td>
						<td width="159">',CatalyzEmailing::getApplicationUrl()) ;


			}

			printf('<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#635f59">%s
							</font>
							</td>', nl2br($sub_element['content']));

			if($tab == 1){
				$tab = -1;
				echo '
					</tr>';

				if ($cpt<$count) {

					if (empty($parameters['style']) || $parameters['style'] == 1) {
						$header_style = 'bottom_sep_red';
					}else{
						$header_style = 'bottom_sep_green';
					}

					printf('<tr valign="top">
							<td colspan="4" >
								<img alt="" src="%s/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="10" border="0" /><br />
								<img alt="" src="%s/asfoPlugin/images/asfoPromotion/%s.gif" width="404" height="3" border="0" /><br />
								<img alt="" src="%s/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="10" border="0" />
							</td>
						</tr>',CatalyzEmailing::getApplicationUrl(),CatalyzEmailing::getApplicationUrl(), $header_style,CatalyzEmailing::getApplicationUrl()) ;
				}

			}


			 ?>
		<?php
		$tab++;
		$cpt++;
		endforeach;

		if ($count%2 !=0) {
			echo '<td colspan="2">&nbsp;</td></tr>';
		}
		 ?>


		</table>
		</td>
				<td width="105">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="5" border="0" />
				</td>
		</tr>
		<tr><td colspan="3"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="15" border="0" /></td></tr> <!-- SEP -->


		<!--tr>
			<td>
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="63" height="5" border="0" />
			</td>
			<td width="404">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/bottom_sep_red.gif" width="404" height="3" border="0" />
			</td>
			<td width="105">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="5" border="0" />

			</td>
		</tr-->
		<tr><td colspan="3"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="15" border="0" /></td></tr> <!-- SEP -->
		<?php endif ?>
		<!-- FIN ATOUT -->
		<tr><td colspan="3"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="5" border="0" /></td></tr> <!-- SEP -->
		<tr valign="top" align="center">
			<td colspan="3">
				<?php
				if (empty($parameters['style']) || $parameters['style'] == 1) {
					$button_style = 'button_3_red';
				}else{
					$button_style = 'button_3_green';
				}

				if (!empty($parameters['link_commande'])) {
					printf('<a href="%s"><img alt="" src="%s/asfoPlugin/images/asfoPromotion/%s.jpg" width="227" height="25" border="0" /></a>', CatalyzEmailing::makeAbsoluteLink($parameters['link_commande']),CatalyzEmailing::getApplicationUrl(), $button_style);
				} ?>
			</td>
		</tr>
		<tr><td colspan="3"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_white.gif" width="105" height="10" border="0" /></td></tr> <!-- SEP -->
	</table>

	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/footer_t.gif" width="600" height="12" border="0" /></td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="11" height="10" border="0" /></td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="8">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td bgcolor="#f1f2f4" width="186">
				<table width="186" bgcolor="#f1f2f4" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="10">&nbsp;</td>
						<td width="176">
							<?php
							if (!empty($parameters['expert_name']) || !empty($parameters['expert_email']) || !empty($parameters['expert_tel'])):
							?>
							<font face="Arial" style="line-height: 12px; font-size: 16px;text-align:center; " size="2" color="#635f59">Votre expert – référent :
							</font>
							<ul style="padding: 0 0 0 15px; color: #5c5046;">

								<?php
								foreach (array('expert_name','expert_email','expert_tel') as $field){
									if (!empty($parameters[$field])) {
										printf('<li>
										<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#5c5046">%s
										</font>
								</li>',htmlentities($parameters[$field], ENT_COMPAT, 'utf-8'));

									}
								}
								 ?>
							</ul>
						<?php endif ?>
						</td>
					</tr>
				</table>
			</td>
			<td bgcolor="#5c5046" width="298">
				<?php if(!empty($parameters['picture'])){
					printf('<img alt="" src="%s%s" border="0" />',CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['picture'], 298, 147));
				} ?>
			</td>
			<td bgcolor="#5c5046" width="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="7" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#5c5046" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0;">
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="58" height="10" border="0" />
			</td>
		</tr>
		<tr>
			<td width="58">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="58" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
				ASFO GRAND SUD - ZI LE PALAYS - PERISUD 2 - BP94415 - 13 rue André VILLET<br/>
31405 TOULOUSE Cedex 4 - <a style="color:#FFFFFF;" href="http://www.asfograndsud.com">www.asfograndsud.com</a> - <a style="color:#FFFFFF;" href="mailto:contact@asfograndsud.com">contact@asfograndsud.com</a> <br/>
Tel : 05 62 25 50 00 - Fax : 05 62 25 50 45
				</font>
			</td>
			<td width="56">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="56" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoPromotion/sep_dark.gif" width="58" height="15" border="0" />
			</td>
		</tr>
	</table>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="center">
				<font face="Arial" style="line-height: 12px; font-size: 10px;text-align:center; " size="2" color="#000000">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <a style="color:#000000;" href="mailto:gestion@asfograndsud-emailing.com">gestion@asfograndsud-emailing.com</a>.<br />Si vous souhaitez vous désinscrire, <a style="color:#000000;" href="#UNSUBSCRIBE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
	</table>
</body>
</html>
