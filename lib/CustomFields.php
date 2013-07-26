<?php

class CustomFields{

	function getCustomFieldsWidget($key, $type, $options = array(), $attributes = array()){
		switch($type){
			case 'free':
			case 'monaie':

				if (!empty($attributes['class'])) {
					$classes = explode(' ', $attributes['class']);
					if (!in_array('input-xlarge', $classes)) {
						$classes[]= 'input-xlarge';
					}
					$attributes['class'] = implode(' ', $classes);
				}else{
					$attributes['class'] = 'input-xlarge';
				}

				return new sfWidgetFormInput($options,$attributes);
				break;
			case 'date':
				return new czWidgetFormDate($options,$attributes);
				break;
			case 'list':
				if (!empty($attributes['class'])) {
					$classes = explode(' ', $attributes['class']);
					if (!in_array('input-xlarge', $classes)) {
						$classes[]= 'input-xlarge';
					}
					$attributes['class'] = implode(' ', $classes);
				}else{
					$attributes['class'] = 'input-xlarge';
				}

				$options['choices'] = $this->getCustomFieldsListValuesFromDb($key);

				return new czWidgetFormInputBootstrapAutocomplete($options,$attributes);
				break;
			default:
				throw new Exception('Unkown custom filed type: ' . $type);
		} // switch
	}

	function getCustomFieldsValidator($key, $type, $options = array(), $attributes = array()){
		switch($type){
			case 'free':
			case 'monaie':

				if (!empty($attributes['class'])) {
					$classes = explode(' ', $attributes['class']);
					if (!in_array('input-xlarge', $classes)) {
						$classes[]= 'input-xlarge';
						$attributes['class'] = implode(' ', $classes);
					}
				}else{
					$attributes['class'] = 'input-xlarge';
				}

				return new sfWidgetFormInput($options,$attributes);
				break;
			case 'date':
				return new czWidgetFormDate($options,$attributes);
				break;
			case 'list':
				$options['choices'] = $this->getCustomFieldsListValuesFromDb($key);

				return new czWidgetFormInputBootstrapAutocomplete($options,$attributes);
				break;
			default:
				throw new Exception('Unkown custom filed type: ' . $type);
		} // switch
	}

	function set($name, $value){
		if($value != $this->settings[$name]){
			$this->settings[$name] = $value;
			$this->save();
		}
	}

	static public function instance(){
		static $instance = null;
		if(null === $instance){
			$instance= new CustomFields();
		}
		return $instance;
	}

	function getCustomFieldsType(){
		$return = array();
		$return['free']= 'Format libre';
		$return['date']= 'Date';
		$return['list']= 'Enumération';
		$return['monaie']= 'Valeur monétaire';
		return $return;
	}

	function getCustomFieldsListValuesFromDb($fieldId){
			$result = array();
			$sql = 'SELECT ' . sprintf('contact.%s', $fieldId).'
			FROM ' . ContactPeer::TABLE_NAME.'
			WHERE ' . sprintf('contact.%s', $fieldId).' IS NOT NULL AND ' . sprintf('contact.%s', $fieldId).' != ""';

			$connection = Propel::getConnection();
			$statement = $connection->prepare($sql);
			$statement->execute();

			while($rs = $statement->fetch(PDO::FETCH_ASSOC)){
				if (count($rs) > 0) {
					$value = array_shift($rs);
					if ($value != '') {
						$result[(string) $value] = $value;
					}
				}
			}

			ksort($result);
			return $result;

	}
}

?>