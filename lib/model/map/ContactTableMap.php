<?php


/**
 * This class defines the structure of the 'contact' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 12:14:00 CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ContactTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ContactTableMap';

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
		$this->setName('contact');
		$this->setPhpName('Contact');
		$this->setClassname('Contact');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 255, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 255, null);
		$this->addColumn('COMPANY', 'Company', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('EXTERNAL_REFERENCE', 'ExternalReference', 'INTEGER', false, null, null);
		$this->addColumn('CUSTOM1', 'Custom1', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM2', 'Custom2', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM3', 'Custom3', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM4', 'Custom4', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM5', 'Custom5', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM6', 'Custom6', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM7', 'Custom7', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM8', 'Custom8', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM9', 'Custom9', 'VARCHAR', false, 255, null);
		$this->addColumn('CUSTOM10', 'Custom10', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContactContactGroup', 'ContactContactGroup', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null);
    $this->addRelation('CampaignContact', 'CampaignContact', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null);
    $this->addRelation('CampaignContactElement', 'CampaignContactElement', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // ContactTableMap
