<div style="width: 890px;">
<?php

include_partial($campaign->getCampaignTemplateHandler()->getEditPartialName(), array('form' => $form));


$display_tabs = $campaign->getCampaignTemplateHandler()->displayTextTab();
$preview_height = $campaign->getCampaignTemplateHandler()->getPreviewHeight();
?>
<br />Aperçu de la campagne: (<a href="" onclick="refreshCampaignPreview(document.forms['form-campaign-edit']); return false;">rafraichir</a>)

	<?php
	if ($display_tabs) {
		echo '<div id="tabs"><ul><li><a href="#fragment-1"><span>HTML</span></a></li><li><a href="#fragment-2"><span>Texte</span></a></li></ul><div id="fragment-1">';
	}

	printf('<iframe name="emailing-preview" id="emailing-preview"	style="width: 100%%; height: %spx; border: 1px solid; background-color: #EEE;" src="%s"></iframe>', $preview_height, url_for('@campaign-wizard-preview?campaign='.$campaign->getId()));

	if ($display_tabs) {
		echo '</div><div id="fragment-2">';
		printf('<iframe name="emailing-preview-text" id="emailing-preview-text"	style="width: 100%%; height: %spx; border: 1px solid; background-color: #EEE;" src="%s"></iframe>', $preview_height, url_for('@campaign-wizard-preview-text?campaign='.$campaign->getId()));
		echo '</div></div>';
	}
 ?>

</div>
<script type="text/javascript">
function refreshCampaignPreview(aForm){
	var oldAction = aForm.action;
	var oldTarget = aForm.target;

	aForm.target = "emailing-preview";
	aForm.action = "<?php echo url_for('@campaign-wizard-preview-post'); ?>";
	aForm.submit();

<?php if ($display_tabs) { ?>
	aForm.target = "emailing-preview-text";
	aForm.action = "<?php echo url_for('@campaign-wizard-preview-text-post'); ?>";
	aForm.submit();
<?php } ?>

	aForm.target = oldTarget;
	aForm.action = oldAction;
}
</script>
