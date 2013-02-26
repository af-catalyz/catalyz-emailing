<?php
class cciFormationCalendrierForm extends sfForm {
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

		//top_picture,number,date,subtitle,left_title,left_content,left_bottom,right_title,right_content,download_title,download_text,download_link,download_picture,download_picture,adress,email,phone

		//region top_picture
		$this->widgetSchema['top_picture'] = new czWidgetFormImage(array('picture.width' => 600, 'picture.height'=> 173), array('label' => 'Illustration', 'style' => 'width: 400px'));
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

		//region left_title
		$this->widgetSchema['left_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['left_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_title', '');
		//endregion

		//region left_content
		$this->widgetSchema['left_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'left_content',
		        'formClass' => 'cciFormationCalendrierForm_main',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['left_content'] = new czValidatorSubForm(array('formClass' => 'cciFormationCalendrierForm_main'));
		$this->defaults['left_content'] = '';
		$this->getWidgetSchema()->setHelp('left_content', '');
		//endregion

		//region left_bottom
		//$this->widgetSchema['left_bottom'] =  $this->createWidget(array('label' => 'Bas de page')) ;
		$this->widgetSchema['left_bottom'] = new czWidgetFormLink(array(),array('label' => 'Cible','style'=>"width:400px"));
		$this->validatorSchema['left_bottom'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_bottom', '');
		//endregion

		//region right_title
		$this->widgetSchema['right_title'] = new sfWidgetFormTextarea(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['right_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_title', '');
		//endregion

		//region right_content
		$this->widgetSchema['right_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'right_content',
		        'formClass' => 'cciFormationCalendrierForm_other',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['right_content'] = new czValidatorSubForm(array('formClass' => 'cciFormationCalendrierForm_other'));
		$this->defaults['right_content'] = '';
		$this->getWidgetSchema()->setHelp('right_content', '');
		//endregion

		//region download_title
		$this->widgetSchema['download_title'] = new sfWidgetFormTextarea(array(),array('label' => 'Titre','style'=>"width:400px"));
		$this->validatorSchema['download_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('download_title', '');
		//endregion

		//region download_text
		$this->widgetSchema['download_text'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style'=>"width:400px"));
		$this->validatorSchema['download_text'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('download_text', '');
		//endregion

		//region download_link
		$this->widgetSchema['download_link'] = new czWidgetFormLink(array(),array('label' => 'Cible','style'=>"width:400px"));
		$this->validatorSchema['download_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('download_link', '');
		//endregion

		//region download_picture
		$this->widgetSchema['download_picture'] = new czWidgetFormImage(array('picture.width' => 120, 'picture.height'=> 133), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['download_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('download_picture', '');
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
