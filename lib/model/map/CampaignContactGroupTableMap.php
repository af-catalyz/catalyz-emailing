<?php


/**
 * This class defines the structure of the 'campaign_contact_group' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * sam. 16 févr. 2013 15:38:21 CET
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampaignContactGroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampaignContactGroupTableMap';

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
		$this->setName('campaign_contact_group');
		$this->setPhpName('CampaignContactGroup');
		$this->setClassname('CampaignContactGroup');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('CAMPAIGN_ID', 'CampaignId', 'INTEGER' , 'campaign', 'ID', true, null, null);
		$this->addForeignPrimaryKey('CONTACT_GROUP_ID', 'ContactGroupId', 'INTEGER' , 'contact_group', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Campaign', 'Campaign', RelationMap::MANY_TO_ONE, array('campaign_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('ContactGroup', 'ContactGroup', RelationMap::MANY_TO_ONE, array('contact_group_id' => 'id', ), 'CASCADE', null);
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

} // CampaignContactGroupTableMap
