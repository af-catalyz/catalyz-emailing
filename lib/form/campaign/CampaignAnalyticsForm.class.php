<?php

class CampaignAnalyticsForm extends BaseCampaignForm {
	public function setup()
	{
		parent::setup();

		$campaign =/*(Campaign)*/ $this->getObject();

		$widgets = array();
		$validators = array();
		$defaults = array();

		//region id
			$widgets['id'] = new sfWidgetFormInputHidden();
			$validators['id'] = new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => true));
		//endregion

		//region google_analytics_enabled
		$widgets['google_analytics_enabled'] = new sfWidgetFormInputCheckbox();
		$validators['google_analytics_enabled'] = new sfValidatorBoolean(array('required' => FALSE));
		$defaults['google_analytics_enabled'] = (bool) $this->getDefault('google_analytics_enabled');
		//endregion

		//region google_analytics_source
		$widgets['google_analytics_source'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['google_analytics_source'] = new sfValidatorString(array('max_length' => 255, 'required' => TRUE), array('required' => '<span class="help-block">Vous devez préciser le paramètre "Source"</span>'));
		$defaults['google_analytics_source'] = sfConfig::get('app_app_url');
		//endregion

		//region google_analytics_medium
		$widgets['google_analytics_medium'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['google_analytics_medium'] = new sfValidatorString(array('required' => TRUE),array('required' => '<span class="help-block">préciser le parametre "Médium"</span>'));
		$defaults['google_analytics_medium'] = 'emailing';
		//endregion

		//region google_analytics_content
		$widgets['google_analytics_content'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['google_analytics_content'] = new sfValidatorString(array('required' => FALSE),array('required' => '<span class="help-block">Vous devez selectionner le paramètre "Campagne"</span>'));
		//endregion

		//region google_analytics_campaign
		$choices = array();
		$choices[Campaign::ANALYTICS_CAMPAIGN_NAME]=sprintf("Utiliser le nom de la campagne&nbsp; : \"%s\"",$campaign->getName());
		$choices[Campaign::ANALYTICS_CAMPAIGN_SUBJECT]=sprintf("Utiliser le sujet de la campagne : \"%s\"",$campaign->getSubject());
		$choices[Campaign::ANALYTICS_CAMPAIGN_CUSTOM]="Utiliser ce texte : ";
		$widgets['google_analytics_campaign_type'] = new sfWidgetFormSelectRadio(array('choices' => $choices, 'formatter' => array($this, 'formatAnalyticsCampaign')));
		$validators['google_analytics_campaign_type'] = new sfValidatorChoice(array('choices' => array_keys($choices),'required'=>TRUE),array('required' => '<span class="help-block">Vous devez préciser le parametre Campagne</span>'));
		$defaults['google_analytics_campaign_type'] = Campaign::ANALYTICS_CAMPAIGN_NAME;
		//endregion

		//region google_analytics_campaign
		$widgets['google_analytics_campaign_content'] = new sfWidgetFormInput(array(), array('onclick'=>'document.getElementById(\'campaign_google_analytics_campaign_type_2\').checked = true;return false;','size' => 50));
		$validators['google_analytics_campaign_content'] = new sfValidatorString(array('required' => FALSE));
		//endregion

		$this->setWidgets($widgets);
		$this->setValidators($validators);
		$this->getWidgetSchema()->setDefaults($defaults);

		$this->widgetSchema->setNameFormat('campaign[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	}

	public function formatAnalyticsCampaign($widget, $choices)
	{
		return get_partial('campaign/editAnalytics', array('form' => $this, 'widget' => $widget, 'choices' => $choices ,'campaign'=>$this->getObject()));
	}

	public function getModelName()
	{
		return 'Campaign';
	}

	public function bind(array $taintedValues = null, array $taintedFiles = null)
	{
		if (empty($taintedValues['google_analytics_enabled'])) {
			$this->validatorSchema['google_analytics_source']->setOption('required', FALSE);
			$this->validatorSchema['google_analytics_medium']->setOption('required', FALSE);
			$this->validatorSchema['google_analytics_content']->setOption('required', FALSE);
			$this->validatorSchema['google_analytics_campaign_type']->setOption('required', FALSE);
			$this->validatorSchema['google_analytics_campaign_content']->setOption('required', FALSE);
		}

		parent::bind($taintedValues,$taintedFiles);
	}

}