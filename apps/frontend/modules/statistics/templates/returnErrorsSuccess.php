	<?php include_partial('statistics/header', array('campaign' => $campaign, 'other_campaigns' => $other_campaigns)); ?>
<div class="tabbable">
<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">

    <?php

    if ($items->count() == 0) :
    	echo '<p>Aucune erreur sur cette campagne</p>';
    else :
    	$items = $items->getRawValue();
		 ?>

    <?php
			echo '<div class="row">';

			//region total
			$total = $total_soft+$total_hard+$failed_count;
			printf('<div class="span2 well offset1"><center><h1>%s</h1>Total<br/><br/></center></div>', $total);
			//endregion

    	//region erreur à l'envoi SOFT
    	printf('<div class="span2 well"><center><h1>%s</h1>SOFT<br/>Bounce <a rel="tooltip-campaign-comment" href="#" data-original-title="E-mails qui ne sont pas arrivés à destination pour motif de refus temporaire."><i class="icon-question-sign"></i></a></center></div>', $total_soft);
	   	//endregion

    	//region erreur à l'envoi HARD
    	printf('<div class="span2 well"><center><h1>%s</h1>HARD<br/>Bounce <a rel="tooltip-campaign-comment" href="#" data-original-title="E-mails qui ne sont pas arrivés à destination pour motif de refus permanent."><i class="icon-question-sign"></i></a></center></div>', $total_hard);
    	//endregion

    	//region erreur à la recep
    	printf('<div class="span2 well"><center><h1>%s</h1>Erreur<br/>à l\'envoi</center></div>', $failed_count);
    	//endregion

    	echo '</div><br/>';
		 ?>

		<table class="table table-striped table-condensed">
			<thead>
				<tr>
					<th class="span2">Type</th>

					<th>Contact</th>
					<th >Date</th>
					<th class="span1">Details</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($items as $bounce){

				if ($bounce instanceof CampaignContactBounce) {
					$bounce = /*(CampaignContactBounce)*/ $bounce;
					echo '<tr>';
					printf('<td>%s</td>', $bounce->getBounceLabel());
					printf('<td>%s</td>', $bounce->getCampaignContact()->getContact()->getFieldValue('FULL_NAME'));
					printf('<td>%s</td>', $bounce->getArrivedAt('d/m/Y'));
					printf('<td nowrap="nowrap"><div class="btn-group">
									<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
													    	<ul class="dropdown-menu">
														    	',__('Action'));
					printf('<li class="declenche-details-modal"><a data-toggle="modal" href="%s"><i class="icon-eye-open"></i> %s</a></li>',
					url_for(sprintf('@campaign_statistics_do_display_bounce_message?id=%s&slug=%s',$bounce->getId(), $campaign->getSlug() )),__('Voir les détails') );
					echo '</ul></div></td>';
					echo '</tr>';
				}else{
					$bounce = /*(CampaignContact)*/ $bounce;
					echo '<tr>';
					printf('<td><span class="badge badge-inverse">ERREUR À L\'ENVOI</span></td>');
					printf('<td>%s</td>', $bounce->getContact()->getFieldValue('FULL_NAME'));
					printf('<td>%s</td>', $bounce->getFailedSentAt('d/m/Y'));
					printf('<td nowrap="nowrap">&nbsp;</td>');
					echo '</tr>';
				}


			} ?>
			</tbody>
		</table>

		<?php

    	//region bottom buttons
    	printf('<div class="pull-left"><a href="%1$s" class="btn"><i class="icon-download"></i> Exporter le%2$s contact%2$s</a></div>',
    		url_for('@campaign_statistics_do_export_bounces?slug='.$campaign->getSlug()), $total>1?'s':'');
    	//endregion

			 ?>

					<?php
			//region pager
			if ($total > sfConfig::get('app_divers_pagerSize',15)) {
				$route_prefix = "@campaign_statistics_return_errors?slug=".$campaign->getSlug();

				echo '<div class="pagination pagination-right"><ul>';
				printf('<li%s>%s</li>', $actual != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page=1'));

				$tab = range(1, $endPager, 1);

				$begin = $actual-3;
				if ($begin<0) {
					$begin = 0;
				}

				$slice = array_slice($tab, $begin, 5);
				if (empty($tab[$begin+5])) {
					$slice = array_slice($tab, $endPager-5, 5);
				}

				foreach ($slice as $i){
					$route = sprintf('%s&page=%s', $route_prefix, $i);
					printf('<li%s>%s</li>', $i == $actual?' class="active"':'', link_to($i, $route));
				}

				printf('<li%s>%s</li>', $actual != $endPager?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$endPager));
				echo '</ul></div>';
			}
			//endregion
			?>

			</div>
    </div>
</div>

	<?php
//region clics modal
printf('<div class="modal fade" id="detailsModal" style="display: none"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>%s</h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn btn-primary close_tag">%s</a></div></div>', __('Détails de l\'erreur'), __('Fermer'));
//endregion

	?>


	<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('.declenche-details-modal').on('click','a',function(){
		var url = $(this).attr('href');
		$('#detailsModal .modal-body').load(url,function(){
			$(this).modal({
				keyboard:true,
				backdrop:true
			});
		});

		$('#detailsModal').modal('show');
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

<?php endif ?>