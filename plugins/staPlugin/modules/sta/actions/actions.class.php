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

		//allow admin to test application
		if ($key_hash == sfConfig::get('app_seed')) {
			$email = $tokens[0];
			$campaignId = $tokens[1];
		}else{
			list($email, $campaignId) = Campaign::extractKeyInformation($this->key);
		}

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
		$this->user =/*(Contact)*/ ContactPeer::doSelectOne($criteria);
		$this->forward404Unless($this->user);
		//endregion

		$this->form = new lightContactForm($this->user);
		$this->form->bind($request->getParameter($this->form->getName()));

		if ($this->form->isValid()) {
			$user = $this->form->save();
			$this->sendUserEmail($user);
		}else{
			$this->setTemplate('edit');
		}

		$this->setLayout('layoutAnonymous');
	}

	function sendUserEmail($user){
		try {
			$subject = 'Un grand merci !';
			$message =	$this->getPartial('sta/email_thankYou', array('user' => $user));

			$messageAdmin = Swift_Message::newInstance()
			  ->setFrom(array('sta@catalyz-emailing.com' => 'STA'))
			  ->setTo($user->getEmail())
			  ->setSubject($subject)
			  ->setBody($message,'text/html');

			$this->getMailer()->send($messageAdmin);
		}
		catch(Exception $e) {

		}

		return TRUE;
	}
}
