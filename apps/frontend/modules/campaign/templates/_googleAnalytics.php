
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
?>

<form  action="<?php echo '#'/*url_for('@campaign-edit-analytics?id='.$campaign->getId())*/ ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php  $form= /*(CampaignAnalyticsForm)*/ $form; ?>



<label class="checkbox">
	<?php echo (string)$form['google_analytics_enabled'] ?> Activer l'intégration avec Google Analytics
</label>
<span class="help-block">En activant cette option, si vous utilisez Google Analytics sur votre site, vous pourrez mesurer précisément les retours de votre campagne en faisant le lien avec les actions effectuées sur votre site suite à cette campagne.</span>


<div id="google_analytics_options"<?php if(null == $form['google_analytics_enabled']->getValue()){echo ' style="display:none_"';} ?>>
	<span class="help-block">Vous pouvez ajuster les paramètres ci-dessous:</span>

	<div class="control-group">
		<label class="control-label">Source *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_source'] ?>
			<?php echo $form['google_analytics_source']->renderError(); ?>
			<p class="help-block">Ce texte sera utilisé pour le paramètre utm_source</p>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Médium *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_medium'] ?>
			<?php echo $form['google_analytics_medium']->renderError(); ?>
			<p class="help-block">Ce texte sera utilisé pour le paramètre utm_medium</p>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Contenu</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_content'] ?>
			<?php echo $form['google_analytics_content']->renderError(); ?>
			<p class="help-block">Ce texte sera utilisé pour le paramètre utm_content. Si vous n'effectuez pas de campagne de type A/B, laisser ce paramètre vide.</p>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Campagne *</label>
		<div class="controls">
			<?php echo (string)$form['google_analytics_campaign_type'] ?>
			<?php echo $form['google_analytics_campaign_type']->renderError(); ?>
			<p class="help-block">Ce texte sera utilisé pour le paramètre utm_campaign</p>
		</div>
	</div>
</div>

<?php echo (string)$form['id']; ?>


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

	$("#campaign_google_analytics_enabled").change(function(){
		if($(this).is(':checked')){
			$('#google_analytics_options').show();
		}else{
			$('#google_analytics_options').hide();
		}
	});
 });
</script>