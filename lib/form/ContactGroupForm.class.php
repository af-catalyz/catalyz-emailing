<?php

/**
 * ContactGroup form.
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
class ContactGroupForm extends BaseContactGroupForm
{
  public function configure()
  {
  	unset(
  		$this['created_at'],
  		$this['updated_at'],
  		$this['campaign_contact_group_list'],
  		$this['contact_contact_group_list']
  	);

  	$choices = array();
  	$choices['']= 'Gris';
  	$choices['label-success']= 'Vert';
  	$choices['label-warning']= 'Orange';
  	$choices['label-important']= 'Rouge';
  	$choices['label-info']= 'Bleu';
  	$choices['label-inverse']= 'Noir';

  	$this->widgetSchema['slug'] =  new sfWidgetFormInputHidden();
  	$this->widgetSchema['name'] =  new sfWidgetFormInput(array(),array('class'=> 'input-xlarge'));
  	$this->widgetSchema['legend'] = new sfWidgetFormTextarea(array(),array('class'=> 'input-xlarge no_resize'));
  	$this->widgetSchema['color'] =  new sfWidgetFormChoice(array('choices' => $choices),array('class'=> 'input-xlarge'));

  	$this->getWidgetSchema()->setLabels(array(
  		'name' => 'Nom',
  		'legend' => 'Légende',
  		'color' => 'Couleur',
  		'is_test_group' => 'Groupe de test',
  		'is_archived' => 'Archivé'
		));

  }
}
