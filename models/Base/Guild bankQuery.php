<?php

namespace Base;

use \Guild bank as ChildGuild bank;
use \Guild bankQuery as ChildGuild bankQuery;
use \Exception;
use Map\Guild bankTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Guild Bank' table.
 *
 *
 *
 * @method     ChildGuild bankQuery orderByGuildId($order = Criteria::ASC) Order by the guild_id column
 * @method     ChildGuild bankQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 *
 * @method     ChildGuild bankQuery groupByGuildId() Group by the guild_id column
 * @method     ChildGuild bankQuery groupByItemId() Group by the item_id column
 *
 * @method     ChildGuild bankQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGuild bankQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGuild bankQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGuild bankQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGuild bankQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGuild bankQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGuild bank findOne(ConnectionInterface $con = null) Return the first ChildGuild bank matching the query
 * @method     ChildGuild bank findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGuild bank matching the query, or a new ChildGuild bank object populated from the query conditions when no match is found
 *
 * @method     ChildGuild bank findOneByGuildId(int $guild_id) Return the first ChildGuild bank filtered by the guild_id column
 * @method     ChildGuild bank findOneByItemId(int $item_id) Return the first ChildGuild bank filtered by the item_id column *

 * @method     ChildGuild bank requirePk($key, ConnectionInterface $con = null) Return the ChildGuild bank by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild bank requireOne(ConnectionInterface $con = null) Return the first ChildGuild bank matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGuild bank requireOneByGuildId(int $guild_id) Return the first ChildGuild bank filtered by the guild_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild bank requireOneByItemId(int $item_id) Return the first ChildGuild bank filtered by the item_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGuild bank[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGuild bank objects based on current ModelCriteria
 * @method     ChildGuild bank[]|ObjectCollection findByGuildId(int $guild_id) Return ChildGuild bank objects filtered by the guild_id column
 * @method     ChildGuild bank[]|ObjectCollection findByItemId(int $item_id) Return ChildGuild bank objects filtered by the item_id column
 * @method     ChildGuild bank[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class Guild bankQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\Guild bankQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Guild bank', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGuild bankQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGuild bankQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGuild bankQuery) {
            return $criteria;
        }
        $query = new ChildGuild bankQuery();
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
     * @return ChildGuild bank|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Guild bank object has no primary key');
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
        throw new LogicException('The Guild bank object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGuild bankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Guild bank object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGuild bankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Guild bank object has no primary key');
    }

    /**
     * Filter the query on the guild_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGuildId(1234); // WHERE guild_id = 1234
     * $query->filterByGuildId(array(12, 34)); // WHERE guild_id IN (12, 34)
     * $query->filterByGuildId(array('min' => 12)); // WHERE guild_id > 12
     * </code>
     *
     * @param     mixed $guildId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGuild bankQuery The current query, for fluid interface
     */
    public function filterByGuildId($guildId = null, $comparison = null)
    {
        if (is_array($guildId)) {
            $useMinMax = false;
            if (isset($guildId['min'])) {
                $this->addUsingAlias(Guild bankTableMap::COL_GUILD_ID, $guildId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guildId['max'])) {
                $this->addUsingAlias(Guild bankTableMap::COL_GUILD_ID, $guildId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Guild bankTableMap::COL_GUILD_ID, $guildId, $comparison);
    }

    /**
     * Filter the query on the item_id column
     *
     * Example usage:
     * <code>
     * $query->filterByItemId(1234); // WHERE item_id = 1234
     * $query->filterByItemId(array(12, 34)); // WHERE item_id IN (12, 34)
     * $query->filterByItemId(array('min' => 12)); // WHERE item_id > 12
     * </code>
     *
     * @param     mixed $itemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGuild bankQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (is_array($itemId)) {
            $useMinMax = false;
            if (isset($itemId['min'])) {
                $this->addUsingAlias(Guild bankTableMap::COL_ITEM_ID, $itemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemId['max'])) {
                $this->addUsingAlias(Guild bankTableMap::COL_ITEM_ID, $itemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Guild bankTableMap::COL_ITEM_ID, $itemId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGuild bank $guild bank Object to remove from the list of results
     *
     * @return $this|ChildGuild bankQuery The current query, for fluid interface
     */
    public function prune($guild bank = null)
    {
        if ($guild bank) {
            throw new LogicException('Guild bank object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Guild Bank table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Guild bankTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Guild bankTableMap::clearInstancePool();
            Guild bankTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(Guild bankTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(Guild bankTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            Guild bankTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            Guild bankTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // Guild bankQuery
