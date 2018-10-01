<?php

namespace Base;

use \Enemyability as ChildEnemyability;
use \EnemyabilityQuery as ChildEnemyabilityQuery;
use \Exception;
use Map\EnemyabilityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'EnemyAbility' table.
 *
 *
 *
 * @method     ChildEnemyabilityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEnemyabilityQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEnemyabilityQuery orderByElement($order = Criteria::ASC) Order by the element column
 * @method     ChildEnemyabilityQuery orderByEffect1($order = Criteria::ASC) Order by the effect_1 column
 * @method     ChildEnemyabilityQuery orderByEffect2($order = Criteria::ASC) Order by the effect_2 column
 * @method     ChildEnemyabilityQuery orderByEffect3($order = Criteria::ASC) Order by the effect_3 column
 * @method     ChildEnemyabilityQuery orderByStr($order = Criteria::ASC) Order by the str column
 * @method     ChildEnemyabilityQuery orderByDex($order = Criteria::ASC) Order by the dex column
 * @method     ChildEnemyabilityQuery orderByMag($order = Criteria::ASC) Order by the mag column
 * @method     ChildEnemyabilityQuery orderByDef($order = Criteria::ASC) Order by the def column
 * @method     ChildEnemyabilityQuery orderByEva($order = Criteria::ASC) Order by the eva column
 * @method     ChildEnemyabilityQuery orderByRes($order = Criteria::ASC) Order by the res column
 * @method     ChildEnemyabilityQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ChildEnemyabilityQuery groupById() Group by the id column
 * @method     ChildEnemyabilityQuery groupByName() Group by the name column
 * @method     ChildEnemyabilityQuery groupByElement() Group by the element column
 * @method     ChildEnemyabilityQuery groupByEffect1() Group by the effect_1 column
 * @method     ChildEnemyabilityQuery groupByEffect2() Group by the effect_2 column
 * @method     ChildEnemyabilityQuery groupByEffect3() Group by the effect_3 column
 * @method     ChildEnemyabilityQuery groupByStr() Group by the str column
 * @method     ChildEnemyabilityQuery groupByDex() Group by the dex column
 * @method     ChildEnemyabilityQuery groupByMag() Group by the mag column
 * @method     ChildEnemyabilityQuery groupByDef() Group by the def column
 * @method     ChildEnemyabilityQuery groupByEva() Group by the eva column
 * @method     ChildEnemyabilityQuery groupByRes() Group by the res column
 * @method     ChildEnemyabilityQuery groupByType() Group by the type column
 *
 * @method     ChildEnemyabilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEnemyabilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEnemyabilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEnemyabilityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEnemyabilityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEnemyabilityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEnemyability findOne(ConnectionInterface $con = null) Return the first ChildEnemyability matching the query
 * @method     ChildEnemyability findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEnemyability matching the query, or a new ChildEnemyability object populated from the query conditions when no match is found
 *
 * @method     ChildEnemyability findOneById(int $id) Return the first ChildEnemyability filtered by the id column
 * @method     ChildEnemyability findOneByName(int $name) Return the first ChildEnemyability filtered by the name column
 * @method     ChildEnemyability findOneByElement(int $element) Return the first ChildEnemyability filtered by the element column
 * @method     ChildEnemyability findOneByEffect1(int $effect_1) Return the first ChildEnemyability filtered by the effect_1 column
 * @method     ChildEnemyability findOneByEffect2(int $effect_2) Return the first ChildEnemyability filtered by the effect_2 column
 * @method     ChildEnemyability findOneByEffect3(int $effect_3) Return the first ChildEnemyability filtered by the effect_3 column
 * @method     ChildEnemyability findOneByStr(int $str) Return the first ChildEnemyability filtered by the str column
 * @method     ChildEnemyability findOneByDex(int $dex) Return the first ChildEnemyability filtered by the dex column
 * @method     ChildEnemyability findOneByMag(int $mag) Return the first ChildEnemyability filtered by the mag column
 * @method     ChildEnemyability findOneByDef(int $def) Return the first ChildEnemyability filtered by the def column
 * @method     ChildEnemyability findOneByEva(int $eva) Return the first ChildEnemyability filtered by the eva column
 * @method     ChildEnemyability findOneByRes(int $res) Return the first ChildEnemyability filtered by the res column
 * @method     ChildEnemyability findOneByType(string $type) Return the first ChildEnemyability filtered by the type column *

 * @method     ChildEnemyability requirePk($key, ConnectionInterface $con = null) Return the ChildEnemyability by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOne(ConnectionInterface $con = null) Return the first ChildEnemyability matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEnemyability requireOneById(int $id) Return the first ChildEnemyability filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByName(int $name) Return the first ChildEnemyability filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByElement(int $element) Return the first ChildEnemyability filtered by the element column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByEffect1(int $effect_1) Return the first ChildEnemyability filtered by the effect_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByEffect2(int $effect_2) Return the first ChildEnemyability filtered by the effect_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByEffect3(int $effect_3) Return the first ChildEnemyability filtered by the effect_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByStr(int $str) Return the first ChildEnemyability filtered by the str column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByDex(int $dex) Return the first ChildEnemyability filtered by the dex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByMag(int $mag) Return the first ChildEnemyability filtered by the mag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByDef(int $def) Return the first ChildEnemyability filtered by the def column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByEva(int $eva) Return the first ChildEnemyability filtered by the eva column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByRes(int $res) Return the first ChildEnemyability filtered by the res column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemyability requireOneByType(string $type) Return the first ChildEnemyability filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEnemyability[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEnemyability objects based on current ModelCriteria
 * @method     ChildEnemyability[]|ObjectCollection findById(int $id) Return ChildEnemyability objects filtered by the id column
 * @method     ChildEnemyability[]|ObjectCollection findByName(int $name) Return ChildEnemyability objects filtered by the name column
 * @method     ChildEnemyability[]|ObjectCollection findByElement(int $element) Return ChildEnemyability objects filtered by the element column
 * @method     ChildEnemyability[]|ObjectCollection findByEffect1(int $effect_1) Return ChildEnemyability objects filtered by the effect_1 column
 * @method     ChildEnemyability[]|ObjectCollection findByEffect2(int $effect_2) Return ChildEnemyability objects filtered by the effect_2 column
 * @method     ChildEnemyability[]|ObjectCollection findByEffect3(int $effect_3) Return ChildEnemyability objects filtered by the effect_3 column
 * @method     ChildEnemyability[]|ObjectCollection findByStr(int $str) Return ChildEnemyability objects filtered by the str column
 * @method     ChildEnemyability[]|ObjectCollection findByDex(int $dex) Return ChildEnemyability objects filtered by the dex column
 * @method     ChildEnemyability[]|ObjectCollection findByMag(int $mag) Return ChildEnemyability objects filtered by the mag column
 * @method     ChildEnemyability[]|ObjectCollection findByDef(int $def) Return ChildEnemyability objects filtered by the def column
 * @method     ChildEnemyability[]|ObjectCollection findByEva(int $eva) Return ChildEnemyability objects filtered by the eva column
 * @method     ChildEnemyability[]|ObjectCollection findByRes(int $res) Return ChildEnemyability objects filtered by the res column
 * @method     ChildEnemyability[]|ObjectCollection findByType(string $type) Return ChildEnemyability objects filtered by the type column
 * @method     ChildEnemyability[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EnemyabilityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EnemyabilityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Enemyability', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEnemyabilityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEnemyabilityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEnemyabilityQuery) {
            return $criteria;
        }
        $query = new ChildEnemyabilityQuery();
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
     * @return ChildEnemyability|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Enemyability object has no primary key');
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
        throw new LogicException('The Enemyability object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Enemyability object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Enemyability object has no primary key');
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName(1234); // WHERE name = 1234
     * $query->filterByName(array(12, 34)); // WHERE name IN (12, 34)
     * $query->filterByName(array('min' => 12)); // WHERE name > 12
     * </code>
     *
     * @param     mixed $name The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (is_array($name)) {
            $useMinMax = false;
            if (isset($name['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_NAME, $name['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($name['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_NAME, $name['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the element column
     *
     * Example usage:
     * <code>
     * $query->filterByElement(1234); // WHERE element = 1234
     * $query->filterByElement(array(12, 34)); // WHERE element IN (12, 34)
     * $query->filterByElement(array('min' => 12)); // WHERE element > 12
     * </code>
     *
     * @param     mixed $element The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByElement($element = null, $comparison = null)
    {
        if (is_array($element)) {
            $useMinMax = false;
            if (isset($element['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_ELEMENT, $element['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($element['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_ELEMENT, $element['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_ELEMENT, $element, $comparison);
    }

    /**
     * Filter the query on the effect_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByEffect1(1234); // WHERE effect_1 = 1234
     * $query->filterByEffect1(array(12, 34)); // WHERE effect_1 IN (12, 34)
     * $query->filterByEffect1(array('min' => 12)); // WHERE effect_1 > 12
     * </code>
     *
     * @param     mixed $effect1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByEffect1($effect1 = null, $comparison = null)
    {
        if (is_array($effect1)) {
            $useMinMax = false;
            if (isset($effect1['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_1, $effect1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect1['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_1, $effect1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_1, $effect1, $comparison);
    }

    /**
     * Filter the query on the effect_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByEffect2(1234); // WHERE effect_2 = 1234
     * $query->filterByEffect2(array(12, 34)); // WHERE effect_2 IN (12, 34)
     * $query->filterByEffect2(array('min' => 12)); // WHERE effect_2 > 12
     * </code>
     *
     * @param     mixed $effect2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByEffect2($effect2 = null, $comparison = null)
    {
        if (is_array($effect2)) {
            $useMinMax = false;
            if (isset($effect2['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_2, $effect2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect2['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_2, $effect2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_2, $effect2, $comparison);
    }

    /**
     * Filter the query on the effect_3 column
     *
     * Example usage:
     * <code>
     * $query->filterByEffect3(1234); // WHERE effect_3 = 1234
     * $query->filterByEffect3(array(12, 34)); // WHERE effect_3 IN (12, 34)
     * $query->filterByEffect3(array('min' => 12)); // WHERE effect_3 > 12
     * </code>
     *
     * @param     mixed $effect3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByEffect3($effect3 = null, $comparison = null)
    {
        if (is_array($effect3)) {
            $useMinMax = false;
            if (isset($effect3['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_3, $effect3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect3['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_3, $effect3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_EFFECT_3, $effect3, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByStr($str = null, $comparison = null)
    {
        if (is_array($str)) {
            $useMinMax = false;
            if (isset($str['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_STR, $str['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($str['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_STR, $str['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_STR, $str, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByDex($dex = null, $comparison = null)
    {
        if (is_array($dex)) {
            $useMinMax = false;
            if (isset($dex['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_DEX, $dex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dex['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_DEX, $dex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_DEX, $dex, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByMag($mag = null, $comparison = null)
    {
        if (is_array($mag)) {
            $useMinMax = false;
            if (isset($mag['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_MAG, $mag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mag['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_MAG, $mag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_MAG, $mag, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByDef($def = null, $comparison = null)
    {
        if (is_array($def)) {
            $useMinMax = false;
            if (isset($def['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_DEF, $def['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($def['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_DEF, $def['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_DEF, $def, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByEva($eva = null, $comparison = null)
    {
        if (is_array($eva)) {
            $useMinMax = false;
            if (isset($eva['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EVA, $eva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eva['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_EVA, $eva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_EVA, $eva, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByRes($res = null, $comparison = null)
    {
        if (is_array($res)) {
            $useMinMax = false;
            if (isset($res['min'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_RES, $res['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($res['max'])) {
                $this->addUsingAlias(EnemyabilityTableMap::COL_RES, $res['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_RES, $res, $comparison);
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
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyabilityTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEnemyability $enemyability Object to remove from the list of results
     *
     * @return $this|ChildEnemyabilityQuery The current query, for fluid interface
     */
    public function prune($enemyability = null)
    {
        if ($enemyability) {
            throw new LogicException('Enemyability object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the EnemyAbility table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyabilityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EnemyabilityTableMap::clearInstancePool();
            EnemyabilityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyabilityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EnemyabilityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EnemyabilityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EnemyabilityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EnemyabilityQuery
