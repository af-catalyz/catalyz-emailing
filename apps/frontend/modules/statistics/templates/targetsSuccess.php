<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
  <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

<ul class="nav nav-tabs">
	    <?php
printf('<li><a href="%s">Vue d\'ensemble</a></li>', url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
echo '<li class="active"><a href="#1" data-toggle="tab">Cibles </a></li>';
printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
printf('<li><a href="%s">D&eacute;sinscriptions</a></li>', url_for('@campaign_statistics_unsubscribe?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Erreurs</a></li>', url_for('@campaign_statistics_return_errors?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Configuration des destinataires</a></li>', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Message</a></li>', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
?>
		</ul>

		<div class="tab-content">
    	<div class="tab-pane active" id="1">
				<p>La liste ci-dessous présente l'ensemble des contacts ciblés par votre campagne.</p>
				<p>Les contacts <?php echo $pager->getFirstIndice() ?> à <?php echo $pager->getLastIndice() ?> (sur <?php echo shortNumberFormat($pager->getNbResults()) ?> au total) sont affichés ci-dessous.</p>
				<table class="table table-striped table-condensed">
				<tr>
					<th class="span1">Statut</th>
					<th>Contact</th>
					<th class="span2">Date d'envoi</th>
					<th class="span2">Date d'ouverture</th>
					<th class="span2">Clicks</th>
					<th class="span2">Bounce</th>
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