<?php
$campaign = $campaign->getRawValue();
$campaign2 = $campaign2->getRawValue();

 ?>

<div class="page-header">
	<h1>Comparaison des performances de campagnes</h1>
</div>

<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Campagne</th>
	<th>Cibles</th>
	<th>Sans ouverture</th>
	<th>Ouverture</th>
	<th>Clicks</th>
	<th>Taux de réactivité</th>
	<th>Désinscription</th>
</tr>
</thead>
<tr>
	<td><?php echo $campaign->getName() ?></td>
	<td><?php echo $campaign->getPreparedTargetCount() ?></td>
	<td></td>
	<td><?php echo $campaign->getOpenedCount() ?></td>
	<td><?php echo $campaign->getClickedCount() ?></td>
	<td></td>
	<td><?php echo $campaign->getUnsubscribeCount() ?></td>
</tr>
<tr>
	<td><?php echo $campaign2->getName() ?></td>
	<td><?php echo $campaign2->getPreparedTargetCount() ?></td>
	<td></td>
	<td><?php echo $campaign2->getOpenedCount() ?></td>
	<td><?php echo $campaign2->getClickedCount() ?></td>
	<td></td>
	<td><?php echo $campaign2->getUnsubscribeCount() ?></td>
</tr>
<tfoot>
<tr>
	<td>Evolution</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</tfoot>
</table>