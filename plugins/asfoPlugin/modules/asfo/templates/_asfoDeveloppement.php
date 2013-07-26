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
			<td colspan="4" >
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/header.jpg" width="600" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center">
				<font face="Arial" style="line-height: 12px; font-size: 10px;text-align:center; " size="2" color="#FFFFFF">Si vous avez des difficultés pour visualiser ce message et ses images. <a style="color:#FFFFFF;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="600" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="4" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/header_1.jpg" width="600" height="160" border="0" />
			</td>
		</tr>
		<tr valign="bottom">
			<td width="44" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/header_left.jpg" width="44" height="50" border="0" />
			</td>
			<td width="11"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="11" height="5" border="0" /></td>
			<td bgcolor="#998f86" width="454">
				<?php if (!empty($parameters['introduction'])) {
					printf('<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">%s</font>',nl2br($parameters['introduction']) );
				} ?>
			</td>
			<td width="91" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/header_right.jpg" width="91" height="50" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="4" style="line-height: 0;">
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
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="bottom" style="line-height: 4px;">
						<td colspan="3" width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_t.gif" width="149" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="3" width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_t.gif" width="149" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="3" width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_t.gif" width="149" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top" >
						<td bgcolor="#457e81" width="36" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_l.gif" width="36" height="44" border="0" />
						</td>
						<td bgcolor="#457e81" width="94" valign="middle">
							<?php if (!empty($parameters['bloc_1_title'])) {
								printf('<font face="Arial" style="line-height: 13px; font-size: 13px;text-align:center; " size="2" color="#FFFFFF">%s
							</font>',htmlentities($parameters['bloc_1_title'], ENT_COMPAT, 'UTF-8'));
							} ?>

						</td>
						<td bgcolor="#457e81" width="19" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_r.gif" width="19" height="44" border="0" />
						</td>
						<td width="22" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td width="36" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_l.gif" width="36" height="44" border="0" />
						</td>
						<td bgcolor="#625bc4" width="94" valign="middle">
							<?php if (!empty($parameters['bloc_2_title'])) {
								printf('<font face="Arial" style="line-height: 13px; font-size: 13px;text-align:center; " size="2" color="#FFFFFF">%s
							</font>',htmlentities($parameters['bloc_2_title'], ENT_COMPAT, 'UTF-8'));
							} ?>
						</td>
						<td width="19" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_r.gif" width="19" height="44" border="0" />
						</td>
						<td width="22" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td width="36" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_l.gif" width="36" height="44" border="0" />
						</td>
						<td bgcolor="#005058" width="94" valign="middle">
							<?php if (!empty($parameters['bloc_3_title'])) {
								printf('<font face="Arial" style="line-height: 13px; font-size: 13px;text-align:center; " size="2" color="#FFFFFF">%s
							</font>',htmlentities($parameters['bloc_3_title'], ENT_COMPAT, 'UTF-8'));
							} ?>
						</td>
						<td width="19" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_r.gif" width="19" height="44" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<tr> <!-- filet-->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0" >
					<tr valign="top">
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#457e81" valign="top" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" valign="top" width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005058" valign="top"  width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- contenu de la boite -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#457e81" valign="top" >
							<?php
							if (!empty($parameters['bloc_1_content'])) {
								echo '<ul style="margin: 0; padding: 0 0 0 15px; color: #FFFFFF;">';
								foreach($parameters['bloc_1_content'] as $topElement){
									printf('<li><font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
										<a href="%s" style="color: #FFFFFF;">%s</a>
									</font></li>',$topElement['link'], $topElement['caption']);
								}
								echo '</ul>';
							}
							?>
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" valign="top" width="137">
							<?php
							if (!empty($parameters['bloc_2_content'])) {
								echo '<ul style="margin: 0; padding: 0 0 0 15px; color: #FFFFFF;">';
								foreach($parameters['bloc_2_content'] as $topElement){
									printf('<li><font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
										<a href="%s" style="color: #FFFFFF;">%s</a>
									</font></li>',$topElement['link'], $topElement['caption']);
								}
								echo '</ul>';
							}
							?>
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005058" valign="top"  width="137">
							<?php
							if (!empty($parameters['bloc_3_content'])) {
								echo '<ul style="margin: 0; padding: 0 0 0 15px; color: #FFFFFF;">';
								foreach($parameters['bloc_3_content'] as $topElement){
									printf('<li><font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
										<a href="%s" style="color: #FFFFFF;">%s</a>
									</font></li>',$topElement['link'], $topElement['caption']);
								}
								echo '</ul>';
							}
							?>
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- filet -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#457e81" valign="top" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" valign="top" width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005058" valign="top"  width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- nom conferencier -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#457e81" valign="top" >
							<?php
							if (!empty($parameters['bloc_1_trainer'])) {
							echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
							if (!empty($parameters['bloc_1_trainer_email'])) {
								printf('<a href="mailto:%s" style="color: #FFFFFF;">%s</a>', htmlentities($parameters['bloc_1_trainer_email'], ENT_COMPAT, 'UTF-8'), htmlentities($parameters['bloc_1_trainer'], ENT_COMPAT, 'UTF-8'));
							}else{
								printf('%s', htmlentities($parameters['bloc_1_trainer'], ENT_COMPAT, 'UTF-8'));
							}
							echo '</font>';
							}
							?>
						</td>
						<td bgcolor="#457e81" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#325a5d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#625bc4" valign="top" width="137">
							<?php
							if (!empty($parameters['bloc_2_trainer'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
								if (!empty($parameters['bloc_2_trainer_email'])) {
									printf('<a href="mailto:%s" style="color: #FFFFFF;">%s</a>', htmlentities($parameters['bloc_2_trainer_email'], ENT_COMPAT, 'UTF-8'), htmlentities($parameters['bloc_2_trainer'], ENT_COMPAT, 'UTF-8'));
								}else{
									printf('%s', htmlentities($parameters['bloc_2_trainer'], ENT_COMPAT, 'UTF-8'));
								}
								echo '</font>';
							}
							?>
						</td>
						<td bgcolor="#625bc4" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#46418d" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005058" valign="top"  width="137">
								<?php
								if (!empty($parameters['bloc_3_trainer'])) {
									echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
									if (!empty($parameters['bloc_3_trainer_email'])) {
										printf('<a href="mailto:%s" style="color: #FFFFFF;">%s</a>', htmlentities($parameters['bloc_3_trainer_email'], ENT_COMPAT, 'UTF-8'), htmlentities($parameters['bloc_3_trainer'], ENT_COMPAT, 'UTF-8'));
									}else{
										printf('%s', htmlentities($parameters['bloc_3_trainer'], ENT_COMPAT, 'UTF-8'));
									}
									echo '</font>';
								}
								?>
						</td>
						<td bgcolor="#005058" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00393f" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_border.gif" width="1" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_1_b.gif" width="149" height="19" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="19" border="0" />
						</td>
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_2_b.gif" width="149" height="19" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="19" border="0" />
						</td>
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_3_b.gif" width="149" height="19" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<tr><!-- fin -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="10" height="20" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<!-- PARTIE 2 -->

		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top" style="line-height: 0;">
						<td colspan="3" width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_t.gif" width="149" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="3" width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_t.gif" width="149" height="4" border="0" />
						</td>
						<td colspan="4" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td bgcolor="#457e81" width="36" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_l.gif" width="36" height="44" border="0" />
						</td>
						<td bgcolor="#872434" width="94" valign="middle">
							<?php if (!empty($parameters['bloc_4_title'])) {
								printf('<font face="Arial" style="line-height: 13px; font-size: 13px;text-align:center; " size="2" color="#FFFFFF">%s
							</font>',htmlentities($parameters['bloc_4_title'], ENT_COMPAT, 'UTF-8'));
							} ?>
						</td>
						<td width="19" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_r.gif" width="19" height="44" border="0" />
						</td>
						<td width="22" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td width="36" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_l.gif" width="36" height="44" border="0" />
						</td>
						<td bgcolor="#005c56" width="94" valign="middle">
							<?php if (!empty($parameters['bloc_5_title'])) {
								printf('<font face="Arial" style="line-height: 13px; font-size: 13px;text-align:center; " size="2" color="#FFFFFF">%s
							</font>',htmlentities($parameters['bloc_5_title'], ENT_COMPAT, 'UTF-8'));
							} ?>
						</td>
						<td width="19" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_r.gif" width="19" height="44" border="0" />
						</td>
						<td width="22" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="3" style="line-height: 0;">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>

					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<tr> <!-- filet-->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#872434" valign="top" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" valign="top" width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- contenu de la boite -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#872434" valign="top" >
							<?php
							if (!empty($parameters['bloc_4_content'])) {
								echo '<ul style="margin: 0; padding: 0 0 0 15px; color: #FFFFFF;">';
								foreach($parameters['bloc_4_content'] as $topElement){
									printf('<li><font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
										<a href="%s" style="color: #FFFFFF;">%s</a>
									</font></li>',htmlentities($topElement['link'], ENT_COMPAT, 'UTF-8'), htmlentities($topElement['caption'], ENT_COMPAT, 'UTF-8'));
								}
								echo '</ul>';
							}
							?>
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" valign="top" width="137">
							<?php
							if (!empty($parameters['bloc_5_content'])) {
								echo '<ul style="margin: 0; padding: 0 0 0 15px; color: #FFFFFF;">';
								foreach($parameters['bloc_5_content'] as $topElement){
									printf('<li><font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
										<a href="%s" style="color: #FFFFFF;">%s</a>
									</font></li>',htmlentities($topElement['link'], ENT_COMPAT, 'UTF-8'), htmlentities($topElement['caption'], ENT_COMPAT, 'UTF-8'));
								}
								echo '</ul>';
							}?>
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>

						<td colspan="5" valign="top" align="center" width="137">
							<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#645e59">
								<?php if (!empty($parameters['link_catalog'])) {
									printf('Consultez le catalogue<br />complet<br />
								<a href="%s"><img alt="" src="%s/asfoPlugin/images/asfoDeveloppement/button_1.gif" width="149" height="25" border="0" /></a>', htmlentities($parameters['link_catalog'], ENT_COMPAT, 'UTF-8'),CatalyzEmailing::getApplicationUrl());
								} ?>
								<?php if (!empty($parameters['link_contact'])) {
									printf('Pour toute demande<br />d’information<br />
								<a href="mailto:%s"><img alt="" src="%s/asfoPlugin/images/asfoDeveloppement/button_2.gif" width="149" height="25" border="0" /></a>
								<br />', htmlentities($parameters['link_contact'], ENT_COMPAT, 'UTF-8'),CatalyzEmailing::getApplicationUrl());
								} ?>


							</font>
						</td>

					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- filet -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#872434" valign="top" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" valign="top" width="137">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_sep.gif" width="137" height="13" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td colspan="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr> <!-- nom conferencier -->
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td width="137" bgcolor="#872434" valign="top" >
							<?php
							if (!empty($parameters['bloc_4_trainer'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
								if (!empty($parameters['bloc_4_trainer_email'])) {
									printf('<a href="mailto:%s" style="color: #FFFFFF;">%s</a>', htmlentities($parameters['bloc_4_trainer_email'], ENT_COMPAT, 'UTF-8'), htmlentities($parameters['bloc_4_trainer'], ENT_COMPAT, 'UTF-8'));
								}else{
									printf('%s', htmlentities($parameters['bloc_4_trainer'], ENT_COMPAT, 'UTF-8'));
								}
								echo '</font>';
							}
							?>
						</td>
						<td bgcolor="#872434" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#611a25" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_border.gif" width="1" height="4" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#005c56" valign="top" width="137">
							<?php
							if (!empty($parameters['bloc_5_trainer'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">';
								if (!empty($parameters['bloc_5_trainer_email'])) {
									printf('<a href="mailto:%s" style="color: #FFFFFF;">%s</a>', htmlentities($parameters['bloc_5_trainer_email'], ENT_COMPAT, 'UTF-8'), htmlentities($parameters['bloc_5_trainer'], ENT_COMPAT, 'UTF-8'));
								}else{
									printf('%s', htmlentities($parameters['bloc_5_trainer'], ENT_COMPAT, 'UTF-8'));
								}
								echo '</font>';
							}
							?>
						</td>
						<td bgcolor="#005c56" width="5">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_c.gif" width="5" height="4" border="0" />
						</td>
						<td bgcolor="#00423e" width="1">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_border.gif" width="1" height="4" border="0" />
						</td>
						<td colspan="6">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="4" border="0" />
						</td>

					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="491" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_4_b.gif" width="149" height="19" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="19" border="0" />
						</td>
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/box_5_b.gif" width="149" height="19" border="0" />
						</td>
						<td width="22">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="22" height="19" border="0" />
						</td>
						<td width="149">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="149" height="19" border="0" />
						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<!-- ENDPARTIE 2 -->


		<tr style="line-height: 0;"><!-- fin -->
			<td colspan="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/middle_b.gif" width="600" height="43" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="2">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="40" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 28px; font-size: 24px;text-align:center;font-weight: bold; " size="2" color="#635f59">NOS ATOUTS
				</font>
			</td>
			<td width="105">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="105" height="5" border="0" />
			</td>
		</tr>
		<?php
		if (!empty($parameters['atout'])):
			$cnt =count($parameters['atout']);
			$cpt = 1;
			if ($cnt>0):
				foreach ($parameters['atout'] as $bottomElement):
			?>
			<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="105" height="10" border="0" /></td></tr>
			<tr valign="top">
				<td width="63">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="63" height="5" border="0" />
				</td>
				<td width="43">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/bottom_quote.gif" width="43" height="33" border="0" />
				</td>
				<td>
					<?php printf('<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#635f59">%s</font>', strip_tags($bottomElement['content'], '<strong><a>') ); ?>
				</td>
				<td width="105">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="105" height="5" border="0" />
				</td>
			</tr>
			<?php if ($cpt != $cnt): ?>
			<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="105" height="15" border="0" /></td></tr>
			<tr>
				<td colspan="2">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="63" height="5" border="0" />
				</td>
				<td width="404">
					<?php if (empty($parameters['style']) ||$parameters['style'] == 1) {
						$sep_style = 'bottom_sep_red';
					}else{
						$sep_style = 'bottom_sep_green';
					}
					printf('<img alt="" src="%s/asfoPlugin/images/asfoDeveloppement/%s.gif" width="404" height="3" border="0" />',CatalyzEmailing::getApplicationUrl() , $sep_style);
					?>

				</td>
				<td width="105">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_white.gif" width="105" height="5" border="0" />
				</td>
			</tr>
			<?php
							endif;
						$cpt++;
					endforeach;
				endif;
			endif;
			 ?>
	</table>

	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr  style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/footer_t.gif" width="600" height="12" border="0" /></td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="11" height="10" border="0" /></td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="5">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="8">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="236">
				<?php if(!empty($parameters['picture_1'])){
					printf('<img alt="" src="%s%s" border="0" />',CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['picture_1'], 236, 145));
				} ?>
			</td>
			<td bgcolor="#5c5046" width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="12" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="236">
				<?php if(!empty($parameters['picture_2'])){
					printf('<img alt="" src="%s%s" border="0" />',CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['picture_2'], 236, 145));
				} ?>
			</td>
			<td bgcolor="#5c5046" width="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="7" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="5">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#5c5046" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="58" height="10" border="0" />
			</td>
		</tr>
		<tr>
			<td width="58">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="58" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
				ASFO GRAND SUD - ZI LE PALAYS - PERISUD 2 - BP94415 - 13 rue André VILLET<br/>
31405 TOULOUSE Cedex 4 - <a style="color:#FFFFFF;" href="http://www.asfograndsud.com">www.asfograndsud.com</a> - <a style="color:#FFFFFF;" href="mailto:contact@asfograndsud.com">contact@asfograndsud.com</a> <br/>
Tel : 05 62 25 50 00 - Fax : 05 62 25 50 45
				</font>
			</td>
			<td width="56">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="56" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoDeveloppement/sep_dark.gif" width="58" height="15" border="0" />
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
