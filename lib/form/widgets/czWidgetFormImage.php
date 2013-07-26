<?php

class czWidgetFormImage extends sfWidgetFormInput {
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);
        $this->setAttribute('size', 90);
        $this->addOption('thumbnail.width', 150);
        $this->addOption('thumbnail.height', 100);
        $this->addRequiredOption('picture.width');
        $this->addRequiredOption('picture.height');
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
         sfContext::getInstance()->getResponse()->addJavascript('/js/tiny_mce/plugins/imagemanager/js/mcimagemanager.js');
        if (count($errors) > 0) {
            if (empty($attributes['class'])) {
                $attributes['class'] = 'error';
            } else {
                $attributes['class'] .= ' error';
            }
        }

        $options = $this->getOptions();
        $result = parent::render($name, $value, $attributes, $errors);

        $result .= sprintf(' [<a href="javascript:mcImageManager.open(\'catalyzEdit\', \'%s\', \'\',
    		 function (url, data){
    		 		x = $.ajax({
								 type: \'POST\',
								 url: \'/catalyz/create_thumbnail_path\',
    						     data:  \'height=%s&width=%s&url=\'+ url,
    						     success: function(html) {
    						     	$(\'#thumbnail%s\').attr(\'src\', html);
    		 							$(\'#%s\').attr(\'value\', url);
	  								 }
								});

    		 		},
		 {remove_script_host: true} );">Parcourir</a>]' , $name , $this->getOption('thumbnail.height') , $this->getOption('thumbnail.width') , $this->generateId($name) , $this->generateId($name)

            );

        $result .= '<table border="0" width="100%" cellpadding="0" cellspacing="0"><tr valign="top"><td>';
        if ($value) {
            $result .= '<img style="float:left; margin-right:10px;" src="' . ($value?thumbnail_path($value, $this->getOption('thumbnail.width'), $this->getOption('thumbnail.height')):'/images/blank.gif') . '" id="thumbnail' . $this->generateId($name) . '" class="thumbnail" />';
        }else {
            $result .= '<img style="float:left; margin-right:10px;" src="/images/blank.gif" height="' . $this->getOption('thumbnail.height') . '" width="' . $this->getOption('thumbnail.width') . '" id="thumbnail' . $this->generateId($name) . '" class="thumbnail" />';
        }
        $result .= "</td><td>";
        $result .= sprintf('<p class="hint">(%s * %s)</p>', $options['picture.width'], $options['picture.height']);
        $result .= sprintf('<p class="hint">Le nom de vos images joue un rôle dans votre référencement, pensez à utiliser des noms explicites, contenant les mots clefs qui sont importants pour votre activité et l\'image en utilisant le tiret «-» pour les noms composés de plusieurs mots.</p>');
        $result .= '</td></tr></table>';
        return $result;
    }
}

?>

