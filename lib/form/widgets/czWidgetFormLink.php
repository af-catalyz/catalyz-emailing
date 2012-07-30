<?php

class czWidgetFormLink extends sfWidgetFormInput {

	protected function configure($options = array(), $attributes = array())
	{
		parent::configure($options, $attributes);
		$this->setOption('type', 'hidden');
	}

	public function renderTag($name, $value = null, $attributes = array(), $errors = array()){
		$id = rand();
		$result = sprintf('<div class="czWidgetFormLink%s"><span id="LinkPath%s">',$id,$id);
		if ($value['value'] != '') {
			if(substr($value['value'],0,15 ) == '/uploads/assets'){
				$result .= sprintf('Lien vers le fichier %s</span>',$value['value']);
			}
			else{
				$result .= sprintf('Lien vers la page web suivante : <a href="%s" target"_blank">%s</a></span>',$value['value'],$value['value']);
			}

		}
		else{
			$result .= sprintf('Aucun lien configuré</span>');
		}
		$result .= sprintf('<span id="slink%s" style="float:right;"> [<a href="javascript:void(0);" id="link%s">Parcourir</a>]</span>', $id, $id);
		$result .= parent::renderTag($name, $value, $attributes, $errors);
		$result .= sprintf('<div id="ToUpdate%s"></div>',$id);

		$result.=sprintf('
<script>
$(\'#link%1$s\').click(function() {
	$(\'#slink%1$s\').hide();
	$(\'#LinkPath%1$s\').hide();
	x = $.ajax({
		type: "POST",
		url: "%2$s",
		data:  "random=%s&value="+$(".czWidgetFormLink%1$s input:hidden").val()+"&FieldName="+ $(\'.czWidgetFormLink input\').attr(\'name\'),
		success: function(html) {
			$("#ToUpdate%1$s").append(html);
		}
	});
});
</script>',$id,url_for('@catalyz-ajax-add-link-form'));

		return $result;

	}

	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		sfContext::getInstance()->getResponse()->addJavascript('/js/tiny_mce/plugins/filemanager/js/mcfilemanager.js');
		return parent::render($name, $value, $attributes, $errors);
	}

	static function displayLink($value, $defaultPath = false){
		if ($defaultPath == FALSE) {
			 $defaultPath = CatalyzEmailing::getApplicationUrl();
		}

		if(substr($value,0,15 ) == '/uploads/assets'){
			return $defaultPath.$value;
		}

		return $value;
	}
}



