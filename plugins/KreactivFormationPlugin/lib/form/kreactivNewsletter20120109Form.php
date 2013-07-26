<?php
class kreactivNewsletter20120109Form extends sfForm {
    protected function createWidget()
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
                )
            );
    }

    public function configure()
    {
        parent::configure();

    		//region baseline
    		$this->widgetSchema['baseline'] = new sfWidgetFormInput(array(), array('label' => 'Sous-titre', 'style' => 'width: 770px'));
    		$this->validatorSchema['baseline'] = new sfValidatorString(array('required' => false));
    		$this->getWidgetSchema()->setHelp('baseline', '');
    		//endregion

        //region top_content
        $this->widgetSchema['top_content'] = $this->createWidget();
        $this->validatorSchema['top_content'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('top_content', '');
        //endregion

        //region bottom_content
        $this->widgetSchema['bottom_content'] = $this->createWidget();
        $this->validatorSchema['bottom_content'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('bottom_content', '');
        //endregion

        $this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}