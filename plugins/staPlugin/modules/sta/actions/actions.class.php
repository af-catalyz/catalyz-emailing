<?php

class staActions extends sfActions
{

	public function executeEdit(sfWebRequest $request)
	{
		//region check and load user
		$this->forward404Unless($request->hasParameter('key'));
		$this->forward404Unless($request->getParameter('key') != '');

		$this->key = $request->getParameter('key');

		preg_match('/^(.+)-([0-9]+)-([a-zA-Z0-9]+)$/', $this->key, $tokens);
		$key_hash = $tokens[3];

		list($email, $campaignId) = Campaign::extractKeyInformation($this->key);

//		$email = 'stephane.machado@airbus.com';
//		var_dump(md5($email . sfConfig::get('app_seed')));
//		die();

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
