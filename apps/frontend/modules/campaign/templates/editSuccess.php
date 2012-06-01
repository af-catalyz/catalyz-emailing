<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>


	<?php
	use_javascript('tiny_mce/tiny_mce');

	$campaign = $campaign->getRawValue();
	$templateClassName = $campaign->getCampaignTemplate()->getClassName();

?>

<form  id="form-campaign-edit" class="form-horizontal" action="<?php echo url_for('@campaign_edit_content?slug='.$campaign->getSlug()) ?>" method="post" >

	<?php
echo $form->renderHiddenFields();


	if ($form->getOption('displayTextTab', false)) {
		printf('<ul class="nav nav-tabs"><li class="active"><a href="#1" data-toggle="tab">%s</a></li><li><a href="#2" data-toggle="tab">%s</a></li></ul>', __('Html'), __('Texte'));
	}


	 ?>



<div class="tab-content">
	<div class="tab-pane active" id="1">
		<?php echo $form['content'];?>
	</div>
	<?php if ($form->getOption('displayTextTab', false)) : ?>
	<div class="tab-pane active" id="2">
		<?php echo $form['text_content']; ?>
	</div>
	<?php endif ?>
</div>






	<br />
	<div class="form-actions">
	<?php
	if ($campaign->getStatus()< Campaign::STATUS_SENDING) {
		echo '<input type="submit" name="Save" value="Enregistrer" class="btn btn-primary" />';
	} ?>
	</div>

</form>