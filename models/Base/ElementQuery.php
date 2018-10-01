<?php

namespace Base;

use \Element as ChildElement;
use \ElementQuery as ChildElementQuery;
use \Exception;
use \PDO;
use Map\ElementTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Element' table.
 *
 *
 *
 * @method     ChildElementQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildElementQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildElementQuery orderByWeakness($order = Criteria::ASC) Order by the weakness column
 * @method     ChildElementQuery orderByStrongAgainst($order = Criteria::ASC) Order by the strong_against column
 *
 * @method     ChildElementQuery groupById() Group by the id column
 * @method     ChildElementQuery groupByName() Group by the name column
 * @method     ChildElementQuery groupByWeakness() Group by the weakness column
 * @method     ChildElementQuery groupByStrongAgainst() Group by the strong_against column
 *
 * @method     ChildElementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildElementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildElementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildElementQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildElementQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildElementQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildElement findOne(ConnectionInterface $con = null) Return the first ChildElement matching the query
 * @method     ChildElement findOneOrCreate(ConnectionInterface $con = null) Return the first ChildElement matching the query, or a new ChildElement object populated from the query conditions when no match is found
 *
 * @method     ChildElement findOneById(int $id) Return the first ChildElement filtered by the id column
 * @method     ChildElement findOneByName(string $name) Return the first ChildElement filtered by the name column
 * @method     ChildElement findOneByWeakness(int $weakness) Return the first ChildElement filtered by the weakness column
 * @method     ChildElement findOneByStrongAgainst(int $strong_against) Return the first ChildElement filtered by the strong_against column *

 * @method     ChildElement requirePk($key, ConnectionInterface $con = null) Return the ChildElement by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElement requireOne(ConnectionInterface $con = null) Return the first ChildElement matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElement requireOneById(int $id) Return the first ChildElement filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElement requireOneByName(string $name) Return the first ChildElement filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElement requireOneByWeakness(int $weakness) Return the first ChildElement filtered by the weakness column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElement requireOneByStrongAgainst(int $strong_against) Return the first ChildElement filtered by the strong_against column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElement[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildElement objects based on current ModelCriteria
 * @method     ChildElement[]|ObjectCollection findById(int $id) Return ChildElement objects filtered by the id column
 * @method     ChildElement[]|ObjectCollection findByName(string $name) Return ChildElement objects filtered by the name column
 * @method     ChildElement[]|ObjectCollection findByWeakness(int $weakness) Return ChildElement objects filtered by the weakness column
 * @method     ChildElement[]|ObjectCollection findByStrongAgainst(int $strong_against) Return ChildElement objects filtered by the strong_against column
 * @method     ChildElement[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ElementQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ElementQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Element', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildElementQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildElementQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildElementQuery) {
            return $criteria;
        }
        $query = new ChildElementQuery();
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
     * @return ChildElement|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ElementTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ElementTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildElement A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, weakness, strong_against FROM Element WHERE id = :p0';
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
            /** @var ChildElement $obj */
            $obj = new ChildElement();
            $obj->hydrate($row);
            ElementTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildElement|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ElementTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ElementTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the weakness column
     *
     * Example usage:
     * <code>
     * $query->filterByWeakness(1234); // WHERE weakness = 1234
     * $query->filterByWeakness(array(12, 34)); // WHERE weakness IN (12, 34)
     * $query->filterByWeakness(array('min' => 12)); // WHERE weakness > 12
     * </code>
     *
     * @param     mixed $weakness The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterByWeakness($weakness = null, $comparison = null)
    {
        if (is_array($weakness)) {
            $useMinMax = false;
            if (isset($weakness['min'])) {
                $this->addUsingAlias(ElementTableMap::COL_WEAKNESS, $weakness['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weakness['max'])) {
                $this->addUsingAlias(ElementTableMap::COL_WEAKNESS, $weakness['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementTableMap::COL_WEAKNESS, $weakness, $comparison);
    }

    /**
     * Filter the query on the strong_against column
     *
     * Example usage:
     * <code>
     * $query->filterByStrongAgainst(1234); // WHERE strong_against = 1234
     * $query->filterByStrongAgainst(array(12, 34)); // WHERE strong_against IN (12, 34)
     * $query->filterByStrongAgainst(array('min' => 12)); // WHERE strong_against > 12
     * </code>
     *
     * @param     mixed $strongAgainst The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function filterByStrongAgainst($strongAgainst = null, $comparison = null)
    {
        if (is_array($strongAgainst)) {
            $useMinMax = false;
            if (isset($strongAgainst['min'])) {
                $this->addUsingAlias(ElementTableMap::COL_STRONG_AGAINST, $strongAgainst['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($strongAgainst['max'])) {
                $this->addUsingAlias(ElementTableMap::COL_STRONG_AGAINST, $strongAgainst['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementTableMap::COL_STRONG_AGAINST, $strongAgainst, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildElement $element Object to remove from the list of results
     *
     * @return $this|ChildElementQuery The current query, for fluid interface
     */
    public function prune($element = null)
    {
        if ($element) {
            $this->addUsingAlias(ElementTableMap::COL_ID, $element->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Element table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ElementTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ElementTableMap::clearInstancePool();
            ElementTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ElementTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ElementTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ElementTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ElementTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ElementQuery
