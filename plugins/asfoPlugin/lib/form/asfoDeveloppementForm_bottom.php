<?php
class asfoDeveloppementForm_bottom extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'content' => new czWidgetFormTextareaTinyMCE()
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'content' => 'Contenu'
		        ));
	}
}

?>