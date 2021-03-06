<?php include_partial('statistics/header', array('campaign' => $campaign, 'other_campaigns' => $other_campaigns)); ?>
<div class="tabbable">
<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">

    		<?php

if ($pager->getNbResults() == 0):
	printf('<p>Aucun contact n\'a effectué d\'action sur une page d\'atterrissage liée à cette campagne.</p>');
else:

	?>

				<p>La liste ci-dessous présente l'ensemble des contacts ayant effectué une action sur une page d'atterrissage suite à cette campagne.</p>

				<p>Les contacts <?php echo $pager->getFirstIndice() ?> à <?php echo $pager->getLastIndice() ?> (sur <?php echo shortNumberFormat($pager->getNbResults()) ?> au total) sont affichés ci-dessous.</p>


				<table class="table table-striped table-condensed">
			<tr>
					<th width="100">Statut</th>
					<th>Contact</th>
					<th width="100">Envoi</th>
					<th width="100">Ouverture</th>
					<th width="100">Clic</th>
					<th width="100">Conversions</th>
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
					<td>
						<?php echo $contact->getLandingActionLabel(ESC_RAW); ?>
						<a href="javascript://void(0);" class="btn btn-mini action-landing-details" data-details-container="#action-landing-details<?php echo $contact->getId(); ?>">Détails</a>
						<div id="action-landing-details<?php echo $contact->getId(); ?>" style="display: none">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>Date</th>
										<th>Type</th>
										<th>Détails</th>
									</tr>
								</thead>
								<?php foreach($contact->getLandingActionsForRendering() as $landingAction): ?>
								<tr>
									<td><?php echo CatalyzDate::formatShort($landingAction['when']); ?></td>
									<td><?php echo $landingAction['type']; ?></td>
									<td>
										<table class="table table-bordered table-condensed table-striped">
											<thead>
												<tr>
													<th>Champ</th>
													<th>Valeur</th>
												</tr>
											</thead>
											<?php foreach($landingAction['content'] as $fieldName => $fieldValue): ?>
											<tr>
												<td><?php echo $fieldName; ?></td>
												<td><?php echo $fieldValue; ?></td>
											</tr>
											<?php endforeach; ?>
										</table>
									</td>
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</td>
				</tr>


					<?php endif; ?>
					<?php endforeach; ?>
				</table>

	<?php
//printf('<div class="pull-left"><a href="%s" class="btn"><i class="icon-download"></i> %s</a></div>',
//	url_for('@campaign_statistics_do_export_landing?slug='.$campaign->getSlug()), __('Télécharger la liste'));

	?>
				<?php if ($pager->haveToPaginate()): ?>

					<?php
					$route_prefix = "@campaign_statistics_views?slug=".$campaign->getSlug();

					echo '<div class="pagination pagination-right"><ul>';
					printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page='.$pager->getFirstPage()));


foreach ($pager->getLinks() as $page){
	printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'&page='.$page));
}

					printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$pager->getLastPage()));
					echo '</ul></div>';

					?>



					<?php endif ?>
					<?php endif ?>
			</div>
    </div>
</div>

<?php 	printf('<div class="modal fade" id="clickModal" style="display: none;"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>%s</h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn btn-primary close_tag">%s</a></div></div>', __('Détail des conversions'), __('Fermer'));
?>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('a.action-landing-details').on('click',function(){
		var url = $(this).attr('href');

		$('#clickModal .modal-body').html($($(this).attr('data-details-container')).html());

		$('#clickModal').modal('show');
		return false;
	});


	$('.modal-footer a.close_tag, .modal-header a').live('click',function(){
		$('.modal').modal('hide');
		$('.modal-backdrop').hide();
		return false;
	});

});


/* ]]> */
</script>