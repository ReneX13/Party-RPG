<?php

namespace Base;

use \Class as ChildClass;
use \ClassQuery as ChildClassQuery;
use \Exception;
use Map\ClassTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Class' table.
 *
 *
 *
 * @method     ChildClassQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClassQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildClassQuery orderByStr($order = Criteria::ASC) Order by the str column
 * @method     ChildClassQuery orderByDex($order = Criteria::ASC) Order by the dex column
 * @method     ChildClassQuery orderByMag($order = Criteria::ASC) Order by the mag column
 * @method     ChildClassQuery orderByDef($order = Criteria::ASC) Order by the def column
 * @method     ChildClassQuery orderByEva($order = Criteria::ASC) Order by the eva column
 * @method     ChildClassQuery orderByRes($order = Criteria::ASC) Order by the res column
 *
 * @method     ChildClassQuery groupById() Group by the id column
 * @method     ChildClassQuery groupByName() Group by the name column
 * @method     ChildClassQuery groupByStr() Group by the str column
 * @method     ChildClassQuery groupByDex() Group by the dex column
 * @method     ChildClassQuery groupByMag() Group by the mag column
 * @method     ChildClassQuery groupByDef() Group by the def column
 * @method     ChildClassQuery groupByEva() Group by the eva column
 * @method     ChildClassQuery groupByRes() Group by the res column
 *
 * @method     ChildClassQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClassQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClassQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClassQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClassQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClassQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClass findOne(ConnectionInterface $con = null) Return the first ChildClass matching the query
 * @method     ChildClass findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClass matching the query, or a new ChildClass object populated from the query conditions when no match is found
 *
 * @method     ChildClass findOneById(int $id) Return the first ChildClass filtered by the id column
 * @method     ChildClass findOneByName(string $name) Return the first ChildClass filtered by the name column
 * @method     ChildClass findOneByStr(int $str) Return the first ChildClass filtered by the str column
 * @method     ChildClass findOneByDex(int $dex) Return the first ChildClass filtered by the dex column
 * @method     ChildClass findOneByMag(int $mag) Return the first ChildClass filtered by the mag column
 * @method     ChildClass findOneByDef(int $def) Return the first ChildClass filtered by the def column
 * @method     ChildClass findOneByEva(int $eva) Return the first ChildClass filtered by the eva column
 * @method     ChildClass findOneByRes(int $res) Return the first ChildClass filtered by the res column *

 * @method     ChildClass requirePk($key, ConnectionInterface $con = null) Return the ChildClass by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOne(ConnectionInterface $con = null) Return the first ChildClass matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClass requireOneById(int $id) Return the first ChildClass filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByName(string $name) Return the first ChildClass filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByStr(int $str) Return the first ChildClass filtered by the str column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByDex(int $dex) Return the first ChildClass filtered by the dex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByMag(int $mag) Return the first ChildClass filtered by the mag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByDef(int $def) Return the first ChildClass filtered by the def column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByEva(int $eva) Return the first ChildClass filtered by the eva column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByRes(int $res) Return the first ChildClass filtered by the res column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClass[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClass objects based on current ModelCriteria
 * @method     ChildClass[]|ObjectCollection findById(int $id) Return ChildClass objects filtered by the id column
 * @method     ChildClass[]|ObjectCollection findByName(string $name) Return ChildClass objects filtered by the name column
 * @method     ChildClass[]|ObjectCollection findByStr(int $str) Return ChildClass objects filtered by the str column
 * @method     ChildClass[]|ObjectCollection findByDex(int $dex) Return ChildClass objects filtered by the dex column
 * @method     ChildClass[]|ObjectCollection findByMag(int $mag) Return ChildClass objects filtered by the mag column
 * @method     ChildClass[]|ObjectCollection findByDef(int $def) Return ChildClass objects filtered by the def column
 * @method     ChildClass[]|ObjectCollection findByEva(int $eva) Return ChildClass objects filtered by the eva column
 * @method     ChildClass[]|ObjectCollection findByRes(int $res) Return ChildClass objects filtered by the res column
 * @method     ChildClass[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClassQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClassQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Class', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClassQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClassQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClassQuery) {
            return $criteria;
        }
        $query = new ChildClassQuery();
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
     * @return ChildClass|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Class object has no primary key');
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
        throw new LogicException('The Class object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Class object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Class object has no primary key');
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
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the str column
     *
     * Example usage:
     * <code>
     * $query->filterByStr(1234); // WHERE str = 1234
     * $query->filterByStr(array(12, 34)); // WHERE str IN (12, 34)
     * $query->filterByStr(array('min' => 12)); // WHERE str > 12
     * </code>
     *
     * @param     mixed $str The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByStr($str = null, $comparison = null)
    {
        if (is_array($str)) {
            $useMinMax = false;
            if (isset($str['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_STR, $str['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($str['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_STR, $str['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_STR, $str, $comparison);
    }

    /**
     * Filter the query on the dex column
     *
     * Example usage:
     * <code>
     * $query->filterByDex(1234); // WHERE dex = 1234
     * $query->filterByDex(array(12, 34)); // WHERE dex IN (12, 34)
     * $query->filterByDex(array('min' => 12)); // WHERE dex > 12
     * </code>
     *
     * @param     mixed $dex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByDex($dex = null, $comparison = null)
    {
        if (is_array($dex)) {
            $useMinMax = false;
            if (isset($dex['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_DEX, $dex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dex['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_DEX, $dex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_DEX, $dex, $comparison);
    }

    /**
     * Filter the query on the mag column
     *
     * Example usage:
     * <code>
     * $query->filterByMag(1234); // WHERE mag = 1234
     * $query->filterByMag(array(12, 34)); // WHERE mag IN (12, 34)
     * $query->filterByMag(array('min' => 12)); // WHERE mag > 12
     * </code>
     *
     * @param     mixed $mag The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByMag($mag = null, $comparison = null)
    {
        if (is_array($mag)) {
            $useMinMax = false;
            if (isset($mag['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_MAG, $mag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mag['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_MAG, $mag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_MAG, $mag, $comparison);
    }

    /**
     * Filter the query on the def column
     *
     * Example usage:
     * <code>
     * $query->filterByDef(1234); // WHERE def = 1234
     * $query->filterByDef(array(12, 34)); // WHERE def IN (12, 34)
     * $query->filterByDef(array('min' => 12)); // WHERE def > 12
     * </code>
     *
     * @param     mixed $def The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByDef($def = null, $comparison = null)
    {
        if (is_array($def)) {
            $useMinMax = false;
            if (isset($def['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_DEF, $def['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($def['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_DEF, $def['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_DEF, $def, $comparison);
    }

    /**
     * Filter the query on the eva column
     *
     * Example usage:
     * <code>
     * $query->filterByEva(1234); // WHERE eva = 1234
     * $query->filterByEva(array(12, 34)); // WHERE eva IN (12, 34)
     * $query->filterByEva(array('min' => 12)); // WHERE eva > 12
     * </code>
     *
     * @param     mixed $eva The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByEva($eva = null, $comparison = null)
    {
        if (is_array($eva)) {
            $useMinMax = false;
            if (isset($eva['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_EVA, $eva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eva['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_EVA, $eva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_EVA, $eva, $comparison);
    }

    /**
     * Filter the query on the res column
     *
     * Example usage:
     * <code>
     * $query->filterByRes(1234); // WHERE res = 1234
     * $query->filterByRes(array(12, 34)); // WHERE res IN (12, 34)
     * $query->filterByRes(array('min' => 12)); // WHERE res > 12
     * </code>
     *
     * @param     mixed $res The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByRes($res = null, $comparison = null)
    {
        if (is_array($res)) {
            $useMinMax = false;
            if (isset($res['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_RES, $res['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($res['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_RES, $res['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_RES, $res, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClass $class Object to remove from the list of results
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function prune($class = null)
    {
        if ($class) {
            throw new LogicException('Class object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Class table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClassTableMap::clearInstancePool();
            ClassTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClassTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClassTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClassTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClassQuery
