<?php
class newtechCampaign01Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region edito
		$this->widgetSchema['edito'] = new czWidgetFormTextareaTinyMCE(array(),array('label' => 'Edito','height' => 300 ,'style' => 'width: 400px'));
		$this->validatorSchema['edito'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito', '');
		//endregion

		//region website_link
		$this->widgetSchema['website_link'] = new czWidgetFormLink(array(),array('label' => 'Lien vers le site','style' => 'width: 400px'));
		$this->validatorSchema['website_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('website_link', '');
		//endregion

		//region offers_link
		$this->widgetSchema['offers_link'] = new czWidgetFormLink(array(),array('label' => 'Lien "Pour découvrir nos nouvelles offres sans tarder"','style' => 'width: 400px'));
		$this->validatorSchema['offers_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('offers_link', '');
		//endregion

		//region contact_link
		$this->widgetSchema['contact_link'] = new czWidgetFormLink(array(),array('label' => 'Lien "pour être contacter"','style' => 'width: 400px'));
		$this->validatorSchema['contact_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contact_link', '');
		//endregion

		//region phone
		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(),array('label' => 'Téléphone'));
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('phone', '');
		//endregion

		//region footer
		$this->widgetSchema['footer'] = new czWidgetFormTextareaTinyMCE(array(),array('label' => 'Bas de page','height' => 300 ,'style' => 'width: 400px'));
		$this->validatorSchema['footer'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer', '');
		//endregion

		//region remerciements
		$this->widgetSchema['thanks'] = new czWidgetFormTextareaTinyMCE(array(),array('label' => 'Remerciements (texte aligné à droite)','height' => 300 ,'style' => 'width: 400px'));
		$this->validatorSchema['thanks'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('thanks', '');
		//endregion

		//region footer_link
		$this->widgetSchema['footer_link'] = new czWidgetFormLink(array(),array('label' => 'Lien sur l\'illustration du site','style' => 'width: 400px'));
		$this->validatorSchema['footer_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer_link', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
