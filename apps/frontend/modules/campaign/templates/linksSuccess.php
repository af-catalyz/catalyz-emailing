<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>


	<?php
	$campaign = $campaign->getRawValue();
	?>

<form  class="form-horizontal" action="<?php echo url_for('@campaign_edit_links?slug='.$campaign->getSlug()) ?>" method="post" >
	<p>Vous pouvez donner un nom plus familier à chacun des liens présent dans votre campagne qui seront utilisés dans l'interface de suivi des clicks et dans Google Analytics.</p>
	<p class="hint">Si vous laissez le champ vide, l'URL sera utilisée dans l'interface de suivi des clicks et ce lien ne sera pas suivi dans Google Analytics.</p>

	 <table class="table table-striped">
		<tr>
			<th class="span4">Nom</th>
			<th >Lien présent dans votre campagne</th>
		</tr>

				<?php foreach ($campaign->getCampaignLinks() as /*(CampaignLink)*/$link){
					if ($link->displayInGoogleAnalyticsTracker()) {
						echo '<tr valign="top">';
						$widget= new sfWidgetFormInput();
						printf('<td>%s</td>', $widget->render(sprintf('link[%s]',$link->getId()),$link->getGoogleAnalyticsTerm(), array('class' => 'input-xlarge')));
						printf('<td>%s</td>',$link->getUrl());
						echo '</tr>';
					}
				} ?>
			</table>
	<br />
	<div class="form-actions">
	<?php
if ($campaign->getStatus()< Campaign::STATUS_SENDING) {
	echo '<input type="submit" name="Save" value="Enregistrer" class="btn btn-primary" />';
} ?>
	</div>

</form>