<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Menu;
use DataDikdas\Model\MenuQuery;
use DataDikdas\Model\MenuRole;
use DataDikdas\Model\MenuRolePeer;
use DataDikdas\Model\MenuRoleQuery;
use DataDikdas\Model\Peran;
use DataDikdas\Model\PeranQuery;

/**
 * Base class that represents a row from the 'man_akses.menu_role' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMenuRole extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MenuRolePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MenuRolePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_menu field.
     * @var        string
     */
    protected $id_menu;

    /**
     * The value for the peran_id field.
     * @var        int
     */
    protected $peran_id;

    /**
     * The value for the akses_menu field.
     * @var        string
     */
    protected $akses_menu;

    /**
     * The value for the a_boleh_insert field.
     * @var        string
     */
    protected $a_boleh_insert;

    /**
     * The value for the a_boleh_delete field.
     * @var        string
     */
    protected $a_boleh_delete;

    /**
     * The value for the a_boleh_update field.
     * @var        string
     */
    protected $a_boleh_update;

    /**
     * The value for the a_boleh_sanggah field.
     * @var        string
     */
    protected $a_boleh_sanggah;

    /**
     * The value for the approval_menu field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $approval_menu;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $last_update;

    /**
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * @var        Menu
     */
    protected $aMenu;

    /**
     * @var        Peran
     */
    protected $aPeran;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->approval_menu = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseMenuRole object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_menu] column value.
     * 
     * @return string
     */
    public function getIdMenu()
    {
        return $this->id_menu;
    }

    /**
     * Get the [peran_id] column value.
     * 
     * @return int
     */
    public function getPeranId()
    {
        return $this->peran_id;
    }

    /**
     * Get the [akses_menu] column value.
     * 
     * @return string
     */
    public function getAksesMenu()
    {
        return $this->akses_menu;
    }

    /**
     * Get the [a_boleh_insert] column value.
     * 
     * @return string
     */
    public function getABolehInsert()
    {
        return $this->a_boleh_insert;
    }

    /**
     * Get the [a_boleh_delete] column value.
     * 
     * @return string
     */
    public function getABolehDelete()
    {
        return $this->a_boleh_delete;
    }

    /**
     * Get the [a_boleh_update] column value.
     * 
     * @return string
     */
    public function getABolehUpdate()
    {
        return $this->a_boleh_update;
    }

    /**
     * Get the [a_boleh_sanggah] column value.
     * 
     * @return string
     */
    public function getABolehSanggah()
    {
        return $this->a_boleh_sanggah;
    }

    /**
     * Get the [approval_menu] column value.
     * 
     * @return string
     */
    public function getApprovalMenu()
    {
        return $this->approval_menu;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = 'Y-m-d H:i:s')
    {
        if ($this->create_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->create_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->create_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = 'Y-m-d H:i:s')
    {
        if ($this->last_update === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_update);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_update, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [expired_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expired_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->expired_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expired_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = 'Y-m-d H:i:s')
    {
        if ($this->last_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_sync, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Set the value of [id_menu] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setIdMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_menu !== $v) {
            $this->id_menu = $v;
            $this->modifiedColumns[] = MenuRolePeer::ID_MENU;
        }

        if ($this->aMenu !== null && $this->aMenu->getIdMenu() !== $v) {
            $this->aMenu = null;
        }


        return $this;
    } // setIdMenu()

    /**
     * Set the value of [peran_id] column.
     * 
     * @param int $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setPeranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->peran_id !== $v) {
            $this->peran_id = $v;
            $this->modifiedColumns[] = MenuRolePeer::PERAN_ID;
        }

        if ($this->aPeran !== null && $this->aPeran->getPeranId() !== $v) {
            $this->aPeran = null;
        }


        return $this;
    } // setPeranId()

    /**
     * Set the value of [akses_menu] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setAksesMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akses_menu !== $v) {
            $this->akses_menu = $v;
            $this->modifiedColumns[] = MenuRolePeer::AKSES_MENU;
        }


        return $this;
    } // setAksesMenu()

    /**
     * Set the value of [a_boleh_insert] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setABolehInsert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_boleh_insert !== $v) {
            $this->a_boleh_insert = $v;
            $this->modifiedColumns[] = MenuRolePeer::A_BOLEH_INSERT;
        }


        return $this;
    } // setABolehInsert()

    /**
     * Set the value of [a_boleh_delete] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setABolehDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_boleh_delete !== $v) {
            $this->a_boleh_delete = $v;
            $this->modifiedColumns[] = MenuRolePeer::A_BOLEH_DELETE;
        }


        return $this;
    } // setABolehDelete()

    /**
     * Set the value of [a_boleh_update] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setABolehUpdate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_boleh_update !== $v) {
            $this->a_boleh_update = $v;
            $this->modifiedColumns[] = MenuRolePeer::A_BOLEH_UPDATE;
        }


        return $this;
    } // setABolehUpdate()

    /**
     * Set the value of [a_boleh_sanggah] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setABolehSanggah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_boleh_sanggah !== $v) {
            $this->a_boleh_sanggah = $v;
            $this->modifiedColumns[] = MenuRolePeer::A_BOLEH_SANGGAH;
        }


        return $this;
    } // setABolehSanggah()

    /**
     * Set the value of [approval_menu] column.
     * 
     * @param string $v new value
     * @return MenuRole The current object (for fluent API support)
     */
    public function setApprovalMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->approval_menu !== $v) {
            $this->approval_menu = $v;
            $this->modifiedColumns[] = MenuRolePeer::APPROVAL_MENU;
        }


        return $this;
    } // setApprovalMenu()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MenuRole The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = MenuRolePeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MenuRole The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = MenuRolePeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MenuRole The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = MenuRolePeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MenuRole The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '1901-01-01 00:00:00') // or the entered value matches the default
                 ) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = MenuRolePeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->approval_menu !== '0') {
                return false;
            }

            if ($this->last_sync !== '1901-01-01 00:00:00') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_menu = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->peran_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->akses_menu = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->a_boleh_insert = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->a_boleh_delete = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->a_boleh_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->a_boleh_sanggah = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->approval_menu = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->create_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_update = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->expired_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_sync = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = MenuRolePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating MenuRole object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aMenu !== null && $this->id_menu !== $this->aMenu->getIdMenu()) {
            $this->aMenu = null;
        }
        if ($this->aPeran !== null && $this->peran_id !== $this->aPeran->getPeranId()) {
            $this->aPeran = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MenuRolePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMenu = null;
            $this->aPeran = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MenuRoleQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                MenuRolePeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMenu !== null) {
                if ($this->aMenu->isModified() || $this->aMenu->isNew()) {
                    $affectedRows += $this->aMenu->save($con);
                }
                $this->setMenu($this->aMenu);
            }

            if ($this->aPeran !== null) {
                if ($this->aPeran->isModified() || $this->aPeran->isNew()) {
                    $affectedRows += $this->aPeran->save($con);
                }
                $this->setPeran($this->aPeran);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MenuRolePeer::ID_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"id_menu"';
        }
        if ($this->isColumnModified(MenuRolePeer::PERAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peran_id"';
        }
        if ($this->isColumnModified(MenuRolePeer::AKSES_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"akses_menu"';
        }
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_INSERT)) {
            $modifiedColumns[':p' . $index++]  = '"a_boleh_insert"';
        }
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"a_boleh_delete"';
        }
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"a_boleh_update"';
        }
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_SANGGAH)) {
            $modifiedColumns[':p' . $index++]  = '"a_boleh_sanggah"';
        }
        if ($this->isColumnModified(MenuRolePeer::APPROVAL_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"approval_menu"';
        }
        if ($this->isColumnModified(MenuRolePeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MenuRolePeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MenuRolePeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(MenuRolePeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "man_akses"."menu_role" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_menu"':						
                        $stmt->bindValue($identifier, $this->id_menu, PDO::PARAM_STR);
                        break;
                    case '"peran_id"':						
                        $stmt->bindValue($identifier, $this->peran_id, PDO::PARAM_INT);
                        break;
                    case '"akses_menu"':						
                        $stmt->bindValue($identifier, $this->akses_menu, PDO::PARAM_STR);
                        break;
                    case '"a_boleh_insert"':						
                        $stmt->bindValue($identifier, $this->a_boleh_insert, PDO::PARAM_STR);
                        break;
                    case '"a_boleh_delete"':						
                        $stmt->bindValue($identifier, $this->a_boleh_delete, PDO::PARAM_STR);
                        break;
                    case '"a_boleh_update"':						
                        $stmt->bindValue($identifier, $this->a_boleh_update, PDO::PARAM_STR);
                        break;
                    case '"a_boleh_sanggah"':						
                        $stmt->bindValue($identifier, $this->a_boleh_sanggah, PDO::PARAM_STR);
                        break;
                    case '"approval_menu"':						
                        $stmt->bindValue($identifier, $this->approval_menu, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMenu !== null) {
                if (!$this->aMenu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMenu->getValidationFailures());
                }
            }

            if ($this->aPeran !== null) {
                if (!$this->aPeran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPeran->getValidationFailures());
                }
            }


            if (($retval = MenuRolePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = MenuRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdMenu();
                break;
            case 1:
                return $this->getPeranId();
                break;
            case 2:
                return $this->getAksesMenu();
                break;
            case 3:
                return $this->getABolehInsert();
                break;
            case 4:
                return $this->getABolehDelete();
                break;
            case 5:
                return $this->getABolehUpdate();
                break;
            case 6:
                return $this->getABolehSanggah();
                break;
            case 7:
                return $this->getApprovalMenu();
                break;
            case 8:
                return $this->getCreateDate();
                break;
            case 9:
                return $this->getLastUpdate();
                break;
            case 10:
                return $this->getExpiredDate();
                break;
            case 11:
                return $this->getLastSync();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['MenuRole'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MenuRole'][serialize($this->getPrimaryKey())] = true;
        $keys = MenuRolePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMenu(),
            $keys[1] => $this->getPeranId(),
            $keys[2] => $this->getAksesMenu(),
            $keys[3] => $this->getABolehInsert(),
            $keys[4] => $this->getABolehDelete(),
            $keys[5] => $this->getABolehUpdate(),
            $keys[6] => $this->getABolehSanggah(),
            $keys[7] => $this->getApprovalMenu(),
            $keys[8] => $this->getCreateDate(),
            $keys[9] => $this->getLastUpdate(),
            $keys[10] => $this->getExpiredDate(),
            $keys[11] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMenu) {
                $result['Menu'] = $this->aMenu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPeran) {
                $result['Peran'] = $this->aPeran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = MenuRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdMenu($value);
                break;
            case 1:
                $this->setPeranId($value);
                break;
            case 2:
                $this->setAksesMenu($value);
                break;
            case 3:
                $this->setABolehInsert($value);
                break;
            case 4:
                $this->setABolehDelete($value);
                break;
            case 5:
                $this->setABolehUpdate($value);
                break;
            case 6:
                $this->setABolehSanggah($value);
                break;
            case 7:
                $this->setApprovalMenu($value);
                break;
            case 8:
                $this->setCreateDate($value);
                break;
            case 9:
                $this->setLastUpdate($value);
                break;
            case 10:
                $this->setExpiredDate($value);
                break;
            case 11:
                $this->setLastSync($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = MenuRolePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMenu($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPeranId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAksesMenu($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setABolehInsert($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setABolehDelete($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setABolehUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setABolehSanggah($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setApprovalMenu($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreateDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastUpdate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setExpiredDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastSync($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MenuRolePeer::DATABASE_NAME);

        if ($this->isColumnModified(MenuRolePeer::ID_MENU)) $criteria->add(MenuRolePeer::ID_MENU, $this->id_menu);
        if ($this->isColumnModified(MenuRolePeer::PERAN_ID)) $criteria->add(MenuRolePeer::PERAN_ID, $this->peran_id);
        if ($this->isColumnModified(MenuRolePeer::AKSES_MENU)) $criteria->add(MenuRolePeer::AKSES_MENU, $this->akses_menu);
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_INSERT)) $criteria->add(MenuRolePeer::A_BOLEH_INSERT, $this->a_boleh_insert);
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_DELETE)) $criteria->add(MenuRolePeer::A_BOLEH_DELETE, $this->a_boleh_delete);
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_UPDATE)) $criteria->add(MenuRolePeer::A_BOLEH_UPDATE, $this->a_boleh_update);
        if ($this->isColumnModified(MenuRolePeer::A_BOLEH_SANGGAH)) $criteria->add(MenuRolePeer::A_BOLEH_SANGGAH, $this->a_boleh_sanggah);
        if ($this->isColumnModified(MenuRolePeer::APPROVAL_MENU)) $criteria->add(MenuRolePeer::APPROVAL_MENU, $this->approval_menu);
        if ($this->isColumnModified(MenuRolePeer::CREATE_DATE)) $criteria->add(MenuRolePeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MenuRolePeer::LAST_UPDATE)) $criteria->add(MenuRolePeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MenuRolePeer::EXPIRED_DATE)) $criteria->add(MenuRolePeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(MenuRolePeer::LAST_SYNC)) $criteria->add(MenuRolePeer::LAST_SYNC, $this->last_sync);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(MenuRolePeer::DATABASE_NAME);
        $criteria->add(MenuRolePeer::ID_MENU, $this->id_menu);
        $criteria->add(MenuRolePeer::PERAN_ID, $this->peran_id);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getIdMenu();
        $pks[1] = $this->getPeranId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setIdMenu($keys[0]);
        $this->setPeranId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdMenu()) && (null === $this->getPeranId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of MenuRole (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdMenu($this->getIdMenu());
        $copyObj->setPeranId($this->getPeranId());
        $copyObj->setAksesMenu($this->getAksesMenu());
        $copyObj->setABolehInsert($this->getABolehInsert());
        $copyObj->setABolehDelete($this->getABolehDelete());
        $copyObj->setABolehUpdate($this->getABolehUpdate());
        $copyObj->setABolehSanggah($this->getABolehSanggah());
        $copyObj->setApprovalMenu($this->getApprovalMenu());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setLastSync($this->getLastSync());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return MenuRole Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return MenuRolePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MenuRolePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Menu object.
     *
     * @param             Menu $v
     * @return MenuRole The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMenu(Menu $v = null)
    {
        if ($v === null) {
            $this->setIdMenu(NULL);
        } else {
            $this->setIdMenu($v->getIdMenu());
        }

        $this->aMenu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Menu object, it will not be re-added.
        if ($v !== null) {
            $v->addMenuRole($this);
        }


        return $this;
    }


    /**
     * Get the associated Menu object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Menu The associated Menu object.
     * @throws PropelException
     */
    public function getMenu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMenu === null && (($this->id_menu !== "" && $this->id_menu !== null)) && $doQuery) {
            $this->aMenu = MenuQuery::create()->findPk($this->id_menu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMenu->addMenuRoles($this);
             */
        }

        return $this->aMenu;
    }

    /**
     * Declares an association between this object and a Peran object.
     *
     * @param             Peran $v
     * @return MenuRole The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPeran(Peran $v = null)
    {
        if ($v === null) {
            $this->setPeranId(NULL);
        } else {
            $this->setPeranId($v->getPeranId());
        }

        $this->aPeran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Peran object, it will not be re-added.
        if ($v !== null) {
            $v->addMenuRole($this);
        }


        return $this;
    }


    /**
     * Get the associated Peran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Peran The associated Peran object.
     * @throws PropelException
     */
    public function getPeran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPeran === null && ($this->peran_id !== null) && $doQuery) {
            $this->aPeran = PeranQuery::create()->findPk($this->peran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPeran->addMenuRoles($this);
             */
        }

        return $this->aPeran;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_menu = null;
        $this->peran_id = null;
        $this->akses_menu = null;
        $this->a_boleh_insert = null;
        $this->a_boleh_delete = null;
        $this->a_boleh_update = null;
        $this->a_boleh_sanggah = null;
        $this->approval_menu = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->expired_date = null;
        $this->last_sync = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->aMenu instanceof Persistent) {
              $this->aMenu->clearAllReferences($deep);
            }
            if ($this->aPeran instanceof Persistent) {
              $this->aPeran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aMenu = null;
        $this->aPeran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MenuRolePeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
