<?php
class czValidatorEmailList extends sfValidatorEmail{
	protected function doClean($value){
		$tokens = explode(',', $value);
		foreach($tokens as $key => $token){
			$trimmed=trim($token);
			$clean = parent::doClean($trimmed);
		}

		foreach($tokens as $key => $token){
			$tokens[$key]=trim($token);
		}
		$value = implode(',', $tokens);

	return $value;
	}

	static function getEmails($values){
		$return = explode(',', $values);

		return $return;
	}

}

?>