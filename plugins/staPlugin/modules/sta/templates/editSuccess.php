<?php
use_javascripts_for_form($form);
use_stylesheets_for_form($form);
use_stylesheet('/staPlugin/css/forms.css','last');

printf('<form action="%s" method="post">'	,url_for('@sta_ty?key='.$key)); ?>

<table align="center" width="400" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2"><img src="/staPlugin/images/campaign01/header2.jpg" width="400" height="108" alt="" border="0" /><br/><br/></td>
	</tr>
	<tr>
		<td colspan="2"><p>
		<font style="font-size: 12px;line-height: 16px;" size="2" color="#333333" face="Trebuchet MS">
		<?php printf('%s %s %s', $user->getCustom5(), $user->getLastName(), $user->getFirstName()) ?>,<br/>
L'adéquation des procédures assurantielles de nos services aux normes légales et réglementaires en vigueur est l'un des objectifs permanents de la S.T.A et du Collectif GROUPAERO.<br/>
<br/>
Les articles L.520-1 et L.132-27-1 du Code des Assurances et les articles L.561-10.2 et R.561-18 du Code Monétaire et Financier contraignent les intermédiaires en Assurances au devoir de conseil, à l'obligation de mise en garde et de surveillance et à la lutte contre le blanchiment des capitaux et le financement du terrorisme.<br/>
<br/>
Pour pallier à l'évolution permanente des réglementations telle que la 'Réforme des règles européennes des sociétés d’assurances SOLVENCY 2', nous souhaitons anticiper en effectuant une mise à niveau de nos bases de données.<br/>
<br/>
Merci de remplir chaque champ libre :
</font>
</p>
</td>
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
				<font style="font-size: 9px;line-height: 12px;" size="2" color="#ffffff" face="Trebuchet MS"><br/>SOCIÉTÉ TOULOUSAINE D'ASSURANCES<br/>18 Rue Tolosane - B.P 50304 - 31003 TOULOUSE Cedex 6<br>
Téléphone : 05 34 31 71 91 - Fax : 05 34 31 71 90<br/><br/></font>
		</td>
	</tr>
</table>
</form>