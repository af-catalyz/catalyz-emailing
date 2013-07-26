<?php
class OtNewsletter2012Form_box extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$sfWidgetFormSchema = /*(sfWidgetFormSchema)*/ $this->getWidgetSchema();


		$styleTab = array();
		$styleTab['manifestation'] = 'Manifestation';
		$styleTab['musique'] = 'Musique';
		$styleTab['sport'] = 'Sport';
		$styleTab['culture'] = 'Culture';
		$styleTab['tourisme'] = 'Tourisme';
		$styleTab['cinema'] = 'Cinéma';
		$styleTab['danse'] = 'Danse';
		$styleTab['loisirs'] = 'Loisirs';
		$styleTab['stage'] = 'Stage';
		$styleTab['exposition'] = 'Exposition';


		$this->setWidgets(array(
						'style' => new sfWidgetFormSelect(array("choices" => $styleTab), array('style' => 'width: 400px')),
						'picture' => new czWidgetFormImage(array('picture.width' => 389, 'picture.height' => 141,'thumbnail.width' => 389/2, 'thumbnail.height' => 141/2), array('style' => 'width: 400px')),
						'content' => new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 300,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen,style",theme:"advanced",'
		     . 'theme_advanced_buttons1:"forecolor,fontsizeselect,bold,italic,|,link,unlink,|,bullist,insertimage,image,|,tablecontrols,pasteword,code",'
		     . 'theme_advanced_buttons2:"",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:""'
		     . ',content_css:""'
		    ),array('ajax' => $this->getOption('delay', false))
		)


		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'style' => 'Style de l\'encart',
		        'content' => 'Contenu',
		        'picture' => 'Illustration'
		        ));
	}
}

?>