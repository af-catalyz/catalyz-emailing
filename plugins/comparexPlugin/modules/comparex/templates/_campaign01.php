<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head><?php
$parameters = unEscape($parameters);
// var_dump($parameters);

?><body>
	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="702">

	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       <tr valign="top">
       		<td width="702" height="26" align="center">
       			<font face="Verdana, Arial, sans-serif" style="line-height:13px; font-size:9px;text-align:center; color:#333333">Pour visualiser cet email dans votre navigateur, <a style="color:#333333;" href="#VIEW_ONLINE#" target="_blank">cliquez ici.</a></font>
            </td>
       </tr>
	</table>
		<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       		<tr valign="top">
       			<td style="line-height:0; font-size: 0;" width="702" height="198" align="center" bgcolor="#171613">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?><?php echo $parameters['header'] ?>" width="702" height="198" alt="" border="0" />
           		 </td>
       		</tr>
       	</table>
       		<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
	       		<tr valign="top">
	       			<td style="line-height:0; font-size: 0;" bgcolor="#171613">
	       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark.jpg" width="30" height="1" alt="" border="0" />
	           		 </td>
	           		<td width="428" bgcolor="#171613">

						<?php
       					if(isset($parameters['edito'])){
       						$renderer = new CatalyzEmailRenderer('Arial, sans-serif', '#FFFFFF', 'text-align:left; line-height:16px; font-size:11px; color:#FFFFFF');
       						$renderer->addRule('titre-blanc', 'Arial, sans-serif', 'text-align:left; line-height:18px; font-size:14px; font-weight:bold; color:#FFFFFF', '#FFFFFF');
       						$renderer->addRule('titre-rouge', 'Arial, sans-serif', 'text-align:left; line-height:24px; font-size:18px; font-weight:bold; color:#FF0033', '#FF0033', 4);
       						echo $renderer->renderWysiwyg(html_entity_decode($parameters['edito']), '#FFFFFF');
       					}

?>
	           		 </td>
	           		 <td style="line-height:0; font-size: 0;" bgcolor="#171613">
	       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark.jpg" width="30" height="1" alt="" border="0" />
	           		 </td>
	           		  <td style="line-height:0; font-size: 0;" bgcolor="#171613" width="198">
	           		  <?php if (!empty($parameters['video_url'])): ?>
	       				<a style="line-height:0; font-size: 0;" target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters['video_url']) ?>"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/video.png" width="198" height="123" alt="" border="0" /></a>
	       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark.jpg" width="198" height="4" alt="" border="0" />
	       				<?php endif ?>
	           		 </td>
	           		 <td style="line-height:0; font-size: 0;" bgcolor="#171613">
	       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark.jpg" width="16" height="1" alt="" border="0" />
	           		 </td>
	       		</tr>
       		</table>


<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
	       		<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#cc0033">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_red.jpg" width="3" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="23" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="23" alt="" border="0" />
	       		</td>
	           		<td width="428" bgcolor="#FFFFFF">
						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="428" height="1" alt="" border="0" />
	           		 </td>
	           		 <td style="line-height:0; font-size: 0;" bgcolor="#FFFFFF">
	       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="30" height="1" alt="" border="0" />
	           		 </td>
	           		  <td style="line-height:0; font-size: 0;" bgcolor="#FFFFFF">
	           		  <?php if (!empty($parameters['video_promo_button'])): ?>
	       				<a style="line-height:0; font-size: 0;" target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters['video_promo_url']); ?>"><img src="<?php echo CatalyzEmailing::getApplicationUrl() . $parameters['video_promo_button'] ?>" width="198" height="33" alt="" border="0" /></a>
	       				<?php endif ?>
	           		 </td>

	           	<td style="line-height:0; font-size: 0;" width="13" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#cc0033">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_red.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       		</tr>
       		</table>




       	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">

	       	<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#cc0033">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_red.jpg" width="3" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="23" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="23" alt="" border="0" />
	       		</td>
	       		<td width="660" bgcolor="#FFFFFF">
	       			<table width="660" align="center" cellspacing="0" cellpadding="0" border="0">
