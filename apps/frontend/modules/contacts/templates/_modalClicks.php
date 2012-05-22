<?php use_helper('Text') ?>
<?php printf('<p><strong>%1$s</strong> a clické sur le%2$s lien%2$s suivant%2$s de la campagne <a href="%3$s">%4$s</a>:</p>',
$CampaignContact->getContact()->getFullName(),
count($clicks)>1?'s':'',
url_for('@campaign_do_edit?slug='.$CampaignContact->getCampaign()->getSlug()),
$CampaignContact->getCampaign()->getName()
) ?>
<table class="table table-condensed">
	<thead>
		<tr>
			<th width="70%">Lien</th>
			<th width="30%">Date</th>
		</tr>
	</thead>
<?php
foreach($clicks as /*(CampaignClick)*/$click):
?>	<tr>
		<td align="left"><?php echo truncate_text($click->getCampaignLink()->getUrl(),70) ?></td>
		<td align="left"><?php printf('%s %s', __('Click le'), CatalyzDate::formatShortWithTime(strtotime($click->getCreatedAt())))  ?></td>
	</tr>
		<?php endforeach;?>
</table>
