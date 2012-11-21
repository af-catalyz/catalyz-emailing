<?php
use_javascripts_for_form($form);
use_stylesheets_for_form($form);

printf('<form action="%s" method="post">'	,url_for('@sta_ty?key='.$key)); ?>

<table align="center" width="400" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2"><img src="/staPlugin/images/campaign01/header2.jpg" width="400" height="108" alt="" border="0" /><br/><br/></td>
	</tr>
	<tr valign="top">
		<td>
			<?php echo $form ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php printf('<div style="margin-bottom: 0" class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/></div>', __('Sauvegarder')) ?>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2" bgcolor="#e16a02">
				<font style="font-size: 9px;line-height: 12px;" size="2" color="#ffffff" face="Arial"><br/>SOCIÉTÉ TOULOUSAINE D'ASSURANCES<br/>18 Rue Tolosane - B.P 50304 - 31003 TOULOUSE Cedex 6<br>
Téléphone : 05 34 31 71 91 - Fax : 05 34 31 71 90<br/><br/></font>
		</td>
	</tr>
</table>
</form>