<?php
class semAutomationViergeForm extends sfForm {

protected function createWidget(){
	return new sfWidgetFormTextareaTinyMCE(
            array(
                'width' => sfConfig::get('app_wysiwyg_width', 777),
                'height' => 720,
                'config' => 'relative_urls : false,theme_advanced_font_sizes : "8px,10px,12px,14px,16px,24px", convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,fullpage,directionality,fullscreen",theme:"advanced",'
                 . 'theme_advanced_buttons1:"formatselect,fontselect,fontsizeselect,removeformat,code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,undo,redo,separator,charmap",'
                 . 'theme_advanced_buttons2:"forecolor,backcolor,separator,anchor,link,unlink,separator,image,separator,tablecontrols,separator,ltr,rtl,separator,fullscreen",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
                 . ',advlink_styles:""'
                 . ',content_css:""'
                )
            );

}

	public function configure()
	{
		parent::configure();

		//region page_content
		$this->widgetSchema['page_content'] = $this->createWidget();
		$this->validatorSchema['page_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('page_content', '');
		//endregion

		//region bottom_left
		$this->widgetSchema['bottom_left'] = $this->createWidget();
		$this->validatorSchema['bottom_left'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bottom_left', '');
		//endregion

		//region bottom_center
		$this->widgetSchema['bottom_center'] = $this->createWidget();
		$this->validatorSchema['bottom_center'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bottom_center', '');
		//endregion


		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
