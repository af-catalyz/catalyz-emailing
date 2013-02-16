<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/comparexPlugin/images/landing/comparex/main.css" />
	<title>Comparex Landing Page</title>
</head>
<body>

<?php
$parameters = $parameters->getRawValue();

//function embedArray($parameters)
//{
//    foreach($parameters as $key => $value) {
//        if (is_array($value)) {
//            $value = embedArray($value);
//        } else {
//            if (!preg_match('/(picture|url)$/', $key)) {
//                $value = sprintf('<div style="border: 1px dotted #00ff00">%s</div>', $value);
//            }
//        }
//        $parameters[$key] = $value;
//    }
//    return $parameters;
//}
//
//$parameters = embedArray($parameters);

?>
    <div id="wrapper">
     	 <div id="wrapper_bg">
     	 	<div id="header">
     	 		<div id="header_content">
						<div id="menu_haut">
							<table align="left" width="456" cellpadding="4" cellspacing="0" border="0">
								<tr valign="top">
								<?php if (isset($parameters['top_menu'])): ?>
								<?php while ($menu = array_shift($parameters['top_menu'])): ?>
									<td>
									<?php
    if (!empty($menu['url'])) {
        printf('<a href="%s">%s</a>', czWidgetFormLink::displayLink($menu['url']), $menu['title']);
    } else {
        echo $menu['title'];
    }

    ?>
									</td>
									<?php if (count($parameters['top_menu']) > 0): ?>
									<td><img src="/comparexPlugin/images/landing/comparex/menu_haut_sep.gif" width="1" height="13" alt="" border="0" /></td>
									<?php endif; ?>
									<?php endwhile; ?>
									<?php endif; ?>
								</tr>
							</table>
						</div>
							<div class="logo"></div>
							<div class="search">
								<form class="searchform" target="_self" action="http://www.comparex-online.com/web/global/en/search.htm">
									<input class="search_bg" type="text" name="searchpattern" value="Recherche sur le site"/>
								</form>
							</div>
							<div id="menu_bas">
							<table width="630" cellpadding="3" cellspacing="0" border="0">
								<tr valign="top">
								<?php if (isset($parameters['menu'])): ?>
								<?php while ($menu = array_shift($parameters['menu'])): ?>
									<td>
									<?php
        if (!empty($menu['url'])) {
            printf('<a style="color:#ff0000" href="%s">%s</a>', czWidgetFormLink::displayLink($menu['url']), $menu['title']);
        } else {
            printf('<span style="color:#ff0000">%s</span>', $menu['title']);
        }

        ?>
									</td>

									<?php endwhile; ?>
									<?php endif; ?>
								</tr>
							</table>
							<div class="red_sep"></div>
						</div>
					<div class="header_img"></div>
     	 		</div>
     	 	</div>
				<div id="content">
					<div class="content_left">
								<p class="title"><?php if (isset($parameters['box1_title'])) {
            echo $parameters['box1_title'];
        }

        ?></p>
								<div class="sep_point"></div>
							<div class="sous_text">
									<?php if (isset($parameters['box1_content'])) {
            echo $parameters['box1_content'];
        }

        ?>
							</div>
					</div>
					<div class="content_right">
					<?php
        if (isset($parameters['top_right_picture'])) {
            if (!empty($parameters['top_right_picture_url'])) {
                printf('<a href="%s"><img src="%s" width="233" height="102" style="float: left; margin: 16px 0 0 14px; padding: 0; position: relative;" /></a>', czWidgetFormLink::displayLink($parameters['top_right_picture_url']), $parameters['top_right_picture']);
            } else {
                printf('<img src="%s" width="233" height="102" style="float: left; margin: 16px 0 0 14px; padding: 0; position: relative;" />', $parameters['top_right_picture']);
            }
        }

        ?>


							<div class="vip">
								<?php if (isset($parameters['top_right_content'])) {
									echo $parameters['top_right_content'];
								} ?>
							</div>
						<div class="clear"></div>
						       	<div class="adhesion">
						       	<a name="form1"></a>
						       		<form action="#" onsubmit="czEmailingLandingAction($(this), '<?php
	echo url_for(sprintf('@landing_action?slug=%s&type=form1', $landing->getSlug())).'?key='.(isset($_REQUEST['key'])?$_REQUEST['key']:''); ?>'); return false;">
                            	  	<table width="482" align="center" cellspacing="0" cellpadding="0" border="0">
                            			<tr valign="top">
                            				<td width="482" colspan="6">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_top.jpg" width="482" height="10" alt="" border="0" />
                            				</td>
										</tr>
                            			<tr valign="middle">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left1.jpg" width="23" height="22" alt="" border="0" />
                            				</td>
                            				<td bgcolor="#ff3333" colspan="4" align="center">
                            					<font face="Arial, sans-serif" style="text-transform:uppercase; text-align:center; line-height:16px; font-size:11px; color:#ffff99">Je veux adhérer ou en savoir plus :</font>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right1.jpg" width="38" height="22" alt="" border="0" />
                            				</td>
										</tr>
						     			<tr valign="top">
                            				<td width="482" colspan="6"><img src="/comparexPlugin/images/landing/comparex/form1_ligne1.jpg" width="482" height="19" alt="" border="0" /></td>
										</tr>
                           				<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="22" alt="" border="0" />
                            				</td>
                            				<td width="68">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Société :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[company]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Nom :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[last_name]" value=""/>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="22" alt="" border="0" />
                            				</td>
										</tr>
						     			<tr valign="top">
                            				<td width="482" colspan="6"><img src="/comparexPlugin/images/landing/comparex/form1_ligne2.jpg" width="482" height="5" alt="" border="0" /></td>
										</tr>
										<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="22" alt="" border="0" />
                            				</td>
                            				<td width="68">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Email :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[email]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Prénom :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[first_name]" value=""/>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="22" alt="" border="0" />
                            				</td>
										</tr>
										<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td width="279" colspan="3">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="279" height="22" alt="" border="0" />
                            				</td>
                            				<td width="132">
												<table width="132" align="center" cellspacing="0" cellpadding="0" border="0">
													<tr valign="top">
                            							<td width="132" colspan="2">
                            								<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="132" height="5" alt="" border="0" />
                            							</td>
													</tr>
                            						<tr valign="top">
                            							<td width="60">
                            								<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="55" height="1" alt="" border="0" />
                            							</td>
                            							<td width="73">
			                            					<span class="send_text">envoyer</span>
			                            					<input type="submit" class="form_submit" name="form_submit" value=""/>
                            							</td>
													</tr>
												</table>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>
										<tr valign="top">
                            				<td width="482" colspan="6">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_bottom.jpg" width="482" height="11" alt="" border="0" />
                            				</td>
										</tr>
									</table>
									</form>
                            </div>
					</div>
					<div class="clear"></div>

						<div class="content_left">
								<p class="title"><?php if (isset($parameters['box2_title'])) {
            echo $parameters['box2_title'];
        }

        ?></p>
								<div class="sep_point"></div>
							<div class="sous_text">
									<?php if (isset($parameters['box2_content'])) {
            echo $parameters['box2_content'];
        }

        ?>
							</div>
					</div>
					<div class="content_right">
						<div class="pub_2">
							<?php
