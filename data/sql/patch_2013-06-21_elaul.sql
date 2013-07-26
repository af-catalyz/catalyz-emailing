SET AUTOCOMMIT=0;
START TRANSACTION;

update campaign set content = replace(content, '</item>', '<references_title>s:12:"R&#xE9;f&#xE9;rences";</references_title><atouts_title>s:10:"Nos atouts";</atouts_title><legals_top>s:109:"&lt;p&gt;Si les images ne s\'affichent pas correctement, &lt;a href="#VIEW_ONLINE#" target="_blank"&gt;cliquez ici&lt;/a&gt;&lt;/p&gt;";</legals_top><baseline>s:62:"L\'ECLAIRAGE - LE BALISAGE&#xD;
ET L\'ENERGIE SECOURUE A VOS MESURES";</baseline><legals_bottom>s:403:"&lt;p&gt;Conform&amp;eacute;ment &amp;agrave; la loi Informatique et Libert&amp;eacute;s du 06/01/1978, vous disposez d\'un droit d\'acc&amp;egrave;s, de rectification et d\'opposition aux informations vous concernant qui peut s\'exercer par e-mail &amp;agrave; &lt;a href="mailto:contact@elaul.fr" target="_blank"&gt;contact@elaul.fr&lt;/a&gt; ou en cliquant sur ce &lt;a href="#UNSUBSCRIBE#" target="_blank"&gt;lien de d&amp;eacute;sinscription&lt;/a&gt;.&lt;/p&gt;";</legals_bottom></item>') where template_id = 2;


