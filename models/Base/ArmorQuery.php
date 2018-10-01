<?php

namespace Base;

use \Armor as ChildArmor;
use \ArmorQuery as ChildArmorQuery;
use \Exception;
use Map\ArmorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Armor' table.
 *
 *
 *
 * @method     ChildArmorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildArmorQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildArmorQuery orderByStr($order = Criteria::ASC) Order by the str column
 * @method     ChildArmorQuery orderByDex($order = Criteria::ASC) Order by the dex column
 * @method     ChildArmorQuery orderByMag($order = Criteria::ASC) Order by the mag column
 * @method     ChildArmorQuery orderByDef($order = Criteria::ASC) Order by the def column
 * @method     ChildArmorQuery orderByEva($order = Criteria::ASC) Order by the eva column
 * @method     ChildArmorQuery orderByRes($order = Criteria::ASC) Order by the res column
 * @method     ChildArmorQuery orderByImageFile($order = Criteria::ASC) Order by the image_file column
 *
 * @method     ChildArmorQuery groupById() Group by the id column
 * @method     ChildArmorQuery groupByName() Group by the name column
 * @method     ChildArmorQuery groupByStr() Group by the str column
 * @method     ChildArmorQuery groupByDex() Group by the dex column
 * @method     ChildArmorQuery groupByMag() Group by the mag column
 * @method     ChildArmorQuery groupByDef() Group by the def column
 * @method     ChildArmorQuery groupByEva() Group by the eva column
 * @method     ChildArmorQuery groupByRes() Group by the res column
 * @method     ChildArmorQuery groupByImageFile() Group by the image_file column
 *
 * @method     ChildArmorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArmorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArmorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArmorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArmorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArmorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArmor findOne(ConnectionInterface $con = null) Return the first ChildArmor matching the query
 * @method     ChildArmor findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArmor matching the query, or a new ChildArmor object populated from the query conditions when no match is found
 *
 * @method     ChildArmor findOneById(int $id) Return the first ChildArmor filtered by the id column
 * @method     ChildArmor findOneByName(string $name) Return the first ChildArmor filtered by the name column
 * @method     ChildArmor findOneByStr(int $str) Return the first ChildArmor filtered by the str column
 * @method     ChildArmor findOneByDex(int $dex) Return the first ChildArmor filtered by the dex column
 * @method     ChildArmor findOneByMag(int $mag) Return the first ChildArmor filtered by the mag column
 * @method     ChildArmor findOneByDef(int $def) Return the first ChildArmor filtered by the def column
 * @method     ChildArmor findOneByEva(int $eva) Return the first ChildArmor filtered by the eva column
 * @method     ChildArmor findOneByRes(int $res) Return the first ChildArmor filtered by the res column
 * @method     ChildArmor findOneByImageFile(int $image_file) Return the first ChildArmor filtered by the image_file column *

 * @method     ChildArmor requirePk($key, ConnectionInterface $con = null) Return the ChildArmor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOne(ConnectionInterface $con = null) Return the first ChildArmor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArmor requireOneById(int $id) Return the first ChildArmor filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByName(string $name) Return the first ChildArmor filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByStr(int $str) Return the first ChildArmor filtered by the str column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByDex(int $dex) Return the first ChildArmor filtered by the dex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByMag(int $mag) Return the first ChildArmor filtered by the mag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByDef(int $def) Return the first ChildArmor filtered by the def column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByEva(int $eva) Return the first ChildArmor filtered by the eva column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByRes(int $res) Return the first ChildArmor filtered by the res column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArmor requireOneByImageFile(int $image_file) Return the first ChildArmor filtered by the image_file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArmor[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArmor objects based on current ModelCriteria
 * @method     ChildArmor[]|ObjectCollection findById(int $id) Return ChildArmor objects filtered by the id column
 * @method     ChildArmor[]|ObjectCollection findByName(string $name) Return ChildArmor objects filtered by the name column
 * @method     ChildArmor[]|ObjectCollection findByStr(int $str) Return ChildArmor objects filtered by the str column
 * @method     ChildArmor[]|ObjectCollection findByDex(int $dex) Return ChildArmor objects filtered by the dex column
 * @method     ChildArmor[]|ObjectCollection findByMag(int $mag) Return ChildArmor objects filtered by the mag column
 * @method     ChildArmor[]|ObjectCollection findByDef(int $def) Return ChildArmor objects filtered by the def column
 * @method     ChildArmor[]|ObjectCollection findByEva(int $eva) Return ChildArmor objects filtered by the eva column
 * @method     ChildArmor[]|ObjectCollection findByRes(int $res) Return ChildArmor objects filtered by the res column
 * @method     ChildArmor[]|ObjectCollection findByImageFile(int $image_file) Return ChildArmor objects filtered by the image_file column
 * @method     ChildArmor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArmorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ArmorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Armor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArmorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArmorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArmorQuery) {
            return $criteria;
        }
        $query = new ChildArmorQuery();
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
     * @return ChildArmor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Armor object has no primary key');
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
        throw new LogicException('The Armor object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Armor object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Armor object has no primary key');
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByStr($str = null, $comparison = null)
    {
        if (is_array($str)) {
            $useMinMax = false;
            if (isset($str['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_STR, $str['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($str['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_STR, $str['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_STR, $str, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByDex($dex = null, $comparison = null)
    {
        if (is_array($dex)) {
            $useMinMax = false;
            if (isset($dex['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_DEX, $dex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dex['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_DEX, $dex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_DEX, $dex, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByMag($mag = null, $comparison = null)
    {
        if (is_array($mag)) {
            $useMinMax = false;
            if (isset($mag['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_MAG, $mag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mag['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_MAG, $mag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_MAG, $mag, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByDef($def = null, $comparison = null)
    {
        if (is_array($def)) {
            $useMinMax = false;
            if (isset($def['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_DEF, $def['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($def['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_DEF, $def['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_DEF, $def, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByEva($eva = null, $comparison = null)
    {
        if (is_array($eva)) {
            $useMinMax = false;
            if (isset($eva['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_EVA, $eva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eva['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_EVA, $eva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_EVA, $eva, $comparison);
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
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByRes($res = null, $comparison = null)
    {
        if (is_array($res)) {
            $useMinMax = false;
            if (isset($res['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_RES, $res['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($res['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_RES, $res['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_RES, $res, $comparison);
    }

    /**
     * Filter the query on the image_file column
     *
     * Example usage:
     * <code>
     * $query->filterByImageFile(1234); // WHERE image_file = 1234
     * $query->filterByImageFile(array(12, 34)); // WHERE image_file IN (12, 34)
     * $query->filterByImageFile(array('min' => 12)); // WHERE image_file > 12
     * </code>
     *
     * @param     mixed $imageFile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function filterByImageFile($imageFile = null, $comparison = null)
    {
        if (is_array($imageFile)) {
            $useMinMax = false;
            if (isset($imageFile['min'])) {
                $this->addUsingAlias(ArmorTableMap::COL_IMAGE_FILE, $imageFile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($imageFile['max'])) {
                $this->addUsingAlias(ArmorTableMap::COL_IMAGE_FILE, $imageFile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArmorTableMap::COL_IMAGE_FILE, $imageFile, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildArmor $armor Object to remove from the list of results
     *
     * @return $this|ChildArmorQuery The current query, for fluid interface
     */
    public function prune($armor = null)
    {
        if ($armor) {
            throw new LogicException('Armor object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Armor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArmorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArmorTableMap::clearInstancePool();
            ArmorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ArmorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArmorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArmorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArmorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArmorQuery
