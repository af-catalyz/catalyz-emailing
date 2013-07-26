<?php
class czValidatorEmail extends sfValidatorEmail{
	protected function doClean($value)
	{
		$clean = parent::doClean($value);

		$pattern = $this->getPattern();

		if (
			($this->getOption('must_match') && !preg_match($pattern, $clean))
			||
			(!$this->getOption('must_match') && preg_match($pattern, $clean))
			)
		{
			throw new sfValidatorError($this, 'invalid', array('value' => $value));
		}

		if (! self::ValidateEmail($value) ) {
			throw new sfValidatorError($this, 'invalid', array('value' => $value));
		}

		return $clean;
	}

	public static function ValidateEmail($email, $checkdnsrr = true)
	{
		$atom = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]'; // caractères autorisés avant l'arobase
		$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)

		$regex = '/^' . $atom . '+' . // Une ou plusieurs fois les caractères autorisés avant l'arobase
		'(\.' . $atom . '+)*' . // Suivis par zéro point ou plus
		// séparés par des caractères autorisés avant l'arobase
		'@' . // Suivis d'un arobase
		'(' . $domain . '{1,63}\.)+' . // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
		// séparés par des points
		$domain . '{2,63}$/i'; // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
		if (!preg_match($regex, $email)) {
			return false;
		}

		if ($checkdnsrr && function_exists('checkdnsrr')) {
			$tokens = explode('@', $email);
			if (!checkdnsrr($tokens[1], 'MX') && !checkdnsrr($tokens[1], 'A')) {
				return false;
			}
		}

		return true;
	}

	public static function obfuscate($email){
		$link = '';
		foreach(str_split($email) as $letter)
			$link .= '&#'.ord($letter).';';
		return $link;
	}
}

?>