UPDATE `campaign_template` SET `template` = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>#SUBJECT#</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#f0f0f0" link="#102b44" vlink="#102b44" alink="#102b44">
	<table width="680" bgcolor="#f0f0f0" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="center">
				<font face="Arial" style="line-height: 14px; font-size: 11px;" size="2" color="#102b44">Si les images ne s''affichent pas correctement, <a style="color:#102b44;" href="#VIEW_ONLINE#" target="_blank">cliquez ici</a><br />

				</font>
				<img src="/elaulPlugin/images/campaign02/sep_bg.gif" width="1" height="5" alt="" border="0" />
			</td>
		</tr>
	</table>

	<table width="680" bgcolor="#B1D5F5" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="font-size: 0; line-height: 0;">
			<td width="37"><img src="/elaulPlugin/images/campaign02/header_1.jpg" width="37" height="138" alt="" border="0" /></td>

			<td width="171">
				<a href="http://www.elaul.fr" target="_blank">
					<img src="/elaulPlugin/images/campaign02/header_2.jpg" width="171" height="138" alt="" border="0" />
				</a>
			</td>
			<td width="64"><img src="/elaulPlugin/images/campaign02/header_3.jpg" width="64" height="138" alt="" border="0" /></td>
			<td valign="top" width="408" bgcolor="#102C44">
				<table bgcolor="#102C44" cellpadding="0" cellspacing="0" width="408" border="0">
					<tr valign="top" style="font-size: 0; line-height: 0;">
						<td><img src="/elaulPlugin/images/campaign02/header_4_s.jpg" width="408" height="96" alt="" border="0" /></td>
					</tr>
					<tr>
						<td valign="middle" align="center">
							<font face="Arial" style="line-height: 20px; font-size: 16px; " size="2" color="#FFFFFF">L''ECLAIRAGE - LE BALISAGE<br/>ET L''ENERGIE SECOURUE A VOS MESURES</font>
						</td>
					</tr>
				</table>
			</td>
			</td>
		</tr>
		<tr>

			<td style="font-size: 0; line-height: 0;"><img src="/elaulPlugin/images/campaign02/header_5.jpg" width="37" height="30" alt="" border="0" /></td>
			<td style="font-size: 0; line-height: 0;">
				<a href="http://www.elaul.fr" target="_blank">
					<img src="/elaulPlugin/images/campaign02/header_6.jpg" width="171" height="30" alt="" border="0" />
				</a>
			</td>
			<td style="font-size: 0; line-height: 0;"><img src="/elaulPlugin/images/campaign02/header_7.jpg" width="64" height="30" alt="" border="0" /></td>
			<td bgcolor="#ebebeb" align="left">
				<table width="408" bgcolor="#ebebeb" cellspacing="0" cellpadding="0" border="0">

					<tr align="center">
						<td width="22" valign="bottom"><img src="/elaulPlugin/images/campaign02/header_courbe.jpg" width="22" height="30" alt="" border="0" /></td>
						<td width="128">
							<font face="Arial" style="line-height: 14px; font-size: 10px; " size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">
									&#201;CLAIRAGE ET BALISAGE
								</a>
							</font>
						</td>

						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="128">
							<font face="Arial" style="line-height: 14px; font-size: 10px; " size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">
									ENERGIE SECOURUE
								</a>
							</font>
						</td>
						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>

						<td width="128">
							<font face="Arial" style="line-height: 14px; font-size: 10px; " size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">
									MAT&#201;RIEL ATEX
								</a>
							</font>
						</td>
					</tr>
				</table>

			</td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td><img src="/elaulPlugin/images/campaign02/header_8.jpg" width="37" height="29" alt="" border="0" /></td>
			<td>
				<a href="http://www.elaul.fr" target="_blank">
					<img src="/elaulPlugin/images/campaign02/header_9.jpg" width="171" height="29" alt="" border="0" />
				</a>
			</td>

			<td colspan="2"><img src="/elaulPlugin/images/campaign02/header_10.jpg" width="472" height="29" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="680" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
		<tr>

			<td style="font-size: 0; line-height: 0;" width="29"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="580">
				<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#FFFFFF">Le Lorem Ipsum est simplement du faux texte employ&#233; dans la composition standard de l''imprimerie depuis les ann&#233;es 1500 quand un peintre anonyme assembla ensemble d'' un livre sp&#233;cimen de polices de texte.
				</font>
			</td>
			<td style="font-size: 0; line-height: 0;" width="71"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>

		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="680" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="30" alt="" border="0" /></td>
			<td colspan="3" bgcolor="#ebebeb"><img src="/elaulPlugin/images/campaign02/sep_grey.gif" width="1" height="30" alt="" border="0" /></td>

		</tr>
		<tr valign="top">
			<td style="font-size: 0; line-height: 0;" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="328">
				<table width="328" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td style="font-size: 0; line-height: 0;" width="122"><img src="/elaulPlugin/images/campaign02/img_05.jpg" width="122" height="122" alt="" border="0" /></td>
						<td style="font-size: 0; line-height: 0;" width="14"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="192">

							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 1
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/pdf.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 18px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">T&#233;l&#233;charger la documentation</a>

							</font>
							<br />
							<img src="/elaulPlugin/images/campaign02/calculate.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Demandez un devis</a>
							</font>
						</td>
					</tr>

					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3">
							<img src="/elaulPlugin/images/campaign02/left_sep.png" width="328" height="63" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td style="font-size: 0; line-height: 0;" width="122"><img src="/elaulPlugin/images/campaign02/img_06.jpg" width="122" height="122" alt="" border="0" /></td>
						<td style="font-size: 0; line-height: 0;" width="14"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="192">

							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 2
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/pdf.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 18px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">T&#233;l&#233;charger la documentation</a>

							</font>
							<br />
							<img src="/elaulPlugin/images/campaign02/calculate.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Demandez un devis</a>
							</font>
						</td>
					</tr>

					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3">
							<img src="/elaulPlugin/images/campaign02/left_sep.png" width="328" height="63" alt="" border="0" />
						</td>
					</tr>
					<tr valign="top">
						<td style="font-size: 0; line-height: 0;" width="122"><img src="/elaulPlugin/images/campaign02/img_07.jpg" width="122" height="122" alt="" border="0" /></td>
						<td style="font-size: 0; line-height: 0;" width="14"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="192">

							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 3
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/pdf.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 18px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">T&#233;l&#233;charger la documentation</a>

							</font>
							<br />
							<img src="/elaulPlugin/images/campaign02/calculate.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Demandez un devis</a>
							</font>
						</td>
					</tr>

					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3">
							<img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="30" alt="" border="0" />
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<table width="328" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
								<tr>

									<td style="font-size: 0; line-height: 0;" width="45" bgcolor="#FFFFFF"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
									<td style="font-size: 0; line-height: 0;" width="22" valign="top"><img src="/elaulPlugin/images/campaign02/orange_left_courbe.gif" width="22" height="22" alt="" border="0" /></td>
									<td width="188">
										<img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="9" alt="" border="0" />
										<br />
										<font face="Arial" style="line-height: 22px; font-size: 18px;" size="2" color="#FFFFFF">
											<a style="color:#FFFFFF;" href="#" target="_blank">Consultez<br />le catalogue complet</a>
										</font>

										<br />
										<img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="9" alt="" border="0" />
									</td>
									<td style="font-size: 0; line-height: 0;" width="22" valign="bottom"><img src="/elaulPlugin/images/campaign02/orange_right_courbe.gif" width="22" height="22" alt="" border="0" /></td>
									<td style="font-size: 0; line-height: 0;" width="51" bgcolor="#FFFFFF"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="10" alt="" border="0" /></td>
								</tr>
							</table>
						</td>
					</tr>

				</table>
			</td>
			<td style="font-size: 0; line-height: 0;" width="28"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td style="font-size: 0; line-height: 0;" width="21" bgcolor="#ebebeb"><img src="/elaulPlugin/images/campaign02/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="252" bgcolor="#ebebeb">
				<font face="Arial" style="line-height: 24px; font-size: 20px; font-weight: bold;" size="2" color="#ff8700">Nos atouts
				</font>
				<ul style="color: #102b44;">
					<li>

						<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44">
						1500, quand un peintre anonyme assembla ensemble d&#8217; un livre sp&#233;cimen
						</font>
					</li>
					<li>
						<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44">
						Ensemble des morceaux de texte quand un peintre anonyme assembla ensemble
						</font>

					</li>
					<li>
						<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44">
						Quand un peintre anonyme assembla ensemble des morceaux de texte.
						</font>
					</li>
				</ul>

				<table width="252" bgcolor="#f5f5f5" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr style="font-size: 0; line-height: 0;">

						<td colspan="3" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">
						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="250"><img src="/elaulPlugin/images/campaign02/sep_grey_light.gif" width="1" height="24" alt="" border="0" /></td>
						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr>
						<td style="font-size: 0; line-height: 0;" width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>

						<td width="250" align="center">
							<font face="Arial" style="line-height: 22px; font-size: 18px;font-weight: bold;" size="2" color="#ff8700">Une question ?<br />Contactez-nous au<br />05 63 22 21 21<br /><a style="color:#ff8700;" href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a><br />
							</font>
						</td>
						<td style="font-size: 0; line-height: 0;" width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">

						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="250"><img src="/elaulPlugin/images/campaign02/sep_grey_light.gif" width="1" height="24" alt="" border="0" /></td>
						<td width="1" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
					<tr style="font-size: 0; line-height: 0;">
						<td colspan="3" bgcolor="#dcdcdc"><img src="/elaulPlugin/images/campaign02/border.gif" width="1" height="1" alt="" border="0" /></td>
					</tr>
				</table>
				<br />

				<font face="Arial" style="line-height: 24px; font-size: 20px; font-weight: bold;" size="2" color="#ff8700">R&#233;f&#233;rences
				</font>
				<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />Quand un peintre anonyme assembla ensemble des morceaux de texte.
				</font>
				<br />
				<br />
				<table width="251" bgcolor="#ebebeb" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">
						<td width="67">

							<img src="/elaulPlugin/images/campaign02/logo.png" width="67" height="67" alt="" border="0" />
							<br />
							<font face="Arial" style="line-height: 16px; font-size: 12px; font-weight: bold;" size="2" color="#102b44"><br />Soci&#233;t&#233; 1
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#102b44"><br /><br />1500, quand un peintre anonyme
							</font>
						</td>
						<td style="font-size: 0; line-height: 0;" width="25"><img src="/elaulPlugin/images/campaign02/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>

						<td width="67">
							<img src="/elaulPlugin/images/campaign02/logo.png" width="67" height="67" alt="" border="0" />
							<br />
							<font face="Arial" style="line-height: 16px; font-size: 12px; font-weight: bold;" size="2" color="#102b44"><br />Soci&#233;t&#233; 1
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#102b44"><br /><br />1500, quand un peintre anonyme
							</font>
						</td>

						<td style="font-size: 0; line-height: 0;" width="25"><img src="/elaulPlugin/images/campaign02/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="67">
							<img src="/elaulPlugin/images/campaign02/logo.png" width="67" height="67" alt="" border="0" />
							<br />
							<font face="Arial" style="line-height: 16px; font-size: 12px; font-weight: bold;" size="2" color="#102b44"><br />Soci&#233;t&#233; 1
							</font>
							<font face="Arial" style="line-height: 14px; font-size: 10px;" size="2" color="#102b44"><br /><br />1500, quand un peintre anonyme
							</font>

						</td>
					</tr>
				</table>
			</td>
			<td style="font-size: 0; line-height: 0;" width="21" bgcolor="#ebebeb"><img src="/elaulPlugin/images/campaign02/sep_grey.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="6"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>

	</table>

	<table width="680" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="620">
				<p>
					<font face="Arial" style="line-height: 20px; font-size: 16px;font-weight: bold;" size="2" color="#102b44">Plusieurs variations de Lorem Ipsum peuvent &#234;tre trouv&#233;es ici ou l&#224; pendant le faux texte des ann&#233;es 1500.
					</font>

				</p>
			</td>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="620">
				<table width="620" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0">
					<tr valign="top">

						<td width="122">
							<img src="/elaulPlugin/images/campaign02/img_01.jpg" width="122" height="122" alt="" border="0" />
							<br /><br />
							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 1
							</font>
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />

							<img src="/elaulPlugin/images/campaign02/calendar.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Consultez la fiche</a>
							</font>
						</td>
						<td style="font-size: 0; line-height: 0;" width="44"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="122">
							<img src="/elaulPlugin/images/campaign02/img_02.jpg" width="122" height="122" alt="" border="0" />

							<br /><br />
							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 2
							</font>
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/calendar.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">

								<a style="color:#102b44;" href="#" target="_blank">Consultez la fiche</a>
							</font>
						</td>
						<td style="font-size: 0; line-height: 0;" width="44"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="122">
							<img src="/elaulPlugin/images/campaign02/img_03.jpg" width="122" height="122" alt="" border="0" />
							<br /><br />
							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 3
							</font>

							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>
							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/calendar.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Consultez la fiche</a>
							</font>

						</td>
						<td style="font-size: 0; line-height: 0;" width="44"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
						<td width="122">
							<img src="/elaulPlugin/images/campaign02/img_04.jpg" width="122" height="122" alt="" border="0" />
							<br /><br />
							<font face="Arial" style="line-height: 20px; font-size: 16px; font-weight: bold;" size="2" color="#ff8700">Produit 4
							</font>
							<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44"><br /><br />Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&#233;es 1500.
							</font>

							<br />
							<br />
							<img src="/elaulPlugin/images/campaign02/calendar.png" width="18" height="18" alt="" border="0" />
							<font face="Arial" style="line-height: 15px; font-size: 11px;font-weight: bold;" size="2" color="#102b44">
								<a style="color:#102b44;" href="#" target="_blank">Consultez la fiche</a>
							</font>
						</td>
					</tr>

					<tr style="font-size: 0; line-height: 0;">
						<td colspan="7"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="20" alt="" border="0" /></td>
					</tr>
				</table>
			</td>
			<td style="font-size: 0; line-height: 0;" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3" width="30"><img src="/elaulPlugin/images/campaign02/sep_white.gif" width="1" height="20" alt="" border="0" /></td>

		</tr>
	</table>


	<table width="680" bgcolor="#ff8700" align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="font-size: 0; line-height: 0;" width="110"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="1" alt="" border="0" /></td>
			<td width="483" align="center">
				<p>
					<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#FFFFFF"><strong>ELAUL<br />