if (isset($parameters['right_ad_picture'])) {
	if (!empty($parameters['right_ad_url'])) {
		printf('<a href="%s"><img src="%s" width="443" height="53" alt="" border="0" /></a>', czWidgetFormLink::displayLink($parameters['right_ad_url']), $parameters['right_ad_picture']);
	} else {
		printf('<img src="%s" width="443" height="53" alt="" border="0" />', $parameters['right_ad_picture']);
	}
}

?>

						</div>
						       	<div class="adhesion">
<a name="form2"></a>
						       		<form action="#" onsubmit="czEmailingLandingAction($(this), '<?php
	echo url_for(sprintf('@landing_action?slug=%s&type=form2', $landing->getSlug())).'?key='.(isset($_REQUEST['key'])?$_REQUEST['key']:''); ?>'); return false;">
                            	  	<table width="482" align="center" cellspacing="0" cellpadding="0" border="0">
                            			<tr valign="top">
                            				<td width="482" colspan="6">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_top.jpg" width="482" height="10" alt="" border="0" />
                            				</td>
										</tr>
                            			<tr valign="middle">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left1.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td bgcolor="#ff3333" colspan="4" align="center">
                            					<font face="Arial, sans-serif" style="text-transform:uppercase; text-align:center; line-height:16px; font-size:11px; color:#ffff99">Demandez une étude personnalisée :</font>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right1.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>
						     			<tr valign="top">
                            				<td width="482" colspan="6"><img src="/comparexPlugin/images/landing/comparex/form1_ligne1.jpg" width="482" height="20" alt="" border="0" /></td>
										</tr>
                           				<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td width="68">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Société :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[company]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Nom :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[last_name]" value=""/>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>

						     			<tr valign="top">
                            				<td width="482" colspan="6"><img src="/comparexPlugin/images/landing/comparex/form1_ligne2.jpg" width="482" height="5" alt="" border="0" /></td>
										</tr>
										<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td width="68">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Email :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[email]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Prénom :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[first_name]" value=""/>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>
						     			<tr valign="top">
                            				<td width="482" colspan="6"><img src="/comparexPlugin/images/landing/comparex/form1_ligne2.jpg" width="482" height="5" alt="" border="0" /></td>
										</tr>
										<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td width="279" colspan="3">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Nombre d’utilisateurs de la Creative Suite :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input2" name="datas[user_count]" value=""/>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>
										<tr valign="top">
                            				<td width="23">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_left2.jpg" width="23" height="24" alt="" border="0" />
                            				</td>
                            				<td width="279" colspan="3">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="279" height="22" alt="" border="0" />
                            				</td>
                            				<td width="132">
												<table width="132" align="center" cellspacing="0" cellpadding="0" border="0">
													<tr valign="top">
                            							<td width="132" colspan="2">
                            								<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="132" height="5" alt="" border="0" />
                            							</td>
													</tr>
                            						<tr valign="top">
                            							<td width="60">
                            								<img src="/comparexPlugin/images/landing/comparex/bg_white.gif" width="55" height="1" alt="" border="0" />
                            							</td>
                            							<td width="73">
			                            					<span class="send_text">envoyer</span>
			                            					<input type="submit" class="form_submit" name="form_submit" value=""/>
                            							</td>
													</tr>
												</table>
                            				</td>
                            				<td width="38">
												<img src="/comparexPlugin/images/landing/comparex/form1_right2.jpg" width="38" height="24" alt="" border="0" />
                            				</td>
										</tr>
										<tr valign="top">
                            				<td width="482" colspan="6">
                            					<img src="/comparexPlugin/images/landing/comparex/form1_bottom.jpg" width="482" height="11" alt="" border="0" />
                            				</td>
										</tr>
									</table>
									</form>
                            </div>
					</div>
					<div class="clear"></div>

						<div class="content_left">
								<p class="title"><?php if (isset($parameters['box3_title'])) {
            echo $parameters['box3_title'];
        }

        ?></p>
								<div class="sep_point"></div>
							<div class="sous_text">
									<?php if (isset($parameters['box3_content'])) {
            echo $parameters['box3_content'];
        }

        ?>
							</div>
					</div>
					<div class="content_right2">
						<div class="box">
							<div class="box_top"></div>
							<div class="box_content">
								<table width="475" align="center" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
										<td class="box_left" width="27">
										</td>
										<td class="bullet_red" width="417">
											<?php if (isset($parameters['right_bottom'])) {
												echo $parameters['right_bottom'];
											}

