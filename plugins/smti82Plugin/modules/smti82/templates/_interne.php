<?php $parameters = unEscape($parameters); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body style="margin:0; padding:0;" alink="#7c9439" vlink="#7c9439" link="#7c9439">
	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="5" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td align="center" width="650" height="25">
				<font face="Tahoma" style="line-height: 12px; font-size: 9px;" size="2" color="#999999">Si vous avez des difficultés pour visualiser ce message et ses images, <a style="color:#999999;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a>.<br/><br/></font>
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

		<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
			<tr valign="bottom">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/header_top.png" width="652" height="35" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="259">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/header_left.png" width="259" height="71" alt="" border="0" />
			</td>
			<td width="265">
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="2">
							<font face="Arial" style="font-weight:bold; font-size: 24px; line-height: 20px;" size="2" color="#a2c037">
								<?php if(!empty($parameters["email_title"])){ ?><?php echo $parameters["email_title"]; ?><?php } ?>
							</font>
						</td>
					</tr>
					<tr>
						<td align="right">
							<font face="Arial" style="font-weight:bold; font-size: 10px;line-height: 9px;" size="2" color="#999999">
							  		<?php if(!empty($parameters["edition"])){ ?><?php echo $parameters["edition"]; ?><?php } ?>
							</font>
						</td>
					</tr>
				</table>
			</td>
			<td style="line-height:0; font-size: 0;" width="128">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/header_right.png" width="128" height="71" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="652" colspan="3">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/header_bottom.png" width="652" height="59" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="10" bgcolor="#FFFFFF">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="10" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="378" bgcolor="#FFFFFF">


				<table width="378" cellspacing="0" cellpadding="0" border="0">
