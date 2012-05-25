<?php $choices = $choices->getRawValue(); ?>

<label class="radio">
	<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['input'];  ?>
	<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['label'];  ?>
</label>
<label class="radio">
	<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['input'];  ?>
	<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['label'];  ?>
</label>

<?php if(isset($choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM])): ?>
	<label class="radio">
		<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['input'];  ?>
		<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['label'];  ?>
		<?php echo (string)$form['google_analytics_campaign_content']; ?><br />
		<?php echo $form['google_analytics_campaign_content']->renderError(); ?>
	</label>
<?php endif; ?>