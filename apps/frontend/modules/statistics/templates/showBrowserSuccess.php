<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

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
		$parentsTab = $parentsTab->getRawValue();

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
					printf('%s <small>(%s)</small>', $familly, key($values['details']));
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