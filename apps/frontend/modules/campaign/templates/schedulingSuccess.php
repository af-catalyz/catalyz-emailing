<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>


	<?php
	$campaign = $campaign->getRawValue();
$errors = $form->getErrorSchema();

?>

<form  class="form-horizontal" action="<?php echo url_for('@campaign_edit_scheduling?slug='.$campaign->getSlug()) ?>" method="post" >
	<?php echo $form->renderHiddenFields() ?>

							<?php
	$class = '';
if (!empty($errors['schedule_type'])) {
	$class = ' error';
}

printf('<div class="control-group%s"><p>%s</p>', $class, __('Quand souhaitez-vous envoyer cette campagne?'));

?>


				<?php echo $form['schedule_type'] ?>
				<?php echo $form['schedule_type']->renderError(); ?>
				<?php echo $form['schedule_type']->renderHelp() ?>

		</div>

	<br />
	<div class="form-actions">
	<?php
	if ($campaign->getStatus()< Campaign::STATUS_SENDING) {
		echo '<input type="submit" name="Save" value="Enregistrer" class="btn btn-primary" />';
	} ?>
	</div>

</form>