<?php

use_javascript('http://code.highcharts.com/highcharts.js');
use_javascript('http://code.highcharts.com/modules/exporting.js');




$campaign = $campaign->getRawValue();

//region header
echo '<div class="page-header">';

$picture_src = 'http://placehold.it/80x60';
if ($campaign->getCampaignTemplate()->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())) {
	$picture_src = thumbnail_path($campaign->getCampaignTemplate()->getPreviewFilename(), 80, 60);
}

printf('<img src="%s" alt="" class="pull-left" style="margin-right: 10px;" />', $picture_src);
printf('<h1>%s%s</h1>', $campaign->getName(), html_entity_decode($campaign->getCommentPopup()));

printf('<h3><small>Cr&eacute;&eacute; %s le %s envoy&eacute;e le %s</small></h3>',
	$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'',
	CatalyzDate::formatShortWithTime(strtotime($campaign->getCreatedAt())),
	CatalyzDate::formatShortWithTime(strtotime($campaign->getSendStart()))
	);

echo '</div>';
//endregion


 ?>