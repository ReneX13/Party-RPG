<?php

namespace Base;

use \Guild as ChildGuild;
use \GuildQuery as ChildGuildQuery;
use \Exception;
use Map\GuildTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Guild' table.
 *
 *
 *
 * @method     ChildGuildQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGuildQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildGuildQuery orderByNumberOfMembers($order = Criteria::ASC) Order by the number_of_members column
 * @method     ChildGuildQuery orderByChatRoomId($order = Criteria::ASC) Order by the chat_room_id column
 * @method     ChildGuildQuery orderByGuildLeaderId($order = Criteria::ASC) Order by the guild_leader_id column
 *
 * @method     ChildGuildQuery groupById() Group by the id column
 * @method     ChildGuildQuery groupByName() Group by the name column
 * @method     ChildGuildQuery groupByNumberOfMembers() Group by the number_of_members column
 * @method     ChildGuildQuery groupByChatRoomId() Group by the chat_room_id column
 * @method     ChildGuildQuery groupByGuildLeaderId() Group by the guild_leader_id column
 *
 * @method     ChildGuildQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGuildQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGuildQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGuildQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGuildQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGuildQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGuild findOne(ConnectionInterface $con = null) Return the first ChildGuild matching the query
 * @method     ChildGuild findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGuild matching the query, or a new ChildGuild object populated from the query conditions when no match is found
 *
 * @method     ChildGuild findOneById(int $id) Return the first ChildGuild filtered by the id column
 * @method     ChildGuild findOneByName(string $name) Return the first ChildGuild filtered by the name column
 * @method     ChildGuild findOneByNumberOfMembers(int $number_of_members) Return the first ChildGuild filtered by the number_of_members column
 * @method     ChildGuild findOneByChatRoomId(int $chat_room_id) Return the first ChildGuild filtered by the chat_room_id column
 * @method     ChildGuild findOneByGuildLeaderId(int $guild_leader_id) Return the first ChildGuild filtered by the guild_leader_id column *

 * @method     ChildGuild requirePk($key, ConnectionInterface $con = null) Return the ChildGuild by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild requireOne(ConnectionInterface $con = null) Return the first ChildGuild matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGuild requireOneById(int $id) Return the first ChildGuild filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild requireOneByName(string $name) Return the first ChildGuild filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild requireOneByNumberOfMembers(int $number_of_members) Return the first ChildGuild filtered by the number_of_members column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild requireOneByChatRoomId(int $chat_room_id) Return the first ChildGuild filtered by the chat_room_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGuild requireOneByGuildLeaderId(int $guild_leader_id) Return the first ChildGuild filtered by the guild_leader_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGuild[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGuild objects based on current ModelCriteria
 * @method     ChildGuild[]|ObjectCollection findById(int $id) Return ChildGuild objects filtered by the id column
 * @method     ChildGuild[]|ObjectCollection findByName(string $name) Return ChildGuild objects filtered by the name column
 * @method     ChildGuild[]|ObjectCollection findByNumberOfMembers(int $number_of_members) Return ChildGuild objects filtered by the number_of_members column
 * @method     ChildGuild[]|ObjectCollection findByChatRoomId(int $chat_room_id) Return ChildGuild objects filtered by the chat_room_id column
 * @method     ChildGuild[]|ObjectCollection findByGuildLeaderId(int $guild_leader_id) Return ChildGuild objects filtered by the guild_leader_id column
 * @method     ChildGuild[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GuildQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GuildQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Guild', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGuildQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGuildQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGuildQuery) {
            return $criteria;
        }
        $query = new ChildGuildQuery();
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
     * @return ChildGuild|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Guild object has no primary key');
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
        throw new LogicException('The Guild object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Guild object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Guild object has no primary key');
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
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GuildTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GuildTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuildTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuildTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the number_of_members column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberOfMembers(1234); // WHERE number_of_members = 1234
     * $query->filterByNumberOfMembers(array(12, 34)); // WHERE number_of_members IN (12, 34)
     * $query->filterByNumberOfMembers(array('min' => 12)); // WHERE number_of_members > 12
     * </code>
     *
     * @param     mixed $numberOfMembers The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByNumberOfMembers($numberOfMembers = null, $comparison = null)
    {
        if (is_array($numberOfMembers)) {
            $useMinMax = false;
            if (isset($numberOfMembers['min'])) {
                $this->addUsingAlias(GuildTableMap::COL_NUMBER_OF_MEMBERS, $numberOfMembers['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numberOfMembers['max'])) {
                $this->addUsingAlias(GuildTableMap::COL_NUMBER_OF_MEMBERS, $numberOfMembers['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuildTableMap::COL_NUMBER_OF_MEMBERS, $numberOfMembers, $comparison);
    }

    /**
     * Filter the query on the chat_room_id column
     *
     * Example usage:
     * <code>
     * $query->filterByChatRoomId(1234); // WHERE chat_room_id = 1234
     * $query->filterByChatRoomId(array(12, 34)); // WHERE chat_room_id IN (12, 34)
     * $query->filterByChatRoomId(array('min' => 12)); // WHERE chat_room_id > 12
     * </code>
     *
     * @param     mixed $chatRoomId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByChatRoomId($chatRoomId = null, $comparison = null)
    {
        if (is_array($chatRoomId)) {
            $useMinMax = false;
            if (isset($chatRoomId['min'])) {
                $this->addUsingAlias(GuildTableMap::COL_CHAT_ROOM_ID, $chatRoomId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chatRoomId['max'])) {
                $this->addUsingAlias(GuildTableMap::COL_CHAT_ROOM_ID, $chatRoomId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuildTableMap::COL_CHAT_ROOM_ID, $chatRoomId, $comparison);
    }

    /**
     * Filter the query on the guild_leader_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGuildLeaderId(1234); // WHERE guild_leader_id = 1234
     * $query->filterByGuildLeaderId(array(12, 34)); // WHERE guild_leader_id IN (12, 34)
     * $query->filterByGuildLeaderId(array('min' => 12)); // WHERE guild_leader_id > 12
     * </code>
     *
     * @param     mixed $guildLeaderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function filterByGuildLeaderId($guildLeaderId = null, $comparison = null)
    {
        if (is_array($guildLeaderId)) {
            $useMinMax = false;
            if (isset($guildLeaderId['min'])) {
                $this->addUsingAlias(GuildTableMap::COL_GUILD_LEADER_ID, $guildLeaderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guildLeaderId['max'])) {
                $this->addUsingAlias(GuildTableMap::COL_GUILD_LEADER_ID, $guildLeaderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuildTableMap::COL_GUILD_LEADER_ID, $guildLeaderId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGuild $guild Object to remove from the list of results
     *
     * @return $this|ChildGuildQuery The current query, for fluid interface
     */
    public function prune($guild = null)
    {
        if ($guild) {
            throw new LogicException('Guild object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Guild table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GuildTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GuildTableMap::clearInstancePool();
            GuildTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GuildTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GuildTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GuildTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GuildTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GuildQuery
