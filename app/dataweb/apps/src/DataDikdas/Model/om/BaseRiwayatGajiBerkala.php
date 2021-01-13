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
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\PangkatGolonganQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RiwayatGajiBerkalaPeer;
use DataDikdas\Model\RiwayatGajiBerkalaQuery;

/**
 * Base class that represents a row from the 'riwayat_gaji_berkala' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRiwayatGajiBerkala extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RiwayatGajiBerkalaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RiwayatGajiBerkalaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the riwayat_gaji_berkala_id field.
     * @var        string
     */
    protected $riwayat_gaji_berkala_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the pangkat_golongan_id field.
     * @var        string
     */
    protected $pangkat_golongan_id;

    /**
     * The value for the nomor_sk field.
     * @var        string
     */
    protected $nomor_sk;

    /**
     * The value for the tanggal_sk field.
     * @var        string
     */
    protected $tanggal_sk;

    /**
     * The value for the tmt_kgb field.
     * @var        string
     */
    protected $tmt_kgb;

    /**
     * The value for the masa_kerja_tahun field.
     * @var        string
     */
    protected $masa_kerja_tahun;

    /**
     * The value for the masa_kerja_bulan field.
     * @var        string
     */
    protected $masa_kerja_bulan;

    /**
     * The value for the gaji_pokok field.
     * @var        string
     */
    protected $gaji_pokok;

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
     * The value for the soft_delete field.
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        PangkatGolongan
     */
    protected $aPangkatGolongan;

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
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRiwayatGajiBerkala object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [riwayat_gaji_berkala_id] column value.
     * 
     * @return string
     */
    public function getRiwayatGajiBerkalaId()
    {
        return $this->riwayat_gaji_berkala_id;
    }

    /**
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [pangkat_golongan_id] column value.
     * 
     * @return string
     */
    public function getPangkatGolonganId()
    {
        return $this->pangkat_golongan_id;
    }

    /**
     * Get the [nomor_sk] column value.
     * 
     * @return string
     */
    public function getNomorSk()
    {
        return $this->nomor_sk;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSk($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk, true), $x);
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
     * Get the [optionally formatted] temporal [tmt_kgb] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtKgb($format = '%Y-%m-%d')
    {
        if ($this->tmt_kgb === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_kgb);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_kgb, true), $x);
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
     * Get the [masa_kerja_tahun] column value.
     * 
     * @return string
     */
    public function getMasaKerjaTahun()
    {
        return $this->masa_kerja_tahun;
    }

    /**
     * Get the [masa_kerja_bulan] column value.
     * 
     * @return string
     */
    public function getMasaKerjaBulan()
    {
        return $this->masa_kerja_bulan;
    }

    /**
     * Get the [gaji_pokok] column value.
     * 
     * @return string
     */
    public function getGajiPokok()
    {
        return $this->gaji_pokok;
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
     * Get the [soft_delete] column value.
     * 
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [riwayat_gaji_berkala_id] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setRiwayatGajiBerkalaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->riwayat_gaji_berkala_id !== $v) {
            $this->riwayat_gaji_berkala_id = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID;
        }


        return $this;
    } // setRiwayatGajiBerkalaId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [pangkat_golongan_id] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setPangkatGolonganId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pangkat_golongan_id !== $v) {
            $this->pangkat_golongan_id = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID;
        }

        if ($this->aPangkatGolongan !== null && $this->aPangkatGolongan->getPangkatGolonganId() !== $v) {
            $this->aPangkatGolongan = null;
        }


        return $this;
    } // setPangkatGolonganId()

    /**
     * Set the value of [nomor_sk] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setNomorSk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_sk !== $v) {
            $this->nomor_sk = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::NOMOR_SK;
        }


        return $this;
    } // setNomorSk()

    /**
     * Sets the value of [tanggal_sk] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setTanggalSk($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk !== null && $tmpDt = new DateTime($this->tanggal_sk)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk = $newDateAsString;
                $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::TANGGAL_SK;
            }
        } // if either are not null


        return $this;
    } // setTanggalSk()

    /**
     * Sets the value of [tmt_kgb] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setTmtKgb($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_kgb !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_kgb !== null && $tmpDt = new DateTime($this->tmt_kgb)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_kgb = $newDateAsString;
                $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::TMT_KGB;
            }
        } // if either are not null


        return $this;
    } // setTmtKgb()

    /**
     * Set the value of [masa_kerja_tahun] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setMasaKerjaTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->masa_kerja_tahun !== $v) {
            $this->masa_kerja_tahun = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN;
        }


        return $this;
    } // setMasaKerjaTahun()

    /**
     * Set the value of [masa_kerja_bulan] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setMasaKerjaBulan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->masa_kerja_bulan !== $v) {
            $this->masa_kerja_bulan = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN;
        }


        return $this;
    } // setMasaKerjaBulan()

    /**
     * Set the value of [gaji_pokok] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setGajiPokok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->gaji_pokok !== $v) {
            $this->gaji_pokok = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::GAJI_POKOK;
        }


        return $this;
    } // setGajiPokok()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RiwayatGajiBerkala The current object (for fluent API support)
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
                $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RiwayatGajiBerkalaPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

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

            $this->riwayat_gaji_berkala_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->pangkat_golongan_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nomor_sk = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tanggal_sk = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tmt_kgb = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->masa_kerja_tahun = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->masa_kerja_bulan = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->gaji_pokok = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->create_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_update = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->soft_delete = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_sync = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->updater_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RiwayatGajiBerkala object", $e);
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

        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aPangkatGolongan !== null && $this->pangkat_golongan_id !== $this->aPangkatGolongan->getPangkatGolonganId()) {
            $this->aPangkatGolongan = null;
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
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RiwayatGajiBerkalaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aPangkatGolongan = null;
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
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RiwayatGajiBerkalaQuery::create()
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
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RiwayatGajiBerkalaPeer::addInstanceToPool($this);
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

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aPangkatGolongan !== null) {
                if ($this->aPangkatGolongan->isModified() || $this->aPangkatGolongan->isNew()) {
                    $affectedRows += $this->aPangkatGolongan->save($con);
                }
                $this->setPangkatGolongan($this->aPangkatGolongan);
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
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"riwayat_gaji_berkala_id"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pangkat_golongan_id"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::NOMOR_SK)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_sk"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::TANGGAL_SK)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::TMT_KGB)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_kgb"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"masa_kerja_tahun"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN)) {
            $modifiedColumns[':p' . $index++]  = '"masa_kerja_bulan"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::GAJI_POKOK)) {
            $modifiedColumns[':p' . $index++]  = '"gaji_pokok"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "riwayat_gaji_berkala" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"riwayat_gaji_berkala_id"':						
                        $stmt->bindValue($identifier, $this->riwayat_gaji_berkala_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"pangkat_golongan_id"':						
                        $stmt->bindValue($identifier, $this->pangkat_golongan_id, PDO::PARAM_STR);
                        break;
                    case '"nomor_sk"':						
                        $stmt->bindValue($identifier, $this->nomor_sk, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk, PDO::PARAM_STR);
                        break;
                    case '"tmt_kgb"':						
                        $stmt->bindValue($identifier, $this->tmt_kgb, PDO::PARAM_STR);
                        break;
                    case '"masa_kerja_tahun"':						
                        $stmt->bindValue($identifier, $this->masa_kerja_tahun, PDO::PARAM_STR);
                        break;
                    case '"masa_kerja_bulan"':						
                        $stmt->bindValue($identifier, $this->masa_kerja_bulan, PDO::PARAM_STR);
                        break;
                    case '"gaji_pokok"':						
                        $stmt->bindValue($identifier, $this->gaji_pokok, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
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

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aPangkatGolongan !== null) {
                if (!$this->aPangkatGolongan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPangkatGolongan->getValidationFailures());
                }
            }


            if (($retval = RiwayatGajiBerkalaPeer::doValidate($this, $columns)) !== true) {
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
        $pos = RiwayatGajiBerkalaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRiwayatGajiBerkalaId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getPangkatGolonganId();
                break;
            case 3:
                return $this->getNomorSk();
                break;
            case 4:
                return $this->getTanggalSk();
                break;
            case 5:
                return $this->getTmtKgb();
                break;
            case 6:
                return $this->getMasaKerjaTahun();
                break;
            case 7:
                return $this->getMasaKerjaBulan();
                break;
            case 8:
                return $this->getGajiPokok();
                break;
            case 9:
                return $this->getCreateDate();
                break;
            case 10:
                return $this->getLastUpdate();
                break;
            case 11:
                return $this->getSoftDelete();
                break;
            case 12:
                return $this->getLastSync();
                break;
            case 13:
                return $this->getUpdaterId();
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
        if (isset($alreadyDumpedObjects['RiwayatGajiBerkala'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RiwayatGajiBerkala'][$this->getPrimaryKey()] = true;
        $keys = RiwayatGajiBerkalaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRiwayatGajiBerkalaId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getPangkatGolonganId(),
            $keys[3] => $this->getNomorSk(),
            $keys[4] => $this->getTanggalSk(),
            $keys[5] => $this->getTmtKgb(),
            $keys[6] => $this->getMasaKerjaTahun(),
            $keys[7] => $this->getMasaKerjaBulan(),
            $keys[8] => $this->getGajiPokok(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getSoftDelete(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPangkatGolongan) {
                $result['PangkatGolongan'] = $this->aPangkatGolongan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = RiwayatGajiBerkalaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRiwayatGajiBerkalaId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setPangkatGolonganId($value);
                break;
            case 3:
                $this->setNomorSk($value);
                break;
            case 4:
                $this->setTanggalSk($value);
                break;
            case 5:
                $this->setTmtKgb($value);
                break;
            case 6:
                $this->setMasaKerjaTahun($value);
                break;
            case 7:
                $this->setMasaKerjaBulan($value);
                break;
            case 8:
                $this->setGajiPokok($value);
                break;
            case 9:
                $this->setCreateDate($value);
                break;
            case 10:
                $this->setLastUpdate($value);
                break;
            case 11:
                $this->setSoftDelete($value);
                break;
            case 12:
                $this->setLastSync($value);
                break;
            case 13:
                $this->setUpdaterId($value);
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
        $keys = RiwayatGajiBerkalaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRiwayatGajiBerkalaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPangkatGolonganId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNomorSk($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTanggalSk($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTmtKgb($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMasaKerjaTahun($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMasaKerjaBulan($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setGajiPokok($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreateDate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastUpdate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSoftDelete($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastSync($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setUpdaterId($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID)) $criteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $this->riwayat_gaji_berkala_id);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::PTK_ID)) $criteria->add(RiwayatGajiBerkalaPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID)) $criteria->add(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $this->pangkat_golongan_id);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::NOMOR_SK)) $criteria->add(RiwayatGajiBerkalaPeer::NOMOR_SK, $this->nomor_sk);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::TANGGAL_SK)) $criteria->add(RiwayatGajiBerkalaPeer::TANGGAL_SK, $this->tanggal_sk);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::TMT_KGB)) $criteria->add(RiwayatGajiBerkalaPeer::TMT_KGB, $this->tmt_kgb);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN)) $criteria->add(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN, $this->masa_kerja_tahun);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN)) $criteria->add(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN, $this->masa_kerja_bulan);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::GAJI_POKOK)) $criteria->add(RiwayatGajiBerkalaPeer::GAJI_POKOK, $this->gaji_pokok);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::CREATE_DATE)) $criteria->add(RiwayatGajiBerkalaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::LAST_UPDATE)) $criteria->add(RiwayatGajiBerkalaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::SOFT_DELETE)) $criteria->add(RiwayatGajiBerkalaPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::LAST_SYNC)) $criteria->add(RiwayatGajiBerkalaPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RiwayatGajiBerkalaPeer::UPDATER_ID)) $criteria->add(RiwayatGajiBerkalaPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        $criteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $this->riwayat_gaji_berkala_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRiwayatGajiBerkalaId();
    }

    /**
     * Generic method to set the primary key (riwayat_gaji_berkala_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRiwayatGajiBerkalaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRiwayatGajiBerkalaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RiwayatGajiBerkala (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setPangkatGolonganId($this->getPangkatGolonganId());
        $copyObj->setNomorSk($this->getNomorSk());
        $copyObj->setTanggalSk($this->getTanggalSk());
        $copyObj->setTmtKgb($this->getTmtKgb());
        $copyObj->setMasaKerjaTahun($this->getMasaKerjaTahun());
        $copyObj->setMasaKerjaBulan($this->getMasaKerjaBulan());
        $copyObj->setGajiPokok($this->getGajiPokok());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

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
            $copyObj->setRiwayatGajiBerkalaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RiwayatGajiBerkala Clone of current object.
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
     * @return RiwayatGajiBerkalaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RiwayatGajiBerkalaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtk(Ptk $v = null)
    {
        if ($v === null) {
            $this->setPtkId(NULL);
        } else {
            $this->setPtkId($v->getPtkId());
        }

        $this->aPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ptk object, it will not be re-added.
        if ($v !== null) {
            $v->addRiwayatGajiBerkala($this);
        }


        return $this;
    }


    /**
     * Get the associated Ptk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ptk The associated Ptk object.
     * @throws PropelException
     */
    public function getPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtk === null && (($this->ptk_id !== "" && $this->ptk_id !== null)) && $doQuery) {
            $this->aPtk = PtkQuery::create()->findPk($this->ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtk->addRiwayatGajiBerkalas($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a PangkatGolongan object.
     *
     * @param             PangkatGolongan $v
     * @return RiwayatGajiBerkala The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPangkatGolongan(PangkatGolongan $v = null)
    {
        if ($v === null) {
            $this->setPangkatGolonganId(NULL);
        } else {
            $this->setPangkatGolonganId($v->getPangkatGolonganId());
        }

        $this->aPangkatGolongan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PangkatGolongan object, it will not be re-added.
        if ($v !== null) {
            $v->addRiwayatGajiBerkala($this);
        }


        return $this;
    }


    /**
     * Get the associated PangkatGolongan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PangkatGolongan The associated PangkatGolongan object.
     * @throws PropelException
     */
    public function getPangkatGolongan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPangkatGolongan === null && (($this->pangkat_golongan_id !== "" && $this->pangkat_golongan_id !== null)) && $doQuery) {
            $this->aPangkatGolongan = PangkatGolonganQuery::create()->findPk($this->pangkat_golongan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPangkatGolongan->addRiwayatGajiBerkalas($this);
             */
        }

        return $this->aPangkatGolongan;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->riwayat_gaji_berkala_id = null;
        $this->ptk_id = null;
        $this->pangkat_golongan_id = null;
        $this->nomor_sk = null;
        $this->tanggal_sk = null;
        $this->tmt_kgb = null;
        $this->masa_kerja_tahun = null;
        $this->masa_kerja_bulan = null;
        $this->gaji_pokok = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
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
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aPangkatGolongan instanceof Persistent) {
              $this->aPangkatGolongan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPtk = null;
        $this->aPangkatGolongan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RiwayatGajiBerkalaPeer::DEFAULT_STRING_FORMAT);
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
