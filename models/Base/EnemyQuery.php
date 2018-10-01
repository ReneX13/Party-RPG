<?php

namespace Base;

use \Enemy as ChildEnemy;
use \EnemyQuery as ChildEnemyQuery;
use \Exception;
use Map\EnemyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Enemy' table.
 *
 *
 *
 * @method     ChildEnemyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEnemyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEnemyQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildEnemyQuery orderByAbility1($order = Criteria::ASC) Order by the ability_1 column
 * @method     ChildEnemyQuery orderByAbility2($order = Criteria::ASC) Order by the ability_2 column
 * @method     ChildEnemyQuery orderByAbility3($order = Criteria::ASC) Order by the ability_3 column
 * @method     ChildEnemyQuery orderByStr($order = Criteria::ASC) Order by the str column
 * @method     ChildEnemyQuery orderByDex($order = Criteria::ASC) Order by the dex column
 * @method     ChildEnemyQuery orderByMag($order = Criteria::ASC) Order by the mag column
 * @method     ChildEnemyQuery orderByDef($order = Criteria::ASC) Order by the def column
 * @method     ChildEnemyQuery orderByEva($order = Criteria::ASC) Order by the eva column
 * @method     ChildEnemyQuery orderByRes($order = Criteria::ASC) Order by the res column
 * @method     ChildEnemyQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 *
 * @method     ChildEnemyQuery groupById() Group by the id column
 * @method     ChildEnemyQuery groupByName() Group by the name column
 * @method     ChildEnemyQuery groupByLevel() Group by the level column
 * @method     ChildEnemyQuery groupByAbility1() Group by the ability_1 column
 * @method     ChildEnemyQuery groupByAbility2() Group by the ability_2 column
 * @method     ChildEnemyQuery groupByAbility3() Group by the ability_3 column
 * @method     ChildEnemyQuery groupByStr() Group by the str column
 * @method     ChildEnemyQuery groupByDex() Group by the dex column
 * @method     ChildEnemyQuery groupByMag() Group by the mag column
 * @method     ChildEnemyQuery groupByDef() Group by the def column
 * @method     ChildEnemyQuery groupByEva() Group by the eva column
 * @method     ChildEnemyQuery groupByRes() Group by the res column
 * @method     ChildEnemyQuery groupByRegionId() Group by the region_id column
 *
 * @method     ChildEnemyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEnemyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEnemyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEnemyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEnemyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEnemyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEnemy findOne(ConnectionInterface $con = null) Return the first ChildEnemy matching the query
 * @method     ChildEnemy findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEnemy matching the query, or a new ChildEnemy object populated from the query conditions when no match is found
 *
 * @method     ChildEnemy findOneById(int $id) Return the first ChildEnemy filtered by the id column
 * @method     ChildEnemy findOneByName(string $name) Return the first ChildEnemy filtered by the name column
 * @method     ChildEnemy findOneByLevel(int $level) Return the first ChildEnemy filtered by the level column
 * @method     ChildEnemy findOneByAbility1(int $ability_1) Return the first ChildEnemy filtered by the ability_1 column
 * @method     ChildEnemy findOneByAbility2(int $ability_2) Return the first ChildEnemy filtered by the ability_2 column
 * @method     ChildEnemy findOneByAbility3(int $ability_3) Return the first ChildEnemy filtered by the ability_3 column
 * @method     ChildEnemy findOneByStr(int $str) Return the first ChildEnemy filtered by the str column
 * @method     ChildEnemy findOneByDex(int $dex) Return the first ChildEnemy filtered by the dex column
 * @method     ChildEnemy findOneByMag(int $mag) Return the first ChildEnemy filtered by the mag column
 * @method     ChildEnemy findOneByDef(int $def) Return the first ChildEnemy filtered by the def column
 * @method     ChildEnemy findOneByEva(int $eva) Return the first ChildEnemy filtered by the eva column
 * @method     ChildEnemy findOneByRes(int $res) Return the first ChildEnemy filtered by the res column
 * @method     ChildEnemy findOneByRegionId(int $region_id) Return the first ChildEnemy filtered by the region_id column *

 * @method     ChildEnemy requirePk($key, ConnectionInterface $con = null) Return the ChildEnemy by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOne(ConnectionInterface $con = null) Return the first ChildEnemy matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEnemy requireOneById(int $id) Return the first ChildEnemy filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByName(string $name) Return the first ChildEnemy filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByLevel(int $level) Return the first ChildEnemy filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByAbility1(int $ability_1) Return the first ChildEnemy filtered by the ability_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByAbility2(int $ability_2) Return the first ChildEnemy filtered by the ability_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByAbility3(int $ability_3) Return the first ChildEnemy filtered by the ability_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByStr(int $str) Return the first ChildEnemy filtered by the str column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByDex(int $dex) Return the first ChildEnemy filtered by the dex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByMag(int $mag) Return the first ChildEnemy filtered by the mag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByDef(int $def) Return the first ChildEnemy filtered by the def column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByEva(int $eva) Return the first ChildEnemy filtered by the eva column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByRes(int $res) Return the first ChildEnemy filtered by the res column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEnemy requireOneByRegionId(int $region_id) Return the first ChildEnemy filtered by the region_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEnemy[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEnemy objects based on current ModelCriteria
 * @method     ChildEnemy[]|ObjectCollection findById(int $id) Return ChildEnemy objects filtered by the id column
 * @method     ChildEnemy[]|ObjectCollection findByName(string $name) Return ChildEnemy objects filtered by the name column
 * @method     ChildEnemy[]|ObjectCollection findByLevel(int $level) Return ChildEnemy objects filtered by the level column
 * @method     ChildEnemy[]|ObjectCollection findByAbility1(int $ability_1) Return ChildEnemy objects filtered by the ability_1 column
 * @method     ChildEnemy[]|ObjectCollection findByAbility2(int $ability_2) Return ChildEnemy objects filtered by the ability_2 column
 * @method     ChildEnemy[]|ObjectCollection findByAbility3(int $ability_3) Return ChildEnemy objects filtered by the ability_3 column
 * @method     ChildEnemy[]|ObjectCollection findByStr(int $str) Return ChildEnemy objects filtered by the str column
 * @method     ChildEnemy[]|ObjectCollection findByDex(int $dex) Return ChildEnemy objects filtered by the dex column
 * @method     ChildEnemy[]|ObjectCollection findByMag(int $mag) Return ChildEnemy objects filtered by the mag column
 * @method     ChildEnemy[]|ObjectCollection findByDef(int $def) Return ChildEnemy objects filtered by the def column
 * @method     ChildEnemy[]|ObjectCollection findByEva(int $eva) Return ChildEnemy objects filtered by the eva column
 * @method     ChildEnemy[]|ObjectCollection findByRes(int $res) Return ChildEnemy objects filtered by the res column
 * @method     ChildEnemy[]|ObjectCollection findByRegionId(int $region_id) Return ChildEnemy objects filtered by the region_id column
 * @method     ChildEnemy[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EnemyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EnemyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Enemy', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEnemyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEnemyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEnemyQuery) {
            return $criteria;
        }
        $query = new ChildEnemyQuery();
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
     * @return ChildEnemy|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Enemy object has no primary key');
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
        throw new LogicException('The Enemy object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Enemy object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Enemy object has no primary key');
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the ability_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAbility1(1234); // WHERE ability_1 = 1234
     * $query->filterByAbility1(array(12, 34)); // WHERE ability_1 IN (12, 34)
     * $query->filterByAbility1(array('min' => 12)); // WHERE ability_1 > 12
     * </code>
     *
     * @param     mixed $ability1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByAbility1($ability1 = null, $comparison = null)
    {
        if (is_array($ability1)) {
            $useMinMax = false;
            if (isset($ability1['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_1, $ability1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability1['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_1, $ability1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_ABILITY_1, $ability1, $comparison);
    }

    /**
     * Filter the query on the ability_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAbility2(1234); // WHERE ability_2 = 1234
     * $query->filterByAbility2(array(12, 34)); // WHERE ability_2 IN (12, 34)
     * $query->filterByAbility2(array('min' => 12)); // WHERE ability_2 > 12
     * </code>
     *
     * @param     mixed $ability2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByAbility2($ability2 = null, $comparison = null)
    {
        if (is_array($ability2)) {
            $useMinMax = false;
            if (isset($ability2['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_2, $ability2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability2['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_2, $ability2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_ABILITY_2, $ability2, $comparison);
    }

    /**
     * Filter the query on the ability_3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAbility3(1234); // WHERE ability_3 = 1234
     * $query->filterByAbility3(array(12, 34)); // WHERE ability_3 IN (12, 34)
     * $query->filterByAbility3(array('min' => 12)); // WHERE ability_3 > 12
     * </code>
     *
     * @param     mixed $ability3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByAbility3($ability3 = null, $comparison = null)
    {
        if (is_array($ability3)) {
            $useMinMax = false;
            if (isset($ability3['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_3, $ability3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability3['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_ABILITY_3, $ability3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_ABILITY_3, $ability3, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByStr($str = null, $comparison = null)
    {
        if (is_array($str)) {
            $useMinMax = false;
            if (isset($str['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_STR, $str['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($str['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_STR, $str['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_STR, $str, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByDex($dex = null, $comparison = null)
    {
        if (is_array($dex)) {
            $useMinMax = false;
            if (isset($dex['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_DEX, $dex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dex['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_DEX, $dex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_DEX, $dex, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByMag($mag = null, $comparison = null)
    {
        if (is_array($mag)) {
            $useMinMax = false;
            if (isset($mag['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_MAG, $mag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mag['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_MAG, $mag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_MAG, $mag, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByDef($def = null, $comparison = null)
    {
        if (is_array($def)) {
            $useMinMax = false;
            if (isset($def['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_DEF, $def['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($def['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_DEF, $def['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_DEF, $def, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByEva($eva = null, $comparison = null)
    {
        if (is_array($eva)) {
            $useMinMax = false;
            if (isset($eva['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_EVA, $eva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eva['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_EVA, $eva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_EVA, $eva, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByRes($res = null, $comparison = null)
    {
        if (is_array($res)) {
            $useMinMax = false;
            if (isset($res['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_RES, $res['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($res['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_RES, $res['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_RES, $res, $comparison);
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
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (is_array($regionId)) {
            $useMinMax = false;
            if (isset($regionId['min'])) {
                $this->addUsingAlias(EnemyTableMap::COL_REGION_ID, $regionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regionId['max'])) {
                $this->addUsingAlias(EnemyTableMap::COL_REGION_ID, $regionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnemyTableMap::COL_REGION_ID, $regionId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEnemy $enemy Object to remove from the list of results
     *
     * @return $this|ChildEnemyQuery The current query, for fluid interface
     */
    public function prune($enemy = null)
    {
        if ($enemy) {
            throw new LogicException('Enemy object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Enemy table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EnemyTableMap::clearInstancePool();
            EnemyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EnemyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EnemyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EnemyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EnemyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EnemyQuery
