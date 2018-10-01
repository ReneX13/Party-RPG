<?php

namespace Base;

use \Chatroom as ChildChatroom;
use \ChatroomQuery as ChildChatroomQuery;
use \Exception;
use Map\ChatroomTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ChatRoom' table.
 *
 *
 *
 * @method     ChildChatroomQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChatroomQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildChatroomQuery orderByMessages($order = Criteria::ASC) Order by the messages column
 *
 * @method     ChildChatroomQuery groupById() Group by the id column
 * @method     ChildChatroomQuery groupByType() Group by the type column
 * @method     ChildChatroomQuery groupByMessages() Group by the messages column
 *
 * @method     ChildChatroomQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChatroomQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChatroomQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChatroomQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChatroomQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChatroomQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChatroom findOne(ConnectionInterface $con = null) Return the first ChildChatroom matching the query
 * @method     ChildChatroom findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChatroom matching the query, or a new ChildChatroom object populated from the query conditions when no match is found
 *
 * @method     ChildChatroom findOneById(int $id) Return the first ChildChatroom filtered by the id column
 * @method     ChildChatroom findOneByType(string $type) Return the first ChildChatroom filtered by the type column
 * @method     ChildChatroom findOneByMessages(string $messages) Return the first ChildChatroom filtered by the messages column *

 * @method     ChildChatroom requirePk($key, ConnectionInterface $con = null) Return the ChildChatroom by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatroom requireOne(ConnectionInterface $con = null) Return the first ChildChatroom matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatroom requireOneById(int $id) Return the first ChildChatroom filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatroom requireOneByType(string $type) Return the first ChildChatroom filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatroom requireOneByMessages(string $messages) Return the first ChildChatroom filtered by the messages column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatroom[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChatroom objects based on current ModelCriteria
 * @method     ChildChatroom[]|ObjectCollection findById(int $id) Return ChildChatroom objects filtered by the id column
 * @method     ChildChatroom[]|ObjectCollection findByType(string $type) Return ChildChatroom objects filtered by the type column
 * @method     ChildChatroom[]|ObjectCollection findByMessages(string $messages) Return ChildChatroom objects filtered by the messages column
 * @method     ChildChatroom[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChatroomQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ChatroomQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Chatroom', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChatroomQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChatroomQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChatroomQuery) {
            return $criteria;
        }
        $query = new ChildChatroomQuery();
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
     * @return ChildChatroom|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Chatroom object has no primary key');
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
        throw new LogicException('The Chatroom object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Chatroom object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Chatroom object has no primary key');
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
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChatroomTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChatroomTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatroomTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatroomTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the messages column
     *
     * Example usage:
     * <code>
     * $query->filterByMessages('fooValue');   // WHERE messages = 'fooValue'
     * $query->filterByMessages('%fooValue%', Criteria::LIKE); // WHERE messages LIKE '%fooValue%'
     * </code>
     *
     * @param     string $messages The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function filterByMessages($messages = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($messages)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatroomTableMap::COL_MESSAGES, $messages, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChatroom $chatroom Object to remove from the list of results
     *
     * @return $this|ChildChatroomQuery The current query, for fluid interface
     */
    public function prune($chatroom = null)
    {
        if ($chatroom) {
            throw new LogicException('Chatroom object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ChatRoom table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatroomTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChatroomTableMap::clearInstancePool();
            ChatroomTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChatroomTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChatroomTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChatroomTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChatroomTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChatroomQuery
