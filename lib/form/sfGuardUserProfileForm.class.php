<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    form
 * @subpackage sf_guard_user_profile
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{

	protected function updateDefaultsFromObject()
	{
		parent::updateDefaultsFromObject();

		if (!$this->isNew){
			$defaults = $this->getDefaults();
			$guardUser = sfGuardUserPeer::retrieveByPK($defaults['user_id']);
			$this->setDefaults(array_merge(array('username'=>$guardUser->getusername()), $this->getDefaults()));
		}
	}

	public function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		'id'         => new sfWidgetFormInputHidden(),
		'user_id'    => new sfWidgetFormInputHidden(),
		'first_name' => new sfWidgetFormInput(),
		'last_name'  => new sfWidgetFormInput(),
		'email'      => new sfWidgetFormInput(),
		'username' => new sfWidgetFormInput(),
		'password' => new sfWidgetFormInputPassword(),
		'confirmation' => new sfWidgetFormInputPassword()
	));


		$this->setValidators(array(
		'id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
		'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
		'first_name' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
		'last_name'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
		'email'      => new sfValidatorEmail(array('required' => false), array('invalid'=>'<span class="help-inline">Cet email n\'est pas valide</span>')),
		'username'      => new sfValidatorString(array('max_length' => 64, 'required' => true), array('required'=>'<span class="help-inline">l\'identifiant est obligatoire</span>')),
		'password'      => new sfValidatorString(array('max_length' => 64, 'required' => FALSE), array('required'=>'<span class="help-inline">Le mot de passe est obligatoire</span>')),
		'confirmation'      => new sfValidatorString(array('max_length' => 64, 'required' => FALSE), array('required'=>'<span class="help-inline">La conformation du mot de passe est obligatoire</span>'))
	));

		$this->widgetSchema->setLabels(array(
		'first_name' => 'Prénom',
		'last_name' => 'Nom',
		'email' => 'Email',
		'username' => 'Identifiant <sup>*</sup>'
	));


		if ($this->isNew) {
			$this->validatorSchema['password']->setOption('required', true);
			$this->validatorSchema['confirmation']->setOption('required', true);

			$this->validatorSchema->setPostValidator(new sfValidatorAnd( array(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'confirmation', array(), array('invalid'=>'<span class="help-inline">le mot de passe et la confirmation doivent etre les mêmes</span>')), new sfValidatorPropelUnique(array('model' => 'sfGuardUser', 'column' =>	array('username')),array('invalid'=>'<span class="help-inline">Une autre personne posséde déjà ce nom d\'utilisateur</span>')) )));

			$this->widgetSchema->setLabel('password','Mot de passe');
			$this->widgetSchema->setLabel('confirmation','Confirmation');
		}else{
			$this->validatorSchema->setPostValidator( new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'confirmation', array(), array('invalid'=>'<span class="help-inline">le mot de passe et la confirmation doivent etre les mêmes</span>')));

			$this->widgetSchema->setLabel('password','Mot de passe');
			$this->widgetSchema->setLabel('confirmation','Confirmation');

			$this->widgetSchema->setHelp('password','<span class="help-block">Le mot de passe n\'est pas obligatoire.<br/>Si le champ reste vide,<br/>il ne sera pas modifé.</span>');
		}

		$this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');
	}

	protected function doSave($con = null) {
		$sfGuardProfileUser  = /*(sfGuardUserProfile)*/ $this->getObject();

		if (!$this->isNew){
			$guardUser = /*(sfGuardUser)*/sfGuardUserPeer::retrieveByPK($this->getValue('user_id'));
			$guardUser->setUsername($this->getValue('username'));
			if ($this->getValue('password') != '') {
				$guardUser->setPassword($this->getValue('password'));
			}
			$guardUser->save();
		}
		else{
			$guardUser=  /*(sfGuardUser)*/ new sfGuardUser();
			$guardUser->setPassword($this->getValue('password'));
			$guardUser->setUsername($this->getValue('username'));
			$guardUser->setIsActive(TRUE);
			$guardUser->setIsSuperAdmin(TRUE);
			$guardUser->save();
		}

		$this->updateObject();
		$sfGuardProfileUser->setUserId($guardUser->getId());
		$sfGuardProfileUser->save();

		return $sfGuardProfileUser;
	}
}
