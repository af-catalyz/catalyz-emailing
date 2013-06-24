<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<?php
$parameters = unEscape($parameters);
$renderer = new CatalyzEmailRenderer('Arial','#669933','line-height: 16px; font-size: 12px;');
?>

<body link="#FFFFFF">
	<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center">
				<font face="Arial" style="font-size: 8px;" size="2" color="#000000">
					Si ce message ne s'affiche pas correctement, vous pouvez le visualiser grâce à ce <a style="color: #3c779b;" href="#VIEW_ONLINE#"><font color="#3c779b">lien</font></a>
				</font>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
	</table>

	<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center">
				<?php
				if (!empty($parameters['top_picture'])) {
					$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_path($parameters['top_picture'], 801, 166);
					$thumbnailSize = getimagesize($thumbnailPath);
					printf('<img src="%s%s" alt="" width="%s" height="%s" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['top_picture'], 801, 166) , $thumbnailSize[0], $thumbnailSize[1]);
				}
				?>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801">
				<table width="801" bgcolor="#92ba5b" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td align="center">
							<font face="Arial" style="font-size: 11px;font-weight:bold;line-height: 12px;" size="2" color="#FFFFFF">
								L'AGENDA DE L'OFFICE DU TOURISME DU GRAND MONTAUBAN
							</font>
						</td>
						<td width="150" align="center">
							<?php
							if (!empty($parameters['date'])) {
								printf('<font face="Arial" style="font-size: 11px;font-weight:bold;line-height: 12px;" size="2" color="#FFFFFF">%s</font>', htmlentities($parameters['date'], ENT_COMPAT, 'utf-8'));
							}
							?>
						</td>
						<td width="194">
							<a href="http://www.montauban-tourisme.com"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/button_02.gif" alt="" width="194" height="25" border="0" /></a>
						</td>
						<td width="87">
							<a href="#PRINT#"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/button_03.gif" alt="" width="87" height="25" border="0" /></a>
						</td>
					</tr>
				</table>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="801" height="15" border="0" /></td>
		</tr>
	</table>

	<?php if (!empty($parameters['zoom_picture']) || !empty($parameters['zoom_content'])): ?>
	<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>

		<?php if (!empty($parameters['zoom_picture'])): ?>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133">
				<?php
					$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_path($parameters['zoom_picture'], 801, 166);
					$thumbnailSize = getimagesize($thumbnailPath);
					printf('<img src="%s%s" alt="" width="%s" height="%s" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['zoom_picture'], 801, 166) , $thumbnailSize[0], $thumbnailSize[1]);
				?>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<?php endif ?>

		<?php if (!empty($parameters['zoom_content'])) : ?>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/zoom.gif" alt="" width="799" height="70" border="0" />
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" bgcolor="#4a3008">
				<table width="801" bgcolor="#4a3008" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="800" height="10" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
					<tr>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td width="772">
							<?php $renderer->renderWysiwyg( $parameters['zoom_content'],'#FFFFFF'); ?>
						</td>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
				</table>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<?php endif ?>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="801" height="15" border="0" /></td>
		</tr>
	</table>
	<?php endif ?>

	<?php

	$renderer->setColor('#FFFFFF');

	$style = array();
	$style['manifestation'] = array('color' => '#091e2b', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_03.gif');
	$style['musique'] = array('color' => '#610812', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_04.gif');
	$style['sport'] = array('color' => '#1c3906', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_05.gif');
	$style['culture'] = array('color' => '#2c0520', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_06.gif');
	$style['tourisme'] = array('color' => '#f66108', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_07.gif');
	$style['cinema'] = array('color' => '#330a9a', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_08.gif');
	$style['danse'] = array('color' => '#015c43', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_09.gif');
	$style['loisirs'] = array('color' => '#572d2a', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_10.gif');
	$style['stage'] = array('color' => '#870150', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_11.gif');
	$style['exposition'] = array('color' => '#f7b006', 'image' => '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_12.gif');

  ?>

	<?php
	$finalTab = array();
	if (!empty($parameters['box_left']) || !empty($parameters['box_right'])){

			if (!empty($parameters['box_left'])) {
				$countLeft = count($parameters['box_left']);
				$left = $parameters['box_left'];
			}else{
				$left = array();
				$countLeft = 0;
			}

			if (!empty($parameters['box_right'])) {
				$countRight = count($parameters['box_right']);
				$right = $parameters['box_right'];
			}else{
				$right = array();
				$countRight = 0;
			}

			$max = max($countLeft,$countRight);
			$max *= 2;

			for ($i = 0; $i< $max; $i++){
				if ($i%2 == 0) {
					$finalTab[$i] = is_array($left)?array_shift($left):NULL;
				}else{
					$finalTab[$i] = is_array($right)?array_shift($right):NULL;
				}
			}

		if (count($finalTab)%2 != 0) {
			array_push($finalTab,NULL);
		}
	}


	foreach ($finalTab as $key => $box):
		$leftColor = $rightColor ='#ebede2';

		if ($key%2==0) :
			$left = $finalTab[$key];
			$right = $finalTab[$key+1];

			if ($left != NULL) {
				$leftColor = $style[$left['style']]['color'];
			}
			if ($right != NULL) {
				$rightColor = $style[$right['style']]['color'];
			}
	?>

	 <!-- elements -->
		<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="389" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="19" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="389" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>

		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133">
				<?php
				if ($left != NULL) {
					if ($left['picture'] != '') {
						$picture = $left['picture'];
					}else{
						$picture = $style[$left['style']]['image'];
					}

					$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_path($picture, 389, 141);
					$thumbnailSize = getimagesize($thumbnailPath);
					printf('<img src="%s%s" alt="" width="%s" height="%s" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($picture, 389, 141) , $thumbnailSize[0], $thumbnailSize[1]);
				}
				?>
			</td>
			<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="19" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133">
				<?php
				if ($right != NULL) {
					if ($right['picture'] != '') {
						$picture = $right['picture'];
					}else{
						$picture = $style[$right['style']]['image'];
					}

					$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_path($picture, 389, 141);
					$thumbnailSize = getimagesize($thumbnailPath);
					printf('<img src="%s%s" alt="" width="%s" height="%s" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($picture, 389, 141) , $thumbnailSize[0], $thumbnailSize[1]);
				}
				?>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>


		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133">
				<?php
				if ($left != NULL) {
					printf('<img src="%s/OfficeTourismeMontaubanPlugin/images/newsletter2012/%s.gif" alt="" width="389" height="70" border="0" />', CatalyzEmailing::getApplicationUrl(), $left['style']);
				}
				?>
			</td>
			<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="19" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133">
				<?php
				if ($right != NULL) {
					printf('<img src="%s/OfficeTourismeMontaubanPlugin/images/newsletter2012/%s.gif" alt="" width="389" height="70" border="0" />', CatalyzEmailing::getApplicationUrl(), $right['style']);
				}
				?>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>

		<tr valign="top">
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<?php printf('<td width="389" align="center" bgcolor="%s">', $leftColor) ?>
				<?php printf('<table width="389" bgcolor="%s" cellspacing="0" cellpadding="0" border="0">', $leftColor) ?>
					<tr><td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="388" height="10" border="0" /></td></tr>
					<tr>
						<td width="12"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="12" height="1" border="0" /></td>
						<td align="left">
							<?php
							if ($left != NULL) {
								$renderer->renderWysiwyg( $left['content'],'#FFFFFF');
							}
							?>
						</td>
						<td width="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="6" height="1" border="0" /></td>
					</tr>
				</table>
			</td>
			<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="19" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="<?php echo $rightColor ?>">
				<table width="389" bgcolor="<?php echo $rightColor ?>" cellspacing="0" cellpadding="0" border="0">
					<tr><td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="388" height="10" border="0" /></td></tr>
					<tr>
						<td width="12"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="12" height="1" border="0" /></td>
						<td align="left">
							<?php
							if ($right != NULL) {
								$renderer->renderWysiwyg( $right['content'],'#FFFFFF');
							}
							?>
						</td>
						<td width="6"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="6" height="1" border="0" /></td>
					</tr>
				</table>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>

		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="389" height="1" border="0" /></td>
			<td width="19"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="19" height="1" border="0" /></td>
			<td width="389" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="389" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td colspan="9"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="15" border="0" /></td>
		</tr>
	</table>
	<!-- /elements -->

		<?php endif ?>
	<?php endforeach ?>

	<?php if (!empty($parameters['visites'])): ?>
	<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="1" rowspan="4" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="1" rowspan="4" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/visites.gif" alt="" width="799" height="70" border="0" />
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" bgcolor="#06123e">
				<table width="801" bgcolor="#94c11f" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="800" height="10" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
					<tr>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td width="772">
							<?php
								$renderer->renderWysiwyg( $parameters['visites'],'#FFFFFF');
							?>
						</td>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
				</table>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="801" height="15" border="0" /></td>
		</tr>
	</table>

	<?php endif ?>

	<table width="848" bgcolor="#ebede2" align="center" cellspacing="0" cellpadding="0" border="0" style="page-break-inside : avoid;">
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="1" rowspan="5" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133">
			<?php
			if (!empty($parameters['footer_picture'])) {
				$thumbnailPath = sfConfig::get('sf_web_dir').thumbnail_path($parameters['footer_picture'], 801, 166);
				$thumbnailSize = getimagesize($thumbnailPath);
				printf('<img src="%s%s" alt="" width="%s" height="%s" border="0" />', CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['footer_picture'], 801, 166) , $thumbnailSize[0], $thumbnailSize[1]);
			}
			?>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#06123e">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/contact.gif" alt="" width="799" height="70" border="0" />
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" bgcolor="#06123e">
				<table width="800" bgcolor="#06123e" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="800" height="10" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
					<tr>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td align="right">



							<?php



								$renderer->renderWysiwyg( $parameters['contact_content'],'#FFFFFF');

							 ?>


						</td>
						<td width="14"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="14" height="1" border="0" /></td>
						<td width="1" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="1" height="1" border="0" /></td>
					</tr>
				</table>
			</td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td width="801" align="center" bgcolor="#4c5133"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep_color.gif" alt="" width="799" height="1" border="0" /></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td width="24"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="24" height="1" border="0" /></td>
			<td bgcolor="#000000" colspan="3" align="center"><a href="http://www.montauban-tourisme.com"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/button_01.gif" alt="" width="191" height="18" border="0" /></a></td>
			<td width="23"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="23" height="1" border="0" /></td>
		</tr>
		<tr>
			<td colspan="5"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/OfficeTourismeMontaubanPlugin/images/newsletter2012/sep.gif" alt="" width="801" height="25" border="0" /></td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				<font face="Arial" style="font-size: 10px; line-height: 14px;" size="2" color="#000000">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification et d'opposition aux informations<br/>vous concernant qui peut s'exercer par e-mail à
<a style="color: #000000;" href="mailto:info@montauban-tourisme.com">info@montauban-tourisme.com</a> ou en cliquant sur ce lien de
<a style="color: #000000;" href="#UNSUBSCRIBE#">désinscription</a>.
</font></td>
		</tr>
</table>


</body>
</html>
