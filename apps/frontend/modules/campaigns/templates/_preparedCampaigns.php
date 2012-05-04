<?php
if (!empty($campaigns)) {
	echo '<div class="row-fluid"><ul class="thumbnails">';

	foreach ($campaigns as /*(Campaign)*/$campaign){
		echo '<li class="top_li span3"><div class="thumbnail">';
		printf('<a href="%s" class="thumbnail">%s</a><h4>%s</h4>', url_for('@campaign_index?slug='.$campaign->getId()), is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())?thumbnail_tag($campaign->getCampaignTemplate()->getPreviewFilename(), 260, 180):'<img src="http://placehold.it/260x180" alt="">', $campaign->getName());
		printf('<p><small>Créée le %s %s</small></p>',CatalyzDate::formatShort(strtotime($campaign->getCreatedAt())),$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'');
		if (trim($campaign->getCommentaire())) { printf('<p>%s</p>', nl2br($campaign->getCommentaire())); }
		echo '<div class="btn-group">';
		printf('<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">Action<span class="caret"></span></a><ul class="dropdown-menu"><li><a href="#">Dupliquer</a></li><li><a href="#">Archiver</a></li></ul>');
		echo $campaign->getStatusBadge();
		echo '</div></div></li>';
	}

	echo '</ul></div>';
}else{
	printf('<p>%s</p>', __('Aucune campagne en préparation'));
}



?>