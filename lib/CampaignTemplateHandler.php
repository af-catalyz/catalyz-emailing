<?php

class CampaignTemplateHandler {
    protected $campaign;
    function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }
    public function createEditWidget()
    {
    	$result['widget'] = new sfWidgetFormTextareaTinyMCE(array(
    	'width' => sfConfig::get('app_wysiwyg_width', 777),
    	'height' => 720,
    	'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,fullpage,directionality,fullscreen",theme:"advanced",'
    	. 'theme_advanced_buttons1:"formatselect,fontselect,fontsizeselect,removeformat,code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,undo,redo,separator,charmap",'
    	. 'theme_advanced_buttons2:"forecolor,backcolor,separator,anchor,link,unlink,separator,image,separator,tablecontrols,separator,ltr,rtl,separator,fullscreen",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
    	. ',advlink_styles:""'
    	. ',content_css:"' . implode(',', $this->campaign->extractCssUrls()) . '"'
    	.',theme_advanced_text_colors : "'.sfConfig::get('app_catalyz_tinymce_default_colors', '').'"',
    ));

				$result['validator'] = new sfValidatorString(array('required' => true), array());
        $result['default'] = (string)$this->campaign->getContent();
        return $result;
    }

    public function compute($parameters)
    {
        return '';
    }

    public function computeTextVersion($parameters)
    {
        return '';
    }

    public function displayTextTab()
    {
        return false;
    }

    public function getPreviewHeight()
    {
        return 500;
    }

	static function getCampaignName(){
		return 'Untitled';
	}
}

?>