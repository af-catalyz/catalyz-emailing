<?php


/**
 * Skeleton subclass for representing a row from the 'contact_group' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:43 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ContactGroup extends BaseContactGroup {

	/**
	 * Initializes internal state of ContactGroup object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

	public function __toString(){
		return $this->name;
	}

	public function getCommentPopup(){
		if (trim($this->getLegend()) != '') {
			return sprintf('<a rel="tooltip-campaign-comment" href="#" data-original-title="%s"><i class="icon-question-sign"></i></a>', nl2br($this->getLegend()));
		}

		return FALSE;
	}

	public function getColoredName($floating = false){
		$style = '';
		if ($this->getColor()) {
			$style = $this->getColor();
		}

		return sprintf('<span%s class="label %s">%s</span>',$floating?' style="float: left; margin: 0 2px 2px 2px;"':'',$style, $this->getName());
	}

} // ContactGroup


$columns_map = array('from'   => ContactGroupPeer::NAME,'to'     => ContactGroupPeer::SLUG);
sfPropelBehavior::add('ContactGroup', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map)));