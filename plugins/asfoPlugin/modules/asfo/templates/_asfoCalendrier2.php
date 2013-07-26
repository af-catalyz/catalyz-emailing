<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php $parameters = unEscape($parameters) ?>

	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0;">
			<td colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/header.jpg" width="600" height="5" border="0" />
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
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="600" height="5" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="4">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/header_1.jpg" width="600" height="160" border="0" />
			</td>
		</tr>
		<tr valign="bottom">
			<td width="44" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/header_left.jpg" width="44" height="50" border="0" />
			</td>
			<td width="11"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="11" height="5" border="0" /></td>
			<td bgcolor="#998f86" width="454">
				<?php if (!empty($parameters['introduction'])) {
    printf('<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">%s</font>', nl2br($parameters['introduction']));
}
?>
			</td>
			<td width="91" style="line-height: 0;">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/header_right.jpg" width="91" height="50" border="0" />
			</td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="4">
					<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
						$header_style = 'header_b_red';
					}else{
						$header_style = 'header_b_green';
					}

					printf('<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/%s.jpg" width="600" height="10" border="0" />',CatalyzEmailing::getApplicationUrl(), $header_style);
					?>
			</td>
		</tr>
	</table>


	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="485" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
					<!-- partie 1 -->

					<tr style="line-height: 0;"><!-- begin -->
						<td colspan="11">
							<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
								$tab_style = 'tab_1_t_red';
							}else{
								$tab_style = 'tab_1_t_green';
							}

							printf('<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/%s.gif" width="485" height="4" border="0" />',CatalyzEmailing::getApplicationUrl(), $tab_style);
							?>
						</td>
					</tr>

						<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
							$bg_color = '#872434';
							$border_color = '#611a25';
						}else{
							$bg_color = '#005C56';
							$border_color = '#00403c';
						}
						?>

					<tr valign="middle" bgcolor="<?php echo $bg_color ?>">
						<td  style="line-height: 0;" width="1" bgcolor="<?php echo $border_color ?>">
							<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
							$tab_style = 'tab_1_t_border_red';
						}else{
							$tab_style = 'tab_1_t_border_green';
						}

						printf('<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/%s.gif" width="1" height="4" border="0" />',CatalyzEmailing::getApplicationUrl(), $tab_style);
						?>
						</td>
						<td width="160">
							<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								Intitulé
							</font>
						</td>
						<td width="40">
							<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								Durée
							</font>
						</td>
						<td width="70">
							<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								Coût HT/p.
							</font>
						</td>
						<td width="75">
							<?php if (!empty($parameters['periode_1'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								%s
							</font>', htmlentities($parameters['periode_1'], ENT_COMPAT, 'UTF-8'));
							}
							?>

						</td>
						<td width="75">
							<?php if (!empty($parameters['periode_2'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								%s
							</font>', htmlentities($parameters['periode_2'], ENT_COMPAT, 'UTF-8'));
							}
							?>
						</td>
						<td  width="75">
							<?php if (!empty($parameters['periode_3'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
								%s
							</font>', htmlentities($parameters['periode_3'], ENT_COMPAT, 'UTF-8'));
							}
							?>
						</td>
						<td width="10" align="right"  style="line-height: 0;">
						<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
							$tab_style = 'tab_1_r_t_1_red';
						}else{
							$tab_style = 'tab_1_r_t_1_green';
						}

						printf('<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/%s.gif" width="10" height="32" border="0" />',CatalyzEmailing::getApplicationUrl(), $tab_style);
						?>

						</td>
						<td bgcolor="#998f86" colspan="2" width="6" align="right" style="line-height: 0;">
							<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
								$tab_style = 'tab_1_r_t_2_red';
							}else{
								$tab_style = 'tab_1_r_t_2_green';
							}

							printf('<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/%s.gif" width="6" height="32" border="0" />',CatalyzEmailing::getApplicationUrl(), $tab_style);
							?>
						</td>
					</tr>

					<?php $tabTrigger = 0; ?>

					<?php
$colorMapping = array();
$colorMapping['administratif'] = array('cccccc', '999999');
$colorMapping['management'] = array('cccccc', '999999');
$colorMapping['qse'] = array('cccccc', '999999');
$colorMapping['technique'] = array('cccccc', '999999');
$colorMapping['strategie'] = array('cccccc', '999999');
$colorMapping['gestion'] = array('cccccc', '999999');

$colorMapping['gestion_competence']= array('cccccc', '999999');
$colorMapping['management_hommes']= array('cccccc', '999999');
$colorMapping['gestion_projet']= array('cccccc', '999999');
$colorMapping['gestion_sociale']= array('cccccc', '999999');
$colorMapping['communication']= array('cccccc', '999999');
$colorMapping['management_qualite']= array('cccccc', '999999');
$colorMapping['accueil']= array('cccccc', '999999');
$colorMapping['pratiques']= array('cccccc', '999999');


					$captions =array();
					$captions['administratif'] = ' Gestion des compétences';
					$captions['management'] = 'Stratégie';
					$captions['qse'] = 'Management';
					$captions['technique'] = 'Compétences transverses';
					$captions['strategie'] = 'Compétences métiers';
					//$captions['gestion'] = 'Gestion des compétences';

					$captions['gestion_competence']='Gestion des compétences';
					$captions['management_hommes']='Management des hommes et des équipes';
					$captions['gestion_projet']='Gestion de projets, methodes et organisation';
					$captions['gestion_sociale']='Gestion sociale et juridique des ressources humaines';
					$captions['communication']='Communication et efficacité personnelle';
					$captions['management_qualite']='Management de la qualité, de la sécurité et de la santé';
					$captions['accueil']='Accueil et secrétariat';
					$captions['pratiques']='Pratiques professionnelles';

					$colorSection =array();
					$colorSection['administratif'] = '457e81';
					$colorSection['management'] = '625bc4';
					$colorSection['qse'] = '005058';
					$colorSection['technique'] = '872434';
					$colorSection['strategie'] = '8fd400';
					$colorSection['gestion'] = '005195';

					$colorSection['gestion_competence']= '20505F';
					$colorSection['management_hommes']= '8FD400';
					$colorSection['gestion_projet']= '625BC4';
					$colorSection['gestion_sociale']= '872434';
					$colorSection['communication']= 'AB7F66';
					$colorSection['management_qualite']= '00AED9';
					$colorSection['accueil']= '005ABB';
					$colorSection['pratiques']= '006544';



?>

					<?php foreach (array(1, 2, 3, 4, 5, 6) as $ligne_id):
$formations = sprintf('ligne_%s_formations', $ligne_id);

?>

					<?php if (!empty($parameters[$formations])):
    $sectionElement = sprintf('ligne_%s_style', $ligne_id);
$section = $parameters[$sectionElement];

?>

					<tr valign="middle" bgcolor="#ffffff"><!-- ligne sep -->
						<td width="2" bgcolor="#ffffff">
							<!--<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_b_border.gif" width="2" height="2" border="0" />-->
						</td>
						<td valign="top" colspan="8" width="477">
							<table align="center" width="477" cellpadding="0" cellspacing="0" border="0">
								<?php if ($ligne_id >1) {
									printf('<tr><td colspan="7" bgcolor="#%s" style="line-height:2px; height: 2px;">&nbsp;</td></tr>', $colorSection[$section]);
								} ?>


								<tr valign="middle" bgcolor="#ffffff">
									<td width="3">&nbsp;</td>
									<td colspan="6"><font face="Arial" style="line-height: 20px; font-size: 18px;text-align:center;text-transform: uppercase; " size="2" color="<?php echo $colorSection[$section]; ?>">
<b><?php echo $captions[$section]; ?></b>
									</font></td>

									<td width="10">
											&nbsp;
									</td>
								</tr>
								<?php foreach ($parameters[$formations] as $sub_element):?>
								<tr> <!-- ligne sep -->
									<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_b_c.gif" width="3" height="2" border="0" /></td>
								</tr>

								<?php printf('<tr valign="middle" bgcolor="#%s">', $colorMapping[$section][$tabTrigger % 2 == 0]) ?>
									<td width="3">&nbsp;</td>
									<td width="160">
										<?php if (!empty($sub_element['caption'])) {
											echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">';
											if (!empty($sub_element['link'])) {
												printf('<a style="color: #000000;" href="%s">', $sub_element['link']);
											}

											printf('%s', htmlentities(nl2br($sub_element['caption']), ENT_COMPAT, 'UTF-8'));

											if (!empty($sub_element['link'])) {
												echo '</a>';
											}

											echo '</font>';


}
?>
									</td>
									<td width="40">
										<?php if (!empty($sub_element['time'])) {
    printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">
											%s
										</font>', htmlentities($sub_element['time'], ENT_COMPAT, 'UTF-8'));
}
?>
									</td>
									<td width="70" align="center">
										<?php if (!empty($sub_element['price'])) {
    printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">
											%s
										</font>', htmlentities($sub_element['price'], ENT_COMPAT, 'UTF-8'));
}
?>
									</td>
									<td width="75">
							<?php if (!empty($sub_element['period_1'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">
								%s
							</font>', htmlentities($sub_element['period_1'], ENT_COMPAT, 'UTF-8'));
							}
							?>

						</td>
						<td width="75">
							<?php if (!empty($sub_element['period_2'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">
								%s
							</font>', htmlentities($sub_element['period_2'], ENT_COMPAT, 'UTF-8'));
							}
							?>
						</td>
						<td  width="75">
							<?php if (!empty($sub_element['period_3'])) {
								printf('<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#000">
								%s
							</font>', htmlentities($sub_element['period_3'], ENT_COMPAT, 'UTF-8'));
							}
							?>
						</td>
									<td width="10">
											&nbsp;
									</td>
								</tr>
							<?php
$tabTrigger++;
endforeach ?>
							</table>
						</td>

						<td width="5">
							<!--<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_b_c.gif" width="5" height="2" border="0" />-->
						</td>
						<td width="1" bgcolor="#ffffff">
							<!--<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_b_border.gif" width="1" height="2" border="0" />-->
						</td>
					</tr>

					<tr>
						<td colspan="11" bgcolor="#ffffff">
							<!--<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_c_sep.gif" width="485" height="8" border="0" />-->
							&nbsp;
						</td>
					</tr>
					<?php
endif
?>


					<?php endforeach ?>


<!--
					<tr>
						<td colspan="11">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/tab_1_b.jpg" width="485" height="12" border="0" />
						</td>
					</tr>

					<tr>
						<td colspan="11">
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="485" height="15" border="0" />
						</td>
					</tr>-->
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>

		<!-- button holder -->
		<tr>
			<td width="43">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="43" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td>
				<table width="485" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="middle">
						<td width="227" align="center">
							<?php if (!empty($parameters['link_contact'])) {
								echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center;" size="2" color="#645e59">Pour toute demande d’information :
							</font>';
							}
							?>

						</td>
						<td width="31"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" /></td>
						<td width="227" align="center">
							<?php if (!empty($parameters['link_catalog'])) {
    echo '<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center;" size="2" color="#645e59">Consultez le catalogue complet :
							</font>';
}
?>

						</td>
					</tr>
					<tr valign="middle">
						<td colspan="3" >
							<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" />
						</td>
					</tr>
					<tr valign="middle">
						<td width="227" align="center">
							<?php if (!empty($parameters['link_contact'])) {
								printf('<a href="mailto:%s">
								<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/button_1.gif" width="227" height="26" border="0" />
							</a>',$parameters['link_contact'],CatalyzEmailing::getApplicationUrl());
							}
							?>

						</td>
						<td width="31"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="15" border="0" /></td>
						<td width="227" align="center">
							<?php if (!empty($parameters['link_catalog'])) {
    printf('<a href="%s">
								<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/button_2.jpg" width="227" height="25" border="0" />
							</a>', $parameters['link_catalog'],CatalyzEmailing::getApplicationUrl());
}
?>

						</td>
					</tr>
				</table>
			</td>
			<td width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="12" height="5" border="0" />
			</td>
			<td width="1" bgcolor="#777069">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/border.gif" width="1" height="5" border="0" />
			</td>
			<td width="40">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="40" height="5" border="0" />
			</td>
		</tr>
		<!-- end button holder -->

		<tr style="line-height: 0;">
			<td colspan="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/middle_b.gif" width="600" height="43" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="2">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="40" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 28px; font-size: 24px;text-align:center;font-weight: bold; " size="2" color="#635f59">LES AVANTAGES DE LA FORMATION EN INTER
				</font>
			</td>
			<td width="105">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="5" border="0" />
			</td>
		</tr>
		<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="10" border="0" /></td></tr> <!-- SEP -->




		<?php
if (!empty($parameters['atout'])):
    $cnt = count($parameters['atout']);
$cpt = 1;
if ($cnt > 0):
    foreach ($parameters['atout'] as $bottomElement):
    ?>
			<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="10" border="0" /></td></tr>
			<tr valign="top">
				<td width="63">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="63" height="5" border="0" />
				</td>
				<td width="43">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="1" height="14" border="0" />
					<br/>
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/bottom_quote.gif" width="43" height="33" border="0" />
				</td>
				<td>
					<?php
					$renderer = new CatalyzEmailRenderer('Arial','#635f59','line-height: 12px; font-size: 12px;');
    			$renderer->renderWysiwyg($bottomElement['content'], '#635f59');
					 ?>
				</td>
				<td width="105">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="5" border="0" />
				</td>
			</tr>
			<?php if ($cpt != $cnt): ?>
			<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="15" border="0" /></td></tr>
			<tr>
				<td colspan="2">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="63" height="5" border="0" />
				</td>
				<td width="404">
					<?php if (empty($parameters['style']) || $parameters['style'] == 1) {
        $sep_style = 'bottom_sep_red';
    } else {
        $sep_style = 'bottom_sep_green';
    }
    printf('<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/%s.gif" width="404" height="3" border="0" />', $sep_style);

    ?>

				</td>
				<td width="105">
					<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="5" border="0" />
				</td>
			</tr>
			<?php
    endif;
    $cpt++;
    endforeach;
    endif;
    endif;

    ?>

		<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="10" border="0" /></td></tr>


		<tr valign="top">
			<td width="63">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="63" height="5" border="0" />
			</td>
			<td colspan="2">
				<font face="Arial" style="line-height: 12px; font-size: 12px;text-align:center; " size="2" color="#635f59">Pour toute demande d’information :
				</font>
			</td>
			<td width="105">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="5" border="0" />
			</td>
		</tr>
		<tr><td colspan="4"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_white.gif" width="105" height="5" border="0" /></td></tr> <!-- SEP -->
		<tr valign="top" align="center">
			<td colspan="4">
				<?php if (!empty($parameters['link_contact'])) {
					printf('<a href="mailto:%s">
					<img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/button_1.gif" width="227" height="26" border="0" />
							</a>',$parameters['link_contact'],CatalyzEmailing::getApplicationUrl());
				}
				?>

				<?php
				 if (!empty($parameters['link_commande'])) {
        printf('<a href="%s"><img alt="" src="%s/asfoPlugin/images/asfoCalendrier2/button_04.gif" width="234" height="32" border="0" /></a>', CatalyzEmailing::makeAbsoluteLink($parameters['link_commande']),CatalyzEmailing::getApplicationUrl());
    }
    ?>

			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#998f86" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/footer_t.gif" width="600" height="12" border="0" /></td>
		</tr>
		<tr style="line-height: 0;">
			<td colspan="7"><img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="11" height="10" border="0" /></td>
		</tr>
		<tr style="line-height: 0;">
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="5">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="8">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="236">
				<?php if(!empty($parameters['picture_1'])){
					printf('<img alt="" src="%s%s" border="0" />',CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['picture_1'], 236, 145));
				} ?>
			<td bgcolor="#5c5046" width="12">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="12" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" width="236">
				<?php if(!empty($parameters['picture_2'])){
					printf('<img alt="" src="%s%s" border="0" />',CatalyzEmailing::getApplicationUrl(), thumbnail_path($parameters['picture_2'], 236, 145));
				} ?>
			</td>
			<td bgcolor="#5c5046" width="7">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="7" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td width="51">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="51" height="5" border="0" />
			</td>
			<td bgcolor="#5c5046" colspan="5">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="8" height="5" border="0" />
			</td>
			<td width="50">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_grey.gif" width="50" height="5" border="0" />
			</td>
		</tr>
	</table>

	<table width="600" bgcolor="#5c5046" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="58" height="10" border="0" />
			</td>
		</tr>
		<tr>
			<td width="58">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="58" height="5" border="0" />
			</td>
			<td align="center">
				<font face="Arial" style="line-height: 14px; font-size: 12px;text-align:center; " size="2" color="#FFFFFF">
				ASFO GRAND SUD - ZI LE PALAYS - PERISUD 2 - BP94415 - 13 rue André VILLET<br/>
31405 TOULOUSE Cedex 4 - <a style="color:#FFFFFF;" href="http://www.asfograndsud.com">www.asfograndsud.com</a> - <a style="color:#FFFFFF;" href="mailto:contact@asfograndsud.com">contact@asfograndsud.com</a> <br/>
Tel : 05 62 25 50 00 - Fax : 05 62 25 50 45
				</font>
			</td>
			<td width="56">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="56" height="5" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<img alt="" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/asfoPlugin/images/asfoCalendrier2/sep_dark.gif" width="58" height="15" border="0" />
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
