<?php

class czWidgetFormTextareaTinyMCE extends sfWidgetFormTextarea
{

	protected function configure($options = array(), $attributes = array())
	{
		$this->addOption('theme', 'advanced');
		$this->addOption('width');
		$this->addOption('height');
		$this->addOption('config', '');

		$this->setOption('width', isset($options['width'])?$options['width']:560);
		$this->setOption('height', isset($options['height'])?$options['height']:100);


		$config = 'language: "' . sfConfig::get('app_catalyz_language','fr') . '",';
		$config .= 'relative_urls: false,';

		$config .= sfConfig::get('app_tiny_mce_options',
		'plugins: "fullscreen,table,imagemanager,filemanager,paste,catalyz_link,media,advlink,style",theme:"advanced",theme_advanced_buttons1:"fontsizeselect,bold,italic,|,link,unlink,|,insertimage,image,|,tablecontrols,code",theme_advanced_buttons2:"",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",extended_valid_elements:"a[name|href|target|title|onclick|class|type],img[class|src|border|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],iframe[width|height|frameborder|scrolling|marginheight|marginwidth|src]",theme_advanced_blockformats:"p,h1,h2,h3,h4,h5",table_cell_styles:"",table_styles:"",advlink_styles:"",content_css:""');
//		$config .= sfConfig::get('app_tiny_mce_options',
//		'plugins: "imagemanager,filemanager,paste,media,advlink",
//			theme:"advanced",
//			theme_advanced_buttons1:"fontselect,fontsizeselect,forecolor,backcolor,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,link,unlink,image,|,code,pasteword,|,undo,redo",
//			theme_advanced_buttons2:"",
//			theme_advanced_buttons3:"",
//			theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",extended_valid_elements:"a[name|href|target|title|onclick|class|type],img[class|src|border|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",theme_advanced_blockformats:"p,h1,h2,h3,h4,h5",table_cell_styles:"",table_styles:"",advlink_styles:"Zoom=zoom"');

		$this->setOption('config', $config);

	}



	/**
	 * @param  string $name        The element name
	 * @param  string $value       The value selected in this widget
	 * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
	 * @param  array  $errors      An array of errors for the field
	 *
	 * @return string An HTML tag string
	 *
	 * @see sfWidgetForm
	 */
	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		$textarea = parent::render($name, $value, $attributes, $errors);

//		sfContext::getInstance()->getResponse()->addjavascript('jquery-1.5.1.min.js');

		$js = '<script type="text/javascript">';

		if ($this->getAttribute('ajax')) {
			$js .= sprintf('t = setTimeout("initElement()",100);function initElement(){');
		}

			$js .= sprintf('
	tinyMCE.init({
    mode:                              "exact",
    elements: 											 	 "%s",
    theme:                             "%s",
    %s
    %s
    theme_advanced_toolbar_location:   "top",
    theme_advanced_toolbar_align:      "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing:           true
    %s
  });
  ', $this->generateId($name),
			$this->getOption('theme'),
			$this->getOption('width')  ? sprintf('width:                             "%spx",', $this->getOption('width')) : '',
			$this->getOption('height') ? sprintf('height:                            "%spx",', $this->getOption('height')) : '',
			$this->getOption('config') ? ",\n".$this->getOption('config') : ''
			);


		if ($this->getAttribute('ajax')) {
				$js .= sprintf('clearTimeout(t);}');
		}


		$js .= sprintf('</script>');

		return $textarea.$js;
	}
}
