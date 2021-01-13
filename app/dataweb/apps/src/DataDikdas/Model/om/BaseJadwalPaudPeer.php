<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JadwalPaud;
use DataDikdas\Model\JadwalPaudPeer;
use DataDikdas\Model\map\JadwalPaudTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jadwal_paud' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwalPaudPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jadwal_paud';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JadwalPaud';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JadwalPaudTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the jadwal_id field */
    const JADWAL_ID = 'ref.jadwal_paud.jadwal_id';

    /** the column name for the nama field */
    const NAMA = 'ref.jadwal_paud.nama';

    /** the column name for the kesehatan field */
    const KESEHATAN = 'ref.jadwal_paud.kesehatan';

    /** the column name for the pamts field */
    const PAMTS = 'ref.jadwal_paud.pamts';

    /** the column name for the ddtk field */
    const DDTK = 'ref.jadwal_paud.ddtk';

    /** the column name for the freq_parenting field */
    const FREQ_PARENTING = 'ref.jadwal_paud.freq_parenting';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jadwal_paud.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jadwal_paud.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jadwal_paud.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jadwal_paud.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JadwalPaud objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JadwalPaud[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JadwalPaudPeer::$fieldNames[JadwalPaudPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JadwalId', 'Nama', 'Kesehatan', 'Pamts', 'Ddtk', 'FreqParenting', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jadwalId', 'nama', 'kesehatan', 'pamts', 'ddtk', 'freqParenting', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JadwalPaudPeer::JADWAL_ID, JadwalPaudPeer::NAMA, JadwalPaudPeer::KESEHATAN, JadwalPaudPeer::PAMTS, JadwalPaudPeer::DDTK, JadwalPaudPeer::FREQ_PARENTING, JadwalPaudPeer::CREATE_DATE, JadwalPaudPeer::LAST_UPDATE, JadwalPaudPeer::EXPIRED_DATE, JadwalPaudPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JADWAL_ID', 'NAMA', 'KESEHATAN', 'PAMTS', 'DDTK', 'FREQ_PARENTING', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('jadwal_id', 'nama', 'kesehatan', 'pamts', 'ddtk', 'freq_parenting', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JadwalPaudPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JadwalId' => 0, 'Nama' => 1, 'Kesehatan' => 2, 'Pamts' => 3, 'Ddtk' => 4, 'FreqParenting' => 5, 'CreateDate' => 6, 'LastUpdate' => 7, 'ExpiredDate' => 8, 'LastSync' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jadwalId' => 0, 'nama' => 1, 'kesehatan' => 2, 'pamts' => 3, 'ddtk' => 4, 'freqParenting' => 5, 'createDate' => 6, 'lastUpdate' => 7, 'expiredDate' => 8, 'lastSync' => 9, ),
        BasePeer::TYPE_COLNAME => array (JadwalPaudPeer::JADWAL_ID => 0, JadwalPaudPeer::NAMA => 1, JadwalPaudPeer::KESEHATAN => 2, JadwalPaudPeer::PAMTS => 3, JadwalPaudPeer::DDTK => 4, JadwalPaudPeer::FREQ_PARENTING => 5, JadwalPaudPeer::CREATE_DATE => 6, JadwalPaudPeer::LAST_UPDATE => 7, JadwalPaudPeer::EXPIRED_DATE => 8, JadwalPaudPeer::LAST_SYNC => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JADWAL_ID' => 0, 'NAMA' => 1, 'KESEHATAN' => 2, 'PAMTS' => 3, 'DDTK' => 4, 'FREQ_PARENTING' => 5, 'CREATE_DATE' => 6, 'LAST_UPDATE' => 7, 'EXPIRED_DATE' => 8, 'LAST_SYNC' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('jadwal_id' => 0, 'nama' => 1, 'kesehatan' => 2, 'pamts' => 3, 'ddtk' => 4, 'freq_parenting' => 5, 'create_date' => 6, 'last_update' => 7, 'expired_date' => 8, 'last_sync' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = JadwalPaudPeer::getFieldNames($toType);
        $key = isset(JadwalPaudPeer::$fieldKeys[$fromType][$name]) ? JadwalPaudPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JadwalPaudPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, JadwalPaudPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JadwalPaudPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JadwalPaudPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JadwalPaudPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(JadwalPaudPeer::JADWAL_ID);
            $criteria->addSelectColumn(JadwalPaudPeer::NAMA);
            $criteria->addSelectColumn(JadwalPaudPeer::KESEHATAN);
            $criteria->addSelectColumn(JadwalPaudPeer::PAMTS);
            $criteria->addSelectColumn(JadwalPaudPeer::DDTK);
            $criteria->addSelectColumn(JadwalPaudPeer::FREQ_PARENTING);
            $criteria->addSelectColumn(JadwalPaudPeer::CREATE_DATE);
            $criteria->addSelectColumn(JadwalPaudPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JadwalPaudPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JadwalPaudPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.jadwal_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.kesehatan');
            $criteria->addSelectColumn($alias . '.pamts');
            $criteria->addSelectColumn($alias . '.ddtk');
            $criteria->addSelectColumn($alias . '.freq_parenting');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.expired_date');
            $criteria->addSelectColumn($alias . '.last_sync');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JadwalPaudPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 JadwalPaud
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JadwalPaudPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return JadwalPaudPeer::populateObjects(JadwalPaudPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JadwalPaudPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JadwalPaudPeer::DATABASE_NAME);

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
     * @param      JadwalPaud $obj A JadwalPaud object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJadwalId();
            } // if key === null
            JadwalPaudPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JadwalPaud object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JadwalPaud) {
                $key = (string) $value->getJadwalId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JadwalPaud object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JadwalPaudPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JadwalPaud Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JadwalPaudPeer::$instances[$key])) {
                return JadwalPaudPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (JadwalPaudPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JadwalPaudPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jadwal_paud
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (string) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = JadwalPaudPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JadwalPaudPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JadwalPaudPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (JadwalPaud object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JadwalPaudPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JadwalPaudPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JadwalPaudPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(JadwalPaudPeer::DATABASE_NAME)->getTable(JadwalPaudPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJadwalPaudPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJadwalPaudPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JadwalPaudTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return JadwalPaudPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JadwalPaud or Criteria object.
     *
     * @param      mixed $values Criteria or JadwalPaud object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JadwalPaud object
        }


        // Set the correct dbName
        $criteria->setDbName(JadwalPaudPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a JadwalPaud or Criteria object.
     *
     * @param      mixed $values Criteria or JadwalPaud object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JadwalPaudPeer::JADWAL_ID);
            $value = $criteria->remove(JadwalPaudPeer::JADWAL_ID);
            if ($value) {
                $selectCriteria->add(JadwalPaudPeer::JADWAL_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JadwalPaudPeer::TABLE_NAME);
            }

        } else { // $values is JadwalPaud object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JadwalPaudPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jadwal_paud table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JadwalPaudPeer::TABLE_NAME, $con, JadwalPaudPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JadwalPaudPeer::clearInstancePool();
            JadwalPaudPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JadwalPaud or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JadwalPaud object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JadwalPaudPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JadwalPaud) { // it's a model object
            // invalidate the cache for this single object
            JadwalPaudPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);
            $criteria->add(JadwalPaudPeer::JADWAL_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JadwalPaudPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JadwalPaudPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JadwalPaudPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JadwalPaud object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JadwalPaud $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JadwalPaudPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JadwalPaudPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(JadwalPaudPeer::DATABASE_NAME, JadwalPaudPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JadwalPaud
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JadwalPaudPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);
        $criteria->add(JadwalPaudPeer::JADWAL_ID, $pk);

        $v = JadwalPaudPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JadwalPaud[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);
            $criteria->add(JadwalPaudPeer::JADWAL_ID, $pks, Criteria::IN);
            $objs = JadwalPaudPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJadwalPaudPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJadwalPaudPeer::buildTableMap();

