<?php


/**
 * This class defines the structure of the 'campaign_link' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Jul  4 22:07:56 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampaignLinkTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampaignLinkTableMap';

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
		$this->setName('campaign_link');
		$this->setPhpName('CampaignLink');
		$this->setClassname('CampaignLink');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CAMPAIGN_ID', 'CampaignId', 'INTEGER', 'campaign', 'ID', false, null, null);
		$this->addColumn('URL', 'Url', 'LONGVARCHAR', false, null, null);
		$this->addColumn('GOOGLE_ANALYTICS_TERM', 'GoogleAnalyticsTerm', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Campaign', 'Campaign', RelationMap::MANY_TO_ONE, array('campaign_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('CampaignClick', 'CampaignClick', RelationMap::ONE_TO_MANY, array('id' => 'campaign_link_id', ), 'CASCADE', null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // CampaignLinkTableMap
