<?php

class newtechCampaign02CampaignTemplateHandler extends newtechCampaign01CampaignTemplateHandler {
	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('newtech/campaign02', array('parameters' => $parameters));
	}
}

?>