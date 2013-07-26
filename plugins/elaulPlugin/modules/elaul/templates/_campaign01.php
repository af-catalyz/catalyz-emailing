<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#f0f0f0" link="#102b44" vlink="#102b44" alink="#102b44">
	<?php
	$parameters = unEscape($parameters);
	use_helper('elaul');
	$renderer = new CatalyzEmailRenderer('Arial','#102b44','line-height: 12px; font-size: 11px;');
	 ?>

	<?php if (!empty($parameters['legals_top'])): ?>
	<table width="680" bgcolor="#f0f0f0" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<?php $renderer->renderWysiwyg($parameters['legals_top'],'#102b44'); ?>
			</td>
		</tr>
	</table>
<?php endif ?>

<?php $renderer->setStyle('line-height: 14px; font-size: 10px;'); ?>

	<table width="680" bgcolor="#B1D5F5" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="font-size: 0; line-height: 0;" width="37"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_1.jpg" width="37" height="138" alt="" border="0" /></td>

			<td style="font-size: 0; line-height: 0;" width="171">
				<a href="http://www.elaul.fr" target="_blank">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_2.jpg" width="171" height="138" alt="" border="0" />
				</a>
			</td>
			<td style="font-size: 0; line-height: 0;" width="64"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_3.jpg" width="64" height="138" alt="" border="0" /></td>
			<td valign="top" width="408" bgcolor="#102C44">
				<table bgcolor="#102C44" cellpadding="0" cellspacing="0" width="408" border="0">
					<tr valign="top" style="font-size: 0; line-height: 0;">
						<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_4_s.jpg" width="408" height="96" alt="" border="0" /></td>
					</tr>
					<tr>
						<td valign="middle" align="center">
							<?php if (!empty($parameters['baseline'])) {
								printf('<font face="Arial" style="line-height: 20px; font-size: 16px; " size="2" color="#FFFFFF">%s</font>', nl2br(htmlentities($parameters['baseline'], ENT_COMPAT, 'utf-8')));
							} ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>

			<td style="font-size: 0; line-height: 0;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_5.jpg" width="37" height="30" alt="" border="0" /></td>
			<td style="font-size: 0; line-height: 0;">
				<a href="http://www.elaul.fr" target="_blank">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_6.jpg" width="171" height="30" alt="" border="0" />
				</a>
			</td>
			<td style="font-size: 0; line-height: 0;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_7.jpg" width="64" height="30" alt="" border="0" /></td>
			<td bgcolor="#ebebeb" align="left">
				<table width="408" bgcolor="#ebebeb" cellspacing="0" cellpadding="0" border="0">

					<tr align="center">
						<td width="22" valign="bottom"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_courbe.jpg" width="22" height="30" alt="" border="0" /></td>
						<td width="128">
							<?php if (!empty($parameters['lien_1_title']) && !empty($parameters['lien_1_link'])) {
								printf('<font face="Arial" style="line-height: 10px; font-size: 10px; " size="2" color="#102b44"><a style="color:#102b44;" href="%s" target="_blank">%s</a></font>', czWidgetFormLink::displayLink($parameters['lien_1_link'], CatalyzEmailing::getApplicationUrl()), htmlentities($parameters['lien_1_title'], ENT_COMPAT, 'utf-8'));
							} ?>
						</td>

						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="128">
							<?php if (!empty($parameters['lien_2_title']) && !empty($parameters['lien_2_link'])) {
								printf('<font face="Arial" style="line-height: 10px; font-size: 10px; " size="2" color="#102b44"><a style="color:#102b44;" href="%s" target="_blank">%s</a></font>', czWidgetFormLink::displayLink($parameters['lien_2_link'], CatalyzEmailing::getApplicationUrl()), htmlentities($parameters['lien_2_title'], ENT_COMPAT, 'utf-8'));
							} ?>
						</td>
						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>

						<td width="128">
							<?php if (!empty($parameters['lien_3_title']) && !empty($parameters['lien_3_link'])) {
								printf('<font face="Arial" style="line-height: 10px; font-size: 10px; " size="2" color="#102b44"><a style="color:#102b44;" href="%s" target="_blank">%s</a></font>', czWidgetFormLink::displayLink($parameters['lien_3_link'], CatalyzEmailing::getApplicationUrl()), htmlentities($parameters['lien_3_title'], ENT_COMPAT, 'utf-8'));
							} ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_8.jpg" width="37" height="29" alt="" border="0" /></td>
			<td>
				<a href="http://www.elaul.fr" target="_blank">
					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_9.jpg" width="171" height="29" alt="" border="0" />
				</a>
			</td>
			<td colspan="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/header_10.jpg" width="472" height="29" alt="" border="0" /></td>
		</tr>
	</table>

	<?php if (!empty($parameters['edito'])): ?>
	<table width="680" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="font-size: 0; line-height: 0;" width="29"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="580">
				<?php
					printf('<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#FFFFFF">%s</font>',  nl2br(htmlentities($parameters['edito'], ENT_COMPAT, 'utf-8')));
				?>
			</td>
			<td style="font-size: 0; line-height: 0;" width="71"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<table width="680" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="30" alt="" border="0" /></td>
			<td colspan="3" bgcolor="#ebebeb"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_grey.gif" width="1" height="30" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="font-size: 0; line-height: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="328">
				<table width="328" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<?php if (!empty($parameters['products_subform'])): ?>

					<?php
					$cpt = 0;
					foreach ($parameters['products_subform'] as $product){
						if ($cpt > 0) {
							printf('<tr style="font-size: 0; line-height: 0;"><td colspan="3"><img src="%s/elaulPlugin/images/campaign01/left_sep.png" width="328" height="63" alt="" border="0" /></td></tr><tr valign="top">', CatalyzEmailing::getApplicationUrl());
						}else{
							echo '<tr valign="top">';
						}

						echo '<td width="122">';
						if (!empty($product['picture'])) {
							$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_with_border_path($product['picture'], 122, 122);
							$thumbnailSize = getimagesize($thumbnailPath);

							if (!empty($product['more'])) {
								printf('<a href="%s"><img src="%s%s" width="%s" height="%s" alt=""/></a>',czWidgetFormLink::displayLink($product['more']), CatalyzEmailing::getApplicationUrl() , thumbnail_with_border_path($product['picture'], 122, 122, !empty($product['is_new']) && $product['is_new']), $thumbnailSize[0], $thumbnailSize[1]);
							}else{
								printf('<img src="%s%s" width="%s" height="%s" alt=""/>',CatalyzEmailing::getApplicationUrl() , thumbnail_with_border_path($product['picture'], 122, 122, !empty($product['is_new']) && $product['is_new']), $thumbnailSize[0], $thumbnailSize[1]);
							}

							echo '<br /><br />';


						}
						printf('</td><td style="font-size: 0; line-height: 0;" width="14"><img src="%s/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
						echo '<td width="192">';

						if (!empty($product['title'])) {
							printf('<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">%s</font>', htmlentities($product['title'], ENT_COMPAT, 'utf-8'));
						}
						if (!empty($product['content'])) {
							echo '<font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#102b44"><br /><br />';
							if (!empty($product['more'])) {
								printf('<a href="%s">%s</a>',czWidgetFormLink::displayLink($product['more']), nl2br($product['content']));
							}else{
								printf('%s', nl2br($product['content']));
							}
							echo '</font>';

						}

						if (!empty($product['link2']) || !empty($product['link'])) {
							echo '<br />';
							if (!empty($product['link'])) {
								printf('<img src="%S/elaulPlugin/images/campaign01/pdf.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 18px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="%s" target="_blank">T&#233;l&#233;charger la documentation</a>
							</font>
							<br />', CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($product['link'], CatalyzEmailing::getApplicationUrl()));
							}
							if (!empty($product['link2'])) {
								printf('<img src="%S/elaulPlugin/images/campaign01/calculate.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 18px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="%s" target="_blank">Demandez un devis</a>
							</font>
							<br />', CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($product['link2'], CatalyzEmailing::getApplicationUrl()));
							}
						}

						echo '</td></tr>';
						$cpt++;
					}
					 ?>
					<?php endif ?>

					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="30" alt="" border="0" />
						</td>
					</tr>
					<?php if (!empty($parameters['catalog_title']) && !empty($parameters['catalog_link'])): ?>
					<tr>
						<td colspan="3">
							<table width="328" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td style="font-size: 0; line-height: 0;" width="45" bgcolor="#FFFFFF"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
									<td style="font-size: 0; line-height: 0;" width="22" valign="top"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/orange_left_courbe.gif" width="22" height="22" alt="" border="0" /></td>
									<td width="188">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="9" alt="" border="0" />
										<br />
										<font face="Arial" style="line-height: 22px; font-size: 18px;" size="2" color="#FFFFFF">
											<?php printf('<a style="color:#FFFFFF;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters['catalog_link'], CatalyzEmailing::getApplicationUrl()), nl2br($parameters['catalog_title'])) ?>
										</font>
										<br />
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="9" alt="" border="0" />
									</td>
									<td style="font-size: 0; line-height: 0;" width="22" valign="bottom"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/orange_right_courbe.gif" width="22" height="22" alt="" border="0" /></td>
									<td style="font-size: 0; line-height: 0;" width="51" bgcolor="#FFFFFF"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
								</tr>
							</table>
						</td>
					</tr>
					<?php endif ?>
				</table>

			</td>
			<td style="font-size: 0; line-height: 0;" width="28"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="font-size: 0; line-height: 0;" width="21" bgcolor="#ebebeb"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="252" bgcolor="#ebebeb">

				<?php
				if (!empty($parameters['atouts'])) {
					$renderer->setColor('#102b44');
					$renderer->setStyle('line-height: 16px; font-size: 12px;');

					if (!empty($parameters['atouts_title'])) {
						printf('<font face="Arial" style="line-height: 24px; font-size: 20px; font-weight: bold;" size="2" color="#ff8700">%s</font>' , html_entity_decode($parameters['atouts_title'] , ENT_COMPAT, 'utf-8'));
					}
					renderAtouts(utf8_decode($parameters['atouts']));
				}

				if (!empty($parameters['question_box'])):
			 ?>
				<table width="252" bgcolor="#f5f5f5" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">
						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="250"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_grey_light.gif" width="1" height="24" alt="" border="0" /></td>
						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="font-size: 0; line-height: 0;" width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>

						<td width="250" align="center">
							<?php
								renderQuestionBox($parameters['question_box']);
							 ?>
						</td>
						<td style="font-size: 0; line-height: 0;" width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">
						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="250"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_grey_light.gif" width="1" height="24" alt="" border="0" /></td>
						<td width="1" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3" bgcolor="#dcdcdc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
				</table>
				<br />
				<br />
				<?php endif ?>

				<?php
				if (!empty($parameters['references_content'])) {
					$renderer->setColor('#102b44');
					$renderer->setStyle('line-height: 16px; font-size: 12px;');

					if (!empty($parameters['references_title'])) {
						printf('<font face="Arial" style="line-height: 24px; font-size: 20px; font-weight: bold;" size="2" color="#ff8700">%s</font>' , html_entity_decode($parameters['references_title'] , ENT_COMPAT, 'utf-8'));
					}
					$renderer->renderWysiwyg($parameters['references_content']);
				}

				if (!empty($parameters['references_subform'])):



					while(!empty($parameters['references_subform'])){
					$tab_part = array_slice($parameters['references_subform'], 0, 3);

					$cell_width = floor(201/count($tab_part));

						echo '<table width="251" bgcolor="#ebebeb" align="center" cellspacing="0" cellpadding="0" border="0"><tr valign="top">';

						$row = 0;
						foreach ($tab_part as $reference){
							array_shift($parameters['references_subform']);



							printf('<td width="%s">', $cell_width);
							if ($reference['picture'] && is_file(sfConfig::get('sf_web_dir').$reference['picture'])) {
								printf('%s<br />', thumbnail_tag($reference['picture'], 67, 67, array('absolute' => true)));
							}
							if (!empty($reference['title'])) {
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px; font-weight: bold;" size="2" color="#102b44"><br />%s</font>', htmlentities($reference['title'], ENT_COMPAT, 'utf-8'));
							}
							if (!empty($reference['content'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#102b44"><br /><br />%s</font>', nl2br($reference['content']));
							}
							echo '</td>';

							if ($row < 2) {
								printf('<td style="font-size: 0; line-height: 0;" width="25"><img src="%s/elaulPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>',CatalyzEmailing::getApplicationUrl());
							}
							if ($row == 2) {
								printf('</tr><tr valign="top"><td colspan="5"><img src="%s/elaulPlugin/images/campaign01/sep_grey.gif" width="1" height="10" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
								$row = -1;
							}

							$row++;
						}

						echo '</tr></table>';
					}
				 ?>
				<?php endif ?>
			</td>
			<td style="font-size: 0; line-height: 0;" width="21" bgcolor="#ebebeb"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>

	</table>

	<table width="680" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters['bottom_introduction'])): ?>
		<tr>
			<td colspan="3" style="font-size: 0; line-height: 0;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="620">
				<?php
					printf('<font face="Arial" style="line-height: 20px; font-size: 16px;font-weight: bold;" size="2" color="#102b44">%s</font>', nl2br($parameters['bottom_introduction']));
				 ?>
			</td>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3" style="font-size: 0; line-height: 0;"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
		<?php if (!empty($parameters['bottom_content'])): ?>

		<tr>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="620">

					<?php
					$row = 0;



					while(!empty($parameters['bottom_content'])){
						$tab_part = array_slice($parameters['bottom_content'], 0, 4);

						$cell_width = floor(488/count($tab_part));

						echo '<table width="620" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0"><tr valign="top">';

						foreach ($tab_part as $product){
							array_shift($parameters['bottom_content']);

							printf('<td width="%s">', $cell_width);
							if (!empty($product['picture']) && is_file(sfConfig::get('sf_web_dir').$product['picture'])) {

								$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_with_border_path($product['picture'], 122, 122);
								$thumbnailSize = getimagesize($thumbnailPath);

								if (!empty($product['link'])) {
									printf('<a href="%s"><img src="%s%s" width="%s" height="%s" alt=""/></a>', czWidgetFormLink::displayLink($product['link']),CatalyzEmailing::getApplicationUrl() , thumbnail_with_border_path($product['picture'], 122, 122, !empty($product['is_new']) && $product['is_new']), $thumbnailSize[0], $thumbnailSize[1]);
								}else{
									printf('<img src="%s%s" width="%s" height="%s" alt=""/>',CatalyzEmailing::getApplicationUrl() , thumbnail_with_border_path($product['picture'], 122, 122, !empty($product['is_new']) && $product['is_new']), $thumbnailSize[0], $thumbnailSize[1]);
								}

								echo '<br /><br />';
							}
							if (!empty($product['title'])) {
								printf('<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">%s</font>', htmlentities($product['title'], ENT_COMPAT, 'utf-8'));
							}
							if (!empty($product['content'])) {
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />%s</font>', nl2br($product['content']));
							}
							if (!empty($product['link'])) {
								printf('<br /><img src="%s/elaulPlugin/images/campaign01/calendar.png" width="18" height="18" alt="" border="0" /><font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">&nbsp;<a style="color:#102b44;" href="%s" target="_blank">Consultez la fiche</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($product['link'], CatalyzEmailing::getApplicationUrl()));
							}

							echo '</td>';

							if ($row < 3) {
								printf('<td style="font-size: 0; line-height: 0;" width="44"><img src="%s/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
							}
							if ($row == 3) {
								printf('</tr><tr valign="top"><td colspan="7"><img src="%s/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="10" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
								$row = -1;
							}
							$row++;
						}
						echo '</tr></table>';
					}
					?>



			</td>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>

		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_white.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
	</table>


	<table width="680" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="font-size: 0; line-height: 0;" width="110"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="483" align="center">
				<?php
				if (!empty($parameters['footer'])) {
					renderWysiwyg($parameters['footer']);
				}
			 ?>
			</td>
			<td style="font-size: 0; line-height: 0;" valign="top" width="87"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/footer_courbe.png" width="87" height="94" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
	</table>

	<?php if (!empty($parameters['legals_bottom'])) :
		$renderer->setStyle("line-height: 14px; font-size: 11px;");
		$renderer->setColor('#102b44');
		$renderer->setFace('Arial');
		?>

	<table width="680" bgcolor="#f0f0f0" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="font-size: 0; line-height: 0;" valign="top" width="70"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_bg.gif" width="1" height="1" alt="" border="0" /></td>
			<td align="center">
				<?php echo $renderer->renderWysiwyg($parameters['legals_bottom'], '#102b44') ?>
			</td>
			<td style="font-size: 0; line-height: 0;" valign="top" width="70"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/elaulPlugin/images/campaign01/sep_bg.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

</body>
</html>