<div class="tabbable">
  <?php

if ($sf_user->hasCredential('admin')) {
    printf('<div class="pull-right"><a href="%s" class="btn btn-primary">%s</a></div>', url_for('@campaigns_do_create'), __('Créer une campagne'));
}
?>

	<ul class="nav nav-tabs">
		<?php
$tabs = array();
if ($sf_user->hasCredential('admin')) {
    $tabs[1] = __('Campagnes en préparation');
}
$tabs[2] = __('Campagnes envoyées');
$tabs[3] = __('Campagnes archivées');

foreach ($tabs as $tabId => $caption) {
    printf('<li%s><a href="#pane_%s" data-toggle="tab">%s</a></li>', $tabId == $selectedTab?' class="active"':'', $tabId, $caption);
}

?>


	</ul>

	<div class="tab-content">

		<?php include_partial('global/flashMessage') ?>

		<?php if ($sf_user->hasCredential('admin')): ?>
		<?php printf('<div class="tab-pane%s" id="pane_1">', $selectedTab == 1?' active':'') ?>
			<?php include_component('campaigns', 'preparedCampaigns') ?>
		</div>
		<?php endif; ?>

		<?php printf('<div class="tab-pane%s" id="pane_2">', $selectedTab == 2?' active':'') ?>
			<?php include_component('campaigns', 'sendCampaigns') ?>
		</div>

		<?php printf('<div class="tab-pane%s" id="pane_3">', $selectedTab == 3?' active':'') ?>
			<?php include_component('campaigns', 'archivedCampaigns') ?>
    </div>
  </div>
</div>

<script type="text/javascript">
/* <![CDATA[ */

$(window).load(function(){
	adaptHeight();
});

$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown', function (e) {
		element = e.target // activated tab
		related = e.relatedTarget // previous tab

		adaptHeight();
	})
});


//change li height to avoid floating problems
function adaptHeight(){
	var max = 0;

	//on ne prend que ceux qui sont visible(ceux du tab en cours)
	$('.top_li:visible div.thumbnail').each(function(index) {
		max = Math.max($(this).height(), max);
	});

	$('.top_li:visible div.thumbnail').height(max);
}



/* ]]> */
</script>