<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/comparexPlugin/images/landing/autodesk/main.css" />
	<title>Autodesk Landing Page</title>
</head>
<body>

<?php
$parameters = $parameters->getRawValue();
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
					<div class="header_img">
						<?php

						if (!empty($parameters['banner']) && is_file(sfConfig::get('sf_web_dir').$parameters['banner'])) {
							echo thumbnail_tag($parameters['banner'], 900, 133);
						}else{
							echo '<img src="/comparexPlugin/images/landing/autodesk/header_img.jpg" width="900" height="133" alt="" border="0" />';
						}




						 ?>


					</div>
     	 		</div>
     	 	</div>

			<div class="content">
					<div class="content_left">
							<?php
if (!empty($parameters['title'])) {
	printf('<h1>%s</h1>', $parameters['title']);
}
?>

					</div>
					<div class="content_right">
                            <table width="431" cellspacing="0" cellpadding="3" border="0">
                                    <tbody><tr valign="top">
                                        <td>
                                        <?php
if (!empty($parameters['right_image']) && is_file(sfConfig::get('sf_web_dir').$parameters['right_image'])) {
	echo thumbnail_tag($parameters['right_image'], 59, 45);
}
?>
																				</td>
                                        <td class="h2">
                                        	<?php
if (!empty($parameters['right_content'])) {
	echo $parameters['right_content'];
}
?>
																				</td>
                                    </tr>
                           </tbody></table>

					</div>
                    <div class="clear"></div>
                 <div class="sep_long">
                        <img width="860" height="5" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/sep_long_red.gif">
                  </div>
                    <?php
if (!empty($parameters['edito_content'])) {
	echo $parameters['edito_content'];
}
?>
                  <div class="content_left">
                       <?php
if (!empty($parameters['left_content'])) {
	echo $parameters['left_content'];
}
?>
                  </div>
                  <div class="content_right">
                        <form action="#" id="form1" onsubmit="czEmailingLandingAction($(this), '<?php
echo url_for(sprintf('@landing_action?slug=%s&type=form1', $landing->getSlug())).'?key='.(isset($_REQUEST['key'])?$_REQUEST['key']:''); ?>'); return false;">
                            <table width="431" cellspacing="0" cellpadding="0" border="0" bgcolor="#EE0031">

                                <tbody><tr valign="top">
                                        <td colspan="2"><img width="1" height="15" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                    </tr>

                                    <tr valign="top">
                                        <td><img width="17" height="19" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bullet_4.gif"></td>
                                        <td class="h4">

																				<?php
