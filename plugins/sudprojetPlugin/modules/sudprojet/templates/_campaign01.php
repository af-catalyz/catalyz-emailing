<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="FFFFFF" vlink="#787878" link="#787878" alink="#787878">
	<?php
		$parameters = unEscape($parameters);
		$renderer = new CatalyzEmailRenderer('Arial','#669933','line-height: 16px; font-size: 12px;');
	?>
<body alink="#0099cc" vlink="#0099cc" link="#0099cc">
	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 8px;" size="2" color="#666666">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#666666;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/header.png" width="567" height="78" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="359"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/header_1.png" width="359" height="19" alt="" border="0" /></td>
			<td width="202" align="center" valign="middle">
					<?php

					if (!empty($parameters['number'])) {
						printf('<font face="Arial" style="line-height: 10px; font-size: 10px;" size="2" color="#006699">%s</font>', htmlentities($parameters['number'], ENT_COMPAT, 'utf-8'));
					}


					 ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/header_2.png" width="6" height="19" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/header_3.png" width="567" height="13" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#ebebeb"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/border_o.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#cccccc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="13" height="1" alt="" border="0" /></td>


			<?php

			if (
			!empty($parameters['other_articles']) ||
			!empty($parameters['partners'])
			) :

			 ?>


			 	<td width="352">
				<?php if (!empty($parameters['edito'])): ?>
				<table width="352" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top">
						<td>
							<?php $renderer->renderWysiwyg( utf8_decode($parameters['edito']),'#669933'); ?>
						</td>
					</tr>
				</table>
				<?php endif ?>


				<?php if (!empty($parameters['main_content'])) : ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="15" alt="" border="0" />

				<table width="352" cellpadding="0"  cellspacing="0" border="0">

					<?php

					$total = count($parameters['main_content']);

					foreach ($parameters['main_content'] as $main){
						$total--;
						if (
							!empty($main['title'])||
							!empty($main['introduction'])||
							!empty($main['illustration'])
						) {
							echo '<tr valign="top">';

							if (!empty($main['illustration']) &&  is_file(sfConfig::get('sf_web_dir').$main['illustration'])) {
								echo '<td style="line-height:0; font-size: 0;" width="138">';
								if (!empty($main['link'])) {
									printf('<a href="%3$s" target="_blank"><img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" /></a>', CatalyzEmailing::getApplicationUrl() , thumbnail_path($main['illustration'], 122, 137),czWidgetFormLink::displayLink($main['link']));
								}else{
									printf('<img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl() , thumbnail_path($main['illustration'], 122, 137));
								}
								echo '</td><td width="214">';
							}else{
								echo '<td colspan="2" width="352">';
							}

							if (!empty($main['title'])) {
								printf('<font face="Arial" style="line-height: 24px; font-size: 18px;" size="2" color="#006699">%s</font>', htmlentities($main['title'], ENT_COMPAT, 'utf-8'));
							}
							if (!empty($main['introduction'])) {
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333"><br/>%s</font>', nl2br(htmlentities($main['introduction'], ENT_COMPAT, 'utf-8')));
							}
							if (!empty($main['link'])) {
								printf('<font face="Arial" style="line-height: 12px; font-size: 11px;font-weight: bold;" size="2" color="#003366"><br/><br/><a style="color:#669933;" href="%s" target="_blank">%s</a></font>',czWidgetFormLink::displayLink($other['link']),  !empty($other['link_caption'])?$other['link_caption']:'LIEN');
							}

							echo '</td></tr>';
						}

						if ($total >= 1) {
							printf('<tr valign="top" style="line-height:0; font-size: 0;"><td colspan="2"><img src="%1$s/sudprojetPlugin/images/campaign01/left_sep_s.png" width="352" height="28" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl() );
						}
					}

					?>
				</table>


				<?php endif ?>

				 <?php if (
	!empty($parameters['grey_title']) ||
	!empty($parameters['grey_content']) ||
	!empty($parameters['grey_link']) ||
	!empty($parameters['grey_picture'])
	) : ?>

				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="15" alt="" border="0" />
				<table width="352" bgcolor="#E4E4E4" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_t_s.png" width="352" height="12" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
						<td width="318">
							<font face="Arial" style="line-height: 15px; font-size: 18px;" size="2" color="#003366">
							<?php
	if (!empty($parameters['grey_title'])) {
		printf('%s', htmlentities($parameters['grey_title'], ENT_COMPAT, 'utf-8'));
	}else{
		echo '&nbsp;';
	}
	?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" colspan="3" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="18" height="1" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>

					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_m_s.png" width="352" height="17" alt="" border="0" /></td>
					</tr>

					<?php

	if (!empty($parameters['grey_content'])) {
		printf('<tr valign="top">
		<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
		<td width="318">', CatalyzEmailing::getApplicationUrl() );
		printf('<font face="Arial" style="line-height: 15px; font-size: 11px;font-style: italic;" size="2" color="#006699">%s</font>', nl2br(htmlentities($parameters['grey_content'], ENT_COMPAT, 'utf-8')));
		printf('</td>
		<td style="line-height:0; font-size: 0;" width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
	}

	if (!empty($parameters['grey_link'])) {
		printf('<tr valign="top">
		<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
		<td width="318" align="right">', CatalyzEmailing::getApplicationUrl() );
		printf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#003366">
				<a style="color:#003366;" href="%s" target="_blank">EN SAVOIR +</a><br/>
				<br/>
			</font>',czWidgetFormLink::displayLink($parameters['grey_link']) );
		printf('</td>
		<td style="line-height:0; font-size: 0;" width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
		<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
	}

	if (!empty($parameters['grey_picture']) &&  is_file(sfConfig::get('sf_web_dir').$parameters['grey_picture'])) {
		printf('<tr style="line-height:0; font-size: 0;">
		<td bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
		<td width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
		<td width="318" align="center">', CatalyzEmailing::getApplicationUrl() );

		if (!empty($parameters['grey_link'])) {
			printf('<a href="%3$s" target="_blank"><img src="%1$s%2$s" alt="" border="0" /></a>', CatalyzEmailing::getApplicationUrl() , thumbnail_path($parameters['grey_picture'], 228, 228),czWidgetFormLink::displayLink($parameters['grey_link']));
		}else{
			printf('<img src="%1$s%2$s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl() , thumbnail_path($parameters['grey_picture'], 228, 228));
		}

		printf('</td><td width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
		<td width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
		<td width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
		<td bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
	}

	?>

					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_b_s.png" width="352" height="10" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>


			</td>
			<td style="line-height:0; font-size: 0;" width="22"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="22" height="1" alt="" border="0" /></td>
			<td width="168">

				<?php if (!empty($parameters['other_articles'])):?>
				<table bgcolor="#f2f2f2" width="168" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top" style="line-height:0; font-size: 0;">
						<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/right_t.png" width="168" height="15" alt="" border="0" /></td>
					</tr>

					<?php
							$total = count($parameters['other_articles']);
	foreach ($parameters['other_articles'] as $other){

		echo '<tr><td><table bgcolor="#f2f2f2" width="168" cellpadding="0"  cellspacing="0" border="0">';

		if (!empty($other['illustration']) &&  is_file(sfConfig::get('sf_web_dir').$other['illustration'])) {
			printf('<tr style="line-height:0; font-size: 0;" valign="top"><td width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="5" height="1" alt="" border="0" /></td><td colspan="2">', CatalyzEmailing::getApplicationUrl() );

			if (!empty($other['link'])) {
				printf('<a href="%3$s" target="_blank"><img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" /></a>', CatalyzEmailing::getApplicationUrl() , thumbnail_path($other['illustration'], 158, 158),czWidgetFormLink::displayLink($other['link']));
			}else{
				printf('<img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl() , thumbnail_path($other['illustration'], 158, 158));
			}

			printf('</td><td width="3"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="3" height="1" alt="" border="0" /></td></tr><tr style="line-height:0; font-size: 0;" valign="top"><td colspan="4"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="1" height="10" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl() );
		}

		if (!empty($other['title'])) {
			printf('<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="5" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="13"><img src="%1$s/sudprojetPlugin/images/campaign01/bullet.gif" width="13" height="15" alt="" border="0" /></td>
					<td width="147">
						<font face="Arial" style="line-height: 17px; font-size: 13px;font-weight: bold;" size="2" color="#669933">%2$s</font>
					</td>
					<td style="line-height:0; font-size: 0;" width="3"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="3" height="1" alt="" border="0" /></td>
				</tr>', CatalyzEmailing::getApplicationUrl(), htmlentities($other['title'], ENT_COMPAT, 'utf-8'));
		}

		if (!empty($other['introduction']) || !empty($other['link'])) {
			printf('<tr valign="top"><td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="5" height="1" alt="" border="0" /></td><td colspan="2" align="justify">', CatalyzEmailing::getApplicationUrl());

			if (!empty($other['introduction']) ) {
				printf('<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#003366">%s</font>', nl2br(htmlentities($other['introduction'], ENT_COMPAT, 'utf-8')));
			}

			if ( !empty($other['link'])) {
				printf('<font face="Arial" style="line-height: 12px; font-size: 11px;font-weight: bold;" size="2" color="#003366"><br/><br/>
						<a style="color:#669933;" href="%s" target="_blank">%s</a>
						</font>',czWidgetFormLink::displayLink($other['link']),  !empty($other['link_caption'])?$other['link_caption']:'LIEN');
			}

			printf('</td><td style="line-height:0; font-size: 0;" width="3"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_r_t.gif" width="3" height="1" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl());

		}



		echo '</table></td></tr>';
		$total--;

		if ($total >= 1) {
			printf('<tr><td><img src="%1$s/sudprojetPlugin/images/campaign01/right_sep.png" width="168" height="25" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl() );
		}
	}
	?>

					<tr valign="top" style="line-height:0; font-size: 0;">
						<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/right_b.png" width="168" height="15" alt="" border="0" /></td>
					</tr>
				</table>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="30" alt="" border="0" />
				<?php endif ?>

				<?php if (!empty($parameters['partners'])): ?>
				<table width="168" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/member_t.png" width="168" height="29" alt="" border="0" /></td>
					</tr>

					<?php

							$total = count($parameters['partners']);

	printf('<tr valign="top" style="line-height:0; font-size: 0;"><td width="2" bgcolor="#0099cc"><img src="%1$s/sudprojetPlugin/images/campaign01/member_border.gif" width="2" height="1" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
	$td = 0;
	foreach ($parameters['partners'] as $partners){
		if (!empty($partners['illustration']) &&  is_file(sfConfig::get('sf_web_dir').$partners['illustration'])) {
			echo '<td width="82" align="center" valign="middle">';

			if (!empty($partners['link'])) {
				printf('<a href="%s" target="_blank"><img src="%s%s" alt="" border="0" /></a>',czWidgetFormLink::displayLink($partners['link']), CatalyzEmailing::getApplicationUrl(), thumbnail_path($partners['illustration'], 72, 72));
			}else{
				printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($partners['illustration'], 72, 72));
			}

			echo '</td>';
		}

		$total--;
		$td++;

		if ($td == 2) {
			$td = 0;
			if ($total > 0) {
				printf('<td width="2" bgcolor="#0099cc"><img src="%1$s/sudprojetPlugin/images/campaign01/member_border.gif" width="2" height="1" alt="" border="0" /></td></tr><tr valign="top" style="line-height:0; font-size: 0;"><td width="2" bgcolor="#0099cc"><img src="%1$s/sudprojetPlugin/images/campaign01/member_border.gif" width="2" height="1" alt="" border="0" /></td>', CatalyzEmailing::getApplicationUrl());
			}

		}

	}

	if (count($parameters['partners'])%2	!= 0) {
		echo '<td width="82">&nbsp;</td>';
	}

	printf('<td width="2" bgcolor="#0099cc"><img src="%1$s/sudprojetPlugin/images/campaign01/member_border.gif" width="2" height="1" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl());
	?>
					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/member_b.png" width="168" height="16" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>



			</td>

			 <?php else: ?>

		<td width="542">
				<?php if (!empty($parameters['edito'])): ?>
				<table width="542" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top">
						<td>
							<?php $renderer->renderWysiwyg( utf8_decode($parameters['edito']),'#669933'); ?>
						</td>
					</tr>
				</table>
				<?php endif ?>


				<?php if (!empty($parameters['main_content'])) : ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="15" alt="" border="0" />

				<table width="542" cellpadding="0"  cellspacing="0" border="0">

					<?php

					$total = count($parameters['main_content']);

					foreach ($parameters['main_content'] as $main){
						$total--;
						if (
							!empty($main['title'])||
							!empty($main['introduction'])||
							!empty($main['illustration'])
						) {
							echo '<tr valign="top">';

							if (!empty($main['illustration']) &&  is_file(sfConfig::get('sf_web_dir').$main['illustration'])) {
								echo '<td style="line-height:0; font-size: 0;" width="138">';
								if (!empty($main['link'])) {
									printf('<a href="%3$s" target="_blank"><img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" /></a>', CatalyzEmailing::getApplicationUrl() , thumbnail_path($main['illustration'], 122, 137),czWidgetFormLink::displayLink($main['link']));
								}else{
									printf('<img style="border: 1px solid #69cd37" src="%1$s%2$s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl() , thumbnail_path($main['illustration'], 122, 137));
								}
								echo '</td><td width="404">';
							}else{
								echo '<td colspan="2" width="542">';
							}

							if (!empty($main['title'])) {
								printf('<font face="Arial" style="line-height: 24px; font-size: 18px;" size="2" color="#006699">%s</font>', htmlentities($main['title'], ENT_COMPAT, 'utf-8'));
							}
							if (!empty($main['introduction'])) {
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333"><br/>%s</font>', nl2br(htmlentities($main['introduction'], ENT_COMPAT, 'utf-8')));
							}
							if (!empty($main['link'])) {
								printf('<font face="Arial" style="line-height: 12px; font-size: 11px;font-weight: bold;" size="2" color="#003366"><br/><br/><a style="color:#669933;" href="%s" target="_blank">%s</a></font>',czWidgetFormLink::displayLink($other['link']),  !empty($other['link_caption'])?$other['link_caption']:'LIEN');
							}

							echo '</td></tr>';
						}

						if ($total >= 1) {
							printf('<tr valign="top" style="line-height:0; font-size: 0;"><td colspan="2"><img src="%1$s/sudprojetPlugin/images/campaign01/left_sep_l.png" width="542" height="28" alt="" border="0" /></td></tr>', CatalyzEmailing::getApplicationUrl() );
						}
					}

					?>
				</table>


				<?php endif ?>
				<?php if (
					!empty($parameters['grey_title']) ||
					!empty($parameters['grey_content']) ||
					!empty($parameters['grey_link']) ||
					!empty($parameters['grey_picture'])
				) : ?>

				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="15" alt="" border="0" />
				<table width="542" bgcolor="#E4E4E4" cellpadding="0"  cellspacing="0" border="0">
					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_t_l.png" width="542" height="12" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
						<td width="508">
							<font face="Arial" style="line-height: 15px; font-size: 18px;" size="2" color="#003366">
							<?php
					if (!empty($parameters['grey_title'])) {
					printf('%s', htmlentities($parameters['grey_title'], ENT_COMPAT, 'utf-8'));
					}else{
					echo '&nbsp;';
					}
					?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" colspan="3" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="18" height="1" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>

					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_m_l.png" width="542" height="17" alt="" border="0" /></td>
					</tr>

					<?php

					if (!empty($parameters['grey_content'])) {
					printf('<tr valign="top">
					<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
					<td width="508">', CatalyzEmailing::getApplicationUrl() );
					printf('<font face="Arial" style="line-height: 15px; font-size: 11px;font-style: italic;" size="2" color="#006699">%s</font>', nl2br(htmlentities($parameters['grey_content'], ENT_COMPAT, 'utf-8')));
					printf('</td>
					<td style="line-height:0; font-size: 0;" width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
					}

					if (!empty($parameters['grey_link'])) {
					printf('<tr valign="top">
					<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
					<td width="508" align="right">', CatalyzEmailing::getApplicationUrl() );
					printf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#003366">
					<a style="color:#003366;" href="%s" target="_blank">EN SAVOIR +</a><br/>
					<br/>
					</font>',czWidgetFormLink::displayLink($parameters['grey_link']) );
					printf('</td>
					<td style="line-height:0; font-size: 0;" width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
					}

					if (!empty($parameters['grey_picture']) &&  is_file(sfConfig::get('sf_web_dir').$parameters['grey_picture'])) {
					printf('<tr style="line-height:0; font-size: 0;">
					<td bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					<td width="14"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="14" height="1" alt="" border="0" /></td>
					<td width="508" align="center">', CatalyzEmailing::getApplicationUrl() );

					if (!empty($parameters['grey_link'])) {
					printf('<a href="%3$s" target="_blank"><img src="%1$s%2$s" alt="" border="0" /></a>', CatalyzEmailing::getApplicationUrl() , thumbnail_path($parameters['grey_picture'], 228, 228),czWidgetFormLink::displayLink($parameters['grey_link']));
					}else{
					printf('<img src="%1$s%2$s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl() , thumbnail_path($parameters['grey_picture'], 228, 228));
					}

					printf('</td><td width="11"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="11" height="1" alt="" border="0" /></td>
					<td width="2" bgcolor="#FFFFFF"><img src="%1$s/sudprojetPlugin/images/campaign01/sep_w.gif" width="2" height="1" alt="" border="0" /></td>
					<td width="5"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_box_sep.png" width="5" height="1" alt="" border="0" /></td>
					<td bgcolor="#cdcdcd" width="1"><img src="%1$s/sudprojetPlugin/images/campaign01/grey_border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>', CatalyzEmailing::getApplicationUrl() );
					}

					?>

					<tr valign="top" style="line-height:0; font-size: 0;">
						<td colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/grey_box_b_l.png" width="542" height="10" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>




			</td>

			 <?php endif ?>




			<td style="line-height:0; font-size: 0;" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="9" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#cccccc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/footer_1.png" width="567" height="61" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="248"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/footer_2.png" width="248" height="47" alt="" border="0" /></td>
			<td bgcolor="#ebebeb" width="305" align="right" valign="middle">

					<?php

					$adress = array();

					if (!empty($parameters['adress']) || !empty($parameters['zip']) || !empty($parameters['city'])) {
						if (!empty($parameters['adress'])) {
							$adress[] .= htmlentities($parameters['adress'], ENT_COMPAT, 'utf-8');
						}

						if ( !empty($parameters['zip'])) {
							$adress[] .= htmlentities($parameters['zip'], ENT_COMPAT, 'utf-8');
						}

						$adress = implode('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71"> - </font>', $adress);

						printf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					%s
					</font>', $adress);
					}

					if (!empty($parameters['city'])) {
						printf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4"> %s</font>', htmlentities($parameters['city'], ENT_COMPAT, 'utf-8'));
					}

					echo '<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71"><br/></font>';

					$second = array();
					if (!empty($parameters['phone'])) {
						$second[] .= sprintf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					Tél. :
					</font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					%s
					</font>', htmlentities($parameters['phone'], ENT_COMPAT, 'utf-8')) ;
						}
					if (!empty($parameters['fax'])) {
						$second[] .= sprintf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					 – Fax :
					 </font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					%s
					</font>', htmlentities($parameters['fax'], ENT_COMPAT, 'utf-8')) ;
						}
					if (!empty($parameters['email'])) {
						$second[] .= sprintf('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71">
					 – E-mail :
					 </font>
					<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#0082a4">
					 <a style="color:#0082a4;" href="mailto:%1$s" target="_blank">%1$s</a>
					 </font>', htmlentities($parameters['email'], ENT_COMPAT, 'utf-8')) ;
						}

					echo implode('<font face="Arial" style="line-height: 12px; font-size: 8px;" size="2" color="#6d6e71"> - </font>', $second);

					if ($parameters['website_adress']) {
						printf('<font face="Arial" style="line-height: 12px; font-size: 9px;" size="2" color="#669900">
	 <a style="color:#669900;" href="http://%1$s" target="_blank">%1$s</a>
				</font>', htmlentities($parameters['website_adress'], ENT_COMPAT, 'utf-8'));
					}

					?>

			</td>
			<td style="line-height:0; font-size: 0;" bgcolor="#ebebeb" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_footer.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="1" height="10" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="567" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="507" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <a style="color:#999999;" href="mailto:XXXXXXXX@XXXXXXXXX" target="_blank">XXXXXXXX@XXXXXXXXX</a><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#999999;">ce lien de désinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/sudprojetPlugin/images/campaign01/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>