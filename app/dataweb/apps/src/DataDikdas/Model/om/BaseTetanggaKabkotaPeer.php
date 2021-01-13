<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\TetanggaKabkota;
use DataDikdas\Model\TetanggaKabkotaPeer;
use DataDikdas\Model\map\TetanggaKabkotaTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.tetangga_kabkota' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTetanggaKabkotaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.tetangga_kabkota';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TetanggaKabkota';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TetanggaKabkotaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 6;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 6;

    /** the column name for the kode_wilayah1 field */
    const KODE_WILAYAH1 = 'ref.tetangga_kabkota.kode_wilayah1';

    /** the column name for the kode_wilayah2 field */
    const KODE_WILAYAH2 = 'ref.tetangga_kabkota.kode_wilayah2';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.tetangga_kabkota.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.tetangga_kabkota.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.tetangga_kabkota.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.tetangga_kabkota.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TetanggaKabkota objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TetanggaKabkota[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TetanggaKabkotaPeer::$fieldNames[TetanggaKabkotaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('KodeWilayah1', 'KodeWilayah2', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeWilayah1', 'kodeWilayah2', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (TetanggaKabkotaPeer::KODE_WILAYAH1, TetanggaKabkotaPeer::KODE_WILAYAH2, TetanggaKabkotaPeer::CREATE_DATE, TetanggaKabkotaPeer::LAST_UPDATE, TetanggaKabkotaPeer::EXPIRED_DATE, TetanggaKabkotaPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_WILAYAH1', 'KODE_WILAYAH2', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('kode_wilayah1', 'kode_wilayah2', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TetanggaKabkotaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('KodeWilayah1' => 0, 'KodeWilayah2' => 1, 'CreateDate' => 2, 'LastUpdate' => 3, 'ExpiredDate' => 4, 'LastSync' => 5, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeWilayah1' => 0, 'kodeWilayah2' => 1, 'createDate' => 2, 'lastUpdate' => 3, 'expiredDate' => 4, 'lastSync' => 5, ),
        BasePeer::TYPE_COLNAME => array (TetanggaKabkotaPeer::KODE_WILAYAH1 => 0, TetanggaKabkotaPeer::KODE_WILAYAH2 => 1, TetanggaKabkotaPeer::CREATE_DATE => 2, TetanggaKabkotaPeer::LAST_UPDATE => 3, TetanggaKabkotaPeer::EXPIRED_DATE => 4, TetanggaKabkotaPeer::LAST_SYNC => 5, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_WILAYAH1' => 0, 'KODE_WILAYAH2' => 1, 'CREATE_DATE' => 2, 'LAST_UPDATE' => 3, 'EXPIRED_DATE' => 4, 'LAST_SYNC' => 5, ),
        BasePeer::TYPE_FIELDNAME => array ('kode_wilayah1' => 0, 'kode_wilayah2' => 1, 'create_date' => 2, 'last_update' => 3, 'expired_date' => 4, 'last_sync' => 5, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
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
        $toNames = TetanggaKabkotaPeer::getFieldNames($toType);
        $key = isset(TetanggaKabkotaPeer::$fieldKeys[$fromType][$name]) ? TetanggaKabkotaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TetanggaKabkotaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TetanggaKabkotaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TetanggaKabkotaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TetanggaKabkotaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TetanggaKabkotaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TetanggaKabkotaPeer::KODE_WILAYAH1);
            $criteria->addSelectColumn(TetanggaKabkotaPeer::KODE_WILAYAH2);
            $criteria->addSelectColumn(TetanggaKabkotaPeer::CREATE_DATE);
            $criteria->addSelectColumn(TetanggaKabkotaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TetanggaKabkotaPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(TetanggaKabkotaPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.kode_wilayah1');
            $criteria->addSelectColumn($alias . '.kode_wilayah2');
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
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TetanggaKabkota
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TetanggaKabkotaPeer::doSelect($critcopy, $con);
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
        return TetanggaKabkotaPeer::populateObjects(TetanggaKabkotaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

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
     * @param      TetanggaKabkota $obj A TetanggaKabkota object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getKodeWilayah1(), (string) $obj->getKodeWilayah2()));
            } // if key === null
            TetanggaKabkotaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TetanggaKabkota object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TetanggaKabkota) {
                $key = serialize(array((string) $value->getKodeWilayah1(), (string) $value->getKodeWilayah2()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TetanggaKabkota object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TetanggaKabkotaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TetanggaKabkota Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TetanggaKabkotaPeer::$instances[$key])) {
                return TetanggaKabkotaPeer::$instances[$key];
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
        foreach (TetanggaKabkotaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TetanggaKabkotaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.tetangga_kabkota
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
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
        $cls = TetanggaKabkotaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TetanggaKabkotaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TetanggaKabkotaPeer::addInstanceToPool($obj, $key);
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
     * @return array (TetanggaKabkota object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TetanggaKabkotaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TetanggaKabkotaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TetanggaKabkotaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayahRelatedByKodeWilayah1 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayahRelatedByKodeWilayah1(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH1, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MstWilayahRelatedByKodeWilayah2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayahRelatedByKodeWilayah2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH2, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of TetanggaKabkota objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TetanggaKabkota objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayahRelatedByKodeWilayah1(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);
        }

        TetanggaKabkotaPeer::addSelectColumns($criteria);
        $startcol = TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH1, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TetanggaKabkotaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TetanggaKabkotaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TetanggaKabkotaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TetanggaKabkota) to $obj2 (MstWilayah)
                $obj2->addTetanggaKabkotaRelatedByKodeWilayah1($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TetanggaKabkota objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TetanggaKabkota objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayahRelatedByKodeWilayah2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);
        }

        TetanggaKabkotaPeer::addSelectColumns($criteria);
        $startcol = TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH2, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TetanggaKabkotaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TetanggaKabkotaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TetanggaKabkotaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TetanggaKabkota) to $obj2 (MstWilayah)
                $obj2->addTetanggaKabkotaRelatedByKodeWilayah2($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH1, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH2, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of TetanggaKabkota objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TetanggaKabkota objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);
        }

        TetanggaKabkotaPeer::addSelectColumns($criteria);
        $startcol2 = TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH1, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(TetanggaKabkotaPeer::KODE_WILAYAH2, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TetanggaKabkotaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TetanggaKabkotaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TetanggaKabkotaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MstWilayah rows

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (TetanggaKabkota) to the collection in $obj2 (MstWilayah)
                $obj2->addTetanggaKabkotaRelatedByKodeWilayah1($obj1);
            } // if joined row not null

            // Add objects for joined MstWilayah rows

            $key3 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = MstWilayahPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MstWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (TetanggaKabkota) to the collection in $obj3 (MstWilayah)
                $obj3->addTetanggaKabkotaRelatedByKodeWilayah2($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayahRelatedByKodeWilayah1 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayahRelatedByKodeWilayah1(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
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
     * Returns the number of rows matching criteria, joining the related MstWilayahRelatedByKodeWilayah2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayahRelatedByKodeWilayah2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TetanggaKabkotaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
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
     * Selects a collection of TetanggaKabkota objects pre-filled with all related objects except MstWilayahRelatedByKodeWilayah1.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TetanggaKabkota objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayahRelatedByKodeWilayah1(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);
        }

        TetanggaKabkotaPeer::addSelectColumns($criteria);
        $startcol2 = TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TetanggaKabkotaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TetanggaKabkotaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TetanggaKabkotaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TetanggaKabkota objects pre-filled with all related objects except MstWilayahRelatedByKodeWilayah2.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TetanggaKabkota objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayahRelatedByKodeWilayah2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);
        }

        TetanggaKabkotaPeer::addSelectColumns($criteria);
        $startcol2 = TetanggaKabkotaPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TetanggaKabkotaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TetanggaKabkotaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TetanggaKabkotaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TetanggaKabkotaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        return Propel::getDatabaseMap(TetanggaKabkotaPeer::DATABASE_NAME)->getTable(TetanggaKabkotaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTetanggaKabkotaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTetanggaKabkotaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TetanggaKabkotaTableMap());
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
        return TetanggaKabkotaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TetanggaKabkota or Criteria object.
     *
     * @param      mixed $values Criteria or TetanggaKabkota object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TetanggaKabkota object
        }


        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TetanggaKabkota or Criteria object.
     *
     * @param      mixed $values Criteria or TetanggaKabkota object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TetanggaKabkotaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TetanggaKabkotaPeer::KODE_WILAYAH1);
            $value = $criteria->remove(TetanggaKabkotaPeer::KODE_WILAYAH1);
            if ($value) {
                $selectCriteria->add(TetanggaKabkotaPeer::KODE_WILAYAH1, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(TetanggaKabkotaPeer::KODE_WILAYAH2);
            $value = $criteria->remove(TetanggaKabkotaPeer::KODE_WILAYAH2);
            if ($value) {
                $selectCriteria->add(TetanggaKabkotaPeer::KODE_WILAYAH2, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TetanggaKabkotaPeer::TABLE_NAME);
            }

        } else { // $values is TetanggaKabkota object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.tetangga_kabkota table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TetanggaKabkotaPeer::TABLE_NAME, $con, TetanggaKabkotaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TetanggaKabkotaPeer::clearInstancePool();
            TetanggaKabkotaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TetanggaKabkota or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TetanggaKabkota object or primary key or array of primary keys
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
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TetanggaKabkotaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TetanggaKabkota) { // it's a model object
            // invalidate the cache for this single object
            TetanggaKabkotaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TetanggaKabkotaPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(TetanggaKabkotaPeer::KODE_WILAYAH1, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(TetanggaKabkotaPeer::KODE_WILAYAH2, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                TetanggaKabkotaPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TetanggaKabkotaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TetanggaKabkotaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TetanggaKabkota object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TetanggaKabkota $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TetanggaKabkotaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TetanggaKabkotaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TetanggaKabkotaPeer::DATABASE_NAME, TetanggaKabkotaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $kode_wilayah1
     * @param   string $kode_wilayah2
     * @param      PropelPDO $con
     * @return   TetanggaKabkota
     */
    public static function retrieveByPK($kode_wilayah1, $kode_wilayah2, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $kode_wilayah1, (string) $kode_wilayah2));
         if (null !== ($obj = TetanggaKabkotaPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(TetanggaKabkotaPeer::DATABASE_NAME);
        $criteria->add(TetanggaKabkotaPeer::KODE_WILAYAH1, $kode_wilayah1);
        $criteria->add(TetanggaKabkotaPeer::KODE_WILAYAH2, $kode_wilayah2);
        $v = TetanggaKabkotaPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseTetanggaKabkotaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTetanggaKabkotaPeer::buildTableMap();

