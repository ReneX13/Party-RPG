<?php

namespace Base;

use \Ability as ChildAbility;
use \AbilityQuery as ChildAbilityQuery;
use \Exception;
use \PDO;
use Map\AbilityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Ability' table.
 *
 *
 *
 * @method     ChildAbilityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAbilityQuery orderByClassId($order = Criteria::ASC) Order by the class_id column
 * @method     ChildAbilityQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildAbilityQuery orderByElement($order = Criteria::ASC) Order by the element column
 * @method     ChildAbilityQuery orderByEffect1($order = Criteria::ASC) Order by the effect_1 column
 * @method     ChildAbilityQuery orderByEffect2($order = Criteria::ASC) Order by the effect_2 column
 * @method     ChildAbilityQuery orderByEffect3($order = Criteria::ASC) Order by the effect_3 column
 * @method     ChildAbilityQuery orderByStr($order = Criteria::ASC) Order by the str column
 * @method     ChildAbilityQuery orderByDex($order = Criteria::ASC) Order by the dex column
 * @method     ChildAbilityQuery orderByMag($order = Criteria::ASC) Order by the mag column
 * @method     ChildAbilityQuery orderByDef($order = Criteria::ASC) Order by the def column
 * @method     ChildAbilityQuery orderByEva($order = Criteria::ASC) Order by the eva column
 * @method     ChildAbilityQuery orderByRes($order = Criteria::ASC) Order by the res column
 * @method     ChildAbilityQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ChildAbilityQuery groupById() Group by the id column
 * @method     ChildAbilityQuery groupByClassId() Group by the class_id column
 * @method     ChildAbilityQuery groupByName() Group by the name column
 * @method     ChildAbilityQuery groupByElement() Group by the element column
 * @method     ChildAbilityQuery groupByEffect1() Group by the effect_1 column
 * @method     ChildAbilityQuery groupByEffect2() Group by the effect_2 column
 * @method     ChildAbilityQuery groupByEffect3() Group by the effect_3 column
 * @method     ChildAbilityQuery groupByStr() Group by the str column
 * @method     ChildAbilityQuery groupByDex() Group by the dex column
 * @method     ChildAbilityQuery groupByMag() Group by the mag column
 * @method     ChildAbilityQuery groupByDef() Group by the def column
 * @method     ChildAbilityQuery groupByEva() Group by the eva column
 * @method     ChildAbilityQuery groupByRes() Group by the res column
 * @method     ChildAbilityQuery groupByType() Group by the type column
 *
 * @method     ChildAbilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAbilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAbilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAbilityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAbilityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAbilityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAbility findOne(ConnectionInterface $con = null) Return the first ChildAbility matching the query
 * @method     ChildAbility findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAbility matching the query, or a new ChildAbility object populated from the query conditions when no match is found
 *
 * @method     ChildAbility findOneById(int $id) Return the first ChildAbility filtered by the id column
 * @method     ChildAbility findOneByClassId(int $class_id) Return the first ChildAbility filtered by the class_id column
 * @method     ChildAbility findOneByName(int $name) Return the first ChildAbility filtered by the name column
 * @method     ChildAbility findOneByElement(int $element) Return the first ChildAbility filtered by the element column
 * @method     ChildAbility findOneByEffect1(int $effect_1) Return the first ChildAbility filtered by the effect_1 column
 * @method     ChildAbility findOneByEffect2(int $effect_2) Return the first ChildAbility filtered by the effect_2 column
 * @method     ChildAbility findOneByEffect3(int $effect_3) Return the first ChildAbility filtered by the effect_3 column
 * @method     ChildAbility findOneByStr(int $str) Return the first ChildAbility filtered by the str column
 * @method     ChildAbility findOneByDex(int $dex) Return the first ChildAbility filtered by the dex column
 * @method     ChildAbility findOneByMag(int $mag) Return the first ChildAbility filtered by the mag column
 * @method     ChildAbility findOneByDef(int $def) Return the first ChildAbility filtered by the def column
 * @method     ChildAbility findOneByEva(int $eva) Return the first ChildAbility filtered by the eva column
 * @method     ChildAbility findOneByRes(int $res) Return the first ChildAbility filtered by the res column
 * @method     ChildAbility findOneByType(string $type) Return the first ChildAbility filtered by the type column *

 * @method     ChildAbility requirePk($key, ConnectionInterface $con = null) Return the ChildAbility by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOne(ConnectionInterface $con = null) Return the first ChildAbility matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAbility requireOneById(int $id) Return the first ChildAbility filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByClassId(int $class_id) Return the first ChildAbility filtered by the class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByName(int $name) Return the first ChildAbility filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByElement(int $element) Return the first ChildAbility filtered by the element column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByEffect1(int $effect_1) Return the first ChildAbility filtered by the effect_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByEffect2(int $effect_2) Return the first ChildAbility filtered by the effect_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByEffect3(int $effect_3) Return the first ChildAbility filtered by the effect_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByStr(int $str) Return the first ChildAbility filtered by the str column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByDex(int $dex) Return the first ChildAbility filtered by the dex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByMag(int $mag) Return the first ChildAbility filtered by the mag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByDef(int $def) Return the first ChildAbility filtered by the def column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByEva(int $eva) Return the first ChildAbility filtered by the eva column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByRes(int $res) Return the first ChildAbility filtered by the res column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAbility requireOneByType(string $type) Return the first ChildAbility filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAbility[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAbility objects based on current ModelCriteria
 * @method     ChildAbility[]|ObjectCollection findById(int $id) Return ChildAbility objects filtered by the id column
 * @method     ChildAbility[]|ObjectCollection findByClassId(int $class_id) Return ChildAbility objects filtered by the class_id column
 * @method     ChildAbility[]|ObjectCollection findByName(int $name) Return ChildAbility objects filtered by the name column
 * @method     ChildAbility[]|ObjectCollection findByElement(int $element) Return ChildAbility objects filtered by the element column
 * @method     ChildAbility[]|ObjectCollection findByEffect1(int $effect_1) Return ChildAbility objects filtered by the effect_1 column
 * @method     ChildAbility[]|ObjectCollection findByEffect2(int $effect_2) Return ChildAbility objects filtered by the effect_2 column
 * @method     ChildAbility[]|ObjectCollection findByEffect3(int $effect_3) Return ChildAbility objects filtered by the effect_3 column
 * @method     ChildAbility[]|ObjectCollection findByStr(int $str) Return ChildAbility objects filtered by the str column
 * @method     ChildAbility[]|ObjectCollection findByDex(int $dex) Return ChildAbility objects filtered by the dex column
 * @method     ChildAbility[]|ObjectCollection findByMag(int $mag) Return ChildAbility objects filtered by the mag column
 * @method     ChildAbility[]|ObjectCollection findByDef(int $def) Return ChildAbility objects filtered by the def column
 * @method     ChildAbility[]|ObjectCollection findByEva(int $eva) Return ChildAbility objects filtered by the eva column
 * @method     ChildAbility[]|ObjectCollection findByRes(int $res) Return ChildAbility objects filtered by the res column
 * @method     ChildAbility[]|ObjectCollection findByType(string $type) Return ChildAbility objects filtered by the type column
 * @method     ChildAbility[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AbilityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AbilityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ability', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAbilityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAbilityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAbilityQuery) {
            return $criteria;
        }
        $query = new ChildAbilityQuery();
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
     * @return ChildAbility|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AbilityTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AbilityTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAbility A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, class_id, name, element, effect_1, effect_2, effect_3, str, dex, mag, def, eva, res, type FROM Ability WHERE id = :p0';
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
            /** @var ChildAbility $obj */
            $obj = new ChildAbility();
            $obj->hydrate($row);
            AbilityTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAbility|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AbilityTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AbilityTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassId(1234); // WHERE class_id = 1234
     * $query->filterByClassId(array(12, 34)); // WHERE class_id IN (12, 34)
     * $query->filterByClassId(array('min' => 12)); // WHERE class_id > 12
     * </code>
     *
     * @param     mixed $classId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByClassId($classId = null, $comparison = null)
    {
        if (is_array($classId)) {
            $useMinMax = false;
            if (isset($classId['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_CLASS_ID, $classId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classId['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_CLASS_ID, $classId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_CLASS_ID, $classId, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (is_array($name)) {
            $useMinMax = false;
            if (isset($name['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_NAME, $name['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($name['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_NAME, $name['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByElement($element = null, $comparison = null)
    {
        if (is_array($element)) {
            $useMinMax = false;
            if (isset($element['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_ELEMENT, $element['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($element['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_ELEMENT, $element['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_ELEMENT, $element, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByEffect1($effect1 = null, $comparison = null)
    {
        if (is_array($effect1)) {
            $useMinMax = false;
            if (isset($effect1['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_1, $effect1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect1['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_1, $effect1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_EFFECT_1, $effect1, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByEffect2($effect2 = null, $comparison = null)
    {
        if (is_array($effect2)) {
            $useMinMax = false;
            if (isset($effect2['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_2, $effect2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect2['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_2, $effect2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_EFFECT_2, $effect2, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByEffect3($effect3 = null, $comparison = null)
    {
        if (is_array($effect3)) {
            $useMinMax = false;
            if (isset($effect3['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_3, $effect3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($effect3['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EFFECT_3, $effect3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_EFFECT_3, $effect3, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByStr($str = null, $comparison = null)
    {
        if (is_array($str)) {
            $useMinMax = false;
            if (isset($str['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_STR, $str['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($str['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_STR, $str['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_STR, $str, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByDex($dex = null, $comparison = null)
    {
        if (is_array($dex)) {
            $useMinMax = false;
            if (isset($dex['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_DEX, $dex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dex['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_DEX, $dex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_DEX, $dex, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByMag($mag = null, $comparison = null)
    {
        if (is_array($mag)) {
            $useMinMax = false;
            if (isset($mag['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_MAG, $mag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mag['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_MAG, $mag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_MAG, $mag, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByDef($def = null, $comparison = null)
    {
        if (is_array($def)) {
            $useMinMax = false;
            if (isset($def['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_DEF, $def['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($def['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_DEF, $def['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_DEF, $def, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByEva($eva = null, $comparison = null)
    {
        if (is_array($eva)) {
            $useMinMax = false;
            if (isset($eva['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EVA, $eva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eva['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_EVA, $eva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_EVA, $eva, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByRes($res = null, $comparison = null)
    {
        if (is_array($res)) {
            $useMinMax = false;
            if (isset($res['min'])) {
                $this->addUsingAlias(AbilityTableMap::COL_RES, $res['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($res['max'])) {
                $this->addUsingAlias(AbilityTableMap::COL_RES, $res['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_RES, $res, $comparison);
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
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbilityTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAbility $ability Object to remove from the list of results
     *
     * @return $this|ChildAbilityQuery The current query, for fluid interface
     */
    public function prune($ability = null)
    {
        if ($ability) {
            $this->addUsingAlias(AbilityTableMap::COL_ID, $ability->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Ability table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AbilityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AbilityTableMap::clearInstancePool();
            AbilityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AbilityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AbilityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AbilityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AbilityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AbilityQuery
