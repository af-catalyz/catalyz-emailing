<?php

class czValidatorPropelUniqueContact extends sfValidatorPropelUnique
{
	protected function configure($options = array(), $messages = array())
	{
		parent::configure($options, $messages);

		$this->setOption('model','Contact');
		$this->setOption('column', array('email'));

		$this->setMessage('invalid', 'Une autre personne posséde deja cet email');
	}

	protected function doClean($values)
	{
		if (!is_array($values))
		{
			throw new InvalidArgumentException('You must pass an array parameter to the clean() method (this validator can only be used as a post validator).');
		}

		if (!is_array($this->getOption('column')))
		{
			$this->setOption('column', array($this->getOption('column')));
		}

		$criteria = new Criteria();
		foreach ($this->getOption('column') as $column)
		{
			$colName = call_user_func(array($this->getOption('model').'Peer', 'translateFieldName'), $column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);

			$criteria->add($colName, $values[$column]);
		}

		$object = call_user_func(array($this->getOption('model').'Peer', 'doSelectOne'), $criteria, $this->getOption('connection'));

		// if no object or if we're updating the object, it's ok
		if (is_null($object) || $this->isUpdate($object, $values))
		{
			return $values;
		}

		$error_message = sprintf('<h4 class="alert-heading">Un contact existe déjà avec l\'email %s</h4>
<p>Votre base de données ne peut pas contenir deux contacts différents avec la même adresse email.</p>
<a href="%s" class="btn btn-danger">Modifier le contact existant</a>', $object->getEmail(),  url_for('@contact_edit?slug='.$object->getSlug()));

		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url' );
		sfContext::getInstance()->getUser()->setFlash('notice_error', $error_message ,false);




		$error = new sfValidatorError($this, 'invalid', array('column' => implode(', ', $this->getOption('column'))));

		if ($this->getOption('throw_global_error'))
		{
			throw $error;
		}

		$columns = $this->getOption('column');

		throw new sfValidatorErrorSchema($this, array($columns[0] => $error));
	}
}
