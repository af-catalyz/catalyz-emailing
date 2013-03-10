<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
<body alink="#000000" vlink="#000000" link="#000000">
	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       <tr valign="top">
       		<td width="702" height="26" align="center">
       			<font face="Verdana, Arial, sans-serif" style="line-height:13px; font-size:9px;text-align:center; color:#333333">Pour visualiser cet email dans votre navigateur, <a style="color:#333333;" href="#VIEW_ONLINE#" target="_blank">cliquez ici.</a></font>
            </td>
       </tr>
	</table>

		<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       		<tr valign="top">
       			<td style="line-height:0; font-size: 0;" width="702" colspan="4">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/header_top.jpg" width="702" height="174" alt="" border="0" />
           	</td>
       		</tr>
       		<tr valign="bottom">
       			<td style="line-height:0; font-size: 0;" width="30" bgcolor="#0F0E0A">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_dark.jpg" width="30" height="1" alt="" border="0" />
           	</td>
           	<td width="452" bgcolor="#0F0E0A">
           		<?php if (!empty($parameters["edito"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#FFFFFF", "line-height:11px; font-size:10px; color:#FFFFFF"); echo $renderer->renderWysiwyg(utf8_decode($parameters["edito"]), "#FFFFFF"); } ?>
	           </td>
	           <td style="line-height:0; font-size: 0;" width="207" bgcolor="#0F0E0A">
       				<?php if(!empty($parameters["video_link"])){ ?>
								<a target="_blank" style="text-decoration:none; color:#FFFFFF" href="<?php echo czWidgetFormLink::displayLink($parameters["video_link"]); ?>">
	       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/header_video.jpg" width="207" height="149" alt="" border="0" />
	       				</a>
							<?php }else{
							printf('<img src="%s/comparexPlugin/images/autodesk/header_black.png" width="207" height="149" alt="" border="0" />',  CatalyzEmailing::getApplicationUrl());
							} ?>
           	 </td>
           	 <td style="line-height:0; font-size: 0;" width="13" bgcolor="#0F0E0A">
       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_dark.jpg" width="13" height="1" alt="" border="0" />
           	 </td>
       		</tr>
       		<tr valign="top" bgcolor="#FFFFFF">
       			<td style="line-height:0; font-size: 0;" width="30">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/header_bot_left.jpg" width="30" height="49" alt="" border="0" />
           	</td>
           	<td style="line-height:0; font-size: 0;" width="452">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/header_bot_center.jpg" width="452" height="44" alt="" border="0" />
           	</td>
	          <td width="207">
	          	<?php if(!empty($parameters["video_link"])){ ?>
								<a target="_blank" style="text-decoration:none; color:#FFFFFF" href="<?php echo czWidgetFormLink::displayLink($parameters["video_link"]); ?>">
	       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/btn5.jpg" width="207" height="40" alt="" border="0" />
	       				</a>
							<?php }else{
								printf('<img src="%s/comparexPlugin/images/autodesk/btn5_blank.png" width="207" height="44" alt="" border="0" />',  CatalyzEmailing::getApplicationUrl());
							} ?>


           	</td>
           	<td style="line-height:0; font-size: 0;" width="13">
       				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/header_bot_right.jpg" width="13" height="49" alt="" border="0" />
           	</td>
       		</tr>
       	</table>
       	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#FFFFFF">
	       	<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="3" height="10" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="10" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="666">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="666" height="10" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="10" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="1" height="10" alt="" border="0" />
	       		</td>
	       	</tr>
	    </table>

       	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#FFFFFF">
	       	<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="3" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="1" alt="" border="0" />
	       		</td>
	       		<td width="666">
	       			<font face="Arial, sans-serif" style="line-height:24px; font-size:33px; color:#cc0033">
	       				<?php echo $parameters["title"]; ?><br />
							</font>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/se_w2.gif" width="666" height="15" alt="" border="0" />
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/sep_content.jpg" width="666" height="5" alt="" border="0" /><br /><br />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       	</tr>
	    </table>

	    <table width="702" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#FFFFFF">
	       	<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="3" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="28">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="28" height="1" alt="" border="0" />
	       		</td>
	       		<td width="269">
							<table width="269" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td width="45">
										<?php if(isset($parameters["left_top_picture"])){ ?>
											<img src="<?php echo $parameters["left_top_picture"]; ?>" width="45" height="58" alt="" border="0"/>
										<?php } ?>

									</td>
									<td style="line-height:0; font-size: 0;" width="12">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="12" height="1" alt="" border="0" />
									</td>
									<td width="212">
										<font face="Arial, sans-serif" style="font-style:italic; line-height:12px; font-size:11px; color:#666666">
										<?php echo nl2br(htmlentities(utf8_decode($parameters["left_top_content"]))); ?>
										</font>
									</td>
								</tr>
							</table>

							<?php if (!empty($parameters["left_bottom_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height:12px; font-size:11px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["left_bottom_content"]), "#666666"); } ?>
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="90">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="90" height="1" alt="" border="0" />
	       		</td>
	       		<td width="282">
	       			<?php if(isset($parameters["right_top_picture"])){ ?>
								<img src="<?php echo $parameters["right_top_picture"]; ?>" width="235" height="84" alt="" border="0"/>
							<?php } ?>

	       			<?php if (!empty($parameters["right_bottom_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height:12px; font-size:11px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["right_bottom_content"]), "#666666"); } ?>
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="27" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="27" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       	</tr>
	    </table>

	    <table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
	       	<tr valign="top">
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="3" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="1" alt="" border="0" />
	       		</td>
	       		<td width="666" bgcolor="#FFFFFF">
	       			<?php if (!empty($parameters["bottom_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height:12px; font-size:11px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["bottom_content"]), "#666666"); } ?>
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="15" bgcolor="#FFFFFF">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="15" height="1" alt="" border="0" />
	       		</td>
	       		<td style="line-height:0; font-size: 0;" width="3" bgcolor="#EF0635">
	       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_red.jpg" width="1" height="1" alt="" border="0" />
	       		</td>
	       	</tr>
	    </table>

	<table width="702" align="center" cellspacing="0" cellpadding="0" border="0">
       <tr valign="bottom">
	       	<td style="line-height:0; font-size: 0;" colspan="3">
	       		<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/footer_top.jpg" width="702" height="37" alt="" border="0" />
	       	</td>
       </tr>
      <tr valign="top">
				<td style="line-height:0; font-size: 0;" bgcolor="#EE0031">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bullet_2.jpg" width="59" height="81" alt="" border="0" />
					</td>
					<td width="389" bgcolor="#EE0031" align="left" valign="top">
						<table width="389" cellspacing="0" cellpadding="0" border="0">
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img align="middle" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_dark_red.jpg" width="389" height="3" alt="" border="0" /><br />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_dark_red.jpg" width="378" height="3" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td>
			       					<font face="Arial, sans-serif" style=" text-align:left; line-height:11px; font-size:11px; color:#FFFFFF">
			       						<?php echo nl2br(htmlentities(utf8_decode($parameters["contact"]))); ?>
											</font>
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
									<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_dark_red.jpg" width="378" height="3" alt="" border="0" />
								</td>
							</tr>
							<tr valign="top">
								<td style="line-height:0; font-size: 0;">
								<font face="Arial, sans-serif" style=" text-align:left; line-height:11px; font-size:11px; color:#FFFFFF">
									<?php
									$links =array();

									if(!empty($parameters["email"])){
										$links[] = sprintf('<a style="line-height:11px; font-size:11px; color:#FFFFFF" href="mailto:%1$s">%1$s</a>', $parameters["email"]);
									}
									if(!empty($parameters["website"])){
										$links[] = sprintf('<a target="_blank" href="%1$s" style="color:#FFFFFF;">%1$s</a>', czWidgetFormLink::displayLink($parameters["website"]));
									}

									echo implode('&nbsp;&bull;&nbsp;', $links);

										?>
									</font>
								</td>
								</tr>
				</table>
					</td>
					<td style="line-height:0; font-size: 0;">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/footer_right.jpg" width="254" height="81" alt="" border="0" />
      			 	</td>
				</tr>
				  <tr valign="top">
					<td style="line-height:0; font-size: 0;" colspan="3">
       					<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/footer_bottom.jpg" width="702" height="25" alt="" border="0" />
					</td>
				</tr>
	 </table>
	<table width="702" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="561" height="20" align="center">
				<font face="Verdana, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#333333">Si vous ne souhaitez plus recevoir nos lettres d'informations, vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#333333;">cliquant ici.</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="17" height="5">
				<img style="line-height:0; font-size: 0;" src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/comparexPlugin/images/autodesk/bg_white.jpg" width="1" height="1" alt="" border="0" />
			</td>
		</tr>
	</table>

</body>
</html>