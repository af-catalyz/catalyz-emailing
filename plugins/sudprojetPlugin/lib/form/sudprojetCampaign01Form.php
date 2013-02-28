<?php
class sudprojetCampaign01Form extends sfForm {
	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 500,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen",theme:"advanced",'
		     . 'theme_advanced_buttons1:"formatselect,fontsizeselect,removeformat,code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,undo,redo,separator,charmap",'
		     . 'theme_advanced_buttons2:"forecolor,backcolor,separator,anchor,link,unlink,separator,image,separator,tablecontrols,separator,ltr,rtl,separator,fullscreen",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:""'
		     . ',content_css:""'
		    ), $attributes
		);
	}

	public function configure()
	{
		parent::configure();

		//number,edito,main_content,grey_title,grey_content,grey_link,grey_picture,other_articles,adress,email,website_adress,zip,city,phone,fax

		//region number
		$this->widgetSchema['number'] = new sfWidgetFormInput(array(),array('label' => 'Numéro/date','style'=>"width:400px"));
		$this->validatorSchema['number'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('number', '');
		//endregion

		//region edito
		$this->widgetSchema['edito'] =  $this->createWidget(array('label' => 'Edito')) ;
		$this->validatorSchema['edito'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito', '');
		//endregion

		//region main_content
		$this->widgetSchema['main_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'main_content',
		        'formClass' => 'sudprojetCampaign01Form_main',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un article',
		        ), array('label' => false)

		);
		$this->validatorSchema['main_content'] = new czValidatorSubForm(array('formClass' => 'sudprojetCampaign01Form_main'));
		$this->defaults['main_content'] = '';
		$this->getWidgetSchema()->setHelp('main_content', '');
		//endregion

		//region grey_title
		$this->widgetSchema['grey_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre'));
		$this->validatorSchema['grey_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('grey_title', '');
		//endregion

		//region grey_content
		$this->widgetSchema['grey_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'height: 200px;width: 400px'));
		$this->validatorSchema['grey_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('grey_content', '');
		//endregion

		//region grey_link
		$this->widgetSchema['grey_link'] = new czWidgetFormLink(array(),array('label' => 'Cible'));
		$this->validatorSchema['grey_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('grey_link', '');
		//endregion

		//region grey_picture
		$this->widgetSchema['grey_picture'] = new czWidgetFormImage(array('picture.width' => 228, 'picture.height'=> 228), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['grey_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('grey_picture', '');
		//endregion

		//region other_articles
		$this->widgetSchema['other_articles'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'other_articles',
		        'formClass' => 'sudprojetCampaign01Form_other',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un article',
		        ), array('label' => false)

		);
		$this->validatorSchema['main_content'] = new czValidatorSubForm(array('formClass' => 'sudprojetCampaign01Form_other'));
		$this->defaults['main_content'] = '';
		$this->getWidgetSchema()->setHelp('main_content', '');
		//endregion

		//region partners
		$this->widgetSchema['partners'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'partners',
		        'formClass' => 'sudprojetCampaign01Form_partners',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un partenaire',
		        ), array('label' => false)

		);
		$this->validatorSchema['partners'] = new czValidatorSubForm(array('formClass' => 'sudprojetCampaign01Form_partners'));
		$this->defaults['partners'] = '';
		$this->getWidgetSchema()->setHelp('partners', '');
		//endregion

		//region adress
		$this->widgetSchema['adress'] = new sfWidgetFormInput(array(),array('label' => 'Adresse','style'=>"width:400px"));
		$this->validatorSchema['adress'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('adress', '');
		//endregion

		//region email
		$this->widgetSchema['email'] = new sfWidgetFormInput(array(),array('label' => 'E-mail','style'=>"width:400px"));
		$this->validatorSchema['email'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('email', '');
		//endregion

		//region website_adress
		$this->widgetSchema['website_adress'] = new czWidgetFormLink(array(),array('label' => 'Site internet','style'=>"width:400px"));
		$this->validatorSchema['website_adress'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('website_adress', '');
		//endregion

		//region zip
		$this->widgetSchema['zip'] = new sfWidgetFormInput(array(),array('label' => 'Code postal','style'=>"width:400px"));
		$this->validatorSchema['zip'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zip', '');
		//endregion

		//region city
		$this->widgetSchema['city'] = new sfWidgetFormInput(array(),array('label' => 'Ville','style'=>"width:400px"));
		$this->validatorSchema['city'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('city', '');
		//endregion

		//region phone
		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(),array('label' => 'Téléphone','style'=>"width:400px"));
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('phone', '');
		//endregion

		//region fax
		$this->widgetSchema['fax'] = new sfWidgetFormInput(array(),array('label' => 'Fax','style'=>"width:400px"));
		$this->validatorSchema['fax'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('fax', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
