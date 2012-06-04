<?php

$campaign = $campaign->getRawValue();

//region header
echo '<div class="page-header">';

$picture_src = 'http://placehold.it/80x60';
if ($campaign->getCampaignTemplate()->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())) {
	$picture_src = thumbnail_path($campaign->getCampaignTemplate()->getPreviewFilename(), 80, 60);
}

printf('<img src="%s" alt="" class="pull-left" style="margin-right: 10px;" />', $picture_src);
printf('<h1>%s%s</h1>', $campaign->getName(), html_entity_decode($campaign->getCommentPopup()));

printf('<h3><small>Cr&eacute;&eacute; %s le %s</small>&nbsp;',
	$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'',
	CatalyzDate::formatShortWithTime(strtotime($campaign->getCreatedAt()))
	);
if ($campaign->getStatus() < Campaign::STATUS_SENDING){
	printf('<a data-toggle="modal" href="#dialog-edit-header" class="btn btn-mini">%s</a>', __('modifier'));
}

echo '</h3>';

echo '</div>';
//endregion
?>


    <div class="tabbable">

    <a class="btn btn-inverse pull-right" data-toggle="modal" href="#dialog-campaign-test" accesskey="t"><u>T</u>ester la campagne</a>

    <?php $tabsIcons = $campaign->getTabsIcon(); ?>
    <?php //var_dump($tabsIcons); ?>

    <ul class="nav nav-tabs">
    	<?php
    	printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'index'?'class="active"':'', url_for('@campaign_index?slug='.$campaign->getSlug()), $tabsIcons['enveloppe'],__('Enveloppe'));
    	printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'edit'?'class="active"':'', url_for('@campaign_edit_content?slug='.$campaign->getSlug()), $tabsIcons['message'],__('Message'));
			printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'links'?'class="active"':'', url_for('@campaign_edit_links?slug='.$campaign->getSlug()), $tabsIcons['links'], __('Liens'));
			printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'googleAnalytics'?'class="active"':'', url_for('@campaign_edit_analytics?slug='.$campaign->getSlug()), $tabsIcons['googleAnalytics'], __('Google Analytics'));
	//		echo '<li><a href="#5" data-toggle="tab"><i class="icon-remove"></i> Anti-spam/Contrôle visuel</a></li>';
			printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'targets'?'class="active"':'', url_for('@campaign_edit_targets?slug='.$campaign->getSlug()), $tabsIcons['destinataire'], __('Destinataires'));
			printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'returnErrors'?'class="active"':'', url_for('@campaign_edit_return_errors?slug='.$campaign->getSlug()), $tabsIcons['returnErrors'], __('Gestion des erreurs'));
			printf('<li %s><a href="%s">%s %s</a></li>', $sf_context->getActionName() == 'scheduling'?'class="active"':'', url_for('@campaign_edit_scheduling?slug='.$campaign->getSlug()), $tabsIcons['scheduling'], __('Envoi'));
			 ?>
    </ul>

    <?php include_partial('global/flashMessage') ?>
    <?php include_partial('campaign/testModal', array('campaign' => $campaign)) ?>
    <?php include_partial('campaign/editHeaderModal', array('campaign' => $campaign)) ?>
    <?php //var_dump($sf_context->getActionName()); ?>
