<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFFFFF" alink="#669933" vlink="#669933" link="#669933">
	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#412f33" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td rowspan="2" width="111"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="111" height="1" alt="" border="0" /></td>
			<td rowspan="2" width="191">
				<a href="javascript://" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/logo.gif" width="128" height="84" alt="" border="0" /></a>
			</td>
			<td align="right" width="295"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="1" height="3" alt="" border="0" /></td>
			<td rowspan="2" width="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="3" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td width="295">
				<?php if(!empty($parameters["header_picture"]) && is_file(sfConfig::get('sf_web_dir').$parameters["header_picture"])){
						printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters["header_picture"], 295, 92), 	getThumbnailSize($parameters["header_picture"], 295, 92));
					}else{
						echo '&nbsp;';
					}
					?>
			</td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="4"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/header_separator.gif" width="600" height="12" alt="" border="0" /></td>
		</tr>
	</table>
<?php if (isset($parameters["header_links"]) && is_array($parameters["header_links"])):?>
	<table width="600" bgcolor="#412f33" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="3" height="1" alt="" border="0" /></td>
			<td width="570" align="center" valign="top">
				<font face="Times New Roman, Georgia" style="font-size: 14px;line-height: 21px;" size="2" color="#FFFFFF">
				<?php
		$total = count($parameters["header_links"]);
		foreach($parameters["header_links"] as $header_links): ?>

				<?php
					if(!empty($header_links["header_links_link"])){
						printf('<a style="color:#FFFFFF;text-decoration: none;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($header_links["header_links_link"]), !empty($header_links["header_links_caption"])?htmlentities($header_links["header_links_caption"], ENT_COMPAT, 'utf-8'):'LIEN');
					}
					$total--;
					if ($total > 0) {
						printf('<img src="%s/fleuronsPlugin/images/campaignPromoWizzard/header_title_glue.gif" width="22" height="10" alt="" border="0" />', CatalyzEmailing::getApplicationUrl());
					}

					 ?>
				<?php endforeach;?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="3" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="3" height="10" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif; ?>

	<?php if(!empty($parameters["title"])): ?>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="18" height="1" alt="" border="0" /></td>
			<td width="568" align="center">
				<font face="Times New Roman, Georgia" style="font-size: 30px;line-height: 34px;" size="2" color="#c2bf4b">
 			  <?php echo htmlentities($parameters["title"], ENT_COMPAT, 'utf-8'); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/title_sep.gif" width="600" height="34" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<?php if (!empty($parameters["main_content"])): ?>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="1" height="10" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="18" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="12"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="12" height="1" alt="" border="0" /></td>
			<td width="543">
				<?php  $renderer = new CatalyzEmailRenderer("Times New Roman, Georgia", "#343434", "font-size: 18px;line-height: 22px;"); echo $renderer->renderWysiwyg($parameters["main_content"], "#343434");  ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="13"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="13" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td width="18"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="18" height="1" alt="" border="0" /></td>
			<td colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/content_separator.gif" width="568" height="25" alt="" border="0" />
			</td>
			<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>


	<?php if (isset($parameters["main_products"]) && is_array($parameters["main_products"])):?>


		<table width="568" bgcolor="#412f33" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" bgcolor="#bbafb1" valign="top">
			<td align="center" colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>

	<?php
							$total = count($parameters["main_products"]);
							foreach($parameters["main_products"] as $main_products): ?>

		<?php
$link = false;
if (!empty($main_products["main_products_link"])) {
	$link = czWidgetFormLink::displayLink($main_products["main_products_link"]);
} ?>


		<tr style="line-height:0; font-size: 0;" valign="top">
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="5" alt="" border="0" /></td>
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="265">


				<?php
				if(!empty($main_products["main_products_picture"]) && is_file(sfConfig::get('sf_web_dir').$main_products["main_products_picture"])){
					if ($link) {
						printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank"><img src="%s%s" alt="" %s border="0" /></a>', $link, CatalyzEmailing::getApplicationUrl(), thumbnail_path($main_products["main_products_picture"], 265, false), 	getThumbnailSize($main_products["main_products_picture"], 265, false));
					}else{
						printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($main_products["main_products_picture"], 265, false), 	getThumbnailSize($main_products["main_products_picture"], 265, false));
					}
				}else{
					echo '&nbsp;';
				}

				?>

			</td>
			<td style="line-height:0; font-size: 0;" width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
			<td width="286">
				<?php if (!empty($main_products["main_products_price"]) ) : ?>
				<table width="286" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td bgcolor="#c2bf4b" rowspan="2" width="89" valign="middle" align="center">
							<font face="Trebuchet MS" style="font-size: 32px;line-height: 34px;" size="2" color="#FFFFFF"><?php if(!empty($main_products["main_products_price"])){ ?><?php echo htmlentities($main_products["main_products_price"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
						</td>

						<td style="line-height:0; font-size: 0;" bgcolor="#c2bf4b" width="62" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_l.gif" width="34" height="18" alt="" border="0" /></td>
						<td style="line-height:0; font-size: 0;" valign="bottom" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r1.gif" width="9" height="17" alt="" border="0" /></td>
						<td width="126" rowspan="2" align="right">
							<font face="Trebuchet MS" style="font-size: 36px;line-height: 38px;" size="2" color="#FFFFFF"><?php if(!empty($main_products["main_products_pourcentage"])){ ?><?php echo htmlentities($main_products["main_products_pourcentage"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
						</td>
					</tr>
					<tr valign="top">
						<td bgcolor="#c2bf4b" width="62" align="center" valign="middle">
							<del>
								<font face="Trebuchet MS" style="font-size: 20px;line-height: 21px;font-style: italic;" size="2" color="#3f3033"><?php if(!empty($main_products["main_products_strike_price"])){ ?><?php echo htmlentities($main_products["main_products_strike_price"], ENT_COMPAT,'utf-8') ; ?><?php } ?></font>
							</del>
						</td>
						<td bgcolor="#c2bf4b" style="line-height:0; font-size: 0;" valign="top" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r2.gif" width="9" height="25" alt="" border="0" /></td>
					</tr>
					<tr style="line-height:0; font-size: 0;" valign="top">
						<td colspan="4">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/main_product_separator.gif" width="286" height="18" alt="" border="0" />
						</td>
					</tr>
				</table>
				<?php endif ?>

				<?php if (!empty($main_products["main_products_title"]) || !empty($main_products["main_products_details"])) : ?>

				<table width="286" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" /></td>
						<td width="278">
							<font face="Tahoma" style="font-size: 18px;line-height: 21px;font-weight: bold;" size="2" color="#FFFFFF">

							<?php
							if ($link) {
								printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank">%s</a>', $link, nl2br(htmlentities(utf8_decode($main_products["main_products_title"]))));
							}else{
								echo nl2br(htmlentities(utf8_decode($main_products["main_products_title"])));
							} ?>



							</font>
							<font face="Trebuchet MS" style="font-size: 12px;line-height: 16px;" size="2" color="#FFFFFF"><br/><br/>
							<?php echo nl2br(htmlentities(utf8_decode($main_products["main_products_details"]))); ?>
							</font>
						</td>
					</tr>
				</table>
				<?php endif ?>

			</td>
			<td style="line-height:0; font-size: 0;" width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>

		<?php
											$total--;
											if ($total == 0) : ?>
												<tr style="line-height:0; font-size: 0;" valign="top">
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="5" alt="" border="0" /></td>
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
											<tr style="line-height:0; font-size: 0;" bgcolor="#bbafb1" valign="top">
			<td align="center" colspan="7"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" bgcolor="#FFFFFF" valign="top">
			<td align="center" colspan="7">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/content_separator_light.gif" width="568" height="11" alt="" border="0" />
			</td>
		</tr>

		<?php else: ?>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="5" alt="" border="0" /></td>
			<td bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>

		<?php endif ?>

	<?php endforeach;?>
	</table>

	<?php endif; ?>

	<?php if (isset($parameters["secondary_products"]) && is_array($parameters["secondary_products"])):?><?php foreach($parameters["secondary_products"] as $secondary_products): ?>
	<table width="568" bgcolor="#412f33" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td bgcolor="#bbafb1" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="16" bgcolor="#FFFFFF"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="16" height="1" alt="" border="0" /></td>
			<td bgcolor="#bbafb1" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="274">

			<?php if (
			!empty($secondary_products["secondary_products_left_price"]) ||
			!empty($secondary_products["secondary_products_left_pourcentage"]) ||
			!empty($secondary_products["secondary_products_left_strike_price"]) ||
			!empty($secondary_products["secondary_products_left_picture"]) ||
			!empty($secondary_products["secondary_products_left_title"]) ||
			!empty($secondary_products["secondary_products_left_link"]) ||
			!empty($secondary_products["secondary_products_left_details"])
			) : ?>

			<?php
			$link = false;
			if (!empty($secondary_products["secondary_products_left_link"])) {
				$link = czWidgetFormLink::displayLink($secondary_products["secondary_products_left_link"]);
			} ?>

			<?php if (
!empty($secondary_products["secondary_products_left_price"]) ||
!empty($secondary_products["secondary_products_left_pourcentage"]) ||
!empty($secondary_products["secondary_products_left_picture"]) ||
!empty($secondary_products["secondary_products_left_strike_price"])
) : ?>
			<table width="274" cellspacing="0" cellpadding="0" border="0">
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="5" alt="" border="0" /></td>
				</tr>
							<?php if (
!empty($secondary_products["secondary_products_left_price"])
) : ?>
				<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="5" rowspan="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
					<td bgcolor="#c2bf4b" rowspan="2" width="89" valign="middle" align="center">
						<font face="Trebuchet MS" style="font-size: 32px;line-height: 34px;" size="2" color="#FFFFFF">
						<?php if(!empty($secondary_products["secondary_products_left_price"])){ ?><?php echo htmlentities($secondary_products["secondary_products_left_price"], ENT_COMPAT,'utf-8'); ?><?php } ?>
						</font>
					</td>
					<td style="line-height:0; font-size: 0;" bgcolor="#c2bf4b" width="62" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_l.gif" width="34" height="18" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" valign="bottom" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r1.gif" width="9" height="17" alt="" border="0" /></td>
					<td width="104" rowspan="2" align="right">
						<font face="Trebuchet MS" style="font-size: 36px;line-height: 38px;" size="2" color="#FFFFFF"><?php if(!empty($secondary_products["secondary_products_left_pourcentage"])){ ?><?php echo htmlentities($secondary_products["secondary_products_left_pourcentage"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
					</td>
					<td style="line-height:0; font-size: 0;" width="5" rowspan="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
				</tr>
				<tr valign="top">
					<td bgcolor="#c2bf4b" width="62" align="center" valign="middle">
						<del>
							<font face="Trebuchet MS" style="font-size: 20px;line-height: 21px;font-style: italic;" size="2" color="#3f3033"><?php if(!empty($secondary_products["secondary_products_left_strike_price"])){ ?><?php echo htmlentities($secondary_products["secondary_products_left_strike_price"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
						</del>
					</td>
					<td bgcolor="#c2bf4b" style="line-height:0; font-size: 0;" valign="top" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r2.gif" width="9" height="25" alt="" border="0" /></td>
				</tr>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/secondary_separator.gif" width="274" height="5" alt="" border="0" /></td>
				</tr>
				<?php endif ?>
				<?php if(!empty($secondary_products["secondary_products_left_picture"]) && is_file(sfConfig::get('sf_web_dir').$secondary_products["secondary_products_left_picture"])): ?>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6">
						<?php

					if ($link) {
						printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank"><img src="%s%s" alt="" %s border="0" /></a>', $link, CatalyzEmailing::getApplicationUrl(), thumbnail_path($secondary_products["secondary_products_left_picture"], 274, false), 	getThumbnailSize($secondary_products["secondary_products_left_picture"], 274, false));
					}else{
						printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($secondary_products["secondary_products_left_picture"], 274, false), 	getThumbnailSize($secondary_products["secondary_products_left_picture"], 274, false));
					}
					 ?>
					</td>
				</tr>
				<?php endif ?>

			</table>
			<?php endif ?>

			<?php if (
!empty($secondary_products["secondary_products_left_title"]) ||
!empty($secondary_products["secondary_products_left_details"])
) : ?>
			<table width="274" cellspacing="0" cellpadding="0" border="0">
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="15" alt="" border="0" /></td>
				</tr>
				<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" /></td>
					<td width="254">
						<font face="Tahoma" style="font-size: 18px;line-height: 21px;font-weight: bold;" size="2" color="#FFFFFF">
						<?php if ($link) {
							printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank">%s</a>', $link, nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_left_title"]))));
						}else{
							echo nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_left_title"])));
						} ?>
						</font>
							<font face="Trebuchet MS" style="font-size: 12px;line-height: 16px;" size="2" color="#FFFFFF"><br/><br/>
							<?php echo nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_left_details"]))); ?>
							</font>
					</td>
					<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" /></td>
				</tr>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="15" alt="" border="0" /></td>
				</tr>
			</table>
			<?php endif ?>

			<?php else: ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" />
			<?php endif ?>
			</td>
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="line-height: 0; font-size: 0; background-image: url(<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/repeat_sep.gif); background-repeat: repeat-y;" width="16" bgcolor="#FFFFFF"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="16" height="1" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="274">

			<?php if (
			!empty($secondary_products["secondary_products_right_price"]) ||
			!empty($secondary_products["secondary_products_right_pourcentage"]) ||
			!empty($secondary_products["secondary_products_right_strike_price"]) ||
			!empty($secondary_products["secondary_products_right_picture"]) ||
			!empty($secondary_products["secondary_products_right_title"]) ||
			!empty($secondary_products["secondary_products_right_link"]) ||
			!empty($secondary_products["secondary_products_right_details"])
			) : ?>
				<?php
$link = false;
if (!empty($secondary_products["secondary_products_right_link"])) {
	$link = czWidgetFormLink::displayLink($secondary_products["secondary_products_right_link"]);
} ?>
				<?php if (
!empty($secondary_products["secondary_products_right_price"]) ||
!empty($secondary_products["secondary_products_right_pourcentage"]) ||
!empty($secondary_products["secondary_products_right_picture"]) ||
!empty($secondary_products["secondary_products_right_strike_price"])
) : ?>
		<table width="274" cellspacing="0" cellpadding="0" border="0">
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="5" alt="" border="0" /></td>
				</tr>
					<?php if (
!empty($secondary_products["secondary_products_right_price"])
) : ?>
				<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="5" rowspan="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
					<td bgcolor="#c2bf4b" rowspan="2" width="89" valign="middle" align="center">
						<font face="Trebuchet MS" style="font-size: 32px;line-height: 34px;" size="2" color="#FFFFFF">
						<?php if(!empty($secondary_products["secondary_products_right_price"])){ ?><?php echo htmlentities($secondary_products["secondary_products_right_price"], ENT_COMPAT,'utf-8'); ?><?php } ?>
						</font>
					</td>
					<td style="line-height:0; font-size: 0;" bgcolor="#c2bf4b" width="62" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_l.gif" width="34" height="18" alt="" border="0" /></td>
					<td style="line-height:0; font-size: 0;" valign="bottom" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r1.gif" width="9" height="17" alt="" border="0" /></td>
					<td width="104" rowspan="2" align="right">
						<font face="Trebuchet MS" style="font-size: 36px;line-height: 38px;" size="2" color="#FFFFFF"><?php if(!empty($secondary_products["secondary_products_right_pourcentage"])){ ?><?php echo htmlentities($secondary_products["secondary_products_right_pourcentage"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
					</td>
					<td style="line-height:0; font-size: 0;" width="5" rowspan="2"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="1" alt="" border="0" /></td>
				</tr>
				<tr valign="top">
					<td bgcolor="#c2bf4b" width="62" align="center" valign="middle">
						<del>
							<font face="Trebuchet MS" style="font-size: 20px;line-height: 21px;font-style: italic;" size="2" color="#3f3033"><?php if(!empty($secondary_products["secondary_products_right_strike_price"])){ ?><?php echo htmlentities($secondary_products["secondary_products_right_strike_price"], ENT_COMPAT,'utf-8'); ?><?php } ?></font>
						</del>
					</td>
					<td bgcolor="#c2bf4b" style="line-height:0; font-size: 0;" valign="top" align="left" width="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/price_r2.gif" width="9" height="25" alt="" border="0" /></td>
				</tr>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/secondary_separator.gif" width="274" height="5" alt="" border="0" /></td>
				</tr>
				<?php endif ?>
				<?php if(!empty($secondary_products["secondary_products_right_picture"]) && is_file(sfConfig::get('sf_web_dir').$secondary_products["secondary_products_right_picture"])): ?>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="6">
						<?php
					if ($link) {
						printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank"><img src="%s%s" alt="" %s border="0" /></a>', $link, CatalyzEmailing::getApplicationUrl(), thumbnail_path($secondary_products["secondary_products_right_picture"], 274, false), 	getThumbnailSize($secondary_products["secondary_products_right_picture"], 274, false));
					}else{
						printf('<img src="%s%s" alt="" %s border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($secondary_products["secondary_products_right_picture"], 274, false), 	getThumbnailSize($secondary_products["secondary_products_right_picture"], 274, false));
					}

					 ?>
					</td>
				</tr>
				<?php endif ?>

			</table>
			<?php endif ?>

				<?php if (
!empty($secondary_products["secondary_products_right_title"]) ||
!empty($secondary_products["secondary_products_right_details"])
) : ?>
			<table width="274" cellspacing="0" cellpadding="0" border="0">
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="15" alt="" border="0" /></td>
				</tr>
				<tr valign="top">
					<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" /></td>
					<td width="254">
						<font face="Tahoma" style="font-size: 18px;line-height: 21px;font-weight: bold;" size="2" color="#FFFFFF">

						<?php if ($link) {
							printf('<a style="color: #FFFFFF; text-decoration: none;" href="%s" target="_blank">%s</a>', $link, nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_right_title"]))));
						}else{
							echo nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_right_title"])));
						} ?>

							</font>
							<font face="Trebuchet MS" style="font-size: 12px;line-height: 16px;" size="2" color="#FFFFFF"><br/><br/>
							<?php echo nl2br(htmlentities(utf8_decode($secondary_products["secondary_products_right_details"]))); ?>
							</font>
					</td>
					<td style="line-height:0; font-size: 0;" width="10"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" /></td>
				</tr>
				<tr style="line-height:0; font-size: 0;" valign="top">
					<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="5" height="15" alt="" border="0" /></td>
				</tr>
			</table>
			<?php endif ?>
			<?php else: ?>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown.gif" width="10" height="1" alt="" border="0" />
			<?php endif ?>

			</td>
			<td style="line-height:0; font-size: 0;" bgcolor="#bbafb1" width="1"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td bgcolor="#bbafb1" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="16" bgcolor="#FFFFFF"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="16" height="1" alt="" border="0" /></td>
			<td bgcolor="#bbafb1" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/border.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" bgcolor="#FFFFFF" valign="top">
			<td align="center" colspan="7">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/content_separator_light.gif" width="568" height="11" alt="" border="0" />
			</td>
		</tr>
	</table>
	<?php endforeach;?><?php endif; ?>


	<?php if (!empty($parameters["green_content"]) || !empty($parameters["mentions_content"])) : ?>


	<table width="600" bgcolor="#c2bf4b" align="center" cellspacing="0" cellpadding="0" border="0">
		<?php if (!empty($parameters["green_content"])) : ?>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_green.gif" width="30" height="1" alt="" border="0" /></td>
			<td width="540" align="center">
				<?php  $renderer = new CatalyzEmailRenderer("Tahoma", "#FFFFFF", "font-size: 21px;line-height: 24px;"); echo $renderer->renderWysiwyg($parameters["green_content"], "#FFFFFF"); ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_green.gif" width="30" height="1" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
		<?php if ( !empty($parameters["mentions_content"])) : ?>
		<tr style="line-height:0; font-size: 0;" valign="top" bgcolor="#FFFFFF">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="1" height="11" alt="" border="0" /></td>
		</tr>

		<tr valign="top" bgcolor="#FFFFFF">
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="30" height="1" alt="" border="0" /></td>
			<td width="540" align="center">
				<font face="Arial" style="font-size: 10px;line-height: 14px;" size="2" color="#a9a9a9">
					<?php echo nl2br(htmlentities(utf8_decode($parameters["mentions_content"]))); ?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="30"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="30" height="1" alt="" border="0" /></td>
		</tr>
		<?php endif ?>
	</table>
	<?php endif ?>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td align="center" colspan="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/content_separator.gif" width="568" height="25" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td align="center" colspan="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="1" height="4" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td width="15"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="15" height="1" alt="" border="0" /></td>
			<td width="139">
				<?php if(!empty($parameters["livraison_link"])){ ?>
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["livraison_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/livraison.gif" width="139" height="78" alt="" border="0" /></a>
				<?php } ?>
			</td>
			<td width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="5" height="1" alt="" border="0" /></td>
			<td width="139">
			<?php if(!empty($parameters["paiement_link"])){ ?>
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["paiement_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/paiement.gif" width="139" height="78" alt="" border="0" /></a>
				<?php } ?>
			</td>
			<td width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="5" height="1" alt="" border="0" /></td>
			<td width="139">
			<?php if(!empty($parameters["point_de_vente_link"])){ ?>
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["point_de_vente_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/point_de_vente.gif" width="139" height="78" alt="" border="0" /></a>
				<?php } ?>
			</td>
			<td width="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="5" height="1" alt="" border="0" /></td>
			<td width="139">
				<?php if(!empty($parameters["youtube_link"])){ ?>
				<a href="<?php echo czWidgetFormLink::displayLink($parameters["youtube_link"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/youtube.gif" width="139" height="78" alt="" border="0" /></a>
				<?php } ?>
			</td>
			<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="14" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td align="center" colspan="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_wh.gif" width="1" height="14" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/pre_footer_l.jpg" width="130" height="32" alt="" border="0" /></td>
			<td width="340"><!--a href="javascript://" target="_blank"--><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/link.jpg" width="340" height="32" alt="" border="0" /><!--/a--></td>
			<td style="line-height:0; font-size: 0;" width="130"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/pre_footer_r1.jpg" width="130" height="32" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;" valign="top">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/pre_footer_2.jpg" width="600" height="21" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="192"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/filet_l.gif" width="192" height="24" alt="" border="0" /></td>
			<td style="line-height:0; font-size: 0;" width="26">

			<?php

				if (!empty($parameters["facebook_link"])) {
					printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank"><img src="%s/fleuronsPlugin/images/campaignPromoWizzard/fb.gif" width="26" height="24" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters["facebook_link"]), CatalyzEmailing::getApplicationUrl());
				}else{
					echo '&nbsp;';
				}

				?>
			</td>
			<td width="212" align="center" valign="middle">
				<font face="Arial" style="font-size: 10px;line-height: 16px;font-weight: bold;" size="2" color="#FFFFFF">

				<?php

				if (!empty($parameters["website_link"])) {
					printf('<a style="color:#ffffff;text-decoration: none;" href="%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["website_link"]), !empty($parameters["website_caption"])?htmlentities($parameters["website_caption"], ENT_COMPAT, 'utf-8'):'LIEN');
				}else{
					echo '&nbsp;';
				}

				?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="170"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/filet_r.gif" width="170" height="24" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="600" bgcolor="#39292d" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
			<td width="480" align="center">
				<font face="Arial" style="font-size: 12px;line-height: 20px;" size="2" color="#FFFFFF">
				 <?php
				if (!empty($parameters["adresse"])) {
					echo nl2br(htmlentities(utf8_decode($parameters["adresse"])));
				}

				$secondLine = array();
if (!empty($parameters["phone"])) {
	$secondLine[]= sprintf('Tel : %s', htmlentities($parameters["phone"], ENT_COMPAT, 'utf-8'));
}
if (!empty($parameters["contact_link"])) {
	$secondLine[]= sprintf('mail : <a style="text-decoration: none;color:#FFFFFF;" href="mailto:%s" target="_blank">%s</a>', czWidgetFormLink::displayLink($parameters["contact_link"]), !empty($parameters["contact_caption"])?htmlentities($parameters["contact_caption"], ENT_COMPAT, 'utf-8'):'LIEN');
}

if (!empty($secondLine)) {
	printf('<br/>%s', implode(' - ', $secondLine));
}

?>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
			<td width="480" align="center">
				<?php if (!empty($parameters["footer_content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#9f8a8f", "font-size: 10px;line-height: 14px;"); echo $renderer->renderWysiwyg($parameters["footer_content"], "#9f8a8f"); } ?>

				<font face="Arial" style="font-size: 10px;line-height: 14px;" size="2" color="#9f8a8f">
<br/>
Si vous ne souhaitez plus recevoir nos lettres d'informations,<br/>
vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#9f8a8f;">cliquant ici</a>.
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="60"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="60" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="line-height:0; font-size: 0;">
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/campaignPromoWizzard/sep_brown_dark.gif" width="1" height="15" alt="" border="0" /></td>
		</tr>
	</table>
</body>
</html>