L''&#233;clairage, le balisage & l''&#233;nergie secourue &#224; vos mesures</strong><br />
<br />
Elaul scop - Z.I. Nord - Rue Joseph Cugnot - BP 832 - 82008 Montauban Cedex - France<br />
T&#233;l : +33 (0)5 63 22 21 21 - Fax : +33 (0)5 63 22 21 22 - <a style="color:#FFFFFF;" href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a><br />
					</font>
				</p>

			</td>
			<td style="font-size: 0; line-height: 0;" valign="top" width="87"><img src="/elaulPlugin/images/campaign02/footer_courbe.png" width="87" height="94" alt="" border="0" /></td>
		</tr>
		<tr style="font-size: 0; line-height: 0;">
			<td colspan="3"><img src="/elaulPlugin/images/campaign02/sep_orange.gif" width="1" height="20" alt="" border="0" /></td>
		</tr>
	</table>

	<table width="680" bgcolor="#f0f0f0" align="center" cellspacing="0" cellpadding="0" border="0">

		<tr valign="top">
			<td style="font-size: 0; line-height: 0;" valign="top" width="70"><img src="/elaulPlugin/images/campaign02/sep_bg.gif" width="1" height="1" alt="" border="0" /></td>
			<td align="center">
				<img src="/elaulPlugin/images/campaign02/sep_bg.gif" width="1" height="15" alt="" border="0" /><br/>
				<font face="Arial" style="line-height: 14px; font-size: 11px;" size="2" color="#102b44">
				Conform&#233;ment &#224; la loi Informatique et Libert&#233;s du 06/01/1978, vous disposez d''un droit d''acc&#232;s, de rectification et d''opposition aux informations vous concernant qui peut s''exercer par e-mail &#224; <a style="color:#102b44;" href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a>

ou en cliquant sur ce <a style="color:#102b44;" href="#UNSUBSCRIBE#" target="_blank">lien de d&#233;sinscription</a>.
				</font>
			</td>
			<td style="font-size: 0; line-height: 0;" valign="top" width="70"><img src="/elaulPlugin/images/campaign02/sep_bg.gif" width="1" height="1" alt="" border="0" /></td>
		</tr>
	</table>
</body>
</html>' WHERE `campaign_template`.`id` = 1;

COMMIT;

