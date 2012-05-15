<?php $choices = $choices->getRawValue(); ?>

<table border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td><?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['input'];  ?></td>
	<td>
		<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['label'];  ?><br />
	</td>
</tr>
<tr valign="top">
	<td><?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['input'];  ?></td>
	<td>
		<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['label'];  ?><br />
	</td>
</tr>
	<?php if(isset($choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM])): ?>
<tr valign="top">
	<td><?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['input'];  ?></td>
	<td>
		<?php echo $choices['campaign_google_analytics_campaign_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['label'];  ?>
		<?php echo (string)$form['google_analytics_campaign_content']; ?><br />
		<?php echo $form['google_analytics_campaign_content']->renderError(); ?>
	</td>
</tr>
		<?php endif; ?>
</table>