<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>


<?php
$campaign = $campaign->getRawValue();


foreach($form->getWidgetSchema()->getFields() as $name => $widget){
	if(method_exists($widget, 'renderError')){
		$widget->renderError();
	}
}

foreach($form->getErrorSchema() as $error){
	print_r((string)$error);
}

$errors = $form->getErrorSchema();

?>

<form  class="form-horizontal" action="<?php echo url_for('@campaign_edit_analytics?slug='.$campaign->getSlug()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php  $form= /*(CampaignAnalyticsForm)*/ $form; ?>

<label class="checkbox">
	<?php echo (string)$form['google_analytics_enabled'] ?> Activer l'intégration avec Google Analytics
</label>
<span class="help-block">En activant cette option, si vous utilisez Google Analytics sur votre site, vous pourrez mesurer précisément les retours de votre campagne en faisant le lien avec les actions effectuées sur votre site suite à cette campagne.</span>

<div id="google_analytics_options"<?php if(null == $form['google_analytics_enabled']->getValue()){echo ' style="display:none_"';} ?>>
	<br />
	<p>Vous pouvez ajuster les paramètres ci-dessous:</p>
	<br />

					<?php
		$class = '';
if (!empty($errors['google_analytics_source'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>
		<label class="control-label">Source *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_source'] ?>
			<?php echo $form['google_analytics_source']->renderError(); ?>
			<?php echo $form['google_analytics_source']->renderhelp(); ?>
		</div>
	</div>

					<?php
$class = '';
if (!empty($errors['google_analytics_medium'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>
		<label class="control-label">Médium *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_medium'] ?>
			<?php echo $form['google_analytics_medium']->renderError(); ?>
			<?php echo $form['google_analytics_medium']->renderhelp(); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Contenu</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_content'] ?>
			<?php echo $form['google_analytics_content']->renderError(); ?>
			<?php echo $form['google_analytics_content']->renderhelp(); ?>
		</div>
	</div>

					<?php
$class = '';
if (!empty($errors['google_analytics_campaign_type'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>
		<label class="control-label">Campagne *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_campaign_type'] ?>
			<?php echo $form['google_analytics_campaign_type']->renderError(); ?>
			<?php echo $form['google_analytics_campaign_type']->renderhelp(); ?>
		</div>
	</div>
</div>

<?php echo $form->renderHiddenFields(); ?>


	<br />
	<div class="form-actions">
	<?php
if ($campaign->getStatus()< Campaign::STATUS_SENDING) {
	echo '<input type="submit" name="Save" value="Enregistrer" class="btn btn-primary" />';
} ?>
	</div>

</form>

<script type="text/javascript">
$(document).ready(function() {

	if($("#campaign_google_analytics_enabled").is(':checked')){
		$('#google_analytics_options').show();
	}else{
		$('#google_analytics_options').hide();
	}

	$("#campaign_google_analytics_enabled").change(function(){
		if($(this).is(':checked')){
			$('#google_analytics_options').show();
		}else{
			$('#google_analytics_options').hide();
		}
	});
});
</script>