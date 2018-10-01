<?php

namespace Map;

use \Class;
use \ClassQuery;
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
 * This class defines the structure of the 'Class' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClassTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClassTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Class';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Class';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Class';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Class.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Class.name';

    /**
     * the column name for the str field
     */
    const COL_STR = 'Class.str';

    /**
     * the column name for the dex field
     */
    const COL_DEX = 'Class.dex';

    /**
     * the column name for the mag field
     */
    const COL_MAG = 'Class.mag';

    /**
     * the column name for the def field
     */
    const COL_DEF = 'Class.def';

    /**
     * the column name for the eva field
     */
    const COL_EVA = 'Class.eva';

    /**
     * the column name for the res field
     */
    const COL_RES = 'Class.res';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'Str', 'Dex', 'Mag', 'Def', 'Eva', 'Res', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'str', 'dex', 'mag', 'def', 'eva', 'res', ),
        self::TYPE_COLNAME       => array(ClassTableMap::COL_ID, ClassTableMap::COL_NAME, ClassTableMap::COL_STR, ClassTableMap::COL_DEX, ClassTableMap::COL_MAG, ClassTableMap::COL_DEF, ClassTableMap::COL_EVA, ClassTableMap::COL_RES, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'str', 'dex', 'mag', 'def', 'eva', 'res', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'Str' => 2, 'Dex' => 3, 'Mag' => 4, 'Def' => 5, 'Eva' => 6, 'Res' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'str' => 2, 'dex' => 3, 'mag' => 4, 'def' => 5, 'eva' => 6, 'res' => 7, ),
        self::TYPE_COLNAME       => array(ClassTableMap::COL_ID => 0, ClassTableMap::COL_NAME => 1, ClassTableMap::COL_STR => 2, ClassTableMap::COL_DEX => 3, ClassTableMap::COL_MAG => 4, ClassTableMap::COL_DEF => 5, ClassTableMap::COL_EVA => 6, ClassTableMap::COL_RES => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'str' => 2, 'dex' => 3, 'mag' => 4, 'def' => 5, 'eva' => 6, 'res' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('Class');
        $this->setPhpName('Class');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Class');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('str', 'Str', 'INTEGER', true, null, null);
        $this->addColumn('dex', 'Dex', 'INTEGER', true, null, null);
        $this->addColumn('mag', 'Mag', 'INTEGER', true, null, null);
        $this->addColumn('def', 'Def', 'INTEGER', true, null, null);
        $this->addColumn('eva', 'Eva', 'INTEGER', true, null, null);
        $this->addColumn('res', 'Res', 'INTEGER', true, null, null);
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
        return $withPrefix ? ClassTableMap::CLASS_DEFAULT : ClassTableMap::OM_CLASS;
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
     * @return array           (Class object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClassTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClassTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClassTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClassTableMap::OM_CLASS;
            /** @var Class $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClassTableMap::addInstanceToPool($obj, $key);
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
            $key = ClassTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClassTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Class $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClassTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ClassTableMap::COL_ID);
            $criteria->addSelectColumn(ClassTableMap::COL_NAME);
            $criteria->addSelectColumn(ClassTableMap::COL_STR);
            $criteria->addSelectColumn(ClassTableMap::COL_DEX);
            $criteria->addSelectColumn(ClassTableMap::COL_MAG);
            $criteria->addSelectColumn(ClassTableMap::COL_DEF);
            $criteria->addSelectColumn(ClassTableMap::COL_EVA);
            $criteria->addSelectColumn(ClassTableMap::COL_RES);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.str');
            $criteria->addSelectColumn($alias . '.dex');
            $criteria->addSelectColumn($alias . '.mag');
            $criteria->addSelectColumn($alias . '.def');
            $criteria->addSelectColumn($alias . '.eva');
            $criteria->addSelectColumn($alias . '.res');
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
        return Propel::getServiceContainer()->getDatabaseMap(ClassTableMap::DATABASE_NAME)->getTable(ClassTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClassTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClassTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClassTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Class or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Class object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Class) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Class object has no primary key');
        }

        $query = ClassQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClassTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClassTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Class table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClassQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Class or Criteria object.
     *
     * @param mixed               $criteria Criteria or Class object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Class object
        }


        // Set the correct dbName
        $query = ClassQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClassTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClassTableMap::buildTableMap();
