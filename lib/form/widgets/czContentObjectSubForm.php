<?php

class czContentObjectSubForm extends sfForm {
    function configure()
    {
        parent::configure();
        // $this->disableLocalCSRFProtection();
        $this->widgetSchema->setNameFormat('campaign[content][%s]');
    }

	public function render($attributes = array())
	{
//		foreach( $this->getWidgetSchema()->getFields() as $name => $widget){
//			$widget->setAttribute('onchange', $widget->getAttribute('onchange'). ' ; refreshCampaignPreview(this.form);');
//		}

		return parent::render($attributes);
	}



    public function isRequired($fieldName)
    {
        return $this->validatorSchema[$fieldName]->getOption('required');
    }
}

?>