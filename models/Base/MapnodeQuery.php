<?php

namespace Base;

use \Mapnode as ChildMapnode;
use \MapnodeQuery as ChildMapnodeQuery;
use \Exception;
use \PDO;
use Map\MapnodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'MapNode' table.
 *
 *
 *
 * @method     ChildMapnodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMapnodeQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 * @method     ChildMapnodeQuery orderByMapId($order = Criteria::ASC) Order by the map_id column
 * @method     ChildMapnodeQuery orderByNodeNumber($order = Criteria::ASC) Order by the node_number column
 *
 * @method     ChildMapnodeQuery groupById() Group by the id column
 * @method     ChildMapnodeQuery groupByRegionId() Group by the region_id column
 * @method     ChildMapnodeQuery groupByMapId() Group by the map_id column
 * @method     ChildMapnodeQuery groupByNodeNumber() Group by the node_number column
 *
 * @method     ChildMapnodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMapnodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMapnodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMapnodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMapnodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMapnodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMapnode findOne(ConnectionInterface $con = null) Return the first ChildMapnode matching the query
 * @method     ChildMapnode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMapnode matching the query, or a new ChildMapnode object populated from the query conditions when no match is found
 *
 * @method     ChildMapnode findOneById(int $id) Return the first ChildMapnode filtered by the id column
 * @method     ChildMapnode findOneByRegionId(int $region_id) Return the first ChildMapnode filtered by the region_id column
 * @method     ChildMapnode findOneByMapId(int $map_id) Return the first ChildMapnode filtered by the map_id column
 * @method     ChildMapnode findOneByNodeNumber(int $node_number) Return the first ChildMapnode filtered by the node_number column *

 * @method     ChildMapnode requirePk($key, ConnectionInterface $con = null) Return the ChildMapnode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMapnode requireOne(ConnectionInterface $con = null) Return the first ChildMapnode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMapnode requireOneById(int $id) Return the first ChildMapnode filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMapnode requireOneByRegionId(int $region_id) Return the first ChildMapnode filtered by the region_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMapnode requireOneByMapId(int $map_id) Return the first ChildMapnode filtered by the map_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMapnode requireOneByNodeNumber(int $node_number) Return the first ChildMapnode filtered by the node_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMapnode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMapnode objects based on current ModelCriteria
 * @method     ChildMapnode[]|ObjectCollection findById(int $id) Return ChildMapnode objects filtered by the id column
 * @method     ChildMapnode[]|ObjectCollection findByRegionId(int $region_id) Return ChildMapnode objects filtered by the region_id column
 * @method     ChildMapnode[]|ObjectCollection findByMapId(int $map_id) Return ChildMapnode objects filtered by the map_id column
 * @method     ChildMapnode[]|ObjectCollection findByNodeNumber(int $node_number) Return ChildMapnode objects filtered by the node_number column
 * @method     ChildMapnode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MapnodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MapnodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Mapnode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMapnodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMapnodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMapnodeQuery) {
            return $criteria;
        }
        $query = new ChildMapnodeQuery();
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
     * @return ChildMapnode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MapnodeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MapnodeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMapnode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, region_id, map_id, node_number FROM MapNode WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildMapnode $obj */
            $obj = new ChildMapnode();
            $obj->hydrate($row);
            MapnodeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildMapnode|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MapnodeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MapnodeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapnodeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the region_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionId(1234); // WHERE region_id = 1234
     * $query->filterByRegionId(array(12, 34)); // WHERE region_id IN (12, 34)
     * $query->filterByRegionId(array('min' => 12)); // WHERE region_id > 12
     * </code>
     *
     * @param     mixed $regionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (is_array($regionId)) {
            $useMinMax = false;
            if (isset($regionId['min'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_REGION_ID, $regionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regionId['max'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_REGION_ID, $regionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapnodeTableMap::COL_REGION_ID, $regionId, $comparison);
    }

    /**
     * Filter the query on the map_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMapId(1234); // WHERE map_id = 1234
     * $query->filterByMapId(array(12, 34)); // WHERE map_id IN (12, 34)
     * $query->filterByMapId(array('min' => 12)); // WHERE map_id > 12
     * </code>
     *
     * @param     mixed $mapId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterByMapId($mapId = null, $comparison = null)
    {
        if (is_array($mapId)) {
            $useMinMax = false;
            if (isset($mapId['min'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_MAP_ID, $mapId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mapId['max'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_MAP_ID, $mapId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapnodeTableMap::COL_MAP_ID, $mapId, $comparison);
    }

    /**
     * Filter the query on the node_number column
     *
     * Example usage:
     * <code>
     * $query->filterByNodeNumber(1234); // WHERE node_number = 1234
     * $query->filterByNodeNumber(array(12, 34)); // WHERE node_number IN (12, 34)
     * $query->filterByNodeNumber(array('min' => 12)); // WHERE node_number > 12
     * </code>
     *
     * @param     mixed $nodeNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function filterByNodeNumber($nodeNumber = null, $comparison = null)
    {
        if (is_array($nodeNumber)) {
            $useMinMax = false;
            if (isset($nodeNumber['min'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_NODE_NUMBER, $nodeNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nodeNumber['max'])) {
                $this->addUsingAlias(MapnodeTableMap::COL_NODE_NUMBER, $nodeNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapnodeTableMap::COL_NODE_NUMBER, $nodeNumber, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMapnode $mapnode Object to remove from the list of results
     *
     * @return $this|ChildMapnodeQuery The current query, for fluid interface
     */
    public function prune($mapnode = null)
    {
        if ($mapnode) {
            $this->addUsingAlias(MapnodeTableMap::COL_ID, $mapnode->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the MapNode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MapnodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MapnodeTableMap::clearInstancePool();
            MapnodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MapnodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MapnodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MapnodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MapnodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MapnodeQuery
