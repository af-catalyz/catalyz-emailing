<?php


/**
 * This class defines the structure of the 'campaign_contact' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * lun. 01 juil. 2013 14:44:21 CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampaignContactTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampaignContactTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('campaign_contact');
		$this->setPhpName('CampaignContact');
		$this->setClassname('CampaignContact');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignPrimaryKey('CAMPAIGN_ID', 'CampaignId', 'INTEGER' , 'campaign', 'ID', true, null, null);
		$this->addForeignPrimaryKey('CONTACT_ID', 'ContactId', 'INTEGER' , 'contact', 'ID', true, null, null);
		$this->addColumn('SENT_AT', 'SentAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('FAILED_SENT_AT', 'FailedSentAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('VIEW_AT', 'ViewAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('VIEW_USER_AGENT', 'ViewUserAgent', 'VARCHAR', false, 255, null);
		$this->addColumn('CLICKED_AT', 'ClickedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UNSUBSCRIBED_AT', 'UnsubscribedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('RAISON', 'Raison', 'CLOB', false, null, null);
		$this->addColumn('UNSUBSCRIBED_LISTS', 'UnsubscribedLists', 'CLOB', false, null, null);
		$this->addColumn('LANDING_ACTIONS', 'LandingActions', 'CLOB', false, null, null);
		$this->addColumn('BOUNCE_TYPE', 'BounceType', 'INTEGER', false, null, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Campaign', 'Campaign', RelationMap::MANY_TO_ONE, array('campaign_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Contact', 'Contact', RelationMap::MANY_TO_ONE, array('contact_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('CampaignContactBounce', 'CampaignContactBounce', RelationMap::ONE_TO_MANY, array('id' => 'campaign_contact_id', ), 'CASCADE', null);
    $this->addRelation('CampaignClick', 'CampaignClick', RelationMap::ONE_TO_MANY, array('id' => 'campaign_contact_id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CampaignContactTableMap
