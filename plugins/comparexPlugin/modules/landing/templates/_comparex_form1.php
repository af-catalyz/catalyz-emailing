<?php
$parameters = $parameters->getRawValue();

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
						       	<div class="adhesion"><a name="form1"></a>
						       		<form action="#" id="form1" onsubmit="czEmailingLandingAction($(this), '<?php
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
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Société* :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[company]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Nom* :</font>
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
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Email* :</font>
                            				</td>
                            				<td width="132">
                            					<input type="text" class="form_input" name="datas[email]" value=""/>
                            				</td>
                               				<td width="79">
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">Prénom* :</font>
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
                            					<font face="Arial, sans-serif" style="font-weight:bold; text-align:left; line-height:16px; font-size:11px; color:#ff3333">* Tous les champs sont obligatoires</font>
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
			                            					<a href="javascript://" class="send_text" onclick="$('#form1').submit(); return false;">envoyer</a>
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