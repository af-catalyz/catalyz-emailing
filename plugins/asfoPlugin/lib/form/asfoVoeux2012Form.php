<?php
class asfoVoeux2012Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region title
		$this->widgetSchema['title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
//		$this->defaults['title'] = '';
		$this->getWidgetSchema()->setHelp('title', '');
		//endregion

		//region page_content
		$this->widgetSchema['page_content'] = new czWidgetFormTextareaTinyMCE(array('height' => 500),array('label' => 'Contenu'));
		$this->validatorSchema['page_content'] = new sfValidatorString(array('required' => false));
//		$this->defaults['page_content'] = '';
		$this->getWidgetSchema()->setHelp('page_content', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}