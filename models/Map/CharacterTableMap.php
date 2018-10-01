<?php

namespace Map;

use \Character;
use \CharacterQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Character' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CharacterTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CharacterTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Character';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Character';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Character';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Character.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Character.name';

    /**
     * the column name for the class_id field
     */
    const COL_CLASS_ID = 'Character.class_id';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'Character.level';

    /**
     * the column name for the account_id field
     */
    const COL_ACCOUNT_ID = 'Character.account_id';

    /**
     * the column name for the main_hand field
     */
    const COL_MAIN_HAND = 'Character.main_hand';

    /**
     * the column name for the off_hand field
     */
    const COL_OFF_HAND = 'Character.off_hand';

    /**
     * the column name for the head field
     */
    const COL_HEAD = 'Character.head';

    /**
     * the column name for the body field
     */
    const COL_BODY = 'Character.body';

    /**
     * the column name for the legs field
     */
    const COL_LEGS = 'Character.legs';

    /**
     * the column name for the hands field
     */
    const COL_HANDS = 'Character.hands';

    /**
     * the column name for the feet field
     */
    const COL_FEET = 'Character.feet';

    /**
     * the column name for the ability_1 field
     */
    const COL_ABILITY_1 = 'Character.ability_1';

    /**
     * the column name for the ability_2 field
     */
    const COL_ABILITY_2 = 'Character.ability_2';

    /**
     * the column name for the ability_3 field
     */
    const COL_ABILITY_3 = 'Character.ability_3';

    /**
     * the column name for the ability_4 field
     */
    const COL_ABILITY_4 = 'Character.ability_4';

    /**
     * the column name for the ability_5 field
     */
    const COL_ABILITY_5 = 'Character.ability_5';

    /**
     * the column name for the current_node field
     */
    const COL_CURRENT_NODE = 'Character.current_node';

    /**
     * the column name for the current_exp field
     */
    const COL_CURRENT_EXP = 'Character.current_exp';

    /**
     * the column name for the party_id field
     */
    const COL_PARTY_ID = 'Character.party_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'ClassId', 'Level', 'AccountId', 'MainHand', 'OffHand', 'Head', 'Body', 'Legs', 'Hands', 'Feet', 'Ability1', 'Ability2', 'Ability3', 'Ability4', 'Ability5', 'CurrentNode', 'CurrentExp', 'PartyId', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'classId', 'level', 'accountId', 'mainHand', 'offHand', 'head', 'body', 'legs', 'hands', 'feet', 'ability1', 'ability2', 'ability3', 'ability4', 'ability5', 'currentNode', 'currentExp', 'partyId', ),
        self::TYPE_COLNAME       => array(CharacterTableMap::COL_ID, CharacterTableMap::COL_NAME, CharacterTableMap::COL_CLASS_ID, CharacterTableMap::COL_LEVEL, CharacterTableMap::COL_ACCOUNT_ID, CharacterTableMap::COL_MAIN_HAND, CharacterTableMap::COL_OFF_HAND, CharacterTableMap::COL_HEAD, CharacterTableMap::COL_BODY, CharacterTableMap::COL_LEGS, CharacterTableMap::COL_HANDS, CharacterTableMap::COL_FEET, CharacterTableMap::COL_ABILITY_1, CharacterTableMap::COL_ABILITY_2, CharacterTableMap::COL_ABILITY_3, CharacterTableMap::COL_ABILITY_4, CharacterTableMap::COL_ABILITY_5, CharacterTableMap::COL_CURRENT_NODE, CharacterTableMap::COL_CURRENT_EXP, CharacterTableMap::COL_PARTY_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'class_id', 'level', 'account_id', 'main_hand', 'off_hand', 'head', 'body', 'legs', 'hands', 'feet', 'ability_1', 'ability_2', 'ability_3', 'ability_4', 'ability_5', 'current_node', 'current_exp', 'party_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'ClassId' => 2, 'Level' => 3, 'AccountId' => 4, 'MainHand' => 5, 'OffHand' => 6, 'Head' => 7, 'Body' => 8, 'Legs' => 9, 'Hands' => 10, 'Feet' => 11, 'Ability1' => 12, 'Ability2' => 13, 'Ability3' => 14, 'Ability4' => 15, 'Ability5' => 16, 'CurrentNode' => 17, 'CurrentExp' => 18, 'PartyId' => 19, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'classId' => 2, 'level' => 3, 'accountId' => 4, 'mainHand' => 5, 'offHand' => 6, 'head' => 7, 'body' => 8, 'legs' => 9, 'hands' => 10, 'feet' => 11, 'ability1' => 12, 'ability2' => 13, 'ability3' => 14, 'ability4' => 15, 'ability5' => 16, 'currentNode' => 17, 'currentExp' => 18, 'partyId' => 19, ),
        self::TYPE_COLNAME       => array(CharacterTableMap::COL_ID => 0, CharacterTableMap::COL_NAME => 1, CharacterTableMap::COL_CLASS_ID => 2, CharacterTableMap::COL_LEVEL => 3, CharacterTableMap::COL_ACCOUNT_ID => 4, CharacterTableMap::COL_MAIN_HAND => 5, CharacterTableMap::COL_OFF_HAND => 6, CharacterTableMap::COL_HEAD => 7, CharacterTableMap::COL_BODY => 8, CharacterTableMap::COL_LEGS => 9, CharacterTableMap::COL_HANDS => 10, CharacterTableMap::COL_FEET => 11, CharacterTableMap::COL_ABILITY_1 => 12, CharacterTableMap::COL_ABILITY_2 => 13, CharacterTableMap::COL_ABILITY_3 => 14, CharacterTableMap::COL_ABILITY_4 => 15, CharacterTableMap::COL_ABILITY_5 => 16, CharacterTableMap::COL_CURRENT_NODE => 17, CharacterTableMap::COL_CURRENT_EXP => 18, CharacterTableMap::COL_PARTY_ID => 19, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'class_id' => 2, 'level' => 3, 'account_id' => 4, 'main_hand' => 5, 'off_hand' => 6, 'head' => 7, 'body' => 8, 'legs' => 9, 'hands' => 10, 'feet' => 11, 'ability_1' => 12, 'ability_2' => 13, 'ability_3' => 14, 'ability_4' => 15, 'ability_5' => 16, 'current_node' => 17, 'current_exp' => 18, 'party_id' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Character');
        $this->setPhpName('Character');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Character');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('class_id', 'ClassId', 'INTEGER', true, null, null);
        $this->addColumn('level', 'Level', 'INTEGER', true, null, 0);
        $this->addColumn('account_id', 'AccountId', 'INTEGER', true, null, null);
        $this->addColumn('main_hand', 'MainHand', 'INTEGER', false, null, null);
        $this->addColumn('off_hand', 'OffHand', 'INTEGER', false, null, null);
        $this->addColumn('head', 'Head', 'INTEGER', false, null, null);
        $this->addColumn('body', 'Body', 'INTEGER', false, null, null);
        $this->addColumn('legs', 'Legs', 'INTEGER', false, null, null);
        $this->addColumn('hands', 'Hands', 'INTEGER', false, null, null);
        $this->addColumn('feet', 'Feet', 'INTEGER', false, null, null);
        $this->addColumn('ability_1', 'Ability1', 'INTEGER', true, null, null);
        $this->addColumn('ability_2', 'Ability2', 'INTEGER', true, null, null);
        $this->addColumn('ability_3', 'Ability3', 'INTEGER', true, null, null);
        $this->addColumn('ability_4', 'Ability4', 'INTEGER', true, null, null);
        $this->addColumn('ability_5', 'Ability5', 'INTEGER', true, null, null);
        $this->addColumn('current_node', 'CurrentNode', 'INTEGER', true, null, null);
        $this->addColumn('current_exp', 'CurrentExp', 'INTEGER', true, null, 0);
        $this->addColumn('party_id', 'PartyId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CharacterTableMap::CLASS_DEFAULT : CharacterTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Character object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CharacterTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CharacterTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CharacterTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CharacterTableMap::OM_CLASS;
            /** @var Character $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CharacterTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CharacterTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CharacterTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Character $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CharacterTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CharacterTableMap::COL_ID);
            $criteria->addSelectColumn(CharacterTableMap::COL_NAME);
            $criteria->addSelectColumn(CharacterTableMap::COL_CLASS_ID);
            $criteria->addSelectColumn(CharacterTableMap::COL_LEVEL);
            $criteria->addSelectColumn(CharacterTableMap::COL_ACCOUNT_ID);
            $criteria->addSelectColumn(CharacterTableMap::COL_MAIN_HAND);
            $criteria->addSelectColumn(CharacterTableMap::COL_OFF_HAND);
            $criteria->addSelectColumn(CharacterTableMap::COL_HEAD);
            $criteria->addSelectColumn(CharacterTableMap::COL_BODY);
            $criteria->addSelectColumn(CharacterTableMap::COL_LEGS);
            $criteria->addSelectColumn(CharacterTableMap::COL_HANDS);
            $criteria->addSelectColumn(CharacterTableMap::COL_FEET);
            $criteria->addSelectColumn(CharacterTableMap::COL_ABILITY_1);
            $criteria->addSelectColumn(CharacterTableMap::COL_ABILITY_2);
            $criteria->addSelectColumn(CharacterTableMap::COL_ABILITY_3);
            $criteria->addSelectColumn(CharacterTableMap::COL_ABILITY_4);
            $criteria->addSelectColumn(CharacterTableMap::COL_ABILITY_5);
            $criteria->addSelectColumn(CharacterTableMap::COL_CURRENT_NODE);
            $criteria->addSelectColumn(CharacterTableMap::COL_CURRENT_EXP);
            $criteria->addSelectColumn(CharacterTableMap::COL_PARTY_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.class_id');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.account_id');
            $criteria->addSelectColumn($alias . '.main_hand');
            $criteria->addSelectColumn($alias . '.off_hand');
            $criteria->addSelectColumn($alias . '.head');
            $criteria->addSelectColumn($alias . '.body');
            $criteria->addSelectColumn($alias . '.legs');
            $criteria->addSelectColumn($alias . '.hands');
            $criteria->addSelectColumn($alias . '.feet');
            $criteria->addSelectColumn($alias . '.ability_1');
            $criteria->addSelectColumn($alias . '.ability_2');
            $criteria->addSelectColumn($alias . '.ability_3');
            $criteria->addSelectColumn($alias . '.ability_4');
            $criteria->addSelectColumn($alias . '.ability_5');
            $criteria->addSelectColumn($alias . '.current_node');
            $criteria->addSelectColumn($alias . '.current_exp');
            $criteria->addSelectColumn($alias . '.party_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CharacterTableMap::DATABASE_NAME)->getTable(CharacterTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CharacterTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CharacterTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CharacterTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Character or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Character object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Character) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CharacterTableMap::DATABASE_NAME);
            $criteria->add(CharacterTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CharacterQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CharacterTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CharacterTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Character table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CharacterQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Character or Criteria object.
     *
     * @param mixed               $criteria Criteria or Character object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Character object
        }

        if ($criteria->containsKey(CharacterTableMap::COL_ID) && $criteria->keyContainsValue(CharacterTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CharacterTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CharacterQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CharacterTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CharacterTableMap::buildTableMap();
