<?php

namespace Base;

use \Account as ChildAccount;
use \AccountQuery as ChildAccountQuery;
use \Exception;
use \PDO;
use Map\AccountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Account' table.
 *
 *
 *
 * @method     ChildAccountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAccountQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildAccountQuery orderByPasswordHash($order = Criteria::ASC) Order by the password_hash column
 * @method     ChildAccountQuery orderByLastActive($order = Criteria::ASC) Order by the last_active column
 * @method     ChildAccountQuery orderByGuildId($order = Criteria::ASC) Order by the guild_id column
 * @method     ChildAccountQuery orderByInventorySize($order = Criteria::ASC) Order by the inventory_size column
 * @method     ChildAccountQuery orderByGold($order = Criteria::ASC) Order by the gold column
 * @method     ChildAccountQuery orderByExperience($order = Criteria::ASC) Order by the experience column
 *
 * @method     ChildAccountQuery groupById() Group by the id column
 * @method     ChildAccountQuery groupByUsername() Group by the username column
 * @method     ChildAccountQuery groupByPasswordHash() Group by the password_hash column
 * @method     ChildAccountQuery groupByLastActive() Group by the last_active column
 * @method     ChildAccountQuery groupByGuildId() Group by the guild_id column
 * @method     ChildAccountQuery groupByInventorySize() Group by the inventory_size column
 * @method     ChildAccountQuery groupByGold() Group by the gold column
 * @method     ChildAccountQuery groupByExperience() Group by the experience column
 *
 * @method     ChildAccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAccountQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAccountQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAccountQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAccount findOne(ConnectionInterface $con = null) Return the first ChildAccount matching the query
 * @method     ChildAccount findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAccount matching the query, or a new ChildAccount object populated from the query conditions when no match is found
 *
 * @method     ChildAccount findOneById(int $id) Return the first ChildAccount filtered by the id column
 * @method     ChildAccount findOneByUsername(string $username) Return the first ChildAccount filtered by the username column
 * @method     ChildAccount findOneByPasswordHash(string $password_hash) Return the first ChildAccount filtered by the password_hash column
 * @method     ChildAccount findOneByLastActive(string $last_active) Return the first ChildAccount filtered by the last_active column
 * @method     ChildAccount findOneByGuildId(int $guild_id) Return the first ChildAccount filtered by the guild_id column
 * @method     ChildAccount findOneByInventorySize(int $inventory_size) Return the first ChildAccount filtered by the inventory_size column
 * @method     ChildAccount findOneByGold(int $gold) Return the first ChildAccount filtered by the gold column
 * @method     ChildAccount findOneByExperience(int $experience) Return the first ChildAccount filtered by the experience column *

 * @method     ChildAccount requirePk($key, ConnectionInterface $con = null) Return the ChildAccount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOne(ConnectionInterface $con = null) Return the first ChildAccount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccount requireOneById(int $id) Return the first ChildAccount filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByUsername(string $username) Return the first ChildAccount filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByPasswordHash(string $password_hash) Return the first ChildAccount filtered by the password_hash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByLastActive(string $last_active) Return the first ChildAccount filtered by the last_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByGuildId(int $guild_id) Return the first ChildAccount filtered by the guild_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByInventorySize(int $inventory_size) Return the first ChildAccount filtered by the inventory_size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByGold(int $gold) Return the first ChildAccount filtered by the gold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccount requireOneByExperience(int $experience) Return the first ChildAccount filtered by the experience column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccount[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAccount objects based on current ModelCriteria
 * @method     ChildAccount[]|ObjectCollection findById(int $id) Return ChildAccount objects filtered by the id column
 * @method     ChildAccount[]|ObjectCollection findByUsername(string $username) Return ChildAccount objects filtered by the username column
 * @method     ChildAccount[]|ObjectCollection findByPasswordHash(string $password_hash) Return ChildAccount objects filtered by the password_hash column
 * @method     ChildAccount[]|ObjectCollection findByLastActive(string $last_active) Return ChildAccount objects filtered by the last_active column
 * @method     ChildAccount[]|ObjectCollection findByGuildId(int $guild_id) Return ChildAccount objects filtered by the guild_id column
 * @method     ChildAccount[]|ObjectCollection findByInventorySize(int $inventory_size) Return ChildAccount objects filtered by the inventory_size column
 * @method     ChildAccount[]|ObjectCollection findByGold(int $gold) Return ChildAccount objects filtered by the gold column
 * @method     ChildAccount[]|ObjectCollection findByExperience(int $experience) Return ChildAccount objects filtered by the experience column
 * @method     ChildAccount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AccountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AccountQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Account', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAccountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAccountQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAccountQuery) {
            return $criteria;
        }
        $query = new ChildAccountQuery();
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
     * @return ChildAccount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AccountTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AccountTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAccount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, username, password_hash, last_active, guild_id, inventory_size, gold, experience FROM Account WHERE id = :p0';
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
            /** @var ChildAccount $obj */
            $obj = new ChildAccount();
            $obj->hydrate($row);
            AccountTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAccount|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccountTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccountTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswordHash('fooValue');   // WHERE password_hash = 'fooValue'
     * $query->filterByPasswordHash('%fooValue%', Criteria::LIKE); // WHERE password_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $passwordHash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByPasswordHash($passwordHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passwordHash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_PASSWORD_HASH, $passwordHash, $comparison);
    }

    /**
     * Filter the query on the last_active column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActive('2011-03-14'); // WHERE last_active = '2011-03-14'
     * $query->filterByLastActive('now'); // WHERE last_active = '2011-03-14'
     * $query->filterByLastActive(array('max' => 'yesterday')); // WHERE last_active > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActive The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByLastActive($lastActive = null, $comparison = null)
    {
        if (is_array($lastActive)) {
            $useMinMax = false;
            if (isset($lastActive['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_LAST_ACTIVE, $lastActive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActive['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_LAST_ACTIVE, $lastActive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_LAST_ACTIVE, $lastActive, $comparison);
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
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByGuildId($guildId = null, $comparison = null)
    {
        if (is_array($guildId)) {
            $useMinMax = false;
            if (isset($guildId['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_GUILD_ID, $guildId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guildId['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_GUILD_ID, $guildId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_GUILD_ID, $guildId, $comparison);
    }

    /**
     * Filter the query on the inventory_size column
     *
     * Example usage:
     * <code>
     * $query->filterByInventorySize(1234); // WHERE inventory_size = 1234
     * $query->filterByInventorySize(array(12, 34)); // WHERE inventory_size IN (12, 34)
     * $query->filterByInventorySize(array('min' => 12)); // WHERE inventory_size > 12
     * </code>
     *
     * @param     mixed $inventorySize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByInventorySize($inventorySize = null, $comparison = null)
    {
        if (is_array($inventorySize)) {
            $useMinMax = false;
            if (isset($inventorySize['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_INVENTORY_SIZE, $inventorySize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inventorySize['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_INVENTORY_SIZE, $inventorySize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_INVENTORY_SIZE, $inventorySize, $comparison);
    }

    /**
     * Filter the query on the gold column
     *
     * Example usage:
     * <code>
     * $query->filterByGold(1234); // WHERE gold = 1234
     * $query->filterByGold(array(12, 34)); // WHERE gold IN (12, 34)
     * $query->filterByGold(array('min' => 12)); // WHERE gold > 12
     * </code>
     *
     * @param     mixed $gold The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByGold($gold = null, $comparison = null)
    {
        if (is_array($gold)) {
            $useMinMax = false;
            if (isset($gold['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_GOLD, $gold['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gold['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_GOLD, $gold['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_GOLD, $gold, $comparison);
    }

    /**
     * Filter the query on the experience column
     *
     * Example usage:
     * <code>
     * $query->filterByExperience(1234); // WHERE experience = 1234
     * $query->filterByExperience(array(12, 34)); // WHERE experience IN (12, 34)
     * $query->filterByExperience(array('min' => 12)); // WHERE experience > 12
     * </code>
     *
     * @param     mixed $experience The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function filterByExperience($experience = null, $comparison = null)
    {
        if (is_array($experience)) {
            $useMinMax = false;
            if (isset($experience['min'])) {
                $this->addUsingAlias(AccountTableMap::COL_EXPERIENCE, $experience['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($experience['max'])) {
                $this->addUsingAlias(AccountTableMap::COL_EXPERIENCE, $experience['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountTableMap::COL_EXPERIENCE, $experience, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAccount $account Object to remove from the list of results
     *
     * @return $this|ChildAccountQuery The current query, for fluid interface
     */
    public function prune($account = null)
    {
        if ($account) {
            $this->addUsingAlias(AccountTableMap::COL_ID, $account->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Account table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccountTableMap::clearInstancePool();
            AccountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AccountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AccountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AccountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AccountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AccountQuery
