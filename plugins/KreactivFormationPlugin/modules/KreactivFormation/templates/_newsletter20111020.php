<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<table width="599" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="2" align="center">
				<font face="Trebuchet MS, Arial" style="line-height: 12px; font-size: 9px;" size="2" color="#cccccc">
					Si vous avez des difficult&eacute;s pour visualiser ce message et ses images, <a style="color:#cccccc;" href="#VIEW_ONLINE#" target="_blank">consultez la page suivante</a>.
				</font>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 0; line-height: 0;">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_01.png" width="599" height="113" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 0; line-height: 0;">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_02.jpg" width="599" height="190" alt="" border="0" />
			</td>
		</tr>
		<tr bgcolor="#bb8f46">
			<td width="383" align="center">
				<?php if (!empty($parameters['title'])) {
					printf('<font face="Trebuchet MS, Arial" style="line-height: 26px; font-size: 26px; font-weight:bold; text-align:center; " size="2" color="#FFFFFF">%s</font>', $parameters['title']);
				} ?>
			</td>
			<td width="216" style="font-size: 0; line-height: 0;" valign="top" align="right">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_03.png" width="216" height="38" alt="" border="0" />
			</td>
		</tr>
	</table>
	<table width="599" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_w.gif" width="1" height="15" alt="" border="0" />
			</td>
		</tr>
		<tr valign="top">
			<td width="15" style="font-size: 0; line-height: 0;">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_w.gif" width="15" height="1" alt="" border="0" />
			</td>
			<td width="305">
				<?php if (!empty($parameters['page_content'])) {
					printf('<font face="Trebuchet MS, Arial" style="line-height: 18px; font-size: 12px; " size="2" color="#3d3d3f">%s</font>', $parameters['page_content']);
				} ?>
			</td>
			<td width="15" style="font-size: 0; line-height: 0;">
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_w.gif" width="15" height="1" alt="" border="0" />
			</td>
			<td valign="top" width="264" bgcolor="#e5e5e5">
				<table width="264" bgcolor="#e5e5e5" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="3" width="264" style="font-size: 0; line-height: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_04.png" width="264" height="52" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />
						</td>
					</tr>
					<tr>
						<td width="10">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="1" alt="" border="0" />
						</td>
						<td width="247" align="center">
							<?php
							if (!empty($parameters['date']) || !empty($parameters['hour'])) {
								echo '<font face="Trebuchet MS, Arial" style="line-height: 20px; font-size: 18px; " size="2" color="#bb8f46">';
								if (!empty($parameters['date'])) {
									printf('%s',$parameters['date']);
								}
								if (!empty($parameters['hour'])) {
									printf('<br />%s',$parameters['hour']);
								}
								echo '</font>';
							}
							if (!empty($parameters['location'])) {
								printf('<font face="Trebuchet MS, Arial" style="line-height: 20px; font-size: 15px; " size="2" color="#bb8f46"><br/>%s</font>',$parameters['location']);
							}
						 ?>
						</td>
						<td width="7">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="7" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="3" width="264" style="font-size: 0; line-height: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_06.png" width="264" height="10" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />

						</td>
					</tr>
					<tr>
						<td width="10">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="1" alt="" border="0" />
						</td>
						<td width="247" align="center">
							<?php
								if (!empty($parameters['top_content'])) {
									printf('<font face="Trebuchet MS, Arial" style="line-height: 20px; font-size: 14px; " size="2" color="#bb8f46">%s</font>',$parameters['top_content']);
								}
								if (!empty($parameters['contact']) || !empty($parameters['location'])) {
									echo '<font face="Trebuchet MS, Arial" style="line-height: 20px; font-size: 18px; " size="2" color="#bb8f46">';
									if (!empty($parameters['contact'])) {
										printf('<br/><a style="color: #bb8f46" href="mailto:%s">%s</a>',$parameters['contact'],$parameters['contact'] );
									}
									if (!empty($parameters['tel'])) {
										printf('<br/>%s',$parameters['tel']);
									}
									echo '</font>';
								}
							 ?>
						</td>
						<td width="7">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="7" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="3" width="264" style="font-size: 0; line-height: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_06.png" width="264" height="10" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />

						</td>
					</tr>
					<tr>
						<td width="10">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="1" alt="" border="0" />
						</td>
						<td width="247" align="center">
							<?php
							if (!empty($parameters['bottom_content'])) {
								printf('<font face="Trebuchet MS, Arial" style="line-height: 20px; font-size: 14px; " size="2" color="#bb8f46">%s</font>',$parameters['bottom_content']);
							}
							?>
						</td>
						<td width="7">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="7" height="1" alt="" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="3" width="264" style="font-size: 0; line-height: 0;">
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_g.gif" width="10" height="10" alt="" border="0" />
							<br/>
							<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/img_05.png" width="264" height="52" alt="" border="0" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="599" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr  style="font-size: 0; line-height: 0;">
			<td>
				<img src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/KreactivFormation/images/newsletter20111020/sep_w.gif" width="1" height="20" alt="" border="0" />
			</td>
		</tr>
		<tr>
			<td align="center">
				<font face="Trebuchet MS, Arial" style="line-height: 12px; font-size: 9px;" size="2" color="#cccccc">Conformément à la loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification et d'opposition aux
informations vous concernant qui peut s'exercer par e-mail à <a style="color:#cccccc;" href="mailto:contact@kreactiv.fr" target="_blank">contact@kreactiv.fr</a> ou par courrier en indiquant votre nom et prénom.<br />
Si vous souhaitez vous désinscrire, <a style="color:#cccccc;" href="#UNSUBSCRIBE#" target="_blank">cliquez ici</a>.
				</font>
			</td>
		</tr>
	</table>
</body>
</html>
