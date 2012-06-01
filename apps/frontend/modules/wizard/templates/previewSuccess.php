<?php


$display_tabs = $campaign->getCampaignTemplateHandler()->displayTextTab();
$preview_height = $campaign->getCampaignTemplateHandler()->getPreviewHeight();


if ($display_tabs) {
    echo '<div id="tabs-preview" class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#fragment-1" data-toggle="tab">HTML</a></li><li><a href="#fragment-2" data-toggle="tab">Texte</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fragment-1">';
}
printf('<iframe name="emailing-preview" id="emailing-preview"	style="width: 100%%; height: %spx; border: 1px solid; background-color: #EEE;" src="%s"></iframe>', $preview_height, url_for('@campaign-wizard-preview-html?campaign=' . $campaign->getId()));
if ($display_tabs) {
    echo '</div><div id="fragment-2">';
    echo $content_text;
    echo '</div></div>';
}

?>
