<?php

namespace Thelia\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Category as ChildCategory;
use Thelia\Model\CategoryI18nQuery as ChildCategoryI18nQuery;
use Thelia\Model\CategoryQuery as ChildCategoryQuery;
use Thelia\Model\Map\CategoryTableMap;

/**
 * Base class that represents a query for the 'category' table.
 *
 *
 *
 * @method     ChildCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoryQuery orderByParent($order = Criteria::ASC) Order by the parent column
 * @method     ChildCategoryQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildCategoryQuery orderByVisible($order = Criteria::ASC) Order by the visible column
 * @method     ChildCategoryQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildCategoryQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildCategoryQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method     ChildCategoryQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method     ChildCategoryQuery groupById() Group by the id column
 * @method     ChildCategoryQuery groupByParent() Group by the parent column
 * @method     ChildCategoryQuery groupByLink() Group by the link column
 * @method     ChildCategoryQuery groupByVisible() Group by the visible column
 * @method     ChildCategoryQuery groupByPosition() Group by the position column
 * @method     ChildCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildCategoryQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildCategoryQuery groupByVersion() Group by the version column
 * @method     ChildCategoryQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method     ChildCategoryQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method     ChildCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoryQuery leftJoinProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategory relation
 * @method     ChildCategoryQuery rightJoinProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategory relation
 * @method     ChildCategoryQuery innerJoinProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategory relation
 *
 * @method     ChildCategoryQuery leftJoinFeatureCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the FeatureCategory relation
 * @method     ChildCategoryQuery rightJoinFeatureCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FeatureCategory relation
 * @method     ChildCategoryQuery innerJoinFeatureCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the FeatureCategory relation
 *
 * @method     ChildCategoryQuery leftJoinAttributeCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeCategory relation
 * @method     ChildCategoryQuery rightJoinAttributeCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeCategory relation
 * @method     ChildCategoryQuery innerJoinAttributeCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeCategory relation
 *
 * @method     ChildCategoryQuery leftJoinContentAssoc($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContentAssoc relation
 * @method     ChildCategoryQuery rightJoinContentAssoc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContentAssoc relation
 * @method     ChildCategoryQuery innerJoinContentAssoc($relationAlias = null) Adds a INNER JOIN clause to the query using the ContentAssoc relation
 *
 * @method     ChildCategoryQuery leftJoinImage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Image relation
 * @method     ChildCategoryQuery rightJoinImage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Image relation
 * @method     ChildCategoryQuery innerJoinImage($relationAlias = null) Adds a INNER JOIN clause to the query using the Image relation
 *
 * @method     ChildCategoryQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method     ChildCategoryQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method     ChildCategoryQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method     ChildCategoryQuery leftJoinRewriting($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rewriting relation
 * @method     ChildCategoryQuery rightJoinRewriting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rewriting relation
 * @method     ChildCategoryQuery innerJoinRewriting($relationAlias = null) Adds a INNER JOIN clause to the query using the Rewriting relation
 *
 * @method     ChildCategoryQuery leftJoinCategoryI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryI18n relation
 * @method     ChildCategoryQuery rightJoinCategoryI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryI18n relation
 * @method     ChildCategoryQuery innerJoinCategoryI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryI18n relation
 *
 * @method     ChildCategoryQuery leftJoinCategoryVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryVersion relation
 * @method     ChildCategoryQuery rightJoinCategoryVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryVersion relation
 * @method     ChildCategoryQuery innerJoinCategoryVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryVersion relation
 *
 * @method     ChildCategory findOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query
 * @method     ChildCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategory matching the query, or a new ChildCategory object populated from the query conditions when no match is found
 *
 * @method     ChildCategory findOneById(int $id) Return the first ChildCategory filtered by the id column
 * @method     ChildCategory findOneByParent(int $parent) Return the first ChildCategory filtered by the parent column
 * @method     ChildCategory findOneByLink(string $link) Return the first ChildCategory filtered by the link column
 * @method     ChildCategory findOneByVisible(int $visible) Return the first ChildCategory filtered by the visible column
 * @method     ChildCategory findOneByPosition(int $position) Return the first ChildCategory filtered by the position column
 * @method     ChildCategory findOneByCreatedAt(string $created_at) Return the first ChildCategory filtered by the created_at column
 * @method     ChildCategory findOneByUpdatedAt(string $updated_at) Return the first ChildCategory filtered by the updated_at column
 * @method     ChildCategory findOneByVersion(int $version) Return the first ChildCategory filtered by the version column
 * @method     ChildCategory findOneByVersionCreatedAt(string $version_created_at) Return the first ChildCategory filtered by the version_created_at column
 * @method     ChildCategory findOneByVersionCreatedBy(string $version_created_by) Return the first ChildCategory filtered by the version_created_by column
 *
 * @method     array findById(int $id) Return ChildCategory objects filtered by the id column
 * @method     array findByParent(int $parent) Return ChildCategory objects filtered by the parent column
 * @method     array findByLink(string $link) Return ChildCategory objects filtered by the link column
 * @method     array findByVisible(int $visible) Return ChildCategory objects filtered by the visible column
 * @method     array findByPosition(int $position) Return ChildCategory objects filtered by the position column
 * @method     array findByCreatedAt(string $created_at) Return ChildCategory objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildCategory objects filtered by the updated_at column
 * @method     array findByVersion(int $version) Return ChildCategory objects filtered by the version column
 * @method     array findByVersionCreatedAt(string $version_created_at) Return ChildCategory objects filtered by the version_created_at column
 * @method     array findByVersionCreatedBy(string $version_created_by) Return ChildCategory objects filtered by the version_created_by column
 *
 */
