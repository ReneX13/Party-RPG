<?php

namespace Base;

use \Mailbox as ChildMailbox;
use \MailboxQuery as ChildMailboxQuery;
use \Exception;
use Map\MailboxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Mailbox' table.
 *
 *
 *
 * @method     ChildMailboxQuery orderByTo($order = Criteria::ASC) Order by the to column
 * @method     ChildMailboxQuery orderByFrom($order = Criteria::ASC) Order by the from column
 * @method     ChildMailboxQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildMailboxQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 *
 * @method     ChildMailboxQuery groupByTo() Group by the to column
 * @method     ChildMailboxQuery groupByFrom() Group by the from column
 * @method     ChildMailboxQuery groupByMessage() Group by the message column
 * @method     ChildMailboxQuery groupByItemId() Group by the item_id column
 *
 * @method     ChildMailboxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMailboxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMailboxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMailboxQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMailboxQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMailboxQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMailbox findOne(ConnectionInterface $con = null) Return the first ChildMailbox matching the query
 * @method     ChildMailbox findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMailbox matching the query, or a new ChildMailbox object populated from the query conditions when no match is found
 *
 * @method     ChildMailbox findOneByTo(int $to) Return the first ChildMailbox filtered by the to column
 * @method     ChildMailbox findOneByFrom(int $from) Return the first ChildMailbox filtered by the from column
 * @method     ChildMailbox findOneByMessage(string $message) Return the first ChildMailbox filtered by the message column
 * @method     ChildMailbox findOneByItemId(int $item_id) Return the first ChildMailbox filtered by the item_id column *

 * @method     ChildMailbox requirePk($key, ConnectionInterface $con = null) Return the ChildMailbox by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMailbox requireOne(ConnectionInterface $con = null) Return the first ChildMailbox matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMailbox requireOneByTo(int $to) Return the first ChildMailbox filtered by the to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMailbox requireOneByFrom(int $from) Return the first ChildMailbox filtered by the from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMailbox requireOneByMessage(string $message) Return the first ChildMailbox filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMailbox requireOneByItemId(int $item_id) Return the first ChildMailbox filtered by the item_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMailbox[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMailbox objects based on current ModelCriteria
 * @method     ChildMailbox[]|ObjectCollection findByTo(int $to) Return ChildMailbox objects filtered by the to column
 * @method     ChildMailbox[]|ObjectCollection findByFrom(int $from) Return ChildMailbox objects filtered by the from column
 * @method     ChildMailbox[]|ObjectCollection findByMessage(string $message) Return ChildMailbox objects filtered by the message column
 * @method     ChildMailbox[]|ObjectCollection findByItemId(int $item_id) Return ChildMailbox objects filtered by the item_id column
 * @method     ChildMailbox[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MailboxQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MailboxQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Mailbox', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMailboxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMailboxQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMailboxQuery) {
            return $criteria;
        }
        $query = new ChildMailboxQuery();
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
     * @return ChildMailbox|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Mailbox object has no primary key');
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
        throw new LogicException('The Mailbox object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Mailbox object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Mailbox object has no primary key');
    }

    /**
     * Filter the query on the to column
     *
     * Example usage:
     * <code>
     * $query->filterByTo(1234); // WHERE to = 1234
     * $query->filterByTo(array(12, 34)); // WHERE to IN (12, 34)
     * $query->filterByTo(array('min' => 12)); // WHERE to > 12
     * </code>
     *
     * @param     mixed $to The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByTo($to = null, $comparison = null)
    {
        if (is_array($to)) {
            $useMinMax = false;
            if (isset($to['min'])) {
                $this->addUsingAlias(MailboxTableMap::COL_TO, $to['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($to['max'])) {
                $this->addUsingAlias(MailboxTableMap::COL_TO, $to['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MailboxTableMap::COL_TO, $to, $comparison);
    }

    /**
     * Filter the query on the from column
     *
     * Example usage:
     * <code>
     * $query->filterByFrom(1234); // WHERE from = 1234
     * $query->filterByFrom(array(12, 34)); // WHERE from IN (12, 34)
     * $query->filterByFrom(array('min' => 12)); // WHERE from > 12
     * </code>
     *
     * @param     mixed $from The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByFrom($from = null, $comparison = null)
    {
        if (is_array($from)) {
            $useMinMax = false;
            if (isset($from['min'])) {
                $this->addUsingAlias(MailboxTableMap::COL_FROM, $from['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($from['max'])) {
                $this->addUsingAlias(MailboxTableMap::COL_FROM, $from['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MailboxTableMap::COL_FROM, $from, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MailboxTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (is_array($itemId)) {
            $useMinMax = false;
            if (isset($itemId['min'])) {
                $this->addUsingAlias(MailboxTableMap::COL_ITEM_ID, $itemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemId['max'])) {
                $this->addUsingAlias(MailboxTableMap::COL_ITEM_ID, $itemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MailboxTableMap::COL_ITEM_ID, $itemId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMailbox $mailbox Object to remove from the list of results
     *
     * @return $this|ChildMailboxQuery The current query, for fluid interface
     */
    public function prune($mailbox = null)
    {
        if ($mailbox) {
            throw new LogicException('Mailbox object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Mailbox table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MailboxTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MailboxTableMap::clearInstancePool();
            MailboxTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MailboxTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MailboxTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MailboxTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MailboxTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MailboxQuery
