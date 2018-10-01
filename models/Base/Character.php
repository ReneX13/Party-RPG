<?php

namespace Base;

use \CharacterQuery as ChildCharacterQuery;
use \Exception;
use \PDO;
use Map\CharacterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'Character' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Character implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CharacterTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the class_id field.
     *
     * @var        int
     */
    protected $class_id;

    /**
     * The value for the level field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $level;

    /**
     * The value for the account_id field.
     *
     * @var        int
     */
    protected $account_id;

    /**
     * The value for the main_hand field.
     *
     * @var        int
     */
    protected $main_hand;

    /**
     * The value for the off_hand field.
     *
     * @var        int
     */
    protected $off_hand;

    /**
     * The value for the head field.
     *
     * @var        int
     */
    protected $head;

    /**
     * The value for the body field.
     *
     * @var        int
     */
    protected $body;

    /**
     * The value for the legs field.
     *
     * @var        int
     */
    protected $legs;

    /**
     * The value for the hands field.
     *
     * @var        int
     */
    protected $hands;

    /**
     * The value for the feet field.
     *
     * @var        int
     */
    protected $feet;

    /**
     * The value for the ability_1 field.
     *
     * @var        int
     */
    protected $ability_1;

    /**
     * The value for the ability_2 field.
     *
     * @var        int
     */
    protected $ability_2;

    /**
     * The value for the ability_3 field.
     *
     * @var        int
     */
    protected $ability_3;

    /**
     * The value for the ability_4 field.
     *
     * @var        int
     */
    protected $ability_4;

    /**
     * The value for the ability_5 field.
     *
     * @var        int
     */
    protected $ability_5;

    /**
     * The value for the current_node field.
     *
     * @var        int
     */
    protected $current_node;

    /**
     * The value for the current_exp field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $current_exp;

    /**
     * The value for the party_id field.
     *
     * @var        int
     */
    protected $party_id;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->level = 0;
        $this->current_exp = 0;
    }

    /**
     * Initializes internal state of Base\Character object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Character</code> instance.  If
     * <code>obj</code> is an instance of <code>Character</code>, delegates to
     * <code>equals(Character)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Character The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [class_id] column value.
     *
     * @return int
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * Get the [level] column value.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [account_id] column value.
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Get the [main_hand] column value.
     *
     * @return int
     */
    public function getMainHand()
    {
        return $this->main_hand;
    }

    /**
     * Get the [off_hand] column value.
     *
     * @return int
     */
    public function getOffHand()
    {
        return $this->off_hand;
    }

    /**
     * Get the [head] column value.
     *
     * @return int
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Get the [body] column value.
     *
     * @return int
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the [legs] column value.
     *
     * @return int
     */
    public function getLegs()
    {
        return $this->legs;
    }

    /**
     * Get the [hands] column value.
     *
     * @return int
     */
    public function getHands()
    {
        return $this->hands;
    }

    /**
     * Get the [feet] column value.
     *
     * @return int
     */
    public function getFeet()
    {
        return $this->feet;
    }

    /**
     * Get the [ability_1] column value.
     *
     * @return int
     */
    public function getAbility1()
    {
        return $this->ability_1;
    }

    /**
     * Get the [ability_2] column value.
     *
     * @return int
     */
    public function getAbility2()
    {
        return $this->ability_2;
    }

    /**
     * Get the [ability_3] column value.
     *
     * @return int
     */
    public function getAbility3()
    {
        return $this->ability_3;
    }

    /**
     * Get the [ability_4] column value.
     *
     * @return int
     */
    public function getAbility4()
    {
        return $this->ability_4;
    }

    /**
     * Get the [ability_5] column value.
     *
     * @return int
     */
    public function getAbility5()
    {
        return $this->ability_5;
    }

    /**
     * Get the [current_node] column value.
     *
     * @return int
     */
    public function getCurrentNode()
    {
        return $this->current_node;
    }

    /**
     * Get the [current_exp] column value.
     *
     * @return int
     */
    public function getCurrentExp()
    {
        return $this->current_exp;
    }

    /**
     * Get the [party_id] column value.
     *
     * @return int
     */
    public function getPartyId()
    {
        return $this->party_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[CharacterTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [class_id] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setClassId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->class_id !== $v) {
            $this->class_id = $v;
            $this->modifiedColumns[CharacterTableMap::COL_CLASS_ID] = true;
        }

        return $this;
    } // setClassId()

    /**
     * Set the value of [level] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[CharacterTableMap::COL_LEVEL] = true;
        }

        return $this;
    } // setLevel()

    /**
     * Set the value of [account_id] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAccountId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->account_id !== $v) {
            $this->account_id = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ACCOUNT_ID] = true;
        }

        return $this;
    } // setAccountId()

    /**
     * Set the value of [main_hand] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setMainHand($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->main_hand !== $v) {
            $this->main_hand = $v;
            $this->modifiedColumns[CharacterTableMap::COL_MAIN_HAND] = true;
        }

        return $this;
    } // setMainHand()

    /**
     * Set the value of [off_hand] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setOffHand($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->off_hand !== $v) {
            $this->off_hand = $v;
            $this->modifiedColumns[CharacterTableMap::COL_OFF_HAND] = true;
        }

        return $this;
    } // setOffHand()

    /**
     * Set the value of [head] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setHead($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->head !== $v) {
            $this->head = $v;
            $this->modifiedColumns[CharacterTableMap::COL_HEAD] = true;
        }

        return $this;
    } // setHead()

    /**
     * Set the value of [body] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setBody($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->body !== $v) {
            $this->body = $v;
            $this->modifiedColumns[CharacterTableMap::COL_BODY] = true;
        }

        return $this;
    } // setBody()

    /**
     * Set the value of [legs] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setLegs($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->legs !== $v) {
            $this->legs = $v;
            $this->modifiedColumns[CharacterTableMap::COL_LEGS] = true;
        }

        return $this;
    } // setLegs()

    /**
     * Set the value of [hands] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setHands($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->hands !== $v) {
            $this->hands = $v;
            $this->modifiedColumns[CharacterTableMap::COL_HANDS] = true;
        }

        return $this;
    } // setHands()

    /**
     * Set the value of [feet] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setFeet($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->feet !== $v) {
            $this->feet = $v;
            $this->modifiedColumns[CharacterTableMap::COL_FEET] = true;
        }

        return $this;
    } // setFeet()

    /**
     * Set the value of [ability_1] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAbility1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ability_1 !== $v) {
            $this->ability_1 = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ABILITY_1] = true;
        }

        return $this;
    } // setAbility1()

    /**
     * Set the value of [ability_2] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAbility2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ability_2 !== $v) {
            $this->ability_2 = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ABILITY_2] = true;
        }

        return $this;
    } // setAbility2()

    /**
     * Set the value of [ability_3] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAbility3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ability_3 !== $v) {
            $this->ability_3 = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ABILITY_3] = true;
        }

        return $this;
    } // setAbility3()

    /**
     * Set the value of [ability_4] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAbility4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ability_4 !== $v) {
            $this->ability_4 = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ABILITY_4] = true;
        }

        return $this;
    } // setAbility4()

    /**
     * Set the value of [ability_5] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setAbility5($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ability_5 !== $v) {
            $this->ability_5 = $v;
            $this->modifiedColumns[CharacterTableMap::COL_ABILITY_5] = true;
        }

        return $this;
    } // setAbility5()

    /**
     * Set the value of [current_node] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setCurrentNode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->current_node !== $v) {
            $this->current_node = $v;
            $this->modifiedColumns[CharacterTableMap::COL_CURRENT_NODE] = true;
        }

        return $this;
    } // setCurrentNode()

    /**
     * Set the value of [current_exp] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setCurrentExp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->current_exp !== $v) {
            $this->current_exp = $v;
            $this->modifiedColumns[CharacterTableMap::COL_CURRENT_EXP] = true;
        }

        return $this;
    } // setCurrentExp()

    /**
     * Set the value of [party_id] column.
     *
     * @param int $v new value
     * @return $this|\Character The current object (for fluent API support)
     */
    public function setPartyId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->party_id !== $v) {
            $this->party_id = $v;
            $this->modifiedColumns[CharacterTableMap::COL_PARTY_ID] = true;
        }

        return $this;
    } // setPartyId()

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
            if ($this->level !== 0) {
                return false;
            }

            if ($this->current_exp !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CharacterTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CharacterTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CharacterTableMap::translateFieldName('ClassId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->class_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CharacterTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CharacterTableMap::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->account_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CharacterTableMap::translateFieldName('MainHand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->main_hand = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CharacterTableMap::translateFieldName('OffHand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->off_hand = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CharacterTableMap::translateFieldName('Head', TableMap::TYPE_PHPNAME, $indexType)];
            $this->head = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CharacterTableMap::translateFieldName('Body', TableMap::TYPE_PHPNAME, $indexType)];
            $this->body = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CharacterTableMap::translateFieldName('Legs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->legs = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CharacterTableMap::translateFieldName('Hands', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hands = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CharacterTableMap::translateFieldName('Feet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->feet = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CharacterTableMap::translateFieldName('Ability1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ability_1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CharacterTableMap::translateFieldName('Ability2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ability_2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CharacterTableMap::translateFieldName('Ability3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ability_3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CharacterTableMap::translateFieldName('Ability4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ability_4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CharacterTableMap::translateFieldName('Ability5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ability_5 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CharacterTableMap::translateFieldName('CurrentNode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->current_node = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CharacterTableMap::translateFieldName('CurrentExp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->current_exp = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CharacterTableMap::translateFieldName('PartyId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->party_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = CharacterTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Character'), 0, $e);
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
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CharacterTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCharacterQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Character::setDeleted()
     * @see Character::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCharacterQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
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
                CharacterTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CharacterTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CharacterTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CharacterTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'class_id';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'level';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ACCOUNT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'account_id';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_MAIN_HAND)) {
            $modifiedColumns[':p' . $index++]  = 'main_hand';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_OFF_HAND)) {
            $modifiedColumns[':p' . $index++]  = 'off_hand';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_HEAD)) {
            $modifiedColumns[':p' . $index++]  = 'head';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_BODY)) {
            $modifiedColumns[':p' . $index++]  = 'body';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_LEGS)) {
            $modifiedColumns[':p' . $index++]  = 'legs';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_HANDS)) {
            $modifiedColumns[':p' . $index++]  = 'hands';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_FEET)) {
            $modifiedColumns[':p' . $index++]  = 'feet';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_1)) {
            $modifiedColumns[':p' . $index++]  = 'ability_1';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_2)) {
            $modifiedColumns[':p' . $index++]  = 'ability_2';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_3)) {
            $modifiedColumns[':p' . $index++]  = 'ability_3';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_4)) {
            $modifiedColumns[':p' . $index++]  = 'ability_4';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_5)) {
            $modifiedColumns[':p' . $index++]  = 'ability_5';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CURRENT_NODE)) {
            $modifiedColumns[':p' . $index++]  = 'current_node';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CURRENT_EXP)) {
            $modifiedColumns[':p' . $index++]  = 'current_exp';
        }
        if ($this->isColumnModified(CharacterTableMap::COL_PARTY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'party_id';
        }

        $sql = sprintf(
            'INSERT INTO Character (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'class_id':
                        $stmt->bindValue($identifier, $this->class_id, PDO::PARAM_INT);
                        break;
                    case 'level':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
                        break;
                    case 'account_id':
                        $stmt->bindValue($identifier, $this->account_id, PDO::PARAM_INT);
                        break;
                    case 'main_hand':
                        $stmt->bindValue($identifier, $this->main_hand, PDO::PARAM_INT);
                        break;
                    case 'off_hand':
                        $stmt->bindValue($identifier, $this->off_hand, PDO::PARAM_INT);
                        break;
                    case 'head':
                        $stmt->bindValue($identifier, $this->head, PDO::PARAM_INT);
                        break;
                    case 'body':
                        $stmt->bindValue($identifier, $this->body, PDO::PARAM_INT);
                        break;
                    case 'legs':
                        $stmt->bindValue($identifier, $this->legs, PDO::PARAM_INT);
                        break;
                    case 'hands':
                        $stmt->bindValue($identifier, $this->hands, PDO::PARAM_INT);
                        break;
                    case 'feet':
                        $stmt->bindValue($identifier, $this->feet, PDO::PARAM_INT);
                        break;
                    case 'ability_1':
                        $stmt->bindValue($identifier, $this->ability_1, PDO::PARAM_INT);
                        break;
                    case 'ability_2':
                        $stmt->bindValue($identifier, $this->ability_2, PDO::PARAM_INT);
                        break;
                    case 'ability_3':
                        $stmt->bindValue($identifier, $this->ability_3, PDO::PARAM_INT);
                        break;
                    case 'ability_4':
                        $stmt->bindValue($identifier, $this->ability_4, PDO::PARAM_INT);
                        break;
                    case 'ability_5':
                        $stmt->bindValue($identifier, $this->ability_5, PDO::PARAM_INT);
                        break;
                    case 'current_node':
                        $stmt->bindValue($identifier, $this->current_node, PDO::PARAM_INT);
                        break;
                    case 'current_exp':
                        $stmt->bindValue($identifier, $this->current_exp, PDO::PARAM_INT);
                        break;
                    case 'party_id':
                        $stmt->bindValue($identifier, $this->party_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CharacterTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getClassId();
                break;
            case 3:
                return $this->getLevel();
                break;
            case 4:
                return $this->getAccountId();
                break;
            case 5:
                return $this->getMainHand();
                break;
            case 6:
                return $this->getOffHand();
                break;
            case 7:
                return $this->getHead();
                break;
            case 8:
                return $this->getBody();
                break;
            case 9:
                return $this->getLegs();
                break;
            case 10:
                return $this->getHands();
                break;
            case 11:
                return $this->getFeet();
                break;
            case 12:
                return $this->getAbility1();
                break;
            case 13:
                return $this->getAbility2();
                break;
            case 14:
                return $this->getAbility3();
                break;
            case 15:
                return $this->getAbility4();
                break;
            case 16:
                return $this->getAbility5();
                break;
            case 17:
                return $this->getCurrentNode();
                break;
            case 18:
                return $this->getCurrentExp();
                break;
            case 19:
                return $this->getPartyId();
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Character'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Character'][$this->hashCode()] = true;
        $keys = CharacterTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getClassId(),
            $keys[3] => $this->getLevel(),
            $keys[4] => $this->getAccountId(),
            $keys[5] => $this->getMainHand(),
            $keys[6] => $this->getOffHand(),
            $keys[7] => $this->getHead(),
            $keys[8] => $this->getBody(),
            $keys[9] => $this->getLegs(),
            $keys[10] => $this->getHands(),
            $keys[11] => $this->getFeet(),
            $keys[12] => $this->getAbility1(),
            $keys[13] => $this->getAbility2(),
            $keys[14] => $this->getAbility3(),
            $keys[15] => $this->getAbility4(),
            $keys[16] => $this->getAbility5(),
            $keys[17] => $this->getCurrentNode(),
            $keys[18] => $this->getCurrentExp(),
            $keys[19] => $this->getPartyId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Character
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CharacterTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Character
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setClassId($value);
                break;
            case 3:
                $this->setLevel($value);
                break;
            case 4:
                $this->setAccountId($value);
                break;
            case 5:
                $this->setMainHand($value);
                break;
            case 6:
                $this->setOffHand($value);
                break;
            case 7:
                $this->setHead($value);
                break;
            case 8:
                $this->setBody($value);
                break;
            case 9:
                $this->setLegs($value);
                break;
            case 10:
                $this->setHands($value);
                break;
            case 11:
                $this->setFeet($value);
                break;
            case 12:
                $this->setAbility1($value);
                break;
            case 13:
                $this->setAbility2($value);
                break;
            case 14:
                $this->setAbility3($value);
                break;
            case 15:
                $this->setAbility4($value);
                break;
            case 16:
                $this->setAbility5($value);
                break;
            case 17:
                $this->setCurrentNode($value);
                break;
            case 18:
                $this->setCurrentExp($value);
                break;
            case 19:
                $this->setPartyId($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CharacterTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setClassId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLevel($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAccountId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMainHand($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setOffHand($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setHead($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setBody($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLegs($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setHands($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFeet($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setAbility1($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAbility2($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAbility3($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setAbility4($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setAbility5($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCurrentNode($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCurrentExp($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPartyId($arr[$keys[19]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Character The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CharacterTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CharacterTableMap::COL_ID)) {
            $criteria->add(CharacterTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_NAME)) {
            $criteria->add(CharacterTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CLASS_ID)) {
            $criteria->add(CharacterTableMap::COL_CLASS_ID, $this->class_id);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_LEVEL)) {
            $criteria->add(CharacterTableMap::COL_LEVEL, $this->level);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ACCOUNT_ID)) {
            $criteria->add(CharacterTableMap::COL_ACCOUNT_ID, $this->account_id);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_MAIN_HAND)) {
            $criteria->add(CharacterTableMap::COL_MAIN_HAND, $this->main_hand);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_OFF_HAND)) {
            $criteria->add(CharacterTableMap::COL_OFF_HAND, $this->off_hand);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_HEAD)) {
            $criteria->add(CharacterTableMap::COL_HEAD, $this->head);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_BODY)) {
            $criteria->add(CharacterTableMap::COL_BODY, $this->body);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_LEGS)) {
            $criteria->add(CharacterTableMap::COL_LEGS, $this->legs);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_HANDS)) {
            $criteria->add(CharacterTableMap::COL_HANDS, $this->hands);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_FEET)) {
            $criteria->add(CharacterTableMap::COL_FEET, $this->feet);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_1)) {
            $criteria->add(CharacterTableMap::COL_ABILITY_1, $this->ability_1);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_2)) {
            $criteria->add(CharacterTableMap::COL_ABILITY_2, $this->ability_2);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_3)) {
            $criteria->add(CharacterTableMap::COL_ABILITY_3, $this->ability_3);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_4)) {
            $criteria->add(CharacterTableMap::COL_ABILITY_4, $this->ability_4);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_ABILITY_5)) {
            $criteria->add(CharacterTableMap::COL_ABILITY_5, $this->ability_5);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CURRENT_NODE)) {
            $criteria->add(CharacterTableMap::COL_CURRENT_NODE, $this->current_node);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_CURRENT_EXP)) {
            $criteria->add(CharacterTableMap::COL_CURRENT_EXP, $this->current_exp);
        }
        if ($this->isColumnModified(CharacterTableMap::COL_PARTY_ID)) {
            $criteria->add(CharacterTableMap::COL_PARTY_ID, $this->party_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCharacterQuery::create();
        $criteria->add(CharacterTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Character (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setClassId($this->getClassId());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setAccountId($this->getAccountId());
        $copyObj->setMainHand($this->getMainHand());
        $copyObj->setOffHand($this->getOffHand());
        $copyObj->setHead($this->getHead());
        $copyObj->setBody($this->getBody());
        $copyObj->setLegs($this->getLegs());
        $copyObj->setHands($this->getHands());
        $copyObj->setFeet($this->getFeet());
        $copyObj->setAbility1($this->getAbility1());
        $copyObj->setAbility2($this->getAbility2());
        $copyObj->setAbility3($this->getAbility3());
        $copyObj->setAbility4($this->getAbility4());
        $copyObj->setAbility5($this->getAbility5());
        $copyObj->setCurrentNode($this->getCurrentNode());
        $copyObj->setCurrentExp($this->getCurrentExp());
        $copyObj->setPartyId($this->getPartyId());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Character Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->class_id = null;
        $this->level = null;
        $this->account_id = null;
        $this->main_hand = null;
        $this->off_hand = null;
        $this->head = null;
        $this->body = null;
        $this->legs = null;
        $this->hands = null;
        $this->feet = null;
        $this->ability_1 = null;
        $this->ability_2 = null;
        $this->ability_3 = null;
        $this->ability_4 = null;
        $this->ability_5 = null;
        $this->current_node = null;
        $this->current_exp = null;
        $this->party_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CharacterTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
