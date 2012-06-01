<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>


	<?php
	$campaign = $campaign->getRawValue();
?>

<div id="text">

<?php if(0 == count($providerStrings)): ?>

<p>Cette campagne sera envoyée à tous les contacts présents dans votre base de données (<?php echo $targetCountStr;?>).</p>
<p>Vous pouvez <?php echo link_to('limiter l\'envoi de cette campagne à certains contacts', '@campaign-target-add?slug='.$campaign->getSlug()) ?>.</p>
<?php else:

?>
<p>Cette campagne sera envoyée à <?php echo $targetCountStr;?> correspondant aux critères suivants:</p>
<table border="0" cellspacing="0" cellpadding="0">
<?php
			foreach($providerStrings as $providerString => $providerName){
				printf('<tr><td><a href="%s"><i class="icon-remove-sign"></i></a>&nbsp;</td><td>%s</td></tr>',
	url_for('@campaign-target-cleanup-provider?slug='.$campaign->getSlug().'&provider='.$providerName),
	$providerString);
			} ?>

</table>
<br />
<p>Vous pouvez <?php echo link_to('ajouter un nouveau critère', '@campaign-target-add?slug='.$campaign->getSlug()); ?> ou <?php echo link_to('supprimez tous les critères', '@campaign-target-cleanup?slug='.$campaign->getSlug()) ?> pour envoyer la campagne à tous vos contacts.</p>

<?php endif; ?>

