
	<p>Quels contacts souhaitez-vous ajouter à la liste des destinataires de votre campagne?</p>


	<ul>
<?php
foreach($providers->getRawValue() as /*(ContactProvider)*/$provider){
	printf('<li><a href="%s">%s</a> <span class="hint">%s</span></li>',
		url_for('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.str_replace('ContactProvider_', '', get_class($provider))),
		$provider->getCaption(), $provider->getCaptionHint());
}
?>
	</ul>
<br />
<br />
	<?php echo link_to('Revenir à la liste des destinataires de la campagne', '@campaign_edit_targets?slug='.$campaign->getSlug()) ?>

