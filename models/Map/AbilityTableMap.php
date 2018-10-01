<?php

namespace Map;

use \Ability;
use \AbilityQuery;
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
 * This class defines the structure of the 'Ability' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AbilityTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AbilityTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Ability';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Ability';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Ability';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Ability.id';

    /**
     * the column name for the class_id field
     */
    const COL_CLASS_ID = 'Ability.class_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Ability.name';

    /**
     * the column name for the element field
     */
    const COL_ELEMENT = 'Ability.element';

    /**
     * the column name for the effect_1 field
     */
    const COL_EFFECT_1 = 'Ability.effect_1';

    /**
     * the column name for the effect_2 field
     */
    const COL_EFFECT_2 = 'Ability.effect_2';

    /**
     * the column name for the effect_3 field
     */
    const COL_EFFECT_3 = 'Ability.effect_3';

    /**
     * the column name for the str field
     */
    const COL_STR = 'Ability.str';

    /**
     * the column name for the dex field
     */
    const COL_DEX = 'Ability.dex';

    /**
     * the column name for the mag field
     */
    const COL_MAG = 'Ability.mag';

    /**
     * the column name for the def field
     */
    const COL_DEF = 'Ability.def';

    /**
     * the column name for the eva field
     */
    const COL_EVA = 'Ability.eva';

    /**
     * the column name for the res field
     */
    const COL_RES = 'Ability.res';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'Ability.type';

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
        self::TYPE_PHPNAME       => array('Id', 'ClassId', 'Name', 'Element', 'Effect1', 'Effect2', 'Effect3', 'Str', 'Dex', 'Mag', 'Def', 'Eva', 'Res', 'Type', ),
        self::TYPE_CAMELNAME     => array('id', 'classId', 'name', 'element', 'effect1', 'effect2', 'effect3', 'str', 'dex', 'mag', 'def', 'eva', 'res', 'type', ),
        self::TYPE_COLNAME       => array(AbilityTableMap::COL_ID, AbilityTableMap::COL_CLASS_ID, AbilityTableMap::COL_NAME, AbilityTableMap::COL_ELEMENT, AbilityTableMap::COL_EFFECT_1, AbilityTableMap::COL_EFFECT_2, AbilityTableMap::COL_EFFECT_3, AbilityTableMap::COL_STR, AbilityTableMap::COL_DEX, AbilityTableMap::COL_MAG, AbilityTableMap::COL_DEF, AbilityTableMap::COL_EVA, AbilityTableMap::COL_RES, AbilityTableMap::COL_TYPE, ),
        self::TYPE_FIELDNAME     => array('id', 'class_id', 'name', 'element', 'effect_1', 'effect_2', 'effect_3', 'str', 'dex', 'mag', 'def', 'eva', 'res', 'type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ClassId' => 1, 'Name' => 2, 'Element' => 3, 'Effect1' => 4, 'Effect2' => 5, 'Effect3' => 6, 'Str' => 7, 'Dex' => 8, 'Mag' => 9, 'Def' => 10, 'Eva' => 11, 'Res' => 12, 'Type' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'classId' => 1, 'name' => 2, 'element' => 3, 'effect1' => 4, 'effect2' => 5, 'effect3' => 6, 'str' => 7, 'dex' => 8, 'mag' => 9, 'def' => 10, 'eva' => 11, 'res' => 12, 'type' => 13, ),
        self::TYPE_COLNAME       => array(AbilityTableMap::COL_ID => 0, AbilityTableMap::COL_CLASS_ID => 1, AbilityTableMap::COL_NAME => 2, AbilityTableMap::COL_ELEMENT => 3, AbilityTableMap::COL_EFFECT_1 => 4, AbilityTableMap::COL_EFFECT_2 => 5, AbilityTableMap::COL_EFFECT_3 => 6, AbilityTableMap::COL_STR => 7, AbilityTableMap::COL_DEX => 8, AbilityTableMap::COL_MAG => 9, AbilityTableMap::COL_DEF => 10, AbilityTableMap::COL_EVA => 11, AbilityTableMap::COL_RES => 12, AbilityTableMap::COL_TYPE => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'class_id' => 1, 'name' => 2, 'element' => 3, 'effect_1' => 4, 'effect_2' => 5, 'effect_3' => 6, 'str' => 7, 'dex' => 8, 'mag' => 9, 'def' => 10, 'eva' => 11, 'res' => 12, 'type' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('Ability');
        $this->setPhpName('Ability');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ability');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('class_id', 'ClassId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'INTEGER', true, null, null);
        $this->addColumn('element', 'Element', 'INTEGER', true, null, null);
        $this->addColumn('effect_1', 'Effect1', 'TINYINT', false, null, null);
        $this->addColumn('effect_2', 'Effect2', 'TINYINT', false, null, null);
        $this->addColumn('effect_3', 'Effect3', 'TINYINT', false, null, null);
        $this->addColumn('str', 'Str', 'INTEGER', true, null, null);
        $this->addColumn('dex', 'Dex', 'INTEGER', true, null, null);
        $this->addColumn('mag', 'Mag', 'INTEGER', true, null, null);
        $this->addColumn('def', 'Def', 'INTEGER', true, null, null);
        $this->addColumn('eva', 'Eva', 'INTEGER', true, null, null);
        $this->addColumn('res', 'Res', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 64, null);
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
        return $withPrefix ? AbilityTableMap::CLASS_DEFAULT : AbilityTableMap::OM_CLASS;
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
     * @return array           (Ability object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AbilityTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AbilityTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AbilityTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AbilityTableMap::OM_CLASS;
            /** @var Ability $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AbilityTableMap::addInstanceToPool($obj, $key);
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
            $key = AbilityTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AbilityTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Ability $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AbilityTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AbilityTableMap::COL_ID);
            $criteria->addSelectColumn(AbilityTableMap::COL_CLASS_ID);
            $criteria->addSelectColumn(AbilityTableMap::COL_NAME);
            $criteria->addSelectColumn(AbilityTableMap::COL_ELEMENT);
            $criteria->addSelectColumn(AbilityTableMap::COL_EFFECT_1);
            $criteria->addSelectColumn(AbilityTableMap::COL_EFFECT_2);
            $criteria->addSelectColumn(AbilityTableMap::COL_EFFECT_3);
            $criteria->addSelectColumn(AbilityTableMap::COL_STR);
            $criteria->addSelectColumn(AbilityTableMap::COL_DEX);
            $criteria->addSelectColumn(AbilityTableMap::COL_MAG);
            $criteria->addSelectColumn(AbilityTableMap::COL_DEF);
            $criteria->addSelectColumn(AbilityTableMap::COL_EVA);
            $criteria->addSelectColumn(AbilityTableMap::COL_RES);
            $criteria->addSelectColumn(AbilityTableMap::COL_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.class_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.element');
            $criteria->addSelectColumn($alias . '.effect_1');
            $criteria->addSelectColumn($alias . '.effect_2');
            $criteria->addSelectColumn($alias . '.effect_3');
            $criteria->addSelectColumn($alias . '.str');
            $criteria->addSelectColumn($alias . '.dex');
            $criteria->addSelectColumn($alias . '.mag');
            $criteria->addSelectColumn($alias . '.def');
            $criteria->addSelectColumn($alias . '.eva');
            $criteria->addSelectColumn($alias . '.res');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(AbilityTableMap::DATABASE_NAME)->getTable(AbilityTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AbilityTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AbilityTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AbilityTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Ability or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Ability object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AbilityTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ability) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AbilityTableMap::DATABASE_NAME);
            $criteria->add(AbilityTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AbilityQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AbilityTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AbilityTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Ability table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AbilityQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Ability or Criteria object.
     *
     * @param mixed               $criteria Criteria or Ability object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AbilityTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Ability object
        }


        // Set the correct dbName
        $query = AbilityQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AbilityTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AbilityTableMap::buildTableMap();
