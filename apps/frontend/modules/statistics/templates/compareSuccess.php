<?php
$campaign = $campaign->getRawValue();
$campaign2 = $campaign2->getRawValue();
$evolution = $evolution->getRawValue();

 ?>

<div class="page-header">
	<h1>Comparaison des performances de campagnes</h1>
</div>

<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Campagne</th>
	<th>Cibles</th>
	<th>Ouverture</th>
	<th>Clicks</th>
	<th>Conversions</th>
	<th>Désinscription</th>
	<th>Erreurs</th>
	<th>Taux d'ouverture</th>
	<th>Taux de clics</th>
	<th>Taux de réactivité</th>
</tr>
</thead>
<tr>
	<td><?php echo link_to($campaign->getName(), '@campaign_statistics_summary?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getPreparedTargetCount(), '@campaign_statistics_targets?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getOpenedCount(), '@campaign_statistics_views?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getClickedCount(), '@campaign_statistics_show_links?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getLandingActionCount(), '@campaign_statistics_landing_actions?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getUnsubscribeCount(), '@campaign_statistics_unsubscribe?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign->getAllBouncesCount(), '@campaign_statistics_return_errors?slug='.$campaign->getSlug()); ?></td>
	<td style="text-align: right"><?php echo $campaign->getOpenRate(true) ?></td>
	<td style="text-align: right"><?php echo $campaign->getClickRate(true) ?></td>
	<td style="text-align: right"><?php echo $campaign->getReactivityRate(true) ?></td>
</tr>
<tr>
	<td><?php echo link_to($campaign2->getName(), '@campaign_statistics_summary?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getPreparedTargetCount(), '@campaign_statistics_targets?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getOpenedCount(), '@campaign_statistics_views?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getClickedCount(), '@campaign_statistics_show_links?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getLandingActionCount(), '@campaign_statistics_landing_actions?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getUnsubscribeCount(), '@campaign_statistics_unsubscribe?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo link_to($campaign2->getAllBouncesCount(), '@campaign_statistics_return_errors?slug='.$campaign2->getSlug()); ?></td>
	<td style="text-align: right"><?php echo $campaign2->getOpenRate(true) ?></td>
	<td style="text-align: right"><?php echo $campaign2->getClickRate(true) ?></td>
	<td style="text-align: right"><?php echo $campaign2->getReactivityRate(true) ?></td>
</tr>
<tfoot>
<tr>
	<td>Evolution</td>
	<td style="text-align: right"><?php echo $evolution['target']; ?></td>
	<td style="text-align: right"><?php echo $evolution['opened']; ?></td>
	<td style="text-align: right"><?php echo $evolution['click']; ?></td>
	<td style="text-align: right"><?php echo $evolution['landing']; ?></td>
	<td style="text-align: right"><?php echo $evolution['unsubscribe']; ?></td>
	<td style="text-align: right"><?php echo $evolution['errors']; ?></td>
	<td style="text-align: right"><?php echo $evolution['openRate']; ?></td>
	<td style="text-align: right"><?php echo $evolution['clickRate']; ?></td>
	<td style="text-align: right"><?php echo $evolution['reactivity']; ?></td>
</tr>
</tfoot>
</table>

<a href="<?php echo url_for('@campaign_statistics_export'); ?>" class="btn btn-primary">Exporter les statistiques de toutes les campagnes</a>