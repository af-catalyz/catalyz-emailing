<?php

if (count($campaigns) > 0) {

include_partial('campaigns/filters', array('filters' => $filters, 'paneId' => 2));

echo '<div class="span9">';



	echo '<div class="row-fluid"><ul class="thumbnails">';

	foreach ($campaigns->getRawValue() as /*(Campaign)*/$campaign){
		printf('<li class="top_li span3 year_%s type_%s"><div class="thumbnail">', $campaign->getCreatedAt('Y'), $campaign->getCampaignTemplate()->getId());
		printf('<a href="%s" class="thumbnail">%s</a><h4>%s</h4>', url_for('@campaign_index?slug='.$campaign->getSlug()), is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())?thumbnail_tag($campaign->getCampaignTemplate()->getPreviewFilename(), 260, 180):'<img src="http://placehold.it/260x180" alt="">', $campaign->getName());
		printf('<p><small>Créée le %s %s</small></p>',CatalyzDate::formatShort(strtotime($campaign->getCreatedAt())),$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'');
		//region progress
		//echo '<div class="progress"><div class="bar" style="width: 60%;"></div></div>';
		//endregion
		if (trim($campaign->getCommentaire())) { printf('<p>%s</p>', nl2br($campaign->getCommentaire())); }
		echo '<div class="btn-group">';
		printf('<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">Action<span class="caret"></span></a><ul class="dropdown-menu"><li>
<a href="%s">Dupliquer</a></li><li>
<a href="%s">Archiver</a></li></ul>',
		url_for('@campaign_do_copy?slug='.$campaign->getSlug()),
		url_for('@campaign_do_archive?slug='.$campaign->getSlug())
		);
		echo $campaign->getStatusBadge();
		echo '</div></div></li>';
	}

	echo '</ul></div>';
	echo '</div>';
}else{
	printf('<p>%s</p>', __('Aucune campagne envoyée'));
}


?>