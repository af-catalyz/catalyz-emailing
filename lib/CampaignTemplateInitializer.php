<?php

class CampaignTemplateInitializer{
	function execute(Campaign $campaign, CampaignTemplate $template){
		$campaign->setContent($template->getTemplate());
		$campaign->save();
		$campaign->getCampaignDeliveryManager()->prepareCampaignDelivery();
	}
}

?>