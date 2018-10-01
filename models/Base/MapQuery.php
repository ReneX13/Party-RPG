<?php

namespace Base;

use \Map as ChildMap;
use \MapQuery as ChildMapQuery;
use \Exception;
use Map\MapTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Map' table.
 *
 *
 *
 * @method     ChildMapQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMapQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildMapQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMapQuery orderByImageFile($order = Criteria::ASC) Order by the image_file column
 *
 * @method     ChildMapQuery groupById() Group by the id column
 * @method     ChildMapQuery groupByName() Group by the name column
 * @method     ChildMapQuery groupByDescription() Group by the description column
 * @method     ChildMapQuery groupByImageFile() Group by the image_file column
 *
 * @method     ChildMapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMapQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMapQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMapQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMap findOne(ConnectionInterface $con = null) Return the first ChildMap matching the query
 * @method     ChildMap findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMap matching the query, or a new ChildMap object populated from the query conditions when no match is found
 *
 * @method     ChildMap findOneById(int $id) Return the first ChildMap filtered by the id column
 * @method     ChildMap findOneByName(string $name) Return the first ChildMap filtered by the name column
 * @method     ChildMap findOneByDescription(string $description) Return the first ChildMap filtered by the description column
 * @method     ChildMap findOneByImageFile(string $image_file) Return the first ChildMap filtered by the image_file column *

 * @method     ChildMap requirePk($key, ConnectionInterface $con = null) Return the ChildMap by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMap requireOne(ConnectionInterface $con = null) Return the first ChildMap matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMap requireOneById(int $id) Return the first ChildMap filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMap requireOneByName(string $name) Return the first ChildMap filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMap requireOneByDescription(string $description) Return the first ChildMap filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMap requireOneByImageFile(string $image_file) Return the first ChildMap filtered by the image_file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMap[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMap objects based on current ModelCriteria
 * @method     ChildMap[]|ObjectCollection findById(int $id) Return ChildMap objects filtered by the id column
 * @method     ChildMap[]|ObjectCollection findByName(string $name) Return ChildMap objects filtered by the name column
 * @method     ChildMap[]|ObjectCollection findByDescription(string $description) Return ChildMap objects filtered by the description column
 * @method     ChildMap[]|ObjectCollection findByImageFile(string $image_file) Return ChildMap objects filtered by the image_file column
 * @method     ChildMap[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MapQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MapQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Map', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMapQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMapQuery) {
            return $criteria;
        }
        $query = new ChildMapQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMap|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Map object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Map object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Map object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Map object has no primary key');
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MapTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MapTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the image_file column
     *
     * Example usage:
     * <code>
     * $query->filterByImageFile('fooValue');   // WHERE image_file = 'fooValue'
     * $query->filterByImageFile('%fooValue%', Criteria::LIKE); // WHERE image_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageFile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function filterByImageFile($imageFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageFile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapTableMap::COL_IMAGE_FILE, $imageFile, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMap $map Object to remove from the list of results
     *
     * @return $this|ChildMapQuery The current query, for fluid interface
     */
    public function prune($map = null)
    {
        if ($map) {
            throw new LogicException('Map object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Map table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MapTableMap::clearInstancePool();
            MapTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MapTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MapTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MapTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MapQuery
