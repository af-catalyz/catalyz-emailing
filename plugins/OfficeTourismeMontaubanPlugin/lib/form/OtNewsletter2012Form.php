<?php
class OtNewsletter2012Form extends sfForm {
	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 300,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen",theme:"advanced",'
		     . 'theme_advanced_buttons1:"forecolor,fontsizeselect,bold,italic,|,link,unlink,|,bullist,insertimage,image,|,tablecontrols,pasteword,code",'
		     . 'theme_advanced_buttons2:"",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:""'
		     . ',content_css:""'
		    ), $attributes
		);
	}

	public function configure()
	{
		parent::configure();

		//region top_picture
		$this->widgetSchema['top_picture'] = new czWidgetFormImage(array('picture.width' => 801, 'picture.height' => 166,'thumbnail.width' => 801/3, 'thumbnail.height' => 166/3), array('style' => 'width: 400px'));
		$this->validatorSchema['top_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('top_picture', '');
		//endregion

		//region date
		$this->widgetSchema['date'] = new sfWidgetFormInput(array(),array('label' => 'Date de la campagne','style' => 'width: 400px'));
		$this->validatorSchema['date'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('date', '');
		//endregion

		//region zoom_picture
		$this->widgetSchema['zoom_picture'] = new czWidgetFormImage(array('picture.width' => 801, 'picture.height' => 166,'thumbnail.width' => 801/3, 'thumbnail.height' => 166/3), array('style' => 'width: 400px'));
		$this->validatorSchema['zoom_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zoom_picture', '');
		//endregion

		//region zoom_content
		$this->widgetSchema['zoom_content'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['zoom_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zoom_content', '');
		//endregion

		//region box_left
		$this->widgetSchema['box_left'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'box_left',
		        'formClass' => 'OtNewsletter2012Form_box',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'style',
		        'label.add' => 'Ajouter un élément',
		        ), array('label' => false)
		);
		$this->validatorSchema['box_left'] = new czValidatorSubForm(array('formClass' => 'OtNewsletter2012Form_box'));
		$this->getWidgetSchema()->setHelp('box_left', '');
		//endregion

		//region box_right
		$this->widgetSchema['box_right'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'box_right',
		        'formClass' => 'OtNewsletter2012Form_box',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'style',
		        'label.add' => 'Ajouter un élément',
		        ), array('label' => false)
		);
		$this->validatorSchema['box_right'] = new czValidatorSubForm(array('formClass' => 'OtNewsletter2012Form_box'));
		$this->getWidgetSchema()->setHelp('box_right', '');
		//endregion

		//region visites
		$this->widgetSchema['visites'] =  $this->createWidget(array('label' => FALSE));
		$this->validatorSchema['visites'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('visites', '');
		//endregion

		//region footer_picture
		$this->widgetSchema['footer_picture'] = new czWidgetFormImage(array('picture.width' => 801, 'picture.height' => 166,'thumbnail.width' => 801/3, 'thumbnail.height' => 166/3), array('style' => 'width: 400px'));
		$this->validatorSchema['footer_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer_picture', '');
		//endregion

		//region contact_content
		$this->widgetSchema['contact_content'] = new czWidgetFormTextareaTinyMCE(array('height' => 300),array('label' => 'Contenu'));
		$this->validatorSchema['contact_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contact_content', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
