<?php printf('<p><strong>%1$s</strong> a clické sur le%2$s lien%2$s suivant%2$s de la campagne <a href="%3$s">%4$s</a>:</p>',
$CampaignContact->getContact()->getFullName(),
count($clicks)>1?'s':'',
url_for('@campaign_statistics_summary?slug='.$CampaignContact->getCampaign()->getSlug()),
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
foreach($clicks as /*(CampaignClick)*/$click){
	echo '<tr>';
		printf('<td><a href="%s" target="_blank">%s</a></td>' ,$click->getCampaignLink()->getUrl(), $click->getCampaignLink()->getGoogleAnalyticsTerm()?$click->getCampaignLink()->getGoogleAnalyticsTerm():$click->getCampaignLink()->getUrl() );
		printf('<td>%s</td>', CatalyzDate::formatShortWithTime(strtotime($click->getCreatedAt())));
	echo '</tr>';
}
?>

</table>
