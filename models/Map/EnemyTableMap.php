<?php

namespace Map;

use \Enemy;
use \EnemyQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Enemy' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EnemyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EnemyTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Enemy';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Enemy';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Enemy';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Enemy.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Enemy.name';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'Enemy.level';

    /**
     * the column name for the ability_1 field
     */
    const COL_ABILITY_1 = 'Enemy.ability_1';

    /**
     * the column name for the ability_2 field
     */
    const COL_ABILITY_2 = 'Enemy.ability_2';

    /**
     * the column name for the ability_3 field
     */
    const COL_ABILITY_3 = 'Enemy.ability_3';

    /**
     * the column name for the str field
     */
    const COL_STR = 'Enemy.str';

    /**
     * the column name for the dex field
     */
    const COL_DEX = 'Enemy.dex';

    /**
     * the column name for the mag field
     */
    const COL_MAG = 'Enemy.mag';

    /**
     * the column name for the def field
     */
    const COL_DEF = 'Enemy.def';

    /**
     * the column name for the eva field
     */
    const COL_EVA = 'Enemy.eva';

    /**
     * the column name for the res field
     */
    const COL_RES = 'Enemy.res';

    /**
     * the column name for the region_id field
     */
    const COL_REGION_ID = 'Enemy.region_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'Level', 'Ability1', 'Ability2', 'Ability3', 'Str', 'Dex', 'Mag', 'Def', 'Eva', 'Res', 'RegionId', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'level', 'ability1', 'ability2', 'ability3', 'str', 'dex', 'mag', 'def', 'eva', 'res', 'regionId', ),
        self::TYPE_COLNAME       => array(EnemyTableMap::COL_ID, EnemyTableMap::COL_NAME, EnemyTableMap::COL_LEVEL, EnemyTableMap::COL_ABILITY_1, EnemyTableMap::COL_ABILITY_2, EnemyTableMap::COL_ABILITY_3, EnemyTableMap::COL_STR, EnemyTableMap::COL_DEX, EnemyTableMap::COL_MAG, EnemyTableMap::COL_DEF, EnemyTableMap::COL_EVA, EnemyTableMap::COL_RES, EnemyTableMap::COL_REGION_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'level', 'ability_1', 'ability_2', 'ability_3', 'str', 'dex', 'mag', 'def', 'eva', 'res', 'region_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'Level' => 2, 'Ability1' => 3, 'Ability2' => 4, 'Ability3' => 5, 'Str' => 6, 'Dex' => 7, 'Mag' => 8, 'Def' => 9, 'Eva' => 10, 'Res' => 11, 'RegionId' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'level' => 2, 'ability1' => 3, 'ability2' => 4, 'ability3' => 5, 'str' => 6, 'dex' => 7, 'mag' => 8, 'def' => 9, 'eva' => 10, 'res' => 11, 'regionId' => 12, ),
        self::TYPE_COLNAME       => array(EnemyTableMap::COL_ID => 0, EnemyTableMap::COL_NAME => 1, EnemyTableMap::COL_LEVEL => 2, EnemyTableMap::COL_ABILITY_1 => 3, EnemyTableMap::COL_ABILITY_2 => 4, EnemyTableMap::COL_ABILITY_3 => 5, EnemyTableMap::COL_STR => 6, EnemyTableMap::COL_DEX => 7, EnemyTableMap::COL_MAG => 8, EnemyTableMap::COL_DEF => 9, EnemyTableMap::COL_EVA => 10, EnemyTableMap::COL_RES => 11, EnemyTableMap::COL_REGION_ID => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'level' => 2, 'ability_1' => 3, 'ability_2' => 4, 'ability_3' => 5, 'str' => 6, 'dex' => 7, 'mag' => 8, 'def' => 9, 'eva' => 10, 'res' => 11, 'region_id' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('Enemy');
        $this->setPhpName('Enemy');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Enemy');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('level', 'Level', 'INTEGER', true, null, 0);
        $this->addColumn('ability_1', 'Ability1', 'INTEGER', true, null, null);
        $this->addColumn('ability_2', 'Ability2', 'INTEGER', true, null, null);
        $this->addColumn('ability_3', 'Ability3', 'INTEGER', true, null, null);
        $this->addColumn('str', 'Str', 'INTEGER', true, null, null);
        $this->addColumn('dex', 'Dex', 'INTEGER', true, null, null);
        $this->addColumn('mag', 'Mag', 'INTEGER', true, null, null);
        $this->addColumn('def', 'Def', 'INTEGER', true, null, null);
        $this->addColumn('eva', 'Eva', 'INTEGER', true, null, null);
        $this->addColumn('res', 'Res', 'INTEGER', true, null, null);
        $this->addColumn('region_id', 'RegionId', 'INTEGER', true, null, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? EnemyTableMap::CLASS_DEFAULT : EnemyTableMap::OM_CLASS;
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
     * @return array           (Enemy object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EnemyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EnemyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EnemyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EnemyTableMap::OM_CLASS;
            /** @var Enemy $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EnemyTableMap::addInstanceToPool($obj, $key);
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
            $key = EnemyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EnemyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Enemy $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EnemyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EnemyTableMap::COL_ID);
            $criteria->addSelectColumn(EnemyTableMap::COL_NAME);
            $criteria->addSelectColumn(EnemyTableMap::COL_LEVEL);
            $criteria->addSelectColumn(EnemyTableMap::COL_ABILITY_1);
            $criteria->addSelectColumn(EnemyTableMap::COL_ABILITY_2);
            $criteria->addSelectColumn(EnemyTableMap::COL_ABILITY_3);
            $criteria->addSelectColumn(EnemyTableMap::COL_STR);
            $criteria->addSelectColumn(EnemyTableMap::COL_DEX);
            $criteria->addSelectColumn(EnemyTableMap::COL_MAG);
            $criteria->addSelectColumn(EnemyTableMap::COL_DEF);
            $criteria->addSelectColumn(EnemyTableMap::COL_EVA);
            $criteria->addSelectColumn(EnemyTableMap::COL_RES);
            $criteria->addSelectColumn(EnemyTableMap::COL_REGION_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.ability_1');
            $criteria->addSelectColumn($alias . '.ability_2');
            $criteria->addSelectColumn($alias . '.ability_3');
            $criteria->addSelectColumn($alias . '.str');
            $criteria->addSelectColumn($alias . '.dex');
            $criteria->addSelectColumn($alias . '.mag');
            $criteria->addSelectColumn($alias . '.def');
            $criteria->addSelectColumn($alias . '.eva');
            $criteria->addSelectColumn($alias . '.res');
            $criteria->addSelectColumn($alias . '.region_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(EnemyTableMap::DATABASE_NAME)->getTable(EnemyTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EnemyTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EnemyTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EnemyTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Enemy or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Enemy object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Enemy) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Enemy object has no primary key');
        }

        $query = EnemyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EnemyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EnemyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Enemy table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EnemyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Enemy or Criteria object.
     *
     * @param mixed               $criteria Criteria or Enemy object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Enemy object
        }


        // Set the correct dbName
        $query = EnemyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EnemyTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EnemyTableMap::buildTableMap();
