<?php

require_once( sfConfig::get('sf_plugins_dir').'/sfGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeSignin($request)
	{
		$this->setLayout('layoutAnonymous');

		$user = $this->getUser();
		if ($user->isAuthenticated())
		{
			return $this->redirect('@homepage');
		}

		if ($request->isXmlHttpRequest())
		{
			$this->getResponse()->setHeaderOnly(true);
			$this->getResponse()->setStatusCode(401);

			return sfView::NONE;
		}

		$class = /*(sfGuardFormSignin)*/sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');

		$this->form = new $class();

		if ($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter('signin'));
			if ($this->form->isValid())
			{
				$values = $this->form->getValues();
				$this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

				// always redirect to a URL set in app.yml
				// or to the referer
				// or to the homepage
				$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer('@homepage'));

				return $this->redirect($signinUrl);
			}
		}
		else
		{
			// if we have been forwarded, then the referer is the current URL
			// if not, this is the referer of the current request
			$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

			$module = sfConfig::get('sf_login_module');
			if ($this->getModuleName() != $module)
			{
				return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
			}
		}
	}
}
