	<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>
<div class="tabbable">
  <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

<ul class="nav nav-tabs">
	    <?php
	printf('<li><a href="%s">Vue d\'ensemble</a></li>', url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">Cibles</a></li>', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">D&eacute;sinscriptions</a></li>', url_for('@campaign_statistics_unsubscribe?slug='.$campaign->getSlug()));
	echo '<li class="active"><a href="#1" data-toggle="tab">Erreurs</a></li>';

	printf('<li><a href="%s">Configuration des destinataires</a></li>', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
	printf('<li><a href="%s">Message</a></li>', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
	?>
		</ul>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">


			</div>
    </div>
</div>