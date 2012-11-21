<?php

class staActions extends sfActions
{

	public function executeEdit(sfWebRequest $request)
	{
		//region check and load user
		$this->forward404Unless($request->hasParameter('key'));
		$this->forward404Unless($request->getParameter('key') != '');

		$this->key = $request->getParameter('key');

		$tokens = explode('-', $this->key);
		$key_hash = $tokens[2];

		list($email, $campaignId) = Campaign::extractKeyInformation($this->key);

		$this->forward404If($key_hash != md5($email . sfConfig::get('app_seed')));

		$criteria = new Criteria();
		$criteria->add(ContactPeer::EMAIL, $email);
		$this->user =/*(CampaignContact)*/ ContactPeer::doSelectOne($criteria);
		$this->forward404Unless($this->user);
		//endregion

		$this->form = new lightContactForm($this->user);
		$this->setLayout('layoutAnonymous');
	}

	public function executeThankYou(sfWebRequest $request)
	{
		//region check and load user
		$this->forward404Unless($request->isMethod('post'));
		$this->forward404Unless($request->hasParameter('key'));
		$this->forward404Unless($request->getParameter('key') != '');

		$this->key = $request->getParameter('key');

		list($email, $campaignId) = Campaign::extractKeyInformation($this->key);

		$criteria = new Criteria();
		$criteria->add(ContactPeer::EMAIL, $email);
		$this->user =/*(CampaignContact)*/ ContactPeer::doSelectOne($criteria);
		$this->forward404Unless($this->user);
		//endregion

		$this->form = new lightContactForm($this->user);
		$this->form->bind($request->getParameter($this->form->getName()));

		if ($this->form->isValid()) {
			$this->form->save();
		}else{
			$this->setTemplate('edit');
		}

		$this->setLayout('layoutAnonymous');
	}
}
