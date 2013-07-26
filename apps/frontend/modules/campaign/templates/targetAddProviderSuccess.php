<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>
<?php



$provider->renderAdminInterface($campaign->getRawValue(), $sf_request->getRawValue());

?>
<br />
<br />
	<?php //echo link_to('Revenir à la liste des destinataires de la campagne', '@campaign_edit_targets?slug='.$campaign->getSlug()) ?>

