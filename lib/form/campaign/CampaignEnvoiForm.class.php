<?php
class CampaignEnvoiForm extends BaseCampaignForm {
    public function setup()
    {
        parent::setup();

        $hasGroups = sfConfig::get('app_options_contact_group');

        $campaign =/*(Campaign)*/ $this->getObject();

        $widgets = array();
        $validators = array();
        $defaults = array();

        //region id
        $widgets['id'] = new sfWidgetFormInputHidden();
        $validators['id'] = new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => true));
        //endregion

		//region scheduled_at
        $widgets['scheduled_at'] = new czWidgetFormDateInput(array(), array('size' => 14 ,'onclick'=>'document.getElementById(\'campaign_schedule_type_2\').checked = true;'));
        $validators['scheduled_at'] = new sfValidatorDate(array('required' => TRUE,
                'date_format' => '@(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{2,4}).(?P<hour>\d{2}):(?P<minute>\d{2})@',
                'with_time'=>true,
				'min' => time(),
				'datetime_output'=>'Y-m-d H:i',
                'date_output' => 'd/m/Y H:i'
                ), array(
                'min' => 'La date doit être après %min%',
               'bad_format' => '"%value%" n\'est pas un format de date valide (jj/mm/yyyy).',
                ));
	 			$defaults['scheduled_at'] = $campaign->getScheduledAt('d/m/Y h:i');
        //endregion

        //region schedule_type
        $schedulingOptions = array();
        $schedulingOptions[Campaign::SCHEDULING_NONE] = 'Je ne sais pas encore';
        $schedulingOptions[Campaign::SCHEDULING_NOW] = 'Dès que possible';
        $schedulingOptions[Campaign::SCHEDULING_AT] = 'A partir du';
        $widgets['schedule_type'] = new sfWidgetFormSelectRadio(array('choices' => $schedulingOptions, 'formatter' => array($this, 'formatScheduling')));;
        $validators['schedule_type'] = new sfValidatorChoice(array('choices' => array_keys($schedulingOptions)),
            array('required' => 'Vous devez préciser à partir de quand la campagne doit être envoyée'));
        $defaults['schedule_type'] = Campaign::SCHEDULING_NONE;
        //endregion

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->setDefaults($defaults);
        $this->widgetSchema->setNameFormat('campaign[%s]');
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    public function formatTargets($widget, $choices)
    {
        return get_partial('campaign/editTargets', array('form' => $this, 'widget' => $widget, 'choices' => $choices));
    }
    public function formatScheduling($widget, $choices)
    {
        return get_partial('campaign/editScheduling', array('form' => $this, 'widget' => $widget, 'choices' => $choices));
    }
    public function getModelName()
    {
        return 'Campaign';
    }

//    public function updateObject(/*$values = null*/)
//    {
//    	// this method is not called, see handleContent method from campaign module
//
//        $object = parent::updateObject(/*$values*/);
//
//
//        var_dump($object->getCampaignContactGroupsJoinContactGroup());
//        exit;
//        return $object;
//    }
    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
        switch (@$taintedValues["schedule_type"]) {
            case Campaign::SCHEDULING_NONE:
            case Campaign::SCHEDULING_NOW:
                $this->validatorSchema["scheduled_at"] = new sfValidatorPass();;
				//$this->validatorSchema["scheduled_at"]->setOption('required', false);
                break;
            case Campaign::SCHEDULING_AT:
				$this->validatorSchema["scheduled_at"]->setOption('required', true);
                break;
        } // switch
        return parent::bind($taintedValues, $taintedFiles);
    }
}