?>
										</td>
										<td class="box_right" width="31">
										</td>
									</tr>
								</table>
							</div>
							<div class="box_bottom"></div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="programme">
						<table width="835" align="center" cellspacing="0" cellpadding="0" border="0">
                            <tr valign="top">
                            	<td width="835" colspan="3">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_top.gif" width="835" height="18" alt="" border="0" />
                            	</td>
                            </tr>
                            <tr valign="top">
                            	<td width="24">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_left1.gif" width="24" height="22" alt="" border="0" />
                            	</td>
                            	<td width="788" bgcolor="#b3b3b3">
                            		<p class="white_title"><?php if (isset($parameters['bottom_title'])) {
            echo $parameters['bottom_title'];
        }

        ?></p>
                            	</td>
                               	<td width="23">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_right1.gif" width="23" height="22" alt="" border="0" />
                            	</td>
                            </tr>
                              <tr valign="top">
                            	<td width="835" colspan="3">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_ligne1.gif" width="835" height="20" alt="" border="0" />
                            	</td>
                            </tr>
                             <tr valign="top">
                            	<td width="24">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_left2.gif" width="24" height="140" alt="" border="0" />
                            	</td>
                            	<td width="788" bgcolor="#868686">

                            		<table width="788" align="center" cellspacing="0" cellpadding="0" border="0">
										<tr valign="top">
                            				<td width="34" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/prog_un.gif" width="34" height="34" alt="" border="0" />
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                         					<td width="132" bgcolor="#868686">
                         						<p class="white_12"><?php if (isset($parameters['bottom_zone1'])) {
            echo $parameters['bottom_zone1'];
        }

        ?></p>
                            				</td>
                               				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                            				<td width="34" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/prog_deux.gif" width="34" height="34" alt="" border="0" />
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                         					<td width="142" bgcolor="#868686">
                         						<p class="white_12"><?php if (isset($parameters['bottom_zone2'])) {
            echo $parameters['bottom_zone2'];
        }

        ?></p>
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                            				<td width="34" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/prog_trois.gif" width="34" height="34" alt="" border="0" />
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                         					<td width="132" bgcolor="#868686">
                         						<p class="white_12"><?php if (isset($parameters['bottom_zone3'])) {
            echo $parameters['bottom_zone3'];
        }

        ?></p>
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                            				<td width="34" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/prog_quatre.gif" width="34" height="34" alt="" border="0" />
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                         					<td width="163" bgcolor="#868686">
                         						<p class="white_12"><?php if (isset($parameters['bottom_zone4'])) {
            echo $parameters['bottom_zone4'];
        }

        ?></p>
                            				</td>
                            				<td width="10" bgcolor="#868686">
                            					<img src="/comparexPlugin/images/landing/comparex/bg_prog.gif" width="10" height="1" alt="" border="0" />
                            				</td>
                            			</tr>
                            		</table>

                            	</td>
                               	<td width="23">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_right2.gif" width="23" height="140" alt="" border="0" />
                            	</td>
                            </tr>
                              <tr valign="top">
                            	<td width="24">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_left3.gif" width="24" height="32" alt="" border="0" />
                            	</td>
                            	<td width="788" bgcolor="#868686">
                            		<p class="white"><?php if (isset($parameters['bottom_legend'])) {
            echo $parameters['bottom_legend'];
        }

        ?></p>
                            	</td>
                               	<td width="23">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_right3.gif" width="23" height="32" alt="" border="0" />
                            	</td>
                            </tr>
                             <tr valign="top">
                            	<td width="835" colspan="3">
                            		<img src="/comparexPlugin/images/landing/comparex/prog_bottom.gif" width="835" height="7" alt="" border="0" />
                            	</td>
                            </tr>
                        </table>
					</div>
						<table width="898" align="center" cellspacing="0" cellpadding="0" border="0">
							<tr valign="top">
                            	<td width="898" colspan="3">
                            		<img src="/comparexPlugin/images/landing/comparex/info_top.png" width="898" height="12" alt="" border="0" />
                            	</td>
                            </tr>
                           	<tr valign="top">
                            	<td width="148">
                            		<img src="/comparexPlugin/images/landing/comparex/info_left.png" width="148" height="18" alt="" border="0" />
                            	</td>
                            	 <td width="590" bgcolor="#ff0033" align="center">
                            		<p class="yellow">Adhérez, testez, créez <img src="/comparexPlugin/images/landing/comparex/info_bullet.png" width="10" height="10" alt="" border="0" /> <span class="info_white">01 55 95 69 00</span> <img src="/comparexPlugin/images/landing/comparex/info_bullet2.png" width="6" height="12" alt="" border="0" /> <a href="info@comparex.fr" style="color:#FFFFFF; text-decoration:none;">info@comparex.fr</a></p>
                            	</td>
                            	<td width="160">
                            		<img src="/comparexPlugin/images/landing/comparex/info_right.png" width="160" height="18" alt="" border="0" />
                            	</td>
                            </tr>
                            <tr valign="top">
                            	<td width="898" colspan="3">
                            		<img src="/comparexPlugin/images/landing/comparex/info_bottom.png" width="898" height="16" alt="" border="0" />
                            	</td>
                            </tr>
                        </table>
					</div>

			<div class="footer">
				<div class="sep_footer">
					<div class="sep_footer_content"></div>
				</div>
				<table align="center" cellspacing="10" cellpadding="0" border="0">
					<tr valign="top">
					<?php for($i = 1; $i <= 4; $i++): ?>
                       	<td>

                       	<?php
        if (isset($parameters['sitemap' . $i . '_title'])) {
            if (!empty($parameters['sitemap' . $i . '_url'])) {
                printf('<a style="color:#000000; font-weight:bold; text-transform:uppercase; text-decoration:none" href="%s">%s</a>', czWidgetFormLink::displayLink($parameters['sitemap' . $i . '_url']), $parameters['sitemap' . $i . '_title']);
            } else {
                printf('<span style="color:#000000; font-weight:bold; text-transform:uppercase; text-decoration:none">%s</span>', $parameters['sitemap' . $i . '_title']);
            }
        }
        echo '<br />';
        if (isset($parameters['sitemap' . $i])) {
            foreach($parameters['sitemap' . $i] as $menu) {
                if (isset($menu['url'])) {
                    printf('<a style="color:#333333; text-decoration:none" href="%s">%s</a>', czWidgetFormLink::displayLink($menu['url']), $menu['title']);
                } else {
                    printf('<span style="color:#333333; text-decoration:none">%s</span>', $menu['title']);
                }
                echo '<br />';
            }
        }

        ?>


                       	</td>
                       	<?php endfor; ?>

                       </tr>
                   </table>

			</div>

   		 </div>
		<div id="bg_end"></div>
    </div>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/landing.js"></script>
</body>
</html>

