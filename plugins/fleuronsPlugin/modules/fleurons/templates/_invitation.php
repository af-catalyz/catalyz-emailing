<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
<body alink="#000000" vlink="#000000" link="#000000">
	<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
       <tr valign="top">
       		<td width="600" height="26" align="center">
       			<font face="Verdana, Arial, sans-serif" style="line-height:13px; font-size:9px;text-align:center; color:#333333">Pour visualiser cet email dans votre navigateur, <a style="color:#333333;" href="#VIEW_ONLINE#" target="_blank">cliquez ici.</a></font>
            </td>
       </tr>
	</table>

	<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3f3033">
		<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="209">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/top_left.jpg" width="209" height="132" alt="" border="0" />
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="181">
   				<?php if(isset($parameters["logo"])){ ?><a href="<?php echo czWidgetFormLink::displayLink($parameters["logo"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/top_logo.jpg" width="181" height="132" alt="" border="0" /></a><?php } ?>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="210">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/top_right.jpg" width="210" height="132" alt="" border="0" />
      		 </td>
   		</tr>
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="600" colspan="3">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/top_bot.jpg" width="600" height="94" alt="" border="0" />
      		 </td>
   		</tr>
     </table>

	<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3f3033">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="226">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg.gif" width="226" height="73" alt="" border="0" />
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="153">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/titre.jpg" width="153" height="73" alt="" border="0" />
      		 </td>
       		<td width="221" align="center">
       			<font face="Arial" style="font-style:italic; line-height:16px; font-size:12px;" size="2" color="#ffffff">
   					<?php if(isset($parameters["date"])){ ?><?php echo $parameters["date"]; ?><?php } ?>
   				</font>
      		 </td>
   		</tr>
     </table>

     <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3f3033">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="35">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg.gif" width="35" height="1" alt="" border="0" />
      		 </td>
       		<td width="527">
       			<?php if (!empty($parameters["top_letter_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "", "line-height:16px; font-size:12px; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["top_letter_content"]), ""); } ?>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="38">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg.gif" width="38" height="1" alt="" border="0" />
      		 </td>
   		</tr>
     </table>

     <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="600" colspan="2">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/box_top.jpg" width="600" height="19" alt="" border="0" />
      		 </td>
      	</tr>
      	<tr valign="top">
       		<td width="577" height="299">

       			<table width="577" cellspacing="0" cellpadding="0" border="0">
       				<tr valign="top">
			       		<td style="line-height:0; font-size: 0;" width="205">

			       			<table width="205" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
			       				<tr valign="top">
						       		<td style="line-height:0; font-size: 0;" width="205" colspan="7">
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="1" height="40" alt="" border="0" />
						      		 </td>
						      	</tr>
			       				<tr valign="top">
						       		<td style="line-height:0; font-size: 0;" width="46"><?php if(isset($parameters["picture1"])){ ?>
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/img1.jpg" width="46" height="224" alt="" border="0" />
						      		 <?php } ?></td>
						      		 <td style="line-height:0; font-size: 0;" width="7">
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="7" height="1" alt="" border="0" />
						      		 </td>
						      		 <td style="line-height:0; font-size: 0;" width="46">
						   				<?php if(isset($parameters["picture2"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/img2.jpg" width="46" height="224" alt="" border="0" />
						      		<?php } ?> </td>
						      		 <td style="line-height:0; font-size: 0;" width="7">
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="7" height="1" alt="" border="0" />
						      		 </td>
						      		 <td style="line-height:0; font-size: 0;" width="46">
						   				<?php if(isset($parameters["picture3"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/img3.jpg" width="46" height="224" alt="" border="0" />
						      		 </td>
						      		 <td style="line-height:0; font-size: 0;" width="7">
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="7" height="1" alt="" border="0" />
						      		<?php } ?> </td>
						      		 <td style="line-height:0; font-size: 0;" width="46">
						   				<?php if(isset($parameters["picture4"])){ ?><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/img4.jpg" width="46" height="224" alt="" border="0" />
						      		 <?php } ?></td>
						      	</tr>
						      	<tr valign="top">
						       		<td style="line-height:0; font-size: 0;" width="205" colspan="7">
						   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="1" height="35" alt="" border="0" />
						      		 </td>
						      	</tr>
						     </table>

			      		 </td>
			      		  <td style="line-height:0; font-size: 0;" width="19">
			   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="19" height="1" alt="" border="0" />
			      		 </td>
			      		  <td style="line-height:0; font-size: 0;" width="1">
			   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/sep_vertical.jpg" width="1" height="299" alt="" border="0" />
			      		 </td>
			      		  <td style="line-height:0; font-size: 0;" width="17">
			   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg_w.gif" width="17" height="1" alt="" border="0" />
			      		 </td>
			      		 <td width="335" height="299">

			   					<table width="335" cellspacing="0" cellpadding="0" border="0">
				       				<tr valign="top">
							       		<td width="252">
							       			<font face="Tahoma" style="font-weight:bold; line-height:24px; font-size:21px;" size="2" color="#3f3033">
							       				<br /><?php if(isset($parameters["title"])){ ?><?php echo $parameters["title"]; ?><?php } ?><br />

   											</font>
							       		</td>
							       		<td style="line-height:0; font-size: 0;" width="83">
							       			<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/stamp.jpg" width="83" height="95" alt="" border="0" />
							       		</td>
							       	</tr>
							      </table>
							  	<table width="335" cellspacing="0" cellpadding="0" border="0">
                                    <tr valign="top">
							       		<td width="335" height="203" valign="middle">
							       			<?php if (!empty($parameters["intro_card"])) { $renderer = new CatalyzEmailRenderer("Arial", "", "line-height:12px; font-size:12px; color:#3f3033"); echo $renderer->renderWysiwyg(utf8_decode($parameters["intro_card"]), ""); } ?>
				       			<?php if (isset($parameters["card"]) && is_array($parameters["card"])):?><?php foreach($parameters["card"] as $card): ?>

                                            <?php if(isset($card["event_name"])){ ?>
                                            <font face="Arial" style="font-weight:bold; line-height:12px; font-size:12px;" size="2" color="#3f3033">
							       				<?php echo $card["event_name"]; ?><br />
   											</font><?php } ?>
   											<?php if(isset($card["event_date"])){ ?><font face="Arial" style="font-style:italic; font-weight:bold; line-height:12px; font-size:12px;" size="2" color="#93c543">
							       				<?php echo $card["event_date"]; ?><br /><br />
   											</font><?php } ?>

   											</font>

                                      <?php endforeach;?><?php endif; ?><br /><br />  </td>
							       	</tr>
							    </table>
			      		 </td>
			      	</tr>
			     </table>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="23" bgcolor="#3f3033">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/box_right.jpg" width="23" height="315" alt="" border="0" />
      		 </td>
   		</tr>
   		<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="600" colspan="2">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/box_bottom.jpg" width="600" height="22" alt="" border="0" />
      		 </td>
      	</tr>
     </table>

     <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3f3033">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="87">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg.gif" width="87" height="1" alt="" border="0" />
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="235">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/signature.jpg" width="235" height="58" alt="" border="0" />
      		 </td>
       		<td width="250">
       			<?php if (!empty($parameters["signature"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "", "line-height:14px; font-size:12px; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["signature"]), ""); } ?></td>
      		 <td style="line-height:0; font-size: 0;" width="28">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bg.gif" width="28" height="1" alt="" border="0" />
      		 </td>
   		</tr>
	 </table>

	 <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3f3033">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="600" colspan="3">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/special_top.jpg" width="600" height="24" alt="" border="0" />
      		 </td>
   		</tr>
   		<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="130">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/special_left.jpg" width="130" height="24" alt="" border="0" />
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="340">
   				<?php if(isset($parameters["baseline"])){ ?><a target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters["baseline"]); ?>"><a href="#" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/special_logo.jpg" width="340" height="24" alt="" border="0" /></a><?php } ?>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="130">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/special_right.jpg" width="130" height="24" alt="" border="0" />
      		 </td>
   		</tr>
   		<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="600" colspan="3">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/special_bottom.jpg" width="600" height="42" alt="" border="0" />
      		 </td>
   		</tr>
   	</table>


     <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3E2F32">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="193">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/fb_left.gif" width="175" height="24" alt="" border="0" />
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="26">
   				<?php if(isset($parameters["fb_page"])){ ?><a target="_blank" href="<?php echo czWidgetFormLink::displayLink($parameters["fb_page"]); ?>"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/fb.jpg" width="26" height="24" alt="" border="0" /></a><?php } ?>
      		 </td>
       		<td width="229" height="24" align="center">
       			<font face="Arial" style="letter-spacing:0.15em; font-weight:bold; line-height:17px; font-size:10px;" size="2" color="#fefefe">
   					<?php if(isset($parameters["website"])){ ?><a target="_blank" href="http://<?php echo $parameters["website"]; ?>" style="text-decoration:none; color:#fefefe;"><?php echo $parameters["website"]; ?></a><?php } ?>
   				</font>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="162">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/fb_right.gif" width="162" height="24" alt="" border="0" />
      		 </td>
   		</tr>
     </table>

    <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#3E2F32">
       	<tr valign="top">
       		<td style="line-height:0; font-size: 0;" width="71">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bottom_left.jpg" width="71" height="75" alt="" border="0" />
      		 </td>
       		<td width="462" align="center">
       			<font face="Arial" style="line-height:14px; font-size:12px;" size="2" color="#ffffff">
   					<br /><?php echo nl2br(htmlentities(utf8_decode($parameters["adresse"]))); ?><br />
   				</font>
				<font face="Arial" style="line-height:13px; font-size:11px;" size="2" color="#ffffff">
					Tel : <?php if(isset($parameters["tel"])){ ?><?php echo $parameters["tel"]; ?><?php } ?> - Email : <?php if(isset($parameters["email"])){ ?><a href="mailto:<?php echo $parameters["email"]; ?>" style="text-decoration:none; color:#ffffff;">magmoissac@fleuronsdelomagne.com</a><?php } ?>
   				</font>
      		 </td>
      		 <td style="line-height:0; font-size: 0;" width="67">
   				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fleuronsPlugin/images/invitation/bottom_right.jpg" width="67" height="75" alt="" border="0" />
      		 </td>
   		</tr>
     </table>

	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td width="600" height="20" align="center">
				<font face="Verdana, sans-serif" style="font-size: 9px;line-height: 12px;" size="2" color="#333333">L'abus d'alcool est dangereux pour la santé, consommez avec modération.<br />
				Pour votre santé, mangez au moins 5 fruits et légumes par jour. <a target="_blank" href="http://www.manger-bouger.fr" style="text-decoration:none; ">www.manger-bouger.fr <br />
				<br /> Si vous ne souhaitez plus recevoir nos lettres d’informations, vous pouvez vous désabonner en <a target="_blank" href="#UNSUBSCRIBE#" style="color:#333333;">cliquant ici.</a>
				</font>
			</td>
		</tr>
	</table>

</body>
</html>