<?php

class CampaignCopyForm extends sfForm {
    protected $OriginalCampaign = null;

		function __construct($OriginalCampaign)
    {
        $this->setOriginalCampaign($OriginalCampaign);
        parent::__construct();
    }

	  public function setOriginalCampaign($value)
    {
        $this->OriginalCampaign = $value;
    }

    public function setup()
    {
    	$i18n = sfContext::getInstance()->getI18N();

    	$this->setWidgets(array(
	    	'copy_from'              => new sfWidgetFormInputHidden(),
	    	'name'                   => new sfWidgetFormInputText(array('label' => $i18n->__('Nom')),array('class'=>'input-xxlarge')),
	    ));

    	$this->setValidators(array(
	    	'copy_from'              => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => true), array('required' => $i18n->__('Le modèle à copier est obligatoire'))),
	    	'name'                   => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => $i18n->__('Vous devez donner un nom à votre campagne')))
	    ));

    	$this->setDefaults(array(
    		'copy_from'              => $this->OriginalCampaign->getId(),
    		'name'              => sprintf('%s %s', $i18n->__('Copie de'), $this->OriginalCampaign->getName())
			));

    	$this->widgetSchema->setNameFormat('campaign_copy[%s]');

    	$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    	parent::setup();
    }
}