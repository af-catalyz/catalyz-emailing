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

printf('<h3><small>Cr&eacute;&eacute; %s le %s</small>&nbsp;<a href="javascript://" class="btn btn-mini">modifier</a></h3>',
	$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'',
	CatalyzDate::formatShortWithTime(strtotime($campaign->getCreatedAt()))
	);

echo '</div>';
//endregion
?>


    <div class="tabbable">

    <a class="btn btn-inverse pull-right" data-toggle="modal" href="#dialog-campaign-test" accesskey="t"><u>T</u>ester la campagne</a>



    <ul class="nav nav-tabs">
	    <li <?php echo $sf_context->getActionName() == 'index'?'class="active"':'' ?>><a href="<?php echo url_for('@campaign_index?slug='.$campaign->getSlug()) ?>"><i class="icon-ok"></i> Enveloppe</a></li>
	    <li><a href="#2" data-toggle="tab"><i class="icon-ok"></i> Message</a></li>
	    <li <?php echo $sf_context->getActionName() == 'links'?'class="active"':'' ?>><a href="<?php echo url_for('@campaign_edit_links?slug='.$campaign->getSlug()) ?>"><i class="icon-remove"></i> Liens</a></li>
	    <li <?php echo $sf_context->getActionName() == 'googleAnalytics'?'class="active"':'' ?>><a href="<?php echo url_for('@campaign_edit_analytics?slug='.$campaign->getSlug()) ?>" ><i class="icon-remove"></i> Google Analytics</a></li>
	    <li><a href="#5" data-toggle="tab"><i class="icon-remove"></i> Anti-spam</a></li>
	    <li><a href="#6" data-toggle="tab"><i class="icon-remove"></i> Contrôle visuel</a></li>
	    <li><a href="#7" data-toggle="tab"><i class="icon-remove"></i> Destinataires</a></li>
	    <li><a href="#8" data-toggle="tab"><i class="icon-remove"></i> Gestion des erreurs</a></li>
	    <li><a href="#9" data-toggle="tab"><i class="icon-remove"></i> Envoi</a></li>
    </ul>

    <?php include_partial('global/flashMessage') ?>
    <?php include_partial('campaign/testModal') ?>
    <?php var_dump($sf_context->getActionName()); ?>
