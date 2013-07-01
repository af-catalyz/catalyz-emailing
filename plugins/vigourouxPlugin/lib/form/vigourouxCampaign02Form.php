<?php
class vigourouxCampaign02Form extends /*(sfForm)*/sfForm {
	public function configure()
	{
		parent::configure();

		//region campaign_number
		$this->widgetSchema['campaign_number'] = new sfWidgetFormInput(array(),array('label' => 'Numéro de la campagne','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['campaign_number'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('campaign_number', '');
		//endregion

		//region title
		$this->widgetSchema['title'] = new sfWidgetFormInput(array(),array('label' => 'Titre de la campagne','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('title', '');
		//endregion

		//region contenu
		$this->widgetSchema['contenu'] = new czWidgetFormTextareaTinyMCE(array('height'=>400));;
		$this->validatorSchema['contenu'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contenu', '');
		//endregion

		//region footer
		$this->widgetSchema['footer'] = new sfWidgetFormInput(array(), array('label' => 'Bas de page','style' => 'width: 400px'));
		$this->validatorSchema['footer'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
