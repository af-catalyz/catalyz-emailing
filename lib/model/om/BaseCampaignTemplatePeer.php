<?php

/**
 * Base static class for performing query and update operations on the 'campaign_template' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * lun. 17 juin 2013 15:07:30 CEST
 *
 * @package    lib.model.om
 */
abstract class BaseCampaignTemplatePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'campaign_template';

	/** the related Propel class for this table */
	const OM_CLASS = 'CampaignTemplate';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.CampaignTemplate';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CampaignTemplateTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 11;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'campaign_template.ID';

	/** the column name for the SLUG field */
	const SLUG = 'campaign_template.SLUG';

	/** the column name for the NAME field */
	const NAME = 'campaign_template.NAME';

	/** the column name for the PREVIEW_FILENAME field */
	const PREVIEW_FILENAME = 'campaign_template.PREVIEW_FILENAME';

	/** the column name for the CLASS_NAME field */
	const CLASS_NAME = 'campaign_template.CLASS_NAME';

	/** the column name for the TEMPLATE field */
	const TEMPLATE = 'campaign_template.TEMPLATE';

	/** the column name for the EXTERNAL_ID field */
	const EXTERNAL_ID = 'campaign_template.EXTERNAL_ID';

	/** the column name for the INITIALIZER field */
	const INITIALIZER = 'campaign_template.INITIALIZER';

	/** the column name for the IS_ARCHIVED field */
	const IS_ARCHIVED = 'campaign_template.IS_ARCHIVED';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'campaign_template.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'campaign_template.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of CampaignTemplate objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array CampaignTemplate[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Slug', 'Name', 'PreviewFilename', 'ClassName', 'Template', 'ExternalId', 'Initializer', 'IsArchived', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'slug', 'name', 'previewFilename', 'className', 'template', 'externalId', 'initializer', 'isArchived', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SLUG, self::NAME, self::PREVIEW_FILENAME, self::CLASS_NAME, self::TEMPLATE, self::EXTERNAL_ID, self::INITIALIZER, self::IS_ARCHIVED, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'slug', 'name', 'preview_filename', 'class_name', 'template', 'external_id', 'initializer', 'is_archived', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Slug' => 1, 'Name' => 2, 'PreviewFilename' => 3, 'ClassName' => 4, 'Template' => 5, 'ExternalId' => 6, 'Initializer' => 7, 'IsArchived' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'slug' => 1, 'name' => 2, 'previewFilename' => 3, 'className' => 4, 'template' => 5, 'externalId' => 6, 'initializer' => 7, 'isArchived' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SLUG => 1, self::NAME => 2, self::PREVIEW_FILENAME => 3, self::CLASS_NAME => 4, self::TEMPLATE => 5, self::EXTERNAL_ID => 6, self::INITIALIZER => 7, self::IS_ARCHIVED => 8, self::CREATED_AT => 9, self::UPDATED_AT => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'slug' => 1, 'name' => 2, 'preview_filename' => 3, 'class_name' => 4, 'template' => 5, 'external_id' => 6, 'initializer' => 7, 'is_archived' => 8, 'created_at' => 9, 'updated_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. CampaignTemplatePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CampaignTemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{
		$criteria->addSelectColumn(CampaignTemplatePeer::ID);
		$criteria->addSelectColumn(CampaignTemplatePeer::SLUG);
		$criteria->addSelectColumn(CampaignTemplatePeer::NAME);
		$criteria->addSelectColumn(CampaignTemplatePeer::PREVIEW_FILENAME);
		$criteria->addSelectColumn(CampaignTemplatePeer::CLASS_NAME);
		$criteria->addSelectColumn(CampaignTemplatePeer::TEMPLATE);
		$criteria->addSelectColumn(CampaignTemplatePeer::EXTERNAL_ID);
		$criteria->addSelectColumn(CampaignTemplatePeer::INITIALIZER);
		$criteria->addSelectColumn(CampaignTemplatePeer::IS_ARCHIVED);
		$criteria->addSelectColumn(CampaignTemplatePeer::CREATED_AT);
		$criteria->addSelectColumn(CampaignTemplatePeer::UPDATED_AT);
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CampaignTemplatePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CampaignTemplatePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     CampaignTemplate
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CampaignTemplatePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return CampaignTemplatePeer::populateObjects(CampaignTemplatePeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CampaignTemplatePeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      CampaignTemplate $value A CampaignTemplate object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(CampaignTemplate $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A CampaignTemplate object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof CampaignTemplate) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or CampaignTemplate object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     CampaignTemplate Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to campaign_template
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// invalidate objects in CampaignPeer instance pool, since one or more of them may be deleted by ON DELETE CASCADE rule.
		CampaignPeer::clearInstancePool();

	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = CampaignTemplatePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CampaignTemplatePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CampaignTemplatePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CampaignTemplatePeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseCampaignTemplatePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCampaignTemplatePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CampaignTemplateTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean  Whether or not to return the path wit hthe class name 
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? CampaignTemplatePeer::CLASS_DEFAULT : CampaignTemplatePeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a CampaignTemplate or Criteria object.
	 *
	 * @param      mixed $values Criteria or CampaignTemplate object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseCampaignTemplatePeer:doInsert:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from CampaignTemplate object
		}

		if ($criteria->containsKey(CampaignTemplatePeer::ID) && $criteria->keyContainsValue(CampaignTemplatePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CampaignTemplatePeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseCampaignTemplatePeer:doInsert:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $values, $con, $pk);
    }

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a CampaignTemplate or Criteria object.
	 *
	 * @param      mixed $values Criteria or CampaignTemplate object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseCampaignTemplatePeer:doUpdate:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CampaignTemplatePeer::ID);
			$selectCriteria->add(CampaignTemplatePeer::ID, $criteria->remove(CampaignTemplatePeer::ID), $comparison);

		} else { // $values is CampaignTemplate object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseCampaignTemplatePeer:doUpdate:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BaseCampaignTemplatePeer', $values, $con, $ret);
    }

    return $ret;
	}

	/**
	 * Method to DELETE all rows from the campaign_template table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += CampaignTemplatePeer::doOnDeleteCascade(new Criteria(CampaignTemplatePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(CampaignTemplatePeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CampaignTemplatePeer::clearInstancePool();
			CampaignTemplatePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a CampaignTemplate or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or CampaignTemplate object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof CampaignTemplate) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CampaignTemplatePeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += CampaignTemplatePeer::doOnDeleteCascade($criteria, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				CampaignTemplatePeer::clearInstancePool();
			} elseif ($values instanceof CampaignTemplate) { // it's a model object
				CampaignTemplatePeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					CampaignTemplatePeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			CampaignTemplatePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
		// initialize var to track total num of affected rows
		$affectedRows = 0;

		// first find the objects that are implicated by the $criteria
		$objects = CampaignTemplatePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related Campaign objects
			$criteria = new Criteria(CampaignPeer::DATABASE_NAME);
			
			$criteria->add(CampaignPeer::TEMPLATE_ID, $obj->getId());
			$affectedRows += CampaignPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given CampaignTemplate object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      CampaignTemplate $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(CampaignTemplate $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CampaignTemplatePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CampaignTemplatePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(CampaignTemplatePeer::DATABASE_NAME, CampaignTemplatePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     CampaignTemplate
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CampaignTemplatePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CampaignTemplatePeer::DATABASE_NAME);
		$criteria->add(CampaignTemplatePeer::ID, $pk);

		$v = CampaignTemplatePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CampaignTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CampaignTemplatePeer::DATABASE_NAME);
			$criteria->add(CampaignTemplatePeer::ID, $pks, Criteria::IN);
			$objs = CampaignTemplatePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array();
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BaseCampaignTemplatePeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseCampaignTemplatePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCampaignTemplatePeer::buildTableMap();

