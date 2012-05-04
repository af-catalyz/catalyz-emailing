<?php printf('<div class="page-header"><h1>%s</h1></div>', __('Routage')) ?>

<?php

if (count($datas) == 0){
	printf('<p>%s</p>', __("Aucune campagne n'a été envoyée"));
}
else{
	printf('<p>%s</p>', __("Vous trouverez ci-dessous le nombre d'emails envoyés pour chacune de vos campagnes sur les différents mois d'utilisation de l'application."));
	echo '<ul class="nav nav-tabs" id="myTab">';
	$first = true;
	foreach ($dates as $date){
		printf('<li%1$s><a href="#fragment-%2$d">%2$d</a></li>', $first?' class="active"':'',$date);
		$first = false;
	}
	echo '</ul>';

	echo '<div class="tab-content">';

	$first = true;
	foreach ($datas as $year=>$details){
		$totalMonth=array();
		printf('<div class="tab-pane%s" id="fragment-%d">', $first?' active':'',$year);
		printf('<table  class="table table-striped" cellpadding="3" cellspacing="1" width="100%%"><tr><th align="left">&nbsp;</th>');
		foreach ($MonthLabels as $nb=>$label){
			printf('<th width="50">%s</th>',$label);
		}
		echo '</tr>';

		foreach ($details as $campaign=>$monthDetails){
			echo '<tr>';

			$campaign=unserialize($campaign);

			//					printf('<th align="left">%s</th>',link_to($campaign['Name'],'statistics/index?id='.$campaign['Id']));
			printf('<th align="left">%s</th>',$campaign['Name']);
			foreach ($MonthLabels as $nb=>$label){
				if (!isset($totalMonth[$nb])) {
					$totalMonth[$nb]=0;
				}
				$totalMonth[$nb]+=$monthDetails[$nb];
				printf('<td class="small" align="center">%s</td>',shortNumberFormat($monthDetails[$nb]));
			}
			echo '</tr>';
		}


		echo '<tr>';
		printf('<th align="left">Total</th>');
		foreach ($totalMonth as $nb=>$cnt){
			printf('<th class="small" align="center">%s</th>',shortNumberFormat($cnt));

		}
		echo '</tr>';

		echo '</table>';
		echo '</div>';
		$first = false;
	}

	echo '</div>';
	//region js for tabs
		echo '<script type="text/javascript">/* <![CDATA[ */$(\'#myTab a\').click(function (e) {e.preventDefault();$(this).tab(\'show\');})/* ]]> */</script>';
	//endregion


}
 ?>


