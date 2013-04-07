<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="middle" bgcolor="#f7fcfe">
        	<td colspan="2" height="26" align="center">
            	<font face="Arial, sans-serif" style="line-height:13px; font-weight:bold; font-size:9px;text-align:center; color:#cccccc">Si les images ne s'affichent pas correctement, <a style="color:#cccccc;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>
                </font>
             </td>
     	   </tr>
      	  <tr valign="top">
        	<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/header_left.jpg" width="175" height="182" alt="" border="0" /></td>
            <td><?php if(isset($parameters["top_banner"])){ ?><img src="<?php echo $parameters["top_banner"]; ?>" width="436" height="182" alt="" border="0" /><?php } ?></td>
         </tr>
	</table>
		<table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
            <tr valign="top">
                <td width="1" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
           		     <td colspan="4" width="601" height="10" bgcolor="#527461"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_green.jpg" width="1" height="1" alt="" border="0" /></td>
                <td width="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
            </tr>
        <tr valign="top">
        	<td width="1" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
          	  <td width="10" bgcolor="#527461"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_green.jpg" width="1" height="1" alt="" border="0" /></td>
          		  <td width="580" bgcolor="#527461">
          		  <?php if (!empty($parameters["top_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#ffffff", "line-height: 16px; font-size: 12px; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["top_content"]), "#ffffff"); } ?>
          			  </td>
          		<?php if(isset($parameters["top_include_made_in_france"])){ ?>
          			<td width="110" bgcolor="#527461" align="right"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/fabrication_fr.jpg" width="100" height="41" alt="" border="0" /></td>
	           		<td width="10" bgcolor="#527461"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_green.jpg" width="1" height="1" alt="" border="0" /></td>

          		<?php }else{ ?>
					<td width="10" colspan="2" bgcolor="#527461"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_green.jpg" width="1" height="1" alt="" border="0" /></td>
          		<?php } ?>

            <td width="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
        </tr>
            <tr valign="top">
                <td width="1" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
           		     <td colspan="4" width="601" height="10" bgcolor="#527461"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_green.jpg" width="1" height="1" alt="" border="0" /></td>
                <td width="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
            </tr>
   	 </table>
    <table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
    	<tr valign="top">
        	<td colspan="<?php if(isset($parameters["header_include_made_in_france"])){ ?>3<?php }else{ ?>2<?php } ?>" width="602" height="10" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
         	   <td width="9" height="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
     	   </tr>
         <tr valign="top">
        	<td width="15" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
        		<td bgcolor="#f7fcfe">
                <?php if (!empty($parameters["header_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height: 12px; font-size: 10px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["header_content"]), "#666666"); } ?>
          	  </td>

              <?php if(isset($parameters["header_include_made_in_france"])){ ?><td width="114" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/fabrication_fr_light.jpg" width="100" height="45" alt="" border="0" /></td><?php } ?>
            <td width="11" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
        </tr>
        </table>

<table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
<?php if (isset($parameters["articles"]) && is_array($parameters["articles"])): foreach($parameters["articles"] as $articles): ?>
        <tr valign="top">
        	<td width="16" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
       	  <td width="155" bgcolor="#f7fcfe">
            <table cellspacing="0" cellpadding="0" border="0">
            <tr valign="top">
                	<td width="155" bgcolor="#f7fcfe"><?php if(isset($articles["illustration"])){ echo thumbnail_tag($articles["illustration"], 155, false); } ?></td>
              </tr>
            <tr valign="top">
                	<td width="155" height="25" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
              </tr>
            </table>

          </td>
            <td width="15" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
		  <td width="427" bgcolor="#f7fcfe">
                    <table width="427" align="center" cellspacing="0" cellpadding="0" border="0">
                    <tr valign="top">
                   	  <td colspan="3"><font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 16px; font-size: 12px;text-align:center; font-weight:bold; color:#527461"><?php echo $articles["title"]; ?></font></td>
                    </tr>
                	<tr valign="top">
                   	  <td colspan="3">
                        	<?php if (!empty($articles["content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height: 14px; font-size: 10px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($articles["content"]), "#666666"); } ?>
                        </td>
                    </tr>
                    <tr valign="top">
               		  <td colspan="3" height="10" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
                    </tr>
                    <tr valign="top">
                           	 <td width="16" bgcolor="#f7fcfe"><?php if(isset($articles["link_url"])){ ?><a style="margin-top:5px; margin-right:5px;" href="<?php echo czWidgetFormLink::displayLink($articles["link_url"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bullet_1.jpg" width="16" height="16" alt="" border="0" /></a><?php } ?></td>
                                <td width="8" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
                                <td width="403" bgcolor="#f7fcfe"><?php if(isset($articles["link_title"])){ ?><font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 14px; font-size: 10px; color:#527461"><a style="color:#527461; text-decoration:none;" href="<?php echo $articles["link_url"]; ?>" target="_blank"><?php echo $articles["link_title"]; ?></a></font><?php } ?></td>
                      </tr>
                      <tr valign="top">
                           	 <td width="16" bgcolor="#f7fcfe"><?php if(isset($articles["link2_url"])){ ?><a style="margin-top:5px; margin-right:5px;" href="<?php echo czWidgetFormLink::displayLink($articles["link2_url"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bullet_1.jpg" width="16" height="16" alt="" border="0" /></a><?php } ?></td>
                                <td width="8" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
                                <td width="403" bgcolor="#f7fcfe"><?php if(isset($articles["link2_title"])){ ?><font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 14px; font-size: 10px; color:#527461"><a style="color:#527461; text-decoration:none;" href="<?php echo $articles["link2_url"]; ?>" target="_blank"><?php echo $articles["link2_title"]; ?></a></font><?php } ?></td>
                      </tr>

                    <tr valign="top">
                   		 <td height="10" bgcolor="#f7fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
                    </tr>
                    </table>
          </td>
        </tr><?php endforeach; endif; ?>
        </table>
        <table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
   		   <tr>
           			 <td width="9" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
       			 </tr>
        <tr valign="top">
        	<td colspan="6" width="602" height="18" bgcolor="#f8fcfe"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_light_green.jpg" width="1" height="1" alt="" border="0" /></td>
         	   <td width="9" height="18" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
      	  </tr>
    </table>
    <table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
    	<tr valign="top">
        	<td width="15" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
        	    <td width="272" bgcolor="#ffffff">
            		<table width="272" align="center" cellspacing="0" cellpadding="0" border="0">
               			 <tr valign="top">
                            <td height="27" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                        </tr>
                      <tr valign="top">
                    	<td bgcolor="#ffffff">
                        	<font face="Arial, sans-serif" style="text-transform:uppercase; line-height:16px; font-weight:bold; font-size: 12px;text-align:center; color:#527461"><?php echo $parameters["left_title"]; ?></font>
                        </td>
                    </tr>
                  	 <tr valign="top">
                            <td height="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                        </tr>
                   	<tr valign="top">
                    	<td bgcolor="#ffffff">
                        <?php if (!empty($parameters["left_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height: 14px; font-size: 10px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["left_content"]), "#666666"); } ?>
                     <?php if (isset($parameters["left_links"]) && is_array($parameters["left_links"])): foreach($parameters["left_links"] as $left_links): ?>
           			 <table width="272" align="center" cellspacing="0" cellpadding="0" border="0">
                     <tr valign="top">
                     	<td height="10" bgcolor="#ffffff" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                     </tr>
                     	<tr valign="top">
                            <td width="16" bgcolor="#ffffff"><a style="margin-top:5px; margin-right:5px;" href="#" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bullet_1.jpg" width="16" height="16" alt="" border="0" /></a></td>
                                <td width="8" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                                <td width="272" bgcolor="#ffffff">

                                <font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 14px; font-size: 10px; color:#527461"><a style="color:#527461; text-decoration:none;" href="<?php echo $left_links["url"]; ?>" target="_blank"><?php echo $left_links["title"]; ?></a></font><br />
                                <font face="Arial, sans-serif" style="line-height: 14px; font-size: 10px; color:#666666"><?php echo $left_links["subtitle"]; ?></font>
                                </td>
                           </tr>
                             <tr valign="top">
                   				 <td height="10" bgcolor="#ffffff" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                 		   </tr>
                            </table>
                            <?php endforeach; endif; ?>
						</td>
                    </tr>
                   <tr valign="top">
                    	<td align="center" bgcolor="#ffffff">
                        <?php if(isset($parameters["left_illustration"])){ ?><img src="<?php echo $parameters["left_illustration"]; ?>" width="236" height="152" alt="" border="0" /><?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="32" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/sep_vertical.jpg" width="32" height="100%" alt="" border="0" /></td>
          	  <td width="272">
            	  <table width="272" align="center" cellspacing="0" cellpadding="0" border="0">
               		 <tr valign="top">
                    	<td height="27" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                    </tr>
                	<tr valign="top">
                    	<td bgcolor="#ffffff">
                        	<font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 16px; font-size:12px; font-weight:bold;text-align:center; color:#527461"><?php echo $parameters["right_title"]; ?></font>
                        </td>
                    </tr>
                      	 <tr valign="top">
                            <td height="10" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                        </tr>
                   	<tr valign="top">
                    	<td bgcolor="#ffffff">
                         <?php if (!empty($parameters["right_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#666666", "line-height: 14px; font-size: 10px; color:#666666"); echo $renderer->renderWysiwyg(utf8_decode($parameters["right_content"]), "#666666"); } ?>
                            <br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="272" height="15" alt="" border="0" />
                      <?php if (isset($parameters["right_links"]) && is_array($parameters["right_links"])): foreach($parameters["right_links"] as $right_links): ?>
                      <table width="272" align="center" cellspacing="0" cellpadding="0" border="0">
                     <tr valign="top">
                     	<td height="10" bgcolor="#ffffff" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                     </tr>

                        	<tr valign="top">
                            <td width="16" bgcolor="#ffffff"><?php if(isset($right_links["url"])){ ?><a style="margin-top:5px; margin-right:5px;" href="<?php echo czWidgetFormLink::displayLink($right_links["url"]); ?>" target="_blank"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bullet_1.jpg" width="16" height="16" alt="" border="0" /></a><?php } ?></td>
                              	  <td width="8" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                                <td width="272" bgcolor="#ffffff"><font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 14px; font-size: 10px; color:#527461"><a style="color:#527461; text-decoration:none;" href="<?php echo $right_links["url"]; ?>" target="_blank"><?php echo $right_links["text"]; ?></a></font></td>
                            </tr>
                               <tr valign="top">
                   				 <td height="10" bgcolor="#ffffff" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                  			  </tr>
                         </table>
                         <?php endforeach; endif; ?>
                     </td>
                      </tr>
                    <tr valign="top">
                    	<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/revendeur_img4.jpg" width="272" height="146" alt="" border="0" /></td>
                    </tr>
                     <tr valign="top">
                    	<td><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/pros_sep_img.jpg" width="272" height="24" alt="" border="0" /></td>
                    </tr>
                    <tr valign="middle">
                    	<td height="88" bgcolor="#527461">
                        <?php if (!empty($parameters["footer"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "#ffffff", "margin-left:10px; line-height: 16px; font-size: 12px; text-align:center; color:#ffffff"); echo $renderer->renderWysiwyg(utf8_decode($parameters["footer"]), "#ffffff"); } ?>
						</td>
                    </tr>
                     <tr valign="top">
                    	<td height="15" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                    </tr>
                </table>
            </td>
           <td width="20" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
        </tr>
    </table>
   <table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
   		<tr valign="top">
        	<td width="15" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
           	 <td width="589"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/pros_sep_img2.jpg" width="589" height="75" alt="" border="0" /></td>
            <td width="9" bgcolor="#ffffff"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/lcfPlugin/images/campaign01/bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
        </tr>
	</table>
    <table width="611" align="center" cellspacing="0" cellpadding="0" border="0">
   		<tr valign="middle">
        	<td width="611" height="77" bgcolor="#ffffff" align="center">
            <font face="Arial, sans-serif" style="line-height: 13px; font-size: 9px; text-align:center; font-weight:bold; color:#cccccc">Conformément à la loi informatique et Libertés du 06/01/1978, vous disposez d’un droit d’accès, de rectification et d’opposition aux informations vous concernant qui peut s’exercer par e-mail à <a style="color:#cccccc;" href="mailto:#VALUE(unsubscribe_email)#"><?php echo $parameters["unsubscribe_email"]; ?></a> ou en cliquant sur ce <a style="color:#cccccc;" href="#UNSUBSCRIBE#" target="_blank">lien de désinscription.</a></font>
            </td>
        </tr>
	</table>
</body>
</html>