abstract class CategoryQuery extends ModelCriteria
{

    // versionable behavior

    /**
     * Whether the versioning is enabled
     */
    static $isVersioningEnabled = true;

    /**
     * Initializes internal state of \Thelia\Model\Base\CategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\Thelia\\Model\\Category', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \Thelia\Model\CategoryQuery) {
            return $criteria;
        }
        $query = new \Thelia\Model\CategoryQuery();
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoryTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, PARENT, LINK, VISIBLE, POSITION, CREATED_AT, UPDATED_AT, VERSION, VERSION_CREATED_AT, VERSION_CREATED_BY FROM category WHERE ID = :p0';
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
            $obj = new ChildCategory();
            $obj->hydrate($row);
            CategoryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the parent column
     *
     * Example usage:
     * <code>
     * $query->filterByParent(1234); // WHERE parent = 1234
     * $query->filterByParent(array(12, 34)); // WHERE parent IN (12, 34)
     * $query->filterByParent(array('min' => 12)); // WHERE parent > 12
     * </code>
     *
     * @param     mixed $parent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByParent($parent = null, $comparison = null)
    {
        if (is_array($parent)) {
            $useMinMax = false;
            if (isset($parent['min'])) {
                $this->addUsingAlias(CategoryTableMap::PARENT, $parent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parent['max'])) {
                $this->addUsingAlias(CategoryTableMap::PARENT, $parent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::PARENT, $parent, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%'); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $link)) {
                $link = str_replace('*', '%', $link);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::LINK, $link, $comparison);
    }

    /**
     * Filter the query on the visible column
     *
     * Example usage:
     * <code>
     * $query->filterByVisible(1234); // WHERE visible = 1234
     * $query->filterByVisible(array(12, 34)); // WHERE visible IN (12, 34)
     * $query->filterByVisible(array('min' => 12)); // WHERE visible > 12
     * </code>
     *
     * @param     mixed $visible The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByVisible($visible = null, $comparison = null)
    {
        if (is_array($visible)) {
            $useMinMax = false;
            if (isset($visible['min'])) {
                $this->addUsingAlias(CategoryTableMap::VISIBLE, $visible['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visible['max'])) {
                $this->addUsingAlias(CategoryTableMap::VISIBLE, $visible['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::VISIBLE, $visible, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(CategoryTableMap::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(CategoryTableMap::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CategoryTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CategoryTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CategoryTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CategoryTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version > 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(CategoryTableMap::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(CategoryTableMap::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(CategoryTableMap::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(CategoryTableMap::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\ProductCategory object
     *
     * @param \Thelia\Model\ProductCategory|ObjectCollection $productCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByProductCategory($productCategory, $comparison = null)
    {
        if ($productCategory instanceof \Thelia\Model\ProductCategory) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $productCategory->getCategoryId(), $comparison);
        } elseif ($productCategory instanceof ObjectCollection) {
            return $this
                ->useProductCategoryQuery()
                ->filterByPrimaryKeys($productCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductCategory() only accepts arguments of type \Thelia\Model\ProductCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductCategory');
        }

        return $this;
    }

    /**
     * Use the ProductCategory relation ProductCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductCategory', '\Thelia\Model\ProductCategoryQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\FeatureCategory object
     *
     * @param \Thelia\Model\FeatureCategory|ObjectCollection $featureCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByFeatureCategory($featureCategory, $comparison = null)
    {
        if ($featureCategory instanceof \Thelia\Model\FeatureCategory) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $featureCategory->getCategoryId(), $comparison);
        } elseif ($featureCategory instanceof ObjectCollection) {
            return $this
                ->useFeatureCategoryQuery()
                ->filterByPrimaryKeys($featureCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFeatureCategory() only accepts arguments of type \Thelia\Model\FeatureCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FeatureCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinFeatureCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FeatureCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'FeatureCategory');
        }

        return $this;
    }

    /**
     * Use the FeatureCategory relation FeatureCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\FeatureCategoryQuery A secondary query class using the current class as primary query
     */
    public function useFeatureCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFeatureCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FeatureCategory', '\Thelia\Model\FeatureCategoryQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\AttributeCategory object
     *
     * @param \Thelia\Model\AttributeCategory|ObjectCollection $attributeCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByAttributeCategory($attributeCategory, $comparison = null)
    {
        if ($attributeCategory instanceof \Thelia\Model\AttributeCategory) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $attributeCategory->getCategoryId(), $comparison);
        } elseif ($attributeCategory instanceof ObjectCollection) {
            return $this
                ->useAttributeCategoryQuery()
                ->filterByPrimaryKeys($attributeCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeCategory() only accepts arguments of type \Thelia\Model\AttributeCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinAttributeCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AttributeCategory');
        }

        return $this;
    }

    /**
     * Use the AttributeCategory relation AttributeCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\AttributeCategoryQuery A secondary query class using the current class as primary query
     */
    public function useAttributeCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeCategory', '\Thelia\Model\AttributeCategoryQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\ContentAssoc object
     *
     * @param \Thelia\Model\ContentAssoc|ObjectCollection $contentAssoc  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByContentAssoc($contentAssoc, $comparison = null)
    {
        if ($contentAssoc instanceof \Thelia\Model\ContentAssoc) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $contentAssoc->getCategoryId(), $comparison);
        } elseif ($contentAssoc instanceof ObjectCollection) {
            return $this
                ->useContentAssocQuery()
                ->filterByPrimaryKeys($contentAssoc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContentAssoc() only accepts arguments of type \Thelia\Model\ContentAssoc or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContentAssoc relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinContentAssoc($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContentAssoc');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ContentAssoc');
        }

        return $this;
    }

    /**
     * Use the ContentAssoc relation ContentAssoc object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ContentAssocQuery A secondary query class using the current class as primary query
     */
    public function useContentAssocQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContentAssoc($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContentAssoc', '\Thelia\Model\ContentAssocQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Image object
     *
     * @param \Thelia\Model\Image|ObjectCollection $image  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByImage($image, $comparison = null)
    {
        if ($image instanceof \Thelia\Model\Image) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $image->getCategoryId(), $comparison);
        } elseif ($image instanceof ObjectCollection) {
            return $this
                ->useImageQuery()
                ->filterByPrimaryKeys($image->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImage() only accepts arguments of type \Thelia\Model\Image or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Image relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinImage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Image');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Image');
        }

        return $this;
    }

    /**
     * Use the Image relation Image object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ImageQuery A secondary query class using the current class as primary query
     */
    public function useImageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinImage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Image', '\Thelia\Model\ImageQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Document object
     *
     * @param \Thelia\Model\Document|ObjectCollection $document  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByDocument($document, $comparison = null)
    {
        if ($document instanceof \Thelia\Model\Document) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $document->getCategoryId(), $comparison);
        } elseif ($document instanceof ObjectCollection) {
            return $this
                ->useDocumentQuery()
                ->filterByPrimaryKeys($document->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocument() only accepts arguments of type \Thelia\Model\Document or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Document relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinDocument($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Document');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Document');
        }

        return $this;
    }

    /**
     * Use the Document relation Document object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Document', '\Thelia\Model\DocumentQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Rewriting object
     *
     * @param \Thelia\Model\Rewriting|ObjectCollection $rewriting  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByRewriting($rewriting, $comparison = null)
    {
        if ($rewriting instanceof \Thelia\Model\Rewriting) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $rewriting->getCategoryId(), $comparison);
        } elseif ($rewriting instanceof ObjectCollection) {
            return $this
                ->useRewritingQuery()
                ->filterByPrimaryKeys($rewriting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRewriting() only accepts arguments of type \Thelia\Model\Rewriting or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rewriting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinRewriting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rewriting');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Rewriting');
        }

        return $this;
    }

    /**
     * Use the Rewriting relation Rewriting object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\RewritingQuery A secondary query class using the current class as primary query
     */
    public function useRewritingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRewriting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rewriting', '\Thelia\Model\RewritingQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\CategoryI18n object
     *
     * @param \Thelia\Model\CategoryI18n|ObjectCollection $categoryI18n  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryI18n($categoryI18n, $comparison = null)
    {
        if ($categoryI18n instanceof \Thelia\Model\CategoryI18n) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $categoryI18n->getId(), $comparison);
        } elseif ($categoryI18n instanceof ObjectCollection) {
            return $this
                ->useCategoryI18nQuery()
                ->filterByPrimaryKeys($categoryI18n->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategoryI18n() only accepts arguments of type \Thelia\Model\CategoryI18n or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryI18n relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinCategoryI18n($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryI18n');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CategoryI18n');
        }

        return $this;
    }

    /**
     * Use the CategoryI18n relation CategoryI18n object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CategoryI18nQuery A secondary query class using the current class as primary query
     */
    public function useCategoryI18nQuery($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        return $this
            ->joinCategoryI18n($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryI18n', '\Thelia\Model\CategoryI18nQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\CategoryVersion object
     *
     * @param \Thelia\Model\CategoryVersion|ObjectCollection $categoryVersion  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryVersion($categoryVersion, $comparison = null)
    {
        if ($categoryVersion instanceof \Thelia\Model\CategoryVersion) {
            return $this
                ->addUsingAlias(CategoryTableMap::ID, $categoryVersion->getId(), $comparison);
        } elseif ($categoryVersion instanceof ObjectCollection) {
            return $this
                ->useCategoryVersionQuery()
                ->filterByPrimaryKeys($categoryVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategoryVersion() only accepts arguments of type \Thelia\Model\CategoryVersion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function joinCategoryVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryVersion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CategoryVersion');
        }

        return $this;
    }

    /**
     * Use the CategoryVersion relation CategoryVersion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CategoryVersionQuery A secondary query class using the current class as primary query
     */
    public function useCategoryVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryVersion', '\Thelia\Model\CategoryVersionQuery');
    }

    /**
     * Filter the query by a related Product object
     * using the product_category table as cross reference
     *
     * @param Product $product the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useProductCategoryQuery()
            ->filterByProduct($product, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Feature object
     * using the feature_category table as cross reference
     *
     * @param Feature $feature the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByFeature($feature, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useFeatureCategoryQuery()
            ->filterByFeature($feature, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Attribute object
     * using the attribute_category table as cross reference
     *
     * @param Attribute $attribute the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByAttribute($attribute, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAttributeCategoryQuery()
            ->filterByAttribute($attribute, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCategory $category Object to remove from the list of results
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryTableMap::ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoryTableMap::clearInstancePool();
            CategoryTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCategory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCategory object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoryTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoryTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildCategoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryTableMap::CREATED_AT);
    }

    // i18n behavior

    /**
     * Adds a JOIN clause to the query using the i18n relation
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCategoryQuery The current query, for fluid interface
     */
    public function joinI18n($locale = 'en_EN', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $relationName = $relationAlias ? $relationAlias : 'CategoryI18n';

        return $this
            ->joinCategoryI18n($relationAlias, $joinType)
            ->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
    }

    /**
     * Adds a JOIN clause to the query and hydrates the related I18n object.
     * Shortcut for $c->joinI18n($locale)->with()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCategoryQuery The current query, for fluid interface
     */
    public function joinWithI18n($locale = 'en_EN', $joinType = Criteria::LEFT_JOIN)
    {
        $this
            ->joinI18n($locale, null, $joinType)
            ->with('CategoryI18n');
        $this->with['CategoryI18n']->setIsWithOneToMany(false);

        return $this;
    }

    /**
     * Use the I18n relation query object
     *
     * @see       useQuery()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCategoryI18nQuery A secondary query class using the current class as primary query
     */
    public function useI18nQuery($locale = 'en_EN', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinI18n($locale, $relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryI18n', '\Thelia\Model\CategoryI18nQuery');
    }

    // versionable behavior

    /**
     * Checks whether versioning is enabled
     *
     * @return boolean
     */
    static public function isVersioningEnabled()
    {
        return self::$isVersioningEnabled;
    }

    /**
     * Enables versioning
     */
    static public function enableVersioning()
    {
        self::$isVersioningEnabled = true;
    }

    /**
     * Disables versioning
     */
    static public function disableVersioning()
    {
        self::$isVersioningEnabled = false;
    }

} // CategoryQuery