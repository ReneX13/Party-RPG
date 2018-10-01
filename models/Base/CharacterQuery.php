<?php

namespace Base;

use \Character as ChildCharacter;
use \CharacterQuery as ChildCharacterQuery;
use \Exception;
use \PDO;
use Map\CharacterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Character' table.
 *
 *
 *
 * @method     ChildCharacterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCharacterQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCharacterQuery orderByClassId($order = Criteria::ASC) Order by the class_id column
 * @method     ChildCharacterQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildCharacterQuery orderByAccountId($order = Criteria::ASC) Order by the account_id column
 * @method     ChildCharacterQuery orderByMainHand($order = Criteria::ASC) Order by the main_hand column
 * @method     ChildCharacterQuery orderByOffHand($order = Criteria::ASC) Order by the off_hand column
 * @method     ChildCharacterQuery orderByHead($order = Criteria::ASC) Order by the head column
 * @method     ChildCharacterQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     ChildCharacterQuery orderByLegs($order = Criteria::ASC) Order by the legs column
 * @method     ChildCharacterQuery orderByHands($order = Criteria::ASC) Order by the hands column
 * @method     ChildCharacterQuery orderByFeet($order = Criteria::ASC) Order by the feet column
 * @method     ChildCharacterQuery orderByAbility1($order = Criteria::ASC) Order by the ability_1 column
 * @method     ChildCharacterQuery orderByAbility2($order = Criteria::ASC) Order by the ability_2 column
 * @method     ChildCharacterQuery orderByAbility3($order = Criteria::ASC) Order by the ability_3 column
 * @method     ChildCharacterQuery orderByAbility4($order = Criteria::ASC) Order by the ability_4 column
 * @method     ChildCharacterQuery orderByAbility5($order = Criteria::ASC) Order by the ability_5 column
 * @method     ChildCharacterQuery orderByCurrentNode($order = Criteria::ASC) Order by the current_node column
 * @method     ChildCharacterQuery orderByCurrentExp($order = Criteria::ASC) Order by the current_exp column
 * @method     ChildCharacterQuery orderByPartyId($order = Criteria::ASC) Order by the party_id column
 *
 * @method     ChildCharacterQuery groupById() Group by the id column
 * @method     ChildCharacterQuery groupByName() Group by the name column
 * @method     ChildCharacterQuery groupByClassId() Group by the class_id column
 * @method     ChildCharacterQuery groupByLevel() Group by the level column
 * @method     ChildCharacterQuery groupByAccountId() Group by the account_id column
 * @method     ChildCharacterQuery groupByMainHand() Group by the main_hand column
 * @method     ChildCharacterQuery groupByOffHand() Group by the off_hand column
 * @method     ChildCharacterQuery groupByHead() Group by the head column
 * @method     ChildCharacterQuery groupByBody() Group by the body column
 * @method     ChildCharacterQuery groupByLegs() Group by the legs column
 * @method     ChildCharacterQuery groupByHands() Group by the hands column
 * @method     ChildCharacterQuery groupByFeet() Group by the feet column
 * @method     ChildCharacterQuery groupByAbility1() Group by the ability_1 column
 * @method     ChildCharacterQuery groupByAbility2() Group by the ability_2 column
 * @method     ChildCharacterQuery groupByAbility3() Group by the ability_3 column
 * @method     ChildCharacterQuery groupByAbility4() Group by the ability_4 column
 * @method     ChildCharacterQuery groupByAbility5() Group by the ability_5 column
 * @method     ChildCharacterQuery groupByCurrentNode() Group by the current_node column
 * @method     ChildCharacterQuery groupByCurrentExp() Group by the current_exp column
 * @method     ChildCharacterQuery groupByPartyId() Group by the party_id column
 *
 * @method     ChildCharacterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCharacterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCharacterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCharacterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCharacterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCharacterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCharacter findOne(ConnectionInterface $con = null) Return the first ChildCharacter matching the query
 * @method     ChildCharacter findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCharacter matching the query, or a new ChildCharacter object populated from the query conditions when no match is found
 *
 * @method     ChildCharacter findOneById(int $id) Return the first ChildCharacter filtered by the id column
 * @method     ChildCharacter findOneByName(string $name) Return the first ChildCharacter filtered by the name column
 * @method     ChildCharacter findOneByClassId(int $class_id) Return the first ChildCharacter filtered by the class_id column
 * @method     ChildCharacter findOneByLevel(int $level) Return the first ChildCharacter filtered by the level column
 * @method     ChildCharacter findOneByAccountId(int $account_id) Return the first ChildCharacter filtered by the account_id column
 * @method     ChildCharacter findOneByMainHand(int $main_hand) Return the first ChildCharacter filtered by the main_hand column
 * @method     ChildCharacter findOneByOffHand(int $off_hand) Return the first ChildCharacter filtered by the off_hand column
 * @method     ChildCharacter findOneByHead(int $head) Return the first ChildCharacter filtered by the head column
 * @method     ChildCharacter findOneByBody(int $body) Return the first ChildCharacter filtered by the body column
 * @method     ChildCharacter findOneByLegs(int $legs) Return the first ChildCharacter filtered by the legs column
 * @method     ChildCharacter findOneByHands(int $hands) Return the first ChildCharacter filtered by the hands column
 * @method     ChildCharacter findOneByFeet(int $feet) Return the first ChildCharacter filtered by the feet column
 * @method     ChildCharacter findOneByAbility1(int $ability_1) Return the first ChildCharacter filtered by the ability_1 column
 * @method     ChildCharacter findOneByAbility2(int $ability_2) Return the first ChildCharacter filtered by the ability_2 column
 * @method     ChildCharacter findOneByAbility3(int $ability_3) Return the first ChildCharacter filtered by the ability_3 column
 * @method     ChildCharacter findOneByAbility4(int $ability_4) Return the first ChildCharacter filtered by the ability_4 column
 * @method     ChildCharacter findOneByAbility5(int $ability_5) Return the first ChildCharacter filtered by the ability_5 column
 * @method     ChildCharacter findOneByCurrentNode(int $current_node) Return the first ChildCharacter filtered by the current_node column
 * @method     ChildCharacter findOneByCurrentExp(int $current_exp) Return the first ChildCharacter filtered by the current_exp column
 * @method     ChildCharacter findOneByPartyId(int $party_id) Return the first ChildCharacter filtered by the party_id column *

 * @method     ChildCharacter requirePk($key, ConnectionInterface $con = null) Return the ChildCharacter by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOne(ConnectionInterface $con = null) Return the first ChildCharacter matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCharacter requireOneById(int $id) Return the first ChildCharacter filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByName(string $name) Return the first ChildCharacter filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByClassId(int $class_id) Return the first ChildCharacter filtered by the class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByLevel(int $level) Return the first ChildCharacter filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAccountId(int $account_id) Return the first ChildCharacter filtered by the account_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByMainHand(int $main_hand) Return the first ChildCharacter filtered by the main_hand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByOffHand(int $off_hand) Return the first ChildCharacter filtered by the off_hand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByHead(int $head) Return the first ChildCharacter filtered by the head column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByBody(int $body) Return the first ChildCharacter filtered by the body column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByLegs(int $legs) Return the first ChildCharacter filtered by the legs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByHands(int $hands) Return the first ChildCharacter filtered by the hands column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByFeet(int $feet) Return the first ChildCharacter filtered by the feet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAbility1(int $ability_1) Return the first ChildCharacter filtered by the ability_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAbility2(int $ability_2) Return the first ChildCharacter filtered by the ability_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAbility3(int $ability_3) Return the first ChildCharacter filtered by the ability_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAbility4(int $ability_4) Return the first ChildCharacter filtered by the ability_4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByAbility5(int $ability_5) Return the first ChildCharacter filtered by the ability_5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByCurrentNode(int $current_node) Return the first ChildCharacter filtered by the current_node column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByCurrentExp(int $current_exp) Return the first ChildCharacter filtered by the current_exp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCharacter requireOneByPartyId(int $party_id) Return the first ChildCharacter filtered by the party_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCharacter[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCharacter objects based on current ModelCriteria
 * @method     ChildCharacter[]|ObjectCollection findById(int $id) Return ChildCharacter objects filtered by the id column
 * @method     ChildCharacter[]|ObjectCollection findByName(string $name) Return ChildCharacter objects filtered by the name column
 * @method     ChildCharacter[]|ObjectCollection findByClassId(int $class_id) Return ChildCharacter objects filtered by the class_id column
 * @method     ChildCharacter[]|ObjectCollection findByLevel(int $level) Return ChildCharacter objects filtered by the level column
 * @method     ChildCharacter[]|ObjectCollection findByAccountId(int $account_id) Return ChildCharacter objects filtered by the account_id column
 * @method     ChildCharacter[]|ObjectCollection findByMainHand(int $main_hand) Return ChildCharacter objects filtered by the main_hand column
 * @method     ChildCharacter[]|ObjectCollection findByOffHand(int $off_hand) Return ChildCharacter objects filtered by the off_hand column
 * @method     ChildCharacter[]|ObjectCollection findByHead(int $head) Return ChildCharacter objects filtered by the head column
 * @method     ChildCharacter[]|ObjectCollection findByBody(int $body) Return ChildCharacter objects filtered by the body column
 * @method     ChildCharacter[]|ObjectCollection findByLegs(int $legs) Return ChildCharacter objects filtered by the legs column
 * @method     ChildCharacter[]|ObjectCollection findByHands(int $hands) Return ChildCharacter objects filtered by the hands column
 * @method     ChildCharacter[]|ObjectCollection findByFeet(int $feet) Return ChildCharacter objects filtered by the feet column
 * @method     ChildCharacter[]|ObjectCollection findByAbility1(int $ability_1) Return ChildCharacter objects filtered by the ability_1 column
 * @method     ChildCharacter[]|ObjectCollection findByAbility2(int $ability_2) Return ChildCharacter objects filtered by the ability_2 column
 * @method     ChildCharacter[]|ObjectCollection findByAbility3(int $ability_3) Return ChildCharacter objects filtered by the ability_3 column
 * @method     ChildCharacter[]|ObjectCollection findByAbility4(int $ability_4) Return ChildCharacter objects filtered by the ability_4 column
 * @method     ChildCharacter[]|ObjectCollection findByAbility5(int $ability_5) Return ChildCharacter objects filtered by the ability_5 column
 * @method     ChildCharacter[]|ObjectCollection findByCurrentNode(int $current_node) Return ChildCharacter objects filtered by the current_node column
 * @method     ChildCharacter[]|ObjectCollection findByCurrentExp(int $current_exp) Return ChildCharacter objects filtered by the current_exp column
 * @method     ChildCharacter[]|ObjectCollection findByPartyId(int $party_id) Return ChildCharacter objects filtered by the party_id column
 * @method     ChildCharacter[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CharacterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CharacterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Character', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCharacterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCharacterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCharacterQuery) {
            return $criteria;
        }
        $query = new ChildCharacterQuery();
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
     * @return ChildCharacter|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CharacterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CharacterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCharacter A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, class_id, level, account_id, main_hand, off_hand, head, body, legs, hands, feet, ability_1, ability_2, ability_3, ability_4, ability_5, current_node, current_exp, party_id FROM Character WHERE id = :p0';
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
            /** @var ChildCharacter $obj */
            $obj = new ChildCharacter();
            $obj->hydrate($row);
            CharacterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCharacter|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CharacterTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CharacterTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByClassId($classId = null, $comparison = null)
    {
        if (is_array($classId)) {
            $useMinMax = false;
            if (isset($classId['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CLASS_ID, $classId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classId['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CLASS_ID, $classId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_CLASS_ID, $classId, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the account_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountId(1234); // WHERE account_id = 1234
     * $query->filterByAccountId(array(12, 34)); // WHERE account_id IN (12, 34)
     * $query->filterByAccountId(array('min' => 12)); // WHERE account_id > 12
     * </code>
     *
     * @param     mixed $accountId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAccountId($accountId = null, $comparison = null)
    {
        if (is_array($accountId)) {
            $useMinMax = false;
            if (isset($accountId['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ACCOUNT_ID, $accountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accountId['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ACCOUNT_ID, $accountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ACCOUNT_ID, $accountId, $comparison);
    }

    /**
     * Filter the query on the main_hand column
     *
     * Example usage:
     * <code>
     * $query->filterByMainHand(1234); // WHERE main_hand = 1234
     * $query->filterByMainHand(array(12, 34)); // WHERE main_hand IN (12, 34)
     * $query->filterByMainHand(array('min' => 12)); // WHERE main_hand > 12
     * </code>
     *
     * @param     mixed $mainHand The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByMainHand($mainHand = null, $comparison = null)
    {
        if (is_array($mainHand)) {
            $useMinMax = false;
            if (isset($mainHand['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_MAIN_HAND, $mainHand['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mainHand['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_MAIN_HAND, $mainHand['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_MAIN_HAND, $mainHand, $comparison);
    }

    /**
     * Filter the query on the off_hand column
     *
     * Example usage:
     * <code>
     * $query->filterByOffHand(1234); // WHERE off_hand = 1234
     * $query->filterByOffHand(array(12, 34)); // WHERE off_hand IN (12, 34)
     * $query->filterByOffHand(array('min' => 12)); // WHERE off_hand > 12
     * </code>
     *
     * @param     mixed $offHand The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByOffHand($offHand = null, $comparison = null)
    {
        if (is_array($offHand)) {
            $useMinMax = false;
            if (isset($offHand['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_OFF_HAND, $offHand['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($offHand['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_OFF_HAND, $offHand['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_OFF_HAND, $offHand, $comparison);
    }

    /**
     * Filter the query on the head column
     *
     * Example usage:
     * <code>
     * $query->filterByHead(1234); // WHERE head = 1234
     * $query->filterByHead(array(12, 34)); // WHERE head IN (12, 34)
     * $query->filterByHead(array('min' => 12)); // WHERE head > 12
     * </code>
     *
     * @param     mixed $head The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByHead($head = null, $comparison = null)
    {
        if (is_array($head)) {
            $useMinMax = false;
            if (isset($head['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_HEAD, $head['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($head['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_HEAD, $head['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_HEAD, $head, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * Example usage:
     * <code>
     * $query->filterByBody(1234); // WHERE body = 1234
     * $query->filterByBody(array(12, 34)); // WHERE body IN (12, 34)
     * $query->filterByBody(array('min' => 12)); // WHERE body > 12
     * </code>
     *
     * @param     mixed $body The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {
        if (is_array($body)) {
            $useMinMax = false;
            if (isset($body['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_BODY, $body['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($body['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_BODY, $body['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_BODY, $body, $comparison);
    }

    /**
     * Filter the query on the legs column
     *
     * Example usage:
     * <code>
     * $query->filterByLegs(1234); // WHERE legs = 1234
     * $query->filterByLegs(array(12, 34)); // WHERE legs IN (12, 34)
     * $query->filterByLegs(array('min' => 12)); // WHERE legs > 12
     * </code>
     *
     * @param     mixed $legs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByLegs($legs = null, $comparison = null)
    {
        if (is_array($legs)) {
            $useMinMax = false;
            if (isset($legs['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_LEGS, $legs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($legs['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_LEGS, $legs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_LEGS, $legs, $comparison);
    }

    /**
     * Filter the query on the hands column
     *
     * Example usage:
     * <code>
     * $query->filterByHands(1234); // WHERE hands = 1234
     * $query->filterByHands(array(12, 34)); // WHERE hands IN (12, 34)
     * $query->filterByHands(array('min' => 12)); // WHERE hands > 12
     * </code>
     *
     * @param     mixed $hands The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByHands($hands = null, $comparison = null)
    {
        if (is_array($hands)) {
            $useMinMax = false;
            if (isset($hands['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_HANDS, $hands['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hands['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_HANDS, $hands['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_HANDS, $hands, $comparison);
    }

    /**
     * Filter the query on the feet column
     *
     * Example usage:
     * <code>
     * $query->filterByFeet(1234); // WHERE feet = 1234
     * $query->filterByFeet(array(12, 34)); // WHERE feet IN (12, 34)
     * $query->filterByFeet(array('min' => 12)); // WHERE feet > 12
     * </code>
     *
     * @param     mixed $feet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByFeet($feet = null, $comparison = null)
    {
        if (is_array($feet)) {
            $useMinMax = false;
            if (isset($feet['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_FEET, $feet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feet['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_FEET, $feet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_FEET, $feet, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAbility1($ability1 = null, $comparison = null)
    {
        if (is_array($ability1)) {
            $useMinMax = false;
            if (isset($ability1['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_1, $ability1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability1['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_1, $ability1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ABILITY_1, $ability1, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAbility2($ability2 = null, $comparison = null)
    {
        if (is_array($ability2)) {
            $useMinMax = false;
            if (isset($ability2['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_2, $ability2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability2['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_2, $ability2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ABILITY_2, $ability2, $comparison);
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
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAbility3($ability3 = null, $comparison = null)
    {
        if (is_array($ability3)) {
            $useMinMax = false;
            if (isset($ability3['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_3, $ability3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability3['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_3, $ability3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ABILITY_3, $ability3, $comparison);
    }

    /**
     * Filter the query on the ability_4 column
     *
     * Example usage:
     * <code>
     * $query->filterByAbility4(1234); // WHERE ability_4 = 1234
     * $query->filterByAbility4(array(12, 34)); // WHERE ability_4 IN (12, 34)
     * $query->filterByAbility4(array('min' => 12)); // WHERE ability_4 > 12
     * </code>
     *
     * @param     mixed $ability4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAbility4($ability4 = null, $comparison = null)
    {
        if (is_array($ability4)) {
            $useMinMax = false;
            if (isset($ability4['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_4, $ability4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability4['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_4, $ability4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ABILITY_4, $ability4, $comparison);
    }

    /**
     * Filter the query on the ability_5 column
     *
     * Example usage:
     * <code>
     * $query->filterByAbility5(1234); // WHERE ability_5 = 1234
     * $query->filterByAbility5(array(12, 34)); // WHERE ability_5 IN (12, 34)
     * $query->filterByAbility5(array('min' => 12)); // WHERE ability_5 > 12
     * </code>
     *
     * @param     mixed $ability5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByAbility5($ability5 = null, $comparison = null)
    {
        if (is_array($ability5)) {
            $useMinMax = false;
            if (isset($ability5['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_5, $ability5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ability5['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_ABILITY_5, $ability5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_ABILITY_5, $ability5, $comparison);
    }

    /**
     * Filter the query on the current_node column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentNode(1234); // WHERE current_node = 1234
     * $query->filterByCurrentNode(array(12, 34)); // WHERE current_node IN (12, 34)
     * $query->filterByCurrentNode(array('min' => 12)); // WHERE current_node > 12
     * </code>
     *
     * @param     mixed $currentNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByCurrentNode($currentNode = null, $comparison = null)
    {
        if (is_array($currentNode)) {
            $useMinMax = false;
            if (isset($currentNode['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CURRENT_NODE, $currentNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentNode['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CURRENT_NODE, $currentNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_CURRENT_NODE, $currentNode, $comparison);
    }

    /**
     * Filter the query on the current_exp column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentExp(1234); // WHERE current_exp = 1234
     * $query->filterByCurrentExp(array(12, 34)); // WHERE current_exp IN (12, 34)
     * $query->filterByCurrentExp(array('min' => 12)); // WHERE current_exp > 12
     * </code>
     *
     * @param     mixed $currentExp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByCurrentExp($currentExp = null, $comparison = null)
    {
        if (is_array($currentExp)) {
            $useMinMax = false;
            if (isset($currentExp['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CURRENT_EXP, $currentExp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentExp['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_CURRENT_EXP, $currentExp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_CURRENT_EXP, $currentExp, $comparison);
    }

    /**
     * Filter the query on the party_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPartyId(1234); // WHERE party_id = 1234
     * $query->filterByPartyId(array(12, 34)); // WHERE party_id IN (12, 34)
     * $query->filterByPartyId(array('min' => 12)); // WHERE party_id > 12
     * </code>
     *
     * @param     mixed $partyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function filterByPartyId($partyId = null, $comparison = null)
    {
        if (is_array($partyId)) {
            $useMinMax = false;
            if (isset($partyId['min'])) {
                $this->addUsingAlias(CharacterTableMap::COL_PARTY_ID, $partyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partyId['max'])) {
                $this->addUsingAlias(CharacterTableMap::COL_PARTY_ID, $partyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CharacterTableMap::COL_PARTY_ID, $partyId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCharacter $character Object to remove from the list of results
     *
     * @return $this|ChildCharacterQuery The current query, for fluid interface
     */
    public function prune($character = null)
    {
        if ($character) {
            $this->addUsingAlias(CharacterTableMap::COL_ID, $character->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Character table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CharacterTableMap::clearInstancePool();
            CharacterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CharacterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CharacterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CharacterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CharacterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CharacterQuery