if (!empty($parameters['form1_introduction'])) {
	echo $parameters['form1_introduction'];
}
?>
</td>
                                    </tr>
                                    <tr valign="top">
                                        <td colspan="2"><img width="1" height="15" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td><img width="17" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                        <td>
                                            <table width="414" cellspacing="0" cellpadding="0" border="0">
                                                 <tbody><tr valign="top">
                                                     <td width="203"><input type="text" value="E-mail" name="datas[email]" id="input_email" class="form_input"></td>
                                                     <td width="20"><a id="datas_number_less" href="javascript://"><img width="20" height="20" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bullet_5.jpg"></a></td>
                                                     <td width="30"><input type="text" value="1" name="datas[number]" class="form_input2" id="datas_number"></td>
                                                     <td width="20"><a id="datas_number_more" href="javascript://"><img width="20" height="20" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bullet_6.jpg"></a></td>
                                                     <td width="141" class="p_form">Nombre de licences <br>à mettre à jour</td>
                                                </tr>
                                             </tbody></table>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <td colspan="2"><img width="1" height="13" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td><img width="17" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                        <td>
                                            <table width="414" cellspacing="0" cellpadding="0" border="0">
                                                 <tbody><tr valign="top">
                                                     <td width="10"><input type="checkbox" value="oui" name="datas[proposition]" class="checkbox"></td>
                                                     <td width="6"><img width="6" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                                     <td width="398" class="p_form">Recevoir une proposition avec l'abonnement</td>
                                                </tr>
                                             </tbody></table>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <td colspan="2"><img width="1" height="26" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td><img width="17" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                        <td>
                                            <table width="414" cellspacing="0" cellpadding="0" border="0">
                                                 <tbody><tr valign="top">
                                                     <td width="115"><input type="image" name="form_submit" class="form_submit" src="/comparexPlugin/images/landing/autodesk/form1_submit.gif"></td>
                                                     <td width="14"><img width="6" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                                     <td width="285" bgcolor="#f5f5f5" class="p_form2">
                                                        <a href="#bottom" style="text-decoration:none; color:#cc0033;">
                                                        <img width="14" height="16" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bullet_7.gif">
                                                        Consulter les conditions d'applications de cette offre</a>
                                                    </td>
                                                </tr>
                                             </tbody></table>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <td colspan="2"><img width="1" height="17" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/bg_tab.gif"></td>
                                    </tr>
                           </tbody></table>
                    </form>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="content_long">
                     <div class="content2 with_robot">
                        <div class="content_left2">
                            <?php
                           	if (!empty($parameters['center_content'])) {
                           		echo $parameters['center_content'];
                           	}
 														?>
                        </div>

                        <div class="content_right2">
                            <div class="robot"></div>
                        </div>
											<div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="content_long2">
                     <div class="content3">
                        <table width="900" cellspacing="0" cellpadding="0" border="0" bgcolor="#f5f5f5">
                            <tbody><tr valign="top">
                                            <td width="900" colspan="10">
                                                <img width="1" height="15" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif">
                                            </td>
                                        </tr>
                             <tr valign="top">
                                <td width="30"><img width="1" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                <td width="210">
                                    <table width="210" cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr valign="top">
                                            <td width="210">
                                                 <table width="210" cellspacing="0" cellpadding="0" border="0">
                                                     <tbody><tr valign="top">
                                                        <td width="60">
                                                            <?php
                                                            if (!empty($parameters['box1_image']) && is_file(sfConfig::get('sf_web_dir').$parameters['box1_image'])) {
	                                                        		echo thumbnail_tag($parameters['box1_image'], 49, 49);
	                                                        	}
																													 ?>
                                                        </td>
                                                        <td width="150">
                                                            <?php
                                                            if (!empty($parameters['box1_title'])) {
                                                        		printf('<h5>%s</h5>', $parameters['box1_title']);
                                                        	}

																														 ?>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                                    <?php
                                                        	if (!empty($parameters['box1_content'])) {
                                                        		echo $parameters['box1_content'];
                                                        	}
																													 ?>
                                                </td>
                                                <td width="52"><img width="52" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                                <td width="1" bgcolor="#dcdcdc"><img width="1" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/grey.gif"></td>
                                                <td width="52"><img width="52" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                                <td width="210">
                                                 <table width="210" cellspacing="0" cellpadding="0" border="0">
                                                     <tbody><tr valign="top">
                                                        <td width="60">
                                                        <?php
                                                            if (!empty($parameters['box2_image']) && is_file(sfConfig::get('sf_web_dir').$parameters['box2_image'])) {
	                                                        		echo thumbnail_tag($parameters['box2_image'], 50, 51);
	                                                        	}
																													 ?>
                                                        </td>
                                                        <td width="150">
                                                        	<?php
                                                        	if (!empty($parameters['box2_title'])) {
                                                        		printf('<h5>%s</h5>', $parameters['box2_title']);
                                                        	}
																													 ?>

                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                                    <?php
                                                        	if (!empty($parameters['box2_content'])) {
                                                        		echo $parameters['box2_content'];
                                                        	}
																													 ?>
                                                </td>
                                                <td width="52"><img width="52" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                                <td width="1" bgcolor="#dcdcdc"><img width="1" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/grey.gif"></td>
                                                <td width="52"><img width="52" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                                <td width="210">
                                                 <table width="210" cellspacing="0" cellpadding="0" border="0">
                                                     <tbody><tr valign="top">
                                                        <td width="60">
                                                            <?php
                                                            if (!empty($parameters['box3_image']) && is_file(sfConfig::get('sf_web_dir').$parameters['box3_image'])) {
	                                                        		echo thumbnail_tag($parameters['box3_image'], 52, 50);
	                                                        	}
																													 ?>

                                                        </td>
                                                        <td width="150">
                                                        <?php
                                                        if (!empty($parameters['box3_title'])) {
                                                        		printf('<h5>%s</h5>', $parameters['box3_title']);
                                                        	}
                                                        ?>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                                <?php
                                                        if (!empty($parameters['box3_content'])) {
                                                        		echo $parameters['box3_content'];
                                                        	}
                                                        ?>
                                                </td>
                                                <td width="30"><img width="1" height="1" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif"></td>
                                            </tr>
                                         </tbody></table>
                                         </td>
                                      </tr>
                                      <tr valign="top">
                                            <td width="900" colspan="10">
                                    <img width="1" height="15" border="0" alt="" src="/comparexPlugin/images/landing/autodesk/light_grey.gif">
                               </td>
                            </tr>
                        </tbody></table>
                    </div>
                </div>
                <a name="bottom"></a>
                <?php if (!empty($parameters['bottom_content'])) : ?>
								<div class="content_long">
                     <div class="content2">
                     	<div class="legende">
	                     	<?php echo $parameters['bottom_content'] ?>
											</div>
                    </div>
                </div>
                <?php endif ?>

                <div class="content">
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
                            		<p class="yellow"><?php echo @$parameters['footer_caption'] ?> <img src="/comparexPlugin/images/landing/comparex/info_bullet.png" width="10" height="10" alt="" border="0" /> <span class="info_white"><?php echo @$parameters['footer_phone'] ?></span> <img src="/comparexPlugin/images/landing/comparex/info_bullet2.png" width="6" height="12" alt="" border="0" /> <a href="mailto:<?php echo @$parameters['footer_email'] ?>" style="color:#FFFFFF; text-decoration:none;"><?php echo @$parameters['footer_email'] ?></a></p>
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
                       	<td style="padding-right: 35px">

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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38558145-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
/* <![CDATA[ */

function cleanField(id, defaultValue){
	$('#' + id).bind("focus", function(e){
		if($(this).val() == defaultValue){
			$(this).val('');
		};
	});
}

$(document).ready(function(){

	cleanField('input_email', 'E-mail');

	$("#datas_number_more").live("click", function(event){
		$("#datas_number").val(parseInt($("#datas_number").val())+1);
	});

	$("#datas_number_less").live("click", function(event){
		nb = parseInt($("#datas_number").val())-1;
		if (nb <= 1) {
			nb = 1;
		}
		$("#datas_number").val(nb);
	});

});

/* ]]> */
</script>

</body>
</html>