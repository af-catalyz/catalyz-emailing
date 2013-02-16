<?php include_partial('statistics/header', array('campaign' => $campaign, 'other_campaigns' => $other_campaigns)); ?>

<div class="tabbable">
<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

		<div class="tab-content">
    	<div class="tab-pane active" id="1">
				<p>La liste ci-dessous présente l'ensemble des contacts ciblés par votre campagne.</p>
				<p>Les contacts <?php echo $pager->getFirstIndice() ?> à <?php echo $pager->getLastIndice() ?> (sur <?php echo shortNumberFormat($pager->getNbResults()) ?> au total) sont affichés ci-dessous.</p>
				<table class="table table-striped table-condensed">
				<tr>
					<th width="100">Statut</th>
					<th>Contact</th>
					<th width="100">Envoi</th>
					<th width="100">Ouverture</th>
					<th width="100">Clic</th>
					<?php if(LandingPageUtils::isModuleAvailable()): ?>
					<th width="100">Conversions</th>
					<?php endif; ?>
					<th width="100">Bounce</th>
				</tr>
				<?php foreach($pager->getResults() as /*(CampaignContact)*/$contact):
					$contactObject = /*(Contact)*/$contact->getContact();
					if ($contactObject != null):?>
				<tr>
					<td><?php echo html_entity_decode($contactObject->getStatusIcon()); ?></td>
					<td><?php echo html_entity_decode($contactObject->getFieldValue('FULL_NAME')); ?></td>
					<td><?php echo CatalyzDate::formatShort(strtotime($contact->getSentAt())); ?></td>
					<td><?php echo CatalyzDate::formatShort(strtotime($contact->getViewAt())); ?></td>
					<td><?php echo CatalyzDate::formatShort(strtotime($contact->getClickedAt())); ?></td>
					<?php if(LandingPageUtils::isModuleAvailable()): ?>
					<td><?php echo $contact->getLandingActionLabel(); ?></td>
					<?php endif; ?>
					<td><?php echo html_entity_decode($contact->getBounceLabel()); ?></td>
				</tr>
					<?php endif; ?>
					<?php endforeach; ?>
				</table>
				<?php
printf('<div class="pull-left"><a href="%s" class="btn"><i class="icon-download"></i> %s</a></div>',
url_for('@campaign_statistics_do_export_targets?slug='.$campaign->getSlug()), __('Télécharger la liste'));

				 ?>

				<?php if ($pager->haveToPaginate()): ?>

					<?php
					$route_prefix = "@campaign_statistics_targets?slug=".$campaign->getSlug();

					echo '<div class="pagination pagination-right"><ul>';
					printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page='.$pager->getFirstPage()));

					foreach ($pager->getLinks() as $page){
						printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'&page='.$page));
					}

					printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$pager->getLastPage()));
					echo '</ul></div>';

					?>

					<?php endif ?>
			</div>
    </div>
</div>