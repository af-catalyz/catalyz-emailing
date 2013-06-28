<?php
class cimlecCampaign01Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region nom
		$this->widgetSchema['nom'] = new sfWidgetFormInput(array(),array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['nom'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('nom', '');
		//endregion

		//region statut
		$this->widgetSchema['statut'] = new sfWidgetFormInput(array(),array('label' => 'Statut','style' => 'width: 400px'));
		$this->validatorSchema['statut'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('statut', '');
		//endregion

		//region email
		$this->widgetSchema['email'] = new sfWidgetFormInput(array(),array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['email'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('email', '');
		//endregion

		//region content
		$this->widgetSchema['content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'width: 400px','rows'=>5));
		$this->validatorSchema['content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('content', '');
		//endregion

		//region top_content
		$this->widgetSchema['top_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['top_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('top_content', '');
		//endregion

		//region top_picture

		$this->widgetSchema['top_picture'] = new czWidgetFormImage(array('picture.width' => 600, 'picture.height'=> 198), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['top_picture'] = new sfValidatorString(array('required' => false));


		$this->getWidgetSchema()->setHelp('top_picture', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