<?php if(!empty($parameters["news_title"])){ ?>
                    <tr valign="top">
						<td width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037">
								<?php echo $parameters["news_title"]; ?>	</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_long_grey.gif" width="378" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>

					<?php if (!empty($parameters["actus"]) && is_array($parameters["actus"])): foreach($parameters["actus"] as $actus): ?><tr valign="top">
						<td width="378">
							<?php if(!empty($actus["title"])){ ?><font face="Arial" style="font-weight:bold; line-height: 15px; font-size: 14px;" size="2" color="#669900">
								<?php echo $actus["title"]; ?><br /><br />
							</font><?php } ?>

							<table width="378" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td width="13">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="13" height="1" alt="" border="0" />
									</td>
									<td width="100">
										<?php if(!empty($actus["picture"])){ ?><img style="border-bottom: 5px solid #9c9b9b" src="<?php echo $actus["picture"]; ?>" width="100" height="120" alt="" border="0" /><?php } ?>
									</td>
									<td width="25">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="25" height="1" alt="" border="0" />
									</td>


									<td width="240">

										<?php if(!empty($actus["source"])){ ?>
											<font face="Arial" style="line-height: 11px; font-size: 10px;" size="2" color="#999999">(source : <?php echo $actus["source"]; ?>)</font><br />
										<?php } ?>

										<?php if (!empty($actus["content"])) { $renderer = new CatalyzEmailRenderer("Arial", "#333333", "line-height: 14px; font-size: 11px; color: #333333"); echo $renderer->renderWysiwyg(html_entity_decode($actus["content"]), "#333333"); } ?>
											<?php if(!empty($actus["read_more"])){ ?>
											<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#7d952d">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_2.gif" width="8" height="7" alt="" border="0" />
											<a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo czWidgetFormLink::displayLink($actus["read_more"]); ?>" target="_blank"><?php if(!empty($actus['read_more_caption'])) {echo $actus['read_more_caption'];}else{echo 'En savoir plus';} ?></a><br /><br /><br />
											</font>
											<?php } ?>

									</td>
								                                </tr>
							</table>
						</td>

                    </tr>

					<tr valign="top">
						<td width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr><?php endforeach; endif; ?>
<?php } ?>
<?php if(!empty($parameters["events_title"])){ ?>
					<tr valign="top">
						<td width="378">
							<br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037">
								<?php echo $parameters["events_title"]; ?>
							</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_long_grey.gif" width="378" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>

					<tr valign="top">
						<td width="378">


							<table width="378" cellspacing="0" cellpadding="0" border="0">
								<?php if (!empty($parameters["dates"]) && is_array($parameters["dates"])): foreach($parameters["dates"] as $dates): ?><tr valign="top">

									<td width="23">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="23" height="1" alt="" border="0" />
									</td>
									<td width="355">
										<?php if(!empty($dates["date"])){ ?><font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#666666">
											<br /><?php echo $dates["date"]; ?>
										</font>
										<?php } ?>
									</td>

								</tr>
								<tr valign="top">

<td width="23">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_3.gif" width="23" height="19" alt="" border="0" />
									</td>
									<td width="355">
										<?php if(!empty($dates["title"])){ ?>
										<font face="Arial" style="font-weight:bold; line-height: 15px; font-size: 14px;" size="2" color="#669900">
											<?php echo $dates["title"]; ?>
											<br />
										</font>
										<?php } ?>
									</td>

								</tr>
								<tr valign="top">
									<td width="23">
										<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="23" height="1" alt="" border="0" />
									</td>
									<td width="355">
										<font face="Arial" style="line-height: 14px; font-size: 11px;" size="2" color="#333333">
									<?php echo nl2br(htmlentities(utf8_decode($dates["date_content"]))); ?>
										<br />
										</font>
										<?php if(!empty($dates["read_more"])){ ?>
										<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#333333">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_2.gif" width="8" height="7" alt="" border="0" />
											<a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo czWidgetFormLink::displayLink($dates["read_more"]); ?>" target="_blank"><?php if(!empty($dates['read_more_caption'])) {echo $dates['read_more_caption'];}else{echo 'Pour plus d\'informations';} ?></a><br /><br />
										</font>
										<?php } ?>
									</td>
								</tr>
                                <?php endforeach; endif; ?>


							</table>
						</td>
					</tr>
<?php } ?>
<?php if(!empty($parameters["content_title"])){ ?>
                    <tr valign="top">
						<td width="378">
							<br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_1.gif" width="19" height="12" alt="" border="0" />
							<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#a2c037">
								<?php echo $parameters["content_title"]; ?>
							</font>
						</td>
					</tr>
					<tr valign="top">
						<td height="1" width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_long_grey.gif" width="378" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td width="378">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
						</td>
					</tr>


					<tr valign="top">
						<td width="378">
						<?php if (!empty($parameters["library_content"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "", "line-height:11px; font-size:11px; color=#333333"); echo $renderer->renderWysiwyg(html_entity_decode($parameters["library_content"]), ""); } ?>



						</td>

					</tr>
<?php } ?>				</table>



			</td>
			<td style="line-height:0; font-size: 0;" width="9" bgcolor="#FFFFFF">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="9" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#a2c037">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="12" bgcolor="#f7f7f7">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_light.gif" width="12" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="228" bgcolor="#f7f7f7">
				<table width="228" cellspacing="0" cellpadding="0" border="0">
				<?php if(!empty($parameters["lu_title"])){ ?>
						<tr valign="top">
							<td width="228">
								<br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_4.gif" width="18" height="11" alt="" border="0" />
								<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#333333">
									<?php echo $parameters["lu_title"]; ?>
								</font>
							</td>
						</tr>
						<tr valign="top">
							<td height="1" width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_short_grey.gif" width="228" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
							</td>
						</tr>
						<?php if (!empty($parameters["lu"]) && is_array($parameters["lu"])): foreach($parameters["lu"] as $lu): ?>
  <tr valign="top">
							<td width="228">
								<?php if(!empty($lu["title"])): ?>
								<font face="Arial" style="font-weight:bold; line-height: 15px; font-size: 14px;" size="2" color="#669900">
											<br /><?php echo $lu["title"]; ?> <br />
								</font>
								<?php endif; ?>
								<?php if(!empty($lu["subtitle"])): ?>
								<font face="Arial" style="line-height: 15px; font-size: 13px;" size="2" color="#669900"><?php echo nl2br(htmlentities(utf8_decode($lu["subtitle"]))); ?><br />
								</font>
								<?php endif; ?>
								<?php if(!empty($lu["content"])): ?>
								<font face="Arial" style="line-height: 14px; font-size: 11px;" size="2" color="#333333">
											<?php echo nl2br(htmlentities(utf8_decode($lu["content"]))); ?><br />
								</font>
								<?php endif; ?>
								<?php if(!empty($lu["link"])): ?>
								<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#333333">
											<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_2.gif" width="8" height="7" alt="" border="0" />
                                            <?php if(!empty($lu["link"])){ ?>
											<a style="text-decoration:underline; font-weight:bold; color:#7d952d;" href="<?php echo czWidgetFormLink::displayLink($lu["link"]); ?>" target="_blank"><?php if(!empty($lu['link_caption'])){echo $lu['link_caption'];}else{echo 'Lire +';} ?></a><?php } ?><br /><br />
								</font>
								<?php endif; ?>
							</td>
						</tr>
						<tr valign="top">
							<td height="1" width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_dotted.gif" width="228" height="1" alt="" border="0" />
							</td>
						</tr>
                        <?php endforeach; endif; ?>

						<tr valign="top">
							<td width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/ombre.gif" width="228" height="25" alt="" border="0" />
							</td>
						</tr>
<?php } ?>
<?php if(!empty($parameters["formations"])){ ?>
						<tr valign="top">
							<td width="228">
								<br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_4.gif" width="18" height="11" alt="" border="0" />
								<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#333333"><?php
									if(!empty($parameters["formations_url"])){
										printf('<a href="%s">%s</a>', czWidgetFormLink::displayLink($parameters["formations_url"]), $parameters["formations"]);
									}else{
								echo $parameters["formations"];
									}
								 ?><br />
								</font>
							</td>
						</tr>
						<tr valign="top">
							<td height="1" width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_short_grey.gif" width="228" height="1" alt="" border="0" />
							</td>
						</tr>
						<tr valign="top">
							<td width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="7" alt="" border="0" />
							</td>
						</tr>


				  <tr valign="top">
							<td width="228">
							<?php if (!empty($parameters["intro_formation"])) { $renderer = new CatalyzEmailRenderer("Arial", "#333333", "line-height: 14px; font-size: 11px; color: #333333"); echo $renderer->renderWysiwyg(html_entity_decode($parameters["intro_formation"]), "#333333"); } ?>
					</td>
						</tr>
						<tr valign="top">
							<td height="1" width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_dotted.gif" width="228" height="1" alt="" border="0" />
							</td>
						</tr>
						<?php if (!empty($parameters["formation"]) && is_array($parameters["formation"])):?><?php foreach($parameters["formation"] as $formation): ?><tr valign="top">
							<td width="228">
								<?php if(!empty($formation["title"])){ ?><font face="Arial" style="font-style:italic; font-weight:bold; line-height: 14px; font-size: 12px;" size="2" color="#669900">
									<br /><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_2.gif" width="8" height="7" alt="" border="0" />
										<?php
										if(!empty($formation["url"])){
											printf('<a href="%s">%s</a>', czWidgetFormLink::displayLink($formation["url"]), $formation["title"]);
										}else{
											echo $formation["title"];
										}
										  ?>
								</font>
								<?php } ?>
								<font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#666666">
										<?php if(!empty($formation["date_formation"])){ ?><?php echo $formation["date_formation"]; ?><?php } ?> <?php if(!empty($formation["organisme_nom"])){ ?>(<?php echo $formation["organisme_nom"]; ?>) <?php } ?><br /><br />
								</font>
							</td>
						</tr>
                        <?php endforeach;?><?php endif; ?>
						<tr valign="top">
							<td height="1" width="228">
								<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_dotted.gif" width="228" height="1" alt="" border="0" />
							</td>
						</tr>
<?php } ?>
						<tr valign="top">
							<td width="228">
							<?php if (!empty($parameters["logos_formations"])) { $renderer = new CatalyzEmailRenderer("Arial, sans-serif", "", "line-height:14px; font-size:11px; color:#333333"); echo $renderer->renderWysiwyg(html_entity_decode($parameters["logos_formations"]), ""); } ?>
							</td>
						</tr>

							<tr valign="top">
											<td width="228">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_h.gif" width="228" height="20" alt="" border="0" />
											</td>
										</tr>
							<?php if (!empty($parameters["bottom_actu"]) && is_array($parameters["bottom_actu"])): ?><tr valign="top">
							<td width="228">
								<table width="228" cellspacing="0" cellpadding="0" border="0">
									<tr valign="top">
											<td width="228" colspan="9">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/encart_top.gif" width="228" height="15" alt="" border="0" />
											</td>
										</tr>
										<tr valign="top">
											<td width="1" bgcolor="#d2d2d2">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg1.gif" width="1" height="1" alt="" border="0" />
											</td>
											<td width="1" bgcolor="#636363">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg2.gif" width="1" height="1" alt="" border="0" />
											</td>
											<td width="1" bgcolor="#8a8a8a">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg3.gif" width="1" height="1" alt="" border="0" />
											</td>
											<td width="4">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="4" height="1" alt="" border="0" />
											</td>
											<td width="214" bgcolor="#FFFFFF">
												<table width="214" cellspacing="0" cellpadding="0" border="0">

						<tr valign="top">
														<td width="214">
															<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bullet_4.gif" width="18" height="11" alt="" border="0" />
															<font face="Times New Roman" style="line-height: 24px; font-size: 22px;" size="2" color="#333333">
																<?php if(!empty($parameters["actu"])){ ?><?php echo $parameters["actu"]; ?><?php } ?><br />
															</font>
														</td>
													</tr>

													<tr valign="top">

														<td width="214">
															<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_short_grey.gif" width="214" height="1" alt="" border="0" />
															<br />
														</td>
													</tr>

													<?php foreach($parameters["bottom_actu"] as $position => $bottom_actu): ?>
<?php if($position>0): ?>
													<tr valign="top">
														<td width="214">
													<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_dotted.gif" width="214" height="1" alt="" border="0" /><br />
													</td>
													</tr>
													<?php endif; ?>
<tr valign="top">
														<td width="214">
															<font face="Arial" style="font-weight:bold; line-height: 16px; font-size: 14px;" size="2" color="#669900">
															<br /><?php if(!empty($bottom_actu["title"])){ ?><?php echo $bottom_actu["title"]; ?><?php } ?><br />
															</font>
															<font face="Arial" style="line-height: 13px; font-size: 11px;" size="2" color="#333333">
			     											<?php echo nl2br(htmlentities(utf8_decode($bottom_actu["content"]))); ?><br /><br />
			     											</font>
			     										</td>
													</tr>
                                                    <?php endforeach;?>
													<tr valign="top">

												</table>

											</td>
											<td width="4">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="4" height="1" alt="" border="0" />
											</td>
											<td width="1" bgcolor="#8a8a8a">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg3.gif" width="1" height="1" alt="" border="0" />
											</td>
											<td width="1" bgcolor="#636363">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg2.gif" width="1" height="1" alt="" border="0" />
											</td>
											<td width="1" bgcolor="#d2d2d2">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/bg1.gif" width="1" height="1" alt="" border="0" />
											</td>
										</tr>
										<tr valign="top">
											<td width="228" colspan="9">
												<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/encart_bottom.gif" width="228" height="54" alt="" border="0" />
											</td>
										</tr>
									</table>
								</td>
							</tr><?php endif; ?>

				</table>






			</td>
			<td style="line-height:0; font-size: 0;" width="11" bgcolor="#f7f7f7">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_light.gif" width="11" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/footer_top.gif" width="652" height="40" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="50" bgcolor="#A3C200">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td width="550" bgcolor="#A3C200" align="center">
				<?php if (!empty($parameters["footer"])) { $renderer = new CatalyzEmailRenderer("Tahoma, sans-serif", "#ffffff", "line-height:13px; font-size:11px; color=#ffffff"); echo $renderer->renderWysiwyg(html_entity_decode($parameters["footer"]), ""); } ?>
			</td>
			<td style="line-height:0; font-size: 0;" width="50" bgcolor="#A3C200">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_green.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
			<td style="line-height:0; font-size: 0;" width="1" bgcolor="#808080">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_grey.gif" width="1" height="1" alt="" style="display:block;" border="0" />
			</td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="5">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/footer_bottom.gif" width="652" height="35" alt="" style="display:block;" border="0" />
			</td>
		</tr>
	</table>

	<table width="652" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
			<td width="470" align="center">
				<font face="Tahoma" style="font-size: 9px;line-height: 12px;" size="2" color="#999999">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification<br/>et d'opposition aux informations vous concernant qui peut s'exercer par e-mail à <?php if(!empty($parameters["unsubscribe_email"])){ ?><a style="text-decoration:none; color:#999999;" href="mailto:<?php echo $parameters["unsubscribe_email"]; ?>" target="_blank"><?php echo $parameters["unsubscribe_email"]; ?></a><?php } ?><br/>ou en cliquant sur <a target="_blank" href="#UNSUBSCRIBE#" style=" color:#999999;">ce lien de désinscription</a>
				</font>
			</td>
			<td style="line-height:0; font-size: 0;" width="85"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="85" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>
		<tr>
			<td style="line-height:0; font-size: 0;" width="652" colspan="3"><img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/smti82Plugin/images/interne/sep_w.gif" width="1" height="10" alt="" style="display:block;" border="0" /></td>
		</tr>
	</table>
</body>
</html>