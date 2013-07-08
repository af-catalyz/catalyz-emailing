<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#ffffff" alink="#669933" vlink="#669933" link="#669933">
	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td width="49">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/header_1.jpg" width="49" height="100" alt="" border="0" />
			</td>
			<td width="153">
				<a href="http://www.doumercpneus.net/" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/logo.png" width="153" height="100" alt="" border="0" /></a>
			</td>
			<td width="460">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/header_3.jpg" width="460" height="100" alt="" border="0" />
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3" width="662">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/header_4.jpg" width="662" height="44" alt="" border="0" />
			</td>
		</tr>
	</table>
	<table width="662" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="330" valign="top">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/header_5.jpg" width="330" height="16" alt="" border="0" />
			</td>
			<td width="314" align="right">
				<font face="Arial" style="line-height: 12px; font-size: 11px;font-weight: bold;" size="2" color="#999999">
					 <?php

					 $content = array();
						foreach (array('number','month','details') as $field){
							if (!empty($parameters[$field])) {
								$content[]= html_entity_decode($parameters[$field], ENT_COMPAT, 'utf-8');
							}
						}
						if (empty($content)) {
							$content[]= '&nbsp;';
						}
					  printf('%s', implode(' // ', $content));
					  ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="18">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="18" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="662" bgcolor="#336699" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/main_top.png" width="662" height="22" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td width="388" bgcolor="#FFFFFF">
				<table width="388" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/left_t.png" width="388" height="19" alt="" border="0" />
						</td>
					</tr>
					<?php if (isset($parameters["main_articles"]) && is_array($parameters["main_articles"])):?><?php
		$cpt = count($parameters["main_articles"]);
		foreach($parameters["main_articles"] as $main_articles): ?>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td colspan="2" width="367">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_01.gif" width="19" height="13" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 20px; font-size: 18px;font-weight: bold;" size="2" color="#003366">
								 <?php if(isset($main_articles["main_articles_title"])){ ?><?php echo $main_articles["main_articles_title"]; ?><?php } ?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="10" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="1" height="25" alt="" border="0" /></td>
					</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<?php if ( !empty($main_articles["main_articles_picture"]) && is_file(sfConfig::get('sf_web_dir').$main_articles["main_articles_picture"])) : ?>
						<td style="line-height:0; font-size: 0;" width="151">
							<?php
								printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(),thumbnail_path($main_articles["main_articles_picture"], 137, 137));
							?>

						</td>
						<td width="216">
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333">
							<?php echo nl2br(htmlentities(utf8_decode($main_articles["main_articles_content"]))); ?>
							</font>

							<?php if(!empty($main_articles["main_articles_link"])){
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#669933"><br/><br/><img src="%s/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" /><a style="color:#669933;" href="%s" target="_blank">%s</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($main_articles["main_articles_link"]), !empty($main_articles["main_articles_caption"])?$main_articles["main_articles_caption"]:'Lien');
							}
							?>

						</td>
						<?php else: ?>

						<td width="367" colspan="2">
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333">
							<?php echo nl2br(htmlentities(utf8_decode($main_articles["main_articles_content"]))); ?>
							</font>

							<?php if(!empty($main_articles["main_articles_link"])){
								printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#669933"><br/><br/><img src="%s/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" /><a style="color:#669933;" href="%s" target="_blank">%s</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($main_articles["main_articles_link"]), !empty($main_articles["main_articles_caption"])?$main_articles["main_articles_caption"]:'Lien');
							}
							?>

						</td>
						<?php endif ?>


						<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="10" height="1" alt="" border="0" /></td>
					</tr>

					<?php
					$cpt--;
			if ($cpt > 0) {
				printf('<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4">
							<img src="%s/dpiPlugin/images/campaign01Wizzard/left_sep.png" width="388" height="63" alt="" border="0" />
						</td>
					</tr>', CatalyzEmailing::getApplicationUrl());
			}

					 ?>

					<?php endforeach;?><?php endif; ?>

					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="1" height="20" alt="" border="0" /></td>
					</tr>
				</table>

				<?php if (!empty($parameters['revue_articles'])) : ?>
				<table width="388" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					<?php if (!empty($parameters['main_articles'])) : ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/left_sep_s.png" width="388" height="42" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td colspan="2" width="367">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_01.gif" width="19" height="13" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 20px; font-size: 18px;font-weight: bold;" size="2" color="#003366">
								 REVUE DE PRESSE
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="10" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="1" height="25" alt="" border="0" /></td>
					</tr>
					<?php if (isset($parameters["revue_articles"]) && is_array($parameters["revue_articles"])):?><?php foreach($parameters["revue_articles"] as $revue_articles): ?>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>

						<?php if ( !empty($revue_articles["revue_articles_picture"]) && is_file(sfConfig::get('sf_web_dir').$revue_articles["revue_articles_picture"])) : ?>

						<td style="line-height:0; font-size: 0;" width="151">
							<?php
								printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(),thumbnail_path($revue_articles["revue_articles_picture"], 137, 137));
							?>
						</td>
						<td width="216">
							<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#666666"><?php if(isset($revue_articles["revue_articles_date"])){ ?><?php echo $revue_articles["revue_articles_date"]; ?><?php } ?><br/></font>
							<font face="Arial" style="line-height: 17px; font-size: 13px;font-weight:bold;" size="2" color="#006699"><?php echo nl2br(htmlentities(utf8_decode($revue_articles["revue_articles_titre"]))); ?><br/></font>
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333"><?php echo nl2br(htmlentities(utf8_decode($revue_articles["revue_articles_content"]))); ?></font>

								<?php if(!empty($revue_articles["revue_articles_link"])){

									printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#669933"><br/><br/><img src="%s/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" /><a style="color:#669933;" href="%s" target="_blank">Lire l\'article</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($revue_articles["revue_articles_link"]));

								} ?>

						</td>

						<?php else: ?>

						<td style="line-height:0; font-size: 0;" width="367" colspan="2">

							<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#666666"><?php if(isset($revue_articles["revue_articles_date"])){ ?><?php echo $revue_articles["revue_articles_date"]; ?><?php } ?><br/></font>
							<font face="Arial" style="line-height: 17px; font-size: 13px;font-weight:bold;" size="2" color="#006699"><?php echo nl2br(htmlentities(utf8_decode($revue_articles["revue_articles_titre"]))); ?><br/></font>
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#333333"><?php echo nl2br(htmlentities(utf8_decode($revue_articles["revue_articles_content"]))); ?></font>

								<?php if(!empty($revue_articles["revue_articles_link"])){

									printf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#669933"><br/><br/><img src="%s/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" /><a style="color:#669933;" href="%s" target="_blank">Lire l\'article</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($revue_articles["revue_articles_link"]));

								} ?>

						</td>

						<?php endif ?>

						<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="10" height="1" alt="" border="0" /></td>
					</tr>

					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="1" height="20" alt="" border="0" /></td>
					</tr>
					<?php endforeach;?><?php endif; ?>


				</table>
				<?php endif ?>

			</td>
			<td style="line-height:0; font-size: 0;" width="21"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_b.gif" width="21" height="1" alt="" border="0" /></td>
			<td width="253"> <!-- colonne de droite-->

				<?php if (
					!empty($parameters['evenements_title']) ||
					!empty($parameters['evenements'])
				):

					?>
				<table width="253" bgcolor="#f6f6f6" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_t.png" width="253" height="18" alt="" border="0" /></td>
					</tr>
					<tr bgcolor="#FFFFFF">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229" colspan="2">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_03.gif" width="27" height="11" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 18px; font-size: 16px;font-weight: bold;" size="2" color="#003366">
								 <?php if(isset($parameters["evenements_title"])){ ?><?php echo $parameters["evenements_title"]; ?><?php } ?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_filet.gif" width="253" height="13" alt="" border="0" /></td>
					</tr>
					<?php if (isset($parameters["evenements"]) && is_array($parameters["evenements"])):?><?php foreach($parameters["evenements"] as $evenements):

