<?php

namespace Base;

use \Nodeconnection as ChildNodeconnection;
use \NodeconnectionQuery as ChildNodeconnectionQuery;
use \Exception;
use Map\NodeconnectionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'NodeConnection' table.
 *
 *
 *
 * @method     ChildNodeconnectionQuery orderByNodeFrom($order = Criteria::ASC) Order by the node_from column
 * @method     ChildNodeconnectionQuery orderByNodeTo($order = Criteria::ASC) Order by the node_to column
 *
 * @method     ChildNodeconnectionQuery groupByNodeFrom() Group by the node_from column
 * @method     ChildNodeconnectionQuery groupByNodeTo() Group by the node_to column
 *
 * @method     ChildNodeconnectionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNodeconnectionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNodeconnectionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNodeconnectionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNodeconnectionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNodeconnectionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNodeconnection findOne(ConnectionInterface $con = null) Return the first ChildNodeconnection matching the query
 * @method     ChildNodeconnection findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNodeconnection matching the query, or a new ChildNodeconnection object populated from the query conditions when no match is found
 *
 * @method     ChildNodeconnection findOneByNodeFrom(int $node_from) Return the first ChildNodeconnection filtered by the node_from column
 * @method     ChildNodeconnection findOneByNodeTo(int $node_to) Return the first ChildNodeconnection filtered by the node_to column *

 * @method     ChildNodeconnection requirePk($key, ConnectionInterface $con = null) Return the ChildNodeconnection by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNodeconnection requireOne(ConnectionInterface $con = null) Return the first ChildNodeconnection matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNodeconnection requireOneByNodeFrom(int $node_from) Return the first ChildNodeconnection filtered by the node_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNodeconnection requireOneByNodeTo(int $node_to) Return the first ChildNodeconnection filtered by the node_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNodeconnection[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNodeconnection objects based on current ModelCriteria
 * @method     ChildNodeconnection[]|ObjectCollection findByNodeFrom(int $node_from) Return ChildNodeconnection objects filtered by the node_from column
 * @method     ChildNodeconnection[]|ObjectCollection findByNodeTo(int $node_to) Return ChildNodeconnection objects filtered by the node_to column
 * @method     ChildNodeconnection[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NodeconnectionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NodeconnectionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Nodeconnection', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNodeconnectionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNodeconnectionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNodeconnectionQuery) {
            return $criteria;
        }
        $query = new ChildNodeconnectionQuery();
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
     * @return ChildNodeconnection|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Nodeconnection object has no primary key');
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
        throw new LogicException('The Nodeconnection object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildNodeconnectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Nodeconnection object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNodeconnectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Nodeconnection object has no primary key');
    }

    /**
     * Filter the query on the node_from column
     *
     * Example usage:
     * <code>
     * $query->filterByNodeFrom(1234); // WHERE node_from = 1234
     * $query->filterByNodeFrom(array(12, 34)); // WHERE node_from IN (12, 34)
     * $query->filterByNodeFrom(array('min' => 12)); // WHERE node_from > 12
     * </code>
     *
     * @param     mixed $nodeFrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNodeconnectionQuery The current query, for fluid interface
     */
    public function filterByNodeFrom($nodeFrom = null, $comparison = null)
    {
        if (is_array($nodeFrom)) {
            $useMinMax = false;
            if (isset($nodeFrom['min'])) {
                $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_FROM, $nodeFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nodeFrom['max'])) {
                $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_FROM, $nodeFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_FROM, $nodeFrom, $comparison);
    }

    /**
     * Filter the query on the node_to column
     *
     * Example usage:
     * <code>
     * $query->filterByNodeTo(1234); // WHERE node_to = 1234
     * $query->filterByNodeTo(array(12, 34)); // WHERE node_to IN (12, 34)
     * $query->filterByNodeTo(array('min' => 12)); // WHERE node_to > 12
     * </code>
     *
     * @param     mixed $nodeTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNodeconnectionQuery The current query, for fluid interface
     */
    public function filterByNodeTo($nodeTo = null, $comparison = null)
    {
        if (is_array($nodeTo)) {
            $useMinMax = false;
            if (isset($nodeTo['min'])) {
                $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_TO, $nodeTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nodeTo['max'])) {
                $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_TO, $nodeTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NodeconnectionTableMap::COL_NODE_TO, $nodeTo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNodeconnection $nodeconnection Object to remove from the list of results
     *
     * @return $this|ChildNodeconnectionQuery The current query, for fluid interface
     */
    public function prune($nodeconnection = null)
    {
        if ($nodeconnection) {
            throw new LogicException('Nodeconnection object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the NodeConnection table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NodeconnectionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NodeconnectionTableMap::clearInstancePool();
            NodeconnectionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NodeconnectionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NodeconnectionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NodeconnectionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NodeconnectionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NodeconnectionQuery
