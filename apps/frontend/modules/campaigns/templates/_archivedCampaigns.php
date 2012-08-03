<?php
if (count($campaigns)>0) {

	include_partial('campaigns/filters', array('filters' => $filters, 'paneId' => 3));

	echo '<div class="span9">';
    echo '<div class="row-fluid"><ul class="thumbnails">';

    foreach ($campaigns->getRawValue() as/*(Campaign)*/ $campaign) {
        printf('<li class="top_li span3 year_%s type_%s"><div class="thumbnail">', $campaign->getCreatedAt('Y'), $campaign->getCampaignTemplate()->getId());
        printf('<a href="%s" class="thumbnail">%s</a><h4>%s</h4>', $campaign->getCatalyzUrl() , is_file(sfConfig::get('sf_web_dir') . $campaign->getCampaignTemplate()->getPreviewFilename())?thumbnail_tag($campaign->getCampaignTemplate()->getPreviewFilename(), 260, 180):'<img src="http://placehold.it/260x180" alt="">', $campaign->getName());
        printf('<p><small>Créée le %s %s</small></p>', CatalyzDate::formatShort(strtotime($campaign->getCreatedAt())), $campaign->getsfGuardUserProfile()?sprintf('par %s', $campaign->getsfGuardUserProfile()->getFullName()):'');
        if (trim($campaign->getCommentaire())) {
            printf('<p>%s</p>', nl2br($campaign->getCommentaire()));
        }
        echo '<div class="btn-group">';
        printf('<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">Action<span class="caret"></span></a><ul class="dropdown-menu"><li>
<a href="%s">Restaurer</a></li>
<li><a href="%s">Dupliquer</a></li>
%s
</ul>',
url_for('@campaign_do_unarchive?slug='.$campaign->getSlug()),
url_for('@campaign_do_copy?slug='.$campaign->getSlug()),
$campaign->getStatus()!=Campaign::STATUS_COMPLETED?sprintf('<li>%s</li>', link_to('Supprimer', '@campaign_do_delete?slug='.$campaign->getSlug(), array('post' => true, 'confirm' => sprintf('Vous êtes sur le point de supprimer la campagne "%s" et toutes les statistiques associées.\nCette action est définitive et ne peut pas être annulée.\n\nCliquez sur OK pour confirmer la suppression définitive de cette campagne.\nCliquez sur Annuler pour conserver cette campagne.', $campaign->getName())))):''

				);
        echo '</div></div></li>';
    }

    echo '</ul></div></div>';
} else {
    printf('<p>%s</p>', __('Aucune campagne archivée'));
}

?>