$event_link = false;
if (!empty($evenements['evenements_link'])) {
				$event_link = czWidgetFormLink::displayLink($evenements["evenements_link"]);
}

						?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="16" alt="" border="0" /></td>
					</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="11" height="1" alt="" border="0" /></td>

						<?php if ( !empty($evenements["evenements_picture"]) && is_file(sfConfig::get('sf_web_dir').$evenements["evenements_picture"])) : ?>
						<td style="line-height:0; font-size: 0;" width="98">

						<?php
							if ($event_link) {
								printf('<a href="%s" target="_blank"><img src="%s%s" alt="" border="0" /></a>', $event_link,CatalyzEmailing::getApplicationUrl(),thumbnail_path($evenements["evenements_picture"], 90, 90));
							}else{
								printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(),thumbnail_path($evenements["evenements_picture"], 90, 90));
							}

							?>
						</td>
						<td width="131">
							<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#333333"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" />
							<?php
							if ($event_link) {
								printf('<a style="color:#333333;" href="%s" target="_blank">%s</a>', $event_link, nl2br(htmlentities(utf8_decode($evenements["evenements_content"]))));
							}else{
								echo nl2br(htmlentities(utf8_decode($evenements["evenements_content"])));
							}
							 ?>
							</font>
						</td>
						<?php else : ?>
						<td colspan="2" width="229">
							<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#333333"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" />
							<?php
							if ($event_link) {
								printf('<a style="color:#333333;" href="%s" target="_blank">%s</a>', $event_link, nl2br(htmlentities(utf8_decode($evenements["evenements_content"]))));
							}else{
								echo nl2br(htmlentities(utf8_decode($evenements["evenements_content"])));
							}
							 ?>
							</font>
						</td>
						<?php endif ?>


						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<?php endforeach;?><?php endif; ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_b.png" width="253" height="44" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>

				<?php if (
!empty($parameters['nouveaute_title']) ||
!empty($parameters['nouveautes'])

): ?>
				<table width="253" bgcolor="#f6f6f6" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_t.png" width="253" height="18" alt="" border="0" /></td>
					</tr>
					<tr bgcolor="#FFFFFF">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_03.gif" width="27" height="11" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 18px; font-size: 16px;font-weight: bold;" size="2" color="#003366">
								 <?php if(isset($parameters["nouveaute_title"])){ ?><?php echo $parameters["nouveaute_title"]; ?><?php } ?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_filet.gif" width="253" height="13" alt="" border="0" /></td>
					</tr>
					<?php if (isset($parameters["nouveautes"]) && is_array($parameters["nouveautes"])):?><?php foreach($parameters["nouveautes"] as $nouveautes): ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="16" alt="" border="0" /></td>
					</tr>
					<?php if(!empty($nouveautes["nouveautes_picture"])): ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229" align="center">
							<?php
								printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(),thumbnail_path($nouveautes["nouveautes_picture"], 229, 229));
							?>
						</td>
						<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>

					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="13" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<table width="229" bgcolor="#f6f6f6" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="19" height="1" alt="" border="0" /></td>
									<td width="210">

										<?php if(!empty($nouveautes["nouveautes_link"])){
											printf('<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#336699"><img src="%s/dpiPlugin/images/campaign01Wizzard/bullet_02.gif" width="9" height="8" alt="" border="0" /><a style="color:#336699;" href="%s" target="_blank">%s</a></font>',CatalyzEmailing::getApplicationUrl(), czWidgetFormLink::displayLink($nouveautes["nouveautes_link"]), !empty($nouveautes["nouveautes_link_caption"])?$nouveautes["nouveautes_link_caption"]:'Lien');
										}
											?>

										<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight:bold;" size="2" color="#336699"><br/><br/>
										<?php echo nl2br(htmlentities(utf8_decode($nouveautes["nouveautes_content"]))); ?>
										</font>
									</td>
								</tr>
							</table>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<?php endforeach;?><?php endif; ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_b.png" width="253" height="44" alt="" border="0" /></td>
					</tr>
				</table>

				<?php endif ?>

				<?php if (
				!empty($parameters['talk_title']) ||
				!empty($parameters['talks'])
				): ?>
				<table width="253" bgcolor="#f6f6f6" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_t.png" width="253" height="18" alt="" border="0" /></td>
					</tr>
					<tr bgcolor="#FFFFFF">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_03.gif" width="27" height="11" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 18px; font-size: 16px;font-weight: bold;" size="2" color="#003366">
								 <?php if(isset($parameters["talk_title"])){ ?><?php echo $parameters["talk_title"]; ?><?php } ?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_filet.gif" width="253" height="13" alt="" border="0" /></td>
					</tr>
					<?php if (isset($parameters["talks"]) && is_array($parameters["talks"])):?><?php foreach($parameters["talks"] as $talks): ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="16" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229" align="center">
							<?php if(!empty($talks["talks_picture"])){
								printf('<img src="%s%s" alt="" border="0" />', CatalyzEmailing::getApplicationUrl(),thumbnail_path($talks["talks_picture"], 226, 226));
							}
							?>
						</td>
						<td width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="13" alt="" border="0" /></td>
					</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<font face="Arial" style="line-height: 15px; font-size: 13px;font-weight:bold;" size="2" color="#006699"><?php echo nl2br(htmlentities(utf8_decode($talks["talks_title"]))); ?><br/></font>
							<font face="Arial" style="line-height: 15px; font-size: 11px;" size="2" color="#333333"><br/><?php echo nl2br(htmlentities(utf8_decode($talks["talks_content"]))); ?></font>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<?php endforeach;?><?php endif; ?>

					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_b.png" width="253" height="44" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>

				<?php if (
!empty($parameters['custom_title']) ||
!empty($parameters['custom_content'])

): ?>
				<table width="253" bgcolor="#f6f6f6" cellspacing="0" cellpadding="0" border="0">
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_t.png" width="253" height="18" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['custom_title'])):?>
					<tr bgcolor="#FFFFFF">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/bullet_03.gif" width="27" height="11" alt="" border="0" />
							<font face="Trebuchet MS" style="line-height: 18px; font-size: 16px;font-weight: bold;" size="2" color="#003366">
								 <?php if(isset($parameters["custom_title"])){ ?><?php echo $parameters["custom_title"]; ?><?php } ?>
							</font>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif ?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_filet.gif" width="253" height="13" alt="" border="0" /></td>
					</tr>
					<?php if (!empty($parameters['custom_content'])):?>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="1" height="5" alt="" border="0" /></td>
					</tr>
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="11"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="11" height="1" alt="" border="0" /></td>
						<td width="229">
							<?php

							$renderer = new CatalyzEmailRenderer('Arial','#333333','line-height: 15px; font-size: 11px;');
							$renderer->renderWysiwyg($parameters['custom_content'],'#333333');
							 ?>
						</td>
						<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_g.gif" width="13" height="1" alt="" border="0" /></td>
					</tr>
					<?php endif; ?>

					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/right_b.png" width="253" height="44" alt="" border="0" /></td>
					</tr>
				</table>
				<?php endif ?>

			</td>
		</tr>
		</table>

	<table width="662" bgcolor="#396b9c" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="4" width="662">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/main_bottom.png" width="662" height="51" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="101"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_1.jpg" width="101" height="27" alt="" border="0" /></td>
			<td width="173" bgcolor="#77ae40" align="center" valign="middle">
				<font face="Arial" style="line-height: 12px; font-size: 12px;font-weight:bold;" size="2" color="#FFFFFF">En savoir plus ?</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_2.jpg" width="14" height="27" alt="" border="0" /></td>
			<td height="77" rowspan="3" style="line-height:0; font-size: 0;" width="374" bgcolor="#3399cc"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/b_baseline.png" width="374" height="77" alt="DPI, choix, réactivité, compétitivité,qualité et disponibilité...40 ans d’expérience à votre service." border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3" width="288"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_3.jpg" width="288" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="101"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_4.png" width="101" height="51" alt="" border="0" /></td>
			<td width="173" bgcolor="#FFFFFF" align="center" valign="middle">
				<font face="Arial" style="line-height: 5px; font-size: 5px;" size="2" color="#003366"><br/></font>
				<font face="Arial" style="line-height: 12px; font-size: 11px;font-weight:bold;" size="2" color="#003366">
				<?php if(isset($parameters["phone"])){ ?><?php echo $parameters["phone"]; ?><?php } ?>
				<br/>
				<?php if(isset($parameters["website_link"])){ ?>
					<a style="color:#003366;" href="<?php echo czWidgetFormLink::displayLink($parameters["website_link"]); ?>" target="_blank">www.doumercpneus.net</a>
				<?php } ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_5.png" width="14" height="51" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/footer_6.jpg" width="662" height="23" alt="" border="0" /></td>
		</tr>
	</table>
	<table width="662" bgcolor="#3399cc" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="40"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_f.gif" width="1" height="1" alt="" border="0" /></td>
			<td valign="middle" width="441">
				<font face="Arial" style="line-height: 12px; font-size: 10px;" size="2" color="#fefefe">
				<?php echo nl2br(htmlentities(utf8_decode($parameters["adress_content"]))); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="181">
				<?php if(isset($parameters["facebook_link"])): ?>
					<a href="<?php echo czWidgetFormLink::displayLink($parameters["facebook_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/facebook.png" width="139" height="40" alt="" border="0" /></a>
				<?php else: ?>
					<font face="Arial" style="line-height: 5px; font-size: 5px;" size="2" color="#003366">&nbsp;</font>
				<?php endif ?>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_f.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="663" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="30" height="20" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="603" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <a style="color:#999999;" href="mailto:XXX@gtradial.fr" target="_blank">XXX@gtradial.fr</a><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style="color:#999999;">ce lien de désinscription</a></font>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/dpiPlugin/images/campaign01Wizzard/sep_w.gif" width="30" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>