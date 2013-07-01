<?php
class vigourouxCampaign01Form extends sfForm {
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

		//region editorial_title
		$this->widgetSchema['editorial_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['editorial_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('editorial_title', '');
		//endregion

		//region editorial_content
		$this->widgetSchema['editorial_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'width: 400px','rows'=>5));
		$this->validatorSchema['editorial_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('editorial_content', '');
		//endregion

		//region products_content
		$this->widgetSchema['products_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'products_content',
		        'formClass' => 'vigourouxCampaign01Form_product',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un élément',
		        ), array('label' => false)
		);
		$this->validatorSchema['products_content'] = new czValidatorSubForm(array('formClass' => 'vigourouxCampaign01Form_product'));
		$this->getWidgetSchema()->setHelp('products_content', '');
		//endregion

		//region news_title
		$this->widgetSchema['news_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['news_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('news_title', '');
		//endregion

		//region news_content
		$this->widgetSchema['news_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'news_content',
		        'formClass' => 'vigourouxCampaign01Form_news',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un élément',
		        ), array('label' => false)
		);
		$this->validatorSchema['news_content'] = new czValidatorSubForm(array('formClass' => 'vigourouxCampaign01Form_news'));
		$this->getWidgetSchema()->setHelp('news_content', '');
		//endregion


		//region footer
		$this->widgetSchema['footer'] = new sfWidgetFormInput(array(), array('label' => 'Bas de page','style' => 'width: 400px'));
		$this->validatorSchema['footer'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer', '');
		//endregion




		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
