	<?php include_partial('statistics/header', array('campaign' => $campaign, 'other_campaigns' => $other_campaigns)); ?>
<div class="tabbable">
		<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">

    	<?php if ($pager->getNbResults() == 0) : ?>
    	<p>Aucun contact ne s'est désinscrit suite à cette campagne</p>
    	<?php else : ?>
			<?php $pager = $pager->getRawValue() ?>
			<table class="table table-striped table-condensed">
				<tr>
					<th class="span2">Date</th>
					<th>Contact</th>
					<th class="span5">Motif</th>
					<?php if ($list_choices) {
						printf('<th class="span5">%s</th>', __('Listes'));
					} ?>
				</tr>
				<?php foreach($pager->getResults() as /*(CampaignContact)*/$contact):
	$contactObject = /*(Contact)*/$contact->getContact();
	if ($contactObject != null):?>
				<tr>
					<td><?php echo $contact->getUnsubscribedAt('d/m/Y') ?></td>
					<td><?php echo $contactObject->getFieldValue('FULL_NAME'); ?></td>
					<td><?php echo $contact->getRaison() ?></td>
					<?php if ($list_choices) {
						echo '<td>';
						if ($list_choices) {
							$selectedLists = unserialize($contact->getUnsubscribedLists());
							foreach ($list_choices as $listId => $caption){
								printf('<p><i class="icon-%s"></i> %s</p>', !empty($selectedLists[$listId])?'ok':'remove',$caption);
							}
						}
						echo '</td>';
					} ?>

				</tr>
					<?php endif; ?>
					<?php endforeach; ?>
				</table>
				<?php
			printf('<div class="pull-left"><a href="%s" class="btn"><i class="icon-download"></i> %s</a></div>',
				url_for('@campaign_statistics_do_export_unsubscribe?slug='.$campaign->getSlug()), __('Télécharger la liste'));
		?>

				<?php if ($pager->haveToPaginate()): ?>

					<?php
					$route_prefix = "@campaign_statistics_unsubscribe?slug=".$campaign->getSlug();

					echo '<div class="pagination pagination-right"><ul>';
					printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page='.$pager->getFirstPage()));

					foreach ($pager->getLinks() as $page){
						printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'&page='.$page));
					}

					printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$pager->getLastPage()));
					echo '</ul></div>';

					?>

					<?php endif ?>
    	<?php endif; ?>






			</div>
    </div>
</div>