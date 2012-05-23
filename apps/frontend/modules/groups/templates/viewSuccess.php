<?php printf('<div class="page-header"><h1>%s%s</h1></div>', $ContactGroup->getName(), html_entity_decode($ContactGroup->getCommentPopup())) ?>



<?php
if (!empty($datas)){
	use_javascript('http://code.highcharts.com/highcharts.js');
	$script =  ContactGroupPeer::getChartScript($datas, 'chart-contactOverviewAcrossTimeCumul');
	printf('<script type="text/javascript">/* <![CDATA[ */ %s /* ]]> */</script>', html_entity_decode($script)) ;

	echo '<div id="chart-contactOverviewAcrossTimeCumul"></div>';
	printf('<table class="table table-striped table-condensed"><thead><tr><th>%s</th><th>%s</th></tr></thead>', __('Date'), __('Cumul'));
	foreach ($datas as $key => $data){
		echo '<tr>';
		printf('<td>%s</td>', date('d/m/Y', $key));
		printf('<td>%s</td>', $data);
		echo '</tr>';
	}
	echo '</table>';
}else{
	printf('<p class="notice">%s</p>', __('Aucun contact dans ce groupe'));
}
	printf('<br/><a class="btn btn-small btn-mini" href="%s">%s</a>', url_for('@groups'), __('Revenir à la liste des groupes'));
?>