<?php if (isset($parameters['articles']) && is_array($parameters['articles'])):
        foreach($parameters['articles'] as $article):
        ?>
	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" width="46" bgcolor="#FFFFFF">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bullet_1.jpg" width="32" height="45" alt="" border="0" />
	       					</td>
	       					<td width="400" bgcolor="#FFFFFF">
	       						<font face="Arial, sans-serif" style="text-align:left; line-height:19px; font-size:15px; font-weight:bold; color:#ff0033">
	       						<?php echo nl2br(htmlentities(utf8_decode($article['title']))); ?>
								</font>
	       					</td>
	       					<td style="line-height:0; font-size: 0;" width="216" bgcolor="#FFFFFF" colspan="2">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       				</tr>
	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" width="35">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       					<td style="line-height:0; font-size: 0;" width="660" colspan="3">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/sep.gif" width="625" height="9" alt="" border="0" />
	       					</td>
	       				</tr>
	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" width="46" bgcolor="#FFFFFF">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       					<td width="400" bgcolor="#FFFFFF">
	       					<?php
    // var_dump($article);
    if (!empty($article['content'])) {
        $renderer = new CatalyzEmailRenderer('Arial, sans-serif', '#666666', 'text-align:left; line-height:15px; font-size:11px; color:#666666');
        $renderer->addRule('texte-noir', 'Arial, sans-serif', 'text-align:left; line-height:15px; font-size:11px; font-weight:bold; color:#000000', '#000000');
        $renderer->addRule('texte-rouge', 'Arial, sans-serif', 'text-align:left; line-height:15px; font-size:11px; font-weight:bold; color:#ff0000', '#ff0000');

        echo $renderer->renderWysiwyg(html_entity_decode($article['content']), '#666666');
    }

    ?>

	       					</td>
	       					<td style="line-height:0; font-size: 0;" width="17" bgcolor="#FFFFFF">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       					<td width="197">
	       					<?php if (!empty($article['button_text'])): ?>
	       						<table width="197" align="center" cellspacing="0" cellpadding="0" border="0">
	       							<tr valign="bottom">
	   			       					<td style="line-height:0; font-size: 0;" width="197" height="10" colspan="3">
	       									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/red_box_top.jpg" width="197" height="10" alt="" border="0" />
	       								</td>
	       							</tr>
	       							<tr valign="middle">
	   			       					<td style="line-height:0; font-size: 0;">
	       									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/red_box_left.jpg" width="13" height="34" alt="" border="0" />
	       								</td>
	       								<td width="151" bgcolor="#ff3333" align="center">
	       									<font face="Arial, sans-serif" style="text-decoration:underline; text-transform:uppercase; text-align:center; line-height:11px; font-size:9px; font-weight:bold; color:#FFFFFF"><a target="_blank" style="color:#FFFFFF; text-decoration:underline" href="<?php echo czWidgetFormLink::displayLink($article['button_url']) ?>"><?php echo nl2br(htmlentities(utf8_decode($article['button_text']))) ?></a></font>
	       								</td>
	       		       					<td style="line-height:0; font-size: 0;">
	       									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/red_box_right.jpg" width="33" height="34" alt="" border="0" />
	       								</td>
	       							</tr>
	       							<tr valign="top">
	   			       					<td style="line-height:0; font-size: 0;" width="197" height="8" colspan="3">
	       									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/red_box_bottom.jpg" width="197" height="8" alt="" border="0" />
	       								</td>
	       							</tr>

	       						</table>
	       						<?php endif; ?>
	       					</td>
	       				</tr>
	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" height="20" width="660" colspan="4">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       				</tr>
	       				<?php endforeach; ?>
	       				<?php endif; ?>

	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" height="20" width="660" colspan="4">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       				</tr>

	       				<tr valign="top">
	       					<td style="line-height:0; font-size: 0;" width="35" bgcolor="#FFFFFF">
	       						<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       					</td>
	       					<td width="625" bgcolor="#FFFFFF" colspan="3">
	       							<?php
    if (!empty($parameters['bottom_text'])) {
        $renderer = new CatalyzEmailRenderer('Arial, sans-serif', '#333333', 'text-align:left; line-height:15px; font-size:11px; color:#333333');
        echo $renderer->renderWysiwyg(html_entity_decode($parameters['bottom_text']), '#333333');
    }

    ?>
	       					</td>
	       				</tr>
	       			</table>
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="13" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#cc0033">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_red.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       	</tr>
	    </table>
	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       <tr valign="bottom">
	       	<td style="line-height:0; font-size: 0;" colspan="3">
	       		<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/footer_top.jpg" width="702" height="37" alt="" border="0" />
	       	</td>
       </tr>
      <tr valign="top">
				<td style="line-height:0; font-size: 0;" bgcolor="#990000">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bullet_2.jpg" width="59" height="81" alt="" border="0" />
					</td>
					<td width="389" bgcolor="#990000" align="left" valign="top">
						<table width="389" cellspacing="0" cellpadding="0" border="0">
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img align="middle" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark_red.jpg" width="389" height="5" alt="" border="0" /><br />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark_red.jpg" width="378" height="4" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td>
			       					<font face="Arial, sans-serif" style=" text-align:left; line-height:11px; font-size:11px; color:#FFFFFF">
			       					<?php
    if (!empty($parameters['footer'])) {
        echo nl2br(htmlentities(utf8_decode($parameters['footer'])));
    }

    ?>
									</font>
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_dark_red.jpg" width="378" height="4" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">

<font face="Arial, sans-serif" style=" text-align:left; line-height:11px; font-size:11px; color:#FFFFFF">
	<?php if (!empty($parameters['footer_email'])): ?><a style="line-height:11px; font-size:11px; color:#FFFFFF" href="mailto:<?php echo $parameters['footer_email'] ?>"><?php echo $parameters['footer_email'] ?></a>
	<?php endif; ?>• <?php if (!empty($parameters['footer_url'])): ?><a target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters['footer_url']) ?>" style="color:#FFFFFF;"><?php echo $parameters['footer_url'] ?></a><?php endif; ?></font>
								</td>
								</tr>
			</table>
					</td>
					<td style="line-height:0; font-size: 0;">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/footer_right.jpg" width="254" height="81" alt="" border="0" />
      			 	</td>
				</tr>
				  <tr valign="top">
					<td style="line-height:0; font-size: 0;" colspan="3">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/footer_bottom.jpg" width="702" height="25" alt="" border="0" />
					</td>
				</tr>

	 </table>
<table width="702" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="561" height="20" align="center">
				<font face="Verdana, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#333333">Si vous ne souhaitez plus recevoir nos lettres d’informations, vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#333333;">cliquant ici.</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17" height="5">
				<img style="line-height:0; font-size: 0;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>
</td>
</tr>
</table>
</body>
</html>