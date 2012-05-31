<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
  <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

<ul class="nav nav-tabs">
	    <?php
printf('<li><a href="%s">Vue d\'ensemble</a></li>', url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Cibles</a></li>', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
echo '<li><a href="#2" data-toggle="tab">D&eacute;sinscriptions</a></li><li><a href="#3" data-toggle="tab">Erreurs</a></li>';
echo '<li class="active"><a href="#1" data-toggle="tab">Configuration des destinataires </a></li>';
printf('<li><a href="%s">Message</a></li>', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
?>
	</ul>

		<div class="tab-content">

		<div class="tab-pane active" id="1">
			<?php

if (!$browscap):
	echo '<div class="alert alert-error"><p>La directive de configuration browscap dans le fichier php.ini doit pointer vers le fichier browscap.ini de votre système.</p></div>';
elseif($parents['total'] == 0 && $platforms['total'] == 0):
	printf('<p>Aucune statistique pour cette campagne</p>');
else:


	foreach (array(array('title1' => 'Répartition par type de client de messagerie', 'title2' => 'Client de messagerie', 'element' => $parents), array('title1' => 'Répartition par plateforme', 'title2' => 'Plateforme', 'element' => $platforms)) as $Elementgroup) {
		$parentsCountTotal = $Elementgroup['element']['total'];
		$parentsTab = $Elementgroup['element']['details'];

		if ($parentsCountTotal > 0):
			printf('<div class="span5">
			<h3>%s</h3>
			<table class="table table-striped table-condensed">
				<tr>
					<th>%s</th>
					<th>Quantité</th>
					<th>Proportion</th>
				</tr>', $Elementgroup['title1'], $Elementgroup['title2']);

			foreach ($parentsTab as $familly => $values) {
				$cpt = rand();
				printf('<tr id="tr_%s">', $cpt);
				echo '<td>';
				if (count($values['details']) > 1) {
					printf('<a class="details" href="javascript://" style="color: black;"><i class="icon-plus-sign"></i>&nbsp;%s</a>', $familly);
				}else{
					printf('%s', $familly);
				}

				echo '</td>';
				printf('<td>%s</td>', shortNumberFormat($values['count']));
				printf('<td>%0.1f%%</td>', 100 * $values['count'] / $parentsCountTotal);
				echo '</tr>';
				//region sous tableau
				if (count($values['details']) > 1) {
					foreach ($values['details'] as $subfamilly => $count) {
						printf('<tr style="display:none;" class="sub_tr_%s">', $cpt);
						printf('<td>&nbsp;&nbsp;&nbsp;%s</td>', $subfamilly);
						printf('<td>&nbsp;&nbsp;&nbsp;%s</td>', shortNumberFormat($count));
						printf('<td>&nbsp;&nbsp;&nbsp;%0.1f%%</td>', 100 * $count / $values['count']);
						echo '</tr>';
					}
				}
				//endregion
			}

			echo '</table></div>';
			endif;
	}
	?>


	<?php endif ?>
<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('.details').live('click', function() {
		var id = $(this).parents('tr').attr('id');
		$('#'+id).children().toggleClass('open');
		var sub='.sub_'+id;
		$(sub).toggle();
		if ($(this).children('i').attr('class') == 'icon-plus-sign') {
			$(this).children('i').attr('class','icon-minus-sign')
		}
		else{
			$(this).children('i').attr('class','icon-plus-sign')
		}
	});
});

/* ]]> */
</script>
		</div>
	</div>
</div>