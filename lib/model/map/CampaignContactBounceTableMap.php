<?php


/**
 * This class defines the structure of the 'campaign_contact_bounce' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * ven. 28 juin 2013 16:29:57 CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampaignContactBounceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampaignContactBounceTableMap';

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
		$this->setName('campaign_contact_bounce');
		$this->setPhpName('CampaignContactBounce');
		$this->setClassname('CampaignContactBounce');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CAMPAIGN_CONTACT_ID', 'CampaignContactId', 'INTEGER', 'campaign_contact', 'ID', false, null, null);
		$this->addColumn('ERROR_CODE', 'ErrorCode', 'VARCHAR', false, 5, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('BOUNCE_TYPE', 'BounceType', 'INTEGER', false, null, null);
		$this->addColumn('ARRIVED_AT', 'ArrivedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('MESSAGE', 'Message', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CampaignContact', 'CampaignContact', RelationMap::MANY_TO_ONE, array('campaign_contact_id' => 'id', ), 'CASCADE', null);
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

} // CampaignContactBounceTableMap
