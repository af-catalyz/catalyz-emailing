<?php


/**
 * This class defines the structure of the 'campaign' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * sam. 16 févr. 2013 21:54:58 CET
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampaignTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampaignTableMap';

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
		$this->setName('campaign');
		$this->setPhpName('Campaign');
		$this->setClassname('Campaign');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('COMMENTAIRE', 'Commentaire', 'CLOB', false, null, null);
		$this->addColumn('SUBJECT', 'Subject', 'VARCHAR', false, 255, null);
		$this->addForeignKey('TEMPLATE_ID', 'TemplateId', 'INTEGER', 'campaign_template', 'ID', false, null, null);
		$this->addColumn('CONTENT', 'Content', 'CLOB', false, null, null);
		$this->addColumn('PREPARED_CONTENT', 'PreparedContent', 'CLOB', false, null, null);
		$this->addColumn('TEXT_CONTENT', 'TextContent', 'CLOB', false, null, null);
		$this->addColumn('PREPARED_TEXT_CONTENT', 'PreparedTextContent', 'CLOB', false, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('FROM_NAME', 'FromName', 'VARCHAR', false, 255, null);
		$this->addColumn('FROM_EMAIL', 'FromEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('SCHEDULED_AT', 'ScheduledAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('SCHEDULE_TYPE', 'ScheduleType', 'INTEGER', false, null, null);
		$this->addColumn('TEST_TYPE', 'TestType', 'INTEGER', false, null, null);
		$this->addColumn('TEST_USER_LIST', 'TestUserList', 'LONGVARCHAR', false, null, null);
		$this->addColumn('TARGET', 'Target', 'CLOB', false, null, null);
		$this->addColumn('REPLY_TO_EMAIL', 'ReplyToEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('RETURN_PATH_EMAIL', 'ReturnPathEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('RETURN_PATH_SERVER', 'ReturnPathServer', 'VARCHAR', false, 255, null);
		$this->addColumn('RETURN_PATH_LOGIN', 'ReturnPathLogin', 'VARCHAR', false, 255, null);
		$this->addColumn('RETURN_PATH_PASSWORD', 'ReturnPathPassword', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_ARCHIVED', 'IsArchived', 'INTEGER', false, null, 0);
		$this->addColumn('GOOGLE_ANALYTICS_ENABLED', 'GoogleAnalyticsEnabled', 'BOOLEAN', false, null, false);
		$this->addColumn('GOOGLE_ANALYTICS_SOURCE', 'GoogleAnalyticsSource', 'VARCHAR', false, 255, null);
		$this->addColumn('GOOGLE_ANALYTICS_MEDIUM', 'GoogleAnalyticsMedium', 'VARCHAR', false, 255, null);
		$this->addColumn('GOOGLE_ANALYTICS_CAMPAIGN_TYPE', 'GoogleAnalyticsCampaignType', 'INTEGER', false, null, null);
		$this->addColumn('GOOGLE_ANALYTICS_CAMPAIGN_CONTENT', 'GoogleAnalyticsCampaignContent', 'VARCHAR', false, 255, null);
		$this->addColumn('GOOGLE_ANALYTICS_CONTENT', 'GoogleAnalyticsContent', 'VARCHAR', false, 255, null);
		$this->addColumn('LITMUS_TEST_ID', 'LitmusTestId', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user_profile', 'ID', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CampaignTemplate', 'CampaignTemplate', RelationMap::MANY_TO_ONE, array('template_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'CASCADE', null);
    $this->addRelation('CampaignContactGroup', 'CampaignContactGroup', RelationMap::ONE_TO_MANY, array('id' => 'campaign_id', ), 'CASCADE', null);
    $this->addRelation('CampaignContact', 'CampaignContact', RelationMap::ONE_TO_MANY, array('id' => 'campaign_id', ), 'CASCADE', null);
    $this->addRelation('CampaignContactElement', 'CampaignContactElement', RelationMap::ONE_TO_MANY, array('id' => 'campaign_id', ), 'CASCADE', null);
    $this->addRelation('CampaignLink', 'CampaignLink', RelationMap::ONE_TO_MANY, array('id' => 'campaign_id', ), 'CASCADE', null);
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

} // CampaignTableMap
