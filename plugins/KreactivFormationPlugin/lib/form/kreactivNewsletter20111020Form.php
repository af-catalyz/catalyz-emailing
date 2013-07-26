<?php
class kreactivNewsletter20111020Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region title
		$this->widgetSchema['title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
		$this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
		$this->defaults['title'] = '" LA PUISSANCE DE LA MARQUE "';
		$this->getWidgetSchema()->setHelp('title', '');
		//endregion

		//region page_content
		$this->widgetSchema['page_content'] = new czWidgetFormTextareaTinyMCE(array(), array('label' => 'Contenu'));
		$this->validatorSchema['page_content'] = new sfValidatorString(array('required' => false));
		$this->defaults['page_content'] = '';
		$this->getWidgetSchema()->setHelp('page_content', '');
		//endregion

		//region date
		$this->widgetSchema['date'] = new sfWidgetFormInput(array(), array('label' => 'Date', 'style' => 'width: 400px'));
		$this->validatorSchema['date'] = new sfValidatorString(array('required' => false));
		$this->defaults['date'] = 'VENDREDI XX OCTOBRE';
		$this->getWidgetSchema()->setHelp('date', '');
		//endregion

		//region hour
		$this->widgetSchema['hour'] = new sfWidgetFormInput(array(), array('label' => 'Heure', 'style' => 'width: 400px'));
		$this->validatorSchema['hour'] = new sfValidatorString(array('required' => false));
		$this->defaults['hour'] = 'DE 9H À 10H30';
		$this->getWidgetSchema()->setHelp('hour', '');
		//endregion

		//region location
		$this->widgetSchema['location'] = new sfWidgetFormInput(array(), array('label' => 'Lieu', 'style' => 'width: 400px'));
		$this->validatorSchema['location'] = new sfValidatorString(array('required' => false));
		$this->defaults['location'] = '10, PLACE NATIONALE À MONTAUBAN';
		$this->getWidgetSchema()->setHelp('location', '');
		//endregion

		//region top_content
		$this->widgetSchema['top_content'] = new sfWidgetFormInput(array(), array('label' => 'Haut de boîte', 'style' => 'width: 400px'));
		$this->validatorSchema['top_content'] = new sfValidatorString(array('required' => false));
		$this->defaults['top_content'] = 'Venez accompagné(e) ! Pour confirmer votre présence, contactez-nous :';
		$this->getWidgetSchema()->setHelp('top_content', '');
		//endregion

		//region contact
		$this->widgetSchema['contact'] = new sfWidgetFormInput(array(), array('label' => 'Contact', 'style' => 'width: 400px'));
		$this->validatorSchema['contact'] = new sfValidatorString(array('required' => false));
		$this->defaults['contact'] = 'contact@kreactiv.fr';
		$this->getWidgetSchema()->setHelp('contact', '');
		//endregion

		//region tel
		$this->widgetSchema['tel'] = new sfWidgetFormInput(array(), array('label' => 'Téléphone', 'style' => 'width: 400px'));
		$this->validatorSchema['tel'] = new sfValidatorString(array('required' => false));
		$this->defaults['tel'] = '05 63 66 71 52';
		$this->getWidgetSchema()->setHelp('tel', '');
		//endregion

		//region bottom_content
		$this->widgetSchema['bottom_content'] = new sfWidgetFormInput(array(), array('label' => 'Bas de boîte', 'style' => 'width: 400px'));
		$this->validatorSchema['bottom_content'] = new sfValidatorString(array('required' => false));
		$this->defaults['bottom_content'] = 'Attention, les places sont limitées, inscrivez-vous !';
		$this->getWidgetSchema()->setHelp('bottom_content', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}