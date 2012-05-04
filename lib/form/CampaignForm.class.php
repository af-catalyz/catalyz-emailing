<?php

/**
 * Campaign form.
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
class CampaignForm extends BaseCampaignForm
{
	protected function getActiveTemplates()
	{

		sfContext::getInstance()->getConfiguration()->loadHelpers(array('Tag','Asset','cz'));

		$choices = array();
		$criteria = new Criteria();
		$criteria->add(CampaignTemplatePeer::IS_ARCHIVED, false);
		$criteria->addAscendingOrderByColumn(CampaignTemplatePeer::NAME);
		$templates = CampaignTemplatePeer::doSelect($criteria);
		foreach($templates as/*(CampaignTemplate)*/ $template) {
			$choices[$template->getId()] = sprintf('<img src="%s" alt="%s"><h5>#INPUT# %s %s</h5><div style="clear:both"></div>',

			$template->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$template->getPreviewFilename())?thumbnail_path($template->getPreviewFilename(), 260, 180):'http://placehold.it/260x180'
			, $template->getName(),$template->getName(), $template->getStatusBadge());
		}

		return $choices;
	}
	public function configure()
	{
		$widgets = array();
		$validators = array();
		$defaults = array();

		$choices = $this->getActiveTemplates();
		//      if (count($choices) == 0) {
		//            throw new Exception('No templates are available');
		//        }


		$widgets['created_by'] = new sfWidgetFormInputHidden();
		$validators['created_by'] = new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false));
		$defaults['created_by'] = sfContext::getInstance()->getUser()->getProfile()->getId();

		$widgets['template_id'] = new sfWidgetFormSelectRadio(array('choices' => $choices, 'formatter' => array($this, 'formatChoices')));
		$choices['archive']='archive';
		$choices['url']='url';
		$validators['template_id'] = new sfValidatorChoice(array('choices' => array_keys($choices), 'required' => true), array('required' => 'Vous devez sélectionner un modèle'));
		$choicesIds = array_keys($choices);
		$defaults['template_id'] = array_shift($choicesIds);

		$widgets['name'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Vous devez donner un nom à votre campagne'));
		$defaults['name'] = 'Ma campagne';

		$widgets['commentaire'] = new sfWidgetFormTextarea(array(), array('class' => 'input-xlarge'));
		$validators['commentaire'] = new sfValidatorString(array('required' => FALSE));

//		$widgets['archive'] = new sfWidgetFormInputFile(array(),array('style'=>'margin:10px;','size' => 42, 'onchange'=>'document.getElementById(\'campaign_template_id_archive\').checked = true;return false;'));
//		$validators['archive'] = new sfValidatorFile(array('required' => FALSE), array('required' => 'Vous devez fournir une archive valide'));
//
//		$widgets['url'] = new sfWidgetFormInput(array(), array('style'=>'margin:10px;','size' => 56,'onclick'=>'document.getElementById(\'campaign_template_id_url\').checked = true;return false;'));
//		$validators['url'] = new sfValidatorUrl(array('required' => false), array('required' => 'L\'adresse doit commencer par "http://"'));
//		//    	$defaults['url'] = 'http://';

		$this->setWidgets($widgets);
		$this->setDefaults($defaults);

		$this->setValidators($validators);
		$this->widgetSchema->setNameFormat('campaign[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	}

	public function formatChoices($widget, $choices)
	{
		$result = '<ul class="thumbnails">';
		foreach($choices as $choice) {
			$result .= sprintf('<li class="top_li span3"><div class="thumbnail">%s</div></li>', str_replace('#INPUT#', $choice['input'], $choice['label']));
		}
		$result .= '</ul>';
		return $result;
	}

	public function updateObject($values = null)
	{
		$object =/*(Campaign)*/ parent::updateObject($values);
		if ($this->object->isNew()) {
			$object->setSubject($object->getName());

			$object->setFromName(sfConfig::get('app_mail_from_name'));
			$object->setFromEmail(sfConfig::get('app_mail_from_email'));

			$object->setReplyToEmail(sfConfig::get('app_mail_reply_email'));

			$object->setReturnPathEmail(sfConfig::get('app_mail_reply_email'));
			$object->setReturnPathServer(sfConfig::get('app_mail_reply_server'));
			$object->setReturnPathLogin(sfConfig::get('app_mail_reply_login'));
			$object->setReturnPathPassword(sfConfig::get('app_mail_reply_password'));

			$template = $object->getCampaignTemplate();
			$initializerClassName = '';
			if ($template->getInitializer()) {
				if(!class_exists($template->getInitializer())){
					throw new Exception('Unable to find initializer: '.$template->getInitializer());
				}

				$initializerClassName = $template->getInitializer();
			} else {
				$initializerClassName = 'CampaignTemplateInitializer';
			}
			$object->save();
			$initializer = new $initializerClassName();
			$initializer->execute($object, $template);
			//var_dump($object);exit;
		}
		return $object;
	}

	public function updateTemplateValue($id)
	{
		$this->values['template_id']=$id;
		return TRUE;
	}
}
