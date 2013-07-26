<?php

class sfGuardFormSignin extends BasesfGuardFormSignin
{
	public function configure()
	{
		$this->setWidgets(array(
		  'username' => new sfWidgetFormInput(),
		  'password' => new sfWidgetFormInput(array('type' => 'password')),
		  'remember' => new sfWidgetFormInputCheckbox(),
		));

		$this->setValidators(array(
		  'username' => new sfValidatorString(),
		  'password' => new sfValidatorString(),
		  'remember' => new sfValidatorBoolean(),
		));


		$i18n = sfContext::getInstance()->getI18N();
		$this->getWidgetSchema()->setLabels(array(
			'username' => $i18n->__('Identifiant'),
			'password' => $i18n->__('Mot de passe'),
			'remember' => $i18n->__('Me laisser connecté')
		));

		$this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

		$this->widgetSchema->setNameFormat('signin[%s]');
	}
}
