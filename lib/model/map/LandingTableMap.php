<?php


/**
 * This class defines the structure of the 'landing' table.
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
class LandingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LandingTableMap';

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
		$this->setName('landing');
		$this->setPhpName('Landing');
		$this->setClassname('Landing');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 255, null);
		$this->addColumn('TEMPLATE_CLASS', 'TemplateClass', 'VARCHAR', false, 255, null);
		$this->addColumn('CONTENT', 'Content', 'CLOB', false, null, null);
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
    $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'CASCADE', null);
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

} // LandingTableMap
