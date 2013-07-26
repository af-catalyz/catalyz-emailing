<?php
class staForm_main extends czContentObjectSubForm {

		function configure()
    {
        parent::configure();


				$colors = '';
				if (sfConfig::get('app_catalyz_tinymce_default_colors', FALSE)) {
					$colors = sprintf(',theme_advanced_text_colors : "%s"', sfConfig::get('app_catalyz_tinymce_default_colors'));
				}

        $this->setWidgets(array(
        'content' => new sfWidgetFormTextareaTinyMCE(
        array(
            'width' => sfConfig::get('app_wysiwyg_width', 777),
            'height' => 400,
            'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen,style",theme:"advanced",'
             . 'theme_advanced_buttons1:"forecolor,fontsizeselect,bold,italic,bullist,|,link,unlink,|,insertimage,image",'
             . 'theme_advanced_buttons2:"justifyleft,justifycenter,justifyright,justifyfull,|,tablecontrols,|,code",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
             . ',advlink_styles:""'
             . ',content_css:""'
             . $colors
            ),array('ajax' => $this->getOption('delay', false))
        )
                ));

    	  $this->getWidgetSchema()->setLabels(array(
                'content' => false
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>