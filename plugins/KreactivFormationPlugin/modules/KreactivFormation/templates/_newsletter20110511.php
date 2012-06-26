<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body link="#222221" alink="#222221" vlink="#222221">

<?php $parameters = unEscape($parameters); ?>

	<table width="600" bgcolor="#fffce2" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="center">
				<font face="Arial" style="line-height: 14px; font-size: 11px; " size="2" color="#6e685a">
					Si vous avez des difficultés pour visualiser ce message et ses images. <a style="color:#6e685a;" href="#VIEW_ONLINE#"><font color="#6e685a">Cliquez ici.</font></a>
				</font>
			</td>
		</tr>
	</table>
	<table width="600" bgcolor="#b6ae92" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/header_top.gif" alt="" width="600" height="109" border="0" /></td>
		</tr>
		<tr>
			<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_top.gif" alt="" width="5" height="1" border="0" /></td>
			<td width="158">
				<?php if (isset($parameters['title'])) {
					printf('<font face="Arial" style="line-height: 15px; font-size: 11px; " size="2" color="#212221">%s</font>', $parameters['title']);
				} ?>
			</td>
			<td width="437"><img src="/KreactivFormation/images/newsletter20110511/header_bottom_right.gif" alt="" width="437" height="41" border="0" /></td>
		</tr>
	</table>
	<table width="600" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep.gif" alt="" width="1" height="1" border="0" /></td>
		</tr>
		<tr valign="top">
			<!-- PREMIERE COLONNE  MARRON CLAIR -->
			<td bgcolor="#c9c09e" width="344">
				<?php if (isset($parameters['main_content'])) : ?>
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<?php foreach($parameters['main_content'] as $article): ?>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="1" border="0" /></td>
						<td width="334">
							<font face="Arial" style="line-height: 28px; font-size: 24px; " size="2" color="#fffce2">
								<?php echo $article['section'] ?><img src="/KreactivFormation/images/newsletter20110511/swirls_light.gif" alt="" width="35" height="19" border="0" />
							</font>
						</td>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="1" border="0" /></td>
					</tr>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="1" border="0" /></td>
						<td width="334">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr valign="top">
									<td width="105"><?php if($article['illustration']){
											echo thumbnail_tag($article['illustration'], 105, 200, array('border' => 0, 'alt' => ''));
									} ?></td>
									<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="1" border="0" /></td>
									<td width="224">

										<font face="Arial" style="line-height: 22px; font-size: 18px; " size="2" color="#222221">
											<?php echo $article['title'] ?>
										</font>

										<font face="Arial" style="line-height: 15px; font-size: 12px; " size="2" color="#222221">
											<br /><?php echo $article['introduction'] ?>
										</font>

										<?php
										if (isset($article['link']) && $article['link'] != '') {
											printf('<font face="Arial" style="line-height: 15px; font-weight: bold; font-size: 12px; " size="2" color="#222221"><a style="color:#222221;" href="%s"><font color="#222221">%s</font></a></font>', $article['link'],isset($article['link_caption'])?$article['link_caption']:'');
										}
										 ?>

									</td>
								</tr>
							</table>
						</td>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="5" height="1" border="0" /></td>
					</tr>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="5" height="1" border="0" /></td>
						<td width="334"><img src="/KreactivFormation/images/newsletter20110511/filet.gif" alt="" width="334" height="1" border="0" /></td>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="5" height="1" border="0" /></td>
					</tr>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_light.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<?php endforeach; ?>

				</table>
				<?php endif ?>
			</td>
			<!-- FILET BLANC-->
			<td width="1"><img src="/KreactivFormation/images/newsletter20110511/sep.gif" alt="" width="1" height="1" border="0" /></td>


			<!-- DEUXIEME COLONNE MARRON FONCE-->
			<td valign="top" bgcolor="#5e584a" width="255">
				<?php if (isset($parameters['case_study'])) : ?>
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="1" border="0" /></td>
						<td width="245">
							<font face="Arial" style="line-height: 28px; font-size: 24px; " size="2" color="#fffce2">
								Réalisations<img src="/KreactivFormation/images/newsletter20110511/swirls_dark.gif" alt="" width="35" height="19" border="0" />
							</font>
						</td>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="1" border="0" /></td>
					</tr>
					<?php foreach($parameters['case_study'] as $casestudy): ?>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="1" border="0" /></td>
						<td colspan="2"><?php if($casestudy['illustration']){
							echo thumbnail_tag($casestudy['illustration'], 249, 249, array('border' => 0, 'alt' => ''));
						} ?></td>
					</tr>
					<tr><td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="5" border="0" /></td></tr>
					<tr>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="1" border="0" /></td>
						<td width="245">
							<font face="Arial" style="line-height: 22px; font-size: 18px; " size="2" color="#b1ab8f">
								<?php echo $casestudy['title'] ?>
							</font>
							<font face="Arial" style="line-height: 15px; font-size: 12px; " size="2" color="#b1ab8f">
								<br/><?php echo $casestudy['introduction'] ?>
							</font>
							<?php
							if (isset($casestudy['link']) && $casestudy['link'] != '') {
								printf('<font face="Arial" style="line-height: 15px; font-weight: bold; font-size: 12px; " size="2" color="#b1ab8f"><a style="color:#b1ab8f;" href="%s"><font color="#b1ab8f">%s</font></a><br/><br/></font>', $casestudy['link'],isset($casestudy['link_caption'])?$casestudy['link_caption']:'');
							}
							?>
						</td>
						<td width="5"><img src="/KreactivFormation/images/newsletter20110511/sep_dark.gif" alt="" width="2" height="1" border="0" /></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php endif ?>
			</td>
		</tr>
		<tr>
			<td colspan="3"><img src="/KreactivFormation/images/newsletter20110511/sep.gif" alt="" width="1" height="1" border="0" /></td>
		</tr>
	</table>
	<table width="600" bgcolor="#fffce2" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td><img src="/KreactivFormation/images/newsletter20110511/footer_top.gif" alt="" width="600" height="51" border="0" /></td>
		</tr>
		<tr align="center">
			<td>
				<font face="Arial" style="line-height: 13px; font-weight: bold; font-size: 10px; " size="2" color="#847b5b">
					Kreactiv' - 10, Place Nationale - 82 000 Montauban - Tél. : 05 63 66 71 52 -
					<a style="color:#847b5b;text-decoration: none;"  target="_blank" href="mailto:contact@kreactiv.fr"><font color="#847b5b">contact@kreactiv.fr</font></a>
					 <br />
				</font>
				<font face="Arial" style="line-height: 13px; font-weight: bold; font-size: 12px; " size="2" color="#1d1d1b">
				<a style="color:#1d1d1b;text-decoration: none;"   target="_blank"  href="http://www.kreactiv.fr"><font color="#1d1d1b">www.kreactiv.fr</font></a>
					  <br />
				</font>
				<font face="Arial" style="line-height: 13px; font-size: 10px; " size="2" color="#847b5b">
					Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification et <br />d'opposition aux informations vous concernant qui peut s'exercer par e-mail à contact@kreactiv.fr <br />ou par courrier en indiquant votre nom et prénom.<br /><br />si vous souhaitez vous désinscrire, <a style="color:#847b5b;"   href="#UNSUBSCRIBE#"><font color="#847b5b">Cliquez ici.</font></a><br />
				</font>
			</td>
		</tr>
	</table>
</body>
</html>