<?php

$filters = $filters->getRawValue();
if (
(!empty($filters['models']) && count($filters['models'])>1)
||
(!empty($filters['years']) && count($filters['years'])>1)
) {

	echo '<div class="span3" style="margin-left: 0px"><div class="well" style="padding: 8px 0pt; margin-left: 0px"><ul class="nav nav-list filter">';

	if (!empty($filters['years']) && count($filters['years'])>1) {
		ksort($filters['years']);
		printf('<li class="nav-header">%s</li>', __('Filtrer par année'));
		foreach ($filters['years'] as $year){
			printf('<li><a rel="year_%1$s" href="javascript://">%1$s</a></li>', $year);
		}
	}
	if (!empty($filters['models'])&& count($filters['years'])>1) {
		sort($filters['models']);
		printf('<li class="nav-header">%s</li>', __('Filtrer par modèle'));
		foreach ($filters['models'] as $modelId => $modelName){
			printf('<li><a rel="type_%s" href="javascript://">%s</a></li>', $modelId, $modelName);
		}
	}


	echo '</ul></div></div>';
} ?>


<script type="text/javascript">
/* <![CDATA[ */

$("#pane_<?php echo $paneId ?> .filter a").live("click", function(){

	var rel = $(this).attr('rel');
	$("#pane_<?php echo $paneId ?> .thumbnails li.top_li:hidden").show();
	if ($(this).parents('li').hasClass('active')) {
		$(this).parents('li').removeClass('active');

	}else{
		$("#pane_<?php echo $paneId ?> .filter li").removeClass('active');
		$(this).parents('li').addClass('active');

		$('#pane_<?php echo $paneId ?> .thumbnails li.top_li').each(function(index) {
			if (!$(this).hasClass(rel)) {
				$(this).hide();
			}
		});
	}
});

/* ]]> */
</script>