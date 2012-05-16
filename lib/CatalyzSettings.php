<?php

class CatalyzSettings{

	const CUSTOM_UNSUBSCRIBED_CONFIGURATION = 'contact.unsubscribedConfiguration';
	const CUSTOM_FIELDS = 'contact.customsField';
	const COLUMN_CONFIGURATION_KEY = 'contact.list.columns';
	const CUSTOM_LIMIT = 'contact.list.limit';
	const CUSTOM_LIST_FIELDS = 'contact.list.customsField';

	protected $settings = array();

	protected function getFilename(){
		return sfConfig::get('sf_data_dir').'/CatalyzSettings.conf';
	}

	protected function __construct(){
		$filename = $this->getFilename();
		if(file_exists($filename)){
			$this->settings = unserialize(file_get_contents($filename));
		}
	}

	static public function instance(){
		static $instance = null;
		if(null === $instance){
			$instance= new CatalyzSettings();
		}
		return $instance;
	}

	public function __destruct(){
		file_put_contents($this->getFilename(), serialize($this->settings));
	}

	function get($name, $default = null){
		if(isset($this->settings[$name])){
			return $this->settings[$name];
		}
		return $default;
	}

	function set($name, $value){
		$this->settings[$name] = $value;
	}
}

?>