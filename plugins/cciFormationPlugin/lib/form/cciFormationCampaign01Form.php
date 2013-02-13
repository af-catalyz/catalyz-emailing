<?php
class cciFormationCampaign01Form extends sfForm {
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

		//region top_picture
		$this->widgetSchema['top_picture'] = new czWidgetFormImage(array('picture.width' => 600, 'picture.height'=> 999), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['top_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('top_picture', '');
		//endregion

		//region number
		$this->widgetSchema['number'] = new sfWidgetFormInput(array(),array('label' => 'En-tête','style'=>"width:400px"));
		$this->validatorSchema['number'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('number', '');
		//endregion

		//region date
		$this->widgetSchema['date'] = new sfWidgetFormInput(array(),array('label' => 'Date','style'=>"width:400px"));
		$this->validatorSchema['date'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('date', '');
		//endregion

		//region subtitle
		$this->widgetSchema['subtitle'] = new sfWidgetFormInput(array(),array('label' => 'Sous titre','style'=>"width:400px"));
		$this->validatorSchema['subtitle'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('subtitle', '');
		//endregion

		//region left_content
		$this->widgetSchema['left_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'left_content',
		        'formClass' => 'cciFormationCampaign01Form_main',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un article',
		        ), array('label' => false)
		);
		$this->validatorSchema['left_content'] = new czValidatorSubForm(array('formClass' => 'cciFormationCampaign01Form_main'));
		$this->getWidgetSchema()->setHelp('left_content', '');
		//endregion

		//region news_title
		$this->widgetSchema['news_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['news_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('news_title', '');
		//endregion

		//region news_content
		$this->widgetSchema['news_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style'=>"width:400px"));
		$this->validatorSchema['news_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('news_content', '');
		//endregion

		//region news_target
		$this->widgetSchema['news_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style'=>"width:400px"));
		$this->validatorSchema['news_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('news_target', '');
		//endregion

		//region news_target_caption
		$this->widgetSchema['news_target_caption'] = new sfWidgetFormInput(array(),array('label' => 'Titre du lien','style'=>"width:400px"));
		$this->validatorSchema['news_target_caption'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('news_target_caption', '');
		//endregion

		//region others
		$this->widgetSchema['others'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'others',
		        'formClass' => 'cciFormationCampaign01Form_main',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['others'] = new czValidatorSubForm(array('formClass' => 'cciFormationCampaign01Form_main'));
		$this->defaults['others'] = '';
		$this->getWidgetSchema()->setHelp('others', '');
		//endregion

		//region right_picture
		$this->widgetSchema['right_picture'] = new czWidgetFormImage(array('picture.width' => 600, 'picture.height'=> 999), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['right_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_picture', '');
		//endregion

		//region right_title
		$this->widgetSchema['right_title'] = new sfWidgetFormTextarea(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['right_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_title', '');
		//endregion

		//region right_content
		$this->widgetSchema['right_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style'=>"width:400px"));
		$this->validatorSchema['right_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_content', '');
		//endregion

		//region right_target
		$this->widgetSchema['right_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style'=>"width:400px"));
		$this->validatorSchema['right_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_target', '');
		//endregion

		//region right_target_caption
		$this->widgetSchema['right_target_caption'] = new sfWidgetFormInput(array(),array('label' => 'Titre du lien','style'=>"width:400px"));
		$this->validatorSchema['right_target_caption'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_target_caption', '');
		//endregion

		//region testimony
		$this->widgetSchema['testimony'] = $this->createWidget(array('label' => false));
		$this->validatorSchema['testimony'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('testimony', '');
		//endregion

		//region bottom_title
		$this->widgetSchema['bottom_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['bottom_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bottom_title', '');
		//endregion

		//region bottom_content
		$this->widgetSchema['bottom_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style'=>"width:400px"));
		$this->validatorSchema['bottom_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bottom_content', '');
		//endregion

		//region email
		$this->widgetSchema['email'] = new sfWidgetFormInput(array(),array('label' => 'E-mail','style'=>"width:400px"));
		$this->validatorSchema['email'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('email', '');
		//endregion

		//region phone
		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(),array('label' => 'Téléphone','style'=>"width:400px"));
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('phone', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
