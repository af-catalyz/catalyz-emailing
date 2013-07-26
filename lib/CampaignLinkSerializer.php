<?php


class CampaignLinkSerializer {
	protected $Campaign;
	function __construct($campaign){
		$this->Campaign = $campaign;
	}
	function serialize($links)
	{
		$existing = array();
		$Criteria = new Criteria();
		$Criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $this->Campaign->getId());
		foreach(CampaignLinkPeer::doSelect($Criteria) as /*(CampaignLink)*/$CampaignLink){
			$existing[$CampaignLink->getUrl()] = $CampaignLink;
		}

		$links = array_unique(array_values($links));
		foreach($links as $url){
			if(isset($existing[$url])){
				$this->links[$url] = $existing[$url]->getId();
				unset($existing[$url]);
			}else{
				$CampaignLink = $this->newCampaignLink($url);
				$this->links[$url] = $CampaignLink->getId();
			}
		}
		foreach($existing as $CampaignLink){
			$CampaignLink->delete();
		}
	}

	protected $links = array();

	function getCampaignLinkId($url)
	{
		return $this->links[$url];
	}

	public function newCampaignLink($url)
	{
		$result = new CampaignLink();
		$result->setCampaign($this->Campaign);
		$result->setUrl($url);
		$result->save();
		return $result;
	}